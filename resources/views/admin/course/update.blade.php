@extends('admin.layouts.master')

@section('title','Course Update Page')
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

                        <!--update course-->
                        <form action="{{route('course#update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                            <div class="col-4 offset-1">
                               <input type="hidden" name="courseId" value="{{$course->id}}">
                                <img src="{{asset('storage/'.$course->image)}}" class="img-thumbnail shadow-sm"/>

                                <div class="mt-3">
                                 <input type="file" name="courseImage" class="form-control">
                                </div>
                                <div class="mt-3">
                                 <button class="btn bg-dark text-white">
                                    <i class="fa-solid fa-circle-arrow-left"></i>Update
                                 </button>
                                </div>
                            </div>

                         <div class="row col-6">
                            <div class="form-group">
                                <label  class="control-label mb-1">Title</label>
                                <input id="cc-pament" name="courseTitle" type="text" value="{{old('courseTitle',$course->title)}}" class="form-control  @error('courseTitle')is-invalid @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Title...">
                               @error('courseTitle')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label  class="control-label mb-1">Description</label>
                                <textarea name="courseDescription"  class="form-control  @error('courseDescription')is-invalid @enderror" cols="30" rows="10" placeeholder="Enter Description...">{{old('courseDescription',$course->description)}}</textarea>
                               @error('courseDescription')
                               <div class="invalid-feedback">
                                   {{$message}}
                               </div>
                               @enderror
                            </div>

                            <div class="form-group">
                                <label  class="control-label mb-1">Category</label>
                              <select name="courseCategory" class="form-control  @error('courseCategory')is-invalid @enderror">
                                <option value="">Choose your Category..</option>
                                @foreach ($category as $c)
                                    <option value="{{$c->id}}" @if($course->category_id ==$c->id) selected @endif>{{$c->name}}</option>
                                @endforeach
                              </select>
                              @error('courseCategory')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                              @enderror
                            </div>

                            <div class="row col-6">
                                <div class="form-group">
                                    <label  class="control-label mb-1">Teacher</label>
                                    <select name="courseTeacher" class="form-control  @error('courseTeacher')is-invalid @enderror ">
                                        <option value="">Choose your Teacher..</option>
                                        @foreach ($teacher as $t)
                                            <option value="{{$t->id}}" @if($course->teacher_id ==$t->id) selected @endif>{{$t->name}}</option>
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
                                <input id="cc-pament" name="coursePrice" type="number" value="{{old('coursePrice',$course->price)}}" class="form-control  @error('coursePrice')is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Price...">
                                @error('coursePrice')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label  class="control-label mb-1">View Count</label>
                                <input id="cc-pament" name="viewCount" type="text" value="{{old('viewCount',$course->view_count)}}" class="form-control " aria-required="true" aria-invalid="false" disabled>
                            </div>

                         </div>

                        </div>
                    </form>
                  <!--end update course-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection
