<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Social_Login;
use Socialite,Auth;

class SocialLoginController extends Controller
{
    public function redirectToProviderFacebook () {
    	return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook () {
		$user_login = Socialite::driver('facebook')->user();
		$social     = Social_Login::where('provider_user_id',$user_login->id)
                    	->where('provider','facebook')->first();

        if ($social) {
            $user = User::where('email',$user_login->email)->first();
            Auth::login($user);
            return redirect('/');
        } else {
            $login = new Social_Login;
            $login->provider_user_id = $user_login->id;
            $login->provider = 'facebook';

            $user = User::where('email',$user_login->email)->first();

            if (!$user) {
                $user = User::create([
					'password'  => str_random(20),
					'firstname' => $user_login->name,
					'avatar'    => $user_login->avatar,
					'email'     => $user_login->email,
					'level'     => 2,
					'status'    => 'on'
                ]);
            }

            $login->user_id = $user->id;
            $login->save();
            Auth::login($user);
            return redirect('/');
        }
    }

    public function redirectToProviderGoogle () {
    	return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle () {
    	$user_login = Socialite::driver('google')->user();
		$social     = Social_Login::where('provider_user_id',$user_login->id)
                    	->where('provider','google')->first();

        if ($social) {
            $user = User::where('email',$user_login->email)->first();
            Auth::login($user);
            return redirect('/');
        } else {
            $login = new Social_Login;
            $login->provider_user_id = $user_login->id;
            $login->provider = 'google';

            $user = User::where('email',$user_login->email)->first();

            if (!$user) {
                $user = User::create([
					'password'  => str_random(20),
					'firstname' => $user_login->name,
					'avatar'    => $user_login->avatar,
					'email'     => $user_login->email,
					'level'     => 2,
					'status'    => 'on'
                ]);
            }

            $login->user_id = $user->id;
            $login->save();
            Auth::login($user);
            return redirect('/');
        }
    }
}
