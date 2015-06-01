<link href="<?= base_url() ?>assets/jsFile/bootstrap-table.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/jsFile/bootstrap-table.js"></script>

<script type="text/javascript">
    function status_user(value) {
        if (value == '1') {

            return ['<a class="edit_user ml10" href="javascript:void(0)" title="EDIT_ADMIN">',
                '<span class="glyphicon glyphicon-remove" title=""></span>',
                '</a>'].join('');
        }
        else {

            return ['<a class="edit_user ml10" href="javascript:void(0)" title="EDIT_ADMIN">',
                '<span class="glyphicon glyphicon-ok" title=""></span>',
                '</a>'].join('');
        }
    }

    function IS_ADMIN(value) {

        if (value == '1') {
            return ['<a class="EDIT_ADMIN ml10" href="javascript:void(0)" title="EDIT_ADMIN">',
                '<span class="glyphicon glyphicon-ok" title=""></span>',
                '</a>'].join('');
        }
        else {
            return ['<a class="EDIT_ADMIN ml10" href="javascript:void(0)" title="EDIT_ADMIN">',
                '<span class="glyphicon glyphicon-remove" title=""></span>',
                '</a>'].join('');
        }
    }
    window.IS_ADMIN_EVENT={
        'click .EDIT_ADMIN': function (e, value, row, index) {
            var id=row.id;
            var val=value;
            $.post('<?= base_url()."admin/function_user/ADMIN_EVENT"?>',
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

    function level_formatter(value)
    {

        if (value == '1') {
            return ['<a class="edit_level ml10" href="javascript:void(0)" title="EDIT_ADMIN">',
                'doctor',
                '</a>'].join('');
        }
        else {
            return ['<a class="edit_level ml10" href="javascript:void(0)" title="EDIT_ADMIN">',
                'Student',
                '</a>'].join('');
        }
    }
    window.level_events={
        'click .edit_level': function (e, value, row, index) {
            var id=row.id;
            var val=value;
            $.post('<?= base_url()."admin/function_user/edit_level"?>',
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


</script>