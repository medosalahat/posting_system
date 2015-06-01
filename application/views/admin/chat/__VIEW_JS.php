<link href="<?= base_url() ?>assets/jsFile/bootstrap-table.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/jsFile/bootstrap-table.js"></script>

<script type="text/javascript">
    function image_user(value) {


            return '<img src="<?= base_url()?>'+value+'"style="width: 20px"/>';


    }
    function Action_formatter(value) {


            return ['<a class="remove ml10"  href="javascript:void(0)" title="remove">',
                '<span class="glyphicon glyphicon-remove-sign" title=""></span>',
                '</a>'].join('');

    }
    window.Action_event={
        'click .remove': function (e, value, row, index) {

            var id=row.id;
            $.post('<?= base_url()."admin/function_chat/remove_row"?>',
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
    window.status_user_event={
        'click .edit_user': function (e, value, row, index) {
            var id=row.id;
            var val=value;
            $.post('<?= base_url()."admin/function_user/status_user"?>',
                {ID:id,value:val}, function (data) {
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
    function Image_user(value) {

            return '<img src="<?= base_url()?>'+value+'"style="width: 40px" />';

    }

    function operateFormatter(value, row, index) {

        return [

            '<a class="edit ml10" href="javascript:void(0)" title="Edit">',
            '<i class="glyphicon glyphicon-edit"></i>',
            '</a>',
            '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>',
            '<a class="like" href="javascript:void(0)" title="Like">',
            '<i class="glyphicon glyphicon-heart"></i>',
            '</a>'
        ].join('');
    }

    window.operateEvents = {
        'click .edit': function (e, value, row, index) {

            $('#EditThisPost').modal('show');
            $('#TitlePostSmall').html(row.TextPost);
            $('#EditPostCpsIdPost').val(row.IdPost);
            $('#EditPostCpsTitlePost').val(row.TextPost);
            $('#EditPostCpsUrlPost').val(row.UrlPost);
            if (row.IsImage == 1) {
                $('#EditPostCpsIsImage').bootstrapSwitch('state', true, true);
            }
            else {
                $('#EditPostCpsIsImage').bootstrapSwitch('state', false, false);
            }
            $('#EditIdPostUploadImage').val(row.IdPost);
            $('#EditPostCpsCategoryPost').val(row.CategoryPost);
            if (row.IsUpdate == 1) {
                $url = "<?=base_url()?>"
                $('#EditPostCpsUrlImage').attr('src', $url + row.ImageUrl);
            }
            else {
                $('#EditPostCpsUrlImage').attr('src', row.ImageUrl);
            }

            $('#EditPostCpsDescriptionPost').val(row.DescriptionPost);
        },
        'click .remove': function (e, value, row, index) {

            $.post('<?= base_url()."alaraby/function_super/Delete_This_Post_From_System" ?>',
                {IdPost: row.IdPost}, function (data) {
                    var $table = $('#table');
                    $table.bootstrapTable('showLoading');
                    $table.bootstrapTable('refresh');

                });
        },
        'click .like': function (e, value, row, index) {
            alert('asd');
        }
    };
</script>