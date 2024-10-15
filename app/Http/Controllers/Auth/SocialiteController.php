<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
class SocialiteController extends Controller
{
    public function loginSocial(Request $request, string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callbackSocial(Request $request, string $provider)
    {
        $response = Socialite::driver($provider)->user();
        $user = User::firstOrCreate(
            ['email' => $response->getEmail()],
            ['password' => Hash::make(uniqid())]
        );
        $data = [$provider . '_id' => $response->getId()];
        if ($user->wasRecentlyCreated) {
            $data['name'] = $response->getName() ?? $response->getNickname();
        }
        $user->update($data);
        Auth::login($user, true);
        return redirect()->intended('/');
    }
}
