@extends('admin.layouts.master')
@section('title','User List Page')

@section('content')
<main class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        
        <div class="col-10">
           <h1>User Dashboard</h1>
        </div>
                
      </div>

      <!--search user list-->
      <div class="col-2 offset-10 mb-2">
        <form action="{{route('admin#userList')}}" method="get">
            @csrf
            <div class="d-flex">
                <input type="text" class="form-control" name="key" placeholder="Search" value="{{request('key')}}">
                <button class="btn bg-dark text-white" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
               </div>        
        </form>
      </div>
      <!--end search user list-->
    
      <!--delete user acc-->
      <div class="col-3 offset-9 mb-2">
        @if(session('deleteSuccess'))
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                {{session('deleteSuccess')}}
              </div>
             @endif
      </div>
      <!--end delete user acc-->

      <!--user acc total-->
      <div class="row my-2">
        <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
            <h3><i class="fa-solid fa-database"></i>{{$users->total()}}</h3>
            </div>
        </div>
  <!--end user acc total-->
  
  <!--user list-->
     <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Account list</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                         <input type="hidden" id="userId" value="{{$user->id}}">
                         <td></td>
                         <td>{{$user->id}}</td>
                         <td>{{$user->name}}</td>
                         <td class="">{{$user->email}}</td>
                         <td class="">
                            <select class="form-control statusChange">
                                <option value="user" @if($user->role =='user')selected @endif>User</option>
                                <option value="admin"  @if($user->role =='admin')selected @endif>Admin</option>
                            </select>
                         </td>
                         <td>
                            <a href="{{route('admin#userDelete',$user->id)}}">
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
    <!--end user list-->

    <!--bootstrap paginate-->
    <div class="container">
        <div class="row">
          <div class="col-3 offset-9">
            <div class="me-5 fs-4">
                {{$users->links()}}
            </div>

          </div>
        </div>
      
    </div>
    <!--end bootstrap paginate-->

</main>

@endsection

@section('scriptSource')
<script>
    //user acc change role
    $(document).ready(function(){

     $('.statusChange').change(function() {
       $currentStatus =$(this).val();
       $parentNode =$(this).parents("tr");
       $userId     =$parentNode.find('#userId').val();

       $data = {'userId' :$userId,'role':$currentStatus};

       $.ajax({
        type :'get',
        url  :'/user/change/role',
        data :$data,
        dataType:'json',
    })

    location.reload();
     })

    })
 </script>
@endsection