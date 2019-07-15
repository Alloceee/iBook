<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/30
 * Time: 10:39
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    //展示收藏文章页面
    public function index()
    {
        $article = DB::table('collection')->join('article', 'article.aid', '=', 'collection.aid')
            ->where('account', session('username'))->orderBy('collection.created_at', 'desc')->paginate(8);
        return view('home.user.myCollection', ['articles' => $article]);
    }

    //收藏文章
    public function coll(Request $request)
    {
        //根据文章id添加评论
        $id = $request->post('id');
        $author = $request->post('author');
        $username = session('username');
        $data = [
            'aid' => $id,
            'account' => $username,
        ];
        $count = DB::table('collection')->where('aid', $id)->where('account', $username)->get()->count();
        if ($count > 0) {
            return json_encode(['msg' => "文章已经收藏"]);
        } else {
            $res = DB::table('collection')->insert($data);
            DB::table('article')->where('aid', $id)->increment('collectionCount');
            $reply = ['user_name' => $username, 'reply_type' => "收藏", 'topic_id' => $id,
                'reply_user' => $author];
            DB::table('notifications')->insert($reply);
            if ($res > 0) {
                return json_encode(['code' => "0"]);
            } else {
                return json_encode(['code' => "1"]);
            }
        }
    }

    //取消收藏
    public function dColl(Request $request)
    {
        //根据文章id删除评论
        $cid = $request->post('cid');
        $id = $request->post('id');
        $res = DB::table('collection')->where('cid', $cid)->delete();
        if ($res > 0) {
            DB::table('article')->where('aid', $id)->decrement('collectionCount');
            return json_encode(['msg' => "取消收藏成功"]);
        } else {
            return json_encode(['msg' => "取消收藏失败"]);
        }
    }

}