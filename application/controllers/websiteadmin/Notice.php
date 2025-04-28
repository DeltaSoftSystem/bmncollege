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

class Notice extends CI_Controller
{
    //   public $db;
    public $title = "Notice";
    public $controller = "websiteadmin/notice";
 
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
        //  print_r($this->session->all_userdata());

        $this->listshow();

    }
     
     

    public function listshow($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 1013;
        $data['sub_activaation_id'] = '1013_2';
        $data['title'] = 'Notice';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/listshow';
        $data['fun_name'] = $fun_name;
        $data['add_link'] =  $this->controller . '/notice_action';
        $data['edit_link'] =  $this->controller . '/notice_action';
        
        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from   wti_m_notice b  	where   b.delete_status=0  order by  b.newsblogs_id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from
        	wti_m_notice b
        where   b.delete_status=0  order by  b.newsblogs_id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/notice_listall_view', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

   
    public function notice_action($id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        $data['controller'] = $this->controller;
        $data['activaation_id'] = 1013;
        $data['sub_activaation_id'] = '1013_2';
        $data['title'] = 'Notice';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Notice" : 'Add Notice';
        $data['back_link'] =  $this->controller . '/listshow';
        $data['fun_name'] = 'notice_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        // print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

            $event_dates = (isset($_POST['event_dates'])) ? $this->common->mysql_safe_string($_POST['event_dates']) : '';
             $heading_old = (isset($_POST['heading_old'])) ? $this->common->mysql_safe_string($_POST['heading']) : '';
            $add_in_m['heading'] = $heading = (isset($_POST['heading'])) ? $this->common->mysql_safe_string($_POST['heading']) : '';
         //   $add_in_m['location'] = $location = (isset($_POST['location'])) ? $this->common->mysql_safe_string($_POST['location']) : '';
            $add_in_m['blogger_name'] = $blogger_name = (isset($_POST['blogger_name'])) ? $this->common->mysql_safe_string($_POST['blogger_name']) : '';
            $add_in_m['descriptions'] = $descriptions = (isset($_POST['descriptions'])) ? $this->common->mysql_safe_string_descriptive($_POST['descriptions']) : '';
            $add_in_d['language_id'] = $language_id = (isset($_POST['language_id'])) ? $this->common->mysql_safe_string($_POST['language_id']) : '1';
            $add_in_m['newsblogs_cat_id'] = $newsblogs_cat_id = (isset($_POST['newsblogs_cat_id'])) ? $this->common->mysql_safe_string($_POST['newsblogs_cat_id']) : 0;

            $add_in_m['tags'] = $tags = (isset($_POST['tags'])) ? $this->common->mysql_safe_string($_POST['tags']) : '';
            //    $add_in_m['featured_image'] = $featured_image = (isset($_POST['featured_image'])) ? $this->common->mysql_safe_string($_POST['featured_image']) : '';
            $add_in_m['page_meta_title'] = $page_meta_title = (isset($_POST['page_meta_title'])) ? $this->common->mysql_safe_string($_POST['page_meta_title']) : '';
            $add_in_m['meta_keywords'] = $meta_keywords = (isset($_POST['meta_keywords'])) ? $this->common->mysql_safe_string($_POST['meta_keywords']) : '';
            $add_in_m['meta_description'] = $meta_description = (isset($_POST['meta_description'])) ? $this->common->mysql_safe_string($_POST['meta_description']) : '';

            $add_in_m['sort_no'] = $sort_no = (isset($_POST['sort_no'])) ? $this->common->mysql_safe_string($_POST['sort_no']) : '';
            $add_in_m['featured_image_alignment'] = $featured_image_alignment = (isset($_POST['featured_image_alignment'])) ? $this->common->mysql_safe_string($_POST['featured_image_alignment']) : 'none';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : '2';
            $add_in_m['add_date'] = $today = date("Y-m-d");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];
            $add_in_m['edit_by_user_id'] = null;

           

            if (isset($_FILES['main_image']['name']) && $_FILES['main_image']['name'] != '') {

                //  $image_replace_name = $_FILES["main_image"]['name'];
                $filename = "notice-" .time(). $this->common->tep_short_name_list($_FILES["main_image"]['name']);

                $upload = $this->common->UploadImage('main_image', 'uploads/notice/', 0, $height_thumb = '', $width_thumb = '', $filename);

                if ($upload['uploaded'] == 'false') {
                    $error = $upload['uploadMsg'];
                } else {

                    $add_in_m['featured_image'] = $upload['imageFile'];

                    //    $this->load->library('Kishoreimagelib');
                    //    $image_old_path_only = '../uploads/events/';
                    //  $this->kishoreimagelib->load('../uploads/events/' . $add_in_m['featured_image'])->set_background_colour("#fff")->resize(808, 360, true)->save($image_old_path_only .  $add_in_m['featured_image'])->resize(360, 233, true)->save($image_old_path_only . "360" . $add_in_m['featured_image'])->resize(81, 75, true)->save($image_old_path_only . "81" . $add_in_m['featured_image']);
                }

            }

            if ($heading == '') {$error .= "Please enter Title  <br>";}

            if ($error == '') {

                if (!empty($event_dates)) {  
                   
                    $add_in_m['event_dates'] = $this->common->dateexplode("-", $event_dates);
                    //  $add_in_m['event_dates'] = $event_dates;
                   
                }

              if ($heading_old != $heading) {
                  $add_in['slug_name'] = $this->common->getUniqueSlug('wti_m_notice', 'slug_name', $this->common->tep_short_name_list($heading), 'slug_name');
              }
 
               
                if ($id != "") {
                  $where = "uuid = '" . $id . "'";
                  $update_status = $this->common->updateRecord('wti_m_notice', $add_in_m, $where);

                  $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                  $this->db->query($sql);
                if($add_in_m['status_flag']==1){
                    
                     
                    $add_in_search['section_name'] = "Notice";
                    $add_in_search['section_auto_id'] = $id;
                    $add_in_search['table_name'] = "wti_m_notice";
                    $add_in_search['contents'] = $add_in_m['heading']."<br>".$add_in_m['descriptions'];
                    $add_in_search['urls'] = site_url('student-notice');
                    $add_in_search['main_url'] =  site_url('student-notice');
                    $add_in_search['slug_name'] = $add_in_m['slug_name'];
    
                    $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);

                }   

                  $this->session->set_flashdata('success', 'Information updated successfully.');

              } else {
                $uuid = "";
                try {
    
                    // Generate a version 4 (random) UUID object
                    $uuid4 = Uuid::uuid4();
                    $add_in_m['uuid'] = $uuid4->toString();
    
                } catch (UnsatisfiedDependencyException $e) {
                    //  echo 'Caught exception: ' . $e->getMessage() . "\n";
                }
                $blogs_id = $this->common->insertRecord('wti_m_notice', $add_in_m);

                if($add_in_m['status_flag']==1){
                    
                     
                    $add_in_search['section_name'] = "Notice";
                    $add_in_search['section_auto_id'] = $add_in_m['uuid'];
                    $add_in_search['table_name'] = "wti_m_notice";
                    $add_in_search['contents'] = $add_in_m['heading']."<br>".$add_in_m['descriptions'];
                    $add_in_search['urls'] = site_url('student-notice');
                    $add_in_search['main_url'] =  site_url('student-notice');
                    $add_in_search['slug_name'] = $add_in_m['slug_name'];
    
                    $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);

                }    

                  $this->session->set_flashdata('success', 'Information added successfully.');

              }

               

                $this->common->createjson('wti_m_notice', 'notice','select *    from   wti_m_notice b  	where   b.delete_status=0 and status_flag=1 order by  b.newsblogs_id desc limit 0,2','multiple','home');

               
                redirect($this->controller . '/listshow');
            } else {
                //$this->session->set_userdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_m_notice b where   b.delete_status=0 and b.uuid='" . $id . "'   order by  b.newsblogs_id desc";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
                $data['records']['event_dates'] = $this->common->getDateFormat($data_info['event_dates'],'d-m-Y');
            }
        } else {
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
            } else {

                $sql = "select count('')  as numrows  from wti_m_notice        where     (delete_status=0 or delete_status IS NULL)   ";
                $query = $this->db->query($sql);
                $resultdata = $query->row_array();
                $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

       

        $this->load->view('websiteadmin/notice_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');

    }

    public function delete_data($id = 0)
    {

  

        $sql = "select  uuid from 	wti_m_notice ftm where uuid='" . $id . "'  ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "uuid = '{$id}' ";
		    $add_in['delete_status'] = 1;
		    $update_status=$this->common->updateRecord('wti_m_notice',$add_in,$where_edt);

            $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
            $this->db->query($sql);

          //  $rowdata = $query->row_array();
         //   $sql = "delete from 	wti_t_newsblogs where uuid='" . $id . "'  ";
          //  $this->db->query($sql);
          $this->common->createjson('wti_m_notice', 'notice','select *    from   wti_m_notice b  	where   b.delete_status=0 and status_flag=1 order by  b.newsblogs_id desc limit 0,2','multiple','home');

            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/listshow');
    }
//news

}
