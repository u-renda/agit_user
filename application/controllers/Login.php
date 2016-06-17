<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('user_model');
    }

    function check_password($password, $username)
    {
        $result = $this->user_model->valid(array('username' => $username, 'password' => $password));
		
        if ($result->code == 200)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_password', 'Wrong Username or Password');
            return FALSE;
        }
    }

	function index()
	{
        if ($this->session->userdata('is_login') == TRUE) { redirect($this->config->item('link_dashboard')); }
		
		$code_user_role = $this->config->item('code_user_role');
        
		$data = array();
		if ($this->input->cookie('username') != '' && $this->input->cookie('password') != '')
		{
			$username = decode($this->input->cookie('username'), $this->config->item('cookie_key'));
			$getdata = $this->user_model->info(array('username' => $username));
			
			if ($getdata->code == 200)
			{
				$user = $getdata->result;
				$check_pass = sha1($user->password);
				
				if ($check_pass == $this->input->cookie('password'))
				{
					$photo = $user->photo;
					
					if ($photo == '')
					{
						$photo = base_url('assets/images').'/user_default_35.png';
					}
					
					$cached = array(
						'id_user'=> $user->id_user,
						'username'=> $user->username,
						'name'=> $user->name,
						'email'=> $user->email,
						'photo'=> $photo,
						'role'=> $code_user_role[$user->role],
						'role_id'=> $user->role,
						'is_login' => TRUE
					);
					
					// Set session
					$this->session->set_userdata($cached);
					
					redirect($this->config->item('link_dashboard'));
				}
			}
		}
		elseif ($this->input->post('submit'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_check_password['.$this->input->post('username').']');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				$query = $this->user_model->info(array('username' => $this->input->post('username')));

				if ($query->code == 200)
				{
					$user = $query->result;
					$photo = $user->photo;
					
					if ($photo == '')
					{
						$photo = base_url('assets/images').'/user_default_35.png';
					}
					
					$cached = array(
						'id_user'=> $user->id_user,
						'username'=> $user->username,
						'name'=> $user->name,
						'email'=> $user->email,
						'photo'=> $photo,
						'role'=> $code_user_role[$user->role],
						'role_id'=> $user->role,
						'is_login' => TRUE
					);
					
					// Set session
					$this->session->set_userdata($cached);

					// Set cookie
					if ($this->input->post('logged'))
					{
						$cookie_user = encode($username, $this->config->item('cookie_key'));
						$cookie_pass = sha1($user->password);
						
						$cookie_username = array(
							'name' => 'username',
							'value' => ''.$cookie_user.'',
							'expire' => '1728000'
						);
						$cookie_password = array(
							'name' => 'password',
							'value' => ''.$cookie_pass.'',
							'expire' => '1728000'
						);
						
						$this->input->set_cookie($cookie_username);
						$this->input->set_cookie($cookie_password);
					}
					
					redirect($this->config->item('link_dashboard'));
				}
			}
		}
		
        $this->load->view('login');
	}

    function logout()
    {
		$this->session->sess_destroy();
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('photo');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('id_project');
		
		delete_cookie('username');
		delete_cookie('password');
		
        redirect($this->config->item('link_login'));
    }
}
