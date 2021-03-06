<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use App\Http\Requests;
use Cookie;
use App\Services\UserValidationService;


class SocialAuthController extends Controller
{
    //

    public function redirectToProvider($social_login)
    {
          return Socialite::driver($social_login)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($social_login)
    {
        try {
            $user = Socialite::driver($social_login)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
             $channel_acqusition = Cookie::get('channel_acqusition');
             $channel_acqusition = UserValidationService::processChannelAcqusition($channel_acqusition);

            $newUser                  = new User;
            $newUser->nama            = $user->name;
            $newUser->email           = $user->email;
            $newUser->id_role         =1;
            $newUser->password        =bcrypt($user->email);
            $newUser->channel_acquisition = $channel_acqusition;
            $newUser->save();

            auth()->login($newUser, true);
        }
        return redirect()->to('/home');

    }

}
