<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Cms
 *
 * @package Getlised.in
 * @subpackage Manage Cms
 * @category Cms
 * @version    1.0
 * @updated    21/04/2020
 */

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Cms extends CI_Controller
{
    public $title = "CMS";
    public $controller = "websiteadmin/cms";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('common');
        $this->load->helper('security');
        $this->load->library('email');
        $this->load->helper('url_helper');
        $this->db = $this->load->database('default', true);
        $this->common->check_user_session();
    }

    public function index()
    {
        // $this->homepage();
        redirect('homepage');
    }
    public function homepage()
    {

        $session_user_data = $this->session->userdata('user_data');
        $error = '';
        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '101_101';
        $data['title'] = $this->title;
        $data['tab'] = $tab = (isset($_GET['tab'])) ? $this->common->mysql_safe_string_descriptive($_GET['tab']) : '1';
        $data['maxm'] = $maxm = 20000;
        $data['sub_heading'] = 'Home Page';
        $fun_name = $this->controller . '/homepage';

        $data['controller'] = $this->controller;
        $data['fun_name'] = "homepage?tab=" . $tab;
        $code = 'config_home';

        if (isset($_POST['mode']) && $_POST['mode'] == 'hello_bar') {
            // $key_name = $this->common->mysql_safe_string_descriptive($_POST['key_name']);

            foreach ($_POST as $key => $value) {

                if (is_array($value)) {
                    foreach ($value as $value_key => $final_value) {
                        if (!is_array($final_value)) {

                            $sql = "delete from wti_m_cms_pages where array_key_name='{$value_key}' and key_name='{$_POST['mode']}'";
                            $this->db->query($sql);
                            $add_in = array();
                            $add_in['group_name'] = $code;
                            $add_in['key_name'] = $_POST['mode'];
                            $add_in['array_key_name'] = $value_key;
                            $add_in['value'] = $this->common->mysql_safe_string_descriptive($final_value);
                            $this->db->insert('wti_m_cms_pages', $add_in);
                        }
                    }
                } else {
                    $sql = "delete from wti_m_cms_pages where array_key_name='{$key}' and key_name='{$_POST['mode']}'";
                    $this->db->query($sql);
                    $add_in = array();
                    $add_in['group_name'] = $code;
                    $add_in['key_name'] = $_POST['mode'];
                    $add_in['array_key_name'] = $key;
                    $add_in['value'] = $this->common->mysql_safe_string_descriptive($value);
                    $this->db->insert('wti_m_cms_pages', $add_in);
                }

                if (!is_array($value)) {

                    $this->db->query("update `wti_m_setting` SET    `value` = '" . $value . "' where  `key_name` = '" . $key . "' and group_name='{$code}' ");

                    $this->common->createjson('config_home', '', "SELECT * FROM `wti_m_setting` WHERE `group_name` LIKE 'config_home' ORDER BY `group_name` ASC", 'multiple', 'home');
                } else {

                    $this->db->query("update `wti_m_setting` SET     `value` = '" . json_encode($value, true) . "', serialized = '1'  where  `key_name` = '" . $key . "'");
                }
            }

            $newdata = array('success' => 'Infomation added successfully!');

            $this->session->set_flashdata('success', 'Information updated succssfully..');
            redirect($this->controller . '/homepage');
        }

        $resultdata = array();
        $data['records'] = array();

        $sql = "select * from  `wti_m_setting` where `group_name`='" . $code . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['records'] = array();

        foreach ($resultdata as $key => $value) {
            $data['records'][$value['key_name']] = $value['value'];
        }

        //  print_r($data['records']);

        $this->load->view('websiteadmin/cms_homepage', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    //linkages
    public function linkages($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '101_102';
        $data['title'] = 'Linkages';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/linkages';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/linkages_action';
        $data['edit_link'] = $this->controller . '/linkages_action';

        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
        wti_cms_linkages b where status_flag!='Delete'   order by  b.id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_cms_linkages b where status_flag!='Delete'    order by  b.id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/linkages', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function linkages_action($id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        $data['controller'] = $this->controller;
        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '101_102';
        $data['title'] = 'Linkages';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/linkages/';
        $data['fun_name'] = 'linkages_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

            $add_in_m['name'] = $name = (isset($_POST['name'])) ? $this->common->mysql_safe_string($_POST['name']) : '';

            $add_in_m['sort_order'] = $sort_order = (isset($_POST['sort_order'])) ? $this->common->mysql_safe_string($_POST['sort_no']) : '1';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';
            $add_in_m['date_added'] = $today = date("Y-m-d H:i:s");

            if ($name == '') {
                $error = "Please select years  <br>";
            }

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = 'linkages-' . $name . ".pdf";
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/linkages/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            } else {
                $error = "Please uplaod pdf file<br>";
            }

            if ($error == '') {

                if ($id != "") {
                    $where = "id = '" . $id . "'";
                    $update_status = $this->common->updateRecord('wti_cms_linkages', $add_in_m, $where);
                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                    //print_r($add_in_m);
                    $blogs_id = $this->common->insertRecord('wti_cms_linkages', $add_in_m);
                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_linkages', 'news');

                redirect($this->controller . '/linkages');
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_cms_linkages b where status_flag!='Delete' and b.id = '" . $id . "'  ";
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

                // $sql = "select count('')  as numrows  from wti_cms_linkages        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/linkages_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_linkages($id = 0)
    {

        $sql = "select  id from 	wti_cms_linkages ftm where id='" . $id . "'  ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "id = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $update_status = $this->common->updateRecord('wti_cms_linkages', $add_in, $where_edt);
            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/linkages');
    }
    ////end of linkages

    // E-content

    public function econtent($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '101_105';
        $data['title'] = 'E-Content';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/econtent';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/econtent_action';
        $data['edit_link'] = $this->controller . '/econtent_action';

        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from wti_cms_econtent b where status_flag!='Delete' order by  b.id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_cms_econtent b where status_flag!='Delete'      order by  b.id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/econtent', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function econtent_action($id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);

        $data['controller'] = $this->controller;
        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '101_105';
        $data['title'] = 'E-Content';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/econtent/';
        $data['fun_name'] = 'econtent_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

            $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];
            $add_in_m['title_name'] = $title_name = (isset($_POST['title_name'])) ? $this->common->mysql_safe_string($_POST['title_name']) : '';
            $add_in_m['descriptions'] = $descriptions = (isset($_POST['descriptions'])) ? $this->common->mysql_safe_string($_POST['descriptions']) : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';

            if ($title_name == '') {
                $error = "Please enter heading  <br>";
            }

            if (isset($_FILES['featured_image'])) {
                if ($_FILES['featured_image']['name'] != "") {

                    $thumbpath = $_FILES['featured_image']['name'];
                    $thumbpath = $this->common->tep_short_name_list($thumbpath);

                    $filename = time() . "-" . $thumbpath;

                    $upload = $this->common->UploadImage('featured_image', 'uploads/cms/econtent/', 0, $height_thumb = '', $width_thumb = '', $filename, '');

                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['featured_image'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }
            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {
                    $thumbpath = $this->common->tep_short_name_list($_FILES['pdf_file']['name']);

                    $filename = 'econtent-' . time() . $thumbpath;
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/econtent/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }
            if ($error == '') {

                if ($id != "") {
                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "id = '" . $id . "' ";
                    $update_status = $this->common->updateRecord('wti_cms_econtent', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = "e-content";
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_cms_econtent";
                        $add_in_search['contents'] = $add_in_m['title_name'] . "<br>" . $add_in_m['descriptions'];
                        $add_in_search['urls'] = site_url('e-content');
                        $add_in_search['main_url'] = site_url('e-content');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                    //print_r($add_in_m);
                    $blogs_id = $this->common->insertRecord('wti_cms_econtent', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = "e-content";
                        $add_in_search['section_auto_id'] = $blogs_id;
                        $add_in_search['table_name'] = "wti_cms_econtent";
                        $add_in_search['contents'] = $add_in_m['title_name'] . "<br>" . $add_in_m['descriptions'];
                        $add_in_search['urls'] = site_url('e-content');
                        $add_in_search['main_url'] = site_url('e-content');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_econtent', 'news');

                redirect($this->controller . '/econtent');
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_cms_econtent b where status_flag!='Delete'   and b.id = '" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        } else {
            //
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
                // $data['records']['event_dates'] = $this->common->getDateFormat($data_info['event_dates'],'d-m-Y');
            } else {

                // $sql = "select count('')  as numrows  from wti_cms_econtent        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/econtent_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_econtent($id = 0)
    {
        $session_user_data = $this->session->userdata('user_data');

        $sql = "select  id from 	wti_cms_econtent ftm where id='" . $id . "'     ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "id = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $add_in['edit_date'] = date("Y-m-d H:i:s");
            $add_in['edit_by_user_id'] = $session_user_data['user_id'];
            $update_status = $this->common->updateRecord('wti_cms_econtent', $add_in, $where_edt);
            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/econtent');
    }

    // end of E-content
    ///Incubation

    public function incubation_events($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 2021;
        $data['sub_activaation_id'] = '2021_103';
        $data['title'] = 'Incubation Events';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/incubation_events';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/incubation_events_action';
        $data['edit_link'] = $this->controller . '/incubation_events_action';

        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
    wti_cms_incubation b where status_flag!='Delete'     and data_type='event'  order by  b.id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_cms_incubation b where status_flag!='Delete'    and data_type='event'   order by  b.id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/incubation_events', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function incubation_events_action($id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);

        $data['controller'] = $this->controller;
        $data['activaation_id'] = 2021;
        $data['sub_activaation_id'] = '2021_103';
        $data['title'] = 'incubation';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/incubation_events/';
        $data['fun_name'] = 'incubation_events_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

            $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];

            $add_in_m['name'] = $name = (isset($_POST['name'])) ? $this->common->mysql_safe_string($_POST['name']) : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';
            $add_in_m['data_type'] = 'event';

            if ($name == '') {
                $error = "Please enter name/title  <br>";
            }

            if (isset($_FILES['featured_image'])) {
                if ($_FILES['featured_image']['name'] != "") {

                    $thumbpath = $_FILES['featured_image']['name'];
                    $thumbpath = $this->common->tep_short_name_list($thumbpath);

                    $filename = time() . "-" . $thumbpath;

                    $upload = $this->common->UploadImage('featured_image', 'uploads/cms/incubation/', 0, $height_thumb = '', $width_thumb = '', $filename, '');

                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['featured_image'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }

            if ($error == '') {

                if ($id != "") {
                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "id = '" . $id . "' and data_type='event'";
                    $update_status = $this->common->updateRecord('wti_cms_incubation', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'incubation';
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_cms_incubation";
                        $add_in_search['contents'] = $add_in_m['name'];
                        $add_in_search['urls'] = site_url('incubation');
                        $add_in_search['main_url'] = site_url('incubation');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                    //print_r($add_in_m);
                    $blogs_id = $this->common->insertRecord('wti_cms_incubation', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {
                        $add_in_search['section_name'] = 'incubation';
                        $add_in_search['section_auto_id'] = $blogs_id;
                        $add_in_search['table_name'] = "wti_cms_incubation";
                        $add_in_search['contents'] = $add_in_m['name'];
                        $add_in_search['urls'] = site_url('incubation');
                        $add_in_search['main_url'] = site_url('incubation');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_incubation', 'news');

                redirect($this->controller . '/incubation_events');
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_cms_incubation b where status_flag!='Delete'  and data_type='event' and b.id = '" . $id . "'  ";
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

                // $sql = "select count('')  as numrows  from wti_cms_incubation        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/incubation_events_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_incubation($id = 0)
    {
        $session_user_data = $this->session->userdata('user_data');

        $sql = "select  id from 	wti_cms_incubation ftm where id='" . $id . "'     and data_type='event' ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "id = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $add_in['edit_date'] = date("Y-m-d H:i:s");
            $add_in['edit_by_user_id'] = $session_user_data['user_id'];
            $update_status = $this->common->updateRecord('wti_cms_incubation', $add_in, $where_edt);

            $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
            $this->db->query($sql);

            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/incubation_events');
    }

    public function incubation_ventures($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 2021;
        $data['sub_activaation_id'] = '2021_104';
        $data['title'] = 'Incubation Ventures';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/incubation_ventures';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/incubation_ventures_action';
        $data['edit_link'] = $this->controller . '/incubation_ventures_action';

        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
    wti_cms_incubation b where status_flag!='Delete'    and data_type='venture'   order by  b.id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_cms_incubation b where status_flag!='Delete'   and data_type='venture'   order by  b.id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/incubation_ventures', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function incubation_ventures_action($id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);

        $data['controller'] = $this->controller;
        $data['activaation_id'] = 2021;
        $data['sub_activaation_id'] = '2021_104';
        $data['title'] = 'incubation';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/incubation_ventures/';
        $data['fun_name'] = 'incubation_ventures_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

            $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];
            $add_in_m['name'] = $name = (isset($_POST['name'])) ? $this->common->mysql_safe_string($_POST['name']) : '';

            $add_in_m['venture_name'] = $venture_name = (isset($_POST['venture_name'])) ? $this->common->mysql_safe_string($_POST['venture_name']) : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';
            $add_in_m['data_type'] = 'venture';

            if ($name == '') {
                $error = "Please enter name/title  <br>";
            }
            if ($venture_name == '') {
                $error = "Please enter Venture Name  <br>";
            }

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {
                    $thumbpath = $this->common->tep_short_name_list($name);

                    $filename = 'incubation-' . time() . $thumbpath . ".pdf";
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/incubation/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            } else {
                $error .= "Please uplaod pdf file<br>";
            }

            if ($error == '') {

                if ($id != "") {
                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "id = '" . $id . "' and data_type='venture'";
                    $update_status = $this->common->updateRecord('wti_cms_incubation', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'incubation';
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_cms_incubation";
                        $add_in_search['contents'] = $add_in_m['name'];
                        $add_in_search['urls'] = site_url('incubation');
                        $add_in_search['main_url'] = site_url('incubation');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                    //print_r($add_in_m);
                    $blogs_id = $this->common->insertRecord('wti_cms_incubation', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'incubation';
                        $add_in_search['section_auto_id'] = $blogs_id;
                        $add_in_search['table_name'] = "wti_cms_incubation";
                        $add_in_search['contents'] = $add_in_m['name'];
                        $add_in_search['urls'] = site_url('incubation');
                        $add_in_search['main_url'] = site_url('incubation');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_incubation', 'news');

                redirect($this->controller . '/incubation_ventures');
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_cms_incubation b where status_flag!='Delete' and data_type='venture' and b.id = '" . $id . "'  ";
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

                // $sql = "select count('')  as numrows  from wti_cms_incubation        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/incubation_ventures_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_incubation_ventures($id = 0)
    {
        $session_user_data = $this->session->userdata('user_data');

        $sql = "select  id from 	wti_cms_incubation ftm where id='" . $id . "' and data_type='venture'  ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "id = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $add_in['edit_date'] = date("Y-m-d H:i:s");
            $add_in['edit_by_user_id'] = $session_user_data['user_id'];
            $update_status = $this->common->updateRecord('wti_cms_incubation', $add_in, $where_edt);

            $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
            $this->db->query($sql);

            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/incubation_ventures');
    }
    //end of inCubation
    public function save_base64_image($base64_image_string, $output_file_without_extension, $path_with_end_slash = "")
    {
        //usage:  if( substr( $img_src, 0, 5 ) === "data:" ) {  $filename=save_base64_image($base64_image_string, $output_file_without_extentnion, getcwd() . "/application/assets/pins/$user_id/"); }
        //
        //data is like:    data:image/png;base64,asdfasdfasdf
        $splited = explode(',', substr($base64_image_string, 5), 2);
        $mime = $splited[0];
        $data = $splited[1];

        $mime_split_without_base64 = explode(';', $mime, 2);
        $mime_split = explode('/', $mime_split_without_base64[0], 2);
        if (count($mime_split) == 2) {
            $extension = $mime_split[1];
            if ($extension == 'jpeg') {
                $extension = 'jpg';
            }

            //if($extension=='javascript')$extension='js';
            //if($extension=='text')$extension='txt';
            $output_file_with_extension = $output_file_without_extension . '.' . $extension;
        }
        file_put_contents($path_with_end_slash . $output_file_with_extension, base64_decode($data));
        return $output_file_with_extension;
    }

    // Placement Events

    public function placementevents($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 2011;
        $data['sub_activaation_id'] = '2011_4';
        $data['title'] = 'Events Organised in College';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/placementevents';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/placementevents_action/Events';
        $data['edit_link'] = $this->controller . '/placementevents_action/Events';

        $data['controller'] = $this->controller;
        $data['data_type'] = 'Events';
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
      wti_m_placement_events  b where  status_flag!='Delete'   and data_type='Events'    order by  b.event_dates_from desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_m_placement_events b where status_flag!='Delete'   and data_type='Events'      order by  b.event_dates_from desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/placementevents', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function placementWebinar($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 2011;
        $data['sub_activaation_id'] = '2011_5';
        $data['title'] = 'Webinar Conducted';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/placementWebinar';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/placementevents_action/Webinar';
        $data['edit_link'] = $this->controller . '/placementevents_action/Webinar';

        $data['controller'] = $this->controller;
        $data['data_type'] = 'Webinar';
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
      wti_m_placement_events  b where  status_flag!='Delete'  and data_type='Webinar'       order by  b.event_dates_from desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_m_placement_events b where status_flag!='Delete'  and data_type='Webinar'       order by  b.event_dates_from desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/placementevents', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function placementevents_action($data_type = 'Events', $id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);

        $data['controller'] = $this->controller;
        $data['activaation_id'] = 2011;
        $data['sub_activaation_id'] = ($data_type == 'Events') ? '2011_4' : '2011_5';
        $data['title'] = (isset($data_type) && $data_type == "Events") ? 'Events Organised in College' : 'Webinar Conducted';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';

        $data['data_type'] = $data_type;

        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = ($data_type == 'Events') ? $this->controller . '/placementevents/' : $this->controller . '/placementWebinar/';
        $data['fun_name'] = 'placementevents_action/' . $data_type . '/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
            $add_in_m['data_type'] = $data_type;
            $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];
            $add_in_m['heading'] = $heading = (isset($_POST['heading'])) ? $this->common->mysql_safe_string($_POST['heading']) : '';
            $add_in_m['descriptions'] = $descriptions = (isset($_POST['descriptions'])) ? $this->input->post('descriptions') : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';
            $event_dates_from = (isset($_POST['event_dates_from'])) ? $this->common->mysql_safe_string($_POST['event_dates_from']) : '';

            $event_dates_to = (isset($_POST['event_dates_to'])) ? $this->common->mysql_safe_string($_POST['event_dates_to']) : '';

            if ($descriptions == '') {
                $error = "Please enter descriptions";
            }

            if ($error == '') {

                if (!empty($event_dates_from)) {
                    $add_in_m['event_dates_from'] = $this->common->dateexplode("-", $event_dates_from);
                    //  $add_in_m['event_dates_from'] = $event_dates_from;
                }
                if (!empty($event_dates_to)) {
                    $add_in_m['event_dates_to'] = $this->common->dateexplode("-", $event_dates_to);
                    //  $add_in_m['event_dates_to'] = $event_dates_to;
                } else {
                    $add_in_m['event_dates_to'] = '';
                }

                if ($id != "") {
                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "uuid = '" . $id . "' ";
                    $update_status = $this->common->updateRecord('wti_m_placement_events', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'placement';
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_m_placement_events";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['descriptions'];
                        $add_in_search['urls'] = site_url('placement');
                        $add_in_search['main_url'] = site_url('placement');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                    //print_r($add_in_m);
                    $uuid = "";
                    try {

                        // Generate a version 4 (random) UUID object
                        $uuid4 = Uuid::uuid4();
                        $add_in_m['uuid'] = $uuid4->toString();
                    } catch (UnsatisfiedDependencyException $e) {
                        //  echo 'Caught exception: ' . $e->getMessage() . "\n";
                    }

                    $blogs_id = $this->common->insertRecord('wti_m_placement_events', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'placement';
                        $add_in_search['section_auto_id'] = $add_in_m['uuid'];
                        $add_in_search['table_name'] = "wti_m_placement_events";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['descriptions'];
                        $add_in_search['urls'] = site_url('placement');
                        $add_in_search['main_url'] = site_url('placement');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }
                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_econtent', 'news');
                //echo $data_type;exit;
                if ($data_type == "Events") {
                    redirect($this->controller . '/placementevents');
                } else {
                    redirect($this->controller . '/placementWebinar');
                }
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_m_placement_events b where status_flag!='Delete'   and b.uuid = '" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
                $data['records']['event_dates_from'] = $this->common->getDateFormat($data_info['event_dates_from'], 'd-m-Y');
                $data['records']['event_dates_to'] = ($data_info['event_dates_to'] != '') ? $this->common->getDateFormat($data_info['event_dates_to'], 'd-m-Y') : '';
            }
        } else {
            //
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
                $data['records']['event_dates_from'] = $this->common->getDateFormat($data_info['event_dates_from'], 'd-m-Y');
                $data['records']['event_dates_to'] = ($data_info['event_dates_to'] != '') ? $this->common->getDateFormat($data_info['event_dates_to'], 'd-m-Y') : '';
            } else {

                // $sql = "select count('')  as numrows  from wti_cms_econtent        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/placementevents_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_placementevents($data_type = 'Events', $id = "")
    {
        $session_user_data = $this->session->userdata('user_data');

        $sql = "select  uuid from 	wti_m_placement_events ftm where uuid='" . $id . "'     ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "uuid = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $add_in['edit_date'] = date("Y-m-d H:i:s");
            $add_in['edit_by_user_id'] = $session_user_data['user_id'];
            $update_status = $this->common->updateRecord('wti_m_placement_events', $add_in, $where_edt);
            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        if ($data_type == "Events") {
            redirect($this->controller . '/placementevents');
        } else {
            redirect($this->controller . '/placementWebinar');
        }
    }
    // end of placement events

    //committee members
    public function committeemembers($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 2011;
        $data['sub_activaation_id'] = '2011_3';
        $data['title'] = 'Committee Members';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/committeemembers';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/committeemembers_action';
        $data['edit_link'] = $this->controller . '/committeemembers_action';

        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from      wti_m_placement_committee  b where  status_flag!='Delete'   order by  b.heading asc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_m_placement_committee b where status_flag!='Delete'        order by  b.heading asc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/committeemembers', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function committeemembers_action($id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);

        $data['controller'] = $this->controller;
        $data['activaation_id'] = 2011;
        $data['sub_activaation_id'] = '2011_3';
        $data['title'] = 'Committee Members';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';

        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/committeemembers/';
        $data['fun_name'] = 'committeemembers_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

            $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];

            $add_in_m['data_type'] = $data_type = (isset($_POST['data_type'])) ? $this->common->mysql_safe_string($_POST['data_type']) : '';

            $add_in_m['heading'] = $heading = (isset($_POST['heading'])) ? $this->common->mysql_safe_string($_POST['heading']) : '';
            $add_in_m['post_name'] = $post_name = (isset($_POST['post_name'])) ? $this->common->mysql_safe_string($_POST['post_name']) : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';

            if ($heading == '') {
                $error = "Please enter name";
            }
            if ($post_name == '') {
                $error = "Please enter post name";
            }

            if ($error == '') {

                if ($id != "") {
                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "uuid = '" . $id . "' ";
                    $update_status = $this->common->updateRecord('wti_m_placement_committee', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'placement';
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_m_placement_committee";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['data_type'];
                        $add_in_search['urls'] = site_url('placement');
                        $add_in_search['main_url'] = site_url('placement');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                    //print_r($add_in_m);
                    $uuid = "";
                    try {

                        // Generate a version 4 (random) UUID object
                        $uuid4 = Uuid::uuid4();
                        $add_in_m['uuid'] = $uuid4->toString();
                    } catch (UnsatisfiedDependencyException $e) {
                        //  echo 'Caught exception: ' . $e->getMessage() . "\n";
                    }

                    $blogs_id = $this->common->insertRecord('wti_m_placement_committee', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'placement';
                        $add_in_search['section_auto_id'] = $add_in_m['uuid'];
                        $add_in_search['table_name'] = "wti_m_placement_committee";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['data_type'];
                        $add_in_search['urls'] = site_url('placement');
                        $add_in_search['main_url'] = site_url('placement');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }
                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_econtent', 'news');
                //echo $data_type;exit;
                redirect($this->controller . '/committeemembers');
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_m_placement_committee b where status_flag!='Delete'   and b.uuid = '" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        } else {
            //
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
            } else {

                // $sql = "select count('')  as numrows  from wti_cms_econtent        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/committeemembers_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_committeemembers($id = "")
    {
        $session_user_data = $this->session->userdata('user_data');

        $sql = "select  uuid from 	wti_m_placement_events ftm where uuid='" . $id . "'     ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "uuid = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $add_in['edit_date'] = date("Y-m-d H:i:s");
            $add_in['edit_by_user_id'] = $session_user_data['user_id'];
            $update_status = $this->common->updateRecord('wti_m_placement_events', $add_in, $where_edt);

            $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
            $this->db->query($sql);

            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/committeemembers');
    }
    //end of committee members

    //research
    public function research($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 2031;
        $data['sub_activaation_id'] = '2031_1';
        $data['title'] = 'Research  Activities / Workshop';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/research';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/research_action';
        $data['edit_link'] = $this->controller . '/research_action';

        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from      wti_m_research_workshop  b where  status_flag!='Delete'   order by  b.heading asc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_m_research_workshop b where status_flag!='Delete'         ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/research', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function research_action($id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);

        $data['controller'] = $this->controller;
        $data['activaation_id'] = 2031;
        $data['sub_activaation_id'] = '2031_1';
        $data['title'] = 'Research  Activities / Workshop';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';

        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/research/';
        $data['fun_name'] = 'research_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];

            $add_in_m['data_type'] = $data_type = (isset($_POST['data_type'])) ? $this->common->mysql_safe_string($_POST['data_type']) : '';

            $add_in_m['heading'] = $heading = (isset($_POST['heading'])) ? $this->common->mysql_safe_string($_POST['heading']) : '';
            $add_in_m['date_year'] = $date_year = (isset($_POST['date_year'])) ? $this->common->mysql_safe_string($_POST['date_year']) : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';

            $add_in_m['session_name'] = $session_name = (isset($_POST['session_name'])) ? $this->common->mysql_safe_string($_POST['session_name']) : '';

            $add_in_m['video_url'] = $video_url = (isset($_POST['video_url'])) ? $this->common->mysql_safe_string($_POST['video_url']) : '';

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = $_FILES['pdf_file']['name'];
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/research/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }
            if (isset($_FILES['main_image'])) {
                if ($_FILES['main_image']['name'] != "") {

                    $thumbpath = $_FILES['main_image']['name'];
                    $thumbpath = $this->common->tep_short_name_list($thumbpath);

                    $filename = time() . "-" . $thumbpath;

                    $upload = $this->common->UploadImage('main_image', 'uploads/cms/research/', 0, $height_thumb = '', $width_thumb = '', $filename, '');

                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['main_image'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }

            if ($heading == '') {
                $error = "Please enter name";
            }
            if ($date_year == '') {
                $error = "Please enter Date";
            }

            if ($error == '') {

                if ($id != "") {

                    $add_in_m['edit_date'] = date("Y-m-d H:i:s");
                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "uuid = '" . $id . "' ";
                    $update_status = $this->common->updateRecord('wti_m_research_workshop', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'research-activity';
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_m_research_workshop";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['session_name'] . "<br>" . $add_in_m['data_type'];
                        $add_in_search['urls'] = site_url('research-activity');
                        $add_in_search['main_url'] = site_url('research-activity');
                        $add_in_search['slug_name'] = '';

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

                    //print_r($add_in_m);
                    $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
                    $blogs_id = $this->common->insertRecord('wti_m_research_workshop', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {
                        $add_in_search['section_name'] = 'research-activity';
                        $add_in_search['section_auto_id'] = $add_in_m['uuid'];
                        $add_in_search['table_name'] = "wti_m_research_workshop";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['session_name'] . "<br>" . $add_in_m['data_type'];
                        $add_in_search['urls'] = site_url('research-activity');
                        $add_in_search['main_url'] = site_url('research-activity');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_econtent', 'news');
                //echo $data_type;exit;
                redirect($this->controller . '/research');
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_m_research_workshop b where status_flag!='Delete'   and b.uuid = '" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        } else {
            //
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
            } else {

                // $sql = "select count('')  as numrows  from wti_cms_econtent        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/research_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_research($id = "")
    {
        $session_user_data = $this->session->userdata('user_data');

        $sql = "select  uuid from 	wti_m_research_workshop ftm where uuid='" . $id . "'     ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "uuid = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $add_in['edit_date'] = date("Y-m-d H:i:s");
            $add_in['edit_by_user_id'] = $session_user_data['user_id'];
            $update_status = $this->common->updateRecord('wti_m_research_workshop', $add_in, $where_edt);

            $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
            $this->db->query($sql);

            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/research');
    }

    public function researchcourse($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 2031;
        $data['sub_activaation_id'] = '2031_2';
        $data['title'] = 'Research Activities / Courses Offered';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/researchcourse';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/researchcourse_action';
        $data['edit_link'] = $this->controller . '/researchcourse_action';

        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
    wti_m_research_coursesoffered b where status_flag!='Delete'   order by  b.id desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_m_research_coursesoffered b where status_flag='Delete'   order by  b.id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/researchcourse', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function researchcourse_action($id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        $data['controller'] = $this->controller;
        $data['activaation_id'] = 2031;
        $data['sub_activaation_id'] = '2031_2';
        $data['title'] = 'Research Activities / Courses Offered';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/researchcourse/';
        $data['fun_name'] = 'researchcourse_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

            $add_in_m['name'] = $name = (isset($_POST['name'])) ? $this->common->mysql_safe_string($_POST['name']) : '';

            $add_in_m['sort_order'] = $sort_order = (isset($_POST['sort_order'])) ? $this->common->mysql_safe_string($_POST['sort_no']) : '1';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';
            $add_in_m['date_added'] = $today = date("Y-m-d H:i:s");

            if ($name == '') {
                $error = "Please enter title  <br>";
            }

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = $_FILES['pdf_file']['name'];
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/research/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            } else {
                $error = "Please uplaod pdf file<br>";
            }

            if ($error == '') {

                if ($id != "") {
                    $where = "id = '" . $id . "'";
                    $update_status = $this->common->updateRecord('wti_m_research_coursesoffered', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'research-activity';
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_m_research_coursesoffered";
                        $add_in_search['contents'] = $add_in_m['name'];
                        $add_in_search['urls'] = site_url('research-activity');
                        $add_in_search['main_url'] = site_url('research-activity');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                    //print_r($add_in_m);
                    $blogs_id = $this->common->insertRecord('wti_m_research_coursesoffered', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'research-activity';
                        $add_in_search['section_auto_id'] = $blogs_id;
                        $add_in_search['table_name'] = "wti_m_research_coursesoffered";
                        $add_in_search['contents'] = $add_in_m['name'];
                        $add_in_search['urls'] = site_url('research-activity');
                        $add_in_search['main_url'] = site_url('research-activity');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_m_research_coursesoffered', 'news');

                redirect($this->controller . '/researchcourse');
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_m_research_coursesoffered b where status_flag!='Delete' and b.id = '" . $id . "'  ";
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

                // $sql = "select count('')  as numrows  from wti_m_research_coursesoffered        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/researchcourse_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_researchcourse($id = "")
    {
        $sql = "select  id from 	wti_m_research_coursesoffered ftm where id='" . $id . "'  ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "id = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $update_status = $this->common->updateRecord('wti_m_research_coursesoffered', $add_in, $where_edt);
            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/researchcourse');
    }
    //end research

    //programme

    public function ug_common($menu_name = 'RM-hospitality-programm', $start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 2041;
        $data['sub_activaation_id'] = '2041_1';
        $data['sub_activaation_id2'] = '2041_1_2';
        $data['title'] = 'Undergraduate / ' . $menu_name;
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/ug_common';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/ug_commons_action/' . $menu_name;
        $data['edit_link'] = $this->controller . '/ug_commons_action/' . $menu_name;

        $data['redirectto'] = 'ug_common';

        $data['controller'] = $this->controller;
        $data['menu_name'] = $menu_name;
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['data_type'] = 'Undergraduate';
        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
        wti_cms_programme  b where  status_flag!='Delete'  and menu_name='{$menu_name}' order by  b.id  desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_cms_programme b where status_flag!='Delete' and menu_name='{$menu_name}'    order by  b.id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/ug_common', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function pg_common($menu_name = 'RM-hospitality-programm', $start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 2041;
        $data['sub_activaation_id'] = '2042_2_1';
        $data['sub_activaation_id2'] = '2042_1_2';
        $data['title'] = 'Postgraduate / ' . $menu_name;
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/ug_common';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/pg_commons_action/' . $menu_name;
        $data['edit_link'] = $this->controller . '/pg_commons_action/' . $menu_name;

        $data['redirectto'] = 'pg_common';

        $data['controller'] = $this->controller;
        $data['menu_name'] = $menu_name;
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['data_type'] = 'Postgraduate';
        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
        wti_cms_programme  b where  status_flag!='Delete'  and menu_name='{$menu_name}' order by  b.id  desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_cms_programme b where status_flag!='Delete' and menu_name='{$menu_name}'    order by  b.id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/ug_common', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function pg_commons_action($menu_name = 'RM-hospitality-programm', $id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);

        $data['controller'] = $this->controller;

        $data['activaation_id'] = 2041;
        $data['sub_activaation_id'] = '2042_2_1';
        $data['sub_activaation_id2'] = '2042_1_2';
        $data['title'] = 'Postgraduate / ' . $menu_name;
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';

        $data['menu_name'] = $menu_name;
        $data['data_type'] = 'Postgraduate';

        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/pg_common/' . $menu_name;
        $data['fun_name'] = 'pg_commons_action/' . $menu_name . '/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
            $add_in_m['menu_name'] = $menu_name;
            $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];
            $add_in_m['heading'] = $heading = (isset($_POST['heading'])) ? $this->common->mysql_safe_string($_POST['heading']) : '';
            $add_in_m['date_eevents'] = $date_eevents = (isset($_POST['date_eevents'])) ? $this->common->mysql_safe_string($_POST['date_eevents']) : '';
            $add_in_m['descriptions'] = $descriptions = (isset($_POST['descriptions'])) ? $this->common->mysql_safe_string($_POST['descriptions']) : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';

            if ($heading == '') {
                $error = "Please enter heading";
            }

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = time() . "-" . $_FILES['pdf_file']['name'];
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/programme/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }
            if (isset($_FILES['main_image'])) {
                if ($_FILES['main_image']['name'] != "") {

                    $thumbpath = $_FILES['main_image']['name'];
                    $thumbpath = $this->common->tep_short_name_list($thumbpath);

                    $filename = time() . "-" . $thumbpath;

                    $upload = $this->common->UploadImage('main_image', 'uploads/cms/programme/', 0, $height_thumb = '', $width_thumb = '', $filename, '');

                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['main_image'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }

            if ($error == '') {

                if ($id != "") {
                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "uuid = '" . $id . "' ";
                    $update_status = $this->common->updateRecord('wti_cms_programme', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = $menu_name;
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_cms_programme";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['descriptions'];
                        $add_in_search['urls'] = site_url($menu_name);
                        $add_in_search['main_url'] = site_url($menu_name);
                        $add_in_search['slug_name'] = '';

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

                    //print_r($add_in_m);
                    $blogs_id = $this->common->insertRecord('wti_cms_programme', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {
                        $add_in_search['section_name'] = $menu_name;
                        $add_in_search['section_auto_id'] = $add_in_m['uuid'];
                        $add_in_search['table_name'] = "wti_cms_programme";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['descriptions'];
                        $add_in_search['urls'] = site_url($menu_name);
                        $add_in_search['main_url'] = site_url($menu_name);
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_econtent', 'news');
                //echo $menu_name;exit;
                redirect($this->controller . '/pg_common/' . $menu_name);
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_cms_programme b where status_flag!='Delete'   and b.uuid = '" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        } else {
            //
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
            } else {

                // $sql = "select count('')  as numrows  from wti_cms_econtent        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/ug_commons_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function ug_commons_action($menu_name = 'RM-hospitality-programm', $id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);

        $data['controller'] = $this->controller;
        $data['activaation_id'] = 2041;
        $data['sub_activaation_id'] = '2041_1';
        $data['sub_activaation_id2'] = '2041_1_2';
        $data['title'] = 'Undergraduate / ' . $menu_name;
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';

        $data['menu_name'] = $menu_name;
        $data['data_type'] = 'Undergraduate';

        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/ug_common/' . $menu_name;
        $data['fun_name'] = 'ug_commons_action/' . $menu_name . '/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
            $add_in_m['menu_name'] = $menu_name;
            $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];
            $add_in_m['heading'] = $heading = (isset($_POST['heading'])) ? $this->common->mysql_safe_string($_POST['heading']) : '';
            $add_in_m['descriptions'] = $descriptions = (isset($_POST['descriptions'])) ? $this->common->mysql_safe_string($_POST['descriptions']) : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';

            if ($heading == '') {
                $error = "Please enter heading";
            }

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = time() . "-" . $_FILES['pdf_file']['name'];
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/programme/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }
            if (isset($_FILES['main_image'])) {
                if ($_FILES['main_image']['name'] != "") {

                    $thumbpath = $_FILES['main_image']['name'];
                    $thumbpath = $this->common->tep_short_name_list($thumbpath);

                    $filename = time() . "-" . $thumbpath;

                    $upload = $this->common->UploadImage('main_image', 'uploads/cms/programme/', 0, $height_thumb = '', $width_thumb = '', $filename, '');

                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['main_image'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }

            if ($error == '') {

                if ($id != "") {

                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "uuid = '" . $id . "' ";
                    $update_status = $this->common->updateRecord('wti_cms_programme', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if ($add_in_m['status_flag'] == 'Active') {
                        $add_in_search['section_name'] = $menu_name;
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_cms_programme";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['descriptions'];
                        $add_in_search['urls'] = site_url($menu_name);
                        $add_in_search['main_url'] = site_url($menu_name);
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                    //print_r($add_in_m);

                    $uuid = "";
                    try {

                        // Generate a version 4 (random) UUID object
                        $uuid4 = Uuid::uuid4();
                        $add_in_m['uuid'] = $uuid4->toString();
                    } catch (UnsatisfiedDependencyException $e) {
                        //  echo 'Caught exception: ' . $e->getMessage() . "\n";
                    }

                    $blogs_id = $this->common->insertRecord('wti_cms_programme', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {
                        $add_in_search['section_name'] = $menu_name;
                        $add_in_search['section_auto_id'] = $add_in_m['uuid'];
                        $add_in_search['table_name'] = "wti_cms_programme";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['descriptions'];
                        $add_in_search['urls'] = site_url($menu_name);
                        $add_in_search['main_url'] = site_url($menu_name);
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }
                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_econtent', 'news');
                //echo $menu_name;exit;
                redirect($this->controller . '/ug_common/' . $menu_name);
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_cms_programme b where status_flag!='Delete'   and b.uuid = '" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        } else {
            //
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
            } else {

                // $sql = "select count('')  as numrows  from wti_cms_econtent        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/ug_commons_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_ug_common($menu_name = 'RM-hospitality-programm', $redirectto = "ug_common", $id = "")
    {
        $session_user_data = $this->session->userdata('user_data');

        $sql = "select  uuid from 	wti_cms_programme ftm where uuid='" . $id . "'     ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "uuid = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $add_in['edit_date'] = date("Y-m-d H:i:s");
            $add_in['edit_by_user_id'] = $session_user_data['user_id'];
            $update_status = $this->common->updateRecord('wti_cms_programme', $add_in, $where_edt);

            $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
            $this->db->query($sql);

            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/' . $redirectto . '/' . $menu_name);
    }
    //end of programme

    // skillbasedcourses
    public function skillbasedcourses($start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');

        $data['activaation_id'] = 2041;
        $data['sub_activaation_id'] = '';
        $data['sub_activaation_id2'] = '';
        $data['title'] = 'Skill Based Courses';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/skillbasedcourses';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/skillbasedcourses_action/';
        $data['edit_link'] = $this->controller . '/skillbasedcourses_action/';

        $data['controller'] = $this->controller;
        $menu_name = "skillbasedcourses";
        $data['menu_name'] = $menu_name;
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['controller'] = $this->controller;

        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
        wti_cms_programme  b where  status_flag!='Delete'  and menu_name='{$menu_name}' order by  b.id  asc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_cms_programme b where status_flag!='Delete' and menu_name='{$menu_name}'    order by  b.id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/skillbasedcourses', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function skillbasedcourses_action($id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);

        $data['controller'] = $this->controller;
        $data['activaation_id'] = 2041;
        $data['sub_activaation_id'] = '2041_1';
        $data['sub_activaation_id2'] = '2041_1_2';
        $data['title'] = 'Skill Based Courses';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';

        $data['menu_name'] = 'skillbasedcourses';
        $data['data_type'] = 'skillbasedcourses';

        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/skillbasedcourses';
        $data['fun_name'] = 'skillbasedcourses_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
            $add_in_m['menu_name'] = 'skillbasedcourses';
            $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];
            $add_in_m['heading'] = $heading = (isset($_POST['heading'])) ? $this->common->mysql_safe_string($_POST['heading']) : '';
            $add_in_m['descriptions'] = $descriptions = (isset($_POST['descriptions'])) ? $this->common->mysql_safe_string($_POST['descriptions']) : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';

            if ($heading == '') {
                $error = "Please enter heading";
            }

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = time() . "-" . $_FILES['pdf_file']['name'];
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/programme/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }

            if ($error == '') {

                if ($id != "") {
                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "uuid = '" . $id . "' ";
                    $update_status = $this->common->updateRecord('wti_cms_programme', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);
                    if ($add_in_m['status_flag'] == 'Active') {

                        $add_in_search['section_name'] = 'skill-based-courses';
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_cms_programme";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['descriptions'];
                        $add_in_search['urls'] = site_url('skill-based-courses');
                        $add_in_search['main_url'] = site_url('skill-based-courses');
                        $add_in_search['slug_name'] = '';

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

                    //print_r($add_in_m);
                    $blogs_id = $this->common->insertRecord('wti_cms_programme', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {
                        $add_in_search['section_name'] = 'skill-based-courses';
                        $add_in_search['section_auto_id'] = $add_in_m['uuid'];
                        $add_in_search['table_name'] = "wti_cms_programme";
                        $add_in_search['contents'] = $add_in_m['heading'] . "<br>" . $add_in_m['descriptions'];
                        $add_in_search['urls'] = site_url('skill-based-courses');
                        $add_in_search['main_url'] = site_url('skill-based-courses');
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_econtent', 'news');
                //echo $menu_name;exit;
                redirect($this->controller . '/skillbasedcourses');
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_cms_programme b where status_flag!='Delete'   and b.uuid = '" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        } else {
            //
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
            } else {

                // $sql = "select count('')  as numrows  from wti_cms_econtent        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/skillbasedcourses_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_skillbasedcourses($id = 0)
    {

        $sql = "select  uuid from 	wti_cms_programme ftm where uuid='" . $id . "'  ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "uuid = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $update_status = $this->common->updateRecord('wti_cms_programme', $add_in, $where_edt);

            $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
            $this->db->query($sql);

            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/skillbasedcourses');
    }
    // end of skillbasedcourses
    //result
    public function result($degree_name = 'bsc-result', $start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        $degree_name_lc = strtolower($degree_name);

        $degree_year[$degree_name_lc] = $this->config->item($degree_name_lc);

        $data['activaation_id'] = 2051;
        $data['sub_activaation_id'] = '2051_1';
        $data['sub_activaation_id2'] = '2051_1_2';

        $data['title'] = 'Result / ' . strtoupper($degree_name);
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/result';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/result_action/' . $degree_name;
        $data['edit_link'] = $this->controller . '/result_action/' . $degree_name;

        $data['redirectto'] = 'result';

        $data['controller'] = $this->controller;
        $data['degree_name'] = $degree_name;
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['data_type'] = 'Postgraduate';
        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
        wti_cms_exam_result  b where  status_flag!='Delete'  and degree_name='{$degree_name_lc}' order by  b.id  desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_cms_exam_result b where status_flag!='Delete' and degree_name='{$degree_name_lc}'    order by  b.id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/result', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function result_action($degree_name = 'bsc-result', $id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);
        $degree_year_name = strtolower($degree_name);
      //  $degree_year_master = $this->config->item($degree_year_name);
 
        $sql = "select * from wti_m_exam_tab   b  where exam_name='{$degree_name}' order by  `exam_name` ASC ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
           // print_r($resultdata);
          //  print_r($degree_year_master);
            foreach($resultdata as $key => $value){
                $degree_year_master[$key] = $value['tab_name'];
            }
        }
 
        $data['controller'] = $this->controller;

        $data['activaation_id'] = 2051;
        $data['sub_activaation_id'] = '2051_1';
        $data['sub_activaation_id2'] = '2051_1_2';

        $data['title'] = $degree_name;
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';

        $data['degree_year_master'] = $degree_year_master;

        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/result/' . $degree_name;
        $data['fun_name'] = 'result_action/' . $degree_name . '/' . $id;
        $data['controller'] = $this->controller;

        $error = '';
        // print_r($degree_year_master);exit;
        $data_info = array();
        //
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
            $add_in_m['degree_name'] = $degree_name;
            $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];

            $add_in_m['degree_year'] = $degree_year = (isset($_POST['degree_year'])) ? $this->common->mysql_safe_string($_POST['degree_year']) : '';

            $add_in_m['semester'] = $semester = (isset($_POST['semester'])) ? $this->common->mysql_safe_string($_POST['semester']) : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';

            if ($degree_year == '') {
                $error = "Please select degree year";
            }
            if ($semester == '') {
                $error = "Please enter semester name";
            }

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = time() . "-" . $_FILES['pdf_file']['name'];
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/result/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }

            if ($error == '') {

                if ($id != "") {
                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "id = '" . $id . "' ";
                    $update_status = $this->common->updateRecord('wti_cms_exam_result', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);

                    if ($add_in_m['status_flag'] == 'Active') {
                        $add_in_search['section_name'] = $degree_name;
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_cms_exam_result";
                        $add_in_search['contents'] = $add_in_m['degree_name'] . "<br>" . $add_in_m['semester'];
                        $add_in_search['urls'] = site_url($degree_name);
                        $add_in_search['main_url'] = site_url($degree_name);
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                    //print_r($add_in_m);
                    $blogs_id = $this->common->insertRecord('wti_cms_exam_result', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {
                        $add_in_search['section_name'] = $degree_name;
                        $add_in_search['section_auto_id'] = $blogs_id;
                        $add_in_search['table_name'] = "wti_cms_exam_result";
                        $add_in_search['contents'] = $add_in_m['degree_name'] . "<br>" . $add_in_m['semester'];
                        $add_in_search['urls'] = site_url($degree_name);
                        $add_in_search['main_url'] = site_url($degree_name);
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }
                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_econtent', 'news');
                //echo $degree_name;exit;
                redirect($this->controller . '/result/' . $degree_name);
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_cms_exam_result b where status_flag!='Delete'   and b.id = '" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        } else {
            //
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
            } else {

                // $sql = "select count('')  as numrows  from wti_cms_econtent        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/result_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function delete_data_result($degree_name = 'bcs', $id = "")
    {
        $session_user_data = $this->session->userdata('user_data');

        $sql = "select  id from 	wti_cms_exam_result ftm where id='" . $id . "'     ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $where_edt = "id = '{$id}' ";
            $add_in['status_flag'] = 'Delete';
            $add_in['edit_date'] = date("Y-m-d H:i:s");
            $add_in['edit_by_user_id'] = $session_user_data['user_id'];
            $update_status = $this->common->updateRecord('wti_cms_exam_result', $add_in, $where_edt);

            $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
            $this->db->query($sql);

            //  $rowdata = $query->row_array();
            //   $sql = "delete from     wti_cms_econtent where uuid='" . $id . "'  ";
            //  $this->db->query($sql);
            //$this->common->createjson('wti_cms_econtent', 'news');
            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/result/' . $degree_name);
    }
    //end of resut
    public function resulttab( $start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');
         
        
        $data['activaation_id'] = 2051;
        $data['sub_activaation_id'] = '2051_1';
        $data['sub_activaation_id2'] = '2051_1_2';

        $data['title'] = 'Result / Tab';
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/resulttab';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/resulttab_action';
        $data['edit_link'] = $this->controller . '/resulttab_action';

        $data['redirectto'] = 'result';

        $data['controller'] = $this->controller;
        
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        
        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
        wti_m_exam_tab  b order by  `exam_name` ASC " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_m_exam_tab b    order by `exam_name` ASC ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/resulttab', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function delete_resulttab( $id = "")
    {
        $session_user_data = $this->session->userdata('user_data');

        $sql = "select  id from 	wti_m_exam_tab ftm where id='" . $id . "'     ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            $sql = "delete from 	wti_m_exam_tab where id='" . $id . "'  ";
            $this->db->query($sql);

            $this->session->set_flashdata('success', 'Deleted successfully.');
        } else {
            $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
        }

        redirect($this->controller . '/resulttab');
    }
    public function resulttab_action($id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);

        $data['controller'] = $this->controller;
        $data['activaation_id'] = 2051;
        $data['sub_activaation_id'] = '2051_1';
        $data['title'] = 'Result Tabs';
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';

        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/resulttab/';
        $data['fun_name'] = 'resulttab_action/' . $id;
        $data['controller'] = $this->controller;

        $error = '';

        $data_info = array();
        //  print_r($_POST);exit;
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {

            
            
            $add_in_m['exam_name'] = $exam_name = (isset($_POST['exam_name'])) ? $this->common->mysql_safe_string($_POST['exam_name']) : '';
          
           
            $add_in_m['tab_name'] = $tab_name = (isset($_POST['tab_name'])) ? $this->common->mysql_safe_string($_POST['tab_name']) : '';
          

            if ($exam_name == '') {
                $error = "Please select Degree";
            }
            if ($tab_name == '') {
                $error = "Please enter Tab Name";
            }

            if ($error == '') {

                if ($id != "") {

                  
                    $where = "id = '" . $id . "' ";
                    $update_status = $this->common->updateRecord('wti_m_exam_tab', $add_in_m, $where);
                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                     
                    $blogs_id = $this->common->insertRecord('wti_m_exam_tab', $add_in_m);

                    
                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                //$this->common->createjson('wti_cms_econtent', 'news');
                //echo $data_type;exit;
                redirect($this->controller . '/resulttab');
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_m_exam_tab b where   b.id = '" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        } else {
            //
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
            } else {

               
            }
        }

        $this->load->view('websiteadmin/resulttab_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    //exam time table
    public function examtimetable($degree_name = 'bsc-exam', $start = 0, $otherparam = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        $degree_name_lc = strtolower($degree_name);

        $degree_year[$degree_name_lc] = $this->config->item($degree_name_lc);

        $data['activaation_id'] = 2051;
        $data['sub_activaation_id'] = '2052_1';
        $data['sub_activaation_id2'] = '2052_1_2';

        $data['title'] = 'Exam / ' . strtoupper($degree_name);
        $data['start'] = $start;
        $data['maxm'] = $maxm = 50;
        $data['sub_heading'] = 'List';
        $fun_name = $this->controller . '/examtimetable';
        $data['fun_name'] = $fun_name;
        $data['add_link'] = $this->controller . '/examtimetable_action/' . $degree_name;
        $data['edit_link'] = $this->controller . '/examtimetable_action/' . $degree_name;

        $data['redirectto'] = 'examtimetable';

        $data['controller'] = $this->controller;
        $data['degree_name'] = $degree_name;
        $limit_qry = " LIMIT " . $start . "," . $maxm;

        $data['data_type'] = 'Postgraduate';
        $data['other_para'] = "";

        $resultdata = array();
        $sql = "select *    from
    wti_cms_exam_timetable  b where  status_flag!='Delete'  and degree_name='{$degree_name_lc}' order by  b.id  desc " . $limit_qry;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->result_array();
        }
        $data['results'] = $resultdata;

        $sql = "select count('')  as numrows  from 	wti_cms_exam_timetable b where status_flag!='Delete' and degree_name='{$degree_name_lc}'    order by  b.id desc ";
        $query = $this->db->query($sql);
        $resultdata = $query->row_array();
        $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);

        $this->load->view('websiteadmin/examtimetable', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function examtimetable_action($degree_name = 'BSc-Exam', $id = "")
    {

        $session_user_data = $this->session->userdata('user_data');
        // print_r($session_user_data);
        $degree_year_name = strtolower($degree_name);
        $degree_year_master = $this->config->item($degree_year_name);

        $data['controller'] = $this->controller;

        $data['activaation_id'] = 2051;
        $data['sub_activaation_id'] = '2052_1';
        $data['sub_activaation_id2'] = '2052_1_2';

        $data['title'] = 'Exam / ' . strtoupper($degree_name);
        $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';

        $data['degree_year_master'] = $degree_year_master;

        $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
        $data['back_link'] = $this->controller . '/examtimetable/' . $degree_name;
        $data['fun_name'] = 'examtimetable_action/' . $degree_name . '/' . $id;
        $data['controller'] = $this->controller;

        $error = '';
        // print_r($degree_year_master);exit;
        $data_info = array();
        //
        if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
            $add_in_m['degree_name'] = $degree_name;
            $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
            $add_in_m['edit_date'] = null;
            $add_in_m['added_by_user_id'] = $session_user_data['user_id'];

            $add_in_m['degree_year'] = $degree_year = (isset($_POST['degree_year'])) ? $this->common->mysql_safe_string($_POST['degree_year']) : '';

            $add_in_m['semester'] = $semester = (isset($_POST['semester'])) ? $this->common->mysql_safe_string($_POST['semester']) : '';

            $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';


            if ($semester == '') {
                $error = "Please enter semester name";
            }

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = time() . "-" . $_FILES['pdf_file']['name'];
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/result/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);
                    }
                }
            }

            if ($error == '') {

                if ($id != "") {
                    $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                    $where = "id = '" . $id . "' ";
                    $update_status = $this->common->updateRecord('wti_cms_exam_timetable', $add_in_m, $where);

                    $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                    $this->db->query($sql);

                    if ($add_in_m['status_flag'] == 'Active') {
                        $add_in_search['section_name'] = $degree_name;
                        $add_in_search['section_auto_id'] = $id;
                        $add_in_search['table_name'] = "wti_cms_exam_timetable";
                        $add_in_search['contents'] = $add_in_m['degree_name'] . "<br>" . $add_in_m['semester'];
                        $add_in_search['urls'] = site_url($degree_name);
                        $add_in_search['main_url'] = site_url($degree_name);
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }

                    $this->session->set_flashdata('success', 'Information updated successfully.');
                } else {
                    //print_r($add_in_m);
                    $blogs_id = $this->common->insertRecord('wti_cms_exam_timetable', $add_in_m);

                    if ($add_in_m['status_flag'] == 'Active') {
                        $add_in_search['section_name'] = $degree_name;
                        $add_in_search['section_auto_id'] = $blogs_id;
                        $add_in_search['table_name'] = "wti_cms_exam_timetable";
                        $add_in_search['contents'] = $add_in_m['degree_name'] . "<br>" . $add_in_m['semester'];
                        $add_in_search['urls'] = site_url($degree_name);
                        $add_in_search['main_url'] = site_url($degree_name);
                        $add_in_search['slug_name'] = '';

                        $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                    }
                    //  echo $this->db->last_query();die();
                    $this->session->set_flashdata('success', 'Information added successfully.');
                }

                $this->common->createjson('wti_cms_exam_timetable', 'cms/result', "SELECT * FROM `wti_cms_exam_timetable` where status_flag!='Delete'  ", 'multiple', 'home');
                //$this->common->createjson('wti_cms_econtent', 'news');
                //echo $degree_name;exit;
                redirect($this->controller . '/examtimetable/' . $degree_name);
            } else {
                $this->session->set_flashdata('error', $error);
                $data['error_msg'] = $error;
            }
        }

        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $data_info = array();
        if ($id != "") {
            $sql = "select * from  wti_cms_exam_timetable b where status_flag!='Delete'   and b.id = '" . $id . "'  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $data_info = $query->row_array();
                $data['records'] = $data_info;
            }
        } else {
            //
            if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                $data_info = (isset($_POST)) ? $_POST : '';
                $data['records'] = $data_info;
            } else {

                // $sql = "select count('')  as numrows  from wti_cms_econtent        where     (delete_status=0 or delete_status IS NULL)   ";
                // $query = $this->db->query($sql);
                // $resultdata = $query->row_array();
                // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
            }
        }

        $this->load->view('websiteadmin/examtimetable_action', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    //end of exam time table
    //continuous
     
     public function continuous($degree_name = 'BSc', $start = 0, $otherparam = "")
     {
 
         $session_user_data = $this->session->userdata('user_data');
         $degree_name_lc = strtolower($degree_name);
        
         $degree_year[$degree_name_lc] = $this->config->item($degree_name_lc);
 
         $data['activaation_id'] = 2051;
         $data['sub_activaation_id'] = '2053_1';
         $data['sub_activaation_id2'] = '2053_1_2';
 
         $data['title'] = 'Exam / Continuous Assessment';
         $data['start'] = $start;
         $data['maxm'] = $maxm = 50;
         $data['sub_heading'] = '';
         $fun_name = $this->controller . '/continuous';
         $data['fun_name'] = $fun_name;
         $data['add_link'] = $this->controller . '/continuous_action/' . $degree_name;
         $data['edit_link'] = $this->controller . '/continuous_action/';
 
         $data['redirectto'] = 'continuous';
 
         $data['controller'] = $this->controller;
         $data['degree_name'] = $degree_name;
         $limit_qry = " LIMIT " . $start . "," . $maxm;
 
         $data['data_type'] = 'Postgraduate';
         $data['other_para'] = "";
 
         $resultdata = array();
         $sql = "select *    from
         wti_cms_exam_continuous  b where  status_flag!='Delete'  order by  b.id  desc " . $limit_qry;
         $query = $this->db->query($sql);
         if ($query->num_rows() > 0) {
             $resultdata = $query->result_array();
         }
         $data['results'] = $resultdata;
 
         $sql = "select count('')  as numrows  from 	wti_cms_exam_continuous b where status_flag!='Delete'     order by  b.id desc ";
         $query = $this->db->query($sql);
         $resultdata = $query->row_array();
         $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);
 
         $this->load->view('websiteadmin/continuous', $data);
         $this->session->unset_userdata('success');
         $this->session->unset_userdata('warning');
         $this->session->unset_userdata('error');
     }
 
     public function continuous_action($degree_name = 'BSc-Exam', $id = "")
     {
 
         $session_user_data = $this->session->userdata('user_data');
         // print_r($session_user_data);
         $degree_year_name = strtolower($degree_name);
         $degree_year_master = $this->config->item($degree_year_name);
 
         $data['controller'] = $this->controller;
 
         $data['activaation_id'] = 2051;
         $data['sub_activaation_id'] = '2053_1';
         $data['sub_activaation_id2'] = '2053_1_2';
 
         $data['title'] = 'Exam / Continuous Assessment ';
         $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
 
         $data['degree_year_master'] = $degree_year_master;
 
         $data['sub_heading'] = (isset($id) && $id != "") ? " Continuous Assessment / ".$degree_name : 'Add Data';
         $data['back_link'] = $this->controller . '/continuous';
         $data['fun_name'] = 'continuous_action/' . $degree_name . '/' . $id;
         $data['controller'] = $this->controller;
 
         $error = '';
         // print_r($degree_year_master);exit;
         $data_info = array();
         //
         if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
             $add_in_m['degree_name'] = $degree_name;
           
           
             $add_in_m['added_by_user_id'] = $session_user_data['user_id'];
 
             $add_in_m['degree_year'] = $degree_year = (isset($_POST['degree_year'])) ? $this->common->mysql_safe_string($_POST['degree_year']) : '';
 
             $add_in_m['semester'] = $semester = (isset($_POST['semester'])) ? $this->common->mysql_safe_string($_POST['semester']) : '';
 
             $add_in_m['status_flag'] = $status_flag = (isset($_POST['status_flag'])) ? $this->common->mysql_safe_string($_POST['status_flag']) : 'Active';
 
 
            
 
             if (isset($_FILES['pdf_file'])) {
                 if ($_FILES['pdf_file']['name'] != "") {
 
                     $filename = time() . "-" . $_FILES['pdf_file']['name'];
                     $file_allowed = array('pdf');
                     $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/result/', $filename, $file_allowed);
                     if ($upload['uploaded'] == 'false') {
 
                         $error = $upload['uploadMsg'];
                     } else {
                         $add_in_m['pdf_file'] = $upload['imageFile'];
                         //print_r($add_in);
                     }
                 }
             }
 
             if ($error == '') {
 
                 if ($id != "") {
                    $add_in_m['edit_date'] = $today = date("Y-m-d H:i:s");
                     $add_in_m['edit_by_user_id'] = $session_user_data['user_id'];
                     $where = "id = '" . $id . "' ";
                     $update_status = $this->common->updateRecord('wti_cms_exam_continuous', $add_in_m, $where);
 
                     $sql = "delete from 	wti_m_search where section_auto_id='" . $id . "'  ";
                     $this->db->query($sql);
 
                     if ($add_in_m['status_flag'] == 'Active') {
                         $add_in_search['section_name'] = $degree_name;
                         $add_in_search['section_auto_id'] = $id;
                         $add_in_search['table_name'] = "wti_cms_exam_continuous";
                         $add_in_search['contents'] = $add_in_m['degree_name'] . "<br>" . $add_in_m['semester'];
                         $add_in_search['urls'] = site_url($degree_name);
                         $add_in_search['main_url'] = site_url($degree_name);
                         $add_in_search['slug_name'] = '';
 
                         $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                     }
 
                     $this->session->set_flashdata('success', 'Information updated successfully.');
                 } else {
                    $add_in_m['add_date'] = $today = date("Y-m-d H:i:s");
                     //print_r($add_in_m);
                     $blogs_id = $this->common->insertRecord('wti_cms_exam_continuous', $add_in_m);
 
                     if ($add_in_m['status_flag'] == 'Active') {
                         $add_in_search['section_name'] = $degree_name;
                         $add_in_search['section_auto_id'] = $blogs_id;
                         $add_in_search['table_name'] = "wti_cms_exam_continuous";
                         $add_in_search['contents'] = $add_in_m['degree_name'] . "<br>" . $add_in_m['semester'];
                         $add_in_search['urls'] = site_url($degree_name);
                         $add_in_search['main_url'] = site_url($degree_name);
                         $add_in_search['slug_name'] = '';
 
                         $search_id = $this->common->insertRecord('wti_m_search', $add_in_search);
                     }
                     //  echo $this->db->last_query();die();
                     $this->session->set_flashdata('success', 'Information added successfully.');
                 }
 
                 $this->common->createjson('wti_cms_exam_continuous', 'cms/result', "SELECT * FROM `wti_cms_exam_continuous` where status_flag!='Delete'  ", 'multiple', 'home');

                 //$this->common->createjson('wti_cms_econtent', 'news');
                 //echo $degree_name;exit;
                 redirect($this->controller . '/continuous');
             } else {
                 $this->session->set_flashdata('error', $error);
                 $data['error_msg'] = $error;
             }
         }
 
         //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
         //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);
 
         $data_info = array();
         if ($id != "") {
             $sql = "select * from  wti_cms_exam_continuous b where status_flag!='Delete'   and b.id = '" . $id . "'  ";
             $query = $this->db->query($sql);
             if ($query->num_rows() > 0) {
                 $data_info = $query->row_array();
                 $data['records'] = $data_info;
             }
         } else {
             //
             if (isset($add_in_m) && sizeof($add_in_m) > 0) {
                 $data_info = (isset($_POST)) ? $_POST : '';
                 $data['records'] = $data_info;
             } else {
 
                 // $sql = "select count('')  as numrows  from wti_cms_econtent        where     (delete_status=0 or delete_status IS NULL)   ";
                 // $query = $this->db->query($sql);
                 // $resultdata = $query->row_array();
                 // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
             }
         }
 
         $this->load->view('websiteadmin/continuous_action', $data);
         $this->session->unset_userdata('success');
         $this->session->unset_userdata('warning');
         $this->session->unset_userdata('error');
     }
    //end of 
    public function academicCalendar(){
        $session_user_data = $this->session->userdata('user_data');
        $error = '';
        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '101_106';
        $data['title'] = $this->title;
        $data['tab'] = $tab = (isset($_GET['tab'])) ? $this->common->mysql_safe_string_descriptive($_GET['tab']) : '1';
        $data['maxm'] = $maxm = 20000;
        $data['sub_heading'] = 'Academic Calendar';
        $fun_name = $this->controller . '/academicCalendar';

        $data['controller'] = $this->controller;
        $data['fun_name'] = "academicCalendar";
        $data['back_link'] =  'websiteadmin/dashboard';
        $code = "academicCalendar";
        if (isset($_POST['mode']) && $_POST['mode'] == 'edit_content') {
            // $key_name = $this->common->mysql_safe_string_descriptive($_POST['key_name']);

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = time() . "-" . $_FILES['pdf_file']['name'];
                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                        $add_in_m['pdf_file'] = $upload['imageFile'];
                        //print_r($add_in);

                        $this->db->query("update`wti_m_setting` SET    `value` = '" . $upload['imageFile'] . "' where  `key_name` = '" . $code . "' and group_name='{$code}' ");

                        $this->common->createjson($code, 'cms', "SELECT * FROM `wti_m_setting` WHERE `group_name` LIKE '{$code}' ORDER BY `group_name` ASC", 'single', 'home');

                    }
                }
            }

        }


        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $resultdata = array();
        $data['records'] = array();

        $sql = "select * from  `wti_m_setting` where `group_name`='" . $code . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->row_array();
            $data['records']['value'] = $resultdata['value'];
        }
        

        
        $this->load->view('websiteadmin/academicCalendar', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function admissionenquiry_message(){
        $session_user_data = $this->session->userdata('user_data');
        $error = '';
        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '101_107';
        $data['title'] = $this->title;
        $data['tab'] = $tab = (isset($_GET['tab'])) ? $this->common->mysql_safe_string_descriptive($_GET['tab']) : '1';
        $data['maxm'] = $maxm = 20000;
        $data['sub_heading'] = 'Admission Enquiry';
        $fun_name = $this->controller . '/admissionenquiry_message';
        $data['back_link'] =  'websiteadmin/dashboard';
        $data['controller'] = $this->controller;
        $data['fun_name'] = "admissionenquiry_message";
        $code = "admissionenquiry_message";
        if (isset($_POST['mode']) && $_POST['mode'] == 'edit_content') {
            // $key_name = $this->common->mysql_safe_string_descriptive($_POST['key_name']);

            $add_in_m['descriptions'] = $descriptions = (isset($_POST['descriptions'])) ? $this->common->mysql_safe_string_descriptive($_POST['descriptions']) : '';

            $this->db->query("update`wti_m_setting` SET    `value` = '" . $descriptions . "' where  `key_name` = '" . $code . "' and group_name='{$code}' ");

             
        }


        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $resultdata = array();
        $data['records'] = array();

        $sql = "select * from  `wti_m_setting` where `group_name`='" . $code . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->row_array();
            $data['records']['value'] = $resultdata['value'];
        }
        

        
        $this->load->view('websiteadmin/admissionenquiry_message', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function downloadhome(){
        $session_user_data = $this->session->userdata('user_data');
        $error = '';
        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '101_108';
        $data['title'] = $this->title;
        $data['tab'] = $tab = (isset($_GET['tab'])) ? $this->common->mysql_safe_string_descriptive($_GET['tab']) : '1';
        $data['maxm'] = $maxm = 20000;
        $data['sub_heading'] = 'Downloads';
        $fun_name = $this->controller . '/downloadhome';
        $data['back_link'] =  'websiteadmin/dashboard';
        $data['controller'] = $this->controller;
        $data['fun_name'] = "downloadhome";
        $code = "downloadhome";
        if (isset($_POST['mode']) && $_POST['mode'] == 'edit_content') {
            // $key_name = $this->common->mysql_safe_string_descriptive($_POST['key_name']);

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = time() . "-" . $_FILES['pdf_file']['name'];
                    $filename = $this->common->tep_short_name_list($filename);

                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                       // $add_in_m['pdf_file'] = $upload['imageFile'];
                      

                        $sql = "select * from  `wti_m_setting` where `group_name`='" . $code . "'";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            $this->db->query("update `wti_m_setting` SET `value` = '" . $upload['imageFile'] . "' where  `key_name` = '" . $code . "' and group_name='{$code}' ");
                          //  echo "update `wti_m_setting` SET `value` = '" . $upload['imageFile'] . "' where  `key_name` = '" . $code . "' and group_name='{$code}' ";exit;
                        } else {
                            $this->db->query("insert into  `wti_m_setting` SET `value` = '" . $upload['imageFile'] . "' ,   `key_name` = '" . $code . "' , group_name='{$code}' ");

                        }
                         
                      
                        $this->common->createjson($code, 'cms', "SELECT * FROM `wti_m_setting` WHERE `group_name` LIKE '{$code}' ORDER BY `group_name` ASC", 'single', 'home');

                    }
                }
            }

        }


        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $resultdata = array();
        $data['records'] = array();

        $sql = "select * from  `wti_m_setting` where `group_name`='" . $code . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->row_array();
            $data['records']['value'] = $resultdata['value'];
        }
        

        
        $this->load->view('websiteadmin/downloadhome', $data);
         $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }
    public function feedbackform(){
        $session_user_data = $this->session->userdata('user_data');
        $error = '';
        $data['activaation_id'] = 101;
        $data['sub_activaation_id'] = '101_109';
        $data['title'] = $this->title;
        $data['tab'] = $tab = (isset($_GET['tab'])) ? $this->common->mysql_safe_string_descriptive($_GET['tab']) : '1';
        $data['maxm'] = $maxm = 20000;
        $data['sub_heading'] = 'Feedback Form';
        $fun_name = $this->controller . '/feedbackform';
  $data['back_link'] =  'websiteadmin/dashboard';
        $data['controller'] = $this->controller;
        $data['fun_name'] = "feedbackform";
        $code = "feedbackform";
        if (isset($_POST['mode']) && $_POST['mode'] == 'edit_content') {
            // $key_name = $this->common->mysql_safe_string_descriptive($_POST['key_name']);

            $add_in_m['feedbackform'] = $feedbackform = (isset($_POST['feedbackform'])) ? $this->common->mysql_safe_string_descriptive($_POST['feedbackform']) : '';

            
            $sql = "select * from  `wti_m_setting` where `group_name`='" . $code . "'";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $this->db->query("update `wti_m_setting` SET `value` = '" . $feedbackform . "' where  `key_name` = '" . $code . "' and group_name='{$code}' ");
              //  echo "update `wti_m_setting` SET `value` = '" . $upload['imageFile'] . "' where  `key_name` = '" . $code . "' and group_name='{$code}' ";exit;
            } else {
                $this->db->query("insert into  `wti_m_setting` SET `value` = '" . $feedbackform . "' ,   `key_name` = '" . $code . "' , group_name='{$code}' ");

            }


            $this->common->createjson($code, 'cms', "SELECT * FROM `wti_m_setting` WHERE `group_name` LIKE '{$code}' ORDER BY `group_name` ASC", 'single', 'self');
        }


        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $resultdata = array();
        $data['records'] = array();

        $sql = "select * from  `wti_m_setting` where `group_name`='" . $code . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->row_array();
            $data['records']['value'] = $resultdata['value'];
        }
        

        
        $this->load->view('websiteadmin/feedbackform', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function newarrivals(){
        $session_user_data = $this->session->userdata('user_data');
        $error = '';
        $data['activaation_id'] = 2055;
        $data['sub_activaation_id'] = '2055_1';
        $data['title'] = $this->title;
        $data['tab'] = $tab = (isset($_GET['tab'])) ? $this->common->mysql_safe_string_descriptive($_GET['tab']) : '1';
        $data['maxm'] = $maxm = 20000;
        $data['sub_heading'] = 'New Arrivals';
        $fun_name = $this->controller . '/newarrivals';

        $data['controller'] = $this->controller;
        $data['fun_name'] = "newarrivals";
        $code = "library";
        $keyname = "newarrivals";
        if (isset($_POST['mode']) && $_POST['mode'] == 'edit_content') {
            // $key_name = $this->common->mysql_safe_string_descriptive($_POST['key_name']);

            if (isset($_FILES['pdf_file'])) {
                if ($_FILES['pdf_file']['name'] != "") {

                    $filename = time() . "-" . $_FILES['pdf_file']['name'];
                    $filename = $this->common->tep_short_name_list($filename);

                    $file_allowed = array('pdf');
                    $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/', $filename, $file_allowed);
                    if ($upload['uploaded'] == 'false') {

                        $error = $upload['uploadMsg'];
                    } else {
                       // $add_in_m['pdf_file'] = $upload['imageFile'];
                      

                        $sql = "select * from  `wti_m_setting` where `group_name`='" . $code . "'";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            $this->db->query("update `wti_m_setting` SET `value` = '" . $upload['imageFile'] . "' where  `key_name` = '" . $keyname . "' and group_name='{$code}' ");
                          //  echo "update `wti_m_setting` SET `value` = '" . $upload['imageFile'] . "' where  `key_name` = '" . $code . "' and group_name='{$code}' ";exit;
                        } else {
                            $this->db->query("insert into  `wti_m_setting` SET `value` = '" . $upload['imageFile'] . "' ,   `key_name` = '" . $keyname . "' , group_name='{$code}' ");

                        }
                         
                      
                        $this->common->createjson($code, 'cms', "SELECT * FROM `wti_m_setting` WHERE `group_name` LIKE '{$code}' ORDER BY `group_name` ASC", 'single', 'self');

                    }
                }
            }

        }


        //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
        //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);

        $resultdata = array();
        $data['records'] = array();

        $sql = "select * from  `wti_m_setting` where `group_name`='" . $code . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $resultdata = $query->row_array();
            $data['records']['value'] = $resultdata['value'];
        }
        

        
        $this->load->view('websiteadmin/downloadhome', $data);
         $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

     //publication
     public function publication($start = 0, $otherparam = "")
     {
 
         $session_user_data = $this->session->userdata('user_data');
 
         $data['activaation_id'] = 2055;
         $data['sub_activaation_id'] = '2055_2';
         $data['title'] = 'publication';
         $data['start'] = $start;
         $data['maxm'] = $maxm = 50;
         $data['sub_heading'] = 'List';
         $fun_name = $this->controller . '/publication';
         $data['fun_name'] = $fun_name;
         $data['add_link'] = $this->controller . '/publication_action';
         $data['edit_link'] = $this->controller . '/publication_action';
 
         $data['controller'] = $this->controller;
 
         $limit_qry = " LIMIT " . $start . "," . $maxm;
 
         $data['other_para'] = "";
 
         $resultdata = array();
         $sql = "select *    from
         wti_cms_library_publication b     order by  b.id desc " . $limit_qry;
         $query = $this->db->query($sql);
         if ($query->num_rows() > 0) {
             $resultdata = $query->result_array();
         }
         $data['results'] = $resultdata;
 
         $sql = "select count('')  as numrows  from 	wti_cms_library_publication b       order by  b.id desc ";
         $query = $this->db->query($sql);
         $resultdata = $query->row_array();
         $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);
      
         $this->common->createjson('wti_cms_library_publication', 'cms/publication', "select * from  wti_cms_library_publication", 'multiple', 'self');

 
         $this->load->view('websiteadmin/publication', $data);
         $this->session->unset_userdata('success');
         $this->session->unset_userdata('warning');
         $this->session->unset_userdata('error');
     }
 
     public function publication_action($id = "")
     {
 
         $session_user_data = $this->session->userdata('user_data');
         $data['controller'] = $this->controller;
         $data['activaation_id'] = 2055;
         $data['sub_activaation_id'] = '2055_2';
         $data['title'] = 'Publication';
         $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
         $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
         $data['back_link'] = $this->controller . '/publication/';
         $data['fun_name'] = 'publication_action/' . $id;
         $data['controller'] = $this->controller;
 
         $error = '';
 
         $data_info = array();
         //  print_r($_POST);exit;
         if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
 
             $add_in_m['name'] = $name = (isset($_POST['name'])) ? $this->common->mysql_safe_string($_POST['name']) : '';
             $add_in_m['group_name'] = $group_name = (isset($_POST['group_name'])) ? $this->common->mysql_safe_string($_POST['group_name']) : '';
             $add_in_m['sort_order'] = $sort_order = (isset($_POST['sort_order'])) ? $this->common->mysql_safe_string($_POST['sort_order']) : '1';
 
           
             $add_in_m['date_added'] = $today = date("Y-m-d H:i:s");
 
             if ($name == '') {
                 $error = "Please select publication for  <br>";
             }
 
             if (isset($_FILES['pdf_file'])) {
                 if ($_FILES['pdf_file']['name'] != "") {
 
                     $filename = 'linkages-' . $name . ".pdf";
                     $file_allowed = array('pdf');
                     $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/publication/', $filename, $file_allowed);
                     if ($upload['uploaded'] == 'false') {
 
                         $error = $upload['uploadMsg'];
                     } else {
                         $add_in_m['pdf_file'] = $upload['imageFile'];
                         //print_r($add_in);
                     }
                 }
             } else {
                 $error = "Please uplaod pdf file<br>";
             }
 
             if ($error == '') {
 
                 if ($id != "") {
                     $where = "id = '" . $id . "'";
                     $update_status = $this->common->updateRecord('wti_cms_library_publication', $add_in_m, $where);
                     $this->session->set_flashdata('success', 'Information updated successfully.');
                 } else {
                     //print_r($add_in_m);
                     $blogs_id = $this->common->insertRecord('wti_cms_library_publication', $add_in_m);
                     //  echo $this->db->last_query();die();
                     $this->session->set_flashdata('success', 'Information added successfully.');
                 }
 
              //   $this->common->createjson('wti_cms_library_publication', 'cms/publication', "select * from  wti_cms_library_publication", 'single', 'self');

 
                 redirect($this->controller . '/publication');
             } else {
                 $this->session->set_flashdata('error', $error);
                 $data['error_msg'] = $error;
             }
         }
 
         //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
         //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);
 
         $data_info = array();
         if ($id != "") {
             $sql = "select * from  wti_cms_library_publication b where  b.id = '" . $id . "'  ";
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
 
                 // $sql = "select count('')  as numrows  from wti_cms_linkages        where     (delete_status=0 or delete_status IS NULL)   ";
                 // $query = $this->db->query($sql);
                 // $resultdata = $query->row_array();
                 // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
             }
         }
 
         $this->load->view('websiteadmin/publication_action', $data);
         $this->session->unset_userdata('success');
         $this->session->unset_userdata('warning');
         $this->session->unset_userdata('error');
     }
 
     public function delete_data_publication($id = 0)
     {
 
         $sql = "select  id from 	wti_cms_library_publication ftm where id='" . $id . "'  ";
         $query = $this->db->query($sql);
 
         if ($query->num_rows() > 0) {
            $sql = "delete from     wti_cms_library_publication where id='" . $id . "'  ";
            $this->db->query($sql);
            $this->common->createjson('wti_cms_library_publication', 'cms', "select * from  wti_cms_library_publication", 'single', 'self');

             $this->session->set_flashdata('success', 'Deleted successfully.');
         } else {
             $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
         }
        
         redirect($this->controller . '/publication');
     }
     ////end of publication

       //publication
       public function questionpapers($start = 0, $otherparam = "")
       {
   
           $session_user_data = $this->session->userdata('user_data');
   
           $data['activaation_id'] = 2055;
           $data['sub_activaation_id'] = '2055_3';
           $data['title'] = 'questionpapers';
           $data['start'] = $start;
           $data['maxm'] = $maxm = 50;
           $data['sub_heading'] = 'List';
           $fun_name = $this->controller . '/questionpapers';
           $data['fun_name'] = $fun_name;
           $data['add_link'] = $this->controller . '/questionpapers_action';
           $data['edit_link'] = $this->controller . '/questionpapers_action';
   
           $data['controller'] = $this->controller;
   
           $limit_qry = " LIMIT " . $start . "," . $maxm;
   
           $data['other_para'] = "";
   
           $resultdata = array();
           $sql = "select *    from
           wti_cms_question_papers b     order by  b.id desc " . $limit_qry;
           $query = $this->db->query($sql);
           if ($query->num_rows() > 0) {
               $resultdata = $query->result_array();
           }
           $data['results'] = $resultdata;
   
           $sql = "select count('')  as numrows  from 	wti_cms_question_papers b       order by  b.id desc ";
           $query = $this->db->query($sql);
           $resultdata = $query->row_array();
           $data['num_row'] = $resultdata['numrows']; //= $this->common->numRow($this->tablename,$where_cond);
   
           $this->common->createjson('wti_cms_question_papers', 'cms/questionpapers', "select * from  wti_cms_question_papers", 'multiple', 'self');


           $this->load->view('websiteadmin/questionpapers', $data);
           $this->session->unset_userdata('success');
           $this->session->unset_userdata('warning');
           $this->session->unset_userdata('error');
       }
   
       public function questionpapers_action($id = "")
       {
   
           $session_user_data = $this->session->userdata('user_data');
           $data['controller'] = $this->controller;
           $data['activaation_id'] = 2055;
           $data['sub_activaation_id'] = '2055_3';
           $data['title'] = 'questionpapers';
           $data['id'] = (isset($id)) ? $this->common->mysql_safe_string($id) : '';
           $data['sub_heading'] = (isset($id) && $id != "") ? " Edit Data" : 'Add Data';
           $data['back_link'] = $this->controller . '/questionpapers/';
           $data['fun_name'] = 'questionpapers_action/' . $id;
           $data['controller'] = $this->controller;
   
           $error = '';
   
           $data_info = array();
           //  print_r($_POST);exit;
           if (isset($_POST['mode']) && $_POST['mode'] == "edit_content") {
   
               $add_in_m['name'] = $name = (isset($_POST['name'])) ? $this->common->mysql_safe_string($_POST['name']) : '';
               $add_in_m['group_name'] = $group_name = (isset($_POST['group_name'])) ? $this->common->mysql_safe_string($_POST['group_name']) : '';
               $add_in_m['sort_order'] = $sort_order = (isset($_POST['sort_order'])) ? $this->common->mysql_safe_string($_POST['sort_order']) : '1';
   
             
               $add_in_m['date_added'] = $today = date("Y-m-d H:i:s");
   
               if ($name == '') {
                   $error = "Please select questionpapers for  <br>";
               }
   
               if (isset($_FILES['pdf_file'])) {
                   if ($_FILES['pdf_file']['name'] != "") {
   
                       $filename = 'linkages-' . $name . ".pdf";
                       $file_allowed = array('pdf');
                       $upload = $this->common->UploadFiles('pdf_file', 'uploads/cms/questionpapers/', $filename, $file_allowed);
                       if ($upload['uploaded'] == 'false') {
   
                           $error = $upload['uploadMsg'];
                       } else {
                           $add_in_m['pdf_file'] = $upload['imageFile'];
                           //print_r($add_in);
                       }
                   }
               } else {
                   $error = "Please uplaod pdf file<br>";
               }
   
               if ($error == '') {
   
                   if ($id != "") {
                       $where = "id = '" . $id . "'";
                       $update_status = $this->common->updateRecord('wti_cms_question_papers', $add_in_m, $where);
                       $this->session->set_flashdata('success', 'Information updated successfully.');
                   } else {
                       //print_r($add_in_m);
                       $blogs_id = $this->common->insertRecord('wti_cms_question_papers', $add_in_m);
                       //  echo $this->db->last_query();die();
                       $this->session->set_flashdata('success', 'Information added successfully.');
                   }
   
                   //$this->common->createjson('wti_cms_linkages', 'news');
   
                   redirect($this->controller . '/questionpapers');
               } else {
                   $this->session->set_flashdata('error', $error);
                   $data['error_msg'] = $error;
               }
           }
   
           //  $where_cond = "where delete_status=0  ORDER BY cate_name  ";
           //  $data['mst_category_blogs'] = $mst_category_blogs = $this->common->getAllRow('m_newsblog_cat', $where_cond);
   
           $data_info = array();
           if ($id != "") {
               $sql = "select * from  wti_cms_question_papers b where  b.id = '" . $id . "'  ";
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
   
                   // $sql = "select count('')  as numrows  from wti_cms_linkages        where     (delete_status=0 or delete_status IS NULL)   ";
                   // $query = $this->db->query($sql);
                   // $resultdata = $query->row_array();
                   // $data['records']['sort_no'] = $resultdata['numrows'] + 1;
               }
           }
   
           $wti_m_question_papers = [];
           $sql = "select * from wti_m_question_papers   b  order by  `tab_name` ASC ";
           $query = $this->db->query($sql);
           if ($query->num_rows() > 0) {
               $resultdata = $query->result_array();
              // print_r($resultdata);
             //  print_r($wti_m_question_papers);
               foreach($resultdata as $key => $value){
                   $wti_m_question_papers[] = $value['tab_name'];
               }
           }
          // print_r($wti_m_question_papers);
           $data['wti_m_question_papers'] = $wti_m_question_papers;
           $this->load->view('websiteadmin/questionpapers_action', $data);
           $this->session->unset_userdata('success');
           $this->session->unset_userdata('warning');
           $this->session->unset_userdata('error');
       }
   
       public function delete_data_questionpapers($id = 0)
       {
   
           $sql = "select  id from 	wti_cms_question_papers ftm where id='" . $id . "'  ";
           $query = $this->db->query($sql);
   
           if ($query->num_rows() > 0) {
              $sql = "delete from     wti_cms_question_papers where id='" . $id . "'  ";
              $this->db->query($sql);
               
               $this->session->set_flashdata('success', 'Deleted successfully.');
           } else {
               $this->session->set_flashdata('warning', 'You don\'t have persmission to delete this');
           }
   
           redirect($this->controller . '/questionpapers');
       }
       ////end of questionpapers
}
