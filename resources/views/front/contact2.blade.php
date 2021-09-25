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


    $branches = $data['branches'];
       // echo json_encode($contact);
    ?>
    @include('front\page-header',compact('header'))
    <!-- /.page-header -->

    <!-- section-full -->

    <section>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach($branches as $branch)
                    <div class="expand-box location">
                        <div class="inner">

                            <div class="row <?= (App::currentLocale()=='en')? '': 'arabic" '?>">
                                <div class="col-md-2">

                                    <h3>{{ $branch['name'] }},<br>
                                        {{ $branch['governrate'] }}
                                    </h3>
                                </div>
                                <?php
                                //$contact= $branch['contact'];
                                $md=3;
                                $counter=$done=0;
                                $count=count($branch['contact']);
                                $mod_3=$count%3;
                                $mod_4=$count%4;
                                $mod_2=$count%2;

                                if($mod_2==0){
                                    $md=5;
                                }elseif ($mod_3 == 0){
                                    $md=3;
                                }else{
                                    $md=2;
                                }
                                ?>
                                @foreach($branch['contact'] as $contact)
                                <div class="col-md-{{$md}}">
                                    <h5>{{ $contact['title'] }}</h5>
                                    {!! $contact['text'] !!}
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="map-container">
                            <div id="map-1"></div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>

    <!-- section-full -->
    <section id="section-contact-form">
        <div class="container">
            <div class="row <?= (App::currentLocale()=='en')? '': 'arabic" '?>">
                <div class="col-md-4">
                    <div class="light-text">
                        <div class="bg-2 padding30">

                            <h2 class="id-color">Gocargo Commitment</h2>
                            <div class="tiny-border"></div>
                            <p class="lead big">
                                <i>Fell free to asking about Gocargo or Just say hello to us </i>
                            </p>
                            <div class="text-center">
                                <img src="{{URL::asset('front/img/contact/truck.png')}}" alt="">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <form id="contact" class="row form-transparent" name="form1" method="post" action="">

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" id="name" placeholder="First Name*" /></div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name*" /></div>

                        <div class="col-md-6">
                            <div id="error_email" class="error">Please check your email</div>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email*" />
                        </div>

                        <div class="col-md-6">
                            <div id="error_email" class="error">Please check your email</div>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone*" />
                        </div>

                        <div class="col-md-12">
                            <div id="error_message" class="error">Please check your message</div>
                            <textarea cols="10" rows="10" name="message" id="message" class="form-control" placeholder="Your message"></textarea>
                        </div>

                        <div id="mail_success" class="col-md-12 success">Thank you. Your message has been sent.</div>
                        <div id="mail_failed" class="col-md-12 error">Error, email not sent</div>

                        <div class="col-md-12">
                            <p id="btnsubmit">
                                <input type="submit" id="send" value="Send" class="btn btn-custom fullwidth" />
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- service -->
    <!--section class="section-full">
        <div class="container">
            <div class="row">


            </div> <-- /.row ->
        </div> <-- /.container ->
    </section-->


@stop
