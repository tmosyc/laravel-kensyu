<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class PostArticleController
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public static function articleInsert(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $insert_article = [
            'user_id' => '1',
            'title' => $title,
            'content' => $content,
            'thumbnail_image_id' => '1',
        ];
        DB::table('articles')->insert($insert_article);
        $article_list = Article::all();

        return view('posts',['articles'=>$article_list]);

//        $insert_article = [
//            'user_id' => '1',
//            'title' => 'article1',
//            'content' => 'ララベルの一つ目の記事です',
//            'thumbnail_image_id' => '1',
//        ];
    }
}
