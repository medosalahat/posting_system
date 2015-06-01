<script type="text/javascript">
    var id_body    = '#chat_box';

    var id_button  = '#send_buuton';

    var id_text    = '#text_chat';

    var value_text;

    var body_row_start= '<div class="chat-box-right">';

    var body_row_end= '</div>';

    var body_user_send_start = '<div class="chat-box-name-right">';

    var body_user_send_end = '</div>';

    var hr_class= ' <hr class="hr-clas"/>';

    var myVar ;

    var image_user = '<img src="<?= base_url().$INFO_USER[1] ?>" title="<?= $INFO_USER[0] ?>" class="img-circle"/> <?= $INFO_USER[0] ?>';


    var body_row_start_new= '<div class="chat-box-left">';

    var body_row_end_new= '</div>';

    var body_user_send_start_new = '<div class="chat-box-name-left">';

    var body_user_send_end_new = '</div>';

    var hr_class_new= ' <hr class="hr-clas"/>';



    $(document).ready(function (e) {
        $(id_text ).live("keypress", function(e) {
            if (e.keyCode == 13) {
                value_text =  $(id_text).val();

                if(value_text == ''){

                    alert('text is empty');
                }
                else
                {
                    $.post('<?= $URL_PAGE_AJAX?>', {text:value_text}, function (data) {
                        var result = JSON.parse(data);
                        if (result['valid']) {

                            $(id_body).append(
                                body_row_start+
                                value_text+
                                body_row_end+
                                body_user_send_start+
                                image_user+
                                body_user_send_end+
                                hr_class
                            );
                            $(id_text).val('');

                        } else {
                            alert("Error");
                        }
                    }).fail(function () {
                        alert("Error");
                    });

                }


            }
        });

        $(id_button).click(function(){

            value_text =  $(id_text).val();

            if(value_text == ''){

                alert('text is empty');
            }
            else
            {
                $.post('<?= $URL_PAGE_AJAX?>', {text:value_text}, function (data) {
                    var result = JSON.parse(data);
                    if (result['valid']) {

                        $(id_body).append(
                            body_row_start+
                            value_text+
                            body_row_end+
                            body_user_send_start+
                            image_user+
                            body_user_send_end+
                            hr_class
                        );
                        $(id_text).val('');

                    } else {
                        alert("Error");
                    }
                }).fail(function () {
                    alert("Error");
                });

            }


        });


    });

    $(document).ready(function(){

        myVar = setInterval(function () {

            $.get( "<?= $AJAX_GET ?>", function( data ) {
                var result = JSON.parse(data);

                if(result != '')
                {
                    $.each(result, function(i) {
                        $(id_body).append(
                            body_row_start_new+
                            result[i].<?=$T_CHAT[2]?>+
                            body_row_end_new+
                            body_user_send_start_new+
                            '<img src="<?= base_url()?>'+result[i].<?=$T_USER[3]?>+'" title="'+result[i].<?=$T_USER[1]?>+
                            '" class="img-circle"/> - '+result[i].<?=$T_USER[1]?>+
                            body_user_send_end_new+
                            hr_class
                        );
                        playSound();
                    });
                }

            });
        }, 10000);


    });

    function playSound(){
        var mySound = new buzz.sound( "<?= base_url().'assets/sound/chat_sound'?>", {
            formats: ["mp3"]
        });
        mySound.play();
    }
</script>

<script type="text/javascript">

    var id_add_comment=".add_comment";

    var value_add_comment;

    var ID_POST;

    var ID_BODY;
    var id_text_input;

    var media_comment_start= '<div class="media media_comment">';
    var media_comment_end= '</div>';

    var media_name_user = '<a href="<?= base_url().'user/'.$INFO_USER[0] ?>" class="pull-left">' +
        '<img src="<?= base_url().$INFO_USER[1] ?>" title="<?= $INFO_USER[0] ?>" class="media-object image_comment"/></a>';
    var media_body_start= '<div class="media-body"><h6 class="media-heading media_header_comment"><?= $INFO_USER[0] ?></h6>';
    var media_body_end = '</div>';
    var comment;


    $(document).ready(function (e) {

        $(id_add_comment).live("keypress", function(e) {
            if (e.keyCode == 13) {
                value_add_comment =  $(this).val();

                if(value_add_comment == ''){

                    alert('text is empty');
                }
                else
                {
                    ID_POST = $(this).attr('data-id');
                    ID_BODY = "#" + $(this).attr('data-body');
                    id_text_input = "#" + $(this).attr('id');

                    $.post('<?= $AJAX_POST_COMMENT ?>', {text:value_add_comment,id_post:ID_POST}, function (data) {
                        var result = JSON.parse(data);
                        if (result['valid'] != 0 ) {

                            comment = value_add_comment;

                            $(ID_BODY).append(
                                media_comment_start+
                                media_name_user+
                                media_body_start+
                                comment+
                                media_body_end+
                                media_comment_end
                            );
                            $(id_text_input).val('');

                        } else {
                            alert("Error");
                        }
                    }).fail(function () {
                        alert("Error");
                    });

                }


            }
        });


    });
</script>