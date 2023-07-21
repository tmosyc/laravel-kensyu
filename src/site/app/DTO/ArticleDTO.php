<?php

namespace App\DTO;

class ArticleDTO
{
    public $article_id;
    public $title;
    public $content;
    public $user_id;
    public $thumbnail_image_id;
    public $username;

    public function __construct(
        $article_id,
        $title,
        $content,
        $user_id,
        $thumbnail_image_id,
        $username
    )
    {
        $this->article_id = $article_id;
        $this->title = $title;
        $this->content = $content;
        $this->user_id = $user_id;
        $this->thumbnail_image_id = $thumbnail_image_id;
        $this->username = $username;
    }
}
