<section id="section-contact-form">
    <div class="container">
        <div class="row  <?= (App::currentLocale()=='en')? '': 'arabic" '?>">
            <div class="col-md-4">
                <div class="light-text">
                    <div class="bg-2 padding30">

                        <h2 class="id-color">Gocargo Commitment</h2>
                        <div class="tiny-border"></div>
                        <p class="lead big">
                            <i>Fell free to asking about Gocargo or Just say hello to us </i>
                        </p>
                        <div class="text-center">
                            <img src="{{URL::asset('front/front/img/contact/truck.png')}}" alt="">
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <form id="contact" class="row form-transparent <?= (App::currentLocale()=='en')? '': 'arabic'?>" name="form1" method="post" action="">

                    <div class="form-group col-md-6">
                        <label id="ptypesL">FROM</label>
                        <select id="ptypes" class="form-control">
                            <option value=""selected>FROM</option>
                            <option value="1">CAIRO</option>
                            <option value="1">CAIRO</option>
                            <option value="1">CAIRO</option>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label id="statusL" >TO</label>
                        <select id="status" class="form-control">
                            <option value=""selected>FROM</option>
                            <option value="1">CAIRO</option>
                            <option value="1">CAIRO</option>
                            <option value="1">CAIRO</option>

                        </select>
                    </div>

                    <div class="form-group col-md-12 slidecontainer">
                        <label style=" padding-left: 42%;" >Whight (<span id="demo">3</span>KG)</label>
                        <input id="myRange"type="range"class="sliderr rounds"max="15"min="1"value="3">

                    </div>

                    <div class="form-group col-md-6">
                        <label  class="col-md-6 <?= (App::currentLocale()=='en')? '': 'arab'?>">EXPRESS</label>
                        <label class="switch col-md-6"><input id="EXPRESS"type="checkbox"> <span class="rounds slide-check"></span></label>

                    </div>

                    <div class=" form-group col-md-6">
                        <label class="col-md-6 <?= (App::currentLocale()=='en')? '': 'arab'?>">Pickup</label>

                        <label class="switch col-md-6"><input id="pickup"type="checkbox"> <span class="rounds slide-check"></span></label>

                    </div>


                    <div id="mail_success" class="col-md-12 success">Thank you. Your message has been sent.</div>
                    <div id="mail_failed" class="col-md-12 error">Error, email not sent</div>

                    <div class="col-md-12">
                        <p id="btnsubmit">
                            <input type="submit" id="shipp" value="Shipp Now" class="btn btn-custom fullwidth" />
                        </p>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
