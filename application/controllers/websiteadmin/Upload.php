<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public $activaation_id = "104";
	public $sub_activaation_id = "104_2";
	public $title = "Upload";
	public $tbl_name = "upload";
	public $controller = "websiteadmin/upload";
	public $ctrl_name = "websiteadmin/upload";
 
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('common');
			$this->load->helper('security');
			$this->load->library('email');
			$this->load->helper('url_helper');
			//if session not exist
			
			
			 
		}
	public function index($start=0){ 
	   $data['menu_active_main']  = "info";
	   $data['menu_active_sub_main']  = "info";
	   $data['page_section'] = "info";
   	   $data['class'] = "current";
   	   $data['page_menu_slug'] = $page_slug="";
	   $data['sub_menu_id'] = $data['pageRow']['page_id'];
	   $data['main_menu_id'] = $data['pageRow']['parent_menu'];
	 
		 
		 
		 $error = "";
			if(isset($_POST['mode']) && $_POST['mode']=='edit_content'){ 

				 if($_FILES['main_image']['name']!='') { 
				 
				 }
				 
				
			}
			
		$fun_name = $this->controller.'';
		$data['fun_name'] = $fun_name;
		$data['controller'] = $this->controller;
		$this->load->view('websiteadmin/uplaod_view',$data);
		
	}
	 
	    
	 
}

