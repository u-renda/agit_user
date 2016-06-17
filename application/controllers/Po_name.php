<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Po_name extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('po_name_model');
	}
	
	function check_po_name_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = check_po_name_name($name);
		
        if ($get == FALSE && $selfname != $name)
        {
            $this->form_validation->set_message('check_po_name_name', '%s already exist');
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
		$data['frame_content'] = 'po_name/po_name';
		$this->load->view('templates/frame', $data);
	}

    function po_name_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('name', 'Name', 'required|callback_check_po_name_name');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$query = $this->po_name_model->create($param);
				
				if ($query->code == 200)
				{
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_po_name'), 'title' => 'PO Name');
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error', 'title' => 'PO Name');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$data['frame_content'] = 'po_name/po_name_create';
		$this->load->view('templates/frame', $data);
	}
	
	function po_name_delete()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');
		
		$get = $this->po_name_model->info(array('id_po_name' => $data['id']));
		
		if ($get->code == 200)
		{
			if ($this->input->post('delete') == TRUE)
			{
				$query = $this->po_name_model->delete(array('id_po_name' => $data['id']));
				
				if ($query->code == 200)
				{
					$response =  array('msg' => 'Delete data success', 'type' => 'success', 'title' => 'PO Name');
				}
				else
				{
					$response =  array('msg' => 'Delete data failed', 'type' => 'error', 'title' => 'PO Name');
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
	
	function po_name_edit()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$query = $this->po_name_model->info(array('id_po_name' => $data['id']));
		
		if ($query->code == 200)
		{
			if ($this->input->post('submit') == TRUE)
			{
				$this->form_validation->set_rules('name', 'Name', 'required|callback_check_po_name_name');
				
				if ($this->form_validation->run() == TRUE)
				{
					$param = array();
					$param['id_po_name'] = $data['id'];
					$param['name'] = $this->input->post('name');
					$query2 = $this->po_name_model->update($param);
					
					if ($query2->code == 200)
					{
						$response =  array('msg' => 'Update data success', 'type' => 'success', 'title' => 'PO Name');
					}
					else
					{
						$response =  array('msg' => 'Update data failed', 'type' => 'error', 'title' => 'PO Name');
					}
					
					echo json_encode($response);
					exit();
				}
			}
			else
			{
				$data['rows']= $query->result;
				$this->load->view('po_name/po_name_edit', $data);
			}
		}
		else
		{
			echo "Data Not Found";
		}
	}
	
	function po_name_get()
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
		
		$get = $this->po_name_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
		$jsonData = array('data' => array(), 'total' => 0);
		
		if ($get->code == 200)
		{
			$jsonData['total'] = $get->total;
			
			foreach ($get->result as $row)
			{
				$action = '<a title="Edit" id="'.$row->id_po_name.'" class="edit '.$row->id_po_name.'-edit" href="#"><i class="fa fa-pencil font-larger font-yellow-crusta"></i></a>&nbsp;
							<a title="Delete" id="'.$row->id_po_name.'" class="delete '.$row->id_po_name.'-delete" href="#"><i class="fa fa-times font-larger font-red-thunderbird"></i></a>';
				
				$entry = array(
					'No' => $i,
					'Name' => ucwords($row->name),
					'Action' => $action
				);
				
				$jsonData['data'][] = $entry;
				$i++;
			}
		}
		
		echo json_encode($jsonData);
	}
}
