<?php

namespace Tests\Unit;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_登録情報のリクエストが送られた時にDBに登録されるか確認すること()
    {

        User::factory()->create();
        $user_register_mock = [
            'register_name'=>'mike',
            'register_email'=>'mike@example.com',
            'register_password'=>'mike5555'
        ];

        $res = $this->post('/register',$user_register_mock);

        $res -> assertStatus(302);
        $this -> assertDatabaseHas('users',[
            'email'=>$user_register_mock['register_email']
            ]
        );
    }
}
