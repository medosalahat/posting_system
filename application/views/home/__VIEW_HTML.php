<div class="margin-top">
    <div class="row home_background">
        <div class="col-md-6 col-sm-8 col-xs-12">
            <?PHP foreach($post as $news){ ?>
            <?PHP if($news['isadmin'] > 0 || $news['level'] > 0){ ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="media">
                        <a href="<?= base_url().'user/profile?id='.$news['id_user']?>" class="pull-left">
                            <img src=" <?= base_url().$news[$T_USER_N[3]]?>" class="media-object media_image_header"/>
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <a href="<?= base_url().'user/profile?id='.$news['id_user']?>">
                                <?= $news[$T_USER_N[1]]?>
                                </a>
                            </h5>
                            <span><?= relativedate(time()-strtotime($news[$T_POST[4]])); ?> ago</span>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="body_post">
                        <P id="text_post"><?= $news[$T_POST[2]] ?></P>
                        <?PHP if ($news[$T_POST[3]] != '') { ?>
                            <img src="<?= base_url().$news[$T_POST[3]]?>" class="img-responsive img-thumbnail pull-right"/>
                        <?PHP } ?>
                    <div class="clearfix"></div>
                    <hr>
                    </div>
                    <div id="body_comment_<?= $news[$T_POST[0]]?>">
                        <?PHP  foreach($comment as $replies){
                            if($replies[$T_COMMENT[1]] == $news[$T_POST[0]])
                            {
                            ?>
                    <div class="media media_comment">
                        <a href="<?= base_url().'user/'.$replies[$T_USER_N[2]]?>" class="pull-left">
                            <img src="<?= base_url().$replies[$T_USER_N[3]]?>" class="media-object image_comment"/></a>
                        <div class="media-body">
                            <h6 class="media-heading media_header_comment">
                                <?= $replies[$T_USER_N[1]] ?></h6><?= $replies[$T_COMMENT[3]] ?>
                        </div>
                    </div>
                        <?PHP } } ?>
                    </div>
                    <!-- comment-->
                        <input class="form-control add_comment" placeholder="Add a comment.."
                               id="body_text_<?= $news[$T_POST[0]]?>"
                               data-id="<?= $news[$T_POST[0]]?>" data-body="body_comment_<?= $news[$T_POST[0]]?>"
                               type="text" style="padding-left: 9px;">
                </div>
            </div>
            <?PHP } ?>
            <?PHP } ?>


        </div>
        <div class="col-md-6 col-sm-8 col-xs-12">
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
</div>

<?php
function relativedate($secs) {
    $second = 1;
    $minute = 60;
    $hour = 60*60;
    $day = 60*60*24;
    $week = 60*60*24*7;
    $month = 60*60*24*7*30;
    $year = 60*60*24*7*30*365;

    if ($secs <= 0) { $output = "now";
    }elseif ($secs > $second && $secs < $minute) { $output = round($secs/$second)." second";
    }elseif ($secs >= $minute && $secs < $hour) { $output = round($secs/$minute)." minute";
    }elseif ($secs >= $hour && $secs < $day) { $output = round($secs/$hour)." hour";
    }elseif ($secs >= $day && $secs < $week) { $output = round($secs/$day)." day";
    }elseif ($secs >= $week && $secs < $month) { $output = round($secs/$week)." week";
    }elseif ($secs >= $month && $secs < $year) { $output = round($secs/$month)." month";
    }elseif ($secs >= $year && $secs < $year*10) { $output = round($secs/$year)." year";
    }else{ $output = " more than a decade ago"; }

    if ($output <> "now"){
        $output = (substr($output,0,2)<>"1 ") ? $output."s" : $output;
    }
    return $output;
}
?>



