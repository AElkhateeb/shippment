<section class="no-padding">
    <div class="container-fullwidth">
        @foreach($service as $service)
            <div id="bg-box-service-{{ $serviceId }}" class="one-fourth">
                <div class="bg-color-fx light-text padding-5 text-center">
                    <h3>{{ $service['title'] }}</h3>
                    <div class="tiny-border margintop10 marginbottom10"></div>
                    <img src="{{URL::asset($service['media_url'])}}" class="img-responsive margintop20 marginbottom20 wow fadeInRight" alt="" />
                    <p>{!! $service['text'] !!}</p>
                    <a href="{{ url(App::currentLocale().'/service/'.$service['id']) }}" class="btn-arrow hover-light"><span class="line"></span><span class="url">View Details</span></a>
                </div>
            </div>
            <?php $serviceId+1; ?>
        @endforeach


    </div> <!-- /.container -->

</section>
