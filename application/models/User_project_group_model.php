<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_project_group_model extends CI_Model
{
    var $page = 'user_project_group';
    
    function __construct()
    {
        parent::__construct();
		$this->key = array('api_key' => $this->config->item('api_key'));
    }
    
    function create($params)
    {
        $result = null;
		$url = API_HOST . $this->page . '/create';
		$params = array_merge($params, $this->key);
		$result = $this->rest->post($url, $params);
		return $result;
    }
    
    function delete($params)
    {
        $result = null;
		$url = API_HOST . $this->page . '/delete';
		$params = array_merge($params, $this->key);
		$result = $this->rest->post($url, $params);
		return $result;
    }
    
    function info($params)
    {
		$result = null;
		$url = API_HOST . $this->page . '/info';
		$params = array_merge($params, $this->key);
		$result = $this->rest->get($url, $params);
		return $result;
    }
    
    function lists($params)
    {
		$result = null;
		$url = API_HOST . $this->page . '/lists';
		$params = array_merge($params, $this->key);
		$result = $this->rest->get($url, $params);
		return $result;
    }
    
    function update($params)
    {
        $result = null;
		$url = API_HOST . $this->page . '/update';
		$params = array_merge($params, $this->key);
		$result = $this->rest->post($url, $params);
		return $result;
    }
}