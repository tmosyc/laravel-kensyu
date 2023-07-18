<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostArticleController
{
    public static function postTopPage(?string $session_email)
    {
        if (self::loginCheck($session_email)===true){
            self::articleInsert(request(), $session_email);
            $article_list = Article::all();
            return view('posts',['articles'=>$article_list]);
        } else {
            return view('posts',['error'=>'ログインされていないので投稿できませんでした']);
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public static function articleInsert(Request $request, string $session_email)
    {
        if (self::loginCheck($session_email))
        $title = $request->input('title');
        $content = $request->input('content');
        $user_info = self::returnUserInfo($session_email);
        $insert_article = [
            'user_id' => $user_info[0],
            'title' => $title,
            'content' => $content,
            'thumbnail_image_id' => '1',
        ];
        DB::table('articles')->insert($insert_article);
    }
    public static function returnUserInfo(?string $session_email): array
    {
        $user_record = DB::table('users')->where('email',$session_email)->first();
        return [$user_record->id,$user_record->name];
    }
    private static function loginCheck(?string $session_email):bool
    {
        if ($session_email !== null)
        {
            $check = true;
        } else {
            $check = false;
        }
        return $check;
    }
}
