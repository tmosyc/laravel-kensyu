<?php

namespace Tests\Unit;

use App\DTO\TagDTO;
use App\Http\Controllers\PostArticleController;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_タグを登録するための配列を作成できること(): void
    {
        $collect_dto = [
            new TagDTO(5,"2"),
            new TagDTO(5,"3"),
            new TagDTO(5,"4"),
            new TagDTO(5,"5"),
        ];

        $tag_array =["2","3","4","5"];
        $result = PostArticleController::createInsertTagArray(5,$tag_array);
        self::assertEquals($collect_dto,$result);
    }
}
