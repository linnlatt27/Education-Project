<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use App\Models\Rating;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
     //rating add
     public function add(Request $request) {
        $stars_rated = $request->input('course_rating');
        $course_id   =$request->input('course_id');
        
        $course_check =Course::where('id',$course_id)->first();

        if($course_check)
        {
            $verified_purchase =User::where('users.id',Auth::user()->id)
                                   ->leftJoin('order_lists','users.id','order_lists.user_id')
                                   ->where('order_lists.course_id',$course_id)->get();

        if($verified_purchase->count()>0) 
        {
            $existing_rating =Rating::where('user_id',Auth::user()->id)->where('course_id',$course_id)->first();
            if($existing_rating) 
            {
              $existing_rating->stars_rated =$stars_rated;
              $existing_rating->update();
        }
        else
        {
            Rating::create([
                'user_id'=>Auth::user()->id,
                'course_id'=>$course_id,
                'stars_rated'=>$stars_rated
            ]);
          }
            return redirect()->back()->with(['status'=>'Thank you for rating this course']);
        }
          else
          {
            return redirect()->back()->with(['statusAlert'=>'You cannot not rating this course without purchase']);
          }
        }
        else{
            return redirect()->back();
        }       
    } 

    //user rating list
    public function list() {
        $ratings =Rating::select('ratings.*','users.name as user_name','courses.title as course_title')
                            ->when(request('key'),function($query){
            $query->where('users.name','like','%'.request('key').'%');
    })
                          ->leftJoin('users','ratings.user_id','users.id')
                          ->leftJoin('courses','ratings.course_id','courses.id')
                          ->orderBy('ratings.created_at','desc')
                          ->paginate(5);
                $ratings->appends(request()->all());
        return view('admin.rating.list',compact('ratings'));
    }
}
