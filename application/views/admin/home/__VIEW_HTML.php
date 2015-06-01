<div class="margin-top"style="  margin-top: 30px;">
    <div class="row">
        <div class="col-md-12">
        <div class="page-header">
            <h3>Welcome Admin</h3>
        </div>
        </div>
    </div>
    <div class="row">
        <?PHP foreach ($LINK_ADMIN as $KEY=>$link) { ?>

            <div class="col-md-3 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="<?=$link?>" class="link_admin">
                    <span class=" <?= $ICON[$KEY] ?> icon_font_size"></span>
                        <?=$KEY?>
                    </a>

                </div>
            </div>
            </div>

        <?PHP } ?>

    </div>
</div>