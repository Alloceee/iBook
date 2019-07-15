<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/8
 * Time: 13:38
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function checkUsername(Request $request)
    {
        $username = $request->post('username');
        $old = $request->post('old');
        if ($username != $old) {
            $res = DB::table('user')->where('username', $username)->get()->count();
            if ($res > 0) {
                return "false";
            } else {
                return "true";
            }
        } else {
            return "true";
        }
    }

    public function checkEmail(Request $request)
    {
        $email = $request->post('email');
        $old = $request->post('old');
        if ($email != $old) {
            $res = DB::table('user')->where('email', $email)->get()->count();
            if ($res > 0) {
                return "false";
            } else {
                return "true";
            }
        } else {
            return "true";
        }
    }

    public function checkPhone(Request $request)
    {
        $phone = $request->post('phone');
        $old = $request->post('old');
        if ($phone != $old) {
            $res = DB::table('user')->where('phone', $phone)->get()->count();
            if ($res > 0) {
                return "false";
            } else {
                return "true";
            }
        } else {
            return "true";
        }
    }

    /**
     * 修改个人资料页面
     */
    public function updateProfile()
    {
        $user = DB::table('user')->where('username', session('username'))->get();
        return view('home.user.updateProfile', ['user' => $user]);
    }

    /**
     * 修改個人信息
     * @param Request $request
     * @return string
     */
    public function updateUser(Request $request)
    {
        $user = $request->only('username', 'email', 'phone', 'sex', 'profile');
        session(['username' => $request->post('username')]);
        $id = $request->post('id');
        $res = DB::table('user')->where('id', $id)->update($user);
        if ($res > 0) {
            return redirect(route('user', ['username' => session('username')]));
        } else {
            return "<script>alert('修改失败');history.back()</script>";
        }
    }

    /**
     * 上传头像
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadIcon(Request $request)
    {
        $path = substr($request->post('path'), 8);
        //判断是否有文件上传成功
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            //有文件上传
            $filename = "images/icon/" . sha1(time() . $request->file('file')->getClientOriginalName()) . "."
                . $request->file('file')->getClientOriginalExtension();
            //文件保存、移动,将之前的头像删除
            if ($path != 'home/static/images/user.png') {
                Storage::disk('public')->delete($path);
            }
            Storage::disk('public')->put($filename, file_get_contents($request->file('file')->path()));
            //返回数据
            $result = [
                'errCode' => '0',
                'errMsg' => '',
                'Msg' => '头像上传成功',
                'path' => '/storage/' . $filename
            ];
            $icon = ['icon' => '/storage/' . $filename];
            $res = DB::table('user')->where('username', session('username'))->update($icon);
        } else {
            //没有文件被上传或出错
            $result = [
                'errCode' => '000001',
                'Msg' => "头像上传失败"
            ];
        }
        if ($res) {
            //返回信息
            return response()->json($result);
        } else {
            return response()->json(['Msg' => "头像上传失败"]);
        }
    }

    /**
     * 展示文章列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function listArticles()
    {
        $username = session('username');
        //展示所有文章
        $articles = DB::table('article')->where('author', $username)->orderBy('created_at', 'desc')->paginate(8);
        $types = DB::table('type')->get();
        return view('home.user.myArticles', compact('articles', 'types'));
    }

    public function getArticle(Request $request)
    {
        $type = $request->get('type');
        $username = session('username');
        $types = DB::table('type')->get();
        //展示所有文章
        $articles = DB::table('article')->where('author', $username)->where('type', $type)
            ->orderBy('created_at', 'desc')->paginate(8);
        return view('home.user.myArticles', compact('articles', 'types'));
    }
}