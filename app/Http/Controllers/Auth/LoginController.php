<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        // $user = User::where('email', $userSocial->getEmail())->first();
        $user = User::where('phone', $userSocial->getPhone())->first();
        if ($user) {
            Auth::login($user);
            return redirect($this->redirectTo);
        } else {
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'phone' => $userSocial->getPhone(),
                'password' => Hash::make(uniqid()),
            ]);
            Auth::login($user);
            return redirect($this->redirectTo);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('home');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('home');
    }

    public function login()
    {
        $credentials = request()->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            return Redirect::route('index');
        }
        return Redirect::back()->withErrors([
            'phone' => 'Неправильний телефон або пароль.',
        ]);
    }
}