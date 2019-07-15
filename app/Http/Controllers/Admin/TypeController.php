<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/26
 * Time: 10:06
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\type;

class TypeController extends Controller
{
    public function index()
    {
        $types = DB::table('type')->get();
        return view('admin.manager.type', ['types' => $types]);
    }

    public function insert(Request $request)
    {
        $type = $request->only('typename', 'detailed');
        $res = DB::table('type')->insert($type);
        if ($res > 0) {
            return redirect('admin/index/typeManager');
        } else {
            return "<script>alert('添加失败');history.back(-1)</script>";
        }

    }

    public function editor(Request $request)
    {
        $id = $request->route('id');
        $type = DB::table('type')->where('id', $id)->get();
        return view('admin.editor.type', ['type' => $type]);
    }

    public function update(Request $request)
    {
        $id = $request->post('id');
        $type = $request->only('typename', 'count', 'detailed');
        DB::table('type')->where('id', $id)->update($type);
        return redirect('admin/index/typeManager');
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        DB::table('type')->where('id', $id)->delete();
        return redirect('admin/index/typeManager');
    }

}