<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/20
 * Time: 22:55
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{

    //联系我们发送邮件
    public function sendEmail(Request $request)
    {
        // 在函数内，例如post获得email地址之后调用：
        $message = $request->only('template-contactform-name', 'template-contactform-email',
            'template-contactform-phone', 'template-contactform-service', 'template-contactform-subject',
            'template-contactform-message');
        $to = $request->post('template-contactform-email');
        $subject = '联系我们';
        Mail::send(
            'home.email.email',
            ['content' => $message],
            function ($message) use ($to, $subject) {
                $message->from('1184465220@qq.com','iBook创书网 - 联系我们')->to('1184465220@qq.com')->subject($subject);
            }
        );
        if (count(Mail::failures()) < 1) {
            return "<script>alert('邮件发送成功');history.back()</script>";
        } else {
            return "<script>alert('发送邮件失败，请重试！');history.back()</script>";
        }
    }

}