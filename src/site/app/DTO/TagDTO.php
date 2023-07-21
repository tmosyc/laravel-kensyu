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
//    public function getArticleTagId() {
//        return $this->article_tag_id;
//    }
//    public function setArticleTagId($articleTagId) {
//        $this->article_tag_id = $articleTagId;
//    }
//    public function getTagId() {
//        return $this->tag_id;
//    }
//    public function setTagId($tag_id) {
//        $this->tag_id = $tag_id;
//    }
