<?php
error_reporting(E_ALL);

class Services extends CI_Model
{

    public function __construct()
    {
    }

    public function get_categorylist_parent_sub($id=0){
          $sql = "select * from m_newsblog_cat where  parent_id=0 AND status_flag='1' order by cate_name asc   ";
        $query_result = $this->db->query($sql);
        $results = $query_result->result_array();

        $combo = "<option value='' >Select Category</option>";
        foreach ($results as $key => $value) {

			$sql = "select * from m_newsblog_cat where  parent_id=".$value['id']." AND status_flag='1' order by cate_name asc   ";
			$query_result = $this->db->query($sql);
			$results_sub = $query_result->result_array();
			$sel_flag = '';
			$dis_flag = '';
			$fld_val = $value['id'];
			
			if ($value['id'] == $id) { $sel_flag = 'selected';}
			if ($results_sub) { $dis_flag = 'disabled';}

            $combo .= "<option value='" . $fld_val . "' ".$sel_flag." ".$dis_flag.">" . $value['cate_name']    . "</option>";
			
			foreach ($results_sub as $key => $value_sub) {
				$sel_sub_flag = '';
				$fld_val = $value['id'].'|'.$value_sub['id'];
				if ($value['id'] == $id) { $sel_sub_flag = 'selected';}
				$combo .= "<option value='" . $fld_val . "' ".$sel_sub_flag.">&nbsp;&nbsp;" . $value_sub['cate_name']  . "</option>";
			}

        }

        echo $combo;

	}
	public function sendotp($user_info=array()){


        $sms_description = $this->common->get_sms_data(1);
        $sms_description = $this->common->mysql_safe_string($sms_description);

        
        $pattern = array('/#REG_OTP#/');
        $replacement = array($user_info['REG_OTP']);
        $sms_description = preg_replace($pattern, $replacement, $sms_description);
      //  $outputtemp = print_r($sms_description,true);
		//file_put_contents('deubg_logs/debug_emp_type.txt', $outputtemp, FILE_APPEND);
        $this->common->send_sms($user_info['mobile'],$sms_description);

        $add_in_cust = array();
        $add_in_cust['user_id'] = $user_info['user_id'];
        $add_in_cust['mobile'] = $user_info['mobile'];
        $add_in_cust['otpcode'] = $user_info['REG_OTP'];
        $add_in_cust['date_sent'] = date("Y-m-d h:i:s");
        $add_in_cust['otp_verification_status'] = 0;
        $add_in_cust['sms_purpose'] = 'OTP';
        $add_in_cust['session_id'] = 91;
        $this->common->insertRecord('wti_sms_register_log', $add_in_cust);
    }
    public function getComments($topic_id=0,$comment_id=0){

        $topic_id = isset($topic_id) ? $this->common->mysql_safe_string($topic_id) : '';
        $comment_id = isset($comment_id) ? $this->common->mysql_safe_string($comment_id) : '';

        $wti_m_blogs_recipes_t_comment = [];
        $sql = "select bc.*,first_name, last_name,profile_pic from wti_m_blogs_recipes_t_comment bc inner join wti_user_master_front um on bc.user_id=um.user_id  where bc.topic_id='".$topic_id."' and bc.comt_id_parent='".$comment_id."' and bc.status_flag='1'   order by bc.comt_id desc ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $wti_m_blogs_recipes_t_comment = $query->result_array();
        }
        return $wti_m_blogs_recipes_t_comment;
        
    }

    public function getLanguageExtOther($LANGCODE = "EN")
    {
        if (strtolower($LANGCODE) == "en" || strtolower($LANGCODE) == "english") {
            return "english";
        } else {
            return "marathi";

        }

    }
}
