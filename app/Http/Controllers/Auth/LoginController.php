<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Psy\Util\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function google()
    {

        return Socialite::driver('google')->redirect();
    }
    public function googlecallback()
    {
        $googleuser = Socialite::driver('google')->user();
        $user = User::where('email' , $googleuser->email)->first();

        if($user){
            auth()->loginUsingId($user->id);
        }
        else{
            $newuser = User::create([
                'name'=>$googleuser->name,
                'email' => $googleuser->email,
                'password' =>bcrypt(\Str::random(16))
            ]);
                auth()->loginUsingId($newuser->id);
        }
        return redirect('/');
    }
}
