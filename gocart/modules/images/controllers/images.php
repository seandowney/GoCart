<?php
class Images extends Front_Controller
{
	function __construct()
	{
		log_message('debug', 'IMAGES: Constructor - Before');
		parent::__construct();
		log_message('debug', 'IMAGES: Constructor - After');

		log_message('debug', 'IMAGES: Load Model');
		$this->load->model('images/images_model');
		log_message('debug', 'IMAGES: Load Model - After');

	}
		
	function index()
	{
	}
	
	function banners()
	{
		log_message('debug', 'IMAGES: Get Homepage Banners');
		$data['banners'] = $this->images_model->get_homepage_banners(5);
		log_message('debug', 'IMAGES: Get Homepage Banners - After');
		
		$this->load->view('images/banners');
	}
}