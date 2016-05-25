<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Job_analyst extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('job_analyst_model');
	}
	
	function check_job_analyst_name($param)
	{
		$get = check_job_analyst_name($param);
		
        if ($get == TRUE)
        {
            $this->form_validation->set_message('check_job_analyst_name', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
	}

    function job_analyst_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('name', 'Name', 'required|callback_check_job_analyst_name');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['description'] = $this->input->post('description');
				$query = $this->job_analyst_model->create($param);
				
				if ($query->code == 200)
				{
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_job_analyst'));
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$data['frame_content'] = 'job_analyst/job_analyst_create';
		$this->load->view('templates/frame', $data);
	}
	
	function job_analyst_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
		$pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
		$offset = ($page - 1) * $pageSize;
		$i = $offset * 1 + 1;
		$order = 'name';
		$sort = 'asc';
		
		if ($this->input->post('sort'))
		{
			$order = $_POST['sort'][0]['field'];
			$sort = $_POST['sort'][0]['dir'];
		}
		
		$get = $this->job_analyst_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
		$jsonData = array('data' => array(), 'total' => 0);
		
		if ($get->code == 200)
		{
			$jsonData['total'] = $get->total;
			
			foreach ($get->result as $row)
			{
				$action = '<a title="Edit" href="job_analyst_edit?id='.$row->id_job_analyst.'"><i class="fa fa-pencil font-larger font-yellow-crusta"></i></a>&nbsp;
							<a title="Delete" id="'.$row->id_job_analyst.'" class="delete '.$row->id_job_analyst.'-delete" href="#"><i class="fa fa-times font-larger font-red-thunderbird"></i></a>';
				
				$entry = array(
					'No' => $i,
					'Name' => ucwords($row->name),
					'Description' => $row->description,
					'Action' => $action
				);
				
				$jsonData['data'][] = $entry;
				$i++;
			}
		}
		
		echo json_encode($jsonData);
	}

    function index()
	{
		$data = array();
		$data['frame_content'] = 'job_analyst/job_analyst';
		$this->load->view('templates/frame', $data);
	}
}
