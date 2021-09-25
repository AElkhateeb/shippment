<?php
use App\Models\Identity;
use Illuminate\Support\Facades\App;
use App\Models\Service;
use App\Models\Branch;
use App\Models\Social;

$base = str_replace(url(App::currentLocale().'/')."/", '', Request::url());
if(($base== URL::to('/') ) || ($base==url(App::currentLocale())) ){
    $base="";
}


?>
<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>@yield('title')</title>
    <meta name="description"
          content="@yield('description')">
    <!-- LOAD CSS FILES -->
    <link href="{{URL::asset('front/front/css/main_'.App::currentLocale().'.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('front/front/css/custom-onepage.css')}}" />
    <!-- All Plugins Css -->
    <link rel="stylesheet" href="{{URL::asset('front/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/assets/css/nav_'.App::currentLocale().'.css')}}" />


    <!-- Custom CSS -->
    <link href="{{URL::asset('front/assets/css/styles_'.App::currentLocale().'.css')}}" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="{{URL::asset('front/assets/css/colors.css')}}" rel="stylesheet">
    <link href="{{URL::asset('front/css/cost.css')}}" rel="stylesheet">


    <!-- LOAD CSS FILES -->


</head>

<body  <?= (App::currentLocale()=='en')? 'dir="ltr"': 'dir="rtl" '?> class="green-skin" >
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div id="preloader"><div class="preloader"><span></span><span></span></div></div>



<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <div class="top-header">
        <div class="container">
            <div class="row arabic">
                <?php
                $branches = Branch::first()->with('contact')->limit(1)->get(); // return collection
                $branches->makeHidden(['resource_url']);
                $social = Social::limit(5)->get(); // return collection
                $social->makeHidden(['resource_url']);
                $counter=0;
                ?>



                <div class="col-lg-6 col-md-6">
                    <div class="cn-info">
                        <ul>
                            @foreach($branches as $branches )
                                @foreach($branches['contact'] as $contact )
                                    <?php //$info= strip_tags( $contact['text']); ?>
                                         @if($counter>0)
                                            @if($counter<=2)
                            <li><i class="fa {{ $contact['icon'] }}"></i>{{strip_tags( $contact['text']) }}  </li>
                                            @endif

                                            @break($counter>2)

                                        @endif
                                        <?php $counter++; ?>
                                @endforeach
                            @endforeach

                        </ul>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <ul class="top-social">
                        @foreach($social as $social )
                        <li><a href="{{ $social['link'] }}"><i class="{{ str_replace("fa-","lni-",$social['icon']) }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    <div class="header header-light nav-left-side">
        <nav class="headnavbar ">
            <div class="nav-header">
                <a href="{{ url(App::currentLocale().'/') }}" class="brand"><img style="width: 108px; height: 44px;"src="{{URL::asset('front/assets/img/logo-light.png')}}" alt="" /></a>
                <button class="toggle-bar"><span class="ti-align-justify"></span></button>
            </div>
            <ul class="menu arabic">

                <li><a {!! ($base=='home'|| $base==url() ||$base==url(App::currentLocale())  )? 'class="active"' :'' !!} href="{{ url(App::currentLocale().'/') }}">{{__('front.home')}}</a></li>
                <li class="dropdown">
                    <a {!! ($base=='services')? 'class="active"' :'' !!} href="{{ url(App::currentLocale().'/services') }}">{{__('front.services')}}</a>
                    <ul class="dropdown-menu">
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
                <li><a {!!  ($base=='about')? 'class="active"' :'' !!} href="{{ url(App::currentLocale().'/about') }}">{{__('front.about')}}</a></li>
                <li><a {!! ($base=='career')? 'class="active"' :''  !!} href="{{ url(App::currentLocale().'/career') }}">{{__('front.career')}}</a></li>
                <li><a {!! ($base=='pricing')? 'class="active"' :'' !!} href="{{ url(App::currentLocale().'/pricing') }}">{{__('front.pricing')}}</a></li>
                <li><a {!! ($base=='contact')? 'class="active"' :'' !!}  href="{{ url(App::currentLocale().'/contact') }}">{{__('front.contact')}}</a></li>
            </ul>

            <ul class="attributes attributes-desk">
                <li class="log-icon log-seprate"><a href="#" data-toggle="modal" data-target="#login">{{__('front.login')}}</a></li>
                <li class="log-icon"><a href="#" data-toggle="modal" data-target="#signup">{{__('front.signup')}}</a></li>
                <li class="submit-attri theme-log"><a href="{{ url((App::currentLocale()=='en')? 'ar/': 'en/')}}/{{ $base }}"><?= (App::currentLocale()=='en')? 'العربية': 'English'?></a></li>

            </ul>

        </nav>
    </div>
    <!-- End Navigation -->
    <div class="clearfix"></div>
</div>
<div id="wrapper">
    <div id="content" class="no-padding">
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
        @yield('content')
    </div>
    <!-- ============================ Footer Start ================================== -->
    <footer class="sticky">
        <div class="container">
            <div class="row <?= (App::currentLocale()=='en')? '': 'arabic" '?>">
                <div class="col-lg-7 col-md-12">
                    <?php
                    $about = Identity::first(); // return collection
                    $about->makeHidden(['resource_url']);
                    ?>
                    <div class="widget widget_tags">
                        <h3 >{{$about['title']}}</h3>
                        <div class="clearfix"></div>
                        {!!$about['text']!!}
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="widget">
                        <h3>{{__('front.footer h')}}</h3>
                        {{__('front.footer text')}}
                        <div class="divider"></div>
                        <form  id="clientForm" method="POST" action="{{ url(App::currentLocale().'/client') }}">
                            @csrf
                            <input type="tel" class="form-control form-border text-center marginbottom10" name="phone" id="phone" placeholder="{{__('front.footer btn')}}"  required="required" />
                        <input type="submit" id="send" value="Subscribe Now" class="btn btn-custom padding10 width100p" />
                        </form>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
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

            </div>
        </div>

        <div class="subfooter">
            <div class="container">
                <div class="row align-items-center <?= (App::currentLocale()=='en')? '': 'arabic" '?>">

                    <div class="col-lg-6 col-md-6 text-center">
                        <p class="mb-0">© 2021 - Icode Media </p>
                    </div>
                    <div class="col-lg-6 col-md-6 text-center">
                        <ul class="footer-bottom-social">
                            <?php  $social = Social::limit(5)->get(); // return collection
                            $social->makeHidden(['resource_url']); ?>
                            @foreach($social as $social )
                                <li><a href="{{ $social['link'] }}"><i class="{{ str_replace("fa-","lni-",$social['icon']) }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="registermodal">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">Log In</h4>
                    <div class="login-form">
                        <form>

                            <div class="form-group">
                                <label>User Name</label>
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-with-icon">
                                    <input type="password" class="form-control" placeholder="*******">
                                    <i class="ti-unlock"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                            </div>

                        </form>
                    </div>
                    <div class="modal-divider"><span>Or login via</span></div>
                    <div class="social-login mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn connect-twitter"><i class="ti-twitter"></i>Twitter</a></li>
                        </ul>
                    </div>
                    <div class="text-center">
                        <p class="mt-5"><a href="#" class="link">Forgot password?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Sign Up Modal -->
    <div class="modal fade signup" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="sign-up">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">Sign Up</h4>
                    <div class="login-form">
                        <form>

                            <div class="row">

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" placeholder="Full Name">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="email" class="form-control" placeholder="Email">
                                            <i class="ti-email"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" placeholder="Username">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="password" class="form-control" placeholder="*******">
                                            <i class="ti-unlock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="password" class="form-control" placeholder="123 546 5847">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select class="form-control">
                                                <option>As a Customer</option>
                                                <option>As a Agent</option>
                                                <option>As a Agency</option>
                                            </select>
                                            <i class="ti-briefcase"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Sign Up</button>
                            </div>

                        </form>
                    </div>
                    <div class="modal-divider"><span>Or login via</span></div>
                    <div class="social-login mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn connect-twitter"><i class="ti-twitter"></i>Twitter</a></li>
                        </ul>
                    </div>
                    <div class="text-center">
                        <p class="mt-5"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#" class="link">Go For LogIn</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!--a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a-->


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{URL::asset('front/assets/js/jquery.min.js')}}"></script>
<script src="{{URL::asset('front/assets/js/popper.min.js')}}"></script>
<script src="{{URL::asset('front/assets/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('front/assets/js/rangeslider.js')}}"></script>
<script src="{{URL::asset('front/assets/js/select2.min.js')}}"></script>
<script src="{{URL::asset('front/assets/js/aos.js')}}"></script>

<script src="{{URL::asset('front/assets/js/owl.carousel.min.js')}}"></script>

<script src="{{URL::asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{URL::asset('front/assets/js/slick.js')}}"></script>
<script src="{{URL::asset('front/assets/js/slider-bg.js')}}"></script>
<script src="{{URL::asset('front/assets/js/lightbox.js')}}"></script>
<script src="{{URL::asset('front/assets/js/imagesloaded.js')}}"></script>

<script src="{{URL::asset('front/assets/js/isotope.min.js')}}"></script>

<script src="{{URL::asset('front/assets/js/coreNavigation.js')}}"></script>
<script src="{{URL::asset('front/assets/js/custom.js')}}"></script>


<!-- LOAD JS FILES -->
<script src="{{URL::asset('front/front/js/jquery.isotope.min.js')}}"></script>
<script src="{{URL::asset('front/front/js/easing.js')}}"></script>
<script src="{{URL::asset('front/front/js/jquery.ui.totop.js')}}"></script>
<!--script src="{{URL::asset('front/front/js/selectnav.js')}}"></script-->
<script src="{{URL::asset('front/front/js/ender.js')}}"></script>
<!--script src="{{URL::asset('front/front/js/owl.carousel.js')}}"></script-->
<script src="{{URL::asset('front/front/js/jquery.fitvids.js')}}"></script>
<script src="{{URL::asset('front/front/js/jquery.plugin.js')}}"></script>
<script src="{{URL::asset('front/front/js/wow.min.js')}}"></script>
<!--script src="{{URL::asset('front/front/js/jquery.magnific-popup.min.js')}}"></script-->
<script src="{{URL::asset('front/front/js/tweecool.js')}}"></script>
<script src="{{URL::asset('front/front/js/jquery.stellar.js')}}"></script>
<script src="{{URL::asset('front/front/js/typed.js')}}"></script>

<!-- theme custom and plugin settings -->
<script src="{{URL::asset('front/js/rang.js')}}"></script>
<script src="{{URL::asset('front/front/js/custom.js')}}"></script>
<script src="{{URL::asset('front/front/js/custom-tweecool.js')}}"></script>

<!-- script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script src="{{URL::asset('front/js/map-blue-1.js')}}"></script>
<script src="{{URL::asset('front/js/map-2.js')}}"></script>
<script src="{{URL::asset('front/js/map-3.js')}}"></script>

<script src="{{URL::asset('site/js/calco.js')}}"></script-->
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

</body>
</html>
