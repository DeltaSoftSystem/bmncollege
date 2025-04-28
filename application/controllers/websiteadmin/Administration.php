<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * News
 *
 * @package webtreeindia
 * @subpackage Manage Notice
 * @category Notice
 * @version    1.0
 * @created    17/06/2022
 */
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Administration extends CI_Controller
{
    //   public $db;
    public $title = "Notice";
    public $controller = "websiteadmin/administration";
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->model('common');
      
        $this->db = $this->load->database('default', true);
        $this->common->check_user_session();

    }
    public function index()
    {

        $this->listall();
    }

    public function listall($start = 0, $otherparam = "")
    {

         

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 1013111;
        $data['sub_activaation_id'] = '1947';
        $data['title'] = 'Staff';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/listall';
        $data['fun_name'] = $fun_name;
        $data['add_link'] =  $this->controller . '/adddata';
        $data['edit_link'] =  $this->controller . '/editdata';
        
        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $data['sub_heading'] = 'List';

        $search_qry = " WHERE   status_flag!='Delete' and user_email!='wti@wti.com'  order by add_date desc ";

        $data['results'] = $this->common->getRecordsLimit('wti_m_user', $search_qry, 0, 0);
        $data['num_row'] = $this->common->getRecordsCount('wti_m_user', $search_qry);
       
        $fun_name = $this->controller . '/listall';
        $data['fun_name'] = $fun_name;
        $data['controller'] = $this->controller;

        $this->load->view('websiteadmin/administration_listall', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

     

    public function editdata($id = '')
    {

       
        $session_user_data = $this->session->userdata('user_data');
        $data['controller'] = $this->controller;
        $data['activaation_id'] = 10131111;
        $data['sub_activaation_id'] = '1947';
        $data['title'] = 'Admin Staff';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Admin Staff" : 'Add Admin Staff';
        $data['back_link'] =  $this->controller . '/listall';
        $data['fun_name'] = 'editdata/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content_password") {
            $login_password = $this->common->mysql_safe_string($_POST['login_password']);
            $email = $this->common->mysql_safe_string($_POST['email']);
            if ($login_password == '') {$error .= "Please enter password<br>";}
            if ($error=='') {
                $passphrase = $login_password;
                 $array = array(
                   'user_pass' => $passphrase,
               );
               $this->db->where('uuid', $id); 
               //die();
                $this->db->update('wti_m_user', $array);
                $this->session->set_flashdata('success', 'Information updated succssfully..');
                redirect($this->controller.'/listall');
           }
        }
        if (isset($_POST['mode']) && $_POST['mode'] == "submitform") {

            $add_in = array();
            $add_in['firstname'] = $first_name = (isset($_POST['first_name'])) ? $this->common->mysql_safe_string($_POST['first_name']) : '';
            $add_in['lastname'] = $last_name = (isset($_POST['last_name'])) ? $this->common->mysql_safe_string($_POST['last_name']) : '';
            $add_in['user_email'] = $email = (isset($_POST['email'])) ? $this->common->mysql_safe_string($_POST['email']) : '';
            $add_in['status_flag'] = $user_status = (isset($_POST['user_status'])) ? $this->common->mysql_safe_string($_POST['user_status']) : '';
            $email_old = $this->common->mysql_safe_string($_POST['email_old']);
            if ($first_name == '') {
                $error .= "Please enter first name<br>";
            }
            if ($last_name == '') {
                $error .= "Please select last name<br>";
            }
            if ($email == '') {
                $error .= "Please email<br>";
            }
            
            if ($user_status == '') {
                $error .= "Please select status<br>";
            }
            if ($email_old != $email) {
                $chkUserInfo = $this->common->getSingleInfoBy("wti_m_user", 'user_email', $email);
                if (sizeof($chkUserInfo) > 0) {
                    $error = "Email address is already registered";
                }
            }

            if ($error == '') {
                
                
                $add_in['edit_date'] = date("Y-m-d H:is:");
                $this->db->where('uuid', $id);
                $this->db->update('wti_m_user', $add_in);

                $this->session->set_flashdata('success', 'Information updated succssfully!');
                redirect($this->controller . '/listall');
            } else {
                $this->session->set_flashdata('error', $error);
            }

            $data_info = $_POST;
        } else {
            $data_info = $this->common->getSingleInfoBy('wti_m_user', 'uuid', $id);
        }

        //print_r($data_info);
        if (sizeof($data_info) == 0) {
            $newdata = array('warning' => 'Please select user!');
            $this->session->set_flashdata($newdata);
            redirect($this->controller . '/listall');
        }
        $data['records'] = $data_info;
        $this->load->view('websiteadmin/administration_editdata', $data);

        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function profile()
    {

        $session_user_data = $this->session->userdata('user_data');

        $id = $session_user_data['uuid'];

        $data['activaation_id'] = 1947;
        $data['sub_activaation_id'] = '1947';
        $data['title'] = 'Profile';
        $data['sub_heading'] = 'Edit';
        $data['id'] = "";
        $data['controller'] = $this->controller;
        $data['fun'] = "profile";
        $data['back_link'] =  $this->controller . '/listall';
        $data['fun_name'] = 'profile';
        $error = '';
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content_password") {
            $login_password = $this->common->mysql_safe_string($_POST['login_password']);
            $email = $this->common->mysql_safe_string($_POST['email']);
            if ($login_password == '') {$error .= "Please enter password<br>";}
            if ($error == '') {
                $passphrase = $login_password;
                $array = array(
                    'user_pass' => $passphrase,
                );

                $this->db->where('uuid', $id);
                $this->db->update('wti_m_user', $array);
                $this->session->set_flashdata('success', 'Information updated succssfully..');
                redirect($this->controller . '/' . $data['fun']);
                exit;
            }
        }
        if (isset($_POST['mode']) && $_POST['mode'] == "submitform") {

            $add_in = array();
            $add_in['firstname'] = $first_name = (isset($_POST['first_name'])) ? $this->common->mysql_safe_string($_POST['first_name']) : '';
            $add_in['lastname'] = $last_name = (isset($_POST['last_name'])) ? $this->common->mysql_safe_string($_POST['last_name']) : '';
            $add_in['user_email'] = $email = (isset($_POST['email'])) ? $this->common->mysql_safe_string($_POST['email']) : '';
            $add_in['mobile'] = $mobile = (isset($_POST['mobile'])) ? $this->common->mysql_safe_string($_POST['mobile']) : '';
            $add_in['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : '2';
            $email_old = $this->common->mysql_safe_string($_POST['email_old']);
            if ($first_name == '') {
                $error .= "Please enter first name<br>";
            }
            if ($last_name == '') {
                $error .= "Please select last name<br>";
            }
            if ($email == '') {
                $error .= "Please email<br>";
            }
            if ($mobile == '') {
             //   $error .= "Please enter mobile<br>";
            }
            if ($status_flag == '') {
                $error .= "Please select status<br>";
            }
            if ($email_old != $email) {
                $chkUserInfo = $this->common->getSingleInfoBy("wti_m_user", 'user_email', $email);
                if (sizeof($chkUserInfo) > 0) {
                    $error = "Email address is already registered";
                }
            }

            if ($error == '') {

                $add_in['edit_date'] = date("Y-m-d h:i:s");
                $this->db->where('uuid', $id);
                $this->db->update('wti_m_user', $add_in);

                $session_data = $this->session->userdata('user_data');

                $session_data['first_name'] = $add_in['firstname'];
                $session_data['last_name'] = $add_in['lastname'];
                $this->session->set_userdata('wti_m_user', $session_data);

                $this->session->set_flashdata('success', 'Information updated succssfully!');
                redirect($this->controller . '/' . $data['fun']);
                exit;
            } else {
                $this->session->set_flashdata('error', $error);
            }

            $data_info = $_POST;
        } else {
            $data_info = $this->common->getSingleInfoBy('wti_m_user', 'uuid', $id);
        }

        // print_r($data_info);
        if (sizeof($data_info) == 0) {
            $newdata = array('warning' => 'Please select user!');
            $this->session->set_flashdata($newdata);
            redirect($this->controller);
        }
        $data['records'] = $data_info;

        $this->load->view('websiteadmin/administration_editdata', $data);

        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function adddata()
    {

        $session_user_data = $this->session->userdata('user_data');
        $data['controller'] = $this->controller;
        $data['activaation_id'] = 1013;
        $data['sub_activaation_id'] = '1947';
        $data['title'] = 'Admin Staff';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Admin Staff" : 'Add Admin Staff';
        $data['back_link'] =  $this->controller . '/listall';
        $data['fun_name'] = 'adddata' ;
        $data['controller'] = $this->controller;

        $error = '';

        if (isset($_POST['mode']) && $_POST['mode'] == "submitform") {

            $add_in = array();
            $add_in['firstname'] = $first_name = (isset($_POST['first_name'])) ? $this->common->mysql_safe_string($_POST['first_name']) : '';
            $add_in['lastname'] = $last_name = (isset($_POST['last_name'])) ? $this->common->mysql_safe_string($_POST['last_name']) : '';
          $add_in['user_name'] =  $add_in['user_email'] = $email = (isset($_POST['email'])) ? $this->common->mysql_safe_string($_POST['email']) : '';
            $add_in['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';


            $add_in['user_pass'] =  $password = $this->common->mysql_safe_string($_POST['password']);

            if ($first_name == '') {
                $error .= "Please enter first name<br>";
            }
            if ($last_name == '') {
                $error .= "Please enter last name<br>";
            }
            if ($email == '') {
                $error .= "Please enter email<br>";
            }
           
           
            if ($password == '') {
                $error .= "Please enter password<br>";
            }
            
            $chkUserInfo = $this->common->getSingleInfoBy("wti_m_user", 'user_email', $email);
            if (sizeof($chkUserInfo) > 0) {
                $error = "Email address is already registered";
            }

            if ($error == '') {
                $uuid = "";
                try {

                    // Generate a version 4 (random) UUID object
                    $uuid4 = Uuid::uuid4();
                    $uuid = $uuid4->toString();

                } catch (UnsatisfiedDependencyException $e) {
                    //  echo 'Caught exception: ' . $e->getMessage() . "\n";
                }
                
                $add_in['uuid'] = $uuid;
                $add_in['roles'] = 'A';
                $add_in['add_date'] = date("Y-m-d");
                $this->db->insert('wti_m_user', $add_in);
                $this->session->set_flashdata('success', 'Information added succssfully!');
                redirect($this->controller . '/listall');
            } else {
                $this->session->set_flashdata('error', $error);
            }
        }

        $data_info = (isset($_POST)) ? $_POST : '';
        $data['records'] = $data_info;
        $this->load->view('websiteadmin/administration_adddata', $data);

        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data($id = '')
    {

       
        $chkUserInfo = $this->common->getSingleInfoBy("wti_m_user", 'uuid', $id);

        if (sizeof($chkUserInfo) > 0) {
            $sql = "update wti_m_user set status_flag='Delete'   where uuid='" . $id . "' ";
            $this->db->query($sql);
           
            $this->session->set_flashdata('success', 'Deleted succssfully..');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/listall', 'refresh');
    }
}
