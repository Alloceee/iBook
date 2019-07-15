<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/25
 * Time: 22:17
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use App\Model\User;
use App\UserActivation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Object_;

class RegisterController extends Controller
{
    /**
     * 检测用户是否已经注册
     * @param Request $request
     * @return false|string
     */
    public function checkUser(Request $request)
    {
        $email = $request->post('email');
        if (!empty($email)) {
            $res = DB::table('user')->where('email', $email)->get()->count();
            if ($res > 0) {
                return "false";
            } else {
                return "true";
            }
        }
    }

    /**
     * 检测用户名是否已经存在
     * @param Request $request
     * @return false|string
     */
    public function checkUsername(Request $request)
    {
        $username = $request->post('username');
        if (!empty($username)) {
            $res = DB::table('user')->where('username', $username)->get()->count();
            if ($res > 0) {
                return "false";
            } else {
                return "true";
            }
        }
    }

    //注册
    public function signUp(Request $request)
    {

        $email = $request->post('email');
        $username = $request->post('username');
        $password = md5($request->post('password'));
        $data = [
            'email' => $email,
            'username' => $username,
            'password' => $password,
        ];
        $res = DB::table('user')->insert($data);
        if ($res > 0) {
            //发送激活邮件
            return $this->sendVerifyEmail($data);
        } else {
            return "<script>alert('注册失败,请检查用户名邮箱是否填写正确');history.back()</script>";
        }
    }

    //发送验证邮箱链接
    public function sendVerifyEmail(array $data)
    {
        // 生成唯一 token
        $token = md5($data['email']);
        $username = $data['username'];

        $to = $data['email'];
        $subject = '发送激活邮件';
        Mail::send(
            'home.email.activation',
            ['username' => $username, 'token' => $token],
            function ($message) use ($to, $subject) {
                $message->from('1184465220@qq.com', 'iBook创书网 - 激活邮件')->to($to)->subject($subject);
            }
        );
        if (count(Mail::failures()) < 1) {
            $new_user = DB::table('user')->where('username', $username)->first();
            $id = $new_user->id;
            DB::table('user_activations')->insert(['user_id' => $id, 'token' => $token, 'active' => 0]);
            return "<script>alert('注册成功，激活邮件已发送,请及时激活');location.href='http://yewenshu.top/iBook2.0/public/index.php/login'</script>";
        } else {
            return "<script>alert('发送邮件失败，请重试！');history.back()</script>";
        }

    }

    //验证激活邮箱
    public function checkVerifyEmail(Request $request)
    {
        $token = $request->get('verify');
        $res = DB::table('user_activations')->where('token', $token)->get()->count();
        $user = DB::table('user')->join('user_activations', 'user_activations.user_id', '=', 'user.id')
            ->where('token', $token)->first();
        if ($user->active == 1) {
            return "<script>alert('该邮箱已经激活，请直接登录使用！');location.href='http://yewenshu.top/iBook2.0/public/index.php/login';</script>";
        }
        if ($res > 0) {
            DB::table('user_activations')->where('token', $token)->update(['active' => 1]);
            //发送欢迎邮件
            $username = $user->username;
            $to = $user->email;
            $subject = '欢迎注册iBook创书网';
            Mail::send(
                'home.email.welcome',
                ['username' => $username],
                function ($message) use ($to, $subject) {
                    $message->from('1184465220@qq.com', 'iBook创书网')->to($to)->subject($subject);
                }
            );
            return "<script>alert('邮箱激活成功');location.href='http://yewenshu.top/iBook2.0/public/index.php/login';</script>";
        } else {
            return "<script>alert('激活失败！');history.back()</script>";
        }
    }

}