@extends('layouts.front')
@section('content')
    <?php
    $header=[
        'img'=>'img/page/service-4.jpg',
        'h2'=>'categories',
        'links'=>
            '<li><a class="text-white" href="'.url('/').'">Home</a></li>
         <li><a class="text-white" href="#">categories</a></li>',
    ];
    $header2=[
        'shade'=>'Recovery',
        'h2'=>'our - categories',
        'text'=>
            '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br class="visible-lg"> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>',
    ];

    $category = $data['category'];
    $counters = $data['counters'];
    ?>
    @include('front\page-header',compact('header'))
    <!-- /.page-header -->

    <!-- section-full -->
    @include('front\page-header2',compact('header2'))
    <!-- section-full -->


    <!-- service -->
    @include('front\category',compact('category'))
    @include('front\counter',compact('counters'))



@stop
