@extends('layouts.front')
@section('content')
    <?php
    $header=[
        'img'=>'img/slider/slide7.jpg',
        'h2'=>'contact us',
        'links'=>
            '<li><a class="text-white" href="'.url('/').'">Home</a></li>
         <li><a class="text-white" href="#">contact us</a></li>',
    ];


    $contact = $data['contact'];

    ?>
    @include('front\page-header',compact('header'))
    <!-- /.page-header -->

    <!-- section-full -->
    <!-- section-full -->

    <!-- service -->
    <section class="section-full">
        <div class="container">
            <div class="row">
                <?php
                $counter=$done=0;
                $count=count($contact);
                $mod_3=$count%3;
                $mod_4=$count%4;
                $mod_2=$count%2;

                if($mod_2==0){
                    $sm=6;$md=6;
                }elseif ($mod_3 == 0){
                    $sm=4;$md=4;
                }else{
                    $sm=6;$md=3;
                }
                ?>
                    @foreach( $contact as $contact)
                <div class="col-xs-12 col-sm-{{ $sm }} col-md-{{ $md }} bottom-margin">
                    <div class="contact-block style-2 dark gray-bg-3">
                                <span class="icon title-color">
                                    <i class="et-line inline {{ $contact['icon'] }}"></i>
                                </span>
                        <h4 class="mb-10">{{ $contact['title'] }}</h4>
                        {!! $contact['text'] !!}
                    </div>
                </div>
                    @endforeach
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <section class="bottom-full">
        <div class="container">
            <form id="contact-form" class="row contact-form" method="post">
                <div class="col-xs-12">
                    <div class="input-field">
                        <input id="name" type="text" name="name" class="ml-input">
                        <label for="name">Name</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="input-field">
                        <input id="phoneNumber" type="text" name="phoneNumber" class="ml-input">
                        <label for="phoneNumber">Phone Number</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="input-field">
                        <input id="email" type="email" name="email" class="ml-input">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="input-field">
                        <input id="subject" type="text" name="subject" class="ml-input">
                        <label for="subject">Subject</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="input-field">
                        <textarea id="message" name="message" class="materialize-textarea"></textarea>
                        <label for="message">Message</label>
                    </div>
                </div>
                <div class="col-xs-12 text-right">
                    <button class="btn-flat btn-default radius text-uppercase transition" type="submit">Submit</button>
                </div>
                <div class="col-xs-12">
                    <div class="msg-success">Your message was sent successfully</div>
                    <div class="msg-error">Something went wrong, please try again later.</div>
                </div>
            </form> <!-- end .row -->
        </div> <!-- /.container -->
    </section>
@stop
