<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/29
 * Time: 10:25
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    //自动验证
    protected function guard()
    {
        return auth()->guard('web');
    }

    //调用qq登录界面
    public function qq()
    {
        return Socialite::with('qq')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('qq')->user();
        $data = [
            'username' => $user->getNickname(),
            'email' => $user->getEmail(),
            'icon' => $user->getAvatar(),
            'openid' => $user->getId()

        ];
        //判断该用户是否已经注册
        $username = DB::table('user')->where('username', $data['username'])->get()->count();
        if ($username > 0) {
            //判断用户是否已经绑定qq
            $current_user = User::where('openid', $user->getId())->first();
            if ($current_user) {
                if(!empty(session('username'))){
                    return "<script>alert('您已绑定qq');window.close()</script>";
                }
                Auth::login($current_user);
                session(['username' => $data['username']]);
                return redirect('/');
            } else {
                if (Auth::check()) {
                    DB::table('user')->where('username', session('username'))->update(['openid' => $data['openid']]);
                    return "<script>alert('绑定成功');location.href='http://yewenshu.top/iBook2.0/public/index.php/index/updateProfile'</script>";
                } else {
                    return "<script>alert('您还未绑定qq，请先绑定再登录');location.href='http://yewenshu.top/iBook2.0/public/index.php/login'</script>";
                }
            }
        } else {
            $res = DB::table('user')->insert($data);
            if ($res) {
                session(['username' => $data['username']]);
                return redirect('addProfile');
            } else {
                return "<script>alert('注册失败');history.back()</script>";
            }
        }
    }

    //完善密码信息
    public function addPassword(Request $request)
    {
        $password = md5($request->post('password'));
        $username = session('username');
        $data = ['password' => $password];
        $res = DB::table('user')->where('username', $username)->update($data);
        if ($res > 0) {
            $user = User::where('username', $username)->first();
            Auth::login($user);
            return redirect('/');
        } else {
            return "<script>alert('新密码与原密码一致');history.back()</script>";
        }

    }


}