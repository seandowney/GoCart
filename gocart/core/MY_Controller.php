<?php

class Admin_Controller extends CI_Controller 
{
	var $page_content = array();
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('auth');
		$this->auth->is_logged_in(uri_string());
		
		//load the base language file
		$this->lang->load('admin_common');
		
		$this->page_content['header'] = $this->load->view('admin/header', array(), TRUE);
		$this->page_content['footer'] = $this->load->view('admin/footer', array(), TRUE);
	}
}