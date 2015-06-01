<div class="margin-top">
    <div class="row">
<div class="col-sm-12 col-md-12">
    <div class="page-header">
        <h3>Users</h3>
    </div>
    <div id="toolbar">
    </div>
    <table id="table" data-toggle="table" data-url="<?= base_url() . 'admin/function_user/Get_users' ?>"
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
                data-formatter="Name_user"
                data-align="center"
                data-width="20">
                Name
            </th>
            <th data-field="username"
                data-formatter=""
                data-align="center"
                data-width="20">
                Username
            </th>
            <th data-field="email"
                data-formatter=""
                data-align="center"
                data-width="20">
                Email
            </th>
            <th data-field="gender"
                data-formatter=""
                data-align="center"
                data-width="20">
                Gender
            </th>
            <th data-field="mobile"
                data-formatter=""
                data-align="center"
                data-width="20">
                Mobile
            </th>
            <th data-field="image"
                data-formatter="Image_user"
                data-align="center"
                data-width="20">
                Image
            </th>
            <th data-field="isadmin"
                data-formatter="IS_ADMIN"
                data-events="IS_ADMIN_EVENT"
                data-align="center"
                data-width="20">
                Is Admin
            </th>
            <th data-field="level"
                data-formatter="level_formatter"
                data-events="level_events"
                data-align="center"
                data-width="20">
                level
            </th>
            <th data-field="status"
                data-formatter="status_user"
                data-events="status_user_event"
                data-align="center"
                data-width="20">
                Status
            </th>
            <th data-field="last_ip"
                data-formatter=""
                data-align="center"
                data-width="20">
                Last  Ip
            </th>
            <th data-field="birthday"
                data-formatter=""
                data-align="center"
                data-width="20">
                Birthday
            </th>

        </tr>
        </thead>
    </table>
</div>
    </div>
</div>