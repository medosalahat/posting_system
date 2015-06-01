<div class="margin-top"><br>

    <div class="col-xs-12 col-sm-4 col-md-3">

        <div class="columns_user">
            <img src="<?= base_url() . $MY_DATA[$T_USER[7]] ?>" class="thumbnail img-responsive img-circle image_user"
                 id="image_user_file"/>
            <h4 style="text-align: center"> <?= $MY_DATA[$T_USER[1]] ?> </h4>
            <h6 style="text-align: center"><span
                    class="glyphicon glyphicon-envelope"></span> <?= $MY_DATA[$T_USER[3]] ?> </h6>
            <h6 style="text-align: center"><span class="glyphicon glyphicon-ice-lolly"/> <?= $MY_DATA[$T_USER[5]] ?>
            </h6>
            <h6 style="text-align: center"><span class="glyphicon glyphicon-phone"/> <?= $MY_DATA[$T_USER[6]] ?> </h6>
            <hr>
        </div>
    </div>
    <div class="col-md-9">

        <div class="row">
            <div class="col-md-12">
                <?PHP foreach ($post as $news) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <a href="#" class="pull-left">
                                    <img src=" <?= base_url() . $news[$T_USER_N[3]] ?>"
                                         class="media-object media_image_header"/>
                                </a>

                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <?= $news[$T_USER_N[1]] ?>
                                    </h5>
                                    <span><?= relativedate(time() - strtotime($news[$T_POST[4]])); ?> ago</span>
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
                            <div id="body_comment_<?= $news[$T_POST[0]] ?>">
                                <?PHP foreach ($comment as $replies) {
                                    if ($replies[$T_COMMENT[1]] == $news[$T_POST[0]]) {
                                        ?>
                                        <div class="media media_comment">
                                            <a href="<?= base_url() . 'user/' . $replies[$T_USER_N[2]] ?>"
                                               class="pull-left">
                                                <img src="<?= base_url() . $replies[$T_USER_N[3]] ?>"
                                                     class="media-object image_comment"/></a>

                                            <div class="media-body">
                                                <h6 class="media-heading media_header_comment">
                                                    <?= $replies[$T_USER_N[1]] ?></h6><?= $replies[$T_COMMENT[3]] ?>
                                            </div>
                                        </div>
                                    <?PHP }
                                } ?>
                            </div>
                            <!-- comment-->
                            <input class="form-control add_comment" placeholder="Add a comment.."
                                   id="body_text_<?= $news[$T_POST[0]] ?>"
                                   data-id="<?= $news[$T_POST[0]] ?>" data-body="body_comment_<?= $news[$T_POST[0]] ?>"
                                   type="text" style="padding-left: 9px;">
                        </div>
                    </div>
                <?PHP } ?>
            </div>


        </div>
    </div>

</div>
<div class="modal fade" id="upload" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">
                   Upload Image
                </h4>
            </div>
            <div class="modal-body">
                <img id="preview_post" src="" class="img-responsive img-thumbnail"/>
                <form role="search" class="" id="UploadImage_post" method="post" enctype="multipart/form-data"
                      action="">
                    <input type="hidden" name="id_post" id="id_post"/>
                    <div class="form-group">
                        <div class="input-group">
                                        <span class="btn btn-success-upload-file fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Add files </span>
                                            <input type="file" name="file_post" id="file_post" class="fileUpload"/>
                                        </span>

                        </div>
                        <div id="message"></div>
                    </div>
                    <button type="submit" id="EditUploadImage" class="btn btn-default">Upload New Image
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>

    </div>

</div>
<?php
function relativedate($secs)
{
    $second = 1;
    $minute = 60;
    $hour = 60 * 60;
    $day = 60 * 60 * 24;
    $week = 60 * 60 * 24 * 7;
    $month = 60 * 60 * 24 * 7 * 30;
    $year = 60 * 60 * 24 * 7 * 30 * 365;

    if ($secs <= 0) {
        $output = "Now";
    } elseif ($secs > $second && $secs < $minute) {
        $output = round($secs / $second) . " second";
    } elseif ($secs >= $minute && $secs < $hour) {
        $output = round($secs / $minute) . " minute";
    } elseif ($secs >= $hour && $secs < $day) {
        $output = round($secs / $hour) . " hour";
    } elseif ($secs >= $day && $secs < $week) {
        $output = round($secs / $day) . " day";
    } elseif ($secs >= $week && $secs < $month) {
        $output = round($secs / $week) . " week";
    } elseif ($secs >= $month && $secs < $year) {
        $output = round($secs / $month) . " month";
    } elseif ($secs >= $year && $secs < $year * 10) {
        $output = round($secs / $year) . " year";
    } else {
        $output = " more than a decade ago";
    }

    if ($output <> "now") {
        $output = (substr($output, 0, 2) <> "1 ") ? $output . "s" : $output;
    }
    return $output;
}

?>