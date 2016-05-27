<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('company_model');
		$this->load->model('position_model');
		$this->load->model('user_model');
	}
    function check_photo()
    {
        if (isset($_FILES['photo']))
        {
            if ($_FILES["photo"]["error"] == 0)
            {
                $name = md5(basename($_FILES["photo"]["name"]) . date('Y-m-d H:i:s'));
                $target_dir = UPLOAD_USER_HOST;
                $imageFileType = strtolower(pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION));
                $param2 = array();
                $param2['target_file'] = UPLOAD_FOLDER . $name . '.' . $imageFileType;
                $param2['imageFileType'] = $imageFileType;
                $param2['tmp_name'] = $_FILES["photo"]["tmp_name"];
                $param2['tmp_file'] = $target_dir . $name . '.' . $imageFileType;
                $param2['size'] = $_FILES["photo"]["size"];
                $check_image = check_image($param2);
                if ($check_image == 'true')
                {
                    return TRUE;
                }
                else
                {
                    $this->form_validation->set_message('check_photo', $check_image);
                    return FALSE;
                }
            }
        }
    }
	
	function check_user_email($param)
	{
		$get = check_user_email($param);
		
        if ($get == TRUE)
        {
            $this->form_validation->set_message('check_user_email', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
	}
	
	function check_user_name($param)
	{
		$get = check_user_name($param);
		
        if ($get == TRUE)
        {
            $this->form_validation->set_message('check_user_name', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
	}
	
	function check_user_username($param)
	{
		$get = check_user_username($param);
		
        if ($get == TRUE)
        {
            $this->form_validation->set_message('check_user_username', '%s already exist');
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
		$data['frame_content'] = 'user/user';
		$this->load->view('templates/frame', $data);
	}
    function user_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_error_delimiters('<div class="font-red-flamingo">', '</div>');
			$this->form_validation->set_rules('id_position', 'Position', 'required');
			$this->form_validation->set_rules('id_company', 'Company', 'required');
			$this->form_validation->set_rules('id_po_name', 'PO Name', 'required');
			$this->form_validation->set_rules('id_user_project_group', 'Project group', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_user_email');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_user_username');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('name', 'Name', 'required|callback_check_user_name');
			$this->form_validation->set_rules('role', 'Role', 'required');
            $this->form_validation->set_rules('photo', 'photo', 'callback_check_photo');
			
			if ($this->form_validation->run() == TRUE)
			{
				if (isset($_FILES['photo']))
                {
                    if ($_FILES["photo"]["error"] == 0)
                    {
                        $name = md5(basename($_FILES["photo"]["name"]) . date('Y-m-d H:i:s'));
                        $imageFileType = strtolower(pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION));
                        $photo = UPLOAD_USER_HOST . $name . '.' . $imageFileType;
                    }
                }
				
				$param = array();
				$param['id_position'] = $this->input->post('id_position');
				$param['id_company'] = $this->input->post('id_company');
				$param['id_po_name'] = $this->input->post('id_po_name');
				$param['id_user_project_group'] = $this->input->post('id_user_project_group');
				$param['email'] = $this->input->post('email');
				$param['username'] = $this->input->post('username');
				$param['password'] = $this->input->post('password');
				$param['name'] = $this->input->post('name');
				$param['role'] = $this->input->post('role');
				$param['nik'] = $this->input->post('nik');
				$param['photo'] = $photo;
				$query = $this->user_model->create($param);
				
				if ($query->code == 200)
				{
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_user'));
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$data['company_lists'] = get_company_lists(array('order' => 'name', 'sort' => 'asc'));
		$data['position_lists'] = get_position_lists(array('order' => 'name', 'sort' => 'asc'));
		$data['po_name_lists'] = get_po_name_lists(array('order' => 'name', 'sort' => 'asc'));
		$data['user_project_group_lists'] = get_user_project_group_lists(array('order' => 'name', 'sort' => 'asc'));
		$data['code_user_role'] = $this->config->item('code_user_role');
		$data['frame_content'] = 'user/user_create';
		$this->load->view('templates/frame', $data);
	}
	
	function user_edit()
	{
		$data = array();
		if (!empty($this->input->post('id_user')))
		{
			$data['id'] = $this->input->post("id_user");
		}
		else
		{
			$data['id'] = $this->input->get("id");
		}
		
		$query = $this->user_model->info(array('id_user' => $data['id']));
		if ($query->code == 200)
		{
			if ($this->input->post('submit') == TRUE)
			{
				$this->form_validation->set_error_delimiters('<div class="font-red-flamingo">', '</div>');
				$this->form_validation->set_rules('id_position', 'Position', 'required');
				$this->form_validation->set_rules('id_company', 'Company', 'required');
				$this->form_validation->set_rules('id_po_name', 'PO Name', 'required');
				$this->form_validation->set_rules('id_user_project_group', 'Project group', 'required');
				//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_user_email');
				//$this->form_validation->set_rules('username', 'Username', 'required|callback_check_user_username');
				$this->form_validation->set_rules('name', 'Name', 'required|callback_check_user_name');
				$this->form_validation->set_rules('role', 'Role', 'required');
				$this->form_validation->set_rules('photo', 'photo', 'callback_check_photo');
				
				if ($this->form_validation->run() == TRUE)
				{
					if ((isset($_FILES['photo']))&&($_FILES['photo']!=null))
					{
						if ($_FILES["photo"]["error"] == 0)
						{
							$name = md5(basename($_FILES["photo"]["name"]) . date('Y-m-d H:i:s'));
							$imageFileType = strtolower(pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION));
							$photo = UPLOAD_USER_HOST . $name . '.' . $imageFileType;
						}
					}
					$param = array();
					if ( ! empty($this->input->post('password')))
					{
						$param['password'] = $this->input->post('password');
					}
					
					$param['id_user'] = $this->input->post('id_user');
					$param['id_position'] = $this->input->post('id_position');
					$param['id_company'] = $this->input->post('id_company');
					$param['id_po_name'] = $this->input->post('id_po_name');
					$param['id_user_project_group'] = $this->input->post('id_user_project_group');
					$param['email'] = $this->input->post('email');
					$param['username'] = $this->input->post('username');
					$param['name'] = $this->input->post('name');
					$param['role'] = $this->input->post('role');
					$param['nik'] = $this->input->post('nik');
					//$param['photo'] = $photo;
					$query = $this->user_model->update($param);
					
					if ($query->code == 200)
					{
						$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_user'));
					}
					else
					{
						$response =  array('msg' => 'Create data failed', 'type' => 'error');
					}
					echo json_encode($response);
					exit();
				}
			}
			
			$data['user_detail'] = $query;
			$data['company_lists'] = get_company_lists(array('order' => 'name', 'sort' => 'asc'));
			$data['position_lists'] = get_position_lists(array('order' => 'name', 'sort' => 'asc'));
			$data['po_name_lists'] = get_po_name_lists(array('order' => 'name', 'sort' => 'asc'));
			$data['user_project_group_lists'] = get_user_project_group_lists(array('order' => 'name', 'sort' => 'asc'));
			$data['code_user_role'] = $this->config->item('code_user_role');
			$data['frame_content'] = 'user/user_edit';
			$this->load->view('templates/frame', $data);
		}
		else
		{
			redirect($this->config->item('link_user'));
		}
	}
	
	function user_get()
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
		
		$get = $this->user_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
		$jsonData = array('data' => array(), 'total' => 0);
		
		if ($get->code == 200)
		{
			$jsonData['total'] = $get->total;
			
			foreach ($get->result as $row)
			{
				$code_user_role = $this->config->item('code_user_role');
				$get_company = $this->company_model->info(array('id_company' => $row->id_company));
				$get_position = $this->position_model->info(array('id_position' => $row->id_position));
				
				$action = '<a title="Detail" id="'.$row->id_user.'" class="view '.$row->id_user.'-view" href="#"><i class="fa fa-folder-open font-larger font-blue"></i></a>&nbsp;
							<a title="Edit" href="'.$this->config->item('link_user_edit').'?id='.$row->id_user.'"><i class="fa fa-pencil font-larger font-yellow-crusta"></i></a>&nbsp;
							<a title="Delete" id="'.$row->id_user.'" class="delete '.$row->id_user.'-delete" href="#"><i class="fa fa-times font-larger font-red-thunderbird"></i></a>';
				
				if ($get_company->code == 200 || $get_position->code == 200)
				{
					$company = $get_company->result;
					$position = $get_position->result;
					
					$entry = array(
						'No' => $i,
						'Name' => ucwords($row->name),
						'Company' => ucwords($company->name),
						'Position' => ucwords($position->name),
						'Role' => ucwords($code_user_role[$row->role]),
						'Status' => $row->status,
						'Action' => $action
					);
					
					$jsonData['data'][] = $entry;
					$i++;
				}
			}
		}
		
		echo json_encode($jsonData);
	}
}