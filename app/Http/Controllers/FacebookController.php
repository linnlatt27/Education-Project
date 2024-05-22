<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{  
    //direct facebook 
    public function facebookPage() {
        return Socialite::driver('facebook')->redirect();
    }
    
    //sign up facebook and login
    public function facebookRedirect() {
        try {
            $user =Socialite::driver('facebook')->stateless()->user();

            $findUser =User::where('facebook_id',$user->id)->first();

            if($findUser) {
                Auth::login($findUser);
                return redirect()->route('user#home');
            }else {               
            $newUser =User::updateOrCreate([
                'email'=>$user->email
            ],[
                'name'=>$user->name,
                'facebook_id'=>$user->id,
                'password'=>encrypt('123456linn')
            ]);
            Auth::login($newUser);
            return redirect()->route('user#home');
            }
        }catch(Exception $e) {
            dd($e->getMessage());
        }
    }
}
