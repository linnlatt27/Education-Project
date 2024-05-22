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
                         Please enter to your password
                        </p>
                    </div>
                   
                    <!--new pw reset-->
                    <div class="card">
                        <div class="card-body">
                        
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{asset('images/virtual-class.png')}}" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
                                </div>


                                <form action="{{route('reset#PasswordPost')}}" method="post">
                                    @csrf
                               <input type="hidden" name="token" value={{$token}}>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                                        @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                   @enderror
                                    </div>
                              
                                    <div class="text-center mt-3">
                                       <!-- <a href="index.html" class="btn btn-lg btn-primary">Sign in</a>-->
                                         <button type="submit" class="btn btn-lg w-100 btn-primary">submit</button> 
                                    </div>
     
                                </form>
                            </div>
                        </div>
                    </div>
                  <!--end new pw reset-->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection