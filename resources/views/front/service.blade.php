<?php
$service = $data['service'];
$page = $data['page'];
$header=[
    'img'=>$page['media_url'],
    'title'=>$page['title'],
    'h2'=>
        $service[0]['title'],
];
$header2=[
    'shade'=>'Recovery',
    'h2'=>'About - Us',
    'text'=>
        '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br class="visible-lg"> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>',
];


// $about = $data['about'];

?>
@extends('layouts.front')
@section('content')
@section('title', $service[0]['title'])
@section('description',  $page['description'])
    @include('front.page-header',compact('header'))
    <div id="content" class="no-top no-bottom">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="blog-details single-post-item format-standard">
                            <div class="post-details">

                                <div class="post-featured-img">
                                    <img class="img-fluid" src="{{URL::asset($service[0]['media_url'])}}" alt="">
                                </div>

                                <div class="post-top-meta">
                                </div>
                                <h2 class="post-title">{{ $service[0]['title']}}</h2>
                                  <blockquote>
                                    <span class="icon"><i class="fas fa-quote-left"></i></span>
                                    <p class="texter">{!! strip_tags($service[0]['text']) !!}</p>

                                </blockquote>
                                {!! $service[0]['body'] !!}



                            </div>
                        </div>


                    </div>

                    <div class="divider-single"></div>
                    <div class="divider-half"></div>
                </div>
            </div>
        </section>
    </div>
@stop
