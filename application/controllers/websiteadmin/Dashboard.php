<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
 //   public $db;
    public $title = "Dashboard";
    public $controller = "websiteadmin/dashboard";
	public $m_act = 0;
 
 

    public function __construct()
    {
        parent::__construct();
      
        $this->load->model('common');

       $this->common->check_user_session();

    }

    public function index()
    {
      //  print_r($this->session->all_userdata());
        

        $data['activaation_id'] = 1;
        $data['sub_activaation_id'] = '1';
        $data['title'] = 'Dashboard';

        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';

        $session_user_data = $this->session->userdata('user_data');
        $uid = $session_user_data['user_id'];
        $data['user_id'] = $uid;
       //  $data['wti_m_prod_category'] = json_decode(file_get_contents('../uploads/jsondata/wti_m_prod_category.json'), true);
      //  $data['wti_m_products'] = json_decode(file_get_contents('../uploads/jsondata/wti_m_products.json'), true);
     //   $data['wti_m_testimonial'] = json_decode(file_get_contents('../uploads/jsondata/wti_m_testimonial.json'), true);
        
        // $sql = "select count('') as total from  wti_m_category c where     parent_id=0   ";
        // $query = $this->db->query($sql);
        // $wti_m_products = $query->row_array();
        // $data['wti_m_products'] = $wti_m_products['total'];

         $sql = "select count('') as total from  wti_t_contactus c where     delete_status=0   ";
         $query = $this->db->query($sql);
         $wti_t_contactus_data = $query->row_array();
         $data['wti_t_contactus'] = $wti_t_contactus_data['total'];

         $sql = "select count('') as total from  wti_t_admission_enquiry c where     delete_status=0   ";
         $query = $this->db->query($sql);
         $wti_t_admission_enquiry = $query->row_array();
         $data['wti_t_admission_enquiry'] = $wti_t_admission_enquiry['total'];


        $sql = "select count('')  as total  from wti_t_newsblogs b where   b.delete_status=0  order by  b.newsblogs_id desc ";
        $query = $this->db->query($sql);
        $wti_t_newsblogs = $query->row_array();
        $data['wti_t_newsblogs'] = $wti_t_newsblogs['total'];

        $sql = "select count('')  as total  from wti_m_events b where   b.delete_status=0  order by  b.newsblogs_id desc ";
        $query = $this->db->query($sql);
        $wti_m_events = $query->row_array();
        $data['wti_m_events'] = $wti_m_events['total'];

        
        $sql = "select count('')  as total  from wti_m_notice b where   b.delete_status=0  order by  b.newsblogs_id desc ";
        $query = $this->db->query($sql);
        $wti_m_notice = $query->row_array();
        $data['wti_m_notice'] = $wti_m_notice['total'];

        $limit_qry = "limit  0,5";
        $wti_t_contactus_resultdata = array();
        $sql = "select * from  wti_t_contactus c      where     delete_status=0 order by id desc ".$limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $wti_t_contactus_resultdata = $query->result_array();
        }
        $data['wti_t_contactus_resultdata'] = $wti_t_contactus_resultdata;

        $wti_t_admission_enquiry_resultdata = array();
        $sql = "select * from  wti_t_admission_enquiry c      where     delete_status=0 order by id desc ".$limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $wti_t_admission_enquiry_resultdata = $query->result_array();
        }
        $data['wti_t_admission_enquiry_resultdata'] = $wti_t_admission_enquiry_resultdata;



        $sql = "select b.newsblogs_id,b.uuid, b.newsblogs_cat_id, b.status_flag,b.add_date,b.event_dates,b.sort_no,b.blogger_name, heading   from
        wti_t_newsblogs b
       where   b.delete_status=0  order by  b.newsblogs_id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['wti_t_newsblogs_list'] = $resultdata;
        
        $resultdata = array();
        $sql = "select *    from    wti_m_notice b   where   b.delete_status=0  order by  b.newsblogs_id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['wti_m_notice_list'] = $resultdata;
         

        $resultdata = array();
        $sql = "select *    from
        wti_m_events b
		   	where   b.delete_status=0  order by  b.newsblogs_id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['wti_m_events_list'] = $resultdata;


        $this->load->view('websiteadmin/dashboard', $data);

    }

    public function logout()
    {
        $newdata = array(
            'user_id' => '',
            'first_name' => '',
            'last_name' => '',
            'user_type' => '',
            'username' => '',
            'user_email' => '',
            'logged_in' => false,
        );
        $this->session->unset_userdata('user_data');
        $this->session->sess_destroy();
       // print_r($this->session->all_userdata());
        redirect(base_url('websiteadmin/home'));

        // echo 'You are logged out';
    }
}
