<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitebrowse extends CI_Controller {
	 public $controller = "websiteadmin/sitebrowse";
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			 
			$this->load->model('common'); 
			$this->load->helper('security');
			$this->load->library('email');
			$this->load->helper('url_helper');
			//if session not exist
			  $this->common->check_user_session();
		}


	public function index(){
		
		   $this->load->view(  'json');	
	}
	public function check_user_session()
	{ 
	
	}
}

