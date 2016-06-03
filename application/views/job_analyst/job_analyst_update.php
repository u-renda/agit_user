<!-- BEGIN PAGE BASE CONTENT -->
    <div class="row" id="page_job_analyst_create">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form action="<?php echo $this->config->item('link_job_analyst_create'); ?>" method="post" class="form-horizontal" id="form_job_analyst_create" novalidate="novalidate">
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
                                    <?php echo form_error('name'); ?>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?><?php echo $rows->result->name;?>" />
                                    <div class="form-control-focus"></div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="description" id="description" value="<?php echo set_value('description'); ?>" rows="4"><?php echo $rows->result->description;?></textarea>
                                    <div class="form-control-focus"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green" name="submit" value="submit">
                                        <i class="fa fa-check"></i> Create</button>
                                    <button type="cancel" class="btn default" data-dismiss="modal">
                                        Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- END PAGE BASE CONTENT -->