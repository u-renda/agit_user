<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Extra extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('');
	}
	
	function check_company_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = check_company_name($name);
	
		if ($get == FALSE && $selfname != $name)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_job_analyst_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = check_job_analyst_name($name);
		
		if ($get == FALSE && $selfname != $name)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_job_role_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = check_job_role_name($name);
	
		if ($get == FALSE && $selfname != $name)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_po_name_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = check_po_name_name($name);
	
		if ($get == FALSE && $selfname != $name)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_position_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = check_position_name($name);
	
		if ($get == FALSE && $selfname != $name)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_project_type_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = check_project_type_name($name);
	
		if ($get == FALSE && $selfname != $name)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_user_email()
	{
		$selfemail = $this->input->post('selfemail');
		$email = $this->input->post('email');
		$get = check_user_email($email);
		
        if ($get == FALSE && $selfemail != $email)
        {
            echo 'false';
        }
        else
        {
            echo 'true';
        }
	}
	
	function check_user_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = check_user_name($name);
		
        if ($get == FALSE && $selfname != $name)
        {
            echo 'false';
        }
        else
        {
            echo 'true';
        }
	}
	
	function check_user_username()
	{
		$selfusername = $this->input->post('selfusername');
		$username = $this->input->post('username');
		$get = check_user_username($username);
		
		if ($get == FALSE && $selfusername != $username)
		{
			echo 'false';
		}
		else
		{
			echo 'true';
		}
	}

    function set_session_id_project()
	{
		$id_project = $this->input->post('id_project');
		
		if ($id_project == TRUE)
		{
			$this->session->unset_userdata('id_project');
			$this->session->set_userdata(array('id_project' => $id_project));
			$response =  array('location' => 'project_overview');
		}
		else
		{
			$response =  array('location' => 'project');
		}
		
		echo json_encode($response);
		exit();
	}
}
