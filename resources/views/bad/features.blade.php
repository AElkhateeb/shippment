<!-- FEATURES -->
<section id="Services" class="section-full">
    <div class="container">
        <div class="section-title style8 text-center pb-50">
            <h2 class="inline relative">
                <?php  $half=count($categories)/2; $cut=1; $done=0;?>
                <span class="shade f700 inline roboto">RECOVERY HOME</span>
                <span class="title-color text-uppercase">CATEGORIES</span>
            </h2>
        </div>

    </div> <!-- /.container -->

    <div class="section primary-bg">
        <div class="container">
            <div class="row flex flex-middle relative disable-flex-xs">
                <div class="col-xs-12 col-sm-6 col-md-4">

                    @foreach($categories as $category)

                        <?php
                        if($cut < $half )$cls='mb-30'; else $cls='';
                        $data=[

                            'categories'=>$categories,
                            'cls'=>$cls,

                        ];

                        ?>
                            @include('front\feature',compact('data'))

                        <?php $cut++; ?>
                        @if($cut > $half+0.5 && $done!=1)
                </div>

                <div class="iphone-8 hidden-xs hidden-sm">
                    <img src="{{URL::asset('img/misc/iphone-8.png')}}" class="img-responsive" alt="" width="425">
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 hidden-xs">
                <?php $cut=1;$done=1; ?>
                        @endif


                    @endforeach


                </div>

            </div>  <!-- end .row -->
        </div>
    </div>

</section>
<!-- Services -->
