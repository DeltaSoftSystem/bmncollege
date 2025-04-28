<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Nopage extends CI_Controller
{

    public $controller = "nopage";

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

    public function index($start = 0, $otherparam = "")
    {

        $param_page = $this->uri->segment(1); // n=1 for controller, n=2 for method, etc
       
        if ($param_page == "") {
            $param_page = "home";
        }
        $data['canonical'] = site_url($param_page);

        $param_page = $this->uri->segment(1); // n=1 for controller, n=2 for method, etc
        $param_page2 = $this->uri->segment(2); // n=1 for controller, n=2 for method, etc
       if($param_page=="" ){
           $param_page = "home";
       }
      
       $data['canonical'] = site_url($param_page);
     
      
       $admin_mail_id = "swamiwebservices@gmail.com";
       $config_site_mail = array();
       $error_msg = "";
      
       
       if(!empty($_POST['mode']) && $_POST['mode']=="admission-enquiry" && $param_page=="admission-enquiry"){
       // $dd = json_encode($_POST);
   //   print_r($_POST);
           $full_name = (isset($_POST['full_name'])) ? $this->common->mysql_safe_string($_POST['full_name']) : '';
           $contact_number = (isset($_POST['contact_number'])) ? $this->common->mysql_safe_string($_POST['contact_number']) : '';
           $email_addrress = (isset($_POST['email_addrress'])) ? $this->common->mysql_safe_string($_POST['email_addrress']) : '';
           
           $city = (isset($_POST['city'])) ? $this->common->mysql_safe_string($_POST['city']) : '';
           $message = (isset($_POST['message'])) ? $this->common->mysql_safe_string($_POST['message']) : '';
           $program = (isset($_POST['program'])) ? $this->common->mysql_safe_string($_POST['program']) : '';
           
           if ($full_name == "") {
               $error_msg .= "<li>Please enter full name </li>";
           }
           
           if ($email_addrress == "") {
               $error_msg .= "<li>Please enter email </li>";
           }
           if ($contact_number == "") {
               $error_msg .= "<li>Please enter purpose of email </li>";
           }

           

           if ($error_msg == "") {
               $dateadded = date('Y-m-d h:i:s');

               $add_in['full_name'] = $full_name;
               $add_in['email_addrress'] = $email_addrress;
               $add_in['contact_number'] = $contact_number;
               $add_in['city'] = $city;
               $add_in['message'] = $message;
               $add_in['program'] = $program;
               $add_in['add_date'] = $dateadded;


               $this->db->insert('wti_t_admission_enquiry', $add_in);

               $sql = "select * from  `wti_m_setting` where `group_name`='config_site_mail'";
               $query = $this->db->query($sql);
               if ($query->num_rows() > 0) {
                   $m_setting = $query->result_array();

                   foreach ($m_setting as $key => $val) {
                       $config_site_mail[$val['key_name']] = $val['value'];
                   }

                   $subject = "Admission enquiry form filled by   " . $email_addrress;

                   $fileg = file_get_contents("htmlemails/mail_contactus.html");

                   $pattern = array('/{fname}/',  '/{email}/', '/{message}/', '/{DATE}/');
                   $replacement = array( $full_name, $email_addrress, $message, $dateadded);
                   $mess_body = preg_replace($pattern, $replacement, $fileg);
                   $contact_name = $full_name;

                   try {
                       

                     //  $mail = new PHPMailer(true);

                   //    $mail->SMTPDebug = 0; // Enable verbose debug output
                       
                     
                      // $admin_mail_id = $config_site_mail['config_site_mail'];

                    //   $mail->setFrom($admin_mail_id, $config_site_mail['config_site_from_name']);
                   //    $mail->addAddress($admin_mail_id, $config_site_mail['config_site_from_name']); // Add a recipient
                     //  $mail->addReplyTo($email_addrress, $contact_name);
                        
                       // Attachments

                       // Content
                     //  $mail->isHTML(true); // Set email format to HTML
                    //   $mail->Subject = $subject;
                   //    $mail->Body = $mess_body;
                       //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                     //  $mail->send();
                       // echo 'Message has been sent';
                   } catch (Exception $e) {
                       //  $error_msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

                   }

               }

               $arr = array('status' => true, 'retcomment' => 'Thank you for your enquiry / request.');
               echo json_encode($arr);
               die();
           } else {
               $arr = array('status' => false, 'retcomment' => $error_msg);
               echo json_encode($arr);
               die();
           }

       }


       ///

       $admin_mail_id = "swamiwebservices@gmail.com";
       $config_site_mail = array();
       $error_msg = "";
      
       
       if(!empty($_POST['mode']) && $_POST['mode']=="contact-us" && $param_page=="contact-us"){
       // $dd = json_encode($_POST);
      //  print_r($dd);exit;
           $full_name = (isset($_POST['full_name'])) ? $this->common->mysql_safe_string($_POST['full_name']) : '';
           $contact_phone = (isset($_POST['contact_phone'])) ? $this->common->mysql_safe_string($_POST['contact_phone']) : '';
           $contact_email = (isset($_POST['contact_email'])) ? $this->common->mysql_safe_string($_POST['contact_email']) : '';
           
           $city = (isset($_POST['city'])) ? $this->common->mysql_safe_string($_POST['city']) : '';
           $contact_message = (isset($_POST['contact_message'])) ? $this->common->mysql_safe_string($_POST['contact_message']) : '';
           $contact_subject = (isset($_POST['contact_subject'])) ? $this->common->mysql_safe_string($_POST['contact_subject']) : '';
           
           if ($full_name == "") {
               $error_msg .= "<li>Please enter full name </li>";
           }
           
           if ($contact_email == "") {
               $error_msg .= "<li>Please enter email </li>";
           }
           if ($contact_phone == "") {
               $error_msg .= "<li>Please enter purpose of email </li>";
           }

           

           if ($error_msg == "") {
               $dateadded = date('Y-m-d h:i:s');

               $add_in['contact_fname'] = $full_name;
               $add_in['contact_email'] = $contact_email;
               $add_in['contact_phone'] = $contact_phone;
               $add_in['contact_message'] = $contact_message;
               $add_in['contact_subject'] = $contact_subject;
               $add_in['add_date'] = $dateadded;


               $this->db->insert('wti_t_contactus', $add_in);

               $sql = "select * from  `wti_m_setting` where `group_name`='config_site_mail'";
               $query = $this->db->query($sql);
               if ($query->num_rows() > 0) {
                   $m_setting = $query->result_array();

                   foreach ($m_setting as $key => $val) {
                       $config_site_mail[$val['key_name']] = $val['value'];
                   }

                   $subject = "Admission enquiry form filled by   " . $contact_email;

                   $fileg = file_get_contents("htmlemails/mail_contactus.html");

                   $pattern = array('/{fname}/',  '/{email}/', '/{message}/', '/{DATE}/');
                   $replacement = array( $full_name, $contact_email, $contact_message, $dateadded);
                   $mess_body = preg_replace($pattern, $replacement, $fileg);
                   $contact_name = $full_name;

                   try {
                       

                     //  $mail = new PHPMailer(true);

                   //    $mail->SMTPDebug = 0; // Enable verbose debug output
                       
                     
                      // $admin_mail_id = $config_site_mail['config_site_mail'];

                    //   $mail->setFrom($admin_mail_id, $config_site_mail['config_site_from_name']);
                   //    $mail->addAddress($admin_mail_id, $config_site_mail['config_site_from_name']); // Add a recipient
                     //  $mail->addReplyTo($contact_email, $contact_name);
                        
                       // Attachments

                       // Content
                     //  $mail->isHTML(true); // Set email format to HTML
                    //   $mail->Subject = $subject;
                   //    $mail->Body = $mess_body;
                       //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                     //  $mail->send();
                       // echo 'Message has been sent';
                   } catch (Exception $e) {
                       //  $error_msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

                   }

               }

               $arr = array('status' => true, 'retcomment' => 'Thank you for your enquiry / request.');
               echo json_encode($arr);
               die();
           } else {
               $arr = array('status' => false, 'retcomment' => $error_msg);
               echo json_encode($arr);
               die();
           }

       }

       if($param_page=="latest-post"){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 25;
        $data['fun_name'] = 'latest-post';

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *  from
				wti_t_newsblogs b
		   	where   b.delete_status=0  and status_flag=1 order by  b.newsblogs_id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from
        	wti_t_newsblogs b
        where   b.delete_status=0   and status_flag=1  order by  b.newsblogs_id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

       }

       if($param_page=="upcoming-events"){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 25;
        $data['fun_name'] = 'upcoming-events';

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *  from
				wti_m_events b
		   	where   b.delete_status=0  and status_flag=1 order by  b.newsblogs_id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from
        	wti_m_events b
        where   b.delete_status=0   and status_flag=1  order by  b.newsblogs_id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

       }
       
       if($param_page=="student-notice"){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 25;
        $data['fun_name'] = 'student-notice';

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select * from 	wti_m_notice b where   b.delete_status=0  and status_flag=1 order by  b.newsblogs_id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from  wti_m_notice b    where   b.delete_status=0   and status_flag=1  order by  b.newsblogs_id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

       }
       
       if($param_page=="e-content"){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 25;
        $data['fun_name'] = 'e-content';

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from wti_cms_econtent b where status_flag='Active' order by  b.id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from  wti_cms_econtent b   where status_flag='Active' ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

       }
       
       if($param_page=="linkages"){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 25;
        $data['fun_name'] = 'linkages';

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from wti_cms_linkages b where status_flag='Active' order by  b.id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from  wti_cms_linkages b   where status_flag='Active' ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

       }
       
       if($param_page=="committee-activity"){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 25;
        $data['fun_name'] = $param_page;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from wti_m_committee_activity b where   b.delete_status=0 and status_flag=1 order by  b.newsblogs_id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from wti_m_committee_activity b where   b.delete_status=0 and status_flag=1  ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

       }

        
       if($param_page=="HD-programm" || $param_page=="RM-hospitality-programm" || $param_page=='TSAD-programm' || $param_page=='fsn-programm' || $param_page=='ND-programm' || $param_page=='bca-programm' || $param_page=='foundation-programm' || $param_page=='msc-cnd-programm' || $param_page == 'msc-cs-programm' || $param_page== 'PGDSSFN-programm' || $param_page == 'PGECE-programm'){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 25;
        $data['fun_name'] = $param_page;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from         wti_cms_programme  b where  status_flag='Active'  and menu_name='{$param_page}' order by  b.id  asc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from   wti_cms_programme  b where  status_flag='Active'  and menu_name='{$param_page}' ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

       }
       

       if($param_page=="research-activity"){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 100000;
        $data['fun_name'] = $param_page;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from      wti_m_research_workshop  b where  status_flag='Active'   order by  b.id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata_temp = $query->result_array();
            foreach($resultdata_temp as $key => $value){
                $session_name = (!empty($value['session_name'])) ? str_replace(" ","_",$value['session_name']) : 'BLANK';
                // if($session_name=="PG_SESSIONS"){
                //     $session_name  = 3;
                // }
                // if($session_name=="UG_SESSIONS"){
                //     $session_name  = 2;
                // }
                $resultdata[str_replace(" ","",$value['data_type'])][trim($value['date_year'])][$session_name][] = $value;
            }
        }

        $data['results'] = $resultdata;

        // $sql = "select count('')  as numrows  from wti_m_research_workshop  b where  status_flag='Active'     ";
        // $query = $this->db->query($sql);
        // $resultdata = $query->row_array();
        // $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        ////        course offered

        $resultdata_courseoffered = array();
        $sql = "select *    from      wti_m_research_coursesoffered  b where  status_flag='Active'   order by  b.id asc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata_courseoffered = $query->result_array();
             
        }

        $data['results_courseoffered'] = $resultdata_courseoffered;

        // $sql = "select count('')  as numrows  from wti_m_research_coursesoffered  b where  status_flag='Active'     ";
        // $query = $this->db->query($sql);
        // $resultdata_courseoffered = $query->row_array();
        // $data['num_row'] = $resultdata_courseoffered['numrows']; //= $this->common->numRow($this->tablename,$where_cond);
       }

       if($param_page=="incubation"){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 25;
        $data['fun_name'] = $param_page;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from wti_cms_incubation b where status_flag='Active' and data_type='event'  order by  b.id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        // $sql = "select count('')  as numrows  from wti_cms_incubation b where status_flag='Active' and data_type='event'  order by  b.id desc";
        // $query = $this->db->query($sql);
        // $resultdata = $query->row_array();
        // $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);


          ////        Ventures

          $resultdata_ventures = array();
          $sql = "select *    from wti_cms_incubation b where status_flag='Active' and data_type='venture'  order by  b.id desc " . $limit_qry;
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
              $resultdata_ventures = $query->result_array();
               
          }
  
          $data['results_ventures'] = $resultdata_ventures;
  
        //   $sql = "select count('')  as numrows  from wti_cms_incubation b where status_flag='Active' and data_type='venture'  ";
        //   $query = $this->db->query($sql);
        //   $resultdata_ventures = $query->row_array();
        //   $data['num_row'] = $resultdata_ventures['numrows']; //= $this->common->numRow($this->tablename,$where_cond);
         


       }

       if($param_page=="placement"){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 25;
        $data['fun_name'] = $param_page;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";
        $resultdata = array();
        $sql = "select * from wti_m_gallery b where  gallery_type='placement' and  b.delete_status=0 and status_flag=1 order by  b.slider_id  desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $resultdata = array();
        $sql = "select * from wti_m_gallery b where  gallery_type='recruiters' and  b.delete_status=0 and status_flag=1 order by  b.slider_id  desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['recruiters'] = $resultdata;

        $resultdata = array();
        $sql = "select *    from      wti_m_placement_committee  b where  status_flag='Active' order by    b.id asc" . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            //$resultdata = $query->result_array();
            if ($query->num_rows() > 0) {
                $resultdata_temp = $query->result_array();
                foreach($resultdata_temp as $key => $value){
                    $data_type = (!empty($value['data_type'])) ? str_replace(" ","_",$value['data_type']) : 'BLANK';
                    $data_type = (!empty($value['data_type'])) ? str_replace(".","",$data_type) : 'BLANK';
                    $resultdata[$data_type][] = $value;
                }
            }

        }
        $data['committeemembers'] = $resultdata;


        $resultdata = array();
        $sql = "select * from
        wti_m_placement_events  b where  status_flag='Active'   and data_type='Events'    order by  b.event_dates_from desc " . $limit_qry;
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
              $resultdata = $query->result_array();
          }
          $data['placement_events'] = $resultdata;
       // print_r($data['committeemembers']);

       $resultdata = array();
       $sql = "select * from
       wti_m_placement_events  b where  status_flag='Active'   and data_type='Webinar'    order by  b.event_dates_from desc " . $limit_qry;
         $query = $this->db->query($sql);
         if ($query->num_rows() > 0) {
             $resultdata = $query->result_array();
         }
         $data['placement_Webinar'] = $resultdata;
      // print_r($data['committeemembers']);

       }

       if($param_page=="bsc-result" || $param_page == 'bca-result' || $param_page == 'pg-result'){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 5000;
        $data['fun_name'] = $param_page;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
        wti_cms_exam_result  b where  status_flag!='Delete'  and degree_name='{$param_page}' order by degree_year asc, b.id  desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            //$resultdata = $query->result_array();
            if ($query->num_rows() > 0) {
                $resultdata_temp = $query->result_array();
                foreach($resultdata_temp as $key => $value){
                  //echo"<br>".
                     $degree_year =  (!empty($value['degree_year'])) ? str_replace(" "," ",$value['degree_year']) : 'BLANK';
                    $resultdata[base64_encode($degree_year)][] = $value;
                }
            }
        }
      //  print_r($resultdata);
        $data['results'] = $resultdata;


       }

       if($param_page=="testimonials" ){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 5000;
        $data['fun_name'] = $param_page;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select * from wti_m_testimonial c      where status_flag=1 and     delete_status=0 order by id desc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;
      //  print_r($resultdata);
       // $data['results'] = $resultdata;


       }

       if($param_page=="skill-based-courses"){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 25;
        $data['fun_name'] = $param_page;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from wti_cms_programme  b where  status_flag='Active'  and menu_name='skillbasedcourses' order by  b.id  asc ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;
 
       }

       if($param_page=="search" ){
        //echo "latest-post";
        $data['controller'] = $this->controller;
        $data['start'] = $start =  (int)$this->uri->segment(2) ; // n=1 for controller, n=2 for method, etc
        $data['maxm'] = $maxm = 5000;
        $data['fun_name'] = $param_page;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $data['keywords'] = $keywords = (!empty($_GET['keywords'])) ? $this->common->mysql_safe_string($_GET['keywords']) : '';
        $resultdata = array();
        if($keywords!=""){
            $keywords_sql1 = "";
            $keywords_sql2 = [];
          
            $keywords_expl = explode(" ",$keywords );
            foreach($keywords_expl as $key => $keywords_val){
                $keywords_sql2[]= " contents like '%".$keywords_val."%'";
            }
            $keywords_sql1 = "where (".implode(" or ",$keywords_sql2) ." )";
             $sql = "select * from wti_m_search c {$keywords_sql1} order by section_name asc";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $resultdata = $query->result_array();
            }
        }
       
        $data['results'] = $resultdata;
       

       }
       
       if (!file_exists(APPPATH.'views/'.$param_page.'.php')){
        $param_page = "nopage";
       }   
     //  print_r($param_page);
       $this->load->view($param_page, $data);

    }
}
