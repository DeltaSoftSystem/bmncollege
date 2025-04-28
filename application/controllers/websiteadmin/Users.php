<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
 
 
class Users extends CI_Controller
{
    public $title = "Master";
    public $controller = "websiteadmin/users";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('common');
        $this->load->helper('security');
        $this->load->library('email');
        $this->load->helper('url_helper');
        $this->db = $this->load->database('default', true);
        $this->common->check_user_session();
    }

    public function index()
    {
        
    }
 
    public function restaurantuser()
    { 
 
        $session_user_data = $this->session->userdata('user_data');
        $data['listfun'] = 'restaurantuser';
        $data['activaation_id'] = 300;
        $data['sub_activaation_id'] = '300_1';
        $data['title'] = 'Blogs';
       
        $data['sub_heading'] =  'User List';
        
        $data['fun_name'] = 'restaurantuser/';
        $data['controller'] = $this->controller;

        $error = '';
        $this->load->view('websiteadmin/users_restaurantuser',$data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');   
    }   
   
  
}