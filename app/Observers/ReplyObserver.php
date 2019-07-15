<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/29
 * Time: 19:30
 */

namespace App\Observers;
use App\Models\Reply;
use App\Notifications\TopicReplied;

class ReplyObserver
{
    public function created(Reply $reply)
    {
        $reply->topic->reply_count = $reply->topic->replies->count();
        $reply->topic->save();

        // 通知话题作者有新的评论
        $reply->topic->user->notify(new TopicReplied($reply));
    }


}