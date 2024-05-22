<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>User Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('user/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('user/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('user/css/style.css')}}" rel="stylesheet">
</head>

<body>


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav  mr-auto py-0">
                            <a href="{{route('user#home')}}" class="nav-item text-success nav-link active">Home</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th>Courses</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cartList as $c)
                        <tr>
                            <td class="align-middle"><img src="{{asset('storage/'.$c->course_image)}}" alt="" style="width: 50px;">
                                </td>
                            <td class="align-middle">{{$c->course_title}}
                                <input type="hidden" class="orderId" value="{{$c->id}}">
                                <input type="hidden" class="courseId" value="{{$c->course_id}}">
                                <input type="hidden" class="userId" value="{{$c->user_id}}">
                            </td>
                            <td class="align-middle">{{$c->course_price}}kyats</td>
                            <td class="align-middle" id="total">{{$c->course_price}}kyats</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger btnRemove"><i class="fa fa-times"></i></button></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6 id="subTotalPrice">{{$totalPrice}}kyats</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="finalPrice">{{$totalPrice}}kyats</h5>
                        </div>
                        <button class="btn btn-block btn-success font-weight-bold my-3 py-3" id="orderBtn">Proceed To Checkout</button>
                    
                        <button class="btn btn-block btn-danger font-weight-bold my-3 py-3" id="clearBtn">
                            <span class="text-white">
                               Clear Cart</span>
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->




    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('user/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('user/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Contact Javascript File -->
    <script src="{{asset('user/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('user/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('user/js/main.js')}}"></script>

    <!--cart ajax jquery-->
<script>
    $(document).ready(function(){

            //remove course each
            $('.btnRemove').click(function(){
            $parentNode =$(this).parents("tr");
            $courseId  =$parentNode.find(".courseId").val();
            $orderId    =$parentNode.find(".orderId").val();

           $.ajax({
            type :'get',
            url  :'http://localhost:8000/user/ajax/clear/current/course',
            data :{'courseId':$courseId,'orderId':$orderId},
            dataType:'json',
            })

            $parentNode.remove();

            $totalPrice =0;
                $('#dataTable tbody tr').each(function(index,row) {
                    $totalPrice += Number($(row).find('#total').text().replace("kyats",""));
                });

                $("#subTotalPrice").html(`${$totalPrice} kyats`);
                $("#finalPrice").html(`${$totalPrice} kyats`);
            
        })
    })
       
    //from cart to orderlist
    $('#orderBtn').click(function(){
            $orderList =[];

            $random =Math.floor(Math.random() * 100000000001);

            $('#dataTable tbody tr').each(function(index,row) {
                $orderList.push({
                    'user_id' :$(row).find('.userId').val(),
                    'course_id':$(row).find('.courseId').val(),
                    'total' :$(row).find('#total').text().replace('kyats','')*1,
                    'order_code':'EDU'+$random

                });
         });

         $.ajax({
            type :'get',
            url  :'/user/ajax/order',
            data :Object.assign({},$orderList),
            dataType:'json',
            success: function(response) {
             if(response.status == "true") {
                window.location.href ="http://localhost:8000/user/homePage";
             }
            }
            })
        })

            //when clear button click
         $('#clearBtn').click(function() {
            $('#dataTable tbody tr').remove();
            $("#subTotalPrice").html("0 kyats");
            $("#finalPrice").html("0 kyats");

            $.ajax({
            type :'get',
            url  :'http://localhost:8000/user/ajax/clear/cart',
            dataType:'json'
            })
        })

    </script>
</body>

</html>