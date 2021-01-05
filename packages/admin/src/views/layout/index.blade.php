<!DOCTYPE HTML>
<html>
<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <base href="{{asset('')}}">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{('admins/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{('admins/css/style1.css')}}" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="{{('admins/css/font-awesome1.css')}}" rel="stylesheet">
    <!-- jQuery -->
    <!-- lined-icons -->
    <link rel="stylesheet" href="{{('admins/css/icon-font.min1.css')}}" type='text/css' />
    <!-- //lined-icons -->
    <!-- chart -->
    <script src="{{('admins/js/Chart.js')}}"></script>
    <!-- //chart -->
    <!--animate-->
    <link href="{{('admins/css/animate1.css')}}" rel="stylesheet" type="text/css" media="all">
    <script src="{{('admins/js/wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!----webfonts--->
    <link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Meters graphs -->
    <script src="{{('admins/js/jquery-1.10.2.min.js')}}"></script>
    <!-- Placed js at the end of the document so the pages load faster -->

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 300px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, .4);
            }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        #popup {
            width: 80%;
            height: 100%;
        }
    </style>

</head>

<body class="sticky-header left-side-collapsed">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">
        <!--logo and iconic logo start-->
        <div class="logo">
            <h1><a href="{{(route('dashboard'))}}"><span>Admin</span></a></h1>
        </div>
        <div class="logo-icon text-center">
            <a href="{{(route('dashboard'))}}"><i class="lnr lnr-home"></i> </a>
        </div>

        <!--logo and iconic logo end-->
        <div class="left-side-inner">

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active"><a href="{{(route('dashboard'))}}"><i class="lnr lnr-power-switch"></i><span>Trang chủ</span></a></li>
                <li><a href="{{(route('add_product'))}}"><i class="lnr lnr-spell-check"></i> <span>Thêm sản phẩm</span></a></li>
                <li class="menu-list"><a href="#"><i class="lnr lnr-menu"></i>  <span>Danh sách</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{(route('list_user'))}}">Danh sách người dùng</a> </li>
                        <li><a href="{{(route('list_admin'))}}">Danh sách admin</a> </li>
                        <li><a href="{{(route('list_product'))}}">Danh sách sản phẩm</a></li>
                        <li><a href="{{(route('list_order'))}}">Danh sách đơn hàng</a></li>
                    </ul>
                </li>
                @if (Cookie::get('main_admin') == true)
                    <li><a href="{{(route('sign_up'))}}"><i class="lnr lnr-book"></i> <span>Đăng ký</span></a></li>
                @endif
            </ul>
            <!--sidebar nav end-->
        </div>
    </div>
    <!-- left side end-->
    <!-- main content start-->
    <div class="main-content">
    <!--logo and iconic logo start-->
        @include('admins::layout.header_admin')
    <!--body wrapper start-->
        @yield('content')
    </div>
    <!--body wrapper end-->
    </div>
    <!--footer section start-->a
    <footer>
        <p>&copy 2020  <a href="{{(route('home'))}}" target="_blank">Web Shopping.</a></p>
    </footer>
    <!--footer section end-->

    <!-- main content end-->
</section>

<script src="{{('admins/js/jquery.nicescroll.js')}}"></script>
<script src="{{('admins/js/scripts.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{('admins/js/bootstrap.min.js')}}"></script>
</body>
</html>
