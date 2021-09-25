<?php

$page = $data['page'];
$header=[
    'img'=>$page['media_url'],
    'title'=>$page['title'],
    'h2'=>
        $page['h1'],
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
@extends('layouts.front')
@section('content')
@section('title', $page['title'])
@section('description',  $page['description'])
    @include('front.page-header',compact('header'))

    <!-- ================================= Blog Grid ================================== -->
    <section>
        <div class="container">

            <div class="row">
                <div class="col text-center">
                    <div class="sec-heading center">
                        <h2>Trending Articles</h2>
                        <p>We post regulary most powerful articles for help and support.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
            <section class="no-padding">
            <div class="container-fullwidth">
            @foreach($service as $service)
                <!-- Single blog Grid -->
                    <div id="bg-box-service-{{ $serviceId }}" class="one-tow">
                        <div class="bg-color-fx light-text padding-5 text-center">
                            <h3>{{ $service['title'] }}</h3>
                            <div class="tiny-border margintop10 marginbottom10"></div>
                            <img src="{{URL::asset($service['media_url'])}}" class="img-responsive margintop20 marginbottom20 wow fadeInRight" alt="" />
                            <p>{!! $service['text'] !!}</p>
                            <a href="{{ url(App::currentLocale().'/service/'.$service['id']) }}" class="btn-arrow hover-light"><span class="line"></span><span class="url">View Details</span></a>
                        </div>
                    </div>
                @endforeach


            </div>
            </section>
    <section></section>

    <!-- ================= Blog Grid End ================= -->

@stop
