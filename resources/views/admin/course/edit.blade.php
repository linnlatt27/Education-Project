@extends('admin.layouts.master')

@section('title','Course Detail Page')
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
                <div class="card col-12 mt-2" style="height:70vh;">
                    <div class="card-body">
                        <div class="">
                            <i class="fa-solid fa-arrow-left-long text-dark" onclick="history.back()"></i>
                        </div>
                        <div class="card-title ">
                            <h3 class="text-center title-2">Course Detail</h3>
                        </div>

                        <hr>
                       
                        <!--course detail-->
                        <div class="row">
                            <div class="col-3 offset-2">
                                <img style="width:140px;" src="{{asset('storage/'.$course->image)}}" class="img-thumbnail shadow-sm"  />

                            </div>

                            <div class="col-7">
                                <div class= "my-3 btn bg-success text-white w-50 d-block fs-5 text-center "><i class="fa-solid fa-file-signature"></i>{{$course->title}}</div>
                                <span class= "my-3 btn bg-success text-white"><i class="fa-solid fa-user"></i>{{$course->teacher_name}}</span>
                                <span class= "my-3 btn bg-success text-white"><i class="fa-solid fa-money-bill-wave"></i>{{$course->price}}</span>
                                <span class= "my-3 btn bg-success text-white"><i class="fa-solid fa-eye"></i>{{$course->view_count}}</span>
                                <span class= "my-3 btn bg-success text-white"><i class="fa-solid fa-list"></i>{{$course->category_name}}</span>
                                <span class= "my-3 btn bg-success text-white"><i class="fa-solid fa-calendar me-2"></i>{{$course->created_at->format('j-F-Y')}}</span>
                                <div class= "my-3 "><i class="fa-solid fa-circle-info"></i>Details</div>
                                <div class="">{{$course->description}}</div>
                            </div>
                        </div>
                        <!--end course detail-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection
