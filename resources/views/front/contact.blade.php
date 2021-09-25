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
$branches = $data['branches'];

?>
@extends('layouts.front')
@section('content')
@section('title', $page['title'])
@section('description',  $page['description'])
    @include('front.page-header',compact('header'))
    <!-- /.page-header -->

    <!-- section-full -->
    <section>

        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-md-7">

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control simple">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control simple">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control simple">
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control simple"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-theme" type="submit">Submit Request</button>
                    </div>

                </div>
                <div class="col-lg-5 col-md-5">
                    <img src="{{URL::asset('front/assets/img/d.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
            <!-- row Start -->
            <div class="row">
                <?php
                //$contact= $branch['contact'];
                $md=3;
                $counter=$done=0;
                $count=count($branches);
                $mod_3=$count%3;
                $mod_4=$count%4;
                $mod_2=$count%2;

                if($mod_2==0){
                    $md=6;
                }elseif ($mod_3 == 0){
                    $md=4;
                }else{
                    $md=3;
                }
                ?>

                @foreach($branches as $branch)
                <div class="col-lg-{{$md}} col-md-{{$md}}">
                    <div class="contact-info">

                        <h2>{{ $branch['name'] }}</h2>
                        <p>{{ $branch['governrate'] }}</p>
                        @foreach($branch['contact'] as $contact)
                        <div class="cn-info-detail">
                            <div class="cn-info-icon">
                                <i class="fa {{ $contact['icon'] }}"></i>
                            </div>
                            <div class="cn-info-content">
                                <h4 class="cn-info-title">{{ $contact['title'] }}</h4>
                                {!! $contact['text'] !!}
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
                @endforeach
            </div>
            <!-- /row -->

        </div>

    </section>

    <!-- section-full -->



@stop
