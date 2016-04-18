<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('project_issue_model');
		$this->load->model('project_model');
		$this->load->model('project_task_model');
		$this->load->model('project_type_model');
		$this->load->model('user_model');
	}

    function index()
	{
		$this->session->unset_userdata('id_project');
		
		$data = array();
		$data['frame_content'] = 'project/project';
		$this->load->view('templates/frame', $data);
	}
	
	function project_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('id_company', 'Company', 'required');
			$this->form_validation->set_rules('id_project_type', 'Project Type', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('division', 'Division', 'required');
			$this->form_validation->set_rules('department', 'Department', 'required');
			$this->form_validation->set_rules('start_date', 'Start Date', 'required');
			$this->form_validation->set_rules('end_date', 'End Date', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				// Project type = others
				$id_project_type = $this->input->post('id_project_type');
				
				if ($this->input->post('project_type_others_name') != '')
				{
					$param2 = array();
					$param2['name'] = $this->input->post('project_type_others_name');
					$id_project_type = $this->project_type_model->create($param2);
				}
				
				$param = array();
				$param['id_company'] = $this->input->post('id_company');
				$param['id_project_type'] = $id_project_type;
				$param['name'] = $this->input->post('name');
				$param['requirement'] = $this->input->post('requirement');
				$param['description'] = $this->input->post('description');
				$param['division'] = $this->input->post('division');
				$param['department'] = $this->input->post('department');
				$param['start_date'] = date('Y-m-d', strtotime($this->input->post('start_date')));
				$param['end_date'] = date('Y-m-d', strtotime($this->input->post('end_date')));
				$param['status'] = 2;
				$query = $this->project_model->create($param);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Create project');
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_project_lists'));
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$data = array();
		$query2 = $this->project_type_model->lists(array());
		//$query3 = $this->company_model->lists(array());
		//$query4 = $this->job_analyst_model->lists(array());
		//
		if ($query2->code == 200)
		{
			$data['project_type_lists'] = $query2->result;
		}
		//
		//if ($query3->num_rows() > 0)
		//{
		//	$data['company_lists'] = $query3->result();
		//}
		//
		//if ($query4->num_rows() > 0)
		//{
		//	$data['job_analyst_lists'] = $query4->result();
		//}
		
		$data['frame_content'] = 'project/project_create';
		$this->load->view('templates/frame', $data);
	}
	
	function project_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
		$pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
		$offset = ($page - 1) * $pageSize;
		$i = $offset * 1 + 1;
		
		if ($this->input->post('sort'))
		{
			$order = $_POST['sort'][0]['field'];
			$sort = $_POST['sort'][0]['dir'];
		}
		
		if ($this->input->post('filter'))
		{
			$q = $_POST['filter']['filters'][0]['value'];
		}
		
		$get = $this->project_model->lists(array());
		
		if ($get->code == 200)
		{
			$jsonData = array('data' => array(), 'total' => $get->total);
			
			foreach ($get->result as $row)
			{
				// Duration
				$start_date = new DateTime($row->start_date);
				$end_date = new DateTime($row->end_date);
				$duration = $end_date->diff($start_date);
				
				// Finished date
				$finished_date = '-';
				
				if ($row->finished_date != '0000-00-00 00:00:00')
				{
					$finished_date = $row->finished_date;
				}
				
				// Status - color
				$status = color_project_status($row->status);
				
				// Project name
				$project = '<a title="Overview" href="'.$this->config->item('link_project_overview').'" id="'.$row->id_project.'" class="btn_overview">'.ucwords($row->name).'</a>';
				//$project = '<a title="Overview" onclick="session_id_project('.$row->id_project.')">'.ucwords($row->name).'</a>';
				
				$entry = array(
					'No' => $i,
					'Projects' => $project,
					'Duration' => $duration->format('%a'),
					'Started' => $row->start_date,
					'Target' => $row->end_date,
					'Finished' => $finished_date,
					'Percent' => '',
					'Status' => $status
				);
				
				$jsonData['data'][] = $entry;
				$i++;
			}
			
			echo json_encode($jsonData);
		}
	}
	
	function project_overview()
	{
		$id_project = $this->session->userdata('id_project');
		
		if (isset($id_project) == FALSE) { redirect($this->config->item('link_project')); }
		
		$get = $this->project_model->info(array('id_project' => $id_project));
		
		if ($get->code == 200)
		{
			$data = array();
			$project = $get->result;
			
			// Issue
			$data['issue_critical'] = $this->project_issue_model->lists(array('id_project' => $id_project, 'category' => 1, 'status' => 2))->total;
			$data['issue_major'] = $this->project_issue_model->lists(array('id_project' => $id_project, 'category' => 2, 'status' => 2))->total;
			$data['issue_minor'] = $this->project_issue_model->lists(array('id_project' => $id_project, 'category' => 3, 'status' => 2))->total;

			// Ongoing activities
			
			
			$data['project'] = $project;
			$data['frame_content'] = 'project/project_overview';
			$this->load->view('templates/frame', $data);
		}
		else
		{
			echo "Data Not Found";
		}
	}
	
	function project_overview_get_1()
	{
		$code_project_task_group = $this->config->item('code_project_task_group');
		$jsonData = array('data' => array());
		
		foreach ($code_project_task_group as $key => $val)
		{
			// group by group_task-nya trs cek statusnya -> baru diitung brp persennya
			$complete = 0;
			$delay = 0;
			$count1 = $this->project_task_model->lists(array('group_task' => $key))->total;
			
			if ($count1 > 0)
			{
				
			}
			
			$entry = array(
				'Tasks' => ucwords($val),
				'Complete' => '',
				'Delay' => '',
				'RAG' => ''
			);
			
			$jsonData['data'][] = $entry;
		}
		
		echo json_encode($jsonData);
	}
	
	function project_overview_get_2()
	{
		$param = array();
		$param['id_project'] = $this->session->userdata('id_project');
		$param['status'] = 2;
		$get = $this->project_task_model->lists($param);
		
		if ($get->code == 200)
		{
			$jsonData = array('data' => array());
			$i = 1;
			
			foreach ($get->result as $row)
			{
				$get_user = $this->user_model->info(array('id_user' => $row->id_user));
				
				if ($get_user->code == 200)
				{
					$user = $get_user->result;
					$status = color_project_task_status($row->status);
					$finished_date = $row->finished_date;
					
					if ($finished_date == '0000-00-00')
					{
						$finished_date = '-';
					}
					
					$entry = array(
						'No' => $i,
						'TaskName' => ucwords($row->name),
						'PIC' => ucwords($user->name),
						'Start' => $row->start_date,
						'Target' => $row->end_date,
						'Finish' => $finished_date,
						'Status' => $status
					);
					
					$jsonData['data'][] = $entry;
					$i++;
				}
			}
		
			echo json_encode($jsonData);
		}
	}
	
	function project_timeline()
	{
		$data = array();
		$query = $this->project_model->info(array('id_project' => $this->session->userdata('id_project')));
		
		if ($query->code == 200)
		{
			$data['project'] = $query->result;
		}
		
		$data['frame_content'] = 'project/project_timeline';
		$this->load->view('templates/frame', $data);
	}
	
	function project_timeline_get()
	{
		if ($this->input->post('sort'))
		{
			$order = $_POST['sort'][0]['field'];
			$sort = $_POST['sort'][0]['dir'];
		}
		
		if ($this->input->post('filter'))
		{
			$q = $_POST['filter']['filters'][0]['value'];
		}
		
		$get_group1 = $this->project_task_model->lists(array('id_project' => $this->session->userdata('id_project'), 'group_task' => 1));
		$get_group2 = $this->project_task_model->lists(array('id_project' => $this->session->userdata('id_project'), 'group_task' => 2));
		$get_group3 = $this->project_task_model->lists(array('id_project' => $this->session->userdata('id_project'), 'group_task' => 3));
		$get_group4 = $this->project_task_model->lists(array('id_project' => $this->session->userdata('id_project'), 'group_task' => 4));
		
		$code_project_task_group = $this->config->item('code_project_task_group');
		$jsonData = array('data' => array(), 'total' => 0);
		
		foreach ($code_project_task_group as $key => $val)
		{
			$entry = array(
				'Group' => ucwords($val),
			);
			
			$jsonData['data'][] = $entry;
		}
		
		echo json_encode($jsonData);
		//if ($get->code == 200)
		//{
		//	$code_project_task_group = $this->config->item('code_project_task_group');
		//	$jsonData = array('data' => array(), 'total' => $get->total);
		//	
		//	foreach ($get->result as $row)
		//	{
		//		$get_user = $this->user_model->info(array('id_user' => $row->id_user));
		//		
		//		if ($get_user->code == 200)
		//		{
		//			$user = $get_user->result;
		//			$status = color_project_task_status($row->status);
		//			$finished_date = $row->finished_date;
		//			
		//			if ($finished_date == '0000-00-00')
		//			{
		//				$finished_date = '-';
		//			}
		//			
		//			$action = '<a title="View" href="position_edit?id='.$row->id_project_task.'"><i class="fa fa-search font-larger font-blue"></i></a>&nbsp;
		//					<a title="Edit" href="position_edit?id='.$row->id_project_task.'"><i class="fa fa-pencil font-larger font-yellow-crusta"></i></a>&nbsp;
		//					<a title="Delete" id="'.$row->id_project_task.'" class="delete '.$row->id_project_task.'-delete" href="#"><i class="fa fa-times font-larger font-red-thunderbird"></i></a>&nbsp;
		//					<a title="Validation" id="'.$row->id_project_task.'" class="delete '.$row->id_project_task.'-delete" href="#"><i class="fa fa-thumbs-o-up font-larger font-grey-mint"></i></a>&nbsp;
		//					<a title="Done" id="'.$row->id_project_task.'" class="delete '.$row->id_project_task.'-delete" href="#"><i class="fa fa-check font-larger font-green-jungle"></i></a>';
		//			
		//			$entry = array(
		//				'TaskName' => ucwords($row->name),
		//				'PIC' => ucwords($user->name),
		//				'Start' => $row->start_date,
		//				'Target' => $row->end_date,
		//				'Finish' => $finished_date,
		//				'Status' => $status,
		//				'Group' => ucwords($code_project_task_group[$row->group_task]),
		//				'Action' => $action
		//			);
		//			
		//			$jsonData['data'][] = $entry;
		//		}
		//	}
		//	
		//	echo json_encode($jsonData);
		//}
	}
}
