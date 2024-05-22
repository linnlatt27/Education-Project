<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <!--css master-->
    <style>
        .alert {
          padding: 20px;
          background-color:#f44336;
          color: white;
        }
        
        .closebtn {
          margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;
        }
        
        .closebtn:hover {
          color: black;
        }

        </style>

         <style>
        .alert {
          padding: 20px;
          background-color:#f44336;
          color: white;
        }
        
        .closebtn {
          margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;
        }
        
        .closebtn:hover {
          color: black;
        }
        </style>
        <!--end css master-->

        <!--admin master-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{asset('static/img/icons/icon-48x48.png')}}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>@yield('title')</title>

	<link href="{{asset('static/css/app.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <!--end admin master-->
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
          <span class="align-middle">AdminKit</span>
        </a>
    
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Pages
                    </li>
    
                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="{{route('admin#categoryList')}}">
                            <i class="fa-solid fa-list"></i>Category
            </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('teacher#list')}}">
                            <i class="fa-solid fa-chalkboard-user"></i>Teachers
            </a>
                    </li>

    
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('course#list')}}">
                            <i class="fa-solid fa-chalkboard"></i>Courses
            </a>
                    </li>

                 
    
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin#orderList')}}">
                            <i class="fa-solid fa-cart-plus"></i>Order
            </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('rating#list')}}">
                            <i class="fa-solid fa-users"></i>Ratings
            </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('contact#list')}}">
                            <i class="fa-solid fa-envelope"></i>Contact Message
            </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('certificate#list')}}">
                            <i class="fa-solid fa-graduation-cap"></i>Certificate
            </a>
                    </li>
    

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin#userList')}}">
                            <i class="fa-solid fa-users"></i>User List
            </a>
                    </li>
    
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('allDashboard#list')}}">
                            <i class="align-middle" data-feather="sliders"></i>  <span class="align-middle">All Dashboard</span>
            </a>
                    </li>
    
            </div>
        </nav>

        <!--admin acc's about-->
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>
    
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                     
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>
    
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                 @if (Auth::user()->image ==null)
                                 <img src="{{asset('image/default_user.png')}}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /><span class="text-dark">{{Auth::user()->name}}</span>
                                 @else
                                 <img src="{{asset('storage/'.Auth::user()->image)}}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /><span class="text-dark">{{Auth::user()->name}}</span>
                                 @endif
                                
              </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{route('profile#details')}}"><i class="fa-solid fa-user me-1"></i> Profile</a>
                                <a class="dropdown-item" href="{{route('admin#directChangePassword')}}"><i class="fa-solid fa-key me-1"></i>Change Password</a>
                                <a class="dropdown-item" href="{{route('account#list')}}"><i class="fa-solid fa-users me-1"></i>Account List</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button class="btn bg-dark text-white col-10 w-80 mr-2">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
    <!--admin acc's about-->

    <!--yield master-->
	@yield('content')
    <!--end yield master-->
    
</div>

    </div>

    <!--admin master's script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script src="{{asset('static/js/app.js')}}"></script>
    <!--end admin master's script-->			
</body>
<!--jquery master-->
@yield('scriptSource')
<!--jquery master end-->
</html>