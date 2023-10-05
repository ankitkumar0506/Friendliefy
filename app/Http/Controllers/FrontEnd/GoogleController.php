<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('/home');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'username'=> $user->name.time(),
                    'mobile'=> $user->name.time(),


                ]);
                $details = [
                    'title' => 'Mail from shopping app .com',
                    'body' => 'This is for testing email using smtp'
                ];

                \Mail::to($user->email)->send(new \App\Mail\MyTestMail($details));
                    // dd("after");


                Auth::login($newUser);

                return redirect()->intended('/home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
