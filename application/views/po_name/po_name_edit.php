<!-- BEGIN PAGE BASE CONTENT -->
<div class="row" id="page_po_name_edit">
    <div class="col-md-12 col-sm-12">
        <form action="<?php echo $this->config->item('link_po_name_edit'); ?>" method="post" class="form-horizontal" id="form_po_name_edit" novalidate="novalidate">
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>" />
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
                        <input type="hidden" id="selfname" name="selfname" value="<?php echo $rows->name; ?>"/>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?><?php echo $rows->name; ?>" />
                        <?php echo form_error('name'); ?>
                        <div class="form-control-focus"></div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green" name="submit" value="submit">
                            <i class="fa fa-check"></i> Save Changes
                        </button>
                        <button type="cancel" class="btn default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END PAGE BASE CONTENT -->

<script type="text/javascript">
$(document).ready(function () {
    var e=$("#form_po_name_edit"),
        r=$(".alert-danger", e),
        i=$(".alert-success", e),
        grid="grid_po_name";
        
    e.validate({
        errorElement:"span",
        errorClass:"help-block help-block-error",
        focusInvalid:!1,
        ignore:"",
        rules: {
            name: {
                required: true,
                remote: {
                    url: newPathname + "check_po_name_name",
                    type: "post",
                    data: {
                        selfname: function() {
                            return $("#selfname").val();
                        },
                        name: function() {
                            return $("#name").val();
                        }
                    }
                }
            }
        },
        messages: {
            name: {
                required:"Please insert job role name.",
                remote: "Name already exist"
            }
        },
        invalidHandler:function(e, t) {
            i.hide(), r.show(), App.scrollTo(r, -200)
        },
        errorPlacement:function(e, r) {
            r.is(":checkbox")?e.insertAfter(r.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline")): r.is(":radio")?e.insertAfter(r.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline")): e.insertAfter(r)
        },
        highlight:function(e) {
            $(e).closest(".form-group").addClass("has-error")
        },
        unhighlight:function(e) {
            $(e).closest(".form-group").removeClass("has-error")
        },
        success:function(e) {
            e.closest(".form-group").removeClass("has-error")
        },
        submitHandler:function(e) {
            i.show(), r.hide();
            $('.modal-title').text('Please wait...');
            $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
            $('.modal-dialog').addClass('modal-sm');
            $('#myModal').modal('show');
            $.ajax(
            {
                type: "POST",
                url: e.action,
                data: $(e).serialize(), 
                cache: false,
                success: function(data)
                {
                    var response = $.parseJSON(data);
                    $('#myModal').modal('hide');
                    $('#' + grid).data('kendoGrid').dataSource.read();
                    $('#' + grid).data('kendoGrid').refresh();
                    new PNotify({
                        title: response.title,
                        text: response.msg,
                        type: response.type
                    });
                }
            });
        }
    });
    
    return false;
});
</script>