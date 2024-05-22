@extends('admin.layouts.master')

@section('title','Course List')

@section('content')

        <main class="content">
            <div class="container-fluid">
                <!--direct course create page-->
              <div class="row mb-2">
                
                <div class="col-10">
                   <h1>Course Dashboard</h1>
                </div>
                        
                <div class="col-2">
                    <a href="{{route('course#createPage')}}">
                        <button class="btn btn-success ">
                            <i class="fa-solid fa-plus"></i>Add Course
                        </button>
                    </a>
                </div>      
              </div>
              <!--end direct course create page-->
                
              <!--search course info-->
              <div class="col-2 offset-10 mb-2">
                <form action="{{route('course#list')}}" method="get">
                    @csrf
                    <div class="d-flex">
                        <input type="text" class="form-control" name="key" placeholder="Search" value="{{request('key')}}">
                        <button class="btn bg-dark text-white" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                       </div>        
                </form>
              </div>
              <!--end search course info-->
             
              <!--delete course info-->
              <div class="col-3 offset-9 mb-2">
                @if(session('deleteSuccess'))
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{session('deleteSuccess')}}
                      </div>
                     @endif
              </div>
              <!--end delete course info-->
            
              <!--course total-->
              <div class="row my-2">
                <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
                    <h3><i class="fa-solid fa-database"></i>{{$courses->total()}}</h3>
                    </div>
                </div>
                <!--end course total-->
             
                <!--course list-->
             @if(count($courses) !=0)
             <div class="row">
                <div class="col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Course Category</h5>
                        </div>
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Teacher</th>
                                    <th>Price</th>
                                    <th>View Count</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($courses as $course)
                             <tr>
                                <td></td>
                                <td><img style="width:80px;"  src="{{asset('storage/'.$course->image)}}"></td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->category_name}}</td>
                                <td>{{$course->teacher_name}}</td>
                                <td>{{$course->price}}</td>
                                <td>{{$course->view_count}}</td>
                                <td>
                                        <a href="{{route('course#edit',$course->id)}}">
                                        <button class="bg-warning me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa-solid fa-eye me-1"></i>
                                        </button>
                                        </a>

                                         <a href="{{route('course#updatePage',$course->id)}}">
                                        <button class="bg-primary me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa-solid fa-pen-to-square me-1"></i>
                                        </button>
                                        </a>

                                            <a href="{{route('course#delete',$course->id)}}">
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
            <!--end course list-->

            <div class="container">
                <!--course paginate-->
                <div class="row">
                  <div class="col-3 offset-9">
                    <div class="me-5 fs-4">
                        {{$courses->links()}}
                    </div>
                  </div>
                </div>
                <!--end course paginate-->
              
                <!--no course-->
                @else
                <h1 class="text-danger text-center mt-5">There is no course here</h1>
               @endif
               <!--end no course-->
            </div>

        </main>

@endsection