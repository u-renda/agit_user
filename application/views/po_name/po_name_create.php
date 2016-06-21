<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>PO Name Create
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
                <a href="<?php echo $this->config->item('link_po_name'); ?>">PO Name</a>
                <i class="fa fa-circle"></i>
            </li>
            <li><span class="active">Create</span></li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row" id="page_po_name_create">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-body form">
                        <form action="<?php echo $this->config->item('link_po_name_create'); ?>" method="post" class="form-horizontal" id="form_po_name_create" novalidate="novalidate">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form validation is successful!
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Name<span class="required"> * </span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?>" />
                                        <?php echo form_error('name'); ?>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" name="submit" value="submit">
                                            <i class="fa fa-check"></i> Create</button>
                                        <a type="button" class="btn default" href="<?php echo $this->config->item('link_po_name'); ?>">Cancel</a>
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
        
        