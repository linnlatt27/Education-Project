<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    //direct github
    public function loginGithub() {
        return Socialite::driver('github')->redirect();
    }

    //call back github
    public function callbackGithub() {
        $user = Socialite::driver('github')->stateless()->user();
        $this->registerOrLoginUser($user);

        return redirect()->route('user#home');

    }
  
    //protected register or user
    protected function registerOrLoginUser($data) {
        $user =User::where('email','=',$data->email)->first();
        if(!$user) {
            $user =new User();
            $user->name =$data->nickname;
            $user->email =$data->email;
            $user->provider_id =$data->id;
            $user->avatar =$data->avatar;
            $user->save();
        }
        Auth::login($user);
    }
}
