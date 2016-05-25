<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Complaint Create
                    <small></small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo $this->config->item('link_project'); ?>">Complaint</a>
                <i class="fa fa-circle"></i>
            </li>
            <li><span class="active">Create</span></li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row" id="page_complaint_create">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-body form">
                        <form action="<?php echo $this->config->item('link_complaint_create'); ?>" method="post" class="form-horizontal" id="form_complaint_create" novalidate="novalidate">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form validation is successful!
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Issue Name<span class="required"> * </span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" />
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">User's Name<span class="required"> * </span></label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="id_user">
                                            <option value="">-- Select --</option>
                                            <?php foreach ($user_lists as $row) { ?>
                                            <option value="<?php echo $row->id_user; ?>"><?php echo ucwords($row->name); ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="form-control-focus"> </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Type<span class="required"> * </span></label>
                                    <div class="col-md-9">
                                        <div class="md-radio-inline">
                                            <?php foreach ($code_user_complaint_type as $key => $val) { ?>
                                            <div class="md-radio">
                                                <input type="radio" id="<?php echo $key; ?>" name="type" value="<?php echo $key; ?>" class="md-radiobtn">
                                                <label for="<?php echo $key; ?>">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span><?php echo ucwords($val); ?>
                                                </label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Description<span class="required"> * </span></label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" rows="3"></textarea>
                                        <div class="form-control-focus"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" name="submit" value="submit">
                                            <i class="fa fa-check"></i> Create</button>
                                        <a type="button" class="btn default" href="<?php echo $this->config->item('link_complaint'); ?>">Back</a>
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
        
        