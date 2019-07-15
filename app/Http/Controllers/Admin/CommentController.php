<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/24
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comments = DB::table('comm')->join('article','article.aid','=','comm.CAID')->get();
        return view('admin.manager.comment', ['comments' => $comments]);
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        DB::table('comm')->where('CID', $id)->delete();
        return redirect('admin/index/commentManager');
    }
}