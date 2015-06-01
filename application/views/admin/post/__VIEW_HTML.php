<div class="margin-top">
    <div class="row">
<div class="col-sm-12 col-md-12">
    <div class="page-header">
        <h3>Post</h3>
    </div>
    <div id="toolbar">
    </div>
    <table id="table" data-toggle="table" data-url="<?= base_url() . 'admin/function_post/get_post' ?>"
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
            <th data-field="id"

                data-align="center"
                data-width="20">
               Id
            </th>
            <th data-field="id_user"

                data-align="center"
                data-width="20">
              ID User
            </th>
            <th data-field="name"
                data-align="center"
                data-width="20">
               Name User
            </th>
            <th data-field="image"

                data-formatter="image_user"
                data-align="center"
                data-width="20">
                Image User
            </th>
            <th data-field="text"
                data-align="center"
                data-width="20">
                text
            </th>
            <th data-field="media_id"
                data-align="center"
                data-width="20">
                media
            </th>
            <th data-field="time_post"
                data-align="center"
                data-width="20">
                Date Post
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