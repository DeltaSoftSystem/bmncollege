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
    <h3 class="page_name_title">Organogram</h3>
    <p class="page_breadcrumb">
    <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
    <i class="fa fa-angle-right next" aria-hidden="true"></i> About Us 
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Organogram</p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        
        <img src="<?php echo base_url();?>assets/images/parent_body.png" alt="">
        
        
        
    </div>
</section>

    
    
    
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>

        
    
</body>
</html>
