<?php

namespace Tests\Unit;

use App\Http\Controllers\PostArticleController;
use App\Models\Image;
use App\Repo\PostArticleRepo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class ImageTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    public function test_画像がdbに保存されること()
    {
        Image::factory()->create();

        PostArticleRepo::insertImageRepo(2,2,'jpg');


        $this -> assertDatabaseHas('images',[
                'article_id'=>2,
            ]
        );
    }
}
