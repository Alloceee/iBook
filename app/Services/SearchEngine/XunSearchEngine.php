<?php

namespace App\Services\SearchEngine;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Builder;
use Laravel\Scout\Engines\Engine;

class XunSearchEngine extends Engine
{
    /**
     * @var \XS
     */
    protected $xs;

    public function __construct(\XS $xs)
    {
        $this->xs = $xs;
    }

    /**
     * 更新给定模型索引
     *
     * @param  \Illuminate\Database\Eloquent\Collection $models
     * @return void
     */
    public function update($models)
    {
        if ($models->isEmpty()) {
            return;
        }

        if ($this->usesSoftDelete($models->first()) && config('scout.soft_delete', false)) {
            $models->each->pushSoftDeleteMetadata();
        }

        $index = $this->xs->index;
        $models->map(function ($model) use ($index) {
            $array = $model->toSearchableArray();
            if (empty($array)) {
                return;
            }
            $doc = new \XSDocument;
            $data = [
                'id' => $this->id,
                'title' => $this->title,
                'brief' => $this->brief,
                'content' => $this->content,
                'tag' => $this->tag,
                'author' => $this->author->name,
                'collectionCount' => $this->collectionCount,
                'likeCount' => $this->likeCount,
                'commentCount' => $this->commentCount,
                'created_at' => $this->created_at
            ];
            $doc->setFields($data);
            $index->update($doc);
        });
        $index->flushIndex();
    }

    /**
     * 从索引中移除给定模型
     *
     * @param  \Illuminate\Database\Eloquent\Collection $models
     * @return void
     */
    public function delete($models)
    {
        $index = $this->xs->index;
        $models->map(function ($model) use ($index) {
            $index->del($model->getKey());
        });
        $index->flushIndex();
    }

    /**
     * 通过迅搜引擎执行搜索
     *
     * @param  \Laravel\Scout\Builder $builder
     * @return mixed
     */
    public function search(Builder $builder)
    {
        return $this->performSearch($builder, array_filter(['hitsPerPage' => $builder->limit]));
    }

    /**
     * 分页实现
     *
     * @param  \Laravel\Scout\Builder $builder
     * @param  int $perPage
     * @param  int $page
     * @return mixed
     */
    public function paginate(Builder $builder, $perPage, $page)
    {
        return $this->performSearch($builder, [
            'hitsPerPage' => $perPage,
            'page' => $page - 1,
        ]);
    }

    /**
     * 返回给定搜索结果的主键
     *
     * @param  mixed $results
     * @return \Illuminate\Support\Collection
     */
    public function mapIds($results)
    {
        return collect($results)
            ->pluck('id')->values();
    }

    /**
     * 将搜索结果和模型实例映射起来
     *
     * @param Builder $builder
     * @param  mixed $results
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function map(Builder $builder,$results, $model)
    {
        if (count($results) === 0) {
            return Collection::make();
        }

        $keys = collect($results)
            ->pluck('id')->values()->all();

        $models = $model->getScoutModelsByIds($keys)->keyBy($model->getKeyName());

        return Collection::make($results)->map(function ($hit) use ($model, $models) {
            $key = $hit['pid'];
            if (isset($models[$key])) {
                return $models[$key];
            }
        })->filter();
    }

    /**
     * 返回搜索结果总数
     *
     * @param  mixed $results
     * @return int
     */
    public function getTotalCount($results)
    {
        return $this->xs->search->getLastCount();
    }

    protected function usesSoftDelete($model)
    {
        return in_array(SoftDeletes::class, class_uses_recursive($model));
    }

    // 执行搜索功能
    protected function performSearch(Builder $builder, array $options = [])
    {
        $search = $this->xs->search;

        if ($builder->callback) {
            return call_user_func(
                $builder->callback,
                $search,
                $builder->query,
                $options
            );
        }

        $search->setFuzzy()->setQuery($builder->query);
        collect($builder->wheres)->map(function ($value, $key) use ($search) {
            $search->addRange($key, $value, $value);
        });

        $offset = 0;
        $perPage = $options['hitsPerPage'];

        if (!empty($options['page'])) {
            $offset = $perPage * $options['page'];
        }
        return $search->setLimit($perPage, $offset)->search();
    }

    /**
     * 获取中文分词
     * @param $text
     * @return array
     */
    public function getScwsWords($text)
    {
        try {
            $tokenizer = new \XSTokenizerScws();
        } catch (\XSException $e) {
        }
        return $tokenizer->getResult($text);
    }

    /**
     * Flush all of the model's records from the engine.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function flush($model)
    {
        // TODO: Implement flush() method.
    }
}