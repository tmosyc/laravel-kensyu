<?php

namespace App\DTO;

class ArticleDTO
{
    public function __construct(
        public int $article_id,
        public string $title,
        public string $content,
        public int $user_id,
        public int $thumbnail_image_id,
        public string $username
    )
    {
    }
}
