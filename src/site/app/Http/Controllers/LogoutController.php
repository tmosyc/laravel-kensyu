<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LogoutController
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function logout(){
        Session::forget('name');
        Session::forget('email');
        return redirect('posts');
    }
}
