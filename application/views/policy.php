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
    <h3 class="page_name_title">Policy</h3>
    <p class="page_breadcrumb">
    <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Research</a>          
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Research
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Policy</p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        <div class="under_construction">
            <div class="under_txt">
                <h3 class="under_title"><span>Oops!</span> Under Maintenance</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dignissim tellus in elit tempor convallis. Nunc egestas felis urna, at elementum ligula luctus ac. In ex felis, finibus vel sollicitudin sit amet, congue eu orci. Quisque hendrerit sapien et velit bibendum, vel aliquam urna molestie. Donec et consequat mi</p>
            </div>
            <div class="under_pic"><img src="<?php echo base_url();?>assets/images/under-construction.jpg" alt=""> </div>
        </div>
    </div>
</section>
    
    
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>

</body>
</html>
