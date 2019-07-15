<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/24
 * Time: 22:09
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = DB::table('article')->get();
        return view('admin.manager.article', ['articles' => $articles]);
    }

    public function editor(Request $request)
    {
        $id = $request->route('id');
        $article = DB::table('article')->where('aid', $id)->get();
        return view('admin.editor.article', ['article' => $article]);
    }

    public function update(Request $request)
    {
        $id = $request->post('aid');
        $article = $request->only('commentCount','likeCount','collectionCount');
        DB::table('article')->where('aid', $id)->update($article);
        return redirect('admin/index/articleManager');
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        DB::table('article')->where('aid',$id)->delete();
        return redirect('admin/index/articleManager');
    }
}