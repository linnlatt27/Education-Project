@extends('admin.layouts.master')

@section('title','Order List')

@section('content')

<main class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        
        <div class="col-10">
           <h1>Order Dashboard</h1>
        </div>
      </div>

      <form action="{{route('order#changeStatus')}}" method="get" class="col-3">
        <div class="input-group mb-3">
            <!--count order-->
            <div class="input-group-append">
                <span class="input-group-text">
                <i class="fa-solid fa-database"></i>{{count($order)}}
                </span>
             </div>
             <!--end count order-->

             <!--search order status-->
            <select name="orderStatus"  class="custom-select" id="inputGroupSelect02">
                <option value="">All</option>
                <option value="0" @if(request ('orderStatus')=='0')selected @endif>Pending</option>
                <option value="1" @if(request ('orderStatus')=='1')selected @endif>Accept</option>
                <option value="2" @if(request ('orderStatus')=='2')selected @endif>Reject</option>
            </select>
            
            <div class="input-group-append">
                <button type="submit" class="btn btn-lg ms-3 bg-dark text-white input-group-text">
                    <i class="fa-solid fa-magnifying-glass"></i>Search</button>
              </div>
              <!--end search order-->
        </div>
    </form>

    <!--delete order-->
    <div class="col-3 offset-9 mb-2">
        @if(session('deleteSuccess'))
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                {{session('deleteSuccess')}}
              </div>
             @endif
      </div>
      <!--end delete order-->
    
      <!--order list-->
     @if(count($order) !=0)
     <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Order Category</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Order Date</th>
                            <th>Order Code</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($order as $o)
                     <tr>
                        <input type="hidden" class="orderId" value="{{$o->id}}">
                        <td>{{$o->user_id}}</td>
                        <td>{{$o->user_name}}</td>
                        <td>{{$o->created_at->format('j-F-Y')}}</td>
                        <td>
                            <a href="{{route('order#listInfo',$o->order_code)}}" class="text-success">{{$o->order_code}}</a></td>
                        <td class="">{{$o->total_price}}Kyats</td>
                        <td>
                        <select name="status" class="form-control statusChange" id="statusChange">
                            <option value="0" @if($o->status ==0)selected @endif>Pending</option>
                            <option value="1" @if($o->status ==1)selected @endif>Accept</option>
                            <option value="2" @if($o->status ==2)selected @endif>Reject</option>
                        </select>
                        </td>

                        <td>
                                <a href="{{route('order#delete',$o->id)}}">
                                <button class="bg-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                </a>

                    </td>
                    </tr>
                     @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <h1 class="text-danger text-center mt-5">There is no order here</h1>
       @endif

    </div>
    <!--end order list-->

</main>
@endsection

@section('scriptSource')
<script>
    //order status change
    $(document).ready(function(){

     $('.statusChange').change(function() {
       $currentStatus =$(this).val();
       $parentNode =$(this).parents("tr");
       $orderId    =$parentNode.find('.orderId').val();

       $data = {
        'orderId' :$orderId,
        'status':$currentStatus
       };

       $.ajax({
        type :'get',
        url  :'/order/ajax/change/status',
        data :$data,
        dataType:'json',
    })
     })

    })
 </script>
@endsection