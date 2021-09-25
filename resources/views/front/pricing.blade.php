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
                <div id="bg-box-service-{{ $serviceId }}" class="one-third">
                    <div class="bg-color-fx light-text padding-5 text-center">
                        <h3>{{ $service['name'] }}</h3>

                        <ul class="list-1-col">
                            <li><a href="#">{{ $service['weight'] }}</a></li>
                            <li><a href="#">{{ $service['number'] }}</a></li>
                            <li><a href="#">{{__('front.pricing city')}}</a></li>
                        </ul>
                        <div class="divider-single"></div>
                        <a href="{{ url(App::currentLocale().'/service/'.$service['id']) }}" class="btn-border popup-gmaps hover-light"><span class="line"></span><span class="url">View Details</span></a>
                    </div>
                </div>
                <?php $serviceId+1; ?>
            @endforeach


        </div> <!-- /.container -->

    </section>
@stop
