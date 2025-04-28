<?php
defined('BASEPATH') or exit('No direct script access allowed');
//use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
//use Ramsey\Uuid\Uuid;

class Home extends CI_Controller
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
			$this->load->helper('url_helper');
			//if session not exist

    }
    public function index()
    {
      //  die("111");

        $session_user_data = $this->session->userdata('user_data');
        if (isset($session_user_data['logged_in']) && $session_user_data['logged_in']) {

            redirect('websiteadmin/dashboard', 'refresh');
            exit;
        }
        $data['title'] = 'Login';
        $data['error_msg'] = '';
        //$session_user_data = $this->session->userdata('admin_data');

        $error_msg = '';
        if ($this->input->post()) {
            $username =  (isset($_POST['username'])) ? $this->common->mysql_safe_string($_POST['username']) : '';//$this->input->post('username');
            $password = (isset($_POST['password'])) ? $this->common->mysql_safe_string($_POST['password']) : '';//$this->input->post('password');

            // $password = md5($password);

            $sql = "select * from wti_m_user where user_name='" . $username . "' and user_pass='" . $password . "'";

            $query = $this->db->query($sql);

            if ($query->num_rows() > 0) {
                $result = $query->row_array();
                //  and status='A'
                if ($result['status_flag'] == "Active") {
                  
                 
                    $ip_address = $this->common->get_ip();
                    $login_time = date("Y-m-d H:i:s");

                    $array = array(
                        
                        'ip_address' => $ip_address,
                        'lastlogin_date' => $login_time, 
                    );

                    $this->db->where('user_name', $username);
                    $this->db->where('user_pass', $password);
                    $this->db->update('wti_m_user', $array);

                    //$code = base64_encode($unique_logincode."##".$ip_address);
                    //    $this->session->sess_destroy();
                    $this->session->sess_regenerate(true);

                    $this->session->set_userdata(array('user_data' => array()));

                    $ar_session_data['user_data'] = $result;
                    $ar_session_data['user_data']['logged_in'] = true;
                    $ar_session_data['user_data']['passphrase'] = "";
                    $this->session->set_userdata($ar_session_data);

                    redirect(site_url("websiteadmin/dashboard"), 'refresh');
                    exit();
                } else {
                    $error_msg = "Please contact admin";

                }

            } else {
                $error_msg = "Incorrect login credentials";
                //    $this->session->set_flashdata('error_msg', $error_msg);
                //redirect($this->config->item('site_url') . 'users/login');

            }
        }

        $data['error_msg'] = $error_msg;
        $this->load->view("websiteadmin/home", $data);
    }
}