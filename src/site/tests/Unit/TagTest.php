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

    public function test_タグを登録するための配列を作成できること()
    {
        $collect_dto = [
            new TagDTO(1,2),
            new TagDTO(1,3),
            new TagDTO(1,4),
            new TagDTO(1,5)
        ];

        $tag_array =[
            0 => "2",
            1 => "3",
            2 => "4",
            3 => "5",
        ];
        $result = PostArticleController::createInsertTagArray(1,$tag_array);
        self::assertSame($collect_dto,$result);

    }
}
