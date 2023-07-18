<?php

declare(strict_types=1);

namespace App\Repo;

use App\Models\User;

class UserRegisterRepo
{
    public static function getByLoginUserInfo(string $session_email): User
    {
        $user = User::where('email',$session_email)->first();
        return $user;
    }
}
