<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/28
 * Time: 19:49
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;
    //定义当前模型需要关联的数据表
    protected $table = 'article';
    protected $primaryKey = 'id';

    // 定义索引里面的类型，上文我们说过，可以把type理解成一个数据表。我们现在要做的就是把我们所有的要全文搜索的字段都存入到es中的一个叫'_doc'的表中。

    protected $fillable = [     //可以被赋值的字段
        'id', 'title', 'content', 'tag', 'author', 'brief'
    ];

    public function searchableAs()
    {
        return '_doc';
    }

    /**
     * 定义有那些字段需要搜索
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->only('id', 'title', 'content','author','tag','brief','item');
    }
}