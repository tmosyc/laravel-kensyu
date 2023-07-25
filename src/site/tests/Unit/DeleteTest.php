<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Repo\ArticleRepo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_dbから削除されていること(): void
    {
        $this->withoutMiddleware();

        Article::factory()->create([
            'user_id'=>1,
            'title'=>'タイトル',
            'content'=>'コンテンツ',
            'thumbnail_image_id' =>1,
        ]);

        ArticleRepo::deleteRepo(1);


        $this->assertDatabaseCount('articles', 0);
    }

}
