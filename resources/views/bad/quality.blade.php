<!-- .quality -->
<section class="section-full gray-bg-3">
    <div class="container">
        <div class="section-title style8 text-center">
            <h2 class="inline relative">
                <span class="shade f700 inline roboto">iPhone 6 Plus</span>
                <span class="title-color text-uppercase">What's New</span>
            </h2>
        </div>

        <div class="row no-gutter flex flex-middle">
            <div class="col-xs-12 col-md-7">
                @foreach($about as $about)
                <div class="sp-feature-1 flex">
                    <span class="circle"></span>
                    <div class="icon transition">
                        <i class="et-line icon-circle-compass"></i>
                    </div>
                    <div class="desc">
                        <h3 class="mb-15 text-uppercase">{{$about['title']}}</h3>
                        <p>{!!$about['perex']!!}</p>
                         </div>
                </div> <!-- /.sp-feature-1 -->
                 @endforeach
            </div> <!-- /.col- -->
            <div class="col-xs-12 col-md-5 hidden-xs">
                <img src="{{URL::asset('img/misc/iphone-7.png')}}" class="img-responsive" alt="">
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<!-- //.services -->

