<link href="<?= base_url() ?>assets/jsFile/bootstrap-table.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/jsFile/bootstrap-table.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
            $.get( "<?= base_url().'admin/function_section/get_college'?>", function( data ) {
                var result = JSON.parse(data);

                if(result != '')
                {
                    $.each(result, function(i) {

                        $('#college_section').append('<option value="'+result[i].id+'">'+result[i].text+'</option>');
                        $('#college_specialty').append('<option value="'+result[i].id+'">'+result[i].text+'</option>');

                    });
                }

            });


        $('#college_section').change(function(){
            $('#specialty_section').html('<option value="">specialty</option>');
            $.post('<?= base_url().'admin/function_section/get_specialty'?>', {id_college:$('#college_section').val()}, function (data) {
                var result = JSON.parse(data);

                if(result != '')
                {
                    $.each(result, function(i) {
                        $('#specialty_section').append('<option value="'+result[i].id+'">'+result[i].text+'</option>');
                    });
                }

            }).fail(function () {
                alert("Error");
            });

        });
    });
</script>
<script type="text/javascript">
    action_formatter
    function action_formatter(value) {


        return ['<a class="remove ml10"  href="javascript:void(0)" title="remove">',
            '<span class="glyphicon glyphicon-remove-sign" title=""></span>',
            '</a>'].join('');

    }
    window.action_event={
        'click .remove': function (e, value, row, index) {

            var id=row.id;
            $.post('<?= base_url()."admin/function_section/remove_row"?>',
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
<script type="text/javascript">

    function action_formatter_college(value) {


        return ['<a class="remove ml10"  href="javascript:void(0)" title="remove">',
            '<span class="glyphicon glyphicon-remove-sign" title=""></span>',
            '</a>'].join('');

    }
    window.action_event_college={
        'click .remove': function (e, value, row, index) {

            var id=row.id;
            $.post('<?= base_url()."admin/function_section/remove_row_college"?>',
                {ID:id}, function (data) {
                    var result = JSON.parse(data);
                    if(result['valid'] == 1)
                    {
                        var $table = $('#table2');
                        $table.bootstrapTable('showLoading');
                        $table.bootstrapTable('refresh');
                    }

                });
        }

    };
</script>
<script type="text/javascript">

    function action_formatter_specialty(value) {


        return ['<a class="remove ml10"  href="javascript:void(0)" title="remove">',
            '<span class="glyphicon glyphicon-remove-sign" title=""></span>',
            '</a>'].join('');

    }
    window.action_event_specialty={
        'click .remove': function (e, value, row, index) {

            var id=row.id;
            $.post('<?= base_url()."admin/function_section/remove_row_specialty"?>',
                {ID:id}, function (data) {
                    var result = JSON.parse(data);
                    if(result['valid'] == 1)
                    {
                        var $table = $('#table3');
                        $table.bootstrapTable('showLoading');
                        $table.bootstrapTable('refresh');
                    }

                });
        }

    };
</script>