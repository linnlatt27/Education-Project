<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //return order list

    public function orderList() {
        $order =Order::select('orders.*','users.name as user_name')
              ->leftJoin('users','users.id','orders.user_id')
              ->orderBy('created_at','desc')
              ->get();
        return view('admin.order.list',compact('order'));
    }
   
    //order change status
    public function changeStatus(Request $request) {
        $order =Order::select('orders.*','users.name as user_name')
        ->leftJoin('users','users.id','orders.user_id')
        ->orderBy('created_at','desc');

        if($request ->orderStatus ==null) {
            $order =$order ->get();
        }else{
            $order = $order->where('orders.status',$request->orderStatus)->get();
        }
        return view('admin.order.list',compact('order'));
        }

        //ajax change status
        public function ajaxChangeStatus(Request $request) {
            Order::where('id',$request->orderId)->update([
                'status'=>$request->status
            ]);

            $order =Order::select('orders.*','users.name as user_name')
                   ->leftJoin('users','users.id','orders.user_id')
                    ->orderBy('created_at','desc')
                   ->get();
            return response()->json($order,200);
        }

         //order list info
         public function listInfo($orderCode) {
            $order =Order::where('order_code',$orderCode)->first();
  
            $orderList =OrderList::select('order_lists.*','users.name as user_name','courses.image as course_image','courses.title as course_title')
                    ->leftJoin('users','users.id','order_lists.user_id')
                    ->leftJoin('courses','courses.id','order_lists.course_id')
                    ->where('order_code',$orderCode)
                    ->get();
            return view('admin.order.courseList',compact('orderList','order'));
          }

          //order delete 
       public function delete($id) {
        Order::where('id',$id)->delete();
        return redirect()->route('admin#orderList')->with(['deleteSuccess'=>'Order Deleted']);
    }

}
