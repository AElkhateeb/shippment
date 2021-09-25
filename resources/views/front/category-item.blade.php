<div class="col-sm-{{ $data['sm'] }} col-md-{{ $data['md'] }} bottom-margin">
    <div class="service style14 text-center">
        <div class="icon">
            <i class="et-line {{ $data['category']['icon'] }}"></i>
        </div>
        <h4 class="text-uppercase">{{ $data['category']['title'] }}</h4>
        {!!$data['category']['text']!!}
    </div>
</div>
