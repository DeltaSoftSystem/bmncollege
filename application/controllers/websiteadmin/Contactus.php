<?php
defined('BASEPATH') or exit('No direct script access allowed');
 

class Contactus extends CI_Controller
{
    //   public $db;
    public $title = "Contact us enquiry";
    public $controller = "websiteadmin/contactus";
    public $m_act = 0;

    public function __construct()
    {parent::__construct();
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->model('common');
        $this->db = $this->load->database('default', true);
        $this->common->check_user_session();

    }

    public function index()
    {
        //list
        $this->listall();
    }
    public function listall($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 11105;
        $data['sub_activaation_id'] = '1105_1';
        $data['title'] = $this->title;
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/listall';
        $data['fun_name'] = $fun_name;
        $data['controller'] = $this->controller;
        $data['download_link'] = $this->controller . '/download';
        $limit_qry = " LIMIT ".$start.",".$maxm;
         
        $data['other_para'] = "";  


        $resultdata = array();
        $sql = "select * from  wti_t_contactus c      where     delete_status=0 order by id desc ".$limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        
        $resultdata = array();
        $sql = "select count('')  as numrows  from wti_t_contactus c      where     delete_status=0 order by id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows'] ;//= $this->common->numRow($this->tablename,$where_cond);
         
        
        $this->load->view('websiteadmin/contactus_list', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function download(){
		
        $csv_name = 'admission_enquiry-'.time();

        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename='.$csv_name.'.csv');  
        $output = fopen("php://output", "w");  
      
         
                
        // $date_range = (isset($_GET['date_range'])) ? $this->input->get('date_range') : '';
         
          
           
                
            // $date_range_exp = explode(" - ", $date_range);
            // //    print_r($date_range_exp);
            // $date_range_exp[0] = $this->common->getDateFormat(trim($date_range_exp[0]), "Y-m-d");
            // $date_range_exp[1] = $this->common->getDateFormat(trim($date_range_exp[1]), "Y-m-d");
        

                fputcsv($output, array('Date', 'Full_Name', 'Contact_Number','Email','Subject','Message'));

             $sql_sub = "";   
              //  $sql_sub = " and  (DATE_FORMAT(m.datum,'%Y-%m-%d')   BETWEEN '" . $date_range_exp[0] . "' AND '" . $date_range_exp[1] . "') ";
                $sql = "select  add_date,contact_fname,contact_phone,contact_email,contact_subject ,contact_message from  wti_t_contactus m    where     delete_status=0 order by id desc";
                    $query = $this->db->query($sql);
            
            
           foreach($query->result_array() as $key => $row){
                $row['Regel1'] = $key+1;
               fputcsv($output, $row);
           }
       fclose($output);		 
  }
    public function editdata($id = 0)
    {

        $session_user_data = $this->session->userdata('user_data');
       

        $data['activaation_id'] = 1105;
        $data['sub_activaation_id'] = '1105_2';
        $data['title'] = $this->title;
        $data['sub_heading'] = 'Edit ' . $this->title;
        $data['id'] = $id;
        $data['fun_name'] = "editdata/" . $id;
        $data['controller'] = $this->controller;
 
        $data['back_link'] = $this->controller . '/listall';
      

        $data_info = array();
        $error = '';
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

             $add_in['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : '2';
             $add_in['edit_date'] = date("Y-m-d H:i:s");
            
            if ($error == '') {

                $where_edt = "id = '{$id}'";
                
                $update_status = $this->common->updateRecord('wti_t_contactus', $add_in, $where_edt);
               // echo $this->db->last_query();exit;
                $newdata = array('success' => 'Infomation updated successfully!');

                //$this->session->set_userdata($newdata);
                $this->session->set_flashdata('success_msg', 'Infomation updated successfully!');
                 redirect($this->controller . "/listall");
            } else {
                $this->session->set_flashdata('error', $error);
            }

        }

        $data_info = array();
        if ($id != "") {
            $sql = "select  * from wti_t_contactus ftm where id='" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;

            }
        }

        if (sizeof($data_info) == 0) {
            $newdata = array('warning' => 'Please select data ');
            $this->session->set_flashdata($newdata);
            redirect($this->controller . "/listall");
        }

        $this->load->view('websiteadmin/contactus_adddata', $data);

        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');

    }

    public function delete_data($id = 0)
    {

        
        $sql = "select  id from  wti_t_contactus where id='" . $id . "'  ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {

            $sql = "update wti_t_contactus  set  delete_status=1  where id='" . $id . "'";
            $this->db->query($sql);

            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'Oh! It is not safe to delete');
        }

        redirect($this->controller . '/listall');
    }
    
    
}
