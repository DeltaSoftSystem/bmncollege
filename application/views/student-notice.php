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
    <h3 class="page_name_title">Notices</h3>
    <p class="page_breadcrumb">
        <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
        <i class="fa fa-angle-right next" aria-hidden="true"></i> Exam
        <i class="fa fa-angle-right next" aria-hidden="true"></i> Notices
    </p>
</section>    
    
<section class="slide_bx">
    <div class="container">
        
        <div class="row">

        <?php 
            foreach($results as $key => $records){
            ?>

            <div class="col-sm-6 ">
                <div class="post_bx_one" style="overflow-wrap:break-word" >
                    <div class="notice_title" >
                   
                    
                        <div class="notice_l"><?php echo $this->common->getDateFormat($records['event_dates'],'d')?> <span><?php echo $this->common->getDateFormat($records['event_dates'],'F')?></span></div>
                        <div class="notice_r" style="overflow-wrap:break-word" ><span>Notices</span> <?php echo isset($records['heading']) ? $records['heading'] : ''; ?></div>
                       
                        <div class="clr"></div>
                    </div>
                    <p class="post_txt" style="overflow-wrap:break-word" > <?php echo isset($records['descriptions']) ? $records['descriptions'] : ''; ?></span>
                    </p>
                    <?php
                    $featured_image = (isset($records['featured_image']) && $records['featured_image']!="") ? base_url()."uploads/notice/".$records['featured_image'] : '' ;
                        if($featured_image!=""){
                    ?>    
                     <div class="post_pic"><img src="<?php echo $featured_image?>" alt="<?php echo basename($featured_image)?>"></div>
                     <?php }?>
                    <button onclick="myFunction()" id="myBtn" class="abt_more">Read more</button>
                </div>
            </div>
            <?php } ?> 
            
        </div>
        <?php if($num_row>=$maxm){ ?>
            <div class="row">
                <div class="col-sm-12 text-center  ">
                    <ul class="pagination-flat justify-content-center twbs-flat pagination pull-right">
                        <?php echo $this->common->ajaxpagingnation_admin_new($start,$num_row,$maxm,'',$fun_name,$other_para); ?>

                    </ul>
                </div>
            </div>
            <?php } ?>
    </div>
</section>
    
     
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>

</body>
</html>
