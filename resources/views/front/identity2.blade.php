<div id="content">
    <div class="container">
        <div class="row">
            @foreach($about as $about)
                <div class="col-md-6">
                    <img src="{{URL::asset($about['media_url'])}}" class="img-responsive" alt="">
                    <div class="divider-single"></div>
                    <h2>{{$about['title']}}</h2>
                    <div class="tiny-border"></div>
                    <p>{!!$about['text']!!}</p>

                </div>
            <!-- end .item -->
            @endforeach

        </div> <!-- end .about-me-carousel -->
    </div> <!-- /.container -->
</div>
