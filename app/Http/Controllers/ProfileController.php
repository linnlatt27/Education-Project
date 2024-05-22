<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //direct change pw page
    public function directChangePassword() {
        return view('admin.profile.changePassword');
    }

    //direct profile details
    public function profileDetails() {
        return view('admin.profile.details');
    }

    //change pw admin's acc
    public function changePassword(Request $request) {
        $validator =$this->changePasswordValidationCheck($request);
        
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $dbData =User::where('id',Auth::user()->id)->first();
        $dbPassword =$dbData->password;

        $hashUserPassword =Hash::make($request->newPassword);

        $updateData =[
            'password'=>$hashUserPassword,
            'updated_at'=>Carbon::now()
        ];

        if(Hash::check($request->oldPassword,$dbPassword)) {
            User::where('id',Auth::user()->id)->update($updateData);
            return view('auth.login');
        }else {
            return back()->with(['fail'=>'Old Password do not Match']);
        }
    }

    //direct edit page
    public function edit() {
        return view('admin.profile.edit');
    }

     //direct account list
     public function accountList() {
        $account =User::when(request('key'),function($query){
                $query->orWhere('name','like','%'.request('key').'%')
                      ->orWhere('email','like','%'.request('key').'%');
              })
              ->where('role','admin')
                  ->paginate(5);
       return view('admin.profile.list',compact('account'));
    }

    //delete account
    public function delete($id) {
        User::where('id',$id)->delete();
        return redirect()->route('account#list')->with(['deleteSuccess'=>'Account Deleted']);
    }
    
    //admin's account change role
    public function accountChangeRole(Request $request) {
        $updateSource = [
            'role'=>$request->role
        ];
        User::where('id',$request->userId)->update($updateSource);
    }

    //update profile
    public function update($id,Request $request) {
        $this->profileValidationCheck($request);
        $data =$this->getUserData($request);

        if($request->hasFile('image')) {
            $dbImage =User::where('id',$id)->first();
            $dbImage =$dbImage->image;

            if($dbImage !=null) {
                Storage::delete('public/'.$dbImage);
            }

            $fileName =uniqid() .$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] =$fileName;
        }

        User::where('id',$id)->update($data);
        return redirect()->route('profile#details')->with(['updateSuccess'=>'Account profile updated']);
    }

    //profileValidationCheck
    private function profileValidationCheck(Request $request) {
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'image'=>'mimes:jpg,jpeg,png,webp|file'
        ])->validate();
    }
     
    //get user data
    private function getUserData(Request $request) {
        return [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'updated_at'=>Carbon::now(),
        ];
    }
     
    //change pw validation check
    private function changePasswordValidationCheck($request) {
        $validationRules = [
            'oldPassword'=>'required',
            'newPassword'=>'required',
            'confirmPassword'=>'required|same:newPassword|min:8|max:15'
        ];

        $validationMessage = [
            'confirmPassword.same'=>'New Password and Confirm Password must be same!'
        ];
        return Validator::make($request->all(),$validationRules,$validationMessage);
    }
}
