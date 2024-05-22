<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Course;
use App\Models\OrderList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    //direct add to cart
    public function addToCart(Request $request) {
        $data =$this->getOrderData($request);
        Cart::create($data);

        $response= [
            'message'=>'Add to Cart complete',
            'status'=>'success'
        ];
        return response()->json($response,200);
    }

    //order list and order
    public function order(Request $request) {
        $total =0;
        foreach($request->all() as $item) {
            $data =OrderList::create([
                'user_id'=>$item['user_id'],
                'course_id'=>$item['course_id'],
                'total'=>$item['total'],
                'order_code'=>$item['order_code']
            ]);

            $total +=$data->total;
        }

        Cart::where('user_id',Auth::user()->id)->delete();

        Order::create([
            'user_id'=>Auth::user()->id,
            'order_code'=>$data->order_code,
            'total_price'=>$total
        ]);

        return response()->json([
            'status'=>'true',
            'message'=>'order completed'
        ],200);
    }
    
    //course clear cart
    public function clearCart() {
        Cart::where('user_id',Auth::user()->id)->delete();
    }

    //clear current course
    public function clearCurrentProduct(Request $request) {
      Cart::where('user_id',Auth::user()->id)
          ->where('course_id',$request->courseId)
          ->where('id',$request->orderId)
          ->delete();
    }

        //view count
    public function increaseViewCount(Request $request) {
        $course =Course::where('id',$request->courseId)->first();
    
        $viewCount = [
        'view_count'=>$course->view_count+1
        ];
    
        Course::where('id',$request->courseId)->update($viewCount);
        }    
    
    //get order data
    private function getOrderData($request) {
        return [
            'user_id'=>$request->userId,
            'course_id'=>$request->courseId,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];
    }

}
