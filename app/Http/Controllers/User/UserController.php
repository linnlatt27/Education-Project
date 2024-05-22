<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Contact;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //direct user home page
    public function home() {
        $category =Category::get();
        $course=Course::select('courses.*','teachers.name as teacher_name','categories.name as category_name')
                      ->leftJoin('teachers','courses.teacher_id','teachers.id')
                      ->leftJoin('categories','courses.category_id','categories.id')
                      ->orderBy('view_count','desc')
                      ->paginate(3);
        $courses =Course::get();
        $teacher  =Teacher::get();
        $cart =Cart::where('user_id',Auth::user()->id)->get();
        $history = Order::where('user_id',Auth::user()->id)->get();
        return view('user.main.home',compact('course','cart','history','category','teacher','courses'));
    }

        //direct user about page
        public function about() {
            $category =Category::get();
            $course=Course::get();
            $teacher  =Teacher::get();    
            $cart =Cart::where('user_id',Auth::user()->id)->get();
            $history = Order::where('user_id',Auth::user()->id)->get();
            $review =Review::select('reviews.*','users.name as user_name','courses.title as course_title')
                      ->leftJoin('users','reviews.user_id','users.id')
                      ->leftJoin('courses','reviews.course_id','courses.id')
                      ->get();
        return view('user.main.about',compact('cart','history','review','course','teacher','category'));
        }    
    
    //direct  course page
    public function coursePage() {
        $course=Course::select('courses.*','teachers.name as teacher_name','categories.name as category_name')
                      ->leftJoin('teachers','courses.teacher_id','teachers.id')
                      ->leftJoin('categories','courses.category_id','categories.id')
                      ->when(request('key'),function($query){
                $query->where('title','like','%'.request('key').'%');
                            })
                    ->get();                    
        $categories =Category::when(request('key'),function($query){
            $query->where('name','like','%'.request('key').'%');
                })
                 ->get();
        $teachers   =Teacher::get();
        $cart =Cart::where('user_id',Auth::user()->id)->get();
        $history = Order::where('user_id',Auth::user()->id)->get();
        return view('user.main.course',compact('course','categories','cart','history','teachers'));
    }

    //direct teacher page
   public function teacherPage() {
    $teacher =Teacher::select('teachers.*','categories.name as category_name')
                     ->leftJoin('categories','teachers.category_id','categories.id')
                     ->get();
    $categories =Category::get();
    $cart =Cart::where('user_id',Auth::user()->id)->get();
    $history = Order::where('user_id',Auth::user()->id)->get();
    return view('user.main.teacher',compact('cart','history','categories','teacher'));
   }

        
    //course each filter
    public function filter($id) {
        $course=Course::select('courses.*','teachers.name as teacher_name','categories.name as category_name')
                       ->leftJoin('teachers','courses.teacher_id','teachers.id')
                       ->leftJoin('categories','courses.category_id','categories.id')
                       ->where('categories.id',$id)
                       ->get();
        $categories =Category::get();
        $teachers   =Teacher::get();
        $cart =Cart::where('user_id',Auth::user()->id)->get();
        $history = Order::where('user_id',Auth::user()->id)->get();
       
         return view('user.main.course',compact('course','categories','cart','history','teachers'));
    }

    //user order history
  public function history() {
    $order =Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(5);
    return view('user.main.history',compact('order'));
  }
    
    //direct course details
    public function details($id) {
        $course=Course::select('courses.*','teachers.name as teacher_name','categories.name as category_name')
                      ->leftJoin('teachers','courses.teacher_id','teachers.id')
                      ->leftJoin('categories','courses.category_id','categories.id')
                      ->where('courses.id',$id)
                      ->get();
        $categories =Category::get();
        $teachers   =Teacher::get();
        $rating =Rating::where('course_id',$id)->get();
        $ratings =Rating::select('ratings.*','users.name as user_name')
                     ->leftJoin('users','ratings.user_id','users.id')
                      ->where('course_id',$id)
                      ->where('user_id',Auth::user()->id)
                      ->get();
        $rating_sum=Rating::where('course_id',$id)->sum('stars_rated');
        $user_rating =Rating::where('user_id',Auth::user()->id)->where('course_id',$id)->first();
        $cart =Cart::where('user_id',Auth::user()->id)->get();
        $history = Order::where('user_id',Auth::user()->id)->get();
        if($rating->count()>0) 
        {
          $rating_value =$rating_sum/$rating->count();
        }
        else{
            $rating_value =0;
        }
        return view('user.main.details',compact('course','categories','teachers','ratings','cart','history','rating','rating_value','user_rating'));
    }

    //direct cart page
    public function cartList() {
        $cartList = Cart::select('carts.*','courses.title as course_title','courses.price as course_price','courses.image as course_image')
        ->leftJoin('courses','courses.id','carts.course_id')
        ->where('carts.user_id',Auth::user()->id)
        ->get();
    $totalPrice =0;
     foreach ($cartList as $c) {
      $totalPrice +=$c->course_price;
    }
        return view('user.main.cart',compact('cartList','totalPrice'));
    }

    //direct admin's user list page
   public function userList() {
    $users =User::when(request('key'),function($query){
               $query->orWhere('name','like','%'.request('key').'%')
                     ->orWhere('email','like','%'.request('key').'%');
             })
                  ->where('role','user')->paginate(5);
    return view('admin.user.list',compact('users'));
   }

   //ajax admin's user list
   public function userChangeRole(Request $request) {
    $updateSource = [
        'role'=>$request->role
    ];
    User::where('id',$request->userId)->update($updateSource);
   }

   //user acc delete
    public function delete($id) {
        User::where('id',$id)->delete();
        return redirect()->route('admin#userList')->with(['deleteSuccess'=>'Account Deleted']);

   }

    //direct contact page
    public function contactPage($contactId) {
        $cart =Cart::where('user_id',Auth::user()->id)->get();
        $history = Order::where('user_id',Auth::user()->id)->get();
        return view('user.main.contact',compact('cart','history'));
       }
    
        //user contact send info
      public function send(Request $request) {
        $this->contactValidationCheck($request);
        $data =$this->requestContactInfo($request);
        Contact::where('user_id',$request->userId)->create($data);
        return redirect()->route('user#home');
      }

    //request contact info
    private function requestContactInfo($request) {
        return [
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
            'user_id'=>$request->userId,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];
    
    }
    
    //contact validation check
    private function contactValidationCheck($request) {
    Validator::make($request->all(),[
        'name'=>'required',
        'email'=>'required',
        'message'=>'required|min:10',
    ])->validate();
    }
}
