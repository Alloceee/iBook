<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/13
 * Time: 10:53
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/allArticle';
    protected $username;


    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    //自动验证
    protected function guard()
    {
        return auth()->guard('web');
    }

    /**
     *退出跳转到登录页面
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }

    protected function attemptLogin(Request $request)
    {
        $username = $request->input('login-form-username');
        $password = $request->input('login-form-password');
//        // 验证用户名登录方式
        $usernameLogin = $this->guard()->attempt(
            ['username' => $username, 'password' => $password], $request->has('remember')
        );
//        // 验证手机号登录方式
//        $mobileLogin = $this->guard()->attempt(
//            ['phone' => $phone, 'password' => $password], $request->has('remember')
//        );
        // 验证邮箱登录方式
//        $emailLogin = $this->guard()->attempt(
//            ['email' => $email, 'password' => $password], $request->has('remember')
//        );

        if ($usernameLogin) {
            session(['username' => $username]);
            return redirect('/allArticle');
        } else {
            return "<script>alert('登录失败,请检查用户名和密码是否正确');history.back()</script>";
        }
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function username()
    {
        return 'username';
    }


}