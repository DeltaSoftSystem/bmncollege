<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public $tbl_name = 'wti_m_gallery';
	public $title = "Gallery";
	public $controller = "websiteadmin/gallery";


    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->model('common');
      $this->load->helper('security');

		$this->load->helper('url_helper');
        $this->db = $this->load->database('default', true);
        $this->common->check_user_session();
    }

	public function index()
    {
        //  print_r($this->session->all_userdata());

        $this->placement();

    }

	public function placement($start = 0, $otherparam = ""){
		$data['msg'] = '';
		$error = '';
		
		 
		$data['activaation_id'] = 2011;
        $data['sub_activaation_id'] = '2011_22';
        $data['title'] = 'Gallery';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'Placed Students';
        $fun_name = $this->controller . '/placement';
        $data['fun_name'] = $fun_name;

		$data['add_link'] =  $this->controller . '/action_gallery/placement';
        $data['edit_link'] =  $this->controller . '/action_gallery/placement';
        
		$data['gallery_type'] = 'placement';

        $data['controller'] = $this->controller;
		// $where_cond = " WHERE delete_status=0 ORDER BY slider_id ";
		// $data['sel_rs'] = $sel_rs = $this->common->getAllRow('wti_m_gallery',$where_cond);
		
		
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *   from
				wti_m_gallery b 
		   	where  gallery_type='{$data['gallery_type']}' and  b.delete_status=0  order by  b.slider_id  desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from
        	wti_m_gallery b
        where   gallery_type='{$data['gallery_type']}'  and b.delete_status=0  order by  b.slider_id  desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);


		$this->load->view('websiteadmin/gal_list',$data);		
	}
	public function recruiters($start = 0, $otherparam = ""){
		$data['msg'] = '';
		$error = '';
		
		 
		$data['activaation_id'] = 2011;
        $data['sub_activaation_id'] = '2011_2';
        $data['title'] = 'Gallery';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'Alumnae';
        $fun_name = $this->controller . '/recruiters';
        $data['fun_name'] = $fun_name;

		$data['add_link'] =  $this->controller . '/action_gallery/recruiters';
        $data['edit_link'] =  $this->controller . '/action_gallery/recruiters';
        
		$data['gallery_type'] = 'recruiters';

        $data['controller'] = $this->controller;
		// $where_cond = " WHERE delete_status=0 ORDER BY slider_id ";
		// $data['sel_rs'] = $sel_rs = $this->common->getAllRow('wti_m_gallery',$where_cond);
		
		
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *   from
				wti_m_gallery b 
		   	where  gallery_type='{$data['gallery_type']}' and  b.delete_status=0  order by  b.slider_id  desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from
        	wti_m_gallery b
        where   gallery_type='{$data['gallery_type']}'  and b.delete_status=0  order by  b.slider_id  desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);


		$this->load->view('websiteadmin/gal_list',$data);		
	}		
	public function alumnae($start = 0, $otherparam = ""){
		$data['msg'] = '';
		$error = '';
		
		 
		$data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '11105_2';
        $data['title'] = 'Gallery';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'Alumnae';
        $fun_name = $this->controller . '/alumnae';
        $data['fun_name'] = $fun_name;

		$data['add_link'] =  $this->controller . '/action_gallery/alumnae';
        $data['edit_link'] =  $this->controller . '/action_gallery/alumnae';
        
		$data['gallery_type'] = 'alumnae';

        $data['controller'] = $this->controller;
		// $where_cond = " WHERE delete_status=0 ORDER BY slider_id ";
		// $data['sel_rs'] = $sel_rs = $this->common->getAllRow('wti_m_gallery',$where_cond);
		
		
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
          $sql = "select *   from
				wti_m_gallery b 
		   	where  gallery_type='{$data['gallery_type']}' and  b.delete_status=0  order by  b.slider_id  desc " . $limit_qry;

			 
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from
        	wti_m_gallery b
        where   gallery_type='{$data['gallery_type']}'  and b.delete_status=0  order by  b.slider_id  desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);
		

		$this->load->view('websiteadmin/gal_list',$data);		
	}	
	function delete_data($gallery_type='alumnae',$id=0){
	 
		$add_in['delete_status'] = 1;
		 
		$sql = "select  slider_id  from 	wti_m_gallery ftm where slider_id='" . $id . "'  ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
         
            $sql = "delete from 	wti_m_gallery where slider_id='" . $id . "'  ";
            $this->db->query($sql);
          //  $this->common->createjson('wti_m_gallery', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }
		 redirect($this->controller.'/'.$gallery_type);
	}

	public function action_gallery($gallery_type='alumnae',$id=0){
		

		$session_user_data = $this->session->userdata('user_data');
        $data['controller'] = $this->controller;
        $data['activaation_id'] = ($gallery_type=="alumnae") ? '101' : '2011';
		if($gallery_type=="alumnae"){
			$sub_activaation_id = "11105_2";
		}
		 
		if($gallery_type=="placement"){
			$sub_activaation_id = "2011_22";
		}
		if($gallery_type=="recruiters"){
			$sub_activaation_id = "2011_2";
		}
		 
		 
        $data['sub_activaation_id'] = $sub_activaation_id;

        $data['title'] = 'Gallery / '.ucfirst($gallery_type);
        $data['id'] = (!empty($id)) ? $this->common->mysql_safe_string($id) : '';
        $data['sub_heading'] = (isset($id) && $id > 0) ? " Edit Gallery" : 'Add Gallery';
        $data['back_link'] =   $this->controller."/".$gallery_type;
        $data['fun_name'] = 'action_gallery/'.$gallery_type . "/" . $id;
		$data['gallery_type'] = $gallery_type;
        $error = '';

        $data_info = array();

	
		 if(isset($_POST['mode_add'])=="add_att"){
			
					$add_in_m['add_date'] = $today = date("Y-m-d");
					$add_in_m['edit_date'] = null;	
					$add_in_m['slider_text'] = $slider_text = (isset($_POST['slider_text'])) ? $this->common->mysql_safe_string($_POST['slider_text']) : '';
					$add_in_m['alumnae_type'] = $alumnae_type = (isset($_POST['alumnae_type'])) ? $this->common->mysql_safe_string($_POST['alumnae_type']) : '';
					$add_in_m['post_name'] = $post_name = (isset($_POST['post_name'])) ? $this->common->mysql_safe_string($_POST['post_name']) : '';

					$add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : '1';			
					$add_in_m['gallery_type']  = $gallery_type;
					if(isset($_FILES['slider_image'])){
						if ($_FILES['slider_image']['name']!=""){
							
								$thumbpath = $_FILES['slider_image']['name'];
								$thumbpath = $this->common->tep_short_name_list($thumbpath);

								$filename = $gallery_type.time()."-".$thumbpath;

								$upload = $this->common->UploadImage('slider_image', 'uploads/gallery/', 0, $height_thumb = '', $width_thumb = '', $filename,'');

								//copy($_FILES['slider_image']['tmp_name'],"../uploads/gallery/".$pusti.$thumbpath);
								if ($upload['uploaded'] == 'false') {
									
									$error = $upload['uploadMsg'];
								} else {
									$add_in_m['slider_image'] = $upload['imageFile'];
									//print_r($add_in);
								}
							
						}

						
					}	
										
					if ($error=='') {	
						// print_r($add_in_m);
                        // exit;
						if ($id >0) {
							$where = "slider_id = '" . $id . "'";
							$update_status = $this->common->updateRecord('wti_m_gallery', $add_in_m, $where);
							$this->session->set_flashdata('success', 'Information updated successfully.');
		  
						} else {
						//	print_r($add_in_m);
							$this->common->insertRecord('wti_m_gallery',$add_in_m);

							$this->session->set_flashdata('success', 'Information added successfully.');
		  
						}
 
						//$this->common->createjson('wti_m_gallery','gallery','SELECT * FROM `wti_m_gallery` where delete_status=0');

                        $this->common->createjson('wti_m_gallery', 'gallery',"select *   from
                        wti_m_gallery b   where  gallery_type='alumnae' and  b.delete_status=0  order by  b.slider_id  desc",'multiple','home');


						//redirect($this->controller.'/action_gallery/'.$gallery_type);
					} else {
						$this->session->set_flashdata('error', $error);
						$data['msg'] = $error;
					}
		}		

	
		$data_info = array();
        if ($id != "") {
            $sql = "select *  from  wti_m_gallery b where   b.delete_status=0 and b.slider_id ='" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        } else {
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
            } else {

                $sql = "select count('')  as numrows  from wti_m_gallery        where     (delete_status=0 or delete_status IS NULL)   ";
                $query = $this->db->query($sql);
                $resultdata = $query->row_array();
                $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }
		$this->load->view('websiteadmin/add_gal',$data);		
	}			
	
	 
	
		
}

