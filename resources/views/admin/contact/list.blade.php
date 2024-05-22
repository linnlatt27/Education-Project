@extends('admin.layouts.master')

@section('title','Contact Page')
@section('content')
<main class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        
        <div class="col-10">
           <h1>Contact Message Dashboard</h1>
        </div>
                
      <!--serach contach info-->
     <div class="col-2 offset-10 mb-2">
        <form action="{{route('contact#list')}}" method="get">
           
            <div class="d-flex">
                <input type="text" class="form-control" name="key" placeholder="Search" value="{{request('key')}}">
                <button class="btn bg-dark text-white" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
               </div>        
        </form>
      </div>
      <!--end contact search info-->
    
      <!--delete contact info-->
      <div class="col-3 offset-9 mb-2">
        @if(session('deleteSuccess'))
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                {{session('deleteSuccess')}}
              </div>
             @endif
      </div>
      <!--end delete contact info-->
    
      <!--contact total-->
      <div class="row my-2">
        <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
            <h3><i class="fa-solid fa-database"></i>{{$contact->total()}}</h3>
            </div>
        </div>
        <!--end contact total-->

   <!--contact list-->
    @if (count($contact) !=0)   
     <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Contact Message Category</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($contact as $c)
                         
                     <tr>
                        <td></td>
                        <td>{{$c->user_id}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->email}}</td>
                        <td>{{$c->message}}</td>
                        <td>{{$c->created_at->format('j-F-Y')}}</td>
                        <td>
                            <a href="{{route('contact#delete',$c->id)}}">
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
  <!--end contact list-->

  <!--contact paginate-->
    <div class="container">
        <div class="row">
          <div class="col-3 offset-9">
            <div class="me-5 fs-4">
                {{$contact->links()}}
            </div>

          </div>
        </div>
        <!--end contact paginate-->
      
        <!--no contact message-->
        @else
        <h1 class="text-danger text-center mt-5">There is no message here</h1>
        @endif
       <!--end contact message-->
    </div>

</main>

@endsection