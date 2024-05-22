@extends('admin.layouts.master')

@section('title','Create Page')

@section('content')

<!--category create -->
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100 mt-4">
                <div class="d-table-cell">
                    
                    <div class="text-center mt-4">
                        <p class="lead">
                        Create Your Category
                        <div class=""><a href="{{route('admin#categoryList')}}"><button class="btn bg-primary text-white">List</button></a></div>           
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                        
                            <div class="m-sm-4">
                                <form action="{{route('admin#categoryCreate')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input class="form-control form-control-lg @error('categoryName') is-invalid @enderror" 
                                         type="text" name="categoryName" value="{{old('categoryName')}}" placeholder="Enter your category" />
                                        @error('categoryName')
                                    <div class="invalid-feedback">{{$message}}</div>
                                   @enderror
                                    </div>
                              
                                    <div class="text-center mt-3">
                                         <button type="submit" class="btn btn-lg w-100 btn-primary">Create</button> 
                                    </div>
     
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<!--end category create-->
@endsection