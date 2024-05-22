@extends('admin.layouts.master')
@section('title','Rating Page')
@section('content')
<main class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        
        <div class="col-10">
           <h1>Rating Dashboard</h1>
        </div>
                    
    <!--search rating-->
     <div class="col-2 offset-10 mb-2">
        <form action="{{route('rating#list')}}" method="get">
           
            <div class="d-flex">
                <input type="text" class="form-control" name="key" placeholder="Search" value="{{request('key')}}">
                <button class="btn bg-dark text-white" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
               </div>        
        </form>
      </div>
      <!--end search rating-->
  
      <!--rating count total-->
      <div class="row my-2">
        <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
            <h3><i class="fa-solid fa-database"></i>{{$ratings->total()}}</h3>
            </div>
        </div>
        <!--end rating count total-->
    
        <!--rating list-->
    @if (count($ratings) !=0)   
     <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Rating Category</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Course Title</th>
                            <th>Rating</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($ratings as $r)
                         
                     <tr>
                        <td></td>
                        <td>{{$r->user_name}}</td>
                        <td>{{$r->course_title}}</td>
                        <td>{{$r->stars_rated}}</td>
                        <td>{{$r->created_at->format('j-F-Y')}}</td>
                    </tr>
                    @endforeach
                  
                    
                    </tbody>
                </table>
            </div>
        </div>
     
    </div>
    <!--end rating list-->
    <div class="container">
        <!--rating paginate-->
        <div class="row">
          <div class="col-3 offset-9">
            <div class="me-5 fs-4">
                {{$ratings->links()}}
            </div>
            <!--end rating paginate-->

          </div>
        </div>
      
        <!-- no rating-->
        @else
        <h1 class="text-danger text-center mt-5">There is no rating here</h1>
        @endif
       <!--end no rating-->
    </div>

</main>

@endsection