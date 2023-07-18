<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Repo\ArticleRepo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UpdateController
{
    public static function updateView(int $article_id)
    {
        $article_id_list = ArticleRepo::articleIdList();
        if ($article_id_list->contains('article_id', $article_id)) {
            return view('update', ['article_id' => $article_id]);
        }
        return view('notfound');
    }
    public static function updateData(int $article_id,?int $session_id,Request $request)
    {
        $update_title=$request->input('update_title');
        $update_content=$request->input('update_content');

        $article = Article::where([
            ['article_id', $article_id],
            ['user_id',$session_id]
            ]);
        $article_id_list = ArticleRepo::articleIdList();

        if (!$article_id_list->contains('article_id', $article_id)) {
            return view('notfound');
        }

        if ($article) {
            $response = ArticleRepo::updateArticleRepo($article,$update_title,$update_content);
            $status = $response->getStatusCode();
            if ($status===500){
                return redirect('/posts/',$article_id.'/update');
            }
        }

        return redirect('/posts/'.$article_id);
    }
}
