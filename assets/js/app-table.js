function resubmit_dashboard() {
    $("#grid_dashboard").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "dashboard_get",
                    dataType: "json",
                    type: "POST",
                    data: {
                        id_project_group : $('#id_project_group').val()
                    }
                }
            },
            schema: {
                data: "data"
            },
            pageSize: 20
        },
        sortable: false,
        columns: [
            {
                field: "No",
                width: 40
            }, {
                field: "Name"
            }, {
                field: "Team"
            }, {
                field: "Responsibilities"
            }
        ]
    });
}

$('#form_dashboard').submit(function (){
    resubmit_dashboard();
    $('#grid_dashboard').data('kendoGrid').dataSource.read();
    $('#grid_dashboard').data('kendoGrid').refresh();
    return false;
});

$(function () {
    // Dashboard
    resubmit_dashboard();
    
    // Project Monitoring
    $("#grid_project_monitoring").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_monitoring_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data"
            },
            pageSize: 20
        },
        sortable: false,
        columns: [
            {
                field: "ProjectActivities",
                title: "Project Activities",
                width: 200
            }, {
                field: "Total",
                width: 60
            },
            { field: "Jan" }, { field: "Feb" }, { field: "Mar" }, { field: "Apr"},
            { field: "May" }, { field: "Jun" }, { field: "Jul" }, { field: "Aug" }, { field: "Sep" },
            { field: "Oct" }, { field: "Nov" }, { field: "Dec" }
        ]
    });
    
    // Resource Monitoring
    $("#grid_resource_monitoring").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "resource_monitoring_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: false,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40
            }, {
                field: "Nama"
            }, {
                field: "Projects",
                    width: 80
            }, {
                title: "Projects Status",
                columns: [{
                    field: "Activities",
                    width: 100
                }, {
                    field: "Completed",
                    width: 100
                }, {
                    field: "InProgress",
                    title: "In Progress",
                    width: 100
                }, {
                    field: "Delay",
                    width: 60
                }]
            }, {
                field: "Overtime",
                columns: [{
                    field: "Workday",
                    width: 80
                }, {
                    field: "Holiday",
                    width: 80
                }]
            }
        ]
    });
    
    // Complaint
    $("#grid_complaint").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "complaint_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "IssueName",
                title: "Issue Name",
                sortable: false
            }, {
                field: "Date",
                width: 100
            }, {
                field: "ResourcesName",
                title: "Resources Name",
                sortable: false
            }, {
                field: "Type",
                width: 100,
                sortable: false
            }, {
                field: "Description",
                sortable: false
            }, {
                field: "IssuedBy",
                title: "Issued By",
                sortable: false
            }
        ]
    });
    
    // Project
    $("#grid_project").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Projects",
                template: "#= data.Projects #",
            }, {
                field: "Duration",
                title: "Duration (days)",
                width: 130
            }, {
                field: "Started",
                width: 100
            }, {
                field: "Target",
                width: 100
            }, {
                field: "Finished",
                width: 100
            }, {
                field: "Percent",
                title: "%",
                width: 60,
                sortable: false
            }, {
                field: "Status",
                template: "#= data.Status #",
                sortable: false,
                width: 100
            }
        ]
    });
    
    // Project Overview
    $("#grid_project_overview_1").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_overview_get_1",
                    dataType: "json"
                }
            },
            schema: {
                data: "data"
            },
            pageSize: 20
        },
        sortable: false,
        columns: [
            {
                field: "Tasks"
            }, {
                field: "Complete",
                title: "Complete (%)",
                width: 110
            }, {
                field: "Delay",
                title: "Delay (%)",
                width: 90
            }, {
                field: "RAG",
                width: 50
            }
        ]
    });
    
    $("#grid_project_overview_2").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_overview_get_2",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "TaskName",
                title: "Task Name"
            }, {
                field: "PIC",
                width: 200,
                sortable: false
            }, {
                field: "Start",
                width: 100
            }, {
                field: "Target",
                width: 100
            }, {
                field: "Finish",
                width: 100
            }, {
                field: "Status",
                template: "#= data.Status #",
                width: 100,
                sortable: false
            }
        ]
    });
    
    // Project Timeline
    $("#grid_project_timeline").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_timeline_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20,
            group: {
                field: "Group"
            }
        },
        sortable: true,
        columns: [
            {
                field: "TaskName",
                title: "Task Name",
                template: "#= data.TaskName #",
                sortable: false
            }, {
                field: "PIC",
                width: 120,
                sortable: false
            }, {
                field: "Start",
                width: 100
            }, {
                field: "Target",
                width: 100
            }, {
                field: "Finish",
                width: 100
            }, {
                field: "Status",
                template: "#= data.Status #",
                sortable: false,
                width: 110
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false,
                width: 130
            }
        ]
    });
});