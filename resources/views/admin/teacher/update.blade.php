@extends('admin.layouts.master')

@section('title','Teacher Update Page')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="col-lg-6 offset-1">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <i class="fa-solid fa-arrow-left-long text-dark" onclick="history.back()"></i>
                        </div>
                        <div class="card-title">
                            <h3 class="text-center title-2">Update Course</h3>
                        </div>

                        <hr>
                    
                        <!--teacher update-->
                        <form action="{{route('teacher#update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                            <div class="col-4 offset-1">
                               <input type="hidden" name="teacherId" value="{{$teacher->id}}">
                                <img src="{{asset('storage/'.$teacher->image)}}" class="img-thumbnail shadow-sm"/>

                                <div class="mt-3">
                                 <input type="file" name="teacherImage" class="form-control">
                                </div>
                                <div class="mt-3">
                                 <button class="btn bg-dark text-white">
                                    <i class="fa-solid fa-circle-arrow-left"></i>Update
                                 </button>
                                </div>
                            </div>
                            
                            <div class="row col-6">
                            <div class="form-group">
                            <label  class="control-label mb-1">Category</label>
                              <select name="courseCategory" class="form-control  @error('courseCategory')is-invalid @enderror">
                                <option value="">Choose your Category..</option>
                                @foreach ($category as $c)
                                    <option value="{{$c->id}}" @if($teacher->category_id ==$c->id) selected @endif>{{$c->name}}</option>
                                @endforeach
                              </select>
                              @error('courseCategory')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                              @enderror
                            </div>

                            <div class="form-group">
                                <label  class="control-label mb-1">Message</label>
                                <textarea name="courseMessage"  class="form-control  @error('courseMessage')is-invalid @enderror" cols="30" rows="10" placeeholder="Enter Description...">{{old('courseMessage',$teacher->message)}}</textarea>
                               @error('courseMessage')
                               <div class="invalid-feedback">
                                   {{$message}}
                               </div>
                               @enderror
                            </div>

                            <div class="form-group">
                                <label  class="control-label mb-1">Name</label>
                                <input class="form-control form-control-lg @error('teacherName') is-invalid @enderror" 
                                 type="text" name="teacherName" value="{{old('teacherName',$teacher->name)}}" placeholder="Enter your name" />
                                @error('teacherName')
                            <div class="invalid-feedback">{{$message}}</div>
                           @enderror
                            </div>
                    
                         </div>

                        </div>
                    </div>
                    </form>
                  <!--end teacher update-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection
