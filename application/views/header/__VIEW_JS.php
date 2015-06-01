<?PHP IF(!$IS_LOGIN) { ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#<?= $Login_user[2]?>').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons:{
                valid:'glyphicon glyphicon-ok',
                invalid:'glyphicon glyphicon-remove',
                validating:'glyphicon glyphicon-refresh'
            },
            fields:{
        <?=$Login_user[1]?>:{validators:{notEmpty:{message:''}}},
        <?=$Login_user[0]?>:{validators:{notEmpty:{message:''},remote:{type:'POST',url:'<?=$remote[0]?>',message:'this email does not exist',delay:400}}}
    }
    }).on('success.form.bv', function(e) {


        e.preventDefault();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        $.post($form.attr('action'), $form.serialize(), function(result) {
            var data = JSON.parse(result);

            if(data['valid'] != 'Password Not Match')
            {
                location.reload();
            }
            else
            {
                $('#m').html(data['valid'])
            }

        }).fail(function() {});
    });
    });
</script>
<?PHP } ?>