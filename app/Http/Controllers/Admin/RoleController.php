<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/25
 * Time: 17:46
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = DB::table('role')->get();
        return view('admin.manager.role', ['roles' => $roles]);
    }

    public function insert(Request $request)
    {
        $role = $request->only('role_name','role_power');
        Auth::check();
        $res = DB::table('role')->insert($role);
        if ($res > 0) {
            return redirect('admin/index/powerManager');
        } else {
            return "<script>alert('添加失败，请重新再试');history.back()</script>";
        }
    }

    public function editor(Request $request)
    {
        $id = $request->route('id');
        $roles = DB::table('role')->where('role_id',$id)->first();
        return view('admin.editor.role',compact('roles'));
    }

    public function update(Request $request)
    {
        $role = $request->only('role_power','role_name','role_status');
        $id = $request->post('id');
        DB::table('role')->where('role_id',$id)->update($role);
        return redirect('admin/index/powerManager');
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        DB::table('role')->where('role_id',$id)->delete();
        return redirect('admin/index/powerManager');
    }

}