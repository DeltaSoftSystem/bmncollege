<?php
defined('BASEPATH') or exit('No direct script access allowed');

 

class Product extends CI_Controller
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
    }
    public function index($slug_name="")
    {
         $param_page = $this->uri->segment(1); // n=1 for controller, n=2 for method, etc
         $param_page2 = $this->uri->segment(2); // n=1 for controller, n=2 for method, etc
        if($param_page=="" ){
            $param_page = "home";
        }
       
        $data['canonical'] = site_url($param_page);
 

        $wti_m_prod_category_all =  json_decode( file_get_contents('uploads/jsondata/wti_m_prod_category.json'),true);
        $wti_m_products_all =  json_decode( file_get_contents('uploads/jsondata/wti_m_products.json'),true);
        $wti_m_products = [];
        $wti_m_prod_category = [];
      //  print_r($wti_m_products_all);
            foreach($wti_m_prod_category_all as $key => $pcate){
                if($pcate['slug_name'] == $param_page2 ){
                 if(isset($wti_m_products_all[$pcate['id']])){
                   $wti_m_products = $wti_m_products_all[$pcate['id']];
                }
                   $wti_m_prod_category = $pcate;
                }
            }
      
        $data['wti_m_prod_category'] = $wti_m_prod_category;
         $data['wti_m_products'] = $wti_m_products;
        //print_r($wti_m_prod_category);
        $data['commonjson'] =  json_decode( file_get_contents('uploads/jsondata/commonjson.json'),true);
       // print_r($data['commonjson']);
       $meta_tags_default = (isset($data['commonjson']['wti_meta_tags']['home']))?$data['commonjson']['wti_meta_tags']['home']:'scorpion aromas';

        $meta_tags['meta_description'] = (isset($wti_m_prod_category['meta_description']))?$wti_m_prod_category['meta_description']:$meta_tags_default['meta_description'];
        $meta_tags['meta_title'] = (isset($wti_m_prod_category['meta_title']))?$wti_m_prod_category['meta_title']:$meta_tags_default['meta_title'];
        $meta_tags['meta_keywords'] = (isset($wti_m_prod_category['meta_keywords']))?$wti_m_prod_category['meta_keywords']:$meta_tags_default['meta_keywords'];

        $data['meta_tags'] = $meta_tags;
       
        $data['site_controller'] = "product";  
        $this->load->view('product',$data);
    }

    public function productinfo()
    {
        $add_in['prod_id'] = $prod_id = (isset($_POST['prod_id'])) ? $this->common->mysql_safe_string($_POST['prod_id']) : '0';
        $add_in['cat_id'] = $cat_id = (isset($_POST['cat_id'])) ? $this->common->mysql_safe_string($_POST['cat_id']) : '';

        $wti_m_products_all =  json_decode( file_get_contents('uploads/jsondata/wti_m_products.json'),true);
       
        $wti_m_products = (isset($wti_m_products_all[$cat_id][$prod_id])) ? $wti_m_products_all[$cat_id][$prod_id] : [];
        $ret = [];
        if(sizeof($wti_m_products) > 0){
            $ret['status'] = 1;
            $ret['data'] = $wti_m_products;
        } else {
            $ret['status'] = 0;
            $ret['data'] = "No data found";
        }
        echo $this->common->jsonencode($ret);
        die();
    }
}