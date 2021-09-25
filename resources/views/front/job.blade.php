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
$job = $data['job'];

?>
@extends('layouts.front')
@section('content')
@section('title', $page['title'])
@section('description',  $page['description'])
    <?php
    $job = $data['job'];
    ?>

    @include('front\page-header',compact('header'))
    <!-- /.page-header -->

    <!-- section-full -->



    <!-- section-full -->
    <section >
        <div class="container">
            <div class="row <?= (App::currentLocale()=='en')? '': 'arabic" '?>">
                <!-- Submit Form -->
                <div class="col-lg-12 col-md-12">

                    <div class="submit-page">
                        <div class="form-submit">
                            <h4>{{__('front.career')}}</h4>
                            <div class="submit-section">
                                <form id="jobForm" method="POST" action="{{ url(App::currentLocale().'/career') }}">
                                    @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_full_named')}}</label>
                                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="{{__('front.career_full_named')}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_email')}}</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="{{__('front.career_email')}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_title')}}</label>
                                        <select class="form-control" name="job_id" id="job_id" required>
                                            <option disabled selected value >{{__('front.career_title')}}</option>
                                            @foreach( $job as $job)
                                                @if($job['is_published']==1)
                                                    <option value="{{ $job['id'] }}">{{ $job['title'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_bday')}}</label>
                                        <input type="date" class="form-control" name="bday" id="bday" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_sex')}}</label>
                                        <select class="form-control" name="male" id="male" required>
                                            <option disabled selected value >{{__('front.career_sex')}}</option>
                                            <option value="1">{{__('front.career_male')}}</option>
                                            <option value="0">{{__('front.career_female')}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_military')}}</label>
                                        <select class="form-control" name="military" id="military">
                                            <option disabled selected value >{{__('front.career_military')}}</option>
                                            <option value="اعفاء نهائى">{{__('front.career_exempted')}}</option>
                                            <option value="تأجيل">{{__('front.career_postponed')}}</option>
                                            <option value="ادى الخدمة">{{__('front.career_finished')}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_phone')}}</label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="{{__('front.career_phone')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_phone_2')}}</label>
                                        <input type="text" class="form-control"name="phone_2" id="phone_2" placeholder="{{__('front.career_phone_2')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_State')}}</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="{{__('front.career_State')}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_city')}}</label>
                                        <input type="text" class="form-control" name="area" id="area" value="haram" placeholder="{{__('front.career_city')}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_education')}}</label>
                                        <select class="form-control" name="education" id="education" required>
                                            <option disabled selected value >{{__('front.career_education')}}</option>
                                            <option value="محو أميه">محو أميه</option>
                                            <option value="ثانويه عامه">ثانويه عامه</option>
                                            <option value="تعليم متوسط ">تعليم متوسط </option>
                                            <option value=" تعليم عالى"> تعليم عالى</option>
                                            <option value="دبلومه"> دبلومه</option>
                                            <option value="ماجيسيتر">ماجيسيتر</option>
                                            <option value="دكتوراه">دكتوراه</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{__('front.career_experience')}}</label>
                                        <select class="form-control" name="experience" id="experience" required>
                                            <option disabled selected value >{{__('front.career_experience')}}</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="btn btn-theme" id="jobApply" type="submit">{{__('front.career_btn')}}</button>
                                    </div>

                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service -->
@stop
