
<section class="no-padding mt-90 absolute width100 z-index10 height90px overlaydark70">
    <div class="container">
        <div class="row-fluid <?= (App::currentLocale()=='en')? '': 'arabic'?>">

                @foreach($branches['contact'] as $contact )
                    <div class="col-md-4">
                        <div class="info-box padding20">
                            <i class="fa {{ $contact['icon'] }}"></i>
                            <div class="info-box_text">
                                <div class="info-box_title">{{ $contact['title'] }}</div>
                                <div class="info-box_subtite">{!! $contact['text'] !!}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
          

            <div class="col-md-4"></div>
        </div>
    </div>
</section>

<!-- / #overlay  -->
