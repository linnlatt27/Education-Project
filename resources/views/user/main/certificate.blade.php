@extends('user.layouts.master')
@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Certificate</h1>
              <p class="mb-0">Earn industry-recognized certifications,proving your proficiency in your career prospects with our targeted learning approach</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('user#home')}}">Home</a></li>
            <li><a href="{{route('user#certificatePage')}}">Certificate</a></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Certificate Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <div>
                <img width="200px;" src="{{asset('images/certificate (1).png')}}" class="img-fluid" alt="...">
              </div>
            </div>


          </div>
         
          <!--certificate send info-->
          <div class="col-lg-8">
            <form action="{{route('user#sendCertificate')}}" method="post">
                @csrf
              <div class="row gy-4">
                <input type="hidden" value ="{{Auth::user()->id}}" name="userId">
                <div class="col-md-6">
                    
                    <input type="text" value="{{old('name',Auth::user()->name)}}" name="name" class="form-control @error('name')is-invalid @enderror" placeholder="Your Name" required="">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6 ">
                    <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" value="{{old('email',Auth::user()->email)}}" placeholder="Your Email" required="">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <select name="courseTitle" class="form-control @error('courseTitle')is-invalid @enderror">
                        <option value="">Choose Your Course</option>
                        @foreach($courses as $c)
                        <option value="{{$c->id}}">{{$c->title}}</option>
                        @endforeach
                    </select>
                     @error('courseTitle')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                </div>


                <div class="col-md-12 text-center">

                    <button type="submit" class="btn btn-success">Send</button>
                  </div>

              </div>
            </form>
          </div><!-- End Certificate Form -->
           
        </div>

      </div>

    </section><!-- /Certificate Section -->

  </main>
@endsection