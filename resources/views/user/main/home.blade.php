@extends('user.layouts.master')

@section('content')


<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="{{asset('assets/img/hero-bg.jpg')}}" alt="" data-aos="fade-in">

      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100" class="">Learning Today,<br>Leading Tomorrow</h2>
        <p data-aos="fade-up" data-aos-delay="200">We are team of talented teachers making websites with great technology</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="courses.html" class="btn-get-started">Get Started</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="{{asset('assets/img/about.jpg')}}" class="img-fluid" alt="">
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

    </section><!-- /About Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts">

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
              <span data-purecounter-start="0" data-purecounter-end="{{count($courses)}}" data-purecounter-duration="1" class="purecounter"></span>
              <p class="">Courses</p>
            </div>
          </div><!-- End Stats Item -->

      
          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{count($teacher)}}" data-purecounter-duration="1" class="purecounter"></span>
              <p class="">Teachers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Counts Section -->

    <!-- Features Section -->
    <section id="features" class="features section mb-2">

      <div class="container">
        <div class="col-10 offset-2 mb-5 fs-4 text-success">
          Trusted by over 15,000 companies and millions of learners around the world  
      </div><!-- End Feature Item -->

        <div class="row gy-4">
        
          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="features-item">
              <img style="width:60px;" src="{{asset('images/linkedin_3536505.png')}}">
              <h3 class="mx-2">Linkedin</h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="features-item">
              <img style="width:60px;" src="{{asset('images/google_300221.png')}}">
              <h3 class="mx-2">Google</h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="features-item">
              <img style="width:60px;" src="{{asset('images/github_733609.png')}}">
              <h3 class="mx-2">Github</h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="features-item">
              <img style="width:60px;" src="{{asset('images/apple (1).png')}}">
              <h3 class="mx-2">Apple</h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
            <div class="features-item">
              <img style="width:60px;" src="{{asset('images/youtube.png')}}">
              <h3 class="mx-2">Youtube</h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
            <div class="features-item">
              <img style="width:60px;" src="{{asset('images/bank.png')}}">
              <h3 class="mx-2">KBY Bank</h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
            <div class="features-item">
              <img style="width:60px;" src="{{asset('images/footer.png')}}">
              <h3 class="mx-2">Code Lab</h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
            <div class="features-item">
              <img style="width:60px;" src="{{asset('images/pinterest.png')}}">
              <h3 class="mx-2">Pinterest</h3>
            </div>
          </div><!-- End Feature Item -->      

        </div>

      </div>

    </section><!-- /Features Section -->

    <!--Popular Courses Section -->
    <section id="courses" class="courses section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Courses</h2>
        <p class="">Popular Courses</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">

         @foreach ($course as $c)
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            <img style="width:420px; height:200px;" src="{{asset('storage/'.$c->image)}}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">{{$c->category_name}}</p>
                <p class="price">{{$c->price}}</p>
              </div>

              <h3><a href="{{route('user#details',$c->id)}}">{{$c->title}}</a></h3>
              <p class="description">{{$c->description}}</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-1-2.jpg" class="img-fluid" alt="">
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

    </section><!-- /Popular Courses Section -->

      
    <!-- Certificate Section -->
    <section id="courses" >

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <p class="">Certificate After Course</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img width="200px;" src="{{asset('images/certificate (2).png')}}" class="img-fluid" alt="...">
              <div class="course-content">
                <h3><a href="{{route('user#certificatePage')}}">Enroll now</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                 
                </div>
              </div>
            </div>
          </div> <!-- End Certificate Item-->

         
        </div>

      </div>

    </section><!-- /Certificate Section -->
   

  </main>

@endsection