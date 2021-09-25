@extends('layouts.front')
@section('content')
    <?php
        $header=[
            'img'=>'img/page/about-me.jpg',
            'h2'=>'About - Us',
            'links'=>
        '<li><a class="text-white" href="'.url('/').'">Home</a></li>
         <li><a class="text-white" href="#">About US</a></li>',
        ];
    $header2=[
        'shade'=>'Recovery',
        'h2'=>'About - Us',
        'text'=>
            '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br class="visible-lg"> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>',
    ];


    $about = $data['about'];
    $service = $data['service'];
        ?>
    @include('front\page-header',compact('header'))
     <!-- /.page-header -->

    <!-- section-full -->
    @include('front\page-header2',compact('header2'))
   <!-- section-full -->
    <!-- why us ? -->
    @include('front\why-us',compact('about'))

    <!-- team -->

    <!-- service -->
    @include('front\service',compact('service'))



@stop
