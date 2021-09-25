@extends('layouts.front')
@section('content')
    <?php
    $service = $data['service'];
    $header=[
        'img'=>'img/page/about-me.jpg',
        'h2'=> $service[0]['title'] ,
        'links'=>
            '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>',
    ];
    $header2=[
        'shade'=>'Recovery',
        'h2'=>'About - Us',
        'text'=>
            '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br class="visible-lg"> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>',
    ];


   // $about = $data['about'];
    $service = $data['service'];
    ?>
    @include('front\page-header',compact('header'))
    <div id="content" class="no-top no-bottom">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{URL::asset($service[0]['media_url'])}}" alt="" class="img-responsive pull-right" />
                        <h2>{{ $service[0]['title'] }}</h2>
                        <p class="lead">{!! $service[0]['text'] !!}  </p>
                        <div class="divider-deco"><span></span></div>
                        {!! $service[0]['body'] !!}

                    </div>

                    <div class="divider-single"></div>
                    <div class="divider-half"></div>
                </div>
            </div>
        </section>
    </div>
@stop
