<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Timeline
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
            <li><span class="active">Timeline</span></li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row" id="page_project_timeline">
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <div class="row marginbottom10">
                            <div class="col-sm-2">Project Name:</div>
                            <div class="col-sm-10"><?php echo ucwords($project->name); ?></div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <div id="grid_project_timeline"></div>
                        <div class="row margintop15">
                            <div class="col-sm-12">
                                <a type="button" class="btn btn-primary" href="#">New Task</a>
                                <a type="button" class="btn btn-danger pull-right" href="#">Project Closed</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
        
        