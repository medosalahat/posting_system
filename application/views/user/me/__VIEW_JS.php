<script type="text/javascript">
    var main_page = '<?= base_url().'function/user/upload_new_image'?>';
    $(document).ready(function (e) {
        $("#image_profile").on('submit', (function (e) {
            e.preventDefault();

            $.ajax({
                url: main_page,
                type: "POST"
                , data: new FormData(this), contentType: false,
                cache: false, processData: false,
                success: function (data) {
                    $('#image_user_file').attr('src', data);

                }
            });
        }));
        $(function () {
            $("#file").change(function () {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    $('#preview').attr('src', 'noimage.png');
                    $("#message").html(
                        "<p id='error'>Please Select A valid Image File</p>"
                        + "<h4>Note</h4>" +
                        "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                }
                else {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        function imageIsLoaded(e) {
            $('#preview').css("display", "block");
            $('#preview').attr('src', e.target.result);
        };
    });
</script>
<script type="text/javascript">
    var main_page = '<?= base_url().'function/user/upload_image_post'?>';
    $(document).ready(function (e) {
        $("#UploadImage_post").on('submit', (function (e) {
            e.preventDefault();

            $.ajax({
                url: main_page,
                type: "POST"
                , data: new FormData(this), contentType: false,
                cache: false, processData: false,
                success: function (data) {
                    $('#upload').modal('hide');
                    location.reload();

                }
            });
        }));
        $(function () {
            $("#file_post").change(function () {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    $('#preview_post').attr('src', 'noimage.png');
                    $("#message").html(
                        "<p id='error'>Please Select A valid Image File</p>"
                        + "<h4>Note</h4>" +
                        "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                }
                else {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        function imageIsLoaded(e) {
            $('#preview_post').css("display", "block");
            $('#preview_post').attr('src', e.target.result);
        };
    });
</script>
<script type="text/javascript">
    $(document).ready(function (e) {

        $('#save_butn_name').click(function () {
            if ($('#name').val() == '' || $('#mobile').val() == '') {
                alert('text is empty');
            }
            else {
                $.post('<?= base_url().'function/user/update' ?>', {name: $('#name').val(), mobile: $('#mobile').val()}, function (data) {
                    var result = JSON.parse(data);
                    if (result['valid']) {
                        location.reload();

                    } else {
                        alert("Error");
                    }
                }).fail(function () {
                    alert("Error");
                });

            }


        });


    });
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

    $(document).ready(function(){
        $('#form_post').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons:{
                valid:'glyphicon glyphicon-ok',
                invalid:'glyphicon glyphicon-remove',
                validating:'glyphicon glyphicon-refresh'
            },
            fields:{
                post:{validators:{notEmpty:{message:''}}}
    }
    }).on('success.form.bv', function(e) {


        e.preventDefault();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        $.post($form.attr('action'), $form.serialize(), function(result) {
            var data = JSON.parse(result);
            if(data)
            {

                $('#upload').modal('show');
                $('#id_post').val(data);

            }

        }).fail(function() {});
    });
    });
</script>
