<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/8
 * Time: 18:51
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Notifications\TopicReplied;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 評論管理控制器
 * Class CommController
 * @package App\Http\Controllers
 */
class CommController extends Controller
{
    /**
     * 评论管理
     */
    public function myComments()
    {
        $username = session('username');
        //我的评论
        $myComm = DB::table('comm')
            ->join('article', 'comm.CAID', '=', 'article.aid')
            ->where('comm.CUsername', $username)
            ->get();
        //收到的评论
        $recComm = DB::table('comm')
            ->join('article', 'comm.CAID', '=', 'article.aid')
            ->where('comm.CAuthor', $username)
            ->get();
        return view('home.user.myComments', ['myComm' => $myComm, 'recComm' => $recComm]);
    }

    public function getComments(Request $request)
    {
        $id = $request->get('id');
        $count = $request->get('count');
        //评论
        $comments = DB::table('comm')
            ->join('user', 'user.username', '=', 'comm.CUsername')
            ->where('comm.CAID', $id)->orderBy('comm.CTime', 'desc')
            ->take($count * 4)->get();
        return view('home.comm.comment', compact('comments'));

    }


    /**
     * 評論文章
     * @param Request $request
     * @return string
     */
    public function comment(Request $request)
    {
        //根据文章id添加评论
        $id = $request->post('id');
        $comment = $request->post('comment');
        $username = session('username');
        $author = $request->post('author');
        $data = [
            'CAID' => $id,
            'CContent' => $comment,
            'CUsername' => $username,
            'CAuthor' => $author,
        ];
        $res = DB::table('comm')->insert($data);
        DB::table('article')->where('aid', $id)->increment('commentCount');
        $reply = ['user_name' => $username, 'reply_type' => "评论", 'topic_id' => $id,
            'reply_user' => $author];
        DB::table('notifications')->insert($reply);
        if ($res > 0) {
            $comments = DB::table('comm')
                ->join('user', 'user.username', '=', 'comm.CUsername')
                ->where('comm.CAID', $id)->orderBy('comm.CTime', 'desc')
                ->take(4)->get();
            return view('home.comm.comment', compact('comments'));
        } else {
            $comments = DB::table('comm')
                ->join('user', 'user.username', '=', 'comm.CUsername')
                ->where('comm.CAID', $id)->orderBy('comm.CTime', 'desc')
                ->take(4)->get();
            return view('home.comm.comment', compact('comments'));
        }
    }

    /**
     * 刪除評論
     * @param Request $request
     * @return string
     */
    public function delete(Request $request)
    {
        //根据评论id删除
        $id = $request->route('id');
        $art = DB::table('comm')->where('CID', $id)->first();
        $res = DB::table('comm')->where('CID', $id)->delete();
        if ($res > 0) {
            DB::table('article')->where('aid', $art->CAID)->decrement('commentCount');
            return redirect('index/myComments');
        } else {
            return "<script>alert('删除失败');history.back()</script>";
        }

    }

    /**
     * 修改評論
     */
    public function update()
    {
        //根据评论id修改评论
    }
}