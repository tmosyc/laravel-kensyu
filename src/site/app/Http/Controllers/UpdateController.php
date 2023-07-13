<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class UpdateController
{
    public static function updateView($article_id)
    {
        return view('update',['article_id'=>$article_id]);
    }
    public static function updateData($article_id,Request $request)
    {
        Article::where('article_id',$article_id)->update([
            'title'=>$request->input('update_title'),
            'content' => $request->input('update_content')
        ]);
        return redirect('/posts/'.$article_id);
    }
}
