<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/25
 * Time: 11:39
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\DB;

class LogController
{
    public function userLog()
    {
        $logs = DB::table('user_log')->get();
        return view('admin.manager.userLog', ['logs' => $logs]);
    }

    public function adminLog()
    {
        $logs = DB::table('admin_log')->get();
        return view('admin.manager.adminLog', ['logs' => $logs]);
    }

}