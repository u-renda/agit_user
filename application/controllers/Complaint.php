<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('user_complaint_model');
		$this->load->model('user_model');
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
