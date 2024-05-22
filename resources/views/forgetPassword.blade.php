@extends('layouts.app')

@section('title','ForgetPassword Page')

@section('content')
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
             
                <div class="d-table-cell align-middle">
                    
                    <div class="text-center mt-4">
                        <p class="lead">
                          We will sent a link to your email,use that link to your password
                        </p>
                    </div>
                   
                    <!--forget pw to email-->
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{asset('images/virtual-class.png')}}"  class="img-fluid rounded-circle" width="132" height="132" />
                                </div>

                                <form action="{{route('auth#forgetPasswordPost')}}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                                    </div>
                                    @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                   @enderror

                                    
                                    <div class="text-center mt-3">
                                       <!-- <a href="index.html" class="btn btn-lg btn-primary">Sign in</a>-->
                                         <button type="submit" class="btn btn-lg w-100 btn-primary">submit</button> 
                                    </div>
     
                                </form>
                            </div>
                        </div>
                    </div>
                 <!--end forget pw to email-->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection