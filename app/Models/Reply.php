<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/22
 * Time: 11:25
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //定义当前模型需要关联的数据表
    protected $table = 'notifications';
    protected $primaryKey = 'notifiable_id';

    // 定义索引里面的类型，上文我们说过，可以把type理解成一个数据表。我们现在要做的就是把我们所有的要全文搜索的字段都存入到es中的一个叫'_doc'的表中。

    protected $fillable = [     //可以被赋值的字段
         'user_name', 'reply_type', 'topic_id','reply_user','read_at'
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
        return $this->only('user_name', 'reply_type', 'topic_id','reply_user','read_at');
    }

}