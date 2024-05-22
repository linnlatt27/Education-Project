<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Course;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    //direct certificate page
    public function certificatePage() {
        $courses   =Course::select('id','title')->get();
        $cart =Cart::where('user_id',Auth::user()->id)->get();
        $history = Order::where('user_id',Auth::user()->id)->get();
        return view('user.main.certificate',compact('cart','history','courses'));
    }

    //user certificate send info
    public function sendCertificate(Request $request) {
        $this->certificateValidationCheck($request);
        $data =$this->requestCertificateInfo($request);
        Certificate::where('user_id',$request->userId)->create($data);
        return redirect()->route('user#home');
      }
     
      //admin's user certificate list
      public function list() {
        $certificate=Certificate::select('certificates.*','courses.title as course_title')
                       ->when(request('key'),function($query){
             $query->orWhere('courses.title','like','%'.request('key').'%')
                    ->orWhere('certificates.name','like','%'.request('key').'%');
        })
                      ->leftJoin('courses','certificates.course_id','courses.id')
                      ->orderBy('certificates.created_at','desc')
                      ->paginate(5);
            $certificate->appends(request()->all());
        return view('admin.certificate.list',compact('certificate'));
       }
      
       //admin delete user's certificate info
        public function delete($id) {
            Certificate::where('id',$id)->delete();
            return back()->with(['deleteSuccess'=>'Certificate Form delete Success']);
        }

    //request certificate info
    private function requestCertificateInfo($request) {
        return [
            'name'=>$request->name,
            'email'=>$request->email,
            'course_id'=>$request->courseTitle,
            'user_id'=>$request->userId,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];
    
    }
    
    //certificate validation check
    private function certificateValidationCheck($request) {
    Validator::make($request->all(),[
        'name'=>'required',
        'email'=>'required',
        'courseTitle'=>'required',
    ])->validate();
    }
}
