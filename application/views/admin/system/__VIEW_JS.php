
<script type="text/javascript">
    $(document).ready(function (e) {

        $('#save_butn_name').click(function () {
            if ($('#name').val() == '') {
                alert('text is empty');
            }
            else {
                $.post('<?= base_url().'admin/function_system/update' ?>', {name: $('#name').val()}, function (data) {
                    var result = JSON.parse(data);
                    if (result['valid']) {
                        location.reload();

                    }
                }).fail(function () {
                    alert("Error");
                });

            }


        });


    });
</script>