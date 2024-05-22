<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use App\Models\Review;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //review add
    public function add($id) {
        $course =Course::where('id',$id)->first();
        $cart =Cart::where('user_id',Auth::user()->id)->get();
        $history = Order::where('user_id',Auth::user()->id)->get();

       
        if($course) 
        {
            $course_id =$course->id;
            $review =Review::where('user_id',Auth::user()->id)->where('course_id',$course_id)->first();
            if($review)
            {
             return view('user.main.reviewEdit',compact('review','cart','history'));
            }
            else
            {
                $verified_purchase =User::where('users.id',Auth::user()->id)
                ->leftJoin('order_lists','users.id','order_lists.user_id')
                ->where('order_lists.course_id',$course_id)->get();

    
                return view('user.main.review',compact('course','verified_purchase','cart','history'));  
            } 
        }
        else
        {
         return back();
        }
    }
    
    //review create
    public function create(Request $request) {
        $course_id =$request->input('course_id');
        $course =Course::where('id',$course_id)->first();

        $user_review =$request->input('user_review');
        $new_review =Review::create([
            'user_id'=>Auth::user()->id,
            'course_id'=>$course_id,
            'user_review'=>$user_review,
        ]);
        return redirect()->route('user#about');
    }
    
    //review update
    public function update(Request $request) {
        $user_review =$request->input('user_review');
        if($user_review != '')
        {
            $review_id =$request->input('review_id');
            $review =Review::where('id',$review_id)->where('user_id',Auth::user()->id)->first();
            
            if($review)
            {
                $review->user_review=$request->input('user_review');
                $review->update();
                return redirect()->route('user#about');
            }
            else
            {
             return back();
            }
        }
        else
        {
        return back();
        }
   }
}
