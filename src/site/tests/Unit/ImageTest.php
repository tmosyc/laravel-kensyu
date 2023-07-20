<?php

namespace Tests\Unit;

use App\Http\Controllers\PostArticleController;
use App\Models\Image;
use App\Repo\PostArticleRepo;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Mockery;
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

    public function test_画像の名前の配列が取得できること(): void
    {
        $dummyFile1 = UploadedFile::fake()->image('test_image1.jpg');
        $dummyFile2 = UploadedFile::fake()->image('test_image2.jpg');
        $dummyFile3 = UploadedFile::fake()->image('test_image3.jpg');

        $dummyFilesArray = [
            $dummyFile1,
            $dummyFile2,
            $dummyFile3,
        ];

        $collect_array = [
            'test_image1.jpg',
            'test_image2.jpg',
            'test_image3.jpg'
        ];

        $mock = Mockery::mock(Request::class);
        $mock -> shouldReceive('hasFile')->with('images')->andReturn($dummyFilesArray);
        $mock -> shouldReceive('file')->with('images')->andReturn($dummyFilesArray);

        $controller = new PostArticleController();
        $result = $controller->imageArray($mock);
        self::assertSame($collect_array,$result);
    }

    public function test_サムネイルが取得できること():void
    {
        $image_array = [
            'test_image1.jpg',
            'test_image2.jpg',
            'test_image3.jpg'
        ];

        $thumbnail_image_name = 'test_image2.jpg';

        $thumbnail_number = PostArticleController::thumbnailCheck($image_array,$thumbnail_image_name);
        self::assertSame($thumbnail_number,1);
    }
}
