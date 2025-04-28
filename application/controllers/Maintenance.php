<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Maintenance extends CI_Controller
{

    public function __construct()
    {		  parent::__construct();
		$this->load->library('session');
		$this->load->model('common');
		$this->load->helper('security');
		$this->load->library('email');
		$this->load->helper('url_helper');
		//if session not exist
	 
  			 $data['config_maintenance'] = $config_maintenance = (int)$this->common->get('config_maintenance');
	
			if($config_maintenance==0){
				 redirect("home");
				  exit;
			}
			
			$cookie_name = 'site_lang';
			if (!isset($_COOKIE[$cookie_name])) {
				$lang = 'english';
			} else {
				$lang = $_COOKIE[$cookie_name];
			}
			  $LANGCODE = $lang;
		   
			   $siteLang = $this->common->getLanguageExtOther($LANGCODE);
		  
			$this->common->load_lang($siteLang);
    }

    public function index()
    {
		  
		$resultdata = array();
		$data['config_site_maintenance_message'] = $config_site_maintenance_message = $this->common->get('config_site_maintenance_message');
		// print_r($config_site_maintenance_message);
		  $data['results'] = $config_site_maintenance_message;
		 
		   
		
        $this->load->view("maintenance", $data);
       
    }

}

?>