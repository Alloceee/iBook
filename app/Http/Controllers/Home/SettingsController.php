<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/16
 * Time: 21:56
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    //基礎設置頁面
    public function index()
    {
        return view('home.index.settings');
    }

    //修改設置
    public function editor()
    {

    }

    //关于我们资料
    public function about()
    {
        $user = DB::table('user')->get()->count();
        $article = DB::table('article')->get();
        $number = 0;
        $comm = 0;
        foreach ($article as $value) {
            $number = $number + $value->collectionCount;
            $comm = $comm + $value->commentCount;
        }
        return view('home/index/aboutUs', ['user' => $user, 'article' => count($article)
            , 'coll' => $number, 'comm' => $comm]);
    }

}