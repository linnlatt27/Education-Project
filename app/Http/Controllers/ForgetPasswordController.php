<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{  
    //direct fb acc
    public function forgetPasswordPage() {
         return view('forgetPassword');
    }
    
    //direct email page
    public function forgetPasswordPost(Request $request) {
        $request->validate([
            'email'=>'required|email|exists:users,email',
        ]);

        $token =\Str::random(60);

        PasswordResetToken::updateOrCreate([
            'email'=>$request->email,
        ],

            [
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>now(),
            ]
            );
        
            Mail::to($request->email)->send(new ResetPasswordMail($token));


        return redirect()->route("auth#forgetPasswordPage")->with("success","We have send an email to reset password");
    }
      
    //reset pw token
    public function resetPassword(Request $request,$token) {
       $getToken =PasswordResetToken::where('token',$token)->first();
   
      
       if(!$getToken) {
        return redirect()->route('auth#loginPage')->with('failed','Token has valid');
       }
        return view("newPassword",compact('token'));
    }
   
    //update pw
    public function resetPasswordPost(Request $request) {
        $request->validate([
            'password'=>'required|min:8',
        ]);

        $token =PasswordResetToken::where('token',$request->token)->first();
       
        if(!$token) {
            return redirect()->route('auth#loginPage')->with('failed','Token has valid');
        }
     
        $user =User::where('email',$token->email)->first();
    
      
        if(!$user) {
            return redirect()->route('auth#loginPage')->with('failed','Email has valid'); 
        }

        $user->update([
            'password'=>Hash::make($request->password)
        ]);
      

        $token->where('token',$request->token)->delete();
        return redirect()->route('auth#loginPage')->with('success','Password has been updated'); 
    }

}
