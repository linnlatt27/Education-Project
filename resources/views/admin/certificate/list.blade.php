@extends('admin.layouts.master')

@section('title','Certificate Page')
@section('content')
<main class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        
        <div class="col-10">
           <h1>Certificate Dashboard</h1>
        </div>
                
      <!--search certificate list-->
     <div class="col-2 offset-10 mb-2">
        <form action="{{route('certificate#list')}}" method="get">
           
            <div class="d-flex">
                <input type="text" class="form-control" name="key" placeholder="Search" value="{{request('key')}}">
                <button class="btn bg-dark text-white" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
               </div>        
        </form>
      </div>
<!--certificate list end-->

    <!--delete certificate info-->
      <div class="col-3 offset-9 mb-2">
        @if(session('deleteSuccess'))
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                {{session('deleteSuccess')}}
              </div>
             @endif
      </div>
      <!--end delete certificate info-->
    
      <!--certificate info total-->
      <div class="row my-2">
        <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
            <h3><i class="fa-solid fa-database"></i>{{$certificate->total()}}</h3>
            </div>
        </div>
        <!--end certificate info total-->
      
        <!--certificate list-->
    @if (count($certificate) !=0)   
     <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Certificate Category</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Course Title</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($certificate as $c)
                         
                     <tr>
                        <td></td>
                        <td>{{$c->course_title}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->email}}</td>
                        <td>{{$c->created_at->format('j-F-Y')}}</td>
                        <td>
                            <a href="{{route('certificate#delete',$c->id)}}">
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
    </div>
    <!--end certificate list-->
      
    <!-- certificate paginate-->
    <div class="container">
        <div class="row">
          <div class="col-3 offset-9">
            <div class="me-5 fs-4">
                {{$certificate->links()}}
            </div>

          </div>
        </div>
        <!--end certificate paginate-->
      
        <!--no certificate-->
        @else
        <h1 class="text-danger text-center mt-5">There is no certificate list here</h1>
        @endif
       <!--end no certificate-->
       
    </div>

</main>

@endsection