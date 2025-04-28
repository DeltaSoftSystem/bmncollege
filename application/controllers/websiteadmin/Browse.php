 <?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Browse extends CI_Controller
{
    public $controller = "websiteadmin/browse";
    public $per_page = 2;
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('common');
        $this->load->model('common_model');
        $this->load->helper('security');
        $this->load->library('email');
        $this->load->helper('url_helper');
        $this->load->model('configmodal');
        $this->load->model('customermodal');

        $data['config_maintenance'] = $config_maintenance = (int) $this->configmodal->get('config_maintenance');

        if ($config_maintenance) {
            redirect("maintenance");
            exit;
        } //$config_maintenance

    }

    public function index()
    {
        $this->common->check_user_session();
        $data['controller'] = $controller = $this->controller;
        $data['menu_active_main'] = "login";
        $data['menu_active_sub_main'] = "login";
        $data['page_section'] = "login";
        $data['class'] = "current";
        $data['controller'] = $controller = $this->controller;

        $session_user_data = $this->session->userdata('front_user_data');
        $session_user_id = (isset($session_user_data['user_id'])) ? $session_user_data['user_id'] : '';
        $session_login_credentials_id = (isset($session_user_data['login_credentials_id'])) ? $session_user_data['login_credentials_id'] : '';
        $session_user_type = (isset($session_user_data['user_type'])) ? $session_user_data['user_type'] : '';
        //$data['profile_detail'] = $this->customermodal->getProfileDetail();

        $isProfileCompleted = $this->customermodal->isProfileCompleted();

        if ($isProfileCompleted['status'] == 0) {
            $this->session->set_flashdata('error_msg', $isProfileCompleted['message']);

            redirect("account/dashboard");
            die();
        } //$isProfileCompleted['status'] == 0
        else {
            $data['profile_detail'] = $this->customermodal->getProfileDetail($session_user_id);
        }

        $data['post'] = $data['profile_detail'];
        $data['fun_name_only'] = $this->controller;

        $this->load->view('websiteadmin/browse_search', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function result()
    {
        $other_para = "";

        $this->common->check_user_session();
        $data['controller'] = $controller = $this->controller;
        $data['menu_active_main'] = "login";
        $data['menu_active_sub_main'] = "login";
        $data['page_section'] = "login";
        $data['class'] = "current";

        $data['post'] = array();
        $other_para = '';

        $data['controller'] = $controller = $this->controller;

        $session_user_data = $this->session->userdata('front_user_data');
        $session_user_id = (isset($session_user_data['user_id'])) ? $session_user_data['user_id'] : '';
        $session_login_credentials_id = (isset($session_user_data['login_credentials_id'])) ? $session_user_data['login_credentials_id'] : '';
        $session_user_type = (isset($session_user_data['user_type'])) ? $session_user_data['user_type'] : '';
        //$data['profile_detail'] = $this->customermodal->getProfileDetail();

        $fileds = "prof_id, height, user_id, prof_sex, b_date, age, religion, city, state, country, eduction, occupation, annual_income, about_me";

        $data['profile_detail'] = $profile_detail = $this->customermodal->getProfileDetail();
        $data['getUserMembershipPlanStats'] = $getUserMembershipPlanStats = $this->customermodal->getUserMembershipPlanStats($profile_detail['current_plan'], $session_user_id);

        $isProfileCompleted = $this->customermodal->isProfileCompleted();

        if ($isProfileCompleted['status'] == 0) {
            $this->session->set_flashdata('error_msg', $isProfileCompleted['message']);

            redirect("account/dashboard");
            die();
        } //$isProfileCompleted['status'] == 0
        else {
            $data['profile_detail'] = $this->customermodal->getProfileDetail($session_user_id);
        }

       

        if (isset($_GET['page']) && $_GET['page'] != '') {
            $page = $_GET['page'];
            //$other_para .= "&page=" . $page;
            $data['page'] = $page;

        } //isset( $_GET['page'] ) && $_GET['page'] != ''
        else {
            $page = 0;
            $data['page'] = 0;

        }

        $start_temp = (($page == 0) ? 0 : $page - 1);
        $start = $start_temp * $this->per_page;

        if ($start < 0) {
            $start = 0;
        }

        $data['start'] = $page;

        $data['maxm'] = $maxm = $this->per_page;
        $limit_qry = "LIMIT " . $start . "," . $maxm;

        $fil_search = "";
      
        //prof_completed=1 and prof_religion_section='1' and prof_location_section=1 and prof_professional_section=1
        $where_qry = " WHERE type='CST'  and customer_id!='" . $session_user_id . "' ";

        if (isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'search') {
            // print_r($_REQUEST);
            $data['post'] = $_REQUEST;
            if (isset($_REQUEST['search_by']) && $_REQUEST['search_by'] != '') {
                $search_by = isset($_REQUEST["search_by"]) ? $this->common->mysql_safe_string($_REQUEST['search_by']) : '';
                $ser_profile_id = isset($_REQUEST["ser_profile_id"]) ? $this->common->mysql_safe_string($_REQUEST['ser_profile_id']) : '';
                //$profile_id_temp = filter_var($ser_profile_id, FILTER_SANITIZE_NUMBER_INT);

                $other_para .= "mode=search&search_by=" . $search_by;

                if ($search_by == "2") {

                    $where_qry .= " AND ( c.affiliated =  '" . $ser_profile_id . "' )";
                } //$search_by == "1"
                else {

                    $prof_sex = isset($_REQUEST["prof_sex"]) ? $this->common->mysql_safe_string($_REQUEST['prof_sex']) : '0';
                    $part_age_from = isset($_REQUEST["part_age_from"]) ? $this->common->mysql_safe_string($_REQUEST['part_age_from']) : '18';
                    $part_age_to = isset($_REQUEST["part_age_to"]) ? $this->common->mysql_safe_string($_REQUEST['part_age_to']) : '100';

                    $part_age_from = (int) $part_age_from;
                    $part_age_to = (int) $part_age_to;

                    $part_age_from = ($part_age_from != 0) ? $part_age_from : '0';
                    $part_age_to = ($part_age_to != 0) ? $part_age_to : '100';

                    $part_height = isset($_REQUEST["part_height"]) ? $this->common->mysql_safe_string($_REQUEST['part_height']) : '1';
                    $part_height_to = isset($_REQUEST["part_height_to"]) ? $this->common->mysql_safe_string($_REQUEST['part_height_to']) : '100';
                    $part_marital_status = isset($_REQUEST["part_marital_status"]) ? $this->common->mysql_safe_string($_REQUEST['part_marital_status']) : '';
                    $part_religion = isset($_REQUEST["part_religion"]) ? $this->common->mysql_safe_string($_REQUEST['part_religion']) : '';
                    $part_cast = isset($_REQUEST["part_cast"]) ? $this->common->mysql_safe_string($_REQUEST['part_cast']) : '';
                    $part_gothra = isset($_REQUEST["part_gothra"]) ? $this->common->mysql_safe_string($_REQUEST['part_gothra']) : '';

                    $part_mother_tounge = isset($_REQUEST["part_mother_tounge"]) ? $this->common->mysql_safe_string($_REQUEST['part_mother_tounge']) : '';

                    $part_country = isset($_REQUEST["part_country"]) ? $this->common->mysql_safe_string($_REQUEST['part_country']) : '';
                    $part_state = isset($_REQUEST["part_state"]) ? $this->common->mysql_safe_string($_REQUEST['part_state']) : '';
                    $part_city = isset($_REQUEST["part_city"]) ? $this->common->mysql_safe_string($_REQUEST['part_city']) : '';

                    $part_education = isset($_REQUEST["part_education"]) ? $this->common->mysql_safe_string($_REQUEST['part_education']) : '';
                    $part_working_with = isset($_REQUEST["part_working_with"]) ? $this->common->mysql_safe_string($_REQUEST['part_working_with']) : '';
                    $part_occupation = isset($_REQUEST["part_occupation"]) ? $this->common->mysql_safe_string($_REQUEST['part_occupation']) : '';

                    $part_annual_income = isset($_REQUEST["part_annual_income"]) ? $this->common->mysql_safe_string($_REQUEST['part_annual_income']) : '';

                    $eating_habits = isset($_REQUEST["eating_habits"]) ? $this->common->mysql_safe_string($_REQUEST['eating_habits']) : '';
                    $smoking_habits = isset($_REQUEST["smoking_habits"]) ? $this->common->mysql_safe_string($_REQUEST['smoking_habits']) : '';
                    $drinking_smoking_habits = isset($_REQUEST["drinking_smoking_habits"]) ? $this->common->mysql_safe_string($_REQUEST['drinking_smoking_habits']) : '';
                    $body_type = isset($_REQUEST["body_type"]) ? $this->common->mysql_safe_string($_REQUEST['body_type']) : '';
                    $complexion = isset($_REQUEST["complexion"]) ? $this->common->mysql_safe_string($_REQUEST['complexion']) : '';

                    $part_height = (int) $part_height;
                    $part_height_to = (int) $part_height_to;

                    $part_height = ($part_height != 0) ? $part_height : '0';
                    $part_height_to = ($part_height_to != 0) ? $part_height_to : '100';

                    $drinking_smoking_habits = ($drinking_smoking_habits != 0) ? $drinking_smoking_habits : '';

                    $smoking_habits = ($smoking_habits != 0) ? $smoking_habits : '';

                    $other_para .= '&prof_sex=' . $prof_sex;
                    $other_para .= '&part_age_from=' . $part_age_from;
                    $other_para .= '&part_age_to=' . $part_age_to;
                    $other_para .= '&part_height=' . $part_height;
                    $other_para .= '&part_height_to=' . $part_height_to;

                    $where_qry .= " AND prof_sex='" . $prof_sex . "'";

                    //    $where_qry .= " AND (age BETWEEN " . $part_age_from . " AND " . $part_age_to . ")";
                    //    $where_qry .= ' AND (height BETWEEN ' . $part_height . ' AND ' . $part_height_to . ')';

                    if ($part_marital_status != '') {
                        $where_qry .= ' AND mat_status IN ( ' . $part_marital_status . ' )';
                        $other_para .= '&part_marital_status=' . $part_marital_status;
                    } //isset( $_REQUEST['part_marital_status'] ) && $_REQUEST['part_marital_status'] != ''
                    if ($part_religion != '') {
                        $where_qry .= ' AND religion IN ( ' . $part_religion . ' )';
                        $other_para .= '&part_religion=' . $part_religion;
                    } //isset( $_REQUEST['part_religion'] ) && $_REQUEST['part_religion'] != ''
                    if ($part_cast != '') {
                        $where_qry .= ' AND cast IN ( ' . $part_cast . ' )';
                        $other_para .= '&part_cast=' . $_REQUEST['part_cast'];
                    } //isset( $_REQUEST['part_cast'] ) && $_REQUEST['part_cast'] != ''
                    if ($part_gothra != '') {
                        $where_qry .= ' AND gothra IN ( ' . $part_gothra . ' )';
                        $other_para .= '&part_gothra=' . $part_gothra;
                    } //isset( $_REQUEST['part_gothra'] ) && $_REQUEST['part_gothra'] != ''
                    if ($part_mother_tounge != '') {
                        $where_qry .= ' AND mother_tongue IN ( ' . $part_mother_tounge . ' )';
                        $other_para .= '&part_mother_toun=' . $part_mother_tounge;
                    } //isset( $_REQUEST['part_mother_toun'] ) && $_REQUEST['part_mother_toun'] != ''

                    if ($part_country != '') {
                        $where_qry .= " AND country =  '" . $part_country . "'";
                        $other_para .= '&part_country=' . $part_country;
                    } //isset( $_REQUEST['part_country'] ) && $_REQUEST['part_country'] != ''

                    if ($part_state != '') {
                        $where_qry .= " AND state =  '" . $part_state . "'";
                        $other_para .= '&part_state=' . $part_state;
                    } //isset( $_REQUEST['part_state'] ) && $_REQUEST['part_state'] != ''

                    if ($part_city != '') {
                        $where_qry .= " AND city =  '" . $part_city . "'";
                        $other_para .= '&part_city=' . $part_city;
                    } //isset( $_REQUEST['part_city'] ) && $_REQUEST['part_city'] != ''

                    if ($part_education != '') {

                        $where_qry .= ' AND eduction IN ( ' . $part_education . ' )';
                        $other_para .= '&part_education=' . $part_education;
                    } //isset( $_REQUEST['part_education'] ) && $_REQUEST['part_education'] != ''

                    if ($part_working_with != '') {

                        $where_qry .= ' AND employed_in IN ( ' . $part_working_with . ' )';
                        $other_para .= '&part_working_with=' . $part_working_with;
                    } //isset( $_REQUEST['part_working_with'] ) && $_REQUEST['part_working_with'] != ''

                    if ($part_occupation != '') {

                        $where_qry .= ' AND occupation IN ( ' . $part_occupation . ' )';
                        $other_para .= '&part_occupation=' . $part_occupation;
                    } //isset( $_REQUEST['part_occupation'] ) && $_REQUEST['part_occupation'] != ''

                    if ($part_annual_income != '') {
                        $where_qry .= " AND annual_income >=  " . $part_annual_income . "";
                        $other_para .= '&annual_income=' . $part_annual_income;
                    } //isset( $_REQUEST['part_annual_income'] ) && $_REQUEST['part_annual_income'] != ''

                    //
                    if ($eating_habits != '') {
                        $where_qry .= " AND eating_habits IN ( " . $eating_habits . " )";
                        $other_para .= '&eating_habits=' . $eating_habits;
                    } //isset( $_REQUEST['eating_habits'] ) && $_REQUEST['eating_habits'] != ''
                    if ($smoking_habits != '') {
                        $where_qry .= " AND smoking_habits =  '" . $smoking_habits . "'";
                        $other_para .= '&smoking_habits=' . $smoking_habits;
                    } //isset( $_REQUEST['smoking_habits'] ) && $_REQUEST['smoking_habits'] != ''
                    if ($drinking_smoking_habits != '') {
                        $where_qry .= " AND drinking_smoking_habits =  '" . $drinking_smoking_habits . "'";
                        $other_para .= '&drinking_smoking_habits=' . $drinking_smoking_habits;
                    } //isset( $_REQUEST['drinking_smoking_habits'] ) && $_REQUEST['drinking_smoking_habits'] != ''
                    if ($body_type != '') {
                        $where_qry .= " AND body_type IN ( " . $body_type . " )";
                        $other_para .= '&body_type=' . $body_type;
                    } //isset( $_REQUEST['body_type'] ) && $_REQUEST['body_type'] != ''
                    if ($complexion != '') {
                        $where_qry .= " AND complexion IN ( " . $complexion . " )";
                        $other_para .= '&complexion=' . $complexion;
                    } //isset( $_REQUEST['complexion'] ) && $_REQUEST['complexion'] != ''

                    $data['other_para_code'] = base64_encode($other_para);

                }
            } //isset( $_REQUEST['search_by'] ) && $_REQUEST['search_by'] != ''

        } //isset( $_REQUEST['mode'] ) && $_REQUEST['mode'] == 'search'
        $where_cond = "  $where_qry ORDER BY prof_id DESC";
        $sSql = "SELECT  c.*,lc.id as login_credentials_id , cn.name as country_name, st.name as state_name  FROM  customer_master c
						inner join login_credentials lc on c.customer_id=lc.user_id
						left join state st on c.state  = st.id
						left join country cn on c.country  = cn.id
						$where_qry";
        $query = $sSql . " " . $limit_qry;
        $data['search_query_limit'] = base64_encode($query);

        $query = $this->db->query($query);
        $row = $query->result_array();
        //echo sizeof($row);
        $data['search_rs'] = $row;

        $query_num = $this->db->query($sSql);
        $data['search_query'] = base64_encode($sSql);

        $numrow = $query_num->num_rows();
        $data['num_row'] = $numrow;

        $fun_name = $this->controller . "/result";
        $data['other_para'] = $other_para;
        
        $data['fun_name'] = $fun_name . "?".$other_para;
        $data['fun_name_only'] = $fun_name;
        $data['controller'] = $this->controller;
       

        if ($getUserMembershipPlanStats['can_see_profile'] != 1 && $data['page'] > 1) {
            setcookie('wti_br_link', site_url('browse/result?' . $other_para), time() + 60 * 60 * 24 * 365, '/');
            $this->session->set_flashdata('error_msg', "Please upgrade your membership plan to view result  ");

            redirect("account/dashboard");
            die();
        }
       

         
         
        $this->load->view('websiteadmin/browse_results', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

    public function profile($customer_id = 0)
    {
        $this->common->check_user_session();
        $data['menu_active_main'] = "Profile";
        $data['menu_active_sub_main'] = "Profile";
        $data['page_section'] = "Profile";
        $data['class'] = "current";
        $data['controller'] = $controller = $this->controller;
        $data['profile_detail'] = array();
        $data['error_msg'] = $error_msg = "";

        $session_user_data = $this->session->userdata('front_user_data');
        $session_user_id = (isset($session_user_data['user_id'])) ? $session_user_data['user_id'] : '';
        $session_login_credentials_id = (isset($session_user_data['login_credentials_id'])) ? $session_user_data['login_credentials_id'] : '';
        $session_user_type = (isset($session_user_data['user_type'])) ? $session_user_data['user_type'] : '';
        //$data['profile_detail'] = $this->customermodal->getProfileDetail();

        $isProfileCompleted = $this->customermodal->isProfileCompleted();

        if ($isProfileCompleted['status'] == 0) {
            $this->session->set_flashdata('error_msg', $isProfileCompleted['message']);

            redirect("account/dashboard");
            die();
        } //$isProfileCompleted['status'] == 0
        else {
            $data['profile_detail'] = $profile_detail = $this->customermodal->getProfileDetail($session_user_id);
        }

        $customer_id = filter_var($customer_id, FILTER_SANITIZE_NUMBER_INT);

        $data['getUserMembershipPlanStats'] = $getUserMembershipPlanStats = $this->customermodal->getUserMembershipPlanStats($profile_detail['current_plan'], $session_user_id);

        $data['customer_profile_detail'] = $customer_profile_detail = $this->customermodal->getProfileDetail($customer_id);

        if (sizeof($customer_profile_detail) <= 0) {
            redirect("home");
        }

        if ($customer_id != $session_user_id) {
            if ($getUserMembershipPlanStats['can_see_profile'] != 1) {
                ////http://127.0.0.1/bhoiraj/index.php/browse/profile/16
                setcookie('wti_br_link', site_url('browse/profile/' . $customer_id), time() + 60 * 60 * 24 * 365, '/');
                $this->session->set_flashdata('error_msg', "Please upgrade your membership plan to view profile " . $customer_profile_detail['affiliated']);

                redirect("account/dashboard");
                die();
            }
        }
        $this->load->view('websiteadmin/browse_profiles', $data);
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('warning');
        $this->session->unset_userdata('error');
    }

}

?>