<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Blogs
 *
 * @package webtreeindia
 * @subpackage Manage Blogs
 * @category Drivers
 * @version    1.0
 * @created    17/06/2020
 */
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Blogs extends CI_Controller
{
    //   public $db;
    public $title = "Blogs";
    public $controller = "websiteadmin/blogs";
    private $cate_type = "Blog";

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
        //  print_r($this->session->all_userdata());

        $this->bloglist();

    }
    public function blogcategory($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 1011;
        $data['sub_activaation_id'] = '1011_1';
        $data['title'] = 'Blogs Category';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'Category List';
        $fun_name = $this->controller . '/blogcategory';
        $data['fun_name'] = $fun_name;
        $data['controller'] = $this->controller;

        $resultdata = array();
        $sql = "select c.id, c.uuid , c.cate_name, c.image_name,c.sort_no,c.parent_id,c.add_date,c.status_flag from m_newsblog_cat c      where cate_type='blog'  and delete_status=0 order by sort_no";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        //     $sql = "select count('')  as numrows  from m_newsblog_cat c      where cate_type='blog'  and delete_status=0 ";
        //    $query = $this->db->query($sql);
        //     $resultdata = $query->row_array();

        //$data['num_row'] = $resultdata['numrows'] ;//= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/blogs_blogcategory', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function categoryAdd()
    {

        $session_user_data = $this->session->userdata('user_data');
        $data['msg'] = '';
        $error = '';

        $data['title'] = 'Blogs Category';

        $data['sub_heading'] = 'Add New';
        $data['activaation_id'] = 1011;
        $data['sub_activaation_id'] = '1011_1';
        $data['fun_name'] = "categoryAdd";
        $data['controller'] = $this->controller;
        $add_in = array();

        if (isset($_POST['mode']) && $_POST['mode'] == 'edit_content') {

            $add_in['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : '2';
            $add_in['cate_name'] = $cate_name = (isset($_POST['cate_name'])) ? $this->common->mysql_safe_string($_POST['cate_name']) : '';
            $add_in['sort_no'] = $sort_no = (isset($_POST['sort_no'])) ? $this->common->mysql_safe_string($_POST['sort_no']) : '1';

            if ($cate_name == "") {$error .= "<li>Please enter name</li>";}

           
            $condtion = " delete_status=0 and cate_name='".$cate_name."' ";
            $chkInfo = $this->common->getRecord('m_newsblog_cat', $condtion, 'cate_name');

            if (sizeof($chkInfo) > 0) {
                $error = "$cate_name  is already added";
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
                $slug_name = $this->common->getUniqueSlug('m_newsblog_cat', 'slug_name', $this->common->tep_short_name_list($cate_name), 'slug_name');

                $add_in['slug_name'] = $slug_name;
                $add_in['uuid'] = $uuid;
                $add_in['cate_type'] = 'blog';
                $add_in['add_date'] = date("Y-m-d");
                $add_in['edit_date'] = date("Y-m-d");
                $add_in['added_by_user_id'] = $session_user_data['user_id'];
                $add_in['edit_by_user_id'] = $session_user_data['user_id'];
                $this->common->insertRecord('m_newsblog_cat', $add_in);
                $newdata = array('success' => 'Infomation added successfully! ');

                //$this->session->set_userdata($newdata);
                $this->common->createjson('m_newsblog_cat','blogs');
                redirect($this->controller . "/blogcategory");
            } else {
                $this->session->set_flashdata('error', $error);
            }

        }
        if (sizeof($add_in) > 0) {
            $data_info = (isset($_POST)) ? $_POST : '';
            $data['records'] = $data_info;
        } else {

            $sql = "select count('')  as numrows  from m_newsblog_cat c      where cate_type='blog'  and delete_status=0 ";
            $query = $this->db->query($sql);
            $resultdata = $query->row_array();
            $data['records']['sort_no'] = $resultdata['numrows'] + 1;
        }
        $this->load->view('websiteadmin/blogs_category_add_view', $data);
        //$this->load->view($this->controller.'_add_view',$data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function categoryEdit($id = 0)
    {

        $session_user_data = $this->session->userdata('user_data');
        
        $data['activaation_id'] = 1011;
        $data['sub_activaation_id'] = '1011_1';
        $data['title'] = 'Blogs Category';
        $data['sub_heading'] = 'Edit Category';
        $data['id'] = $id;
        $data['fun_name'] = "categoryEdit/" . $id;
        $data['controller'] = $this->controller;
        $data_info = array();
        $error = '';
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

            $add_in['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : '2';
            $add_in['cate_name'] = $cate_name = (isset($_POST['cate_name'])) ? $this->common->mysql_safe_string($_POST['cate_name']) : '';
            $add_in['sort_no'] = $sort_no = (isset($_POST['sort_no'])) ? $this->common->mysql_safe_string($_POST['sort_no']) : '1';
            $old_cate_name = (isset($_POST['old_cate_name'])) ? $this->common->mysql_safe_string($_POST['old_cate_name']) : '';
            if ($cate_name == "") {$error .= "<li>Please enter name</li>";}

            if ($old_cate_name != $cate_name) {
              
            $condtion = " delete_status=0 and cate_name='".$cate_name."' ";
            $chkInfo = $this->common->getRecord('m_newsblog_cat', $condtion, 'cate_name');


                if (sizeof($chkInfo) > 0) {
                    $error = "$cate_name  is already added";
                }
            }

            if ($error == '') {
				$add_in['edit_date'] = date("Y-m-d");
                $add_in['edit_by_user_id'] = $session_user_data['user_id'];
				
                $where = "uuid = '" . $id . "'";
                $update_status = $this->common->updateRecord('m_newsblog_cat', $add_in, $where);
                $newdata = array('success' => 'Infomation updated successfully!');

                //$this->session->set_userdata($newdata);

                $this->common->createjson('m_newsblog_cat','blogs');

                $this->session->set_flashdata('success', 'Infomation updated successfully!');
                redirect($this->controller . "/blogcategory");
            } else {
                $this->session->set_flashdata('error', $error);
            }

        }

        $data_info = array();
        if ($id != "") {
            $sql = "select  * from m_newsblog_cat ftm where uuid='" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        }

        if (sizeof($data_info) == 0) {
            $newdata = array('warning' => 'Please select category ');
            $this->session->set_flashdata($newdata);
            redirect($this->controller . "/blogcategory");
        }

        $this->load->view('websiteadmin/blogs_category_add_view', $data);

        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');

    }

    public function category_delete($id = 0)
    {

      
        $sql = "select  id from  m_newsblog_cat where uuid='" . $id . "'  ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {

            $sql = "update m_newsblog_cat  set  delete_status=1  where uuid='" . $id . "'";
            $this->db->query($sql);

            $this->common->createjson('m_newsblog_cat','blogs');

            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'Oh! It is not safe to delete this as it is used in blogs');
        }

        redirect($this->controller . '/blogcategory');
    }

    public function bloglist($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 1011;
        $data['sub_activaation_id'] = '1011_2';
        $data['title'] = 'Blogs Category';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'Category List';
        $fun_name = $this->controller.'/bloglist';
        $data['fun_name'] = $fun_name;
        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT ".$start.",".$maxm;
         
        $data['other_para'] = "";  


        $resultdata = array();
        $sql = "select b.newsblogs_id,b.uuid, b.newsblogs_cat_id, b.status_flag,b.add_date,b.sort_no,b.blogger_name,b.team_id ,heading ,c.cate_name from
				wti_t_newsblogs b  ,m_newsblog_cat c
		   	where  b.newsblogs_cat_id=c.id and    c.cate_type='blog' and b.delete_status=0  order by  b.newsblogs_id desc ".$limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

       
        $sql = "select count('')  as numrows  from
        	wti_t_newsblogs b   ,m_newsblog_cat c
        where  b.newsblogs_cat_id=c.id and    c.cate_type='blog' and b.delete_status=0  order by  b.newsblogs_id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows'] ;//= $this->common->numRow($this->tablename,$where_cond);
         

        $this->load->view('websiteadmin/blogs_listall_view', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function editdata($id = 0)
    {

        $session_user_data = $this->session->userdata('user_data');
        $data['controller'] = $this->controller;
        $data['activaation_id'] = 1011;
        $data['sub_activaation_id'] = '1011_2';
        $data['title'] = 'Blogs';
        $data['id'] = $id;
        $data['sub_heading'] = 'Edit Blog';
        
        $data['fun_name'] = 'editdata/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

		$error = '';

        $data_info = array();

        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
		 
			$add_in_m['heading'] = $heading = (isset($_POST['heading'])) ? $this->common->mysql_safe_string($_POST['heading']) : ''; 
			$add_in_m['descriptions'] = $descriptions = (isset($_POST['descriptions'])) ? $this->common->mysql_safe_string_descriptive($_POST['descriptions']) : ''; 
			 
			$add_in_m['newsblogs_cat_id'] = $newsblogs_cat_id = (isset($_POST['newsblogs_cat_id'])) ? $this->common->mysql_safe_string($_POST['newsblogs_cat_id']) : ''; 
            //$add_in_m['blogger_name'] = $blogger_name = (isset($_POST['blogger_name'])) ? $this->common->mysql_safe_string($_POST['blogger_name']) : ''; 
            $blogger_name_id = (isset($_POST['blogger_name_id'])) ? $this->common->mysql_safe_string($_POST['blogger_name_id']) : ''; 
			$add_in_m['tags'] = $tags = (isset($_POST['tags'])) ? $this->common->mysql_safe_string($_POST['tags']) : ''; 
			$add_in_m['news_source_url_name'] = $news_source_url_name = (isset($_POST['news_source_url_name'])) ? $this->common->mysql_safe_string($_POST['news_source_url_name']) : ''; 
			//$add_in_m['featured_image'] = $featured_image = (isset($_POST['featured_image'])) ? $this->common->mysql_safe_string($_POST['featured_image']) : ''; 

			$add_in_m['sort_no'] = $sort_no = (isset($_POST['sort_no'])) ? $this->common->mysql_safe_string($_POST['sort_no']) : ''; 
			$add_in_m['featured_image_alignment'] = $featured_image_alignment = (isset($_POST['featured_image_alignment'])) ? $this->common->mysql_safe_string($_POST['featured_image_alignment']) : 'none'; 

			$add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : '2'; 
            $add_in_m['meta_keywords'] = $meta_keywords = (isset($_POST['meta_keywords'])) ? $this->common->mysql_safe_string($_POST['meta_keywords']) : ''; 
            $add_in_m['meta_description'] = $meta_description = (isset($_POST['meta_description'])) ? $this->common->mysql_safe_string($_POST['meta_description']) : ''; 
            $add_in_m['page_meta_title'] = $page_meta_title = (isset($_POST['page_meta_title'])) ? $this->common->mysql_safe_string($_POST['page_meta_title']) : ''; 
			 

            if ($_FILES['main_image']['name'] != '') {
              
                //  $image_replace_name = $_FILES["main_image"]['name'];
                $filename = "blogs_" . $this->common->gen_key(4);

                $upload = $this->common->UploadImage('main_image', '../uploads/blogs/', 0, $height_thumb = '', $width_thumb = '', $filename);

                if ($upload['uploaded'] == 'false') {
                    $error = $upload['uploadMsg'];
                } else {

                    $add_in_m['featured_image'] = $upload['imageFile'];

                    $this->load->library('Kishoreimagelib');
                    $image_old_path_only = '../uploads/blogs/';
                    $this->kishoreimagelib->load('../uploads/blogs/' . $add_in_m['featured_image'])->set_background_colour("#fff")->resize(808, 360, true)->save($image_old_path_only . "808".  $add_in_m['featured_image'])->resize(360, 233, true)->save($image_old_path_only . "360" . $add_in_m['featured_image'])->resize(81, 75, true)->save($image_old_path_only . "81" . $add_in_m['featured_image']);

                    @unlink($image_old_path_only .   $add_in_m['featured_image']);
                    rename($image_old_path_only .  "808". $add_in_m['featured_image'],$image_old_path_only .   $add_in_m['featured_image']);

                }

            }

            if ($heading == '') {$error .= "Please enter Title  <br>";}
            if ($newsblogs_cat_id == '') {$error .= "Please select category<br>";}
            if ($blogger_name_id == '') {$error .= "Please select blogger name  <br>";}
            if (trim(strip_tags($descriptions))=='') { $error.="Please enter description<br>";}
            if ($error == '') {

                $blogger_name_id_expl = explode("|",$blogger_name_id);
                $add_in_m['blogger_name'] = $blogger_name_id_expl[1];
                $add_in_m['team_id'] = $blogger_name_id_expl[0];
                
                $add_in_m['slug_name'] = $this->common->getUniqueSlug('wti_t_newsblogs', 'slug_name', $this->common->tep_short_name_list($heading), 'slug_name');
		 
                $add_in['edit_date'] = date("Y-m-d");
                $add_in['edit_by_user_id'] = $session_user_data['user_id'];
                
               
                $where = "uuid = '" . $id . "'";
                $update_status = $this->common->updateRecord('wti_t_newsblogs', $add_in_m, $where);

                $this->common->createjson('wti_t_newsblogs','blogs');
				 
                $this->session->set_flashdata('success', 'Information updated successfully.');
                redirect($this->controller . '/bloglist');
            } else {
                //$this->session->set_userdata('error', $error);
                $data['error_msg'] = $error;
            }
        }
		$data_info = array();
        if ($id != "") {
            $sql = "select b.newsblogs_id,b.uuid, b.newsblogs_cat_id, b.status_flag,b.blogger_name,b.featured_image,b.tags,b.sort_no,b.blogger_name,b.team_id,b.meta_keywords,b.page_meta_title,b.meta_description  ,heading,descriptions, c.cate_name from
				wti_t_newsblogs b ,	m_newsblog_cat c
		   	where  b.newsblogs_cat_id=c.id and    c.cate_type='blog' and b.delete_status=0 and b.uuid='" . $id . "'   order by  b.newsblogs_id desc";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        }

        if (sizeof($data_info) == 0) {
            $newdata = array('warning' => 'Please select blog ');
            $this->session->set_flashdata($newdata);
            redirect($this->controller . "/bloglist");
        }
         $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

       

        $this->load->view('websiteadmin/blogs_adddata', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');

    }
    public function adddata()
    {

        $session_user_data = $this->session->userdata('user_data');
        $data['controller'] = $this->controller;
        $data['activaation_id'] = 1011;
        $data['sub_activaation_id'] = '1011_2';
        $data['title'] = 'Blogs';
        $data['sub_heading'] = 'Add Blog';
        $data['id'] = $id = '';
        $data['sub_heading'] = 'Edit Blog';
         
        $data['fun_name'] = 'adddata/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();

        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
		 
			$add_in_m['heading'] = $heading = (isset($_POST['heading'])) ? $this->common->mysql_safe_string($_POST['heading']) : ''; 
			$add_in_m['descriptions'] = $descriptions = (isset($_POST['descriptions'])) ? $this->common->mysql_safe_string_descriptive($_POST['descriptions']) : ''; 
			$add_in_d['language_id'] = $language_id = (isset($_POST['language_id'])) ? $this->common->mysql_safe_string($_POST['language_id']) : '1'; 
			$add_in_m['newsblogs_cat_id'] = $newsblogs_cat_id = (isset($_POST['newsblogs_cat_id'])) ? $this->common->mysql_safe_string($_POST['newsblogs_cat_id']) : ''; 
        //	$add_in_m['blogger_name'] = $blogger_name = (isset($_POST['blogger_name'])) ? $this->common->mysql_safe_string($_POST['blogger_name']) : ''; 
             $blogger_name_id = (isset($_POST['blogger_name_id'])) ? $this->common->mysql_safe_string($_POST['blogger_name_id']) : ''; 
			$add_in_m['tags'] = $tags = (isset($_POST['tags'])) ? $this->common->mysql_safe_string($_POST['tags']) : ''; 
			$add_in_m['news_source_url_name'] = $news_source_url_name = (isset($_POST['news_source_url_name'])) ? $this->common->mysql_safe_string($_POST['news_source_url_name']) : ''; 
		//	$add_in_m['featured_image'] = $featured_image = (isset($_POST['featured_image'])) ? $this->common->mysql_safe_string($_POST['featured_image']) : ''; 
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

            $uuid = "";
            try {

                // Generate a version 4 (random) UUID object
                $uuid4 = Uuid::uuid4();
                $add_in_m['uuid'] = $uuid4->toString();

            } catch (UnsatisfiedDependencyException $e) {
                //  echo 'Caught exception: ' . $e->getMessage() . "\n";
            }

            if ($_FILES['main_image']['name'] != '') {

                //  $image_replace_name = $_FILES["main_image"]['name'];
                $filename = "blogs_" . $add_in_m['uuid'];

                $upload = $this->common->UploadImage('main_image', '../uploads/blogs/', 0, $height_thumb = '', $width_thumb = '', $filename);

                if ($upload['uploaded'] == 'false') {
                    $error = $upload['uploadMsg'];
                } else {

                    $add_in_m['featured_image'] = $upload['imageFile'];

                    $this->load->library('Kishoreimagelib');
                    $image_old_path_only = '../uploads/blogs/';
                    $this->kishoreimagelib->load('../uploads/blogs/' . $add_in_m['featured_image'])->set_background_colour("#fff")->resize(808, 360, true)->save($image_old_path_only .  $add_in_m['featured_image'])->resize(360, 233, true)->save($image_old_path_only . "360" . $add_in_m['featured_image'])->resize(81, 75, true)->save($image_old_path_only . "81" . $add_in_m['featured_image']);
                }

            }

            if ($heading == '') {$error .= "Please enter Title  <br>";}
            if ($blogger_name_id == '') {$error .= "Please select blogger name  <br>";}
            if ($newsblogs_cat_id == '') {$error .= "Please select category<br>";}
             if (trim(strip_tags($descriptions))=='') { $error.="Please enter description<br>";}

            if ($error == '') {
                $blogger_name_id_expl = explode("|",$blogger_name_id);
                $add_in_m['blogger_name'] = $blogger_name_id_expl[1];
                $add_in_m['team_id'] = $blogger_name_id_expl[0];
               
                $add_in_m['slug_name'] = $this->common->getUniqueSlug('wti_t_newsblogs', 'slug_name', $this->common->tep_short_name_list($heading), 'slug_name');

			//	$add_in['tags'] =trim($_POST['tags']);
               /*  if (sizeof($tags) > 0) {
                    foreach ($tags as $key => $value) {
                        
                        $tags_temp[] = $value;
                    }
                    $add_in['tags'] = implode(",", $tags_temp);
                } */
                $blogs_id = $this->common->insertRecord('wti_t_newsblogs', $add_in_m);

				$chkInfo = $this->common->getSingleInfoBy('wti_t_newsblogs', 'uuid', $add_in_m['uuid']);
				 
                
                $this->common->createjson('wti_t_newsblogs','blogs');
             
                $this->session->set_flashdata('success', 'Information added successfully.');
                redirect($this->controller . '/bloglist');
            } else {
                //$this->session->set_userdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);
       
      
        $data['records'] = (isset($_POST))?$_POST:array();

        $this->load->view('websiteadmin/blogs_adddata', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');

    }

    public function delete_data($id = 0)
    {

        

        $sql = "select  newsblogs_id from 	wti_t_newsblogs ftm where uuid='" . $id . "'  ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $rowdata = $query->row_array();
            $sql = "delete from 	wti_t_newsblogs where uuid='" . $id . "'  ";
            $this->db->query($sql);
            $this->common->createjson('wti_t_newsblogs','blogs');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/bloglist');
    }
//news
public function newslist($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 1011;
        $data['sub_activaation_id'] = '1011_2';
        $data['title'] = 'Blogs Category';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'Category List';
        $fun_name = $this->controller.'/bloglist';
        $data['fun_name'] = $fun_name;
        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT ".$start.",".$maxm;
         
        $data['other_para'] = "";  


        $resultdata = array();
        $sql = "select b.newsblogs_id,b.uuid, b.newsblogs_cat_id, b.status_flag,b.add_date,b.sort_no,b.blogger_name,b.team_id ,heading ,c.cate_name from
				wti_t_newsblogs b  ,m_newsblog_cat c
		   	where  b.newsblogs_cat_id=c.id and    c.cate_type='blog' and b.delete_status=0  order by  b.newsblogs_id desc ".$limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

       
        $sql = "select count('')  as numrows  from
        	wti_t_newsblogs b   ,m_newsblog_cat c
        where  b.newsblogs_cat_id=c.id and    c.cate_type='blog' and b.delete_status=0  order by  b.newsblogs_id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows'] ;//= $this->common->numRow($this->tablename,$where_cond);
         

        $this->load->view('websiteadmin/blogs_listall_view', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

//news

}