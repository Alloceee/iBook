<?php
/**
 * Created by PhpStorm.
 * User: AlmostLover
 * Date: 2019/4/29
 * Time: 23:40
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $key = $request->get("q");
        $res = DB::table('article')->where('title', 'like', '%' . $key . '%')->where('power', 2)
            ->orWhere('tags', 'like', '%' . $key . '%')
            ->orWhere('item', 'like', '%' . $key . '%')
            ->orWhere('author', 'like', '%' . $key . '%')
            ->orWhere('brief', 'like', '%' . $key . '%')->get();
        return view('home.index.search', ['res' => $res]);
//        $data =[
//            ['id' => 1, 'email' => '928240096@qq.com', 'name' => 'Shao ZeMing 邵泽明 邵澤明', 'lesson' => '朗诵主持,Reciting Hosting,朗誦主持，','desc'=>'我是谁，我在哪儿，我要做什么，我不告诉你'],
//            ['id' => 2, 'email' => '12315@qq.com', 'name' => 'Chris Dong 董胜君  董勝君', 'lesson' => '朗诵主持,Reciting Hosting,朗誦主持，演講辯論，speech debate，演讲辩论','desc'=>'如果有一天，我走了，你应该知道我去了哪儿'],
//            ['id' => 3, 'email' => 'shao-ze-ming@outlook.com', 'name' => '二傻子 Two fools', 'lesson' => '朗诵主持,Reciting Hosting,朗誦主持，','desc'=>'最近头发掉的厉害，我该怎么办好呀'],
//            ['id' => 4, 'email' => 'szm19920426@qq.com', 'name' => '君莫笑 jun mo xiao 君莫笑', 'lesson' => '写作批改,writing correction,寫作批改,国学经典,National Classics,國學經典','desc'=>'哎呀，脑壳疼，脑壳疼，脑壳疼'],
//            ['id' => 5, 'email' => '1270912585@qq.com', 'name' => '李四，li si 李四', 'lesson' => '朗诵主持,Reciting Hosting,朗誦主持，演講辯論，speech debate，演讲辩论，国学经典,National Classics,國學經典','desc'=>'你知道我对你不静静是喜欢'],
//        ];
//        $key = $request->post('p');
//        $xs = new XS(config_path('xs_article.ini'));
//        $search = $xs->search; // 获取 搜索对象
//        $query = $key;
//        $search->setQuery($query)
//            ->setSort('created_at', true) //按照chrono 正序排列
//            ->setLimit(20,0) // 设置搜索语句, 分页, 偏移量
//        ;
//
//        try {
//            $docs = $search->search();
//        } catch (\XSException $e) {
//        } // 执行搜索，将搜索结果文档保存在 $docs 数组中
//        $count = $search->count(); // 获取搜索结果的匹配总数估算值
//        foreach ($docs as $doc){
//            $subject = $search->highlight($doc->subject); // 高亮处理 subject 字段
//            $message = $search->highlight($doc->message); // 高亮处理 message 字段
//            echo $doc->rank() . '. ' . $subject . " [" . $doc->percent() . "%] - ";
//            echo date("Y-m-d", $doc->chrono) . "<br>" . $message . "<br>";
//            echo '<br>========<br>';
//        }
//        echo  '总数:'. $count;
//        $res = Xunsearch::setDatabase('article')->setLimit(15)->search('爱情');
//        //设置索引数据库
//        print_r($res);


    }

}