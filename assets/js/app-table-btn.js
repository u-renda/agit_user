$(function () {
    // Project
    if (document.getElementById('page_project') != null) {
        $(this).delegate(".btn_overview", "click", function() {
            var id = $(this).attr("id");
            var action = "set_session_id_project";
            var dataString = 'id_project='+ id;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                success: function(data)
                {
                    var response = $.parseJSON(data);
                    location.href = newPathname + response.location;
                }
            });
            return false;
        });
    }
    
    // Dashboard
    if (document.getElementById('page_dashboard') != null) {
        $(this).delegate(".btn_dashboard", "click", function() {
            var id = $('#id_project_group').val();
            var action = "dashboard";
            var dataString = 'id_project_group='+ id;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                success: function(data)
                {
                    resubmit_dashboard();
                }
            });
            return false;
        });
    }
    
    //Job Analyst
    if (document.getElementById('page_job_analyst') != null) {
        // EDIT
        $(this).delegate(".edit", "click", function() {     
            var id = $(this).attr("id");
            var action = "job_analyst_edit";
            var dataString = 'id='+ id;
            $.ajax({
                type : "POST",
                url : newPathname + action,
                data: dataString,
                success: function(data) {
                    $('.modal-title').text('Job Analyst Edit');
                    $('.modal-body').html(data);
                    $('.modal-footer').hide();
                    $('#myModal').modal('show');
                },
            });
        });
        
        // DELETE
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "job_analyst_delete";
            var grid = "grid_job_analyst";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger font-red-thunderbird"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // User
    if (document.getElementById('page_user') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "user_delete";
            var grid = "grid_user";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger font-red-thunderbird"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // Company
    if (document.getElementById('page_company') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "company_delete";
            var grid = "grid_company";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger font-red-thunderbird"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // Job Role
    if (document.getElementById('page_job_role') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "job_role_delete";
            var grid = "grid_job_role";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger font-red-thunderbird"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // Position
    if (document.getElementById('page_position') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "position_delete";
            var grid = "grid_position";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger font-red-thunderbird"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // Project Type
    if (document.getElementById('page_project_type') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "project_type_delete";
            var grid = "grid_project_type";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger font-red-thunderbird"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // PO Name
    if (document.getElementById('page_po_name') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "po_name_delete";
            var grid = "grid_po_name";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger font-red-thunderbird"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
});