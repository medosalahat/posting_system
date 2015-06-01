<div class="margin-top" style="margin-bottom: 300px">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Members :</h2>
        </div>
        <div class="row col-md-12">
        <div class="col-md-6">

                <form role="form" method="post" action="<?= base_url().'admin/function_user/INSERT_NEW_USER_TO_SECTION'?>">
                    <div class="form-group">
                        <select name="user" class="form-control" id="user">
                            <option value="">Select User</option>
                            <?PHP foreach($user as $u){ ?>
                            <option value="<?= $u['id']?>"><?= $u['name']?></option>
                            <?PHP } ?>
                        </select>
                    </div>
                    <div class="form-group">

                        <select name="section" class="form-control" id="section">
                            <?PHP foreach($section as $u){ ?>
                            <option value="<?= $u['id']?>"><?= $u['title']?></option>
                            <?PHP } ?>
                        </select>
                    </div>
                   <button type="submit" class="btn btn-success">Save User</button>
                </form>
        </div>
        <div class="col-md-6">
                <div id="toolbar">
                </div>
                <table id="table" data-toggle="table" data-url="<?= base_url() . 'admin/function_member/get' ?>"
                       data-cache="false" data-height="500"
                       data-show-columns="true"
                       data-show-refresh="true"
                       data-show-toggle="true"
                       data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]"
                       data-search="true"
                       data-flat="true"
                       data-toolbar="#toolbar">
                    <thead>
                    <tr>
                        <th data-field="state"
                            data-checkbox="true"
                            data-formatter="SELECT"
                            data-align="center"
                            data-width="20">
                            #
                        </th>
                        <th data-field="name"

                            data-align="center"
                            data-width="20">
                            Name User
                        </th>
                        <th data-field="id_section"
                            data-align="center"
                            data-width="20">
                            Section
                        </th>
                        <th data-field="Action"
                            data-formatter="Action_formatter"
                            data-events="Action_event"
                            data-align="center"
                            data-width="20">
                            Action
                        </th>


                    </tr>
                    </thead>
                </table>


        </div>
        </div>
    </div>
</div>