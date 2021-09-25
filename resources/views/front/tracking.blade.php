<section id="section-tracking">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div   class="cta-form wow fadeIn <?= (App::currentLocale()=='en')? '': 'arabic'?>" data-wow-delay="0s" data-wow-duration="1s">
                    <input type="text" name="track" value="" placeholder="{{__('front.home track num')}}">
                    <input type="submit" id="track-it" name="submit" value="{{__('front.home tracking')}}">
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>

    <div id="section-tracking-result" class="light-text">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="divider-double"></div>
                    <div class="text-center">
                        <h3><span class="grey" style="float: <?= (App::currentLocale()=='en')? 'left': 'right" '?> ">{{__('front.home tracking num')}}:</span> 112345679087328</h3>
                    </div>


                    <div class="divider-double"></div>

                    <div class="wrapper-line padding40 rounded10">


                        <ul class="progress" >

                            <li class="beforeactive"><a href="">Order Processing</a></li>
                            <li class="active"><a href="">Shipment Pending</a></li>
                            <li><a href="">Estimated Delivery</a></li>
                            <li><a href="">Accepted</a></li>
                        </ul>

                        <div class="divider-double"></div>

                        <ul class="timeline custom-tl">

                            <li class="timeline-inverted">
                                <div class="timeline-date wow zoomIn" data-wow-delay=".2s">
                                    Nov 03, 2015
                                    <span>20:07 pm</span>
                                </div>
                                <div class="timeline-badge success"><i class="fa fa-check-square-o wow zoomIn"></i></div>
                                <div class="timeline-panel wow fadeInRight" data-wow-delay=".6s">
                                    <div class="timeline-body">
                                        The shipment has been successfully delivered
                                        <span class="location <?= (App::currentLocale()=='en')? '': 'arabic'?>">Baker Street, UK <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="popup-gmaps">view on map</a></span>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted">
                                <div class="timeline-date wow zoomIn" data-wow-delay=".2s">
                                    Nov 03, 2015
                                    <span>20:07 pm</span>
                                </div>
                                <div class="timeline-badge warning"><i class="fa fa-warning wow zoomIn"></i></div>
                                <div class="timeline-panel wow fadeInRight" data-wow-delay=".6s">
                                    <div class="timeline-body">
                                        The shipment could not be delivered
                                        <span class="location <?= (App::currentLocale()=='en')? '': 'arabic'?>">Baker Street, UK <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="popup-gmaps">view on map</a></span>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted">
                                <div class="timeline-date wow zoomIn" data-wow-delay=".2s">
                                    Nov 03, 2015
                                    <span>20:07 pm</span>
                                </div>
                                <div class="timeline-badge"><i class="fa fa-plane wow zoomIn"></i></div>
                                <div class="timeline-panel wow fadeInRight" data-wow-delay=".6s">
                                    <div class="timeline-body">
                                        The shipment has arrived in destination country
                                        <span class="location <?= (App::currentLocale()=='en')? '': 'arabic'?>">Baker Street, UK <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="popup-gmaps">view on map</a></span>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted">
                                <div class="timeline-date wow zoomIn" data-wow-delay=".2s">
                                    Nov 02, 2015
                                    <span>18:05 pm</span>
                                </div>
                                <div class="timeline-badge"><i class="fa fa-plane wow zoomIn"></i></div>
                                <div class="timeline-panel wow fadeInRight" data-wow-delay=".6s">
                                    <div class="timeline-body">
                                        The shipment is being transformed to destination country
                                        <span class="location <?= (App::currentLocale()=='en')? '': 'arabic'?>">Baker Street, UK <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="popup-gmaps">view on map</a></span>
                                    </div>
                                </div>
                            </li>

                            <li class="timeline-inverted">
                                <div class="timeline-date wow zoomIn" data-wow-delay=".2s">
                                    Nov 01, 2015
                                    <span>10:08 pm</span>
                                </div>
                                <div class="timeline-badge"><i class="fa fa-plane wow zoomIn"></i></div>
                                <div class="timeline-panel wow fadeInRight" data-wow-delay=".6s">
                                    <div class="timeline-body">
                                        The international shipment has been processed
                                        <span class="location <?= (App::currentLocale()=='en')? '': 'arabic'?>">Baker Street, UK <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="popup-gmaps">view on map</a></span>
                                    </div>
                                </div>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
