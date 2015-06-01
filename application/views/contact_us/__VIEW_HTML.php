<div class="margin-top">
    <div class="col-md-6" style="margin-top: 15px;">
        <div class="well well-sm">
            <form class="form-horizontal" method="post" action="<?=base_url().'function/contact_us/set_new'?>">
                <fieldset>
                    <legend class="text-center header">Contact us</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="name" name="name" type="text" placeholder=" Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here." rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="col-md-6" style="margin-top: 15px;">
        <div>
            <div class="panel panel-default">
                <div class="text-center header">Our Office</div>
                <div class="panel-body text-center">
                    <h4>Address</h4>
                    <div>
                        Amman Jordan<br />
                        Washington DC<br />
                        #(703) 1234 1234<br />
                        service@company.com<br />
                    </div>
                    <hr />
                    <div id="map1" class="map">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>