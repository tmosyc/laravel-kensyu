<?php

declare(strict_types=1);

namespace App\DTO;

class TagDTO
{
    public function __construct(
        public int $article_tag_id,
        public string $tag_id
    )
    {
    }
}
