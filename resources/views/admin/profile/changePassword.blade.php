@extends('admin.layouts.master')

@section('title','Change Password Page')
@section('content')

<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell">
                    <a class="badge bg-dark text-white ms-2 mt-3" onclick="history.back()">
                        <i class="fa-solid fa-arrow-left"></i>
    </a>

                 <!--pw fail-->
                    @if(session('fail'))
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        {{session('fail')}}
                      </div>
                     @endif
               <!--end pw fail-->

                    <div class="text-center mt-4 mb-4">
                        <h1 class="h2">Change Your Password</h1>
                    </div>

                    <!--pw change-->
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form action="{{route('admin#changePassword')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Old Password</label>
                                        <input class="form-control form-control-lg" type="password" name="oldPassword" placeholder="Enter your old password" />
                                        @error('oldPassword')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror    
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input class="form-control form-control-lg" type="password" name="newPassword" placeholder="Enter your new password" />
                                        @error('newPassword')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror    
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input class="form-control form-control-lg" type="password" name="confirmPassword" placeholder="Enter confirm password" />
                                        @error('confirmPassword')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror    
                                    </div>
                                    <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Change password</button> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end pw change-->
                </div>
            </div>
        </div>
    </div>
</main>

    
@endsection