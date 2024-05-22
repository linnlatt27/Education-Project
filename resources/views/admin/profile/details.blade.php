@extends('admin.layouts.master')

@section('title','Profile Detail Page')

@section('content')

    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <a class="badge bg-dark text-white ms-2" onclick="history.back()">
                    <i class="fa-solid fa-arrow-left"></i>
</a>
                <h1 class="h3 d-inline align-middle">Profile</h1>
               
            </div>

            <!--profile detail info-->
            <div class="row">
                <div class="col-6 offset-2">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h1 class="card-title mb-0">Profile Info</h1>
                        </div>
                        <div class="card-body text-center">
                            @if (Auth::user()->image ==null)
                            <img src="{{asset('image/default_user.png')}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                            @else
                            <img src="{{asset('storage/'.Auth::user()->image)}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                            @endif

                            <h5 class="card-title mb-0">{{Auth::user()->name}}</h5>
                           
                        </div>
                      
                        
                            <h1 class="text-center"><i class="fa-solid fa-user me-2"></i>{{Auth::user()->name}}</h1>
                            <h1 class="text-center"><i class="fa-solid fa-envelope me-2"></i>{{Auth::user()->email}}</h1>
                            <h1 class="text-center"><i class="fa-solid fa-phone me-2"></i>{{Auth::user()->phone}}</h1>
                            <h1 class="text-center"><i class="fa-solid fa-mars-and-venus me-2"></i>{{Auth::user()->gender}}</h1>
                            <h1 class="text-center"><i class="fa-solid fa-location-dot me-2"></i>{{Auth::user()->address}}</h1>
                            <h1 class="text-center"><i class="fa-solid fa-calendar me-4"></i>{{Auth::user()->created_at->format('j-F-Y')}}</h1>
                            
                            <div class="row">
                                <div class="col-4 offset-4 mb-3 mt-3">
                                    <a href="{{route('profile#edit')}}">
                                 <button class="btn bg-dark text-white">
                                    <i class="fa-solid fa-pen-to-square"></i>Edit Profile
                                 </button>
                                </a>
                                </div>
                            </div>                 
                    </div>
                </div>        
            </div>
            <!--end profile detail info-->

        </div>
    </main>

   
</div>
@endsection