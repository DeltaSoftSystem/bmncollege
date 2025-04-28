<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitecontrol extends CI_Controller {
	 
	 //   public $db;
     public $title = "Sitecontrol";
     public $controller = "websiteadmin/sitecontrol";
     public $m_act = 0;
 
 
		public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->helper('url_helper');
            $this->load->model('common');
            $this->load->model('services');
            $this->load->model('common');
            $this->db = $this->load->database('default', true);
            $this->common->check_user_session();
		}
 

	 
   
	public function sitemail(){ 
    
        $session_user_data = $this->session->userdata('user_data');


        $data['activaation_id'] = 1101;
        $data['sub_activaation_id'] = '1101_2';
        $data['title'] = 'SMTP Mail Setting';
        $data['sub_heading'] = 'SMTP MAIL INFO        ';
        $fun_name =  'sitemail';
        $data['fun_name'] = $fun_name;
        $data['controller'] = $this->controller;
		$error = "";
		$code = 'config_site_mail';
			
		if(isset($_POST['mode']) && $_POST['mode']=='edit_content_sitemail'){
			 
				
				//$this->db->query("DELETE FROM `wti_m_setting` WHERE  `group_name` = '" . $this->common->getDbValue($code) . "'");
				
 				foreach ($_POST as $key => $value) {
					//
						 /* 	if (!is_array($value)) {
								$this->db->query("INSERT INTO `wti_m_setting` SET  `group_name` = '" . $this->common->getDbValue($code) . "', `key` = '" . $this->common->getDbValue($key) . "', `value` = '" . $this->common->getDbValue($value) . "'");
							} else {
								$this->db->query("INSERT INTO `wti_m_setting` SET   `group_name` = '" . $this->common->getDbValue($code) . "', `key` = '" . $this->common->getDbValue($key) . "', `value` = '" . $this->common->getDbValue(json_encode($value, true)) . "', serialized = '1'");
							} */
					$sql = "update wti_m_setting set `value` = '" . $this->common->getDbValue($value) . "' where  `group_name` = '" . $this->common->getDbValue($code) . "' and  `key_name` = '" . $this->common->getDbValue($key) . "'";		
					$this->db->query($sql);
				} 
			
		 
						  
                $this->session->set_flashdata('success', 'Infomation updated successfully!');
                
					redirect($this->controller.'/sitemail');
			 
			
			
		
		}
		
		$resultdata = array();
		$data['records'] = array();
				
		$sql = "select * from  `wti_m_setting` where `group_name`='".$code."' and editable=1 order by sort_no";
		$query = $this->db->query($sql);
		 if ($query->num_rows()>0) {
			$resultdata =    $query->result_array();
		}
		$data['records'] = $resultdata;
		//print_r($records);
	 /* 	foreach($resultdata as $key => $value){
			$data['records'][$value['key']] = $value;
		} */
		 
		
		$this->load->view(  'websiteadmin/sitecontrol_sitemail_view', $data);
	}
	
  
 
	public function sociallinksedit($id=0){
		$data['activaation_id'] = 1101;
		$data['sub_activaation_id'] =  '1101_1';	
		$data['title'] = 'Social Link Management ';	
		$data['sub_heading'] = 'Edit Social';
		$session_user_data = $this->session->userdata('user_data');
		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		 
 
 		$data['id'] = $id;
		$data['msg'] = '';
		$error = '';
		$data['controller'] = $this->controller;	
		$data_info = array();
 	
	   
		 if(isset($_POST['mode']) && $_POST['mode']=="edit_content"){
					 
				
			 
			$sql_data_array['url'] = $url = $this->common->mysql_safe_string($_POST['url']);
			$sql_data_array['status_flag'] = $status_flag = $this->common->mysql_safe_string($_POST['status_flag']);
			 
			 
					$error_msg = "";
					 
					 
					 
					 if ($error_msg=='') { 
						$where = "social_id = '".(int)$id."'";
						$update_status=$this->common->updateRecord('wti_m_social',$sql_data_array,$where);
						$newdata = array('success'  => 'Infomation updated successfully!');
						$this->common->createjson('wti_m_social','social',"select  * from wti_m_social ftm where status_flag=1");

						//$this->session->set_userdata($newdata);
						$this->session->set_flashdata('success', 'Infomation updated successfully!');
						redirect($this->controller."/sociallinks");
					} else {
						$data['error_msg'] = $error_msg;
					}
					
		}

		$fun_name = 'sociallinksedit/'.$id;
		$data['fun_name'] = $fun_name;
		 
		$data_info = array();
		 if($id>0){
		 	$sql = "select  * from wti_m_social ftm where social_id='".$id."'  ";
		 	$query =  $this->db->query($sql);
			 if ($query->num_rows()>0) { 
			 	$data_info = $query->row_array();
				 $data['records'] = $data_info;  
			 } 
		 }  
		  
		 if(sizeof($data_info)==0){
			   $newdata = array('warning'  => 'Please select social link!');
			 $this->session->set_flashdata($newdata);
			 redirect('sitecontrol/sociallinks');
		  }
		 
 		$this->load->view('websiteadmin/sitecontrol_sociallinks_edit_view',$data);
		
		$this->session->unset_userdata('success');
		$this->session->unset_userdata('warning');
		$this->session->unset_userdata('error');		 
		
	}
	public function sociallinks($start=0){
		
		
		$data['activaation_id'] = 1101;
		$data['sub_activaation_id'] =  '1101_1';	
		$data['title'] = 'Social Link Management ';	
		$data['sub_heading'] = 'List';
		$data['controller'] = $this->controller;
		$session_user_data = $this->session->userdata('user_data');
		
	    $data['start'] = $start;
		$data['maxm'] = $maxm = 100;
		$data['sell_keyword'] = '';
		
		$limit_qry = "LIMIT ".$start.",".$maxm;
		
		$other_para = "";
		 
///////////////
		
		$search_qry = ' WHERE showadmin=1 ';
		 
		 
		$data['other_para'] = $other_para;  

		  $where_cond = " $search_qry ORDER BY social_id asc $limit_qry";
		$data['results'] = $cat_date = $this->common->getAllRow('wti_m_social',$where_cond);

		$where_cond = "  $search_qry ORDER BY social_id asc ";
		$data['num_row'] = $num_row = $this->common->numRow('wti_m_social',$where_cond);
////////////////
		$fun_name = $this->controller.'/sociallinks';
		$data['fun_name'] = $fun_name;
		
		 
		$this->load->view('websiteadmin/sitecontrol_sociallinks_view',$data);
	} 	
	public function maintenancemode(){ 
	
        $data['activaation_id'] = 1101;
        $data['sub_activaation_id'] = '1101_3';
       
      
        $fun_name =  'maintenancemode';
        $data['fun_name'] = $fun_name;
        $data['controller'] = $this->controller;
		$error = "";
		 
		$data['title'] = 'Maintenance Mode';	
		$data['sub_heading'] = ' Maintenance Mode';
	 
		$error = "";
		$code = 'config_site_maintenance';
			
		if(isset($_POST['mode']) && $_POST['mode']=='maintenancemode'){
			 
				
				$this->db->query("DELETE FROM `wti_m_setting` WHERE  `group_name` = '" . $this->common->getDbValue($code) . "'");
				 
 				foreach ($_POST as $key => $value) {
					//
						 	if (!is_array($value)) {
								$this->db->query("INSERT INTO `wti_m_setting` SET  `group_name` = '" . $this->common->getDbValue($code) . "', `key_name` = '" . $this->common->getDbValue($key) . "', `value` = '" . $this->common->getDbValue($value) . "'");
							} else {
								$this->db->query("INSERT INTO `wti_m_setting` SET   `group_name` = '" . $this->common->getDbValue($code) . "', `key_name` = '" . $this->common->getDbValue($key) . "', `value` = '" . $this->common->getDbValue(json_encode($value, true)) . "', serialized = '1'");
							}
				} 
			
			
			 
			
				 $newdata = array('success'  => 'Infomation added successfully!');
						  
				$this->session->set_flashdata('success', 'Information updated succssfully..');
				redirect($this->controller.'/maintenancemode');
			 
			
			
		
		}
		
		$resultdata = array();
		$data['records'] = array();
				
		$sql = "select * from  `wti_m_setting` where `group_name`='".$code."'";
		$query = $this->db->query($sql);
		 if ($query->num_rows()>0) {
			$resultdata =    $query->result_array();
		}
		$data['records'] = array();
		//print_r($records);
	 	foreach($resultdata as $key => $value){
			$data['records'][$value['key_name']] = $value['value'];
		}
		 
		
		$this->load->view(  'websiteadmin/sitecontrol_maintenancemode_view', $data);
	} 

	public function list_all(){
		$data['msg'] = '';
		$error = '';
		$data['heading'] = 'Flavours List';
		$data['l_s_act'] = 663;
		$fr_where = '';
		$data['activaation_id'] = 1101;
        $data['sub_activaation_id'] = '1101_4';
       
      
		$sSql = "select * FROM  wti_m_setting WHERE editable=2 ORDER BY setting_id ";
		
		$query = $this->db->query($sSql);
		$row = $query->result_array(); 
		$data['sel_rs'] = $row;

		//$this->load->view('websiteadmin/include/header');
		$this->load->view('websiteadmin/settings_list',$data);		
	}
	
	function edit_setting($id=1){
		$data['msg'] = '';
		$data['id'] = $id;
		$error = '';
		$data['l_s_act'] = 663;
		
		$where_edt = "setting_id = $id";
		$where_fetch = "WHERE setting_id=".$id;

		 if(isset($_POST['mode_edt'])=="edit_att"){
			 
					$add_in['value'] = $value = $this->common->mysql_safe_string($_POST['value']);
					
					if ($error=='') {		
						$update_status=$this->common->updateRecord('wti_m_setting',$add_in,$where_edt);
						$data['msg'] = 'success';


						$this->common->createjson('wti_m_setting','',"select * from  wti_m_setting c order by group_name asc, sort_no asc ");

						redirect($this->controller.'/list_all');
					} else {
						$data['msg'] = $error;
					}
		}

			$where_cond = "where setting_id=".$id;
			$data['sel_rs'] = $sel_rs = $this->common->getOneRow('wti_m_setting',$where_cond);
		
			//$this->load->view('websiteadmin/include/header');
			$this->load->view('websiteadmin/edit_setting',$data);
	}
	
}

