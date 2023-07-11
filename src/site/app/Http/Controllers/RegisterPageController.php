<?php
declare(strict_types=1);

namespace App\Http\Controllers;
class RegisterPageController
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public static function registerPageView()
    {
        return view('register');
    }
}
