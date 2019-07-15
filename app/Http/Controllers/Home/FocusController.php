<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/9
 * Time: 11:14
 */

namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 关注用户与点赞文章
 * Class FocusController
 * @package App\Http\Controllers
 */
class FocusController
{
    /**
     * 我关注的用户
     */
    public function myFocusUser()
    {
        $users = DB::table('fans')->join('user', 'user.username', '=', 'fans.account')
            ->where('fans.username', session('username'))->orderBy('created_at', 'desc')->get();
        return view('home.user.myFocus', compact('users'));
    }

    /**
     * 我关注的用户发布的文章
     */
    public function myFocus()
    {
        //查询关注用户除私密文章以外文章
        $article = DB::table('fans')->join('article', 'article.author', '=', 'fans.account')
            ->where('power', '!=', 0)->where('fans.username', session('username'))
            ->orderBy('article.created_at', 'desc')->paginate(8);
        return view('home.user.myFocusArticle', ['articles' => $article]);
    }

    /**
     * 关注用户
     * @param Request $request
     * @return false|string
     */
    public function focus(Request $request)
    {
        $account = $request->post('account');
        $data = [
            'username' => session('username'),
            'account' => $account
        ];
        $res = DB::table('fans')->insert($data);
        if ($res > 0) {
            $reply = ['user_name' => session('username'), 'reply_type' => "关注",
                'reply_user' => $account];
            DB::table('notifications')->insert($reply);
            return json_encode(['code' => "0"]);
        } else {
            return json_encode(['code' => "1"]);
        }
    }

    /**
     *取消关注
     * @param Request $request
     * @return false|string
     */
    public function d_focus(Request $request)
    {
        $account = $request->post('account');
        $data = [
            'username' => session('username'),
            'account' => $account
        ];
        $res = DB::table('fans')->where($data)->delete();
        if ($res > 0) {
            return json_encode(['code' => "0"]);
        } else {
            return json_encode(['code' => "1"]);
        }
    }

    /**
     * 点赞文章
     * @param Request $request
     * @return false|string
     */
    public function like(Request $request)
    {
        $id = $request->post('id');
        $author = $request->post('author');
        $res = DB::table('article')->where('aid', $id)->increment('likeCount');
        if ($res > 0) {
            $reply = ['user_name' => session('username'), 'reply_type' => "点赞", 'topic_id' => $id,
                'reply_user' => $author];
            DB::table('notifications')->insert($reply);
            return json_encode(['code' => "0"]);
        } else {
            return json_encode(['code' => "1"]);
        }
    }

    /**
     * 点赞评论
     * @param Request $request
     * @return false|string
     */
    public function commLike(Request $request)
    {
        $id = $request->post('id');
        $res = DB::table('comm')->where('CID', $id)->increment('LikeCount');
        if ($res > 0) {
            return json_encode(['code' => 0]);
        } else {
            return json_encode(['code' => 1]);
        }
    }

}