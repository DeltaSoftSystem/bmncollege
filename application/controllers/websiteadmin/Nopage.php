<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nopage extends CI_Controller {
	public $activaation_id = "907";
	public $sub_activaation_id = "907_1";
	public $title = "Nopage List";
	public $tbl_name = "nopage";
	public $controller = "websiteadmin/nopage";
	public $ctrl_name = "websiteadmin/nopage";
	
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('common');
			$this->load->helper('security');
			$this->load->library('email');
			$this->load->helper('url_helper');
			//if session not exist
			 $this->ctrl_name='nopage';

			 $data['config_maintenance'] = $config_maintenance = (int)$this->configmodal->get('config_maintenance');
	
			if($config_maintenance){
				 redirect("maintenance");
				  exit;
			}
		}


	public function index(){
			$data['page_section'] = "nopage";
		$data['class'] 		  = "current";
		$data['sub_menu_id']  = 2;
		$data['main_menu_id'] = 2;
		$data['site_controller'] = $this->controller;
	 	 
		$this->load->view('websiteadmin/404',$data);
	}
}