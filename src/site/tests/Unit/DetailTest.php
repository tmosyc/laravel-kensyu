<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Repo\ArticleRepo;


class DetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_詳細画面における文字がdbから取得できること()
    {

        $inspection_title = 'タイトル';
        $inspection_content = 'コンテンツ';
        Article::factory()->create([
            'user_id'=>1,
            'title'=>$inspection_title,
            'content'=>$inspection_content,
            'thumbnail_image_id' =>1,
        ]);

        $detail_article = ArticleRepo::detailArticle(1);
        self::assertSame($inspection_title,$detail_article->title);
        self::assertSame($inspection_content,$detail_article->content);
    }
}
