<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $tags = [
            ['tagname'=>'テクノロジー'],
            ['tagname'=>'モバイル'],
            ['tagname'=>'アプリ'],
            ['tagname'=>'モバイル'],
            ['tagname'=>'エンタメ'],
            ['tagname'=>'ビューティー'],
            ['tagname'=>'ファッション'],
            ['tagname'=>'ライフスタイル'],
            ['tagname'=>'ビジネス'],
            ['tagname'=>'グルメ'],
            ['tagname'=>'スポーツ']
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
