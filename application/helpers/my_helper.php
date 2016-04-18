<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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