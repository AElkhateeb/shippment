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


   // $about = $data['about'];
   // $service = $data['service'];
    ?>
<h1>{{$id}}</h1>

@stop
