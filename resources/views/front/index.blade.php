<?php
$serviceId=1;
$data = $data;
$sliders = $data['sliders'];
$branches = $data['branches'];
$about = $data['about'];
$service = $data['service'];
$pro = $data['pro'];
$testimonial = $data['testimonial'];
//die(json_encode($data['sliders']));
?>
@extends('layouts.front')
@section('content')

    <!-- section slider begin -->
    @include('front.slider',compact('sliders'))
     <!-- section close -->
    <!-- section overlay begin -->
    @include('front.overlay',compact('branches'))
    <!-- section close -->
    <!-- section identity begin -->
    @include('front.who',compact('about'))
    <!-- section close -->
    <!-- section begin -->
    @include('front.tracking')
    <!-- section close -->
    <!-- ============================ Smart Testimonials ================================== -->
    @include('front.testimonials',compact('testimonial'))
    <!-- ============================ Smart Testimonials End ================================== -->
    <!-- section begin -->
    @include('front.doing',compact('service'))
    <!-- section close -->
    <!-- section begin -->
    @include('front.why-us',compact('pro'))
    <!-- section close -->
    <!-- section begin -->
    @include('front.calc')
    <!-- section close -->







@stop
