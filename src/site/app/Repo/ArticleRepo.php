<?php declare(strict_types=1);

namespace App\Repo;

use App\Models\Article;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ArticleRepo
{
    public static function detailArticle(int $article_id)
    {
        $detail_article = Article::where('article_id',$article_id)->first();

        return $detail_article;
    }

    public static function articleIdList()
    {
        $article_id_list = Article::select('article_id')->get();
        return $article_id_list;
    }

    public static function updateArticleRepo($article,$update_title, $update_content)
    {
        try {
            if ($article) {
                $article->update([
                    'title' => $update_title,
                    'content' => $update_content
                ]);
                DB::commit();
                return response()->json(['message' => 'Success'], 200);
            }
        } catch (\Exception $e) {
            info($e);
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public static function getByDetailImages(int $article_id)
    {
        $article_images = Image::where('article_id',$article_id)->get();
        return $article_images;
    }

    public static function getUsername($user_id)
    {
        $username = User::where('id',$user_id)->first();
        return $username;
    }

    public static function deleteRepo($article_id)
    {
        Article::where('article_id',$article_id)->delete();
    }
}
