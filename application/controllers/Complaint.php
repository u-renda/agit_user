<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('user_complaint_model');
		$this->load->model('user_model');
	}

    function complaint_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('id_user', 'id_user', 'required');
			$this->form_validation->set_rules('id_complained', 'id_complained', 'required');
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('type', 'type', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['description'] = $this->input->post('description');
				$query = $this->job_analyst_model->create($param);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Create job analyst');
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_job_analyst_lists'));
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
		$query2 = $this->user_model->lists(array('order' => 'name', 'sort' => 'asc'));
		
		if ($query2->code == 200)
		{
			$data['user_lists'] = $query2->result;
		}
		
		$data['code_user_complaint_type'] = $this->config->item('code_user_complaint_type');
		$data['frame_content'] = 'complaint/complaint_create';
		$this->load->view('templates/frame', $data);
	}
	
	function complaint_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
		$pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
		$offset = ($page - 1) * $pageSize;
		$i = $offset * 1 + 1;
		$order = 'created_date';
		$sort = 'desc';
		
		if ($this->input->post('sort'))
		{
			$order = $_POST['sort'][0]['field'];
			$sort = $_POST['sort'][0]['dir'];
		}
		
		$get = $this->user_complaint_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
		$jsonData = array('data' => array(), 'total' => 0);
		
		if ($get->code == 200)
		{
			$code_user_complaint_type = $this->config->item('code_user_complaint_type');
			$jsonData['total'] = $get->total;
			
			foreach ($get->result as $row)
			{
				$get_user = $this->user_model->info(array('id_user' => $row->id_user));
				$get_complained = $this->user_model->info(array('id_user' => $row->id_complained));
				
				if ($get_user->code == 200 && $get_complained->code == 200)
				{
					$user = $get_user->result;
					$complained = $get_complained->result;
					
					$entry = array(
						'No' => $i,
						'IssueName' => ucwords($row->name),
						'Date' => date('d M Y', strtotime($row->created_date)),
						'ResourcesName' => ucwords($user->name),
						'Type' => ucwords($code_user_complaint_type[$row->type]),
						'Description' => $row->description,
						'IssuedBy' => ucwords($complained->name)
					);
					
					$jsonData['data'][] = $entry;
					$i++;
				}
			}
		}
		
		echo json_encode($jsonData);
	}

    function index()
	{
		$data = array();
		$data['frame_content'] = 'complaint/complaint';
		$this->load->view('templates/frame', $data);
	}
}
