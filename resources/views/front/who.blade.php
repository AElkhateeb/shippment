<section class="pb-0">
    <div class="container">
        <div class="row align-items-center <?= (App::currentLocale()=='en')? '': 'arabic'?>">

            <div class="col-lg-6 col-md-6">
                <img src="{{URL::asset($about['media_url'])}}" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="explore-content">
                    <h2>{{$about['title']}}</h2>
                    {!!$about['text']!!}
                    <a href="{{ url(App::currentLocale().'/about') }}" class="btn btn-theme-2">{{__('front.about')}}</a>
                </div>
            </div>

        </div>
    </div>
</section>
