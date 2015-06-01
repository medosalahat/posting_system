<div class="margin-top">
    <header class="col-md-6">

        <div class="carousel slide" id="carousel-88234">
            <ol class="carousel-indicators">
                <?PHP $sw=0; foreach($slider as $s){ if($sw ==0){ ?>
                    <li data-slide-to="<?= $sw ?>" class="active" data-target="#carousel-88234"></li>
                <?PHP } else{ ?>
                    <li data-slide-to="<?= $sw ?>" data-target="#carousel-88234"></li>
                    <?PHP } $sw++; } ?>

            </ol>
            <div class="carousel-inner">
                <?PHP $sw=0; foreach($slider as $s){ if($sw ==0){ ?>
                    <div class="item active">
                        <img alt="" src="<?= base_url().$s['image']?>"/>

                        <div class="carousel-caption">
                            <h4><?= $s['title']?></h4>

                            <p><?= $s['text']?></p>
                        </div>
                    </div>
                <?PHP }else{ ?>
                    <div class="item">
                        <img alt="" src="<?= base_url().$s['image']?>"/>

                        <div class="carousel-caption">
                            <h4><?= $s['title']?></h4>

                            <p><?= $s['text']?></p>
                        </div>
                    </div>

                    <?PHP }$sw++; } ?>
            </div>
            <a class="left carousel-control" href="#carousel-88234" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-88234" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>

    </header>
    <div class="row col-md-6 register_col">
        <div class="col-xs-12 col-sm-8 col-md-12">
            <form role="form" method="post" action="<?= $REGISTER ?>" id="<?= $user[8]?>">
                <h4>Please Sign Up
                    <small>It's free and always will be.</small>
                </h4>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="<?=$user[0]?>" id="<?=$user[0]?>" class="form-control input-lg"
                                   placeholder="YOUR NAME " tabindex="1"/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="<?=$user[1]?>" id="<?=$user[1]?>" class="form-control input-lg"
                                   placeholder="<?=$user[1]?>" tabindex="2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="email" name="<?=$user[2]?>" id="<?=$user[2]?>" class="form-control input-lg"
                               placeholder="Email Address" tabindex="3">
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <select name="<?= $user[5]?>" id="<?= $user[5]?>" class="form-control input-lg">
                                <option value="">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                        </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <select name="college" id="college" class="form-control input-lg">
                            <option value="">college</option>
                            <?PHP foreach($colloege as $w){ ?>
                                <option value="<?=$w['id']?>"><?=$w['text']?></option>
                            <?PHP } ?>
                        </select>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <select name="specialty" id="specialty" class="form-control input-lg">
                            <option value="">specialty</option>
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="<?=$user[3]?>" id="<?=$user[3]?>" class="form-control input-lg"
                                   placeholder="<?=$user[3]?>" tabindex="4">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="<?=$user[4]?>" id="<?=$user[4]?>"
                                   class="form-control input-lg" placeholder="Confirm Password" tabindex="5">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="<?=$user[6]?>" id="<?=$user[6]?>" class="form-control input-lg"
                                   placeholder="BIRTHDAY" tabindex="6">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="<?= $user[7]?>" id="<?= $user[7]?>" class="form-control input-lg"
                                   placeholder="MOBILE" tabindex="6">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
					</span>
                    </div>
                    <div class="col-xs-8 col-sm-9 col-md-9">
                        By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#"
                                                                                                               data-toggle="modal"
                                                                                                               data-target="#t_and_c_m">Terms
                            and Conditions</a> set out by this site, including our Cookie Use.
                    </div>
                </div>

                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-12"><input type="submit" id="Register" value="Register" disabled="true"
                                                            class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at
                    sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro
                    delectus quidem dolorem ad.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at
                    sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro
                    delectus quidem dolorem ad.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at
                    sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro
                    delectus quidem dolorem ad.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at
                    sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro
                    delectus quidem dolorem ad.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at
                    sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro
                    delectus quidem dolorem ad.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at
                    sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro
                    delectus quidem dolorem ad.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at
                    sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro
                    delectus quidem dolorem ad.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->