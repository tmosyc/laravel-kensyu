<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class loginTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_ログインした時にpostsのパスにリダイレクトされるか確認する()
    {
        $this->withoutMiddleware();

        User::factory()->create(
            ['email'=>'tom@example.com',
            'password'=>'password']
        );

        $res = $this->post('/login',[
            'login_email'=>'tom@example.com',
            'login_password'=>'password'
        ]);

        $res -> assertRedirect('/posts');
    }
    public function test_入力情報が登録されていなかった時loginのパスにリダイレクトされるか確認する()
    {
        $res = $this->post('/login',[
            'login_email'=>'none@example.com',
            'login_password'=>'password'
        ]);
        $res -> assertRedirect('/login');
    }
}
