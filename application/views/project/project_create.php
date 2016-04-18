<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Project Create
                    <small></small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo $this->config->item('link_project'); ?>">Project</a>
                <i class="fa fa-circle"></i>
            </li>
            <li><span class="active">Create</span></li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row" id="page_project_create">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-body form">
                        <form action="<?php echo $this->config->item('link_project_create'); ?>" method="post" class="form-horizontal" id="form_project_create" novalidate="novalidate">
                            <div class="form-wizard">
                                <div class="form-body">
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li>
                                            <a href="#tab1" data-toggle="tab" class="step">
                                                <span class="number"> 1 </span>
                                                <span class="desc font14">
                                                    <i class="fa fa-check"></i> Project Information
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab2" data-toggle="tab" class="step">
                                                <span class="number"> 2 </span>
                                                <span class="desc font14">
                                                    <i class="fa fa-check"></i> Project Members
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab3" data-toggle="tab" class="step">
                                                <span class="number"> 3 </span>
                                                <span class="desc font14">
                                                    <i class="fa fa-check"></i> Timeline
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab4" data-toggle="tab" class="step">
                                                <span class="number"> 4 </span>
                                                <span class="desc font14">
                                                    <i class="fa fa-check"></i> Confirm
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="bar" class="progress progress-stripped" role="progressbar">
                                        <div class="progress-bar progress-bar-success"> </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="alert alert-danger display-none">
                                            <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below.
                                        </div>
                                        <div class="alert alert-success display-none">
                                            <button class="close" data-dismiss="alert"></button> Your form validation is successful!
                                        </div>
                                        <div class="tab-pane active" id="tab1">
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">Project Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="name" />
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">Project Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="md-radio-inline">
                                                        <?php foreach ($project_type_lists as $row) { ?>
                                                        <div class="md-radio">
                                                            <input type="radio" id="<?php echo $row->id_project_type; ?>" name="id_project_type" value="<?php echo $row->id_project_type; ?>" class="md-radiobtn">
                                                            <label for="<?php echo $row->id_project_type; ?>">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span><?php echo ucwords($row->name); ?>
                                                            </label>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label">Project Requirements</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="requirement" rows="3"></textarea>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label">Project Description</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                                    <div class="form-control-focus"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions"></div>
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
        
        