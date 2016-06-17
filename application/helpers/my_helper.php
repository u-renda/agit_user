<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
+-------------------------------------+
    Name: check_company_name
    Purpose: cek company name sudah terdaftar atau belum
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('check_company_name')) {
    function check_company_name($param)
	{
        $CI =& get_instance();
        $CI->load->model('company_model');
        
		$get = $CI->company_model->info(array('name' => $param));
		
		if ($get->code == 200)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    }
}

/*
+-------------------------------------+
    Name: check_image
    Purpose: cek image yang mau di upload
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('check_image')) {
    function check_image($param)
    {
        $CI =& get_instance();

        // Check if image file is a actual image or fake image
        $check = @getimagesize($param["tmp_name"]);

        if($check === FALSE)
        {
            $msg = "File is not an image.";
            return $msg;
        }
        else
        {
            // Check if file already exists
            if (file_exists($param['tmp_file']))
            {
                $msg = "Sorry, file already exists.";
                return $msg;
            }
            else
            {
                // Check file size
                if ($param["size"] > 2097152) // 2MB
                {
                    $msg = "Sorry, your file is too large.";
                    return $msg;
                }
                else
                {
                    // Allow certain file formats
                    if($param['imageFileType'] != "jpg" && $param['imageFileType'] != "png" && $param['imageFileType'] != "jpeg" && $param['imageFileType'] != "gif" )
                    {
                        $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $msg;
                    }
                    else
                    {
                        $param['image_width'] = $check[0];

                        // Save & resize image berdasarkan width-nya
                        $save_resize = save_resize($param, 500);

                        if ($save_resize == TRUE)
                        {
                            $msg = 'true';
                            return $msg;
                        }
                        else
                        {
                            $msg = "Sorry, there was an error uploading your file.";
                            return $msg;
                        }
                    }
                }
            }
        }
    }
}

/*
+-------------------------------------+
    Name: check_job_analyst_name
    Purpose: cek job analyst name sudah terdaftar atau belum
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('check_job_analyst_name')) {
    function check_job_analyst_name($param)
	{
        $CI =& get_instance();
        $CI->load->model('job_analyst_model');
        
		$get = $CI->job_analyst_model->info(array('name' => $param));
		
		if ($get->code == 200)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    }
}

/*
+-------------------------------------+
    Name: check_job_role_name
    Purpose: cek job role name sudah terdaftar atau belum
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('check_job_role_name')) {
    function check_job_role_name($param)
	{
        $CI =& get_instance();
        $CI->load->model('job_role_model');
        
		$get = $CI->job_role_model->info(array('name' => $param));
		
		if ($get->code == 200)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    }
}

/*
+-------------------------------------+
    Name: check_po_name_name
    Purpose: cek PO name sudah terdaftar atau belum
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('check_po_name_name')) {
    function check_po_name_name($param)
	{
        $CI =& get_instance();
        $CI->load->model('po_name_model');
        
		$get = $CI->po_name_model->info(array('name' => $param));
		
		if ($get->code == 200)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    }
}

/*
+-------------------------------------+
    Name: check_position_name
    Purpose: cek position name sudah terdaftar atau belum
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('check_position_name')) {
    function check_position_name($param)
	{
        $CI =& get_instance();
        $CI->load->model('position_model');
        
		$get = $CI->position_model->info(array('name' => $param));
		
		if ($get->code == 200)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    }
}

/*
+-------------------------------------+
    Name: check_project_type_name
    Purpose: cek project type name sudah terdaftar atau belum
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('check_project_type_name')) {
    function check_project_type_name($param)
	{
        $CI =& get_instance();
        $CI->load->model('project_type_model');
        
		$get = $CI->project_type_model->info(array('name' => $param));
		
		if ($get->code == 200)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    }
}

/*
+-------------------------------------+
    Name: check_user_email
    Purpose: cek email sudah terdaftar atau belum
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('check_user_email')) {
    function check_user_email($param)
    {
        $CI =& get_instance();
        $CI->load->model('user_model');
        
        $get = $CI->user_model->info(array('email' => $param));
        
        if ($get->code == 200)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}

/*
+-------------------------------------+
    Name: check_user_name
    Purpose: cek name sudah terdaftar atau belum
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('check_user_name')) {
    function check_user_name($param)
    {
        $CI =& get_instance();
        $CI->load->model('user_model');
        
        $get = $CI->user_model->info(array('name' => $param));
        
        if ($get->code == 200)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}

/*
+-------------------------------------+
    Name: check_user_username
    Purpose: cek username sudah terdaftar atau belum
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('check_user_username')) {
    function check_user_username($param)
    {
        $CI =& get_instance();
        $CI->load->model('user_model');
        
        $get = $CI->user_model->info(array('username' => $param));
        
        if ($get->code == 200)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}

/*
+-------------------------------------+
    Name: color_project_status
    Purpose: memberi label warna pada status
    @param return : label warna yang sesuai dengan status
+-------------------------------------+
*/
if ( ! function_exists('color_project_status')) {
    function color_project_status($status)
    {
        $CI =& get_instance();
        $code_project_status = $CI->config->item('code_project_status');
        $return = '-';
        
        if ($status == 1)
        {
            $return = '<span class="label bg-green-jungle">'.ucwords($code_project_status[$status]).'</span>';
        }
        elseif ($status == 2)
        {
            $return = '<span class="label label-primary">'.ucwords($code_project_status[$status]).'</span>';
        }
        elseif ($status == 3)
        {
            $return = '<span class="label label-danger">'.ucwords($code_project_status[$status]).'</span>';
        }
        elseif ($status == 4)
        {
            $return = '<span class="label label-warning">'.ucwords($code_project_status[$status]).'</span>';
        }
        
        return $return;
    }
}

