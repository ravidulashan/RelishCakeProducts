<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.range.css')}}" rel="stylesheet">
    <link href="{{asset('css/datepicker.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->

    <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/ico/apple-touch-icon-57-precomposed.png')}}">


</head><!--/head-->

<body>
<header id="header"><!--header-->


    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{asset('images/home/logo.png')}}" alt=""
                                         style="height:40px;width: 140px"/></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="/cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <li><a href="/logout"><i class="fa fa-unlock"></i> Logout</a></li>
                            @else
                                <li><a href="/login"><i class="fa fa-plus-square-o"></i> Register</a></li>
                                <li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="@yield('home_active')">Home</a></li>
                            <li class="dropdown"><a href="#">Cake<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/cakedesign/Birthday cakes">Birthday Cake</a></li>
                                    <li><a href="/cakedesign/Cup cakes">Cupcake</a></li>
                                    <li><a href="/cakedesign/Custom cakes">Custom Cake</a></li>
                                    <li><a href="/cakedesign/Wedding cakes">Wedding Cake</a></li>


                                </ul>
                            </li>
                            <!--   <li class="dropdown"><a href="#">Online menu<i class="fa fa-angle-down"></i></a>
                                   <ul role="menu" class="sub-menu">
                                       <li><a href="blog.html">Blog List</a></li>
                                       <li><a href="blog-single.html">Blog Single</a></li>
                                   </ul>
                               </li> -->
                            <li><a href="/onlinemenu" class="@yield('menu_active')">Online menu</a></li>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                @if(\Illuminate\Support\Facades\Auth::User()->user_type==0)
                                    <li class="dropdown"><a href="#">Orders<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="/orders/onlineorders">Online Orders</a></li>
                                            <li><a href="/orders/cakerequestorders">Cake Request Orders</a></li>
                                        </ul>
                                    </li>
                                @endif
                            @endif
                            <li><a href="/aboutus" class="@yield('about_active')">About us</a></li>
                            <li><a href="/contact" class="@yield('contact_active')">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

@section('body')
@show

<footer id="footer"><!--Footer-->


    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="footerinfo">
                        <ul class="nav nav-pills">
                            <li><a href="/"><i class="fa"></i> Home</a></li>
                            <li><a href="/onlinemenu"><i class="fa"></i> Online menu</a></li>
                            <li><a href="/aboutus"><i class="fa"></i> About us</a></li>
                            <li><a href="/contact"><i class="fa"></i> Contact</a></li>
                            <li><a href="#"><i class="fa"></i>Terms and Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
</footer>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/jquery.range.js')}}"></script>

@section('scripts')
@show

</body>
</html>

