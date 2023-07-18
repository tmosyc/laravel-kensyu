<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Article::class;


    public function definition(): array
    {
        return [
            'article_id'=>1,
            'user_id' => 1, // 関連するUserモデルのインスタンスを生成する
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'thumbnail_image_id' =>1,
        ];
    }
}
