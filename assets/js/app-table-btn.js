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
    
    //modal Edit job analyst
     $(this).delegate(".edit", "click", function()
    {
        var id = $(this).attr("id");
        console.log( id );
        var action = "job_analyst_edit";
        $.ajax({
			type : "POST",
			url : newPathname + action,
			data: {id: id},
			success: function(data) {
				//console.log( data );
				//alert(updated);
				$('#myModal').modal('show');
				document.getElementById("application_detail2").innerHTML = data;
			},
		});
      
        
    });
    
   
   
});

//modal

function myFunction()
{
    
}