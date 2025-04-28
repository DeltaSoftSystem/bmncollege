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
    <h3 class="page_name_title">E-Content</h3>
    <p class="page_breadcrumb">
        <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
        <i class="fa fa-angle-right next" aria-hidden="true"></i> E-learning 
        <i class="fa fa-angle-right next" aria-hidden="true"></i> E-Content</p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        
            <?php
           // print_r($results);  
             foreach($results as $key => $records){
			?>
            <!--1-->
            <div class="learning_one">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="faculty_pic"><img src="<?php echo base_url();?><?php echo isset($records['featured_image']) ? '/uploads/cms/econtent/'.$records['featured_image'] : '/assets/images/dummy_faculty.jpg'; ?>" alt="<?php echo isset($records['featured_image']) ? $records['featured_image'] : ''; ?>"></div>
                    </div>
                    <div class="col-sm-10">
                        <h3 class="faculty_nm"><?php echo isset($records['title_name']) ? $records['title_name'] : ''; ?></h3>
                        <p class="post_txt"><?php echo isset($records['descriptions']) ? $records['descriptions'] : ''; ?></p>
                        <?php
                        if(isset($records['pdf_file'])){    
                        ?>
                        <a href="<?php echo base_url();?>uploads/cms/econtent/<?php echo isset($records['pdf_file']) ? $records['pdf_file'] : ''; ?>" target="_blank" title="<?php echo isset($records['pdf_file']) ? $records['pdf_file'] : ''; ?>" class="iqac_link pdf">PDF File Link</a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            <?php if($num_row>=$maxm){ ?>
            <div class="row">
                <div class="col-xl-12 text-center  ">
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
