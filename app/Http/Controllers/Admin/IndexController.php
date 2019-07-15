<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/13
 * Time: 0:12
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController
{

    //权限概览
    public function rolePower()
    {
        $roles = DB::table('role')->get();
        return view('admin.index.power', ['roles' => $roles]);
    }

    //首页-框架页面
    public function welcome()
    {
        $user = DB::table('user')->get()->count();
        $article = DB::table('article')->get()->count();
        $coll = DB::table('collection')->get()->count();
        $comment = DB::table('comm')->get()->count();

        $data = [
            'user' => $user,
            'article' => $article,
            'coll' => $coll,
            'comment' => $comment,
        ];
        //最近每个月注册用户和上传文章折线图
        $user_article_count = array();
        $now = date('Y-m', time() + 2592000);
        for ($i = 0; $i <= 4; $i++) {
            $now = date('Y-m', time() + 2592000 - 2592000 * $i);
            $users = DB::table('user')->orderBy('CTime', 'desc')->where('CTime', '<=', $now)->get();
            $articles = DB::table('article')->orderBy('created_at','desc')->where('created_at','<=',$now)->get();
            $user_article_count[$i]['user'] = count($users);
            $user_article_count[$i]['article'] = count($articles);
            $user_article_count[$i]['time'] = substr(date('Y-m', time() + 2592000 - 2592000 * ($i+1)),5,2);
        }
        for ( $i=0;$i<count($user_article_count)-1;$i++){
            $user_article_count[$i]['user'] = $user_article_count[$i]['user']-$user_article_count[$i+1]['user'];
            $user_article_count[$i]['article'] = $user_article_count[$i]['article']-$user_article_count[$i+1]['article'];
        }
//        dd($user_article_count);

        //各类书籍数量
        $type = DB::table('type')->get();
        $type_art = array();
        $i = 0;
        foreach ($type as $value) {
            $type_art[$i]['type'] = $value->typename;
            $type_art[$i]['count'] = $value->count;
            $i++;
        }

        //获取收藏数最多的前四篇文章
        $coll_art = DB::table('article')->orderBy('collectionCount', 'desc')->take(4)->get();
        $coll_art_count = array();
        $i = 0;
        foreach ($coll_art as $value) {
            $coll_art_count[$i]['title'] = $value->title;
            $coll_art_count[$i]['count'] = $value->collectionCount;
            $i++;
        }
        //各类书籍的点赞和收藏量
        $like_comm_count = array();
        $i = 0;
        foreach ($type as $value) {
            $type_arts = DB::table('article')->where('type', $value->typename)->get();
            $likeCount = $commCount = 0;
            foreach ($type_arts as $item) {
                $likeCount = $likeCount + $item->likeCount;
                $commCount = $commCount + $item->commentCount;
            }
            $like_comm_count[$i]['type'] = $value->typename;
            $like_comm_count[$i]['likeCount'] = $likeCount;
            $like_comm_count[$i]['commCount'] = $commCount;
            $i++;
        }
//        dd($type_art);
//        dd($like_comm_count);
//        dd($coll_art_count[0]);
        return view('admin.index.welcome', ['data' => $data, 'coll_art' => $coll_art_count,
            'type_art' => $type_art, 'like_comm_count' => $like_comm_count,'user_article_count'=>$user_article_count]);
    }

    public function userHome(Request $request)
    {
        $username = $request->route('username');
        $data = DB::table('manager')->where('username', $username)->get();
        return view('admin.index.userHome', compact('data'));
    }
}