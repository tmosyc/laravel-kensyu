<?php

declare(strict_types=1);

namespace App\Repo;

use App\Models\Tag;

class ArticleTagRepo
{
    public static function getByTagName()
    {
        return Tag::all();

    }
}
