<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summernote extends CI_Controller {
	 public $controller = "websiteadmin/summernote";
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
	public function upload_image(){
		//print_r($_FILES);
		    if ($_FILES['files']['name']) {
        if (!$_FILES['files']['error']) {
            $name = md5(rand(100, 200));
            $ext = explode('.', $_FILES['files']['name']);
            $filename = $name . '.' . $ext[1];
            $destination = DIR_WS_UPLOAD .'/uploads/summernote/' . $filename; //change this directory
            $location = $_FILES["files"]["tmp_name"];
            move_uploaded_file($location, $destination);
            echo SITE_BASE_URL .'/uploads/summernote/' . $filename;//change this URL
        }
        else
        {
            echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
        }
    }
	} 
}

