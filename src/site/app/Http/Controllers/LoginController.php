<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController
{
    public static function loginPageView()
    {
        return view('login');
    }

//    public static function loginNextView()
//    {
//        self::loginAuth(request());
//        return redirect('/posts');
//    }

    public static function loginAuth(Request $request)
    {
        $login_form_email = $request->input('login_email');
        $login_form_password = $request->input('login_password');
        $auth_user = DB::table('users')->where('email', $login_form_email)->first();

        if ($auth_user != null) {
            $auth_password_check = self::loginPasswordAuth($login_form_password, $auth_user->password);

            if (isset($auth_user->email) && $auth_password_check === 'success') {
                Session::put('name',$auth_user->name);
                Session::put('email', $auth_user->email);
                return redirect('posts');
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

     private static function loginPasswordAuth($request_password, $db_hash_password)
     {

         if (Hash::check($request_password, $db_hash_password)){
             $auth_check = 'success';
         } else {
             $auth_check = 'fail';
         }
         return $auth_check;
     }
}
