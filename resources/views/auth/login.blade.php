@extends('layouts.app')

@section('title','Login Page')

@section('content')
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome back</h1>
                        <p class="lead">
                            Sign in to your account to continue
                        </p>
                    </div>
                 
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{asset('images/virtual-class.png')}}"  class="img-fluid rounded-circle" width="132" height="132" />
                                </div>

                    <!--sign in with email and pw-->
                                <form action="{{route('login')}}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                                        <!--forgot pw-->
                                        <small>
                                      <a href="{{route('auth#forgetPasswordPage')}}">Forgot password?</a>
                                    </small>
                                    <!--end forgot pw-->
                                    </div>

                                    <div>
                                    <label class="form-check">
                                       <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                                       <span class="form-check-label">
                                       Remember me next time
                                    </span>
                                    </label>
                                    </div>

                                    <div class="text-center mt-3">
                                         <button type="submit" class="btn btn-lg w-100 btn-primary">Log in</button> 
                                    </div>

                                    <div class="text-center mt-3">
                                     <span>Already have an account?<a href="{{route('auth#registerPage')}}">Signup</a></span>
                                     </div>
                                </form>
                                <!--end sign in and pw-->

                                <!--log in and google,fb and github-->
                                <div class="text-center mt-3 mb-3">
                                    <a href="{{route('auth#google')}}" class="btn btn-lg w-100 btn-light">
                                     <img src="{{asset('static/img/avatars/google.jpg')}}" style="width: 20px" class="me-2">
                                     Log in with Google
                                    </a>
                                </div>
                               
                                <div class="text-center mt-2">
                                    <a href="{{route('auth#facebook')}}" class="btn btn-lg w-100 btn-primary">
                                     <img src="{{asset('static/img/avatars/facebook2.png')}}" style="width: 20px" class="me-2">
                                     Log in with Facebook</a>
                                  </div>

                                  <div class="text-center mt-2">
                                    <a href="{{route('auth#github')}}" class="btn btn-lg w-100 btn-dark">
                                     <img src="{{asset('images/github_733609.png')}}" style="width: 30px" class="me-2">
                                     Log in with Github</a>
                                  </div>
                                  <!--end log in google,fb and github-->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection