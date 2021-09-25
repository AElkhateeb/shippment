<?php
$right=(App::currentLocale()=='en')? 0: 1; ?>
<section >
    <div class="container">
    @foreach($about as $about)
        <!-- row Start -->
        <div class="row align-items-center">
            @if($right%2==1)
            <div class="col-lg-6 col-md-6">
                <img src="{{URL::asset($about['media_url'])}}" class="img-fluid" alt="" />
            </div>
            @endif
            <div class="col-lg-6 col-md-6">
                <div class="story-wrap explore-content">

                    <h2>{{$about['title'] }}</h2>
                    {!!$about['text']!!}
                </div>
            </div>
                @if($right%2==0)
                    <div class="col-lg-6 col-md-6">
                        <img src="{{URL::asset($about['media_url'])}}" class="img-fluid" alt="" />
                    </div>
                @endif
        </div>
        <!-- /row -->
            <?php $right++; ?>
        @endforeach
    </div>

</section>
