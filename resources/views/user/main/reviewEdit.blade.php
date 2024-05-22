@extends('user.layouts.master')
@section('content')
<!--review edit page-->
    <div class="container py-5">
         <div class="col-12">
           <div class="card">
            <div class="card-body">
               <h5>Are you sure update review this course</h5>
               <form action="{{route('review#update')}}" method="post">
                   @csrf
                   <input type="hidden" name="review_id" value="{{$review->id}}">
                   <textarea class="form-control" name="user_review"  rows="5">{{$review->user_review}}</textarea>
                   <button type="submit" class="btn btn-success mt-3">Update Review</button>
               </form>
               <i class="fa-solid fa-arrow-left-long text-dark" onclick="history.back()"></i>
            </div>
         
         </div>
        </div>
    </div>
    <!--end review edit page-->
@endsection