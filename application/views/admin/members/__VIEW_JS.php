<link href="<?= base_url() ?>assets/jsFile/bootstrap-table.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/jsFile/bootstrap-table.js"></script>
<script type="text/javascript">
    function Action_formatter(value) {


        return ['<a class="remove ml10"  href="javascript:void(0)" title="remove">',
            '<span class="glyphicon glyphicon-remove-sign" title=""></span>',
            '</a>'].join('');

    }
    window.Action_event={
        'click .remove': function (e, value, row, index) {

            var id=row.id;
            $.post('<?= base_url()."admin/function_member/remove_row"?>',
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
</script>