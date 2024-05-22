@extends('user.layouts.master')
@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="">About Us<br></h1>
              <p class="mb-0">Whether you want to learn a new skill, train your teams, or share what you know with the world, you’re in the right place. As a leader in online learning, we’re here to help you achieve your goals and transform your life.
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('user#home')}}">Home</a></li>
            <li><a href="{{route('user#about')}}">About Us</a></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- About Us Section -->
    <section id="about-us" class="section about-us">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="{{asset('assets/img/about-2.jpg')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Learn anything</h3>
            <p class="fst-italic">
              Invest in your career with your mentor
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Explore any interest or trending topic and advance your skills</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Spend less money on your learning if you plan to take multiple courses this year</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Learn at your own pace,move between multiple courses,or switch to a different course</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Earn a certificate for every learning program that you complete at no additional cost</span></li>
            </ul>
          </div>

        </div>

      </div>

    </section><!-- /About Us Section -->

    <!-- Stats About Section -->
    <section id="stats-about" class="stats-about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{count($category)}}" data-purecounter-duration="1" class="purecounter"></span>
                <p class="">Category</p>
              </div>
            </div><!-- End Stats Item -->

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{count($course)}}" data-purecounter-duration="1" class="purecounter"></span>
                <p class="">Courses</p>
              </div>
            </div><!-- End Stats Item -->
  

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{count($teacher)}}" data-purecounter-duration="1" class="purecounter"></span>
                <p class="">Courses</p>
              </div>
            </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats About Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p class="">What are they saying</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 2,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

         @foreach ($review as $r)
         <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <h2>{{$r->user_name}}</h2>
                <h3>{{$r->course_title}}</h3>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>{{$r->user_review}}</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

         @endforeach

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

  </main>

@endsection