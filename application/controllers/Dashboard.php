<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('job_role_model');
		$this->load->model('project_model');
		$this->load->model('project_issue_model');
		$this->load->model('project_user_model');
		$this->load->model('user_model');
		$this->load->model('user_overtime_model');
	}
	
	function dashboard_get()
	{
		$id_project_group = $this->input->post('id_project_group');
		
		$get_project = $this->project_model->lists(array('id_project_group' => $id_project_group));
		
		if ($get_project->code == 200)
		{
			$jsonData = array('data' => array());
			$i = 1;
					
			foreach ($get_project->result as $row)
			{
				$get_project_user = $this->project_user_model->lists(array('id_project' => $row->id_project));
				
				if ($get_project_user->code == 200)
				{
					foreach ($get_project_user->result as $row)
					{
						$get_user = $this->user_model->info(array('id_user' => $row->id_user));
						$get_job_role = $this->job_role_model->info(array('id_job_role' => $row->id_job_role));
						
						if ($get_user->code == 200 && $get_job_role->code == 200)
						{
							$user = $get_user->result;
							$job_role = $get_job_role->result;
							
							$entry = array(
								'No' => $i,
								'Name' => ucwords($user->name),
								'Team' => ucwords($user->company->name),
								'Responsibilities' => ucwords($job_role->name)
							);
							
							$jsonData['data'][] = $entry;
							$i++;
						}
					}
				}
			}
			
			echo json_encode($jsonData);
		}
	}
	
	function index()
	{
		$data = array();
		$id_user = $this->session->userdata('id_user');
		$get_user = $this->user_model->info(array('id_user' => $id_user));
		$project = array();
		
		if ($get_user->code == 200)
		{
			$data['user'] = $get_user->result;
			
			$get_project_user = $this->project_user_model->lists(array('id_user' => $id_user));
			
			if ($get_project_user->code == 200)
			{
				foreach ($get_project_user->result as $row)
				{
					$get_project = $this->project_model->info(array('id_project' => $row->id_project));
					
					if ($get_project->code == 200)
					{
						$project[]['project_group'] = $get_project->result->project_group;
					}
				}
			}
		}
		
		$data['project'] = array_map("unserialize", array_unique(array_map("serialize", $project)));
		$data['id_project_group'] = $this->input->post('id_project_group');
		$data['frame_content'] = 'dashboard/dashboard';
		$this->load->view('templates/frame', $data);
	}
	
	function project_monitoring()
	{
		$data = array();
		
		// Total Project
		$total_project = $this->project_model->lists(array())->total;
		
		// Project by status
		$project_closed = $this->project_model->lists(array('status' => 1))->total;
		$project_in_progress = $this->project_model->lists(array('status' => 3))->total;
		
		// Issue by category
		$data['issue_critical'] = $this->project_issue_model->lists(array('category' => 1, 'status' => 2))->total;
		$data['issue_major'] = $this->project_issue_model->lists(array('category' => 2, 'status' => 2))->total;
		$data['issue_minor'] = $this->project_issue_model->lists(array('category' => 3, 'status' => 2))->total;
		
		// Percent
		$project_closed_percent = 0;
		$project_in_progress_percent = 0;
		
		if(isset($total_project) && $total_project != 0)
		{
			$project_closed_percent = ($project_closed/$total_project)*100;
			$project_in_progress_percent = ($project_in_progress/$total_project)*100;
		}
		
		$data['total_project'] = $total_project;
		$data['project_closed'] = $project_closed;
		$data['project_in_progress'] = $project_in_progress;
		$data['project_closed_percent'] = $project_closed_percent;
		$data['project_in_progress_percent'] = $project_in_progress_percent;
		$data['frame_content'] = 'dashboard/project_monitoring';
		$this->load->view('templates/frame', $data);
	}
	
	function project_monitoring_get()
	{
		$get_open = $this->project_model->lists(array('status' => 1))->total;
        $get_progress = $this->project_model->lists(array('status' => 2))->total;
        $get_closed = $this->project_model->lists(array('status' => 3))->total;
		$title = array('Open', 'In Progress', 'Closed', '-> Actual', '-> On This Month');
		
		// Belum pecah data untuk tiap bulannya
		$jsonData = array('data' => array());
		
		foreach ($title as $key => $val)
		{
			$entry = array(
				'ProjectActivities' => $val,
				'Total' => 1,
				'Jan' => 2,
				'Feb' => 3,
				'Mar' => 4,
				'Apr' => 5,
				'May' => 6,
				'Jun' => 2,
				'Jul' => 4,
				'Aug' => 3,
				'Sep' => 4,
				'Oct' => 1,
				'Nov' => 7,
				'Dec' => 4
			);
			
			$jsonData['data'][] = $entry;
		}
		
		echo json_encode($jsonData);
	}

    function resource_monitoring()
	{
		$data = array();
		$data['frame_content'] = 'dashboard/resource_monitoring';
		$this->load->view('templates/frame', $data);
	}
	
	function resource_monitoring_get()
	{
		// Project User
		$query = $this->project_user_model->lists(array('group_by' => 'id_user'));
		
		if ($query->code == 200)
		{
			$jsonData = array('data' => array());
			
			foreach($query->result as $row)
			{
				$id_user = $row->id_user;
				
				// Count Project per user
				$total_project = $this->project_user_model->lists(array('id_user' => $id_user))->total;
				
				// Count Project by status
				$param3 = array();
				$param3['id_user'] = $id_user;
				$param3['status'] = 1;
				$project_completed = $this->project_model->lists($param3)->total;
				
				$param4 = array();
				$param4['id_user'] = $id_user;
				$param4['status'] = 3;
				$project_in_progress = $this->project_model->lists($param4)->total;
				
				$param5 = array();
				$param5['id_user'] = $id_user;
				$param5['status'] = 4;
				$project_delay = $this->project_model->lists($param5)->total;
				
				// Overtime by category
				$param = array();
				$param['id_user'] = $id_user;
				$param['category'] = 1;
				$overtime_workday = $this->user_overtime_model->lists($param)->total;
				
				$param2 = array();
				$param2['id_user'] = $id_user;
				$param2['category'] = 2;
				$overtime_holiday = $this->user_overtime_model->lists($param2)->total;
			}
		}
	}
}
