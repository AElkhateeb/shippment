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


    $about = $data['about'];
    $pro = $data['pro'];
        ?>
    @include('front\page-header',compact('header'))
     <!-- /.page-header -->

    <!-- section-full include('front\page-header2',compact('header2')) -->

   <!-- section-full -->

    <!-- identity -->
    @include('front\identity',compact('about'))
    <!-- why us ? -->

    @include('front\why-us',compact('pro'))


    <!-- team -->




@stop
