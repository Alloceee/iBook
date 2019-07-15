<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/25
 * Time: 23:11
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CodeController extends Controller
{
    public function checkPhone(Request $request)
    {
        $phone = $request->post('phone');
        $res = DB::table('user')->where('phone', $phone)->get()->count();
        if ($res > 0) {
            return "true";
        } else {
            return "false";
        }
    }

    public function checkEmail(Request $request)
    {
        $email = $request->post('email');
        $res = DB::table('user')->where('email', $email)->get()->count();
        if ($res > 0) {
            return "true";
        } else {
            return "false";
        }
    }

    //获取手机验证码
    public function getCode(Request $request)
    {
        $code = rand(1000, 9999);
        $phone = $request->post('phone');
        $host = "http://yzxyzm.market.alicloudapi.com";
        $path = "/yzx/verifySms";
        $method = "POST";
        $appcode = "41f47e47440b44eb87a847a145a36721";//替换成自己的阿里云appcode
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "phone=" . $phone . "&templateId=TP18040314&variable=code%3A" . $code;
        $bodys = "";
        $url = $host . $path . "?" . $querys;//url拼接

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        //curl_setopt($curl, CURLOPT_HEADER, true); 如不输出json, 请打开这行代码，打印调试头部状态码。
        //状态码: 200 正常；400 URL无效；401 appCode错误； 403 次数用完； 500 API网管错误
        if (1 == strpos("$" . $host, "https://")) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        $out_put = curl_exec($curl);
        session(['code' => $code]);
        return $out_put;
    }

    //绑定邮箱发送验证码
    public function sendCodeEmail(Request $request)
    {
        $code = rand(1000, 9999);
        // 在函数内，例如post获得email地址之后调用：
        $to = $request->post('email');
        $res = DB::table('user')->join('user_activations', 'user_activations.user_id', '=', 'user.id')
            ->where('email', $to)->first();
        if ($res->active == 1) {
            $subject = 'iBook - 验证码 ';
            Mail::send(
                'home.email.code',
                ['code' => $code],
                function ($message) use ($to, $subject) {
                    $message->from('1184465220@qq.com', 'iBook创书网 - 验证码')->to($to)->subject($subject);
                }
            );
            if (count(Mail::failures()) < 1) {
                session(['code' => $code]);
                return json_encode(['message' => '验证码发送成功，请注意查收']);
            } else {
                return json_encode(['message' => '验证码发送失败，请重新再试']);
            }
        } else {
            return json_encode(['message' => '该邮箱未注册或者未激活，查看是否填写错误，如有需要请联系管理员']);
        }
    }
}