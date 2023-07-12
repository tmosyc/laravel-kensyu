<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class UpdateController
{
    public static function updateView($number)
    {
        return view('update',['article_id'=>$number]);
    }
    public static function updateData($number,Request $request)
    {
        Article::where('article_id',$number)->update([
            'title'=>$request->input('update_title'),
            'content' => $request->input('update_content')
        ]);
        return redirect('/posts/'.$number);
    }
}
