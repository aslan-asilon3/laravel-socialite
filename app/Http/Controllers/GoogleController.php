<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use Exception;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

        // return Socialite::driver('google')
        // ->with(
        //     ['client_id' => '450995278514-pjdum6b2r2b7ql1cau9qdfrvn6mh6s3f.apps.googleusercontent.com'],
        //     ['client_secret' => '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'],
        //     ['redirect' => 'http://localhost:8000/auth/google/callback'])
        // ->redirect();

    }

    public function handleGoogleCallback()

    {

        try {

      

            $user = Socialite::driver('google')->user();

       

            $finduser = User::where('google_id', $user->id)->first();

       

            if($finduser){

       

                Auth::login($finduser);

      

                return redirect()->intended('home');

       

            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id,

                    'password' => encrypt('123456dummy')

                ]);

      

                Auth::login($newUser);

      

                return redirect()->intended('home');

            }

      

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }
}
