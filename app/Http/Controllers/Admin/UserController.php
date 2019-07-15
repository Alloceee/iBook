<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/13
 * Time: 0:42
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $users = DB::table('user')->get();
        return view('admin.manager.user', ['users' => $users]);
    }

    //
    public function editor(Request $request)
    {
        $id = $request->route('id');
        $user = DB::table('user')->where('id', $id)->get();
        return view('admin.editor.user', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $id = $request->post('id');
        $status = $request->only('status');
        DB::table('user')->where('id',$id)->update($status);
        return redirect('admin/index/userManager');
    }

    //删除
    public function delete(Request $request)
    {
        $id = $request->route('id');
        DB::table('user')->where('id', $id)->delete();
        return redirect('admin/index/userManager');
    }

}