<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Project Monitoring
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
                <i class="fa fa-circle"></i>
            </li>
            <li><span class="active">Project Overview</span></li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row" id="page_project_monitoring">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                        <span><?php echo $total_project; ?></span>
                                    </h3>
                                    <small>Total Projects</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-red-haze">
                                        <span><?php echo $project_closed; ?></span>
                                        <small class="font-red-haze"><?php echo $project_closed_percent.'%'; ?></small>
                                    </h3>
                                    <small>Project Closed</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-blue-sharp">
                                        <span><?php echo $project_in_progress; ?></span>
                                        <small class="font-blue-sharp"><?php echo $project_in_progress_percent.'%'; ?></small>
                                    </h3>
                                    <small>In Progress</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="dashboard-stat2 bordered">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-purple-soft">
                                        <span><?php echo '0'; ?></span>
                                    </h3>
                                    <small>Members</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="dashboard-stat2 bordered padding7">
                            <div class="marginbottom5">Outstanding Issues :</div>
                            <div>Critical : <?php echo $issue_critical; ?></div>
                            <div>Major : <?php echo $issue_major; ?></div>
                            <div>Minor : <?php echo $issue_minor; ?></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <!-- BEGIN BASIC CHART PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject bold uppercase">Basic Chart</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="chart_1" style="width:100%; height:400px;"> </div>
                            </div>
                        </div>
                        <!-- END BASIC CHART PORTLET-->
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="portlet light bordered">
                            <div class="portlet-body">
                                <div id="grid_project_monitoring"></div>
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
        
        