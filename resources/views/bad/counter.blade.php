<?php
$counter=$done=0;
$count=count($counters);
$mod_3=$count%3;
$mod_4=$count%4;
$mod_2=$count%2;

if($mod_2==0){
    $sm=6;$md=6;
}elseif ($mod_3 == 0){
    $sm=4;$md=4;
}else{
    $sm=6;$md=3;
}
?>

<section class="relative section-full parallax-bg parallax2" style="background-image: url('img/page/service-5.jpg');">
    <span class="overlay" data-hover-color="#000" data-hover-opacity="0.75"></span>
    <div class="container">
        <div class="row">
            @foreach($counters as $counters)
                <?php
                $data=[

                    'counters'=>$counters,
                    'sm'=>$sm,
                    'md'=>$md,

                ];

                ?>
                @include('front\counter-item',compact('data'))
            @endforeach

        </div>
    </div>
</section>
