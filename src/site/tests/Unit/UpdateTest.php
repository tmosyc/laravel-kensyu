<?php

namespace Tests\Unit;

use App\Http\Controllers\UpdateController;
use App\Models\Article;
use App\Models\User;
use App\Repo\ArticleRepo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_データがアップデートされたかどうかを確認すること()
    {
        $this->withoutMiddleware();

        $inspection_title = 'タイトル';
        $inspection_content = 'コンテンツ';
        $update_title = 'アップデートタイトル';
        $update_content = 'アップデートコンテンツ';
        Article::factory()->create([
            'user_id'=>1,
            'title'=>$inspection_title,
            'content'=>$inspection_content,
            'thumbnail_image_id' =>1,
        ]);

        $article = Article::where('article_id',1)->first();

        ArticleRepo::updateArticleRepo($article,$update_title,$update_content);
        $update_article = Article::where('article_id',1)->first();
        self::assertSame($update_title,$update_article->title);
        self::assertSame($update_content,$update_article->content);
    }
}
