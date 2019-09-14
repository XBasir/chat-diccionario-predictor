<?php

namespace App\Http\Controllers\Auth;

use App\RoleUser;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated($request, $user)
{
    $role = new RoleUser; $role->user_id=0;
    $role = RoleUser::where('user_id', $user->id)
    ->first();
    if($role && $role->user_id ==1) {
        return redirect()->intended('/admin/dashboard');
    }
    return redirect()->intended('/dashboard');
}


}
