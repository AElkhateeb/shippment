<section class="section-full gray-bg-3">
    <div class="container">
        <div class="about-me-carousel bullet-two dark">
            @foreach($about as $about)
                @include('front\why-us-item',compact('about'))
            <!-- end .item -->
            @endforeach

        </div> <!-- end .about-me-carousel -->
    </div> <!-- /.container -->
</section>
