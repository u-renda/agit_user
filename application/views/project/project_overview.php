<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Overview
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
            <li><span class="active">Overview</span></li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row" id="page_project">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="portlet light bordered">
                            <div class="portlet-body">
                                <div class="row marginbottom10">
                                    <div class="col-sm-2">Project Name:</div>
                                    <div class="col-sm-10"><?php echo ucwords($project->name); ?></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-sm-3">Project Status: merah</div>
                                    <div class="col-sm-3">Completed: 78,34%</div>
                                    <div class="col-sm-6">Outstanding Issues:</div>
                                    <div class="col-sm-2 col-sm-offset-6">Critical: <?php echo $issue_critical; ?></div>
                                    <div class="col-sm-2">Major: <?php echo $issue_major; ?></div>
                                    <div class="col-sm-2">Minor: <?php echo $issue_minor; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="portlet light bordered height260">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-share font-red-sunglo hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">Ongoing Activities</span>
                                    <span class="caption-helper"></span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="grid_project_overview_1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="portlet light bordered height260">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-share font-red-sunglo hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">Detail of All Member Project</span>
                                    <span class="caption-helper"></span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row border1 paddingtb10">
                                    <div class="col-sm-12">Project Manager :</div>
                                    <div class="col-sm-12">Jajang Surajang</div>
                                    <div class="col-sm-12 margintop15">Quality Control :</div>
                                    <div class="col-sm-12">Jamal Argito</div>
                                    <div class="col-sm-12 margintop15">Developer :</div>
                                    <div class="col-sm-12">Udin Maerudin, Saepuloh</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-share font-red-sunglo hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">Latest Activity</span>
                                    <span class="caption-helper"></span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="grid_project_overview_2"></div>
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
        
        