<div class="margin-top">
    <div class="row">
        <div class="col-md-4">
            <h4 class="page-header">User option </h4>

            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            Form college
                        </h2>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?= base_url() . 'admin/function_section/add_new_college' ?>"
                              method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="college" placeholder="college"
                                       name="college"/>
                            </div>
                            <button type="submit" class="btn btn-success">add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            Form specialty
                        </h2>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?= base_url() . 'admin/function_section/add_new_specialty' ?>"
                              method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="specialty_new" placeholder="specialty"
                                       name="specialty_new"/>
                            </div>
                            <div class="form-group">

                                <select name="college_specialty" id="college_specialty" class="form-control">
                                    <option value="">college</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            Form Section
                        </h2>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?= base_url() . 'admin/function_section/add_new_section' ?>"
                              method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Section" placeholder="Section"
                                       name="Section"/>
                            </div>
                            <div class="form-group">

                                <select name="college_section" id="college_section" class="form-control">
                                    <option value="">college</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <select name="specialty_section" id="specialty_section" class="form-control">
                                    <option value="">specialty</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8">
            <div class="page-header">
                <h3>College</h3>
            </div>
            <div id="toolbar">

            </div>
            <table id="table2" data-toggle="table" data-url="<?= base_url() . 'admin/function_section/get_college' ?>"
                   data-cache="false" data-height="300"
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
                        data-formatter="id_college"
                        data-align="center"
                        data-width="20">
                        id
                    </th>
                    <th data-field="text"
                        data-formatter="title_college"
                        data-align="center"
                        data-width="20">
                        title
                    </th>

                    <th data-field="action"
                        data-formatter="action_formatter_college"
                        data-events="action_event_college"
                        data-align="center"
                        data-width="20">
                        specialty
                    </th>
                </tr>
                </thead>
            </table>

            <div class="page-header">
                <h3>Specialty</h3>
            </div>
            <div id="toolbar">

            </div>
            <table id="table3" data-toggle="table" data-url="<?= base_url() . 'admin/function_section/get_specialty3' ?>"
                   data-cache="false" data-height="300"
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
                        data-formatter="id_college"
                        data-align="center"
                        data-width="20">
                        id
                    </th>
                    <th data-field="text"
                        data-formatter="title_college"
                        data-align="center"
                        data-width="20">
                        title
                    </th>

                    <th data-field="id_college"
                        data-align="center"
                        data-width="20">
                        College
                    </th>
                    <th data-field="action"
                        data-formatter="action_formatter_specialty"
                        data-events="action_event_specialty"
                        data-align="center"
                        data-width="20">
                        action
                    </th>
                </tr>
                </thead>
            </table>

            <div class="page-header">
                <h3>Section</h3>
            </div>
            <div id="toolbar">
            </div>
            <table id="table" data-toggle="table" data-url="<?= base_url() . 'admin/function_section/get' ?>"
                   data-cache="false" data-height="300"
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
                        data-formatter="id_section"
                        data-align="center"
                        data-width="20">
                        id
                    </th>
                    <th data-field="title"
                        data-formatter="title_section"
                        data-align="center"
                        data-width="20">
                        title
                    </th>
                    <th data-field="id_college"
                        data-formatter="id_college_section"
                        data-align="center"
                        data-width="20">
                        college
                    </th>
                    <th data-field="id_specialty"
                        data-formatter="id_specialty_section"
                        data-align="center"
                        data-width="20">
                        specialty
                    </th>
                    <th data-field="action"
                        data-formatter="action_formatter"
                        data-events="action_event"
                        data-align="center"
                        data-width="20">
                        specialty
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

