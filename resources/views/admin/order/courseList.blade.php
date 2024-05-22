@extends('admin.layouts.master')

@section('title','Order Page')
@section('content')

<main class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        
        <div class="col-10">
           <h1>Order Dashboard</h1>
        </div>
      </div>
       
      <a href="{{route('admin#orderList')}}" class="text-dark"><i class="fa-solid fa-arrow-left"></i>Back</a>
      <!--order info-->
      <div class="row col-5">
        <div class="card mt-4">
            <div class="card-body">
              <h3><i class="fa-solid fa-clipboard"></i>Order Info</h3>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col"><i class="fa-solid fa-user me-3"></i>Name</div>
                    <div class="col">{{strtoupper($orderList[0]->user_name)}}</div>
                </div>

                <div class="row mb-3">
                    <div class="col"><i class="fa-solid fa-barcode  me-3"></i>Order Code</div>
                    <div class="col">{{$orderList[0]->order_code}}</div>
                </div>

                <div class="row mb-3">
                    <div class="col"><i class="fa-solid fa-clock  me-3"></i>Order Date</div>
                    <div class="col">{{$orderList[0]->created_at->format('j-F-Y')}}</div>
                </div>

                <div class="row mb-3">
                    <div class="col"><i class="fa-solid fa-money-bill-wave  me-3"></i>Total</div>
                    <div class="col">{{$order->total_price}}Kyats</div>
                </div>
            </div>

        </div>
      </div>
      <!--end order info-->
     
      <!--order info list-->
     <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Order Category</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Order ID</th>
                            <th>Course Image</th>
                            <th>Course Title</th>
                            <th>Order Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($orderList as $o)
                     <tr>
                        <td></td>
                        <td>{{$o->id}}</td>
                        <td class="col-2"><img style="width:80px;" src="{{asset('storage/'.$o->course_image)}}" class="img-thumbnail shadow-sm"></td>
                        <td>{{$o->course_title}}</td>
                        <td>{{$o->created_at->format('j-F-Y')}}</td>
                        <td>{{$o->total}}Kyats</td>
                    </tr>
                     @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
     
    </div>
  <!--end order info list-->
</main>
@endsection
    
