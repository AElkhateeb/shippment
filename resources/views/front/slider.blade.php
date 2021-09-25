
<section id="section-welcome" class="no-padding autoheight light-text" data-stellar-background-ratio="0.5" style="background-image: url('{{URL::asset($sliders['media_url'])}}');">
    <div class="center-y">
        <div class="inner text-center">
            <div class="sub-intro-text"><span>{{ $sliders['title'] }}</span></div>
            <div class="divider-single"></div>
            <div class="type-wrap title">
                <div class="typed-strings">
                    {!! $sliders['text'] !!}
                </div>
                <span class="typed"></span>
            </div>
            <div class="divider-double"></div>
        </div>
    </div>
</section>

<!-- / #slider  -->
