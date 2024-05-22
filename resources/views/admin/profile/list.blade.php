@extends('admin.layouts.master')

@section('title','Account List')

@section('content')

        <main class="content">
            <div class="container-fluid">
              <div class="row mb-2">
                
                <div class="col-10">
                   <h1>Account Dashboard</h1>
                </div>
                        
              </div>

            <!--search admin acc-->
              <div class="col-2 offset-10 mb-2">
                <form action="{{route('account#list')}}" method="get">
                    @csrf
                    <div class="d-flex">
                        <input type="text" class="form-control" name="key" placeholder="Search" value="{{request('key')}}">
                        <button class="btn bg-dark text-white" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                       </div>        
                </form>
              </div>
              <!--end search admin acc-->
              
              <!--delete admin acc-->
              <div class="col-3 offset-9 mb-2">
                @if(session('deleteSuccess'))
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{session('deleteSuccess')}}
                      </div>
                     @endif
              </div>
              <!--end delete admin acc-->
           
              <!--admin acc total-->
              <div class="row my-2">
                <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
                    <h3><i class="fa-solid fa-database"></i>{{$account->total()}}</h3>
                    </div>
                </div>
              <!--end admin acc total-->
          
              <!--admin acc list-->
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
                                    <th>Image</th>
                                    <th class="">Name</th>
                                    <th class="">Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($account as $a)
                             <tr>
                                <td></td>
                                <td>
                                    @if ($a->image == null)
                                    <img style="width:50px;" src="{{asset('image/default_user.png')}}"  class="img-thumbnail shadow-sm"/>
                                     @else
                                    <img style="width:50px;" src="{{asset('storage/'.$a->image)}}" class="img-thumbnail shadow-sm" />
                                    @endif
                                </td>
                                <input type="hidden" id="userId" value="{{$a->id}}">
                                <td class="">{{$a->name}}</td>
                                <td class="">{{$a->email}}</td>
                                <td class="">
                                  @if (Auth::user()->id==$a->id)

                                  @else
                               <select name="role" id="roleOption" class="form-control statusChange" >
                                  <option value="admin">Admin</option>
                                  <option value="user">User</option>
                               </select>
                             @endif
                              </td>
                                <td>
                                  @if (Auth::user()->id ==$a->id)
                                      
                                  @else
                                  <a href="{{route('account#delete',$a->id)}}">
                                    <button class="bg-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    </a> 
                                  @endif        
                                </td>
                            </tr>
                             @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
             
            </div>
            <!--end admin acc list-->

            <!--admin acc paginate-->
            <div class="container">
                <div class="row">
                  <div class="col-3 offset-9">
                    <div class="me-5 fs-4">
                        {{$account->links()}}
                    </div>
        
                  </div>
                </div>          
            </div>
             <!--end admin acc paginate-->
        </main>

@endsection
@section('scriptSource')
<script>
  //change admin role
    $(document).ready(function(){

     $('.statusChange').change(function() {
       $currentStatus =$(this).val();
       $parentNode =$(this).parents("tr");
       $userId    =$parentNode.find('#userId').val();

       $data = {'userId' :$userId,'role':$currentStatus};

       $.ajax({
        type :'get',
        url  :'http://localhost:8000/account/change/role',
        data :$data,
        dataType:'json',
    })

    location.reload();
     })

    })
 </script>
@endsection


