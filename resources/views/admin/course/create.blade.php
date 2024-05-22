@extends('admin.layouts.master')

@section('title','Create Page')

@section('content')
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100 mt-4">
                <div class="d-table-cell">
                    
                    <!--direct create list course-->
                    <div class="text-center mt-4">
                        <p class="lead">
                        Create Your Course
                        <div class=""><a href="{{route('course#list')}}"><button class="btn bg-primary text-white">List</button></a></div>           
                        </p>
                    </div>
                    <!--end direct create list course-->
               
                    <!--create course-->
                    <div class="card">
                        <div class="card-body">
                        
                            <div class="m-sm-4">
                                <form action="{{route('course#createCourse')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input class="form-control form-control-lg @error('courseTitle') is-invalid @enderror" 
                                         type="text" name="courseTitle" value="{{old('courseTitle')}}" placeholder="Enter your title" />
                                        @error('courseTitle')
                                    <div class="invalid-feedback">{{$message}}</div>
                                   @enderror
                                    </div>

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
                                        <label class="control-label mb-1">Description</label>
                                        <textarea name="courseDescription" cols="30" rows="10" class="form-control @error('courseDescription')is-invalid @enderror" placeholder="Enter Description...">{{old('courseDescription')}}</textarea>
                                     @error('courseDescription')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input class="form-control form-control-lg @error('courseImage') is-invalid @enderror" 
                                         type="file" name="courseImage"/>
                                        @error('courseImage')
                                    <div class="invalid-feedback">{{$message}}</div>
                                   @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <select name="courseTeacher" class="form-control @error('courseTeacher')is-invalid @enderror">
                                            <option value="">Choose Your Teacher</option>
                                            @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                         @error('courseTeacher')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>



                                    <div class="form-group">
                                        <label  class="control-label mb-1">Price</label>
                                        <input id="cc-pament" name="coursePrice" type="number"  class="form-control @error('coursePrice')is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Price....">
                                        @error('coursePrice')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                
      
                                    <div class="text-center mt-3">
                                         <button type="submit" class="btn btn-lg w-100 btn-primary">Create</button> 
                                    </div>
     
                                </form>
                            </div>
                        </div>
                    </div>
                 <!--end create course-->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection