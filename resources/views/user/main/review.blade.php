@extends('user.layouts.master')

@section('content')
<!--review create-->
    <div class="container py-5">
         <div class="col-12">
           <div class="card">
            <div class="card-body">
                @if($verified_purchase->count() >0)
                <h5>You are writing a review for {{$course->title}}</h5>
                <form action="{{route('review#create')}}" method="post">
                    @csrf
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <textarea class="form-control" name="user_review"  rows="3"></textarea>
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </form>
                <i class="fa-solid fa-arrow-left-long text-dark" onclick="history.back()"></i>
                @else
                <div class="alert alert-danger">
                    <h5>You are not eligible to review this course</h5>
                    <p>Only customer to review this course</p>
                </div>
                <i class="fa-solid fa-arrow-left-long text-dark" onclick="history.back()"></i>
                @endif
            </div>
         
         </div>
        </div>
    </div>
    <!--end review create-->
@endsection