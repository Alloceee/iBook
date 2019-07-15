<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/13
 * Time: 0:44
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Model\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //展示网站首页
    public function index()
    {
        //选取评论最多的前六篇
        $articles = DB::table('article')->where('power', 2)->orderBy('commentCount', 'desc')->take(6)->get();
        //用户头像信息
        $user = DB::table('user')->where('username', session('username'))->first();
        //将未读消息数加入session
        $reply = DB::table('notifications')->where('reply_user', session('username'))
            ->where('read_at', 0)->get();
        session(['reply' => count($reply)]);
        //热门评论
        $comm = DB::table('comm')->join('user', 'comm.CUsername', '=', 'user.username')
            ->join('article', 'comm.CAID', '=', 'article.aid')
            ->orderBy('comm.LikeCount', 'desc')->take(6)->get();
        //展示最新发布的文章
        $new_art = DB::table('article')->where('power', 2)->orderBy('created_at', 'desc')->take(6)->get();
        return view('home.index.welcome', ['articles' => $articles, 'user' => $user,
            'new_art' => $new_art, 'comm' => $comm]);
    }

    public function getUserArticle(Request $request)
    {
        $username = $request->get('username');
        $power = 0;//默认权限查询仅自己可见文章
        $count = $request->get('count');
        //查询用户是否已经被关注
        $fans = DB::table('fans')->join('article', 'article.author', '=', 'fans.account')
            ->where('fans.username', session('username'))
            ->where('article.author', $username)->get()->count();
        //判断用户是否是session用户，如果是查询所有问斩
        if (session('username') != $username) {
            $power = 2;
        }
        //判断用户是否关注，如果关注，查询所有文章以及仅关注人可见的文章
        if ($fans >= 1) {
            $power = 1;
        }
        $datas = DB::table('article')->where('author', $username)->where('power', '>=', $power)
            ->orderBy('created_at', 'desc')->take($count * 5)->get();
        return view('home.index.home', compact('datas'));
    }

    //展示用户资料中心
    public function user(Request $request)
    {
        $username = $request->route('username');
        $power = 0;//默认权限查询仅自己可见文章
        $user = DB::table('user')->where('username', $username)->first();

        //查询用户是否已经被关注
        $fans = DB::table('fans')->join('article', 'article.author', '=', 'fans.account')
            ->where('fans.username', session('username'))
            ->where('article.author', $username)->get()->count();
        //判断用户是否是session用户，如果是查询所有问斩
        if (session('username') != $username) {
            $power = 2;
        }
        //判断用户是否关注，如果关注，查询所有文章以及仅关注人可见的文章
        if ($fans >= 1) {
            $power = 1;
        }
        $datas = DB::table('article')->where('author', $username)->where('power', '>=', $power)->orderBy('created_at', 'desc')->get();
        //对所有标签进行去重
        $tags = array();
        foreach ($datas as $article) {
            foreach (explode(',', $article->tags) as $value) {
                $tags[] = $value;
            }
        }
        $tags = array_unique($tags);
        //该用户热门文章
        $hot_art = DB::table('article')->join('user', 'article.author', '=', 'user.username')
            ->where('article.author', $username)->where('power', '>=', $power)->orderBy('article.likeCount', 'desc')->take(2)->get();
        //该用户最新文章
        $new_art = DB::table('article')->join('user', 'article.author', '=', 'user.username')
            ->where('article.author', $username)->where('power', '>=', $power)->orderBy('article.created_at', 'desc')->take(2)->get();
        //该用户热门评论
        $comm = DB::table('comm')->join('user', 'comm.CUsername', '=', 'user.username')
            ->where('comm.CAuthor', $username)->orderBy('comm.CTime', 'desc')->take(2)->get();
        return view('home.index.userHome', compact('user', 'fans', 'tags',
            'hot_art', 'new_art', 'comm', 'username', 'datas'));
    }

    //展示文章内容
    public function article(Request $request)
    {
        $id = $request->get('id');
        $articles = DB::table('article')->where('aid', $id)->get();
        //作者
        $users = DB::table('user')
            ->join('article', 'user.username', '=', 'article.author')
            ->where('article.aid', $id)
            ->get();
        //相关文章
        $type = $author = "";
        foreach ($articles as $article) {
            $type = $article->type;
            $author = $article->author;
        }
        //查询用户是否已经被关注
        $fans = DB::table('fans')->join('article', 'article.author', '=', 'fans.account')
            ->where('fans.username', session('username'))
            ->where('article.author', $author)->get()->count();
        $power = 0;//默认查询文章权限为仅自己可见
        //判断用户是否是session用户，如果是查询所有问斩
        if (session('username') != $author) {
            $power = 2;
        }
        //判断用户是否关注，如果关注，查询所有文章以及仅关注人可见的文章
        if ($fans >= 1) {
            $power = 1;
        }
        $datas = DB::table('article')->where('author', $author)->where('power', '>=', $power)->orderBy('created_at', 'desc')->get();
        $tags = array();
        foreach ($datas as $article) {
            foreach (explode(',', $article->tags) as $value) {
                $tags[] = $value;
            }
        }
        $tags = array_unique($tags);
        $links = DB::table('article')->where('type', $type)->where('power', '>=', $power)
            ->orderBy('commentCount', 'desc')->take(2)->get();

        //该用户热门文章
        $hot_art = DB::table('article')->join('user', 'article.author', '=', 'user.username')
            ->where('user.username', $author)->where('power', '>=', $power)->orderBy('article.likeCount', 'desc')->take(2)->get();
        //该用户最新文章
        $new_art = DB::table('article')->join('user', 'article.author', '=', 'user.username')
            ->where('user.username', $author)->where('power', '>=', $power)->orderBy('article.created_at', 'desc')->take(2)->get();
        //该用户热门评论
        $comm = DB::table('comm')->join('user', 'comm.CUsername', '=', 'user.username')
            ->where('comm.CAuthor', $author)->orderBy('comm.CTime', 'desc')->take(2)->get();
        return view('home.article.show', compact('articles', 'links',
            'users', 'fans', 'hot_art', 'new_art', 'comm', 'tags'));
    }

    //展示所有文章
    public function allArticle()
    {
        //将未读消息数加入session
        $reply = DB::table('notifications')->where('reply_user', session('username'))
            ->where('read_at', 0)->get();
        session(['reply' => count($reply)]);
        $articles = DB::table('article')->where('power', 2)
            ->orderBy('created_at', 'desc')->paginate(8);
        $types = DB::table('type')->get();
        $hot_art = DB::table('article')->where('power', 2)
            ->orderBy('collectionCount', 'desc')->orderBy('created_at', 'desc')->take(20)->get();
        return view('home.index.article', compact('articles', 'types', 'hot_art'));
    }

    //获取对应分类下的文章
    public function getArticle(Request $request)
    {
        $type = $request->get('type');
        $articles = DB::table('article')->where('power', 2)->where('type', $type)
            ->orderBy('created_at', 'desc')->paginate(8);
        $types = DB::table('type')->get();
        $hot_art = DB::table('article')->where('power', 2)
            ->orderBy('collectionCount', 'desc')->orderBy('created_at', 'desc')->take(20)->get();
        return view('home.index.article', compact('articles', 'types', 'hot_art'));
    }

}