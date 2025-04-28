<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');


		/*$session_user_data = $ci->session->userdata('user_data');
		$siteLang = $session_user_data['site_lang'];
        //echo $siteLang = $ci->session->userdata('site_lang');
		//die();*/
		
		$cookie_name = 'site_lang';

		if(!isset($_COOKIE[$cookie_name])) {
		  //echo "Cookie named '" . $cookie_name . "' is not set!";
		  $siteLang = 'english';
		} else {
		  //echo "Cookie '" . $cookie_name . "' is set!<br>";
		  //echo "Value is: " . $_COOKIE[$cookie_name];
		  $siteLang = $_COOKIE[$cookie_name];
		}
		
		//die();		
        if ($siteLang) {
            $ci->lang->load('message',$siteLang);
        } else {
            $ci->lang->load('message','english');
        }
    }
}
?>