/*
+-------------------------------------+
    Name: color_project_task_status
    Purpose: memberi label warna pada status
    @param return : label warna yang sesuai dengan status
+-------------------------------------+
*/
if ( ! function_exists('color_project_task_status')) {
    function color_project_task_status($status)
    {
        $CI =& get_instance();
        $code_project_task_status = $CI->config->item('code_project_task_status');
        $return = '-';
        
        if ($status == 1)
        {
            $return = '<span class="label bg-green-jungle">'.ucwords($code_project_task_status[$status]).'</span>';
        }
        elseif ($status == 2)
        {
            $return = '<span class="label label-danger">'.ucwords($code_project_task_status[$status]).'</span>';
        }
        
        return $return;
    }
}

/*
+-------------------------------------+
    Name: decode
    Purpose: decode data
    @param return : data yang sudah decoded
+-------------------------------------+
*/
if ( ! function_exists('decode')) {
    function decode($value, $key)
    {
        $CI =& get_instance();
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($value), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }
}

/*
+-------------------------------------+
    Name: encode
    Purpose: encode data
    @param return : data yang sudah encoded
+-------------------------------------+
*/
if ( ! function_exists('encode')) {
    function encode($value, $key)
    {
        $CI =& get_instance();
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $value, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }
}

/*
+-------------------------------------+
    Name: get_company_lists
    Purpose: get company lists
    @param return : company lists atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_company_lists')) {
    function get_company_lists($param)
    {
        $CI =& get_instance();
        $CI->load->model('company_model');
        
        $query = $CI->company_model->lists($param);
        
        if ($query->code == 200)
        {
            return $query->result;
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: get_position_lists
    Purpose: get position lists
    @param return : position lists atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_position_lists')) {
    function get_position_lists($param)
    {
        $CI =& get_instance();
        $CI->load->model('position_model');
        
        $query = $CI->position_model->lists($param);
        
        if ($query->code == 200)
        {
            return $query->result;
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: get_po_name_lists
    Purpose: get po name lists
    @param return : po name lists atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_po_name_lists')) {
    function get_po_name_lists($param)
    {
        $CI =& get_instance();
        $CI->load->model('po_name_model');
        
        $query = $CI->po_name_model->lists($param);
        
        if ($query->code == 200)
        {
            return $query->result;
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: get_user_project_group_lists
    Purpose: get user project group lists
    @param return : user_project_group lists atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_user_project_group_lists')) {
    function get_user_project_group_lists($param)
    {
        $CI =& get_instance();
        $CI->load->model('user_project_group_model');
        
        $query = $CI->user_project_group_model->lists($param);
        
        if ($query->code == 200)
        {
            return $query->result;
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: logging
    Purpose: create logging
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('logging_create')) {
    function logging_create($description)
    {
        $CI =& get_instance();
        $CI->load->model('logging_model');
        
        $param = array();
        $param['id_user'] = $CI->session->userdata('id_user');
        $param['description'] = $description;
        $query = $CI->logging_model->create($param);
        
        if ($query > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: replace_new_line
    Purpose: replace \r\n into HTML tag
    @param return : HTML tag
+-------------------------------------+
*/
if ( ! function_exists('replace_new_line'))
{
    function replace_new_line($param)
    {
        $CI =& get_instance();
		return str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $param);
	}
}

/*
+-------------------------------------+
    Name: save_resize
    Purpose: resize dan save image yang di upload
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('save_resize'))
{
    function save_resize($param, $width)
    {
        $CI =& get_instance();

        // if everything is ok, try to upload file
        if (move_uploaded_file($param["tmp_name"], $param['target_file']))
        {
            if ($param['image_width'] != $width)
            {
                // Resize image
                $config['image_library'] = 'gd2';
                $config['source_image']	= $param['target_file'];
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $width;

                $CI->load->library('image_lib', $config);

                if ( ! $CI->image_lib->resize())
                {
                    return $CI->image_lib->display_errors();
                }
                else
                {
                    return TRUE;
                }
            }
            else
            {
                return TRUE;
            }
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: user_valid
    Purpose: cek ke valid-an data
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('user_valid')) {
    function user_valid($param)
    {
        $CI =& get_instance();
        $CI->load->model('user_model');
        
        $query = $CI->user_model->info(array('username' => $param['username']));
        
        if ($query->num_rows() > 0)
        {
            $check_pass = $query->row()->password;
            $pass = md5($param['password']);
            
            if ($check_pass == $pass)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }
}