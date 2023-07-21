<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repo\ArticleTagRepo;
use App\Repo\PostArticleRepo;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Collection;

class PostArticleController extends Controller
{
    public static function postTopPage(?string $session_email)
    {
        if (self::loginCheck($session_email)===true){
            self::articleInsert(request(), $session_email);
            $article_list = Article::all();
            $tag_list = ArticleTagRepo::getByTagName();
            return view('posts',['articles'=>$article_list,'tag_list'=>$tag_list]);
        } else {
            return view('posts',['error'=>'ログインされていないので投稿できませんでした']);
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public static function articleInsert(Request $request, string $session_email): void
    {
        if (self::loginCheck($session_email))
        $title = $request->input('title');
        $content = $request->input('content');
        $images = $request->file('images');
        $images_has = $request->hasFile('images');
        $thumbnail_image_name = $request->input('check');
        $user_info = self::returnUserInfo($session_email);
        $image_array = self::imageArray($images,$images_has);
        $thumbnail_number = self::thumbnailCheck($image_array,$thumbnail_image_name);

        $insert_article = [
            'user_id' => $user_info[0],
            'title' => $title,
            'content' => $content,
            'thumbnail_image_id' => $thumbnail_number
        ];

        $article_id = Article::insertGetId($insert_article);
        self::storeArticleImage(request(),$article_id);
        self::storeThumbnail($article_id,$thumbnail_number,request());
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

    public static function storeArticleImage(Request $request,int $article_id): void
    {
        $images = $request->file('images');
        $resource_id = 0;
        foreach ($images as $image) {
            $mime = $image->getClientOriginalExtension();
            if ($mime==='jpg'){
                $image->storeAs('public/article/'.$article_id, $resource_id . ".jpg");
            }
            if ($mime==='png'){
                $image->storeAs('public/article/'.$article_id, $resource_id . ".png");
            }
            PostArticleRepo::insertImageRepo($article_id,$resource_id,$mime);
            $resource_id = $resource_id + 1;
        }
    }

    public static function thumbnailCheck(array $image_array,string $thumbnail_image_name): int | null
    {
        if ($image_array && $thumbnail_image_name) {
            $thumbnail_number = array_search($thumbnail_image_name, $image_array);
        } else {
            $thumbnail_number = null;
        }
        return $thumbnail_number;
    }

    public static function imageArray(array $files,bool $images_has): array
    {
        $image_array = [];
        if ($images_has) {
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $image_array[] = $fileName;
            }
        }
        return $image_array;
    }

    private static function storeThumbnail(int $article_id,int $thumbnail_number,Request $request): string
    {
        if ($request->hasFile('images')) {
            $thumbnail_image = $request->file('images')[$thumbnail_number];
            $mime = $thumbnail_image->getClientOriginalExtension();
            if ($mime === 'jpg') {
                $thumbnail_image->storeAs('public/thumbnail/' . $article_id, $thumbnail_number . ".jpg");
            }
            if ($mime === 'png') {
                $thumbnail_image->storeAs('public/thumbnail/' . $article_id, $thumbnail_number . ".png");
            }
        }
        return $mime;
    }
}
