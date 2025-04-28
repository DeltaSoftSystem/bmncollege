<?php
defined('BASEPATH') or exit('No direct script access allowed');
class News extends CI_Controller
{
    public $controller = "news";
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
      
             if ($config_maintenance) {
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
    public function index($year='')
    {

         $param_page = $this->uri->segment(3); // n=1 for controller, n=2 for method, edit_content
      
     
      
       // $data['commonjson'] =  json_decode( file_get_contents('uploads/jsondata/commonjson.json'),true);

        if($param_page=="" ){
            $param_page = "news";
        }
      
        $meta_tags = $this->common->getMetaTags($param_page);
        $data['canonical'] = site_url($param_page);
        $data['meta_tags'] = $meta_tags; 
      //  echo "<br>" .
         $param_page1 = $this->uri->segment(1); // n=1 for controller, n=2 for method, etc
       // echo "<br>" .
       $param_page2 = $this->uri->segment(2); // n=1 for controller, n=2 for method, etc
        //  echo "<br>".$param_page3 = $this->uri->segment(3); // n=1 for controller, n=2 for method, etc
        $data['meta_title'] = 'modavar';
        $data['title'] = 'modavar';
  
 
         $sql = " select  b.event_dates  from	wti_t_newsblogs b  	where  ( b.delete_status=0 or b.delete_status is NULL)  and b.status_flag=1  order by    b.event_dates desc   ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata_date = $query->result_array();
        }
        $yearData = [];
        foreach($resultdata_date as $key => $value){
            $yearData[$this->common->getDateFormat($value['event_dates'], 'Y')]= $this->common->getDateFormat($value['event_dates'], 'Y');
        }
      
        $data['yearData'] = $yearData;
    
   

        $resultdata = array();
        $sql_sub = "";
        if ($param_page2 != "") { 
           // $sql_sub = " and c.slug_name like '$param_page2'";
           $sql_sub =  " and b.event_dates like '$param_page2%'";
        }  else {
           
             reset($yearData);
            $param_page2 = key($yearData);

          //  $param_page2 = array_key_first($yearData);
 
    
          //  $param_page2 = (!empty($yearData[0])) ? $yearData[0] : '';
             $sql_sub =  " and b.event_dates like '$param_page2%'";
        }
        
           
            
        $keyword = (isset($_GET['keyword'])) ? $this->common->mysql_safe_string($_GET['keyword']) : ''; 
        
        
        if ($keyword != "") {
            $keyword_temp = explode(" ",$keyword);
              if(sizeof($keyword_temp)>1) {
                  $sql_sub1 = " and ( 1=2 ";
                  $sql_sub2 = "  )";
                foreach($keyword_temp as $key => $value){
                    $sql_sub .= " or  b.heading like '%".$value."%' or b.descriptions like '%".$value."%' or  c.cate_name like '%".$value."%'"; 
                }
                $sql_sub = $sql_sub1 . $sql_sub. $sql_sub2;
              } else{
            $sql_sub = " and ( bd.heading like '%".$keyword."%' or bd.descriptions like '%".$keyword."%' or  c.cate_name like '%".$keyword."%')";
              }
        } 
       
            $sql = " select b.featured_image,b.blogger_name,b.slug_name, b.newsblogs_id,b.uuid, b.newsblogs_cat_id, b.status_flag,b.add_date,b.sort_no ,b.heading,b.descriptions ,b.event_dates  from	wti_t_newsblogs b  	where  ( b.delete_status=0 or b.delete_status is NULL)  and b.status_flag=1 " . $sql_sub . " order by    b.event_dates desc , b.newsblogs_id desc  ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['blogresults'] = $resultdata;

      
         
      //  print_r($yearData);

    //    $where_cond = "where delete_status=0  and status_flag=1 ORDER BY sort_no  ";
    //    $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);


    //    $where_cond = "where delete_status=0  and status_flag=1 ORDER BY sort_no  ";
     //   $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);


        $this->load->view("news", $data);
    }

    public function detail($slug_name="")
    {
 
     //   $data['commonjson'] =  json_decode( file_get_contents('uploads/jsondata/commonjson.json'),true);

      //  echo "<br>" . $param_page1 = $this->uri->segment(1); // n=1 for controller, n=2 for method, etc
        //echo "<br>" .
         $param_page2 = $this->uri->segment(2); // n=1 for controller, n=2 for method, etc
        //echo "<br>" . $param_page3 = $this->uri->segment(3); // n=1 for controller, n=2 for method, etc
        $data['meta_title'] = 'cetbiz';
        $data['title'] = 'cetbiz';
        $sql_sub = "";
        if ($param_page2 != "") {
            $sql_sub = " and b.slug_name like '$param_page2'";
        }  
        $resultdata = array();
        $sql = "select b.featured_image,b.blogger_name,b.slug_name, b.newsblogs_id,b.uuid, b.newsblogs_cat_id, b.status_flag,b.add_date,b.sort_no ,b.heading,b.descriptions,b.tags,b.meta_keywords,b.meta_description,b.event_dates  from
        wti_t_newsblogs b   
		   	where   ( b.delete_status=0 or b.delete_status is NULL)  and b.status_flag=1  ".$sql_sub;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->row_array();
        }
        $data['blogresults'] = $resultdata;
        
         
        $data['canonical'] = site_url($param_page2);
        $meta_tags = array('meta_title'=>$data['blogresults']['heading'],'meta_keywords'=>$data['blogresults']['meta_keywords'],'meta_description'=>$data['blogresults']['meta_description']);
        $data['meta_tags'] = $meta_tags; 
        
        $this->load->view("news-detail", $data);
    }
}
