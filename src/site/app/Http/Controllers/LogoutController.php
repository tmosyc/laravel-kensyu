<?php

use Illuminate\Support\Facades\Session;

class LogoutController
{
    public static function logout(){
        Session::forget('name');
        Session::forget('email');
        return redirect('posts');
    }
}
