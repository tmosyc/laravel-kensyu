<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repo\UserRegisterRepo;
use Faker\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use WithoutMiddleware;

    public function test_登録情報のリクエストが送られた時にDBに登録されるか確認すること()
    {
        $this->withoutMiddleware();

        User::factory()->create();
        $user_register_mock = [
            'register_name'=>'mike',
            'register_email'=>'mike@example.com',
            'register_password'=>'mike5555'
        ];

        $res = $this->post('/register',$user_register_mock);

        $res->assertStatus(302);
        $this -> assertDatabaseHas('users',[
            'email'=>$user_register_mock['register_email']
            ]
        );
    }

    public function test_セッションに登録するための関数から値が取れること()
    {
        $email = 'mike@example.com';
        User::factory()->create([
            'name'=>'mike',
            'email'=>$email,
            'password'=>'mike5555'
        ]);

        $user = User::where('email', $email)->first();

        $login_user = UserRegisterRepo::getByLoginUserInfo($user->email);

        self::assertSame('mike',$login_user->name);
    }
}
