<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/12
 * Time: 23:46
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/index/welcome';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    //自动验证
    protected function guard()
    {
        return auth()->guard('admin');
    }

    /**
     * 后台管理员退出跳转到后台登录页面
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/admin');
    }

    protected function attemptLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        // 验证邮箱登录方式
        $emailLogin = $this->guard()->attempt(
            ['username' => $username, 'password' => $password], $request->has('remember')
        );
        if ($emailLogin) {
            $user = DB::table('manager')->join('role', 'role.role_id', '=', 'manager.role_id')
                ->where('username', $username)->first();
            session(['power' => $user->role_id]);
            session(['grade' => $user->role_name]);
            session(['admin' => $username]);
            return redirect('/admin/index/welcome');
        } else {
            return "<script>alert('登录失败,请检查用户名和密码是否错误');history.back()</script>";
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