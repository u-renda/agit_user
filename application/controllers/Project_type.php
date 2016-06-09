<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project_type extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('project_type_model');
	}
	
	function project_type_delete()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');
		
		$get = $this->project_type_model->info(array('id_project_type' => $data['id']));
		
		if ($get->code == 200)
		{
			if ($this->input->post('delete') == TRUE)
			{
				$query = $this->project_type_model->delete(array('id_project_type' => $data['id']));
				
				if ($query->code == 200)
				{
					$response =  array('msg' => 'Delete data success', 'type' => 'success', 'title' => 'Project Type');
				}
				else
				{
					$response =  array('msg' => 'Delete data failed', 'type' => 'error', 'title' => 'Project Type');
				}
				
				echo json_encode($response);
				exit();
			}
			else
			{
				$this->load->view('delete_confirm', $data);
			}
		}
		else
		{
			echo "Data Not Found";
		}
	}
	
	function project_type_get()
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
		
		$get = $this->project_type_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
		$jsonData = array('data' => array(), 'total' => 0);
		
		if ($get->code == 200)
		{
			$jsonData['total'] = $get->total;
			
			foreach ($get->result as $row)
			{
				$action = '<a title="Edit" href="project_type_edit?id='.$row->id_project_type.'"><i class="fa fa-pencil font-larger font-yellow-crusta"></i></a>&nbsp;
							<a title="Delete" id="'.$row->id_project_type.'" class="delete '.$row->id_project_type.'-delete" href="#"><i class="fa fa-times font-larger font-red-thunderbird"></i></a>';
				
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
		$data['frame_content'] = 'project_type/project_type';
		$this->load->view('templates/frame', $data);
	}
}
