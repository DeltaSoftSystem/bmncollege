<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('inc_header_title'); ?>

</head>
<body>
     
 <!--header start here-->    

 <?php $this->load->view('inc_header_menu'); ?>
   
   <!--header close here-->
    
<section class="page_name">
    <h3 class="page_name_title">Search</h3>
    <!--<p class="page_breadcrumb">
    <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
    <i class="fa fa-angle-right next" aria-hidden="true"></i> About Us 
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Organogram</p>-->
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        
        
    <?php
                //print_r($results);  
                $keywords = $this->input->get('keywords');
                foreach($results as $key1 => $value){
                   $value_expl = explode("<br>",$value['contents']);
                   $heading = "";
                   $detail  = "";
                    $ahref = basename($value['urls']);
                 
                   if(sizeof($value_expl) > 0){
                        $heading = strip_tags($value_expl[0]);
                        $detail = strip_tags($value_expl[1]);
                   } else {
                        $heading = strip_tags($value_expl[0]);
                        $detail = strip_tags($value_expl[0]);
                   }
                   
                  // echo preg_match('~id=\K\d+~', $detail, $out) ? $out[0] : 'no match';

                   $heading = substr($heading,0,200);
                   $detail = substr($detail,0,200);
                ?>
        <div class="search_one">
            <h3><a href="<?php echo $ahref?>"><?php echo $heading?></a></h3>
            <p><?php echo $detail?></p>
        </div>
        
        <?php }?>
        
    </div>
</section>

    
    
    
     
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>

</body>
</html>
