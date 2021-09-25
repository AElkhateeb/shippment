<?php
$about = $data['about'];
$pro = $data['pro'];
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




?>
@extends('layouts.front')
@section('content')

@section('title', $page['title'])
@section('description',  $page['description'])
@include('front.page-header',compact('header'))
     <!-- /.page-header -->

    <!-- section-full include('front\page-header2',compact('header2')) -->

   <!-- section-full -->

    <!-- identity -->
    @include('front.identity',compact('about'))
    <!-- why us ? -->
<section class="no-padding">
    <div class="container-fullwidth">
        <div id="bg-box-service-1" class="one-tow">
            <div class="bg-color-fx light-text padding-5 text-center">

            </div>
        </div>
        <div id="bg-box-service-2" class="one-tow">
            <div class="bg-color-fx light-text padding-5 text-center">

            </div>
        </div>

    </div>
</section>
    @include('front.why-us',compact('pro'))


    <!-- team -->




@stop
