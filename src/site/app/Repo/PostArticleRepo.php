<?php

declare(strict_types=1);

namespace App\Repo;

use App\Models\Article;
use App\Models\Image;

class PostArticleRepo
{
    public static function articleInsertRepo(array $insert_article)
    {
        Article::insert($insert_article);
    }

    public static function insertImageRepo($article_id,$resource_id,$mime)
    {
        $insert_image = [
            'article_id'=>$article_id,
            'resource_id'=>$resource_id,
            'mime'=>$mime
        ];
        Image::insert($insert_image);
    }
}
