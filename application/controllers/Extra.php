<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Extra extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('');
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
