@extends('user.layouts.master')
@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Teachers</h1>
              <p class="mb-0">Come teach with us
                Become an instructor and change lives — including your own</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('user#home')}}">Home</a></li>
            <li><a href="{{route('user#teacherPage')}}">Teachers</a></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Teachers Section -->
    <section id="trainers" class="section trainers">

      <div class="container">

        <div class="row gy-5">

         @foreach ($teacher as $t)
         <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
          <div class="member-img">
            <img src="{{asset('storage/'.$t->image)}}" class="img-fluid" alt="">
          </div>
          <div class="member-info text-center">
            <h4>{{$t->name}}</h4>
            <span class="">{{$t->category_name}}</span>
            <p>{{$t->message}}</p>
          </div>
        </div><!-- End Team Teacher -->
         @endforeach

        </div>

      </div>

    </section><!-- /Teachers Section -->

  </main>  
@endsection