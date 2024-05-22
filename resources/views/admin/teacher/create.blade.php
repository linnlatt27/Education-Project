@extends('admin.layouts.master')

@section('title','Create Page')

@section('content')
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100 mt-4">
                <div class="d-table-cell">
                    
                    <!--direct teacher list page-->
                    <div class="text-center mt-4">
                        <p class="lead">
                        Create Teacher
                        <div class=""><a href="{{route('teacher#list')}}"><button class="btn bg-primary text-white">List</button></a></div>           
                        </p>
                    </div>
                    <!--end direct teacher list page-->
                     
                    <!--create teacher -->
                    <div class="card">
                        <div class="card-body">
                        
                            <div class="m-sm-4">
                                <form action="{{route('teacher#createTeacher')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select name="courseCategory" class="form-control @error('courseCategory')is-invalid @enderror">
                                            <option value="">Choose Your Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                         @error('courseCategory')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input class="form-control form-control-lg @error('teacherName') is-invalid @enderror" 
                                         type="text" name="teacherName"  placeholder="Enter your name" />
                                        @error('teacherName')
                                    <div class="invalid-feedback">{{$message}}</div>
                                   @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="control-label mb-1">Message</label>
                                        <textarea name="courseMessage" cols="30" rows="10" class="form-control @error('courseMessage')is-invalid @enderror" placeholder="Enter Description...">{{old('courseDescription')}}</textarea>
                                     @error('courseMessage')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input class="form-control form-control-lg @error('teacherImage') is-invalid @enderror" 
                                         type="file" name="teacherImage"/>
                                        @error('teacherImage')
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
                 <!--end create teacher-->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection