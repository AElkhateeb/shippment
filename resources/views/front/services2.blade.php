@extends('layouts.front')
@section('content')
    <?php
    $header=[
        'img'=>'img/page/about-me.jpg',
        'h2'=>'About - Us',
        'links'=>
            '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>',
    ];
    $header2=[
        'shade'=>'Recovery',
        'h2'=>'About - Us',
        'text'=>
            '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br class="visible-lg"> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>',
    ];

    $serviceId=1;
   // $about = $data['about'];
    $service = $data['service'];

    ?>
    @include('front\page-header',compact('header'))
<section class="no-padding">
    <div class="container-fullwidth">
        @foreach($service as $service)
            <div id="bg-box-service-{{ $serviceId }}" class="one-tow">
                <div class="bg-color-fx light-text padding-5 text-center">
                    <h3>{{ $service['title'] }}</h3>
                    <div class="tiny-border margintop10 marginbottom10"></div>
                    <img src="{{URL::asset($service['media_url'])}}" class="img-responsive margintop20 marginbottom20 wow fadeInRight" alt="" />
                    <p>{!! $service['text'] !!}</p>
                    <a href="{{ url(App::currentLocale().'/service/'.$service['id']) }}" class="btn-arrow hover-light"><span class="line"></span><span class="url">View Details</span></a>
                </div>
            </div>
<?php $serviceId+1; ?>
            @endforeach


    </div> <!-- /.container -->

</section>
@stop
