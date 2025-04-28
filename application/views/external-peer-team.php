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
    <h3 class="page_name_title">External Peer Team</h3>
    <p class="page_breadcrumb">
        <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
        <i class="fa fa-angle-right next" aria-hidden="true"></i> NAAC 
        <i class="fa fa-angle-right next" aria-hidden="true"></i> External Peer Team</p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        <h3 class="research_title">Names of Audit Team</h3>
        <div class="row">
            
            <!--1-->
            <div class="col-sm-3">
                <div class="peer_one">
                    <img src="<?php echo base_url();?>assets/images/faculty_pic.jpg" alt="">
                    <div class="peer_cont">
                        <h3 class="peer_nm">Prof. Dr. Mira Desai</h3>
                         <p class="peer_txt">HOD and Professor, Department of Extension and Communication. SNDTWU, Mumbai</p>
                    </div>
                </div>
            </div>
            
            <!--2-->
            <div class="col-sm-3">
                <div class="peer_one">
                    <img src="<?php echo base_url();?>assets/images/faculty_pic.jpg" alt="">
                    <div class="peer_cont">
                        <h3 class="peer_nm">Prof. Dr. Jessy Pius</h3>
                         <p class="peer_txt">Head Department Botany/IQAC Coordinator , Ramnarain Ruia College,Matunga, Mumbai</p>
                    </div>
                </div>
            </div>
            
            <!--3-->
            <div class="col-sm-3">
                <div class="peer_one">
                    <img src="<?php echo base_url();?>assets/images/faculty_pic.jpg" alt="">
                    <div class="peer_cont">
                        <h3 class="peer_nm">Prof. Dr. Mira Desai</h3>
                         <p class="peer_txt">HOD and Professor, Department of Extension and Communication. SNDTWU, Mumbai</p>
                    </div>
                </div>
            </div>
            
            <!--4-->
            <div class="col-sm-3">
                <div class="peer_one">
                    <img src="<?php echo base_url();?>assets/images/faculty_pic.jpg" alt="">
                    <div class="peer_cont">
                        <h3 class="peer_nm">Prof. Dr. Jessy Pius</h3>
                         <p class="peer_txt">Head Department Botany/IQAC Coordinator , Ramnarain Ruia College,Matunga, Mumbai</p>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>
</section>
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>

    
</body>
</html>
