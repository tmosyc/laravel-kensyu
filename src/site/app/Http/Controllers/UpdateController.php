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
    public static function updateView($article_id)
    {
        $article_id_list = ArticleRepo::articleIdList();
        if ($article_id_list->contains('article_id', $article_id)) {
            return view('update',['article_id'=>$article_id]);
        } else {
            return view('notfound');
        }
    }
    public static function updateData($article_id,Request $request)
    {
        $article = Article::where('article_id', $article_id);
        $user = User::where('id', $article->first()->user_id)->first();

        $article_id_list = ArticleRepo::articleIdList();

        if (!$article_id_list->contains('article_id', $article_id)) {
            return view('notfound');
        }

        try {
            if ($article && $user->email === Session::get('email')) {
                $article->update([
                    'title' => $request->input('update_title'),
                    'content' => $request->input('update_content')
                ]);
                DB::commit();
            }
        } catch (\Exception $e) {
            info($e);
            DB::rollBack();
            return redirect('/posts/'.$article_id . '/update');
        }
        return redirect('/posts/'.$article_id);
    }
}
