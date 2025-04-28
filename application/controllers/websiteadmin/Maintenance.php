<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Maintenance extends CI_Controller
{

    public function __construct()
    {		parent::__construct();
			$this->load->library('session');
			$this->load->model('common');
			$this->load->model('pagemodal');
			$this->load->helper('security');
			$this->load->library('email');
			$this->load->helper('url_helper');
  			 $data['config_maintenance'] = $config_maintenance = (int)$this->configmodal->get('config_maintenance');
	
			if($config_maintenance==0){
				// redirect("home");
				//  exit;
			}
    }

    public function index()
    {
		 
	 
        $data['page_section'] = "maintenance";
	 
		  
 	 
		 $data['config_site_maintenance_message'] = $config_site_maintenance_message = $this->configmodal->get('config_site_maintenance_message');
		 
       
		 
		
		 
        $this->load->view("maintenance", $data);
       
    }

}

?>