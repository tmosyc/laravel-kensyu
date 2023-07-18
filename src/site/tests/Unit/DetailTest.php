<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Repo\ArticleRepo;


class DetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_詳細画面における文字がdbから取得できること()
    {

        $inspection_title = 'タイトル';
        $inspection_content = 'コンテンツ';
        Article::factory()->create([
            'user_id'=>1,
            'title'=>$inspection_title,
            'content'=>$inspection_content,
            'thumbnail_image_id' =>1,
        ]);

        $detail_article = ArticleRepo::detailArticle(1);
        self::assertSame($inspection_title,$detail_article->title);
        self::assertSame($inspection_content,$detail_article->content);
    }
}

//    public function
    /**
     * A basic unit test example.
     */
//    public function test_articleのモックに記事を投稿した後、一番目のurlを押すと詳細画面に遷移すること()
//    {
//        $this->withoutMiddleware();
//
//        //Session::put('email','test@example.com';
//
//        Article::factory()->create([
//            'user_id'=>1,
//            'title'=>'あああ',
//            'content'=>'いいい',
//            'thumbnail_image_id' =>1,
//        ]);
////        $response = $this->post('/posts',$article_mock);
////        $response -> assertStatus(302);
//
//
//        $response = $this->get('/posts/1');
//        $response->assertStatus(200);
//    }
////    }
////
////    public function test_記事一覧画面からurlを押した記事のarticle_idと記事詳細画面に遷移した時のarticle_idが同じこと()
////    {
////
////    }
////    public function test_記事一覧画面からurlを押した記事のtitleと記事詳細画面に遷移した時に表示されたtitleが同じこと()
////    {
////
////    }
////    public function test_記事一覧画面からurlを押した記事のcontentと記事詳細画面に遷移した時に表示されたcontentが同じこと()
////    {
////
////    }
//}
