
@extends('user.layouts.master')

@section('content')

<main class="main">
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Course Details</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('user#home')}}">Home</a></li>
            <li><a href="{{route('user#coursePage')}}">Course</a></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->


    <!-- Courses Course Details Section -->
    <section id="courses-course-details" class="courses-course-details section">
      <div class="container" data-aos="fade-up">
      @foreach ($course as $co)
      
      <div class="row">
        <div class="col-lg-8">       
          <img style="width:420px; height:200px;" src="{{asset('storage/'.$co->image)}}" class="img-fluid" alt="">
          <h3>{{$co->category_name}}</h3>
          <input type="hidden" value ="{{Auth::user()->id}}" id="userId">
          <input type="hidden" value="{{$co->id}}" id="courseId">
          <p>
           {{$co->description}}
          </p>
        </div>
        <div class="col-lg-4">

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Teacher</h5>
            <p><a href="#">{{$co->teacher_name}}</a></p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Course Fee</h5>
            <p>{{$co->price}}kyats</p>
          </div>
            
          <!--rating count-->
          @php $ratenum =number_format($rating_value) @endphp
            <div class="course-info d-flex justify-content-between align-items-center rating">
              <p>Rating
                <div class="col-4 offset-7">
                  @for($i =1;$i <=$ratenum;$i++)
                  <i class="fa-solid fa-star checked"></i>
                  @endfor
                  @for($j =$ratenum+1;$j<=5;$j++)
                  <i class="fa-solid fa-star"></i>
                  @endfor
                  <span>
                    @if($rating->count() >0)
                    {{$rating->count()}}Ratings
                  @else
                    No Ratings
                  @endif   
                </div>
              </span></p>
          </div>
          <!--end rating count-->

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>View</h5>
            <p><i class="fa-solid fa-eye me-1"></i>{{$co->view_count+1}}</p>
          </div>
         
          <button type="button" class="btn btn-success" id="addCartBtn"><i class="fa fa-shopping-cart mr-2"></i>Add to cart</button>
        </div>
      </div>
    <hr>

     <!--rating and review add--> 
      <div class="col-lg-4">          
        <form action="{{route('rating#add')}}" method="post">
          @csrf
         <input type="hidden" name="course_id" value="{{$co->id}}">
       
        
         <p class="d-inline-flex gap-1">
           <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
             Rate this course
           </a>
            
           @if(session('status'))
                    <div class="alert">
                        <span class="closebtn col-12 mb-2" onclick="this.parentElement.style.display='none';">
                        <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                          &times; {{session('status')}}
                        </a>
                       </span> 
                      </div>
              @endif
              
              @if(session('statusAlert'))
              <div class="alert">
                  <span class="closebtn col-12 mb-2" onclick="this.parentElement.style.display='none';">
                  <a class="btn btn-danger" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    &times; {{session('statusAlert')}}
                  </a>
                 </span> 
                </div>
        @endif         

         </p>
         <div class="collapse" id="collapseExample">
           <div class="card card-body mb-2">
             <div class="rating-css">
               <div class="star-icon">
                @if ($user_rating !=null)
                      @for($i =1;$i <=$user_rating->stars_rated;$i++)
                      <input type="radio" value="{{$i}}" name="course_rating" checked id="rating{{$i}}">
                      <label for="rating{{$i}}" class="fa fa-star checked"></label>  
                     @endfor
                      @for($j =$user_rating->stars_rated+1;$j<=5;$j++)
                      <input type="radio" value="{{$j}}" name="course_rating" id="rating{{$j}}">
                      <label for="rating{{$j}}" class="fa fa-star"></label>  
                     @endfor
                @else
                  <input type="radio" value="1" name="course_rating" checked id="rating1">
                   <label for="rating1" class="fa fa-star"></label>
                  <input type="radio" value="2" name="course_rating" id="rating2">
                  <label for="rating2" class="fa fa-star"></label>
                  <input type="radio" value="3" name="course_rating" id="rating3">
                  <label for="rating3" class="fa fa-star"></label>
                  <input type="radio" value="4" name="course_rating" id="rating4">
                  <label for="rating4" class="fa fa-star"></label>
                  <input type="radio" value="5" name="course_rating" id="rating5">
                   <label for="rating5" class="fa fa-star"></label>
                @endif

               </div>
              </div> 
              <button type="submit" class="btn btn-primary col-3 offset-5">Submit</button>
             </div>
         </div>
       </form>
        
       <!--review add-->
       <a href="{{route('review#add',$co->id)}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        Write a review
      </a>
      </div>
      <!--end rating and review add-->
      <hr>
       
        </div> 
      @endforeach
      
      <!--each user rating add-->
      <div class="offset-2">
        @foreach ($ratings as $item)
        <div class="user_review">
          <label for="">{{$item->user_name}}</label>             
          <br>         
          @if ($user_rating !=null)
          @for($i =1;$i <=$user_rating->stars_rated;$i++)
          <i class="fa-solid fa-star checked"></i>
          @endfor
          @for($j =$user_rating->stars_rated+1;$j<=5;$j++)
          <i class="fa-solid fa-star"></i>
          @endfor
          @endif   
        </div>
       
        @endforeach
      </div>
      <!--end user rating add-->

    </section><!-- /Courses Course Details Section -->

    
  </main>
@endsection

@section('scriptSource')
<script>
     $(document).ready(function(){
      //increase view count
      $.ajax({
          type:'get',
          url  :'/user/ajax/increase/viewCount',
          data :{'courseId':$('#courseId').val()},
          dataType:'json'
      })
           
            //add cart course
        $('#addCartBtn').click(function(){

           $source = {
            'userId' :$('#userId').val(),
            'courseId':$('#courseId').val(),
           };

           $.ajax({
                type :'get',
                url  :'http://localhost:8000/user/ajax/addToCart',
                data :$source,
                dataType:'json',
                success: function(response) {
                   if(response.status == 'success') {
                     window.location.href = "http://localhost:8000/user/coursePage";
                   }
     }
    })
})
})
</script>
@endsection