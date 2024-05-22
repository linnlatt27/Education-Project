@extends('admin.layouts.master')

@section('title','Teacher List')

@section('content')

        <main class="content">
            <div class="container-fluid">
              <div class="row mb-2">
                
                <div class="col-10">
                   <h1>Teacher Dashboard</h1>
                </div>
                      
                <!--add teacher create-->
                <div class="col-2">
                    <a href="{{route('teacher#createPage')}}">
                        <button class="btn btn-success ">
                            <i class="fa-solid fa-plus"></i>Add Teacher
                        </button>
                    </a>
                </div>      
              </div>
              <!--end teacher create-->
               
              <!--search teacher list-->
              <div class="col-2 offset-10 mb-2">
                <form action="{{route('teacher#list')}}" method="get">
                    @csrf
                    <div class="d-flex">
                        <input type="text" class="form-control" name="key" placeholder="Search" value="{{request('key')}}">
                        <button class="btn bg-dark text-white" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                       </div>        
                </form>
              </div>
              <!--end teacher list-->

              <!--delete teacher info-->
              <div class="col-3 offset-9 mb-2">
                @if(session('deleteSuccess'))
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{session('deleteSuccess')}}
                      </div>
                     @endif
              </div>
              <!--end delete teacher info-->
            
              <!--count total teacher-->
              <div class="row my-2">
                <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
                    <h3><i class="fa-solid fa-database"></i>{{$teachers->total()}}</h3>
                    </div>
                </div>
                <!--end count total teacher-->

                <!--teacher list-->
             @if(count($teachers) !=0)
             <div class="row">
                <div class="col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Teacher Category</h5>
                        </div>
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Message</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($teachers as $teacher)
                             <tr>
                                <td></td>
                                <td><img style="width:80px;"  src="{{asset('storage/'.$teacher->image)}}"></td>
                                <td>{{$teacher->name}}</td>
                                <td>{{$teacher->category_name}}</td>
                                <td class="">{{$teacher->message}}</td>
                                <td>
                                    <a href="{{route('teacher#edit',$teacher->id)}}">
                                        <button class="bg-warning me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa-solid fa-eye me-1"></i>
                                        </button>
                                        </a>

                                        <a href="{{route('teacher#updatePage',$teacher->id)}}">
                                            <button class="bg-primary me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa-solid fa-pen-to-square me-1"></i>
                                            </button>
                                            </a>

                                            <a href="{{route('teacher#delete',$teacher->id)}}">
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
            <!--end teacher list-->

            <div class="container">
                <!--bootstrap paginate-->
                <div class="row">
                  <div class="col-3 offset-9">
                    <div class="me-5 fs-4">
                        {{$teachers->links()}}
                    </div>
        
                  </div>
                </div>
              <!--end bootstrap paginate-->
            
              <!--no teacher-->
                @else
                <h1 class="text-danger text-center mt-5">There is no teacher here</h1>
               @endif
              <!--end no teacher-->
            </div>

        </main>

@endsection