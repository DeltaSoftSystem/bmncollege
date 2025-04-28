<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Languageswitcher extends CI_Controller
{
    public function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
    }
 
    function switchlang($language = "") {

		/*$session_user_data = $this->session->userdata('user_data');
        
		$session_user_data['user_data']['site_lang'] = $language;
		$this->session->set_userdata($session_user_data);*/
		$language = ($language != "") ? $language : "marathi";
		$cookie_name = 'site_lang';
		$cookie_value  = $language;		
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        redirect($_SERVER['HTTP_REFERER']);
        
    }
}


