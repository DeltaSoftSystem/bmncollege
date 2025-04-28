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
    <h3 class="page_name_title">Linkages</h3>
    <p class="page_breadcrumb">
    <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Linkages</p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        
            
            <div class="pdf_links linkages">
            <ul>
            <?php
            // print_r($results);
             foreach($results as $key => $records){
			?>
                <li><a href="<?php echo base_url();?>uploads/cms/linkages/<?php echo isset($records['pdf_file']) ? $records['pdf_file'] : ''; ?>" target="_blank"> <?php echo isset($records['name']) ? $records['name'] : ''; ?> </a></li>
                <?php } ?>
               
            </ul>
            
            
            
            
            <div class="clr"></div>
        </div>
            
        
           
        
        
       
        
    </div>
</section>
    


    
    
    
    
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>
   
    
</body>
</html>
