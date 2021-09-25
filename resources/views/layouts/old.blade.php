<?php
use App\Models\Identity;
use Illuminate\Support\Facades\App;
use App\Models\Service;
?>
    <!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">
<head>
    <meta charset="utf-8">
    <title>GoCargo - Freight, Logistics & Transportation Website Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- LOAD CSS FILES -->
    <link href="{{URL::asset('front/css/main_'.App::currentLocale().'.css')}}" rel="stylesheet" type="text/css">
</head>

<body <?= (App::currentLocale()=='en')? 'dir="ltr"': 'dir="rtl" '?> >
<div id="preloader"></div>
<div id="wrapper">

    <!-- header begin class="transparent"-->
    <header >
        <div class="container">
            <span id="menu-btn"></span>

            <div class="row" id="arabic">
                <div class="col-md-3">

                    <!-- logo begin -->
                    <div id="logo">
                        <div class="inner">
                            <a href="{{ url(App::currentLocale().'/') }}" >
                                <img src="{{URL::asset('front/img/logo.png')}}" alt="" class="logo-1">
                                <img src="{{URL::asset('front/img/logo.png')}}" alt="" class="logo-2">
                            </a>

                        </div>
                    </div>
                    <!-- logo close -->

                </div>

                <div class="col-md-9">

                    <!-- mainmenu begin -->
                    <nav id="mainmenu-container">
                        <ul id="mainmenu" class="text-right">
                            <li><a href="{{ url(App::currentLocale().'/') }}">{{__('front.home')}}</a></li>
                            <li><a href="{{ url(App::currentLocale().'/services') }}">{{__('front.services')}}</a>
                                <ul>
                                    <li><a href="{{ url(App::currentLocale().'/services') }}">{{__('front.services')}}</a></li>
                                    <?php
                                    $services = Service::limit(6)->get(); // return collection
                                    $services->makeHidden(['resource_url']);
                                    //$services->title['en']
                                    ?>
                                    @foreach($services as $service)
                                        <li><a href="{{ url(App::currentLocale().'/service/'.$service->id) }}">{{ $service->title  }}</a></li>
                                    @endforeach


                                </ul>
                            </li>
                            <li><a href="{{ url(App::currentLocale().'/about') }}">{{__('front.about')}}</a></li>
                            <li><a href="{{ url(App::currentLocale().'/career') }}">{{__('front.career')}}</a></li>
                            <li><a href="{{ url(App::currentLocale().'/pricing') }}">{{__('front.pricing')}}</a></li>
                            <li><a href="{{ url(App::currentLocale().'/contact') }}">{{__('front.contact')}}</a></li>
                        </ul>
                    </nav>
                    <!-- mainmenu close -->

                    <!-- search -->
                    <div class="search text-right">
                        <a class="btn-default" href="{{ url((App::currentLocale()=='en')? 'ar/': 'en/')}}"> <?= (App::currentLocale()=='en')? 'العربية': 'English'?></a>
                        <!--button type="submit" class="btn-search-icon">
                            <i class="fa fa-search"></i>
                        </button-->
                    </div>
                    <!-- social icons close -->

                </div>
            </div>
        </div>
    </header>
    <!-- header close -->

    <!-- content begin -->
    <div id="content" class="no-padding">
        @yield('content')

    </div>


    <!-- footer begin -->
    <footer class="sticky">
        <div class="container">
            <div class="row <?= (App::currentLocale()=='en')? '': 'arabic" '?>">
                <?php
                $about = Identity::first(); // return collection
                $about->makeHidden(['resource_url']);
                ?>
                <div class="col-md-7">
                    <div class="widget widget_tags">
                        <h3>{{$about['title']}}</h3>
                        <img src="{{URL::asset('front/img/logo.png')}}" alt="" class="marginbottom20">
                        <div class="clearfix"></div>
                        {!!$about['text']!!}
                        <br>
                        <a href="{{ url(App::currentLocale().'/about') }}" class="btn-arrow id-color"><span class="line"></span><span class="url"> {{__('front.about')}} </span></a>


                    </div>

                </div>
                <div class="col-md-2">
                    <div class="widget">
                        <h3>{{__('front.footer lnk')}}</h3>
                        <ul class="list-1-col">
                            <li><a href="{{ url(App::currentLocale().'/services') }}">{{__('front.services')}}</a></li>
                            <li><a href="{{ url(App::currentLocale().'/about') }}">{{__('front.about')}}</a></li>
                            <li><a href="{{ url(App::currentLocale().'/career') }}">{{__('front.career')}}</a></li>
                            <li><a href="{{ url(App::currentLocale().'/pricing') }}">{{__('front.pricing')}}</a></li>
                            <li><a href="{{ url(App::currentLocale().'/contact') }}">{{__('front.contact')}}</a></li>
                        </ul>

                    </div>
                </div>



                <div class="col-md-3">
                    <div class="widget">
                        <h3>{{__('front.footer h')}}</h3>
                        {{__('front.footer text')}}
                        <div class="divider"></div>
                        <input type="text" class="form-control form-border text-center marginbottom10" name="email" id="email" placeholder="Your name" />
                        <input type="submit" id="send" value="{{__('front.footer btn')}}" class="btn btn-custom padding10 width100p" />
                    </div>
                </div>



            </div>
        </div>

        <div class="subfooter <?= (App::currentLocale()=='en')? '': 'arabic" '?>">


            <div class="col-md-6"> &copy; Copyright 2021 - {{__('front.footer com')}}</div>
            <div class="col-md-6">
                <div class="social-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-rss"></i></a>
                    <a href="#"><i class="fa fa-envelope-o"></i></a>
                </div>
            </div>

        </div>
    </footer>
    <!-- footer close -->
</div>

<!-- LOAD JS FILES -->
<script src="{{URL::asset('front/js/jquery.min.js')}}"></script>
<script src="{{URL::asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('front/js/jquery.isotope.min.js')}}"></script>
<script src="{{URL::asset('front/js/easing.js')}}"></script>
<script src="{{URL::asset('front/js/jquery.ui.totop.js')}}"></script>
<script src="{{URL::asset('front/js/selectnav.js')}}"></script>
<script src="{{URL::asset('front/js/ender.js')}}"></script>
<script src="{{URL::asset('front/js/owl.carousel.js')}}"></script>
<script src="{{URL::asset('front/js/jquery.fitvids.js')}}"></script>
<script src="{{URL::asset('front/js/jquery.plugin.js')}}"></script>
<script src="{{URL::asset('front/js/wow.min.js')}}"></script>
<script src="{{URL::asset('front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{URL::asset('front/js/tweecool.js')}}"></script>
<script src="{{URL::asset('front/js/jquery.stellar.js')}}"></script>
<script src="{{URL::asset('front/js/typed.js')}}"></script>

<!-- theme custom and plugin settings -->
<script src="{{URL::asset('front/js/custom.js')}}"></script>
<script src="{{URL::asset('front/js/custom-tweecool.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script src="{{URL::asset('front/js/map-blue-1.js')}}"></script>
<script src="{{URL::asset('front/js/map-2.js')}}"></script>
<script src="{{URL::asset('front/js/map-3.js')}}"></script>
</body>
</html>
