@extends('user.layouts.master')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Contact</h1>
              <p class="mb-0">The quickest way to get in touch with us is by using the contact information below.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('user#home')}}">Home</a></li>
            <li><a href="{{route('user#contactPage',Auth::user()->id)}}">Contact</a></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        

      <div class="container" data-aos="fade-up" data-aos-delay="100">
       

        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <div>
                <img width="200px;" src="{{asset('images/message (1).png')}}" class="img-fluid" alt="...">
              </div>
            </div>
            </div>
  
           <!--start contact form-->
          <div class="col-lg-8">
            <form action="{{route('user#send')}}" method="post">
              @csrf
                <div class="row gy-4">
                   

                <div class="col-md-6">
                  <input type="hidden" value ="{{Auth::user()->id}}" name="userId">
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
                  <textarea class="form-control @error('message')is-invalid @enderror" name="message" rows="6" placeholder="Message" required=""></textarea>
                  @error('message')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
                  @enderror
                </div>

                <div class="col-md-12 text-center">

                  <button type="submit" class="btn btn-success">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>
@endsection