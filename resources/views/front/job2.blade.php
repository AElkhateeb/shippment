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


    $job = $data['job'];

    ?>
    @include('front\page-header',compact('header'))
    <!-- /.page-header -->

    <!-- section-full -->

    <section>

        <div class="container">
            <div class="row <?= (App::currentLocale()=='en')? '': 'arabic" '?>">
                @foreach( $job as $job)
                    @if($job['is_published']==1)
                <div class="col-md-6">

                    <div class="expand-box location">
                        <div class="inner">

                            <div class="row <?= (App::currentLocale()=='en')? '': 'arabic" '?>">
                                <div class="col-md-4">
                                    Job tile
                                    <h3>{{ $job['title'] }}</h3>
                                </div>
                                <div class="col-md-8">
                                    <h5>Requerments</h5>
                                     {!! $job['text'] !!}
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                    @endif
                @endforeach
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

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="full name*" /></div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="job_id" id="job_id" placeholder="job titel*" /></div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="bday" id="bday" placeholder="bday*" /></div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="job_id" id="job_id" placeholder="job titel*" /></div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="bday" id="bday" placeholder="bday*" /></div>

                        <div class="col-md-12">
                            <div id="error_email" class="error">Please check your email</div>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email*" />
                        </div>

                        <div class="col-md-6">
                            <div id="error_email" class="error">Please check your email</div>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone*" />
                        </div>
                        <div class="col-md-6">
                            <div id="error_email" class="error">Please check your email</div>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone*" />
                        </div>
                        <div class="col-md-6">
                            <div id="error_email" class="error">Please check your email</div>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone*" />
                        </div>
                        <div class="col-md-6">
                            <div id="error_email" class="error">Please check your email</div>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone*" />
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
                <?php
               /* $counter=$done=0;
                $count=count($job);
                $mod_3=$count%3;
                $mod_4=$count%4;
                $mod_2=$count%2;

                if($mod_2==0){
                    $sm=6;$md=6;
                }elseif ($mod_3 == 0){
                    $sm=4;$md=4;
                }else{
                    $sm=6;$md=3;
                }*/
                ?>
                    @foreach( $job as $job)

                    @endforeach
            </div> <-- /.row ->
        </div> <-- /.container ->
    </section-->


@stop
