<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/24
 * Time: 17:19
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNoti(Request $request)
    {
        $count = $request->get('count');
        $notifications = DB::table('notifications')->join('user', 'notifications.user_name', '=', 'user.username')
            ->join('article', 'notifications.topic_id', '=', 'article.aid')
            ->where('reply_user', session('username'))->where('read_at', 0)
            ->take($count * 5)->get();
        $noti_focus = DB::table('notifications')->join('user', 'notifications.user_name', '=', 'user.username')
            ->where('reply_user', session('username'))
            ->where('topic_id', 0)->where('read_at', 0)
            ->take($count * 5)->get();
        return view('notifications.notification', compact('notifications', 'noti_focus'));
    }

    public function read(Request $request)
    {
        $id = $request->route('id');
        $data = ['read_at' => 1];
        DB::table('notifications')->where('notifiable_id', $id)->update($data);
        return redirect('notifications');
    }
}