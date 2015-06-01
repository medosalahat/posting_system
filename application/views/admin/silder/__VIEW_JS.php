<link href="<?= base_url() ?>assets/jsFile/bootstrap-table.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/jsFile/bootstrap-table.js"></script>
<script type="text/javascript">
    var main_page = '<?= base_url().'admin/function_slider/upload_new_image'?>';
    $(document).ready(function (e) {
        $("#add_new_slider").on('submit', (function (e) {
            e.preventDefault();

            $.ajax({
                url: main_page,
                type: "POST"
                , data: new FormData(this), contentType: false,
                cache: false, processData: false,
                success: function (data) {

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
    function image(value) {


            return '<img src="<?= base_url()?>'+value+'"style="width: 80px"/>';


    }
    function Action_formatter(value) {


            return ['<a class="remove ml10"  href="javascript:void(0)" title="remove">',
                '<span class="glyphicon glyphicon-remove-sign" title=""></span>',
                '</a>'].join('');

    }
    window.Action_event={
        'click .remove': function (e, value, row, index) {

            var id=row.id;
            $.post('<?= base_url()."admin/function_slider/remove_row"?>',
                {ID:id}, function (data) {
                    var result = JSON.parse(data);
                    if(result['valid'] == 1)
                    {
                        var $table = $('#table');
                        $table.bootstrapTable('showLoading');
                        $table.bootstrapTable('refresh');
                    }

                });
        }

    };
    $(document).ready(function (e) {
        $('#add').click(function(){
            $('#slider_new').modal('show');
        });
    });
</script>