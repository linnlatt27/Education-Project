@extends('admin.layouts.master')

@section('title','Edit Page')

@section('content')

<!--category update-->
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100 mt-4">
                <div class="d-table-cell">
                    
                    <div class="text-center mt-4">
                        <p class="lead">
                        Update Your Category
                        <div class=""><a href="{{route('admin#categoryList')}}"><button class="btn bg-primary text-white">List</button></a></div>           
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                        
                            <div class="m-sm-4">
                                <form action="{{route('admin#categoryUpdate')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="hidden" name="categoryId" value="{{$category->id}}">
                                        <input class="form-control form-control-lg @error('categoryName') is-invalid @enderror" 
                                         type="text" name="categoryName" value="{{old('categoryName',$category->name)}}" placeholder="Enter your category" />
                                        @error('categoryName')
                                    <div class="invalid-feedback">{{$message}}</div>
                                   @enderror
                                    </div>
                              
                                    <div class="text-center mt-3">
                                         <button type="submit" class="btn btn-lg w-100 btn-primary">Update</button> 
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
<!--end category -->
@endsection