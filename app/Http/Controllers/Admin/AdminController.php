<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/23
 * Time: 13:55
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $managers = DB::table('manager')->join('role', 'role.role_id', '=', 'manager.role_id')->get();
        return view('admin.manager.admin', ['managers' => $managers]);
    }

    public function addShow()
    {
        $roles = DB::table('role')->get();
        return view('admin.add.admin', ['roles' => $roles]);
    }

    public function add(Request $request)
    {
        $manager = [
            'username' => $request->post('username'),
            'password' => md5($request->post('password')),
            'role_id' => $request->post('role_id')
        ];
        $res = DB::table('manager')->insert($manager);
        if ($res > 0) {
            return redirect('/admin/index/adminManager');
        } else {
            return "<script>alert('添加管理员失败');history.back()</script>";
        }
    }

    public function editor(Request $request)
    {
        $id = $request->route('id');
        $manager = DB::table('manager')->where('id', $id)->get();
        return view('admin.editor.manager', compact('manager'));
    }

    public function update(Request $request)
    {
        $id = $request->post('id');
        $status = $request->only('status');
        DB::table('manager')->where('id', $id)->update($status);
        return redirect('/admin/index/adminManager');
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        DB::table('manager')->where('id', $id)->delete();
        return redirect('/admin/index/adminManager');
    }
}