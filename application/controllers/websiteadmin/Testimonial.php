<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Testimonial extends CI_Controller
{
    //   public $db;
    public $title = "Testimonial";
    public $controller = "websiteadmin/testimonial";
    public $m_act = 0;

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
        $this->listshow();

    }
    public function listshow($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '103_1';
        $data['title'] = 'Testimonial';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'Testimonial  List';
        $fun_name = $this->controller . '/listshow';
        $data['fun_name'] = $fun_name;
        $data['controller'] = $this->controller;

        $data['add_link'] = $this->controller . '/testimonial_action';
        $data['edit_link'] = $this->controller . '/testimonial_action';

        $data['testimonial_type'] = '1';
        $resultdata = array();
        $sql = "select * from wti_m_testimonial c      where    delete_status=0 order by id desc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        //     $sql = "select count('')  as numrows  from testimonial c      where cate_type='blog'  and delete_status=0 ";
        //    $query = $this->db->query($sql);
        //     $resultdata = $query->row_array();

        //$data['num_row'] = $resultdata['numrows'] ;//= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/testimonial_testimoniallist', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function testimonial_action($id = "")
    {
        $session_user_data = $this->session->userdata('user_data');
        $data['controller'] = $this->controller;
        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '103_1';
        $data['title'] = 'Testimonial';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Testimonial" : 'Add Testimonial';
        $data['back_link'] = $this->controller . '/listshow';
        $data['fun_name'] = 'testimonial_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';
        $add_in = array();

        if (isset($_POST['mode']) && $_POST['mode'] == 'edit_content') {
        
            $add_in['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : '2';
            $add_in['from_name'] = $from_name = (isset($_POST['from_name'])) ? $this->common->mysql_safe_string($_POST['from_name']) : '';
            $add_in['post_name'] = $post_name = (isset($_POST['post_name'])) ? $this->common->mysql_safe_string($_POST['post_name']) : '';
            $add_in['location'] = $location = (isset($_POST['location'])) ? $this->common->mysql_safe_string($_POST['location']) : '';

            $add_in['testimonial'] = $testimonial = (isset($_POST['testimonial'])) ? $this->common->mysql_safe_string($_POST['testimonial']) : '';
            $add_in['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : '';
            $add_in['home_status'] = $home_status = (isset($_POST['home_status'])) ? $this->common->mysql_safe_string($_POST['home_status']) : '';
            $add_in['testimonial_type'] = '1';
            $add_in['sort_no'] = $sort_no = (isset($_POST['sort_no'])) ? $this->common->mysql_safe_string($_POST['sort_no']) : '1';
            $add_in['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : '2';
            $add_in['add_date'] = $today = date("Y-m-d");
            $add_in['edit_date'] = null;
            $add_in['added_by_user_id'] = $session_user_data['user_id'];
            $add_in['edit_by_user_id'] = null;

            if ($_FILES['main_image']['name'] != '') {

                //  $image_replace_name = $_FILES["main_image"]['name'];
                $filename = "test_" . $this->common->gen_key(4);

                $upload = $this->common->UploadImage('main_image', 'uploads/testimonials/', 0, $height_thumb = '', $width_thumb = '', $filename);

                if ($upload['uploaded'] == 'false') {
                    $error = $upload['uploadMsg'];
                } else {

                    $add_in['from_image'] = $upload['imageFile'];

                }

            }
            if ($from_name == "") {$error .= "<li>Please enter from name</li>";}
            if ($post_name == "") {$error .= "<li>Please enter designation/post</li>";}
            // if ($location == "") {$error .= "<li>Please enter location</li>";}
            if ($testimonial == "") {$error .= "<li>Please enter testimonial</li>";}

            // $chkInfo = $this->common->getSingleInfoBy('wti_m_testimonial', 'from_name', $from_name);

            // if (sizeof($chkInfo) > 0) {
            //     $error = "$from_name  is already added";
            // }
            if ($error == '') {
               

                if ($id != "") {
                    $add_in['edit_date'] = date("Y-m-d");
                    $add_in['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "uuid = '" . $id . "'";
                    $update_status = $this->common->updateRecord('wti_m_testimonial', $add_in, $where);


                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if($add_in['status_flag']==1){
                    
                    
                    $add_in_search['section_name'] = 'testimonials';
                    $add_in_search['section_auto_id'] = $id;
                    $add_in_search['table_name'] = "wti_m_testimonial";
                    $add_in_search['contents'] = $add_in['from_name']."<br>".$add_in['post_name']."<br>".$add_in['testimonial'];
                    $add_in_search['urls'] = site_url('testimonials');
                    $add_in_search['main_url'] =  site_url('testimonials');
                    $add_in_search['slug_name'] = '';

                    $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);

                    } 

                    $this->session->set_flashdata('success', 'Information updated successfully.');

                } else {

                    $uuid = "";
                    try {
    
                        // Generate a version 4 (random) UUID object
                        $uuid4 = Uuid::uuid4();
                        $uuid = $uuid4->toString();
    
                    } catch (UnsatisfiedDependencyException $e) {
                        //  echo 'Caught exception: ' . $e->getMessage() . "\n";
                    }
    
                    $add_in['uuid'] = $uuid;

                    $this->common->insertRecord('wti_m_testimonial', $add_in);
                    
                    if($add_in['status_flag']==1){
                    
                    
                        $add_in_search['section_name'] = 'testimonials';
                        $add_in_search['section_auto_id'] = $add_in['uuid'];
                        $add_in_search['table_name'] = "wti_m_testimonial";
                        $add_in_search['contents'] = $add_in['from_name']."<br>".$add_in['post_name']."<br>".$add_in['testimonial'];
                        $add_in_search['urls'] = site_url('testimonials');
                        $add_in_search['main_url'] =  site_url('testimonials');
                        $add_in_search['slug_name'] = '';
    
                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
    
                        } 

                    $this->session->set_flashdata('success', 'Information added successfully.');

                }

                //  $this->createjson();

                //$this->session->set_userdata($newdata);
                $this->session->set_flashdata('success_msg', 'Infomation added successfully!');
                redirect($this->controller . "/listshow");
            } else {
                $this->session->set_flashdata('error', $error);
            }

        }
        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_m_testimonial b where   b.delete_status=0 and b.uuid='" . $id . "'   order by  b.id desc";
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

                $sql = "select count('')  as numrows  from wti_m_testimonial        where     (delete_status=0 or delete_status IS NULL)   ";
                $query = $this->db->query($sql);
                $resultdata = $query->row_array();
                $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/testimonial_adddata', $data);
        //$this->load->view($this->controller.'_add_view',$data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
 

    public function delete_data($id = 0)
    {

        $sql = "select  id  from  wti_m_testimonial where uuid='" . $id . "'  ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $data_info = $query->row_array();

            $sql = "update wti_m_testimonial  set  delete_status=1  where uuid='" . $id . "'";
            $this->db->query($sql);


            
            $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
            $this->db->query($sql);

            
            $this->session->set_flashdata('success', 'Deleted successfully.');
            $this->createjson();
            redirect($this->controller . "/listshow");
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/listshow');
    }
    public function createjson()
    {

        $response = array();
        $sql = "select * from  wti_m_testimonial c      where status_flag=1 and     delete_status=0  order by sort_no";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();

            foreach ($resultdata as $key => $row) {

                $response[] = $row;
            }

            $fp = fopen('../uploads/jsondata/wti_m_testimonial.json', 'w');
            fwrite($fp, json_encode($response));
            fclose($fp);
        }
    }
}
