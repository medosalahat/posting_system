
<div class="margin-top" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-12">
            <?PHP foreach ($colloege as $col ) { ?>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading"><?= $col['text']?></div>
                        <div class="panel-body">
                            <ul>
                            <?PHP foreach ($specialty as $spe ) { ?>
                            <?PHP if($spe['id_college'] ==$col['id']  ) { ?>

                                <li><?= $spe['text']?></li>
                                    <ul>
                                <?PHP foreach ($section as $sec ) { ?>
                                    <?PHP if($sec['id_college'] ==$col['id'] && $sec['id_specialty'] ==$spe['id'] ) { ?>

                                        <li><a href="<?= base_url().'section/home_section?id='.$sec['id']?>" ><?= $sec['title']?></a></li>
                                        <?PHP } ?>
                                    <?PHP } ?>
                                    </ul>
                            <?PHP } ?>
                            <?PHP } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?PHP } ?>
        </div>
    </div>
</div>