
    <div class="item relative" style="background-image: url('{{URL::asset($img['media_url'])}}');">
        <div class="container">
            <div class="row fitscreen flex flex-middle">
                <div class="sp-slide-parallax col-xs-12 col-md-offset-5 col-md-7 <?= ($img['right']!=0)? 'text-right':'' ?>">
                    <div class="section-title style8 no-margin">
                        <h2 class="inline relative mb-15">
                            <span class="shade f700 inline roboto">{{$img['shade']}}</span>
                            <span class="title-color <?=($img['right']!=0)? 'right':'' ?>">{{$img['title']}}</span>
                        </h2>
                    </div>
                    {!!$img['text']!!}
                    <a href="#!" class="btn-large btn-white waves-effect btn-round text-uppercase">Learn More</a>
                    <a href="#!" class="btn-large waves-effect waves-light btn-round text-uppercase ml-10">Contact Us</a>
                </div>
            </div>
        </div> <!-- /.slider5 -->
    </div>
