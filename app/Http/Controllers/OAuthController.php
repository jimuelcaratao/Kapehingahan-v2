<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;

class OAuthController extends Controller
{
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {

        // add stateless if error
        $user = Socialite::driver('facebook')->stateless()->user();

        $existingUser = User::where('external_id', $user->getId())->first();

        if ($existingUser) {

            Auth::login($existingUser);
            return redirect('/dashboard');
        }

        if ($existingUser === null) {
            try {

                $new_user = User::create([
                    'external_provider' => 'Facebook',
                    'name' => $user->getName(),
                    'email' =>  $user->getEmail(),
                    'external_id' =>  $user->getId(),
                ]);

                Auth::login($new_user, true);
                return redirect('/dashboard');
            } catch (QueryException $e) {

                $errorCode = $e->errorInfo[1];

                //code duplicate entry
                if ($errorCode == '1062') {
                    return redirect('/dashboard')->withErrors('Cannot create a account email is already taken. Please use another email.');
                }
            }
        }
    }

    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */

    public function callbackGoogle()
    {

        $user = Socialite::driver('google')->stateless()->user();

        $existingUser = User::where('external_id', $user->getId())->first();

        // already exist callback need 

        if ($existingUser && $existingUser->is_banned != '') {
            return redirect('/login')->withInfo('Your account is currently banned. :(');
        }
        if ($existingUser) {
            Auth::login($existingUser);
            return Redirect::route('dashboard');
        }

        if ($existingUser === null) {
            try {
                $new_user = User::create([
                    'external_provider' => 'Google',
                    'external_id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' =>  $user->getEmail(),
                ]);

                Auth::login($new_user, true);
                return Redirect::route('dashboard');
            } catch (QueryException $e) {

                $errorCode = $e->errorInfo[1];

                if ($errorCode == '1062') {
                    return Redirect::route('register')->withErrors('Cannot create a account email is already taken. Please use another email.');
                }
            }
        }
    }
}
