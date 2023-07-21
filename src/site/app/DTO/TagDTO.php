<?php

declare(strict_types=1);

namespace App\DTO;

class TagDTO
{
    public $article_tag_id;
    public $tag_id;

    public function __construct($article_tag_id, $tag_id)
    {
        $this->article_tag_id = $article_tag_id;
        $this->tag_id = $tag_id;
    }
}
