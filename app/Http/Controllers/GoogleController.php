<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{   
    //direct login google
    public function loginGoogle() {
        return Socialite::driver('google')->redirect();
    }
  
    //call back google
    public function callbackGoogle() {
        try {

         $user =Socialite::driver('google')->stateless()->user();

         $googleUser=User::where('email',$user->getEmail())->first();

         if(!$googleUser) {

            $newUser =User::updateOrCreate([
                'google_id'=>$user->getId()
            ],[
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'password'=>Hash::make($user->getName().'@'.$user->getId())
            ]);

         }else {
            $newUser =User::where('email',$user->getEmail())->update([
                'google_id'=>$user->getId()
            ]);
            $newUser =User::where('email',$user->getEmail())->first();        
         }
         Auth::loginUsingId($newUser->id);
         return redirect()->route('user#home');

        } catch (\Throwable $th){
            throw $th;
        }
    }
}
