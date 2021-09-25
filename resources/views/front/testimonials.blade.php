<!-- ============================ Smart Testimonials ================================== -->
<section class="image-cover pb-0" >
    <div class="container">
        <div class="row align-items-center  <?= (App::currentLocale()=='en')? '': 'arabic'?>" style="display: flex">



            <div class="col-lg-6 col-md-7" >
                <h2 class="text-light">What People Says?</h2>
                <div class="smart-textimonials smart-light smart-center" id="smart-textimonials">
                @foreach($testimonial as $testimonial)
                    <!-- Single Item -->
                        <div class="item">
                            <div class="smart-tes-content">
                                {!! $testimonial['text'] !!}
                            </div>
                            <div class="smart-tes-author">
                                <div class="st-author-box">
                                    <div class="st-author-thumb">
                                        <img src="{{URL::asset($testimonial['media_url'])}}" class="img-fluid" alt="" />
                                    </div>
                                    <div class="st-author-info">
                                        <h4 class="st-author-title">{{ $testimonial['title'] }}</h4>
                                        <span class="st-author-subtitle">{{ $testimonial['job'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <img src="{{URL::asset('front/front/img/services/7.png')}}"  alt="">
                <!--video class="img-fluid"  width="800" height="1000" controls>
                    <source src="https://eps-shipping.com/wp-content/uploads/2021/04/videoplayback.mp4" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                </video-->
            </div>
        </div>
    </div>
</section>
<!-- ============================ Smart Testimonials End ================================== -->

