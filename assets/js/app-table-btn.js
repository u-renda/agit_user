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
    
    //Job Analyst - Edit
    if (document.getElementById('page_job_analyst') != null) {
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
});