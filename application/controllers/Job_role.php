<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Job_role extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('job_role_model');
	}
	
	function check_job_role_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = check_job_role_name($name);
		
        if ($get == FALSE && $selfname != $name)
        {
            $this->form_validation->set_message('check_job_role_name', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
	}

    function index()
	{
		$data = array();
		$data['frame_content'] = 'job_role/job_role';
		$this->load->view('templates/frame', $data);
	}

    function job_role_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('name', 'Name', 'required|callback_check_job_role_name');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['description'] = $this->input->post('description');
				$query = $this->job_role_model->create($param);
				
				if ($query->code == 200)
				{
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_job_role'), 'title' => 'Job Role');
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error', 'title' => 'Job Role');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$data['frame_content'] = 'job_role/job_role_create';
		$this->load->view('templates/frame', $data);
	}
	
	function job_role_delete()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');
		
		$get = $this->job_role_model->info(array('id_job_role' => $data['id']));
		
		if ($get->code == 200)
		{
			if ($this->input->post('delete') == TRUE)
			{
				$query = $this->job_role_model->delete(array('id_job_role' => $data['id']));
				
				if ($query->code == 200)
				{
					$response =  array('msg' => 'Delete data success', 'type' => 'success', 'title' => 'Job Role');
				}
				else
				{
					$response =  array('msg' => 'Delete data failed', 'type' => 'error', 'title' => 'Job Role');
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
	
	function job_role_edit()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$query = $this->job_role_model->info(array('id_job_role' => $data['id']));
		
		if ($query->code == 200)
		{
			if ($this->input->post('submit') == TRUE)
			{
				$this->form_validation->set_rules('name', 'Name', 'required|callback_check_job_role_name');
				
				if ($this->form_validation->run() == TRUE)
				{
					$param = array();
					$param['id_job_role'] = $data['id'];
					$param['name'] = $this->input->post('name');
					$param['description'] = $this->input->post('description');
					$query2 = $this->job_role_model->update($param);
					
					if ($query2->code == 200)
					{
						$response =  array('msg' => 'Update data success', 'type' => 'success', 'title' => 'Job Role');
					}
					else
					{
						$response =  array('msg' => 'Update data failed', 'type' => 'error', 'title' => 'Job Role');
					}
					
					echo json_encode($response);
					exit();
				}
			}
			else
			{
				$data['rows']= $query->result;
				$this->load->view('job_role/job_role_edit', $data);
			}
		}
		else
		{
			echo "Data Not Found";
		}
	}
	
	function job_role_get()
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
		
		$get = $this->job_role_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
		$jsonData = array('data' => array(), 'total' => 0);
		
		if ($get->code == 200)
		{
			$jsonData['total'] = $get->total;
			
			foreach ($get->result as $row)
			{
				$action = '<a title="Edit" id="'.$row->id_job_role.'" class="edit '.$row->id_job_role.'-edit" href="#"><i class="fa fa-pencil font-larger font-yellow-crusta"></i></a>&nbsp;
							<a title="Delete" id="'.$row->id_job_role.'" class="delete '.$row->id_job_role.'-delete" href="#"><i class="fa fa-times font-larger font-red-thunderbird"></i></a>';
				
				$entry = array(
					'No' => $i,
					'Name' => ucwords($row->name),
					'Description' => replace_new_line($row->description),
					'Action' => $action
				);
				
				$jsonData['data'][] = $entry;
				$i++;
			}
		}
		
		echo json_encode($jsonData);
	}
}
