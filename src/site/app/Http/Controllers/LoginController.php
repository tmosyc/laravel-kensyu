<?php
declare(strict_types=1);

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public static function loginPageView()
    {
        return view('login');
    }


    /**
     * ログイン認証
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function loginAuth(LoginRequest $request)
    {
        $validatedData = $request->validated();
        $login_form_email = $validatedData['login_email'];
        $login_form_password = $validatedData['login_password'];
        try {
            $auth_user = User::where('email', $login_form_email)->first();

            if ($auth_user != null) {
                $auth_password_check = self::loginPasswordAuth($login_form_password, $auth_user->password);

                if (isset($auth_user->email) && $auth_password_check === true) {
                    Session::put('name', $auth_user->name);
                    Session::put('email', $auth_user->email);
                    return redirect('posts');
                } else {
                    return redirect('login');
                }
            } else {
                return redirect('login');
            }
        } catch (\Exception $e) {
           info($e ->getMessage());
           return redirect('login')->with('db_error','データの取得に失敗しました');
        }
    }

    /**
     * @param $request_password
     * @param $db_hash_password
     * @return bool
     */

     private static function loginPasswordAuth($request_password, $db_hash_password): bool
     {

         if (Hash::check($request_password, $db_hash_password)){
             $auth_check = true;
         } else {
             $auth_check = false;
         }
         return $auth_check;
     }
}
