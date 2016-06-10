<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>User Create
                    <small></small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="#">Administrator</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo $this->config->item('link_user'); ?>">User</a>
                <i class="fa fa-circle"></i>
            </li>
            <li><span class="active">Create</span></li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row" id="page_user_create">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-body form">
                        <form action="<?php echo $this->config->item('link_user_create'); ?>" method="post" class="form-horizontal" id="form_user_create" enctype="multipart/form-data">
                            <div class="form-body">
                                <h3 class="form-section">User Info</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Company<span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <?php echo form_error('id_company'); ?>
                                                <select class="form-control" name="id_company" id="id_company">
                                                    <option value="">-- Select --</option>
                                                    <?php foreach ($company_lists as $row) { ?>
                                                    <option value="<?php echo $row->id_company; ?>" <?php echo set_select('id_company', $row->id_company); ?>><?php echo ucwords($row->name); ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Position<span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <?php echo form_error('id_position'); ?>
                                                <select class="form-control" name="id_position" id="id_position">
                                                    <option value="">-- Select --</option>
                                                    <?php foreach ($position_lists as $row) { ?>
                                                    <option value="<?php echo $row->id_position; ?>" <?php echo set_select('id_position', $row->id_position); ?>><?php echo ucwords($row->name); ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-3">Name<span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <?php echo form_error('name'); ?>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" />
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-3">Email<span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <?php echo form_error('email'); ?>
                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" />
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-3">Username<span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <?php echo form_error('username'); ?>
                                                <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" />
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-3">Password<span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <?php echo form_error('password'); ?>
                                                <input type="password" class="form-control" name="password" id="password" />
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-3 control-label">Role<span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <?php echo form_error('role'); ?>
                                                <select class="form-control" name="role" id="role">
                                                    <option value="">-- Select --</option>
                                                    <?php foreach ($code_user_role as $key => $val) { ?>
                                                    <option value="<?php echo $key; ?>" <?php echo set_select('role', $key); ?>><?php echo ucwords($val); ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="form-control-focus"> </div>
                                                <span class="help-block opacity1">Role di aplikasi ini</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-3">NIK</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="nik" name="nik" value="<?php echo set_value('nik'); ?>" />
                                                <div class="form-control-focus"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-3">Photo</label>
                                            <div class="col-md-9">
                                                <input type="file" class="form-control" name="photo" id="photo"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="form-section">Project Info</h3>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">PO Name<span class="required"> * </span></label>
                                    <div class="col-md-9">
                                        <?php echo form_error('id_po_name'); ?>
                                        <select class="form-control" name="id_po_name" id="id_po_name">
                                            <option value="">-- Select --</option>
                                            <?php foreach ($po_name_lists as $row) { ?>
                                            <option value="<?php echo $row->id_po_name; ?>" <?php echo set_select('id_po_name', $row->id_po_name); ?>><?php echo ucwords($row->name); ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Project Group<span class="required"> * </span></label>
                                    <div class="col-md-9">
                                        <?php echo form_error('id_user_project_group'); ?>
                                        <select class="form-control" name="id_user_project_group" id="id_user_project_group">
                                            <option value="">-- Select --</option>
                                            <?php foreach ($user_project_group_lists as $row) { ?>
                                            <option value="<?php echo $row->id_user_project_group; ?>" <?php echo set_select('id_user_project_group', $row->id_user_project_group); ?>><?php echo ucwords($row->name); ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" name="submit" value="submit">
                                            <i class="fa fa-check"></i> Create</button>
                                        <a type="button" class="btn default" href="<?php echo $this->config->item('link_user'); ?>">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
        
        