@extends('admin.layouts.master')

@section('title','Category List')

@section('content')

        <main class="content">
            <div class="container-fluid">
              <div class="row mb-2">
                
                <div class="col-10">
                   <h1> Category Dashboard</h1>
                </div>
                   
                <!--add category page-->
                <div class="col-2">
                    <a href="{{route('admin#categoryCreatePage')}}">
                        <button class="btn btn-success ">
                            <i class="fa-solid fa-plus"></i>Add Category
                        </button>
                    </a>
                </div>      
              </div>
             <!--end category add-->
            
             <!--search category list-->
              <div class="col-2 offset-10 mb-2">
                <form action="{{route('admin#categoryList')}}" method="get">
                    @csrf
                    <div class="d-flex">
                        <input type="text" class="form-control" name="key" placeholder="Search" value="{{request('key')}}">
                        <button class="btn bg-dark text-white" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                       </div>        
                </form>
              </div>
              <!--search category list end-->
               
              <!--delete category-->
              <div class="col-3 offset-9 mb-2">
                @if(session('deleteSuccess'))
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{session('deleteSuccess')}}
                      </div>
                     @endif
              </div>
              <!--end category delete-->
              
              <!--category total-->
              <div class="row my-2">
                <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
                    <h3><i class="fa-solid fa-database"></i>{{$categories->total()}}</h3>
                    </div>
                </div>
                <!--end category total-->
             
                <!--category list-->
             @if(count($categories) !=0)
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
                                    <th>ID</th>
                                    <th class="">Name</th>
                                    <th class="">Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($categories as $c)
                             <tr>
                                <td></td>
                                <td>{{$c->id}}</td>
                                <td class="">{{$c->name}}</td>
                                <td class="">{{$c->created_at->format('j-F-Y')}}</td>
                                <td>
                                        <a href="{{route('admin#categoryEdit',$c->id)}}">
                                        <button class="bg-warning me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa-solid fa-pen-to-square "></i>
                                        </button>
                                        </a>
                                            <a href="{{route('admin#categoryDelete',$c->id)}}">
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
            <!--end category list-->
           
            <!--cateogory paginate-->
            <div class="container">
                <div class="row">
                  <div class="col-3 offset-9">
                    <div class="me-5 fs-4">
                        {{$categories->links()}}
                    </div>
        
                  </div>
                </div>
              <!--category paginate end-->

            <!--no category-->
             @else
              <h1 class="text-danger text-center mt-5">There is no category here</h1>
             @endif
            </div>
             <!--no category end-->
        </main>

@endsection