<script type="text/javascript">
    $('.carousel').carousel({interval: 5000});
    $('#birthday').datetimepicker({timepicker:false,format:'Y-m-d'});
    $(function () {
        $('.button-checkbox').each(function () {
            var $widget = $(this),
                $button = $widget.find('button'),
                $checkbox = $widget.find('input:checkbox'),
                color = $button.data('color'),
                settings = {
                    on: {icon: 'glyphicon glyphicon-check'},
                    off: {icon: 'glyphicon glyphicon-unchecked'}
                };
            $button.on('click', function () {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
                $checkbox.triggerHandler('change');
                updateDisplay();
            });
            $checkbox.on('change', function () {updateDisplay();});
            function updateDisplay() {
                var isChecked = $checkbox.is(':checked');
                $button.data('state', (isChecked) ? "on" : "off");
                $button.find('.state-icon')
                    .removeClass()
                    .addClass('state-icon ' + settings[$button.data('state')].icon);
                if (isChecked) {
                    $button.removeClass('btn-default').addClass('btn-' + color + ' active');
                    $('#Register').attr('disabled',false);
                }
                else {
                    $button.removeClass('btn-' + color + ' active').addClass('btn-default');
                    $('#Register').attr('disabled',true);
                }
            }
            function init() {
                updateDisplay();
                if ($button.find('.state-icon').length == 0) {
                    $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
                }
            }
            init();
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#college').change(function(){
            $('#specialty').html(' <option value="">specialty</option>');
            $.post('<?= base_url().'function/specialty/get'?>', {id:$('#college').val()}, function (data) {
                var result = JSON.parse(data);

                for(var i=0;i<result.length;i++)
                {
                    $('#specialty').append('<option value="'+result[i].id+'">'+result[i].text+'</option>');
                }

            }).fail(function () {
                alert("Error");
            });
        });
    });
    $(document).ready(function(){
        $('#<?= $user[8]?>').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons:{
                valid:'glyphicon glyphicon-ok',
                invalid:'glyphicon glyphicon-remove',
                validating:'glyphicon glyphicon-refresh'
            },
            fields:{
                <?=$user[0]?>:{validators:{notEmpty:{message:''}}},
                <?=$user[1]?>:{validators:{notEmpty:{message:''},remote:{type:'POST',url:'<?=$remote[0]?>',message:'',delay:400}}},
                <?=$user[2]?>:{validators:{notEmpty:{message:''},remote:{type:'POST',url:'<?=$remote[1]?>',message:'',delay:400}}},
                <?=$user[3]?>:{validators:{notEmpty:{message:''}}},
                <?=$user[4]?>:{validators:{notEmpty:{message:''}}},
                'college':{validators:{notEmpty:{message:''}}},
        'specialty':{validators:{notEmpty:{message:''}}},
                <?=$user[5]?>:{validators:{notEmpty:{message:''},
            callback: {
                message: 'Wrong answer',
                    callback: function (value, validator, $field) {
                    var password= $('#<?=$user[4]?>').val();
                    if(password == value)
                        return{
                        valid: false,
                            message: "need to pick an option dude"
                    };
                    return true;
                }
        }
        }},
                <?=$user[6]?>:{validators:{notEmpty:{message:''}}},
                <?=$user[7]?>:{validators:{notEmpty:{message:''}}},
                <?= $user[5]?>:{validators:{notEmpty:{message:''}}},
                t_and_c:{validators:{choice: {min: 1,message: 'Please I Agree'}}}
            }
        }).on('success.form.bv', function(e) {


            e.preventDefault();
            var $form = $(e.target);
            var bv = $form.data('bootstrapValidator');
            $.post($form.attr('action'), $form.serialize(), function(result) {
                var data = JSON.parse(result);
                location.reload();

            }).fail(function() {});
        });
    });
</script>
