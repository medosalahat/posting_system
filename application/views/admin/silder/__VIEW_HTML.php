<div class="margin-top">
    <div class="row">
<div class="col-sm-12 col-md-12">
    <div class="page-header">
        <h3>slider</h3>
    </div>
    <div id="toolbar">
        <button class="btn btn-success" id="add">add slider</button>
    </div>
    <table id="table" data-toggle="table" data-url="<?= base_url() . 'admin/function_slider/get' ?>"
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
            <th data-field="title"

                data-align="center"
                data-width="20">
              Title
            </th>
            <th data-field="text"

                data-align="center"
                data-width="20">
               Text
            </th>
            <th data-field="image"

                data-formatter="image"
                data-align="center"
                data-width="20">
                Image
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


            <div class="modal fade" id="slider_new" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">
                                New slider
                            </h4>
                        </div>
                        <div class="modal-body">
                            <img id="preview" src="" class="img-responsive img-thumbnail"/>

                            <form role="form" id="add_new_slider" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="text"  name="text" placeholder="text"/>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="btn btn-success-upload-file fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Add files </span>
                                            <input type="file" name="file" id="file" class="fileUpload"/>
                                        </span>

                                    </div>
                                    <div id="message"></div>
                                </div>

                                <button type="submit" id="set_new_slider_submit" class="btn btn-default">Submit</button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>
