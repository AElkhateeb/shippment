<div class="col-sm-{{ $data['sm'] }} col-md-{{ $data['md'] }} bottom-margin">
    <div class="service style14 text-center">
        <div class="icon">
            <i class="et-line {{ $data['service']['icon'] }}"></i>
        </div>
        <h4 class="text-uppercase">{{ $data['service']['title'] }}</h4>
        {!!$data['service']['text']!!}
    </div>
</div>
