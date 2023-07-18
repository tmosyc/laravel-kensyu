<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Repo\UserRegisterRepo;


class PostRegisterController
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function registerNextView(RegisterRequest $request)
    {
        self::registerUserInfo($request);
        return redirect('/posts');
    }

    /**
     * @param RegisterRequest $request
     * @return void
     */
    public static function registerUserInfo(RegisterRequest $request): void
    {
        $validatedData = $request->validated();
        $name = $validatedData['register_name'];
        $email = $validatedData['register_email'];
        $password = $validatedData['register_password'];
        $password_hash = Hash::make($password);

        $insert_user = [
            'name' => $name,
            'email' => $email,
            'password' => $password_hash
        ];
        try {
            User::create($insert_user);
            Session::put('name',$name);
            Session::put('email',$email);
            Session::put('id',UserRegisterRepo::sessionId($email));
        } catch (\Exception $e){
            info($e ->getMessage());
        }
    }
}
