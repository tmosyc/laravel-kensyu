<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PostRegisterController
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function registerNextView()
    {
        self::registerUserInfo(request());
        return redirect('/posts');
    }

    /**
     * @param Request $request
     * @return void
     */
    public static function registerUserInfo(Request $request): void
    {
        $name = $request->input('register_name');
        $email = $request->input('register_email');
        $password = $request->input('register_password');
        $password_hash = Hash::make($password);

        $insert_user = [
            'name' => $name,
            'email' => $email,
            'password' => $password_hash
        ];
        DB::table('users')->insert($insert_user);
        Session::put('name',$name);
        Session::put('email',$email);
    }
}
