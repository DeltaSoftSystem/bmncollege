<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Metatags extends CI_Controller
{
    //   public $db;
    public $title = "Metatags";
    public $controller = "websiteadmin/metatags";
    public $m_act = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->model('common');
        $this->load->model('services');
        $this->load->model('common');
        $this->db = $this->load->database('default', true);
        $this->common->check_user_session();

    }

    public function index()
    {
        
        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 1102;
        $data['sub_activaation_id'] = '1102_1';
        $data['title'] = $this->title;
        
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'Metatags List';
        $fun_name = '';
        $data['fun_name'] = $fun_name;
        $data['controller'] = $this->controller;

        $resultdata = array();
        $sql = "select * from  meta_tags c            order by id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        //     $sql = "select count('')  as numrows  from testimonial c      where cate_type='blog'  and delete_status=0 ";
        //    $query = $this->db->query($sql);
        //     $resultdata = $query->row_array();

        //$data['num_row'] = $resultdata['numrows'] ;//= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/mtetatags_list', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
   
    public function editdata($id = 0)
    {

        $session_user_data = $this->session->userdata('user_data');
        

        $data['activaation_id'] = 1102;
        $data['sub_activaation_id'] = '1102_1';
        $data['title'] = 'Metatags';
        $data['sub_heading'] = 'Edit';
        $data['id'] = $id;
        $data['fun_name'] = "editdata/" . $id;
        $data['controller'] = $this->controller;
        $data_info = array();
        $error = '';
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

      
            $add_in['meta_keywords'] = $meta_keywords = (isset($_POST['meta_keywords'])) ? $this->common->mysql_safe_string($_POST['meta_keywords']) : '';
            $add_in['meta_title'] = $meta_title = (isset($_POST['meta_title'])) ? $this->common->mysql_safe_string($_POST['meta_title']) : '';
            $add_in['meta_descriptions'] = $meta_descriptions = (isset($_POST['meta_descriptions'])) ? $this->common->mysql_safe_string($_POST['meta_descriptions']) : '';
           
            $where = "id = '" . $id . "'";
            $update_status = $this->common->updateRecord('meta_tags', $add_in, $where);
            $this->session->set_flashdata('success', 'Information updated successfully.');
            redirect($this->controller . '');

        }

        $data_info = array();
        if ($id != "") {
            $sql = "select  * from meta_tags ftm where id='" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
               
            }
        }

        if (sizeof($data_info) == 0) {
            $newdata = array('warning' => 'Please select page ');
            $this->session->set_flashdata($newdata);
            redirect($this->controller . "");
        }

        $this->load->view('websiteadmin/mtetatags_adddata', $data);

        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');

    }

   
}
