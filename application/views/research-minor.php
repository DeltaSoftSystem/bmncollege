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
    <h3 class="page_name_title">Minor Research Projects</h3>
    <p class="page_breadcrumb">
    <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Research
    <i class="fa fa-angle-right next" aria-hidden="true"></i>  Minor Research Projects</p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="quick_link mobile">
                    <!--<h3><i class="fa fa-link" aria-hidden="true"></i> Quick Links</h3>-->
                    <ul class="quick_menu research">
                        <li><a href="research-committee"><i class="fa fa-paperclip" aria-hidden="true"></i>  Committee </a></li>
                        <!--<li><a href="<?php echo base_url();?>uploads/pdf/guidelines.pdf" target="_blank"><i class="fa fa-paperclip" aria-hidden="true"></i>  Guidelines </a></li>-->
                        <li><a href="research-minor" class="active"><i class="fa fa-paperclip" aria-hidden="true"></i> Minor Research Projects</a></li>
                        <li><a href="research-online"><i class="fa fa-paperclip" aria-hidden="true"></i> Online Sessions for UG and PG students</a></li>
                        <li><a href="research-activity"><i class="fa fa-paperclip" aria-hidden="true"></i> Activities For Faculty Members </a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <h3 class="research_title space">Minor Research Project</h3>
                <p class="abt_txt">To enhance skills in research, staff members under the self-financed section were encouraged to write proposals and submit for minor research grants. In response to the notice dated 16/10/2020 published on the college website, the UGC Stride Center for Research Capacity Building has received proposals/ tentative topics from teacher teams from self-financed programs. The proposals are submitted under the category of Minor Research grants instituted by the Management of Seva Mandal Education Society.</p>
                
                <div class="buttons_row">
                    <a href="<?php echo base_url();?>uploads/pdf/Notice-of-short-listing-round-of-MRP.pdf" target="_blank" class="abt_more"><i class="fa fa-paperclip" aria-hidden="true"></i> Notice of Short Listing round of MRP</a>
                    <a href="<?php echo base_url();?>uploads/pdf/Shortlisted-Teams-for-2021-2022.pdf" target="_blank"><i class="fa fa-paperclip" aria-hidden="true"></i> Shortlisted Teams for (2021-2022)</a>
                </div>
               
                
                
                
                
            </div>
        </div>
    </div>
</section>   
    
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>
     
    
</body>
</html>
