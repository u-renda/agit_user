<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// LOGIN
$route['login'] = 'login/index';
$route['logout'] = 'login/logout';

// DASHBOARD
$route['dashboard'] = 'dashboard/index';
$route['dashboard_get'] = 'dashboard/dashboard_get';
$route['project_monitoring'] = 'dashboard/project_monitoring';
$route['project_monitoring_get'] = 'dashboard/project_monitoring_get';
$route['resource_monitoring'] = 'dashboard/resource_monitoring';
$route['resource_monitoring_get'] = 'dashboard/resource_monitoring_get';

// COMPLAINT
$route['complaint'] = 'complaint/index';
$route['complaint_create'] = 'complaint/complaint_create';
$route['complaint_get'] = 'complaint/complaint_get';

// PROJECT
$route['project'] = 'project/index';
$route['project_create'] = 'project/project_create';
$route['project_get'] = 'project/project_get';
$route['project_overview'] = 'project/project_overview';
$route['project_overview_get_1'] = 'project/project_overview_get_1';
$route['project_overview_get_2'] = 'project/project_overview_get_2';
$route['project_timeline'] = 'project/project_timeline';
$route['project_timeline_get'] = 'project/project_timeline_get';

// EXTRA
$route['check_company_name'] = 'extra/check_company_name';
$route['check_job_analyst_name'] = 'extra/check_job_analyst_name';
$route['check_job_role_name'] = 'extra/check_job_role_name';
$route['check_position_name'] = 'extra/check_position_name';
$route['set_session_id_project'] = 'extra/set_session_id_project';

// USER
$route['user_create'] = 'user/user_create';
$route['user_delete'] = 'user/user_delete';
$route['user_edit'] = 'user/user_edit';
$route['user_get'] = 'user/user_get';

// COMPANY
$route['company_create'] = 'company/company_create';
$route['company_delete'] = 'company/company_delete';
$route['company_get'] = 'company/company_get';

// POSITION
$route['position_create'] = 'position/position_create';
$route['position_delete'] = 'position/position_delete';
$route['position_get'] = 'position/position_get';

// JOB ANALYST
$route['job_analyst_create'] = 'job_analyst/job_analyst_create';
$route['job_analyst_delete'] = 'job_analyst/job_analyst_delete';
$route['job_analyst_edit'] = 'job_analyst/job_analyst_edit';
$route['job_analyst_get'] = 'job_analyst/job_analyst_get';

// JOB ROLE
$route['job_role_create'] = 'job_role/job_role_create';
$route['job_role_delete'] = 'job_role/job_role_delete';
$route['job_role_get'] = 'job_role/job_role_get';

// PROJECT TYPE
$route['project_type_create'] = 'project_type/project_type_create';
$route['project_type_delete'] = 'project_type/project_type_delete';
$route['project_type_get'] = 'project_type/project_type_get';

// PO NAME
$route['po_name_create'] = 'po_name/po_name_create';
$route['po_name_delete'] = 'po_name/po_name_delete';
$route['po_name_get'] = 'po_name/po_name_get';
