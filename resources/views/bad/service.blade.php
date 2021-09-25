<?php
$counter=$done=0;
$count=count($service);
$mod_3=$count%3;
$mod_4=$count%4;
$mod_2=$count%2;

if($mod_2==0 && $count<=4){
    $sm=6;$md=6;$stop=2;
}elseif ($mod_3 == 0){
    $sm=4;$md=4;$stop=3;
}else{
    $sm=6;$md=3;$stop=4;
}
//@include('front\service-item',compact('about'))
?>

<section class="section-full">
    <div class="container">
        <div class="row mb-100">
        @foreach($service as $service)
            <?php
                $data=[

                    'service'=>$service,
                    'sm'=>$sm,
                    'md'=>$md,

                ];

                ?>
            @include('front\service-item',compact('data'))
            <?php
            $counter++;

            ?>
            @if($counter == $stop)
                <?php
                $counter=0;
                $done++;
                $end=$count/$done;
               // echo $counter.'-'.$stop.'-'.$end;
                ?>
                @if($end != $stop)
                    <!-- end .item -->
                    </div> <!-- end .row -->

                    <div class="row">
            @endif

            @endif


            @endforeach

        </div> <!-- end .row -->
    </div> <!-- /.container -->

</section>
