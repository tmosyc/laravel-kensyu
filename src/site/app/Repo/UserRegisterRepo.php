<?php

declare(strict_types=1);

namespace App\Repo;

use App\Models\User;

class UserRegisterRepo
{
    public static function sessionId($session_email)
    {
        $user = User::where('email',$session_email)->first();
        $user_id=$user->id;
        return $user_id;
    }
}
