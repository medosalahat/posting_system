
<div class="row"style="margin-top: 59px;margin-bottom: 340px">
<?php if(isset($DATA_)){ ?>
    <h3 class="page-header">Members </h3>
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Members</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <?PHP foreach($MEMBERS as $MEMBER){ ?>
                        <li><a href="<?= base_url().'user/profile?id='.$MEMBER['id_user']?>"><?=$MEMBER['name'] ?></a> </li>
                    <?PHP } ?>
                </ul>
            </div>

        </div>
    </div>
    <div class="col-md-9">

            <div class="chat-box-div">
                <div class="chat-box-head">CHAT</div>
                <div class="panel-body chat-box-main" id="chat_box">
                    <?PHP foreach ($chat as $row) { ?>
                        <?PHP if ($row[$T_USER[0]] == $MY_ID) { ?>
                            <div class="chat-box-right">
                                <?= $row[$T_CHAT[2]] ?>
                            </div>
                            <div class="chat-box-name-right">
                                <img src="<?= base_url() . $row[$T_USER[3]] ?>"
                                     title="<?= $row[$T_USER[0]] . '-' . $row[$T_USER[1]] ?>"
                                     class="img-circle"/>
                                - <?= $row[$T_USER[1]] ?>
                            </div>
                            <hr class="hr-clas"/>
                        <?PHP } else { ?>
                            <div class="chat-box-left">
                                <?= $row[$T_CHAT[2]] ?>
                            </div>
                            <div class="chat-box-name-left">
                                <img src="<?= base_url() . $row[$T_USER[3]] ?>"
                                     title="<?= $row[$T_USER[0]] . '-' . $row[$T_USER[1]] ?>"
                                     class="img-circle"/>
                                -  <?= $row[$T_USER[1]] ?>
                            </div>
                            <hr class="hr-clas"/>
                        <?PHP }
                    } ?>


                </div>
                <div class="chat-box-footer">
                    <input type="text" class="form-control" id="text_chat" placeholder="Enter your massage...">
                </div>
            </div>
        </div>

</div>

<?php }
else{
    ?>
<div class="row"style="margin-top: 59px;margin-bottom: 600px">
    <div class="col-md-12">
    <p class="alert alert-danger"><?= $Not ?></p>
    </div>
    </div>
<?php
} ?>
