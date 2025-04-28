<?php
error_reporting(E_ALL);

class Services extends CI_Model
{

    public function __construct()
    {
    }

    public function get_categorylist_parent_sub($id=0){
          $sql = "select * from m_newsblog_cat where  parent_id=0 AND status_flag='1' and delete_status=0 order by cate_name asc   ";
        $query_result = $this->db->query($sql);
        $results = $query_result->result_array();

        $combo = "<option value='' >Select Category</option>";
        foreach ($results as $key => $value) {

			$sql = "select * from m_newsblog_cat where  parent_id=".$value['id']." AND status_flag='1' and delete_status=0 order by cate_name asc   ";
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
}
