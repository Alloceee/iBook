<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/27
 * Time: 14:33
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function myItems()
    {
        $articles = DB::table('article')->where('author', session('username'))->get();
        $item = array();
        foreach ($articles as $article) {
            $item[] = $article->item;
        }
        $items = array_unique($item);
        $item_art = array();
        $i = 0;
        foreach ($items as $value) {
            $art = DB::table('article')->where('author', session('username'))
                ->where('item', $value)->get();
            $item_art[$i]['item'] = $value;
            $item_art[$i]['article'] = $art;
            $i++;
        }
        return view('home.user.myItems', compact('items', 'item_art'));
    }

}