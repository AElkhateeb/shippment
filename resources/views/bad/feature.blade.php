<div class="flex title-light {{ $data['cls'] }}">
    <div class="icon h1 mr-50 title-light">
        <i class="et-line {{ $data['categories'][0]['icon'] }}"></i>
    </div>
    <div class="desc">
        <h4 class="title-light mb-15">{{ $data['categories'][0]['title'] }} </h4>
        {!!$data['categories'][0]['text']!!}
    </div>
</div>
