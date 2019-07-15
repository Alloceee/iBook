<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/8
 * Time: 18:46
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Integer;
use function PHPSTORM_META\type;

class ArticlesController extends Controller
{
    /**
     * 写文章
     */
    public function write()
    {
        $types = DB::table('type')->get();
        return view('home.article.write', ['types' => $types]);
    }

    /**
     * 上传文章封面
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadCovers(Request $request)
    {
        //判断是否有文件上传成功
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            //有文件上传
            $filename = "images/cover/" . sha1(time() . $request->file('file')->getClientOriginalName()) . "."
                . $request->file('file')->getClientOriginalExtension();
            //文件保存、移动
//            if($path!='/images/cover75bc28c6d5f323fb4a4f8edfff149075616f2dd7.jpg'){
//                Storage::delete('public' . $path);
//            }
            Storage::disk('public')->put($filename, file_get_contents($request->file('file')->path()));
            //返回数据
            $result = [
                'errCode' => '0',
                'errMsg' => '',
                'Msg' => '文件上传成功',
                'path' => '/storage/' . $filename
            ];
        } else {
            //没有文件被上传或出错
            $result = [
                'errCode' => '000001',
                'Msg' => "文件上传失败"
            ];
        }
        //返回信息
        return response()->json($result);
    }


    /**
     * 保存文章
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $article = $request->only('article-content', 'article-covers', 'article-tags',
            'article-item', 'article-type', 'article-title', 'article-brief', 'article-power');
        if ($article['article-covers'] == null) {
            $article['article-covers'] = "/storage/images/cover/2cbcf9174d623c72debacd4b57d8432da2a65d3b.jpeg";
        }
        $data = [
            'author' => session('username'),
            'title' => $article['article-title'],
            'brief' => $article['article-brief'],
            'type' => $article['article-type'],
            'tags' => $article['article-tags'],
            'item' => $article['article-item'],
            'cover' => $article['article-covers'],
            'power' => $article['article-power']
        ];
        //获取文本编辑器中的文章内容
        $filename = "article/" . $data['type'] . "/" . sha1(time() . $data['title']) . ".text";
        //将内容添加到以时间和文章标题命名的.text文件中
        if (Storage::disk('public')->put($filename, $article['article-content'])) {
            $data['content'] = "/storage/" . $filename;
            //将文件路径添加进数据库，文章上传成功
            $res = DB::table('article')->insert($data);
            DB::table('type')->where('typename', $data['type'])->increment('count');
            if ($res > 0) {
                return "<script>alert('文章上传成功');location.href='http://yewenshu.top/iBook2.0/public/index.php/index/listArticles'</script>";
            }
        } else {
            return "<script>alert('文章上传失败');history.back()</script>";
        }

    }

    /**
     * 文章刪除
     * @param Request $request
     * @return string
     */
    public function delete(Request $request)
    {
        $id = $request->route('id');
        $art = DB::table('article')->where('aid', $id)->first();

        if (Storage::disk('public')->exists(substr($art->content, 9))) {
            $text = Storage::disk('public')->delete(substr($art->content, 9));
            $db = DB::table('article')->where('aid', $id)->delete();
            DB::table('type')->where('typename', $art->type)->decrement('count');
            if ($text == true && $db > 0) {
                return "<script>alert('文章删除成功');location.href='http://yewenshu.top/iBook2.0/public/index.php/index/listArticles'</script>";
            } else {
                return "<script>alert('文章删除失败');history.back()</script>";
            }
        }
    }

    /**
     * 文章修改
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editorShow(Request $request)
    {
        $id = $request->get('id');
        $articles = DB::table('article')->where('aid', $id)->get();
        $types = DB::table('type')->get();
        return view('home.article.editor', ['articles' => $articles, 'types' => $types]);
    }

    public function editor(Request $request)
    {
        $article = $request->only('article-content', 'article-covers', 'article-tags',
            'article-item', 'article-type', 'article-title', 'article-brief', 'article-path', 'article-power');
        $data = [
            'author' => session('username'),
            'title' => $article['article-title'],
            'brief' => $article['article-brief'],
            'type' => $article['article-type'],
            'tags' => $article['article-tags'],
            'item' => $article['article-item'],
            'power' => $article['article-power'],
            'cover' => $article['article-covers']
        ];
        //将内容添加到以时间和文章标题命名的.text文件中
        $id = $request->get('id');
        if (Storage::disk('public')->put(substr($article['article-path'], 9), $article['article-content'])) {
            //将文件路径添加进数据库，文章上传成功
            $res = DB::table('article')->where('aid', $id)->update($data);
            if ($res >= 0) {
                return "<script>alert('文章修改成功');location.href='http://yewenshu.top/iBook2.0/public/index.php/index/listArticles'</script>";
            } else {
                return "<script>alert('文章修改失败');history.back()</script>";
            }
        }
    }

}