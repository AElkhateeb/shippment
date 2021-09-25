<?php
use App\Models\Category;

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<!-- Mirrored from codepixar.com/matex/matex/home-interior.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 May 2018 18:01:38 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="utf-8">

    <!-- Site Title -->
    <title>RECOVERY</title>

    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100|Poppins:300,400,700">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,400,500">
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/style.minified.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">

    <script src="{{URL::asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
</head>

<body>

<header id="header" class="site-header header-sp menu-dark  sticky">
    <div class="header-middle">
        <div class="container">
            <a class="site-logo" href="{{ url('/') }}">
                <img src="{{URL::asset('img/logo.png')}}" alt="Materialist">
            </a>
            <!-- end .site-logo -->

            <button class="nav-hamburger hidden-md hidden-lg">
                <span>toggle menu</span>
            </button>

            <div class="header-right clear">
                <div class="top-search">
                    <a href="#" class="top-search-trigger">
                        <i class="material-icons">search</i>
                    </a>
                </div>
                <!-- end .top-search -->
            </div>

            <nav class="primary-nav clear">
                <ul class="menu-list nav-hover-1 sf-menu list-none">
                    <li >
                        <a href="{{ url('/') }}">Home</a>
                     </li>
                    <li >
                        <a href="{{ url('/about') }}">About us</a>
                    </li>
                    <li class="has-dropdown ">
                        <a class="feature" href="{{ url('/categories') }}">Categories</a>
                        <ul class="sub-menu submenu-bg-image light roboto-slab fz-11 text-uppercase">
                            <?php
                            $categories = Category::limit(6)->get(); // return collection
                            $categories->makeHidden(['resource_url']);
                            ?>
                            @foreach($categories as $category)
                            <li><a href="{{ url('/categories/'.$category->id) }}">{{$category->title}}</a></li>
                                @endforeach
                        </ul>
                    </li>
                    <li class="has-dropdown ">
                        <a class="feature" href="{{ url('/products') }}">Products</a>
                        <ul class="sub-menu submenu-bg-image light roboto-slab fz-11 text-uppercase">
                            @foreach($categories as $category)
                                <li><a href="{{ url('/categories/'.$category->id.'/products') }}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="has-dropdown ">
                        <a class="feature" href="{{ url('/products') }}">Posts</a>
                        <ul class="sub-menu submenu-bg-image light roboto-slab fz-11 text-uppercase">
                            @foreach($categories as $category)
                                <li><a href="{{ url('/categories/'.$category->id.'/posts') }}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li >
                        <a href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
            </nav>
            <!-- end .primary-nav -->
        </div>
    </div>
</header>


<main id="main" class="site-content">

@yield('content')


</main> <!--  .site-content  -->

<footer class="site-footer">
    <!-- footer-widget-3 -->

    <div class="secondery-footer gray-bg-3">
        <div class="container">
            <div class="inner-footer border-top">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-8">
                        <p>Copyright 2017 <a href="http://www.codepixar.com/" class="text-link">Matex</a> | All Rights Reserved | Designed By <a href="http://www.codepixar.com/" class="text-link">CodePixar Studio</a></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <ul class="social-links social-1 text-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:void(0)" id="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>        <!-- include file -->


<!--
JavaScripts
========================== -->
<script src="{{ URL::asset('js/scripts.minified.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>




</body>
</html>
