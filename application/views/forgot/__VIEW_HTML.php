<div class="margin-top" style="margin-bottom: 500px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <?php if(!isset($data)) { ?>
            <h3>Forgot your password</h3>
            <form action="<?= base_url().'user/forgot/get'?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="UserName">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="mobile">
                </div>
                <div class="form-group">
                    <select name="college" id="college" class="form-control" >
                        <option value="">college</option>
                        <?PHP foreach($colloege as $w){ ?><option value="<?=$w['id']?>"><?=$w['text']?></option><?PHP } ?>
                    </select>
                </div>
                <div class="form-group" >
                    <select name="specialty" id="specialty" class="form-control" >
                        <option value="">specialty</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </form>
            <?php }else{
                ?>
                <h3>Forgot your password</h3>
                <form action="<?= base_url().'user/forgot/reset_password'?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $data[0]['id']?>" />
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_1" name="password_1" placeholder="passowrd">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </form>
            <?php
            } ?>
        </div>
    </div>
</div>
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
    </script>
