<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start active open">
                <a href="<?php echo $this->config->item('link_dashboard'); ?>" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="<?php echo $this->config->item('link_project_monitoring'); ?>" class="nav-link ">
                            <span class="title">Projects Monitoring</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="<?php echo $this->config->item('link_resource_monitoring'); ?>" class="nav-link ">
                            <span class="title">Resources Monitoring</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="<?php echo $this->config->item('link_project'); ?>" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Projects</span>
                    <?php if ($this->session->userdata('id_project') == TRUE) { ?>
                    <span class="arrow"></span>
                    <?php } ?>
                </a>
                <?php if ($this->session->userdata('id_project') == TRUE) { ?>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo $this->config->item('link_project_overview'); ?>" class="nav-link ">
                            <span class="title">Overview</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo $this->config->item('link_project_timeline'); ?>" class="nav-link ">
                            <span class="title">Timeline</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="ui_buttons.html" class="nav-link ">
                            <span class="title">Gantt Chart</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="ui_confirmations.html" class="nav-link ">
                            <span class="title">Visit Request</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="ui_icons.html" class="nav-link ">
                            <span class="title">Calendar</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="ui_socicons.html" class="nav-link ">
                            <span class="title">Outstanding Issues</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="ui_typography.html" class="nav-link ">
                            <span class="title">Overtime</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="ui_tabs_accordions_navs.html" class="nav-link ">
                            <span class="title">Documents</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Project Setting</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_1.html" class="nav-link "> Information </a>
                            </li>
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_2.html" class="nav-link "> Members </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php } ?>
            </li>
            <li class="nav-item">
                <a href="<?php echo $this->config->item('link_complaint'); ?>">
                    <i class="icon-bubbles"></i>
                    <span class="title">Complaints</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Administrator</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="form_controls.html" class="nav-link ">
                            <span class="title">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo $this->config->item('link_user'); ?>" class="nav-link ">
                            <span class="title">User</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo $this->config->item('link_job_analyst'); ?>" class="nav-link ">
                            <span class="title">Job Analyst</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo $this->config->item('link_job_role'); ?>" class="nav-link ">
                            <span class="title">Job Role</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo $this->config->item('link_company'); ?>" class="nav-link ">
                            <span class="title">Company</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo $this->config->item('link_position'); ?>" class="nav-link ">
                            <span class="title">Position</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="form_layouts.html" class="nav-link ">
                            <span class="title">Project Type</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->