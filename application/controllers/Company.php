<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('company_model');
	}
	
	function check_company_name($param)
	{
		$get = check_company_name($param);
		
        if ($get == TRUE)
        {
            $this->form_validation->set_message('check_company_name', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
	}

    function company_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('name', 'Name', 'required|callback_check_company_name');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$query = $this->company_model->create($param);
				
				if ($query->code == 200)
				{
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_company'));
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$data['frame_content'] = 'company/company_create';
		$this->load->view('templates/frame', $data);
	}
	
	function company_get()
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
		
		$get = $this->company_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
		$jsonData = array('data' => array(), 'total' => 0);
		
		if ($get->code == 200)
		{
			$jsonData['total'] = $get->total;
			
			foreach ($get->result as $row)
			{
				$action = '<a title="Edit" href="company_edit?id='.$row->id_company.'"><i class="fa fa-pencil font-larger font-yellow-crusta"></i></a>&nbsp;
							<a title="Delete" id="'.$row->id_company.'" class="delete '.$row->id_company.'-delete" href="#"><i class="fa fa-times font-larger font-red-thunderbird"></i></a>';
				
				$entry = array(
					'No' => $i,
					'Name' => ucwords($row->name),
					'Action' => $action
				);
				
				$jsonData['data'][] = $entry;
				$i++;
			}
			
			echo json_encode($jsonData);
		}
	}

    function index()
	{
		$data = array();
		$data['frame_content'] = 'company/company';
		$this->load->view('templates/frame', $data);
	}
}
