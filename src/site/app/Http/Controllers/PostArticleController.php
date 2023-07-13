<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostArticleController
{
    public static function postTopPage()
    {
        if (self::login_check()===true){
            self::articleInsert(request());
            $article_list = Article::all();
            return view('posts',['articles'=>$article_list]);
        } else {
            return redirect('posts');
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public static function articleInsert(Request $request)
    {
        if (self::login_check())
        $title = $request->input('title');
        $content = $request->input('content');
        $user_info = self::returnUserInfo();
        $insert_article = [
            'user_id' => $user_info[0],
            'title' => $title,
            'content' => $content,
            'thumbnail_image_id' => '1',
        ];
        DB::table('articles')->insert($insert_article);
    }
    public static function returnUserInfo(): array
    {
        $session_email = Session::get('email');
        $user_record = DB::table('users')->where('email',$session_email)->first();
        return [$user_record->id,$user_record->name];
    }
    private static function login_check():bool
    {
        if (Session::get('email') !== null)
        {
            $check = true;
        } else {
            $check = false;
        }
        return $check;
    }
}
