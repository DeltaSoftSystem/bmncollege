<?php
defined('BASEPATH') or exit('No direct script access allowed');

 

class Privacy extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('common');
        $this->load->helper('security');
        $this->load->library('email');
        $this->load->helper('url_helper');
        //if session not exist
        $data['config_maintenance'] = $config_maintenance = (int)$this->common->get('config_maintenance');
	
        if($config_maintenance){
             redirect("maintenance");
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
        $param_page = $this->uri->segment(1); // n=1 for controller, n=2 for method, etc
        
        if($param_page=="" ){
            $param_page = "home";
        }
       
        $data['canonical'] = site_url($param_page);

      
      

        $data['commonjson'] =  json_decode( file_get_contents('uploads/jsondata/commonjson.json'),true);
        
        $meta_tags = (isset($data['commonjson']['wti_meta_tags']['privacy']))?$data['commonjson']['wti_meta_tags']['privacy']:'scorpion aromas';
        $data['meta_tags'] = $meta_tags;

       // print_r($data['commonjson']);
        $data['content'] = (isset($data['commonjson']['privacy'][0])) ? $data['commonjson']['privacy'][0]:'';
       
        $data['site_controller'] = "privacy";  
        $this->load->view('privacy',$data);
    }
}