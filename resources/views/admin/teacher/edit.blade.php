@extends('admin.layouts.master')

@section('title','Teacher Page')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="row">
    <div class="col-3 offset-7">
    </div>
    </div>
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="col-lg-6 offset-1">
                <div class="card col-12 mt-2" style="height:40vh;">
                    <div class="card-body">
                        <div class="">
                            <i class="fa-solid fa-arrow-left-long text-dark" onclick="history.back()"></i>
                        </div>
                        <div class="card-title ">
                            <h3 class="text-center title-2">Teacher Detail</h3>
                        </div>

                        <hr>
                       
                        <!--teacher detail -->
                        <div class="row">
                            <div class="col-3 offset-2">
                                <img style="width:140px;" src="{{asset('storage/'.$teacher->image)}}" class="img-thumbnail shadow-sm"  />

                            </div>

                            <div class="col-7">
                                <div class= "my-3 btn bg-success text-white w-50 d-block fs-5 text-center"><i class="fa-solid fa-user me-2"></i>{{$teacher->name}}</div>
                                <span class= "my-3 btn bg-success text-white"><i class="fa-solid fa-list me-2"></i>{{$teacher->category_name}}</span>
                                <div class="">{{$teacher->message}}</div>
                            </div>
                        </div>
                    <!--end teacher detail-->
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection
