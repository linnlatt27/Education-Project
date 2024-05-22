@extends('user.layouts.master')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Courses</h1>
              <p class="mb-0">The best way to learn about life at Your Mentor is to hear from our people. Each one brings their unique background, perspective, and experience — and Your Mentor is better for it.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('user#home')}}">Home</a></li>
            <li><a href="{{route('user#coursePage')}}">Courses</a></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!--title category-->
    @foreach ($categories as $category)
      <div class="dropdown mt-2 mb-4 ms-3">
        <a href="{{route('user#filter',$category->id)}}">
          <button style="width:200px;" type="button" class="dropbtn">{{$category->name}} </button></a>
      </div>
   
    @endforeach <!--end title category-->

    
    <div class="col-4 offset-3 mb-2">
      <form action="{{route('user#coursePage')}}" method="get">
          @csrf
          <div class="d-flex">
              <input type="text" class="form-control" name="key" placeholder="Search" value="{{request('key')}}">
              <button class="btn bg-dark text-white" type="submit">
                  <i class="fa-solid fa-magnifying-glass"></i>
              </button>
             </div>        
      </form>
    </div>

   @if (count($course) !=0)
      <!-- Courses List Section -->
    <section id="courses-list" class="section courses-list">

      <div class="container">

        <div class="row">

        @foreach ($course as $c)
       
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img style="width:420px; height:200px;" src="{{asset('storage/'.$c->image)}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category me-2">{{$c->category_name}}</p>
                  <p class="price">{{$c->price}}</p>
                </div>

                <h3><a href="{{route('user#details',$c->id)}}">{{$c->title}}</a></h3>
                <p class="description">{{$c->description}}</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <a href="" class="trainer-link">{{$c->teacher_name}}</a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="fa-solid fa-eye"></i>{{$c->view_count}}  
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
        @endforeach

        </div>

      </div>

    </section><!-- /Courses List Section -->
   @else
      <p class="fs-1 py-5 text-center text-danger"><i class="fa-solid fa-book me-2"></i>There is no course here</p>
   @endif

  </main>

    
@endsection