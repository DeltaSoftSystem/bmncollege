<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_ajax extends CI_Controller {
public $db;

		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Common');
			$this->load->helper('security');
			$this->load->library('email');
			$this->load->helper('url_helper');
			$this->db = $this->load->database('default',TRUE);
		}


	 
	public function getCategories()
    { 
	$query_row =  array();
		 
		$sql = "select * from mst_category where status='1'   ";
		 	$query_result = $this->db->query($sql);
			if($query_result->num_rows()>0){
				$query_row = $query_result->result_array();
			} 
		$result = json_encode($query_row);
		 print_r( $result);
	}
	 
	 
	 
	public function getStates($country=99,$state_id=0)
    { 
		$query_row_str =  "";
		 
		$country 		 = $this->common->mysql_safe_string($country); 
		 $query_row_str = $this->common->getStates($country,$state_id);
		 return $query_row_str;
	}		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */