<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/25
 * Time: 10:43
 */

namespace App\Http\Middleware;


//每次请求都记录下请求方式、请求地址、提交数据
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOperationLog {
    public function handle(Request $req, Closure $next) {
        $user_id = 0;
        if(Auth::guard('web')->check()) {
            $user_id = (int) Auth::guard('web')->user()->id;
        }
        $input = $req->all();
        //只记录POST请求
        if ($req->method() == 'POST') {
            $log = new \App\Models\UserOperationLog();
            $data = [
                'uid' => $user_id,
                'path' => $req->path(),
                'method' => $req->method(),
                'ip' => $req->getClientIp(),
                'data' => json_encode($input, JSON_UNESCAPED_UNICODE),
            ];
            $log->save($data);
        }
        return $next($req);
    }
}