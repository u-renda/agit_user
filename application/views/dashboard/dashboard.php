<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Dashboard
                    <small></small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo $this->config->item('link_dashboard'); ?>">Dashboard</a>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row" id="page_dashboard">
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" id="form_dashboard">
                            <div class="form-body paddingtb0">
                                <div class="form-group form-md-line-input marginbottom0">
                                    <label class="col-md-2 control-label">Client:</label>
                                    <div class="col-md-10">
                                        <div class="form-control form-control-static"><?php echo $user->company->name; ?></div>
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input marginbottom0">
                                    <label class="col-md-2 control-label">PO Name:</label>
                                    <div class="col-md-10">
                                        <div class="form-control form-control-static"><?php echo ucwords($user->po_name->name); ?></div>
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input marginbottom0">
                                    <label class="col-md-2 control-label">Project Group:</label>
                                    <div class="col-md-10">
                                        <div class="form-control form-control-static"><?php echo ucwords($user->user_project_group->name); ?></div>
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-red-sunglo hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Project Members</span>
                            <span class="caption-helper"></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="grid_dashboard"></div>
                        <div class="row margintop15">
                            <div class="col-sm-12">
                                <a type="button" class="btn btn-primary" href="<?php echo $this->config->item('link_project_create'); ?>">New Project</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
        
        