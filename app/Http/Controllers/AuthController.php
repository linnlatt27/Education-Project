<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //direct login page
  public function loginPage() {
    return view('auth.login');
  }
   
  //direct register page
  public function registerPage() {
    return view('auth.register');
  }

  //dashboard
  public function dashboard() {
    if(Auth::user()->role == 'admin') {
        return redirect()->route('admin#categoryList');
    }
    return redirect()->route('user#home');
}


}
