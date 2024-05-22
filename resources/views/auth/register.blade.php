@extends('layouts.app')

@section('title','Register Page')

@section('content')
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Get started</h1>
                        <p class="lead">
                            Start creating the best possible user experience for you customers.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <!--sign up acc-->
                                <form action="{{route('register')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                                    </div>
                                    @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
 
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
                                    </div>
                                    @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                   @enderror

                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Enter password" />
                                    </div>
                                    @error('password_confirmation')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror

                                    <div class="text-center mt-3">
                                           <!--<a href="index.html" class="btn btn-lg w-100 btn-primary">Sign up</a> -->
                                      <button class="btn btn-lg w-100 btn-primary" type="submit">Sign up</button>
                                    </div>
                                </form>
                                <!--end sign up acc-->

                                <div class="text-center mt-3">
                                    <span>Already have an account?<a href="{{route('auth#loginPage')}}">Signin</a></span>
                                    </div>   

                                <div class="mb-2 mt-2 fs-3 text-dark text-center">Or</div>

                                <!--sign up with google,fb and github-->
                            <div class="text-center mt-1 mb-3">
                                   <a href="{{route('auth#google')}}" class="btn btn-lg w-100 btn-light">
                                     <img src="{{asset('static/img/avatars/google.jpg')}}" style="width: 20px" class="me-2">
                                     Sign up with Google
                                   </a>
                            </div>

                            <div class="text-center mt-2">
                                <a href="{{route('auth#facebook')}}" class="btn btn-lg w-100 btn-primary">
                                <img src="{{asset('static/img/avatars/facebook2.png')}}" style="width: 20px" class="me-2">
                                Sign up with Facebook</a>
                             </div>

                             <div class="text-center mt-2">
                                <a href="{{route('auth#github')}}" class="btn btn-lg w-100 btn-dark">
                                 <img src="{{asset('images/github_733609.png')}}" style="width: 20px" class="me-2">
                                 Sign up with Github</a>
                              </div>
                            <!--end sign up with google,fb and github-->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main> 
@endsection