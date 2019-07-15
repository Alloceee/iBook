<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotController extends Controller
{
    //修改密码
    public function editorPassword(Request $request)
    {
        $phone = $request->post('forget-form-phone');
        $email = $request->post('forget-form-email');
        $code = $request->post('forget-form-code');
        if ($code == session('code')) {
            if (!empty($phone)) {
                $new_pwd = md5($request->post('forget-form-password1'));
                $data = ['password' => $new_pwd];
                $res = DB::table('user')->where('phone', $phone)->update($data);
                if ($res > 0) {
                    return redirect('/login');
                } else {
                    return "<script>alert('密码修改失败');history.back()</script>";
                }
            } else {
                $new_pwd = md5($request->post('forget-form-password2'));
                $data = ['password' => $new_pwd];
                $res = DB::table('user')->where('email', $email)->update($data);
                if ($res > 0) {
                    return redirect('/login');
                } else {
                    return "<script>alert('密码修改失败');history.back()</script>";
                }
            }
        } else {
            return "<script>alert('验证码填写错误');history.back()</script>";
        }
    }

}
