
@extends('layouts.front')
@section('content')

   <?php //$data=['id'=>0];
     /*  echo "<pre>";

    print_r($data['sliders']);
    print_r($data);
   echo "</pre>";
    die();

     @include('front\productView',$data)
     */
   $sliders = $data['sliders'];
   $categories = $data['categories'];
   $about = $data['about'];
    ?>
   @include('front\slider',compact('sliders'))
   @include('front\features',compact('categories'))
   @include('front\posts',$data)
   @include('front\quality',compact('about'))
   @include('front\portfolio',compact('about'))

   <?php
// @include('front\rate',$data)
?>









@stop
