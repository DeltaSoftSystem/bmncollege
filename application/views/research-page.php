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
    <h3 class="page_name_title">Research</h3>
    <p class="page_breadcrumb">
    <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Research
    <i class="fa fa-angle-right next" aria-hidden="true"></i>  Research</p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="quick_link mobile">
                    <!--<h3><i class="fa fa-link" aria-hidden="true"></i> Quick Links</h3>-->
                    <ul class="quick_menu research">
                        <li><a href="research-committee"><i class="fa fa-paperclip" aria-hidden="true"></i>  Committee </a></li>
                        <li><a href="research-page" class="active"><i class="fa fa-paperclip" aria-hidden="true"></i> Research</a></li>
                        <li><a href="research-activity"><i class="fa fa-paperclip" aria-hidden="true"></i> Activities</a></li>
                        <li><a href="research-collaborations"><i class="fa fa-paperclip" aria-hidden="true"></i> Collaborations  </a></li>
                        <li><a href="research-critical-thinking"><i class="fa fa-paperclip" aria-hidden="true"></i> Critical Thinking  </a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <h3 class="research_title space">Research</h3>
                <p class="abt_txt">To enhance skills in research, staff members of Dr. BMN College of Home Science are encouraged annually to apply for a minor research grant sponsored by the Seva Mandal Education Society. Each year, multiple proposals are shortlisted, and the selected faculty members receive institutional support to work on their projects. The duration of the projects is one year.  </p>
                
                
                <div class="skill_list research">
                    <h3 class="research_title space">2022 - 2023</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url();?>uploads/pdf/Research-Proposals.pdf" target="_blank">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Notice Regarding the Selection of Minor Research Proposals</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>uploads/pdf/notice-hod.pdf" target="_blank"> 
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Notice for HODs</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>uploads/pdf/notice-faculty-members.pdf" target="_blank">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Notice For Faculty Members</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>uploads/pdf/research-proposals-2022-23.pdf" target="_blank">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Call for Minor Research Proposals 2022-23</a>
                        </li>
                    </ul>
                </div>
                
                <div class="skill_list research">
                    <h3 class="research_title space">2021 - 2022</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url();?>uploads/pdf/shortlisted-teams-2020-2021.pdf" target="_blank">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Shortlisted Teams for 2020-2021</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>uploads/pdf/Notice-of-MRP.pdf" target="_blank"> 
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Notice of short listing round of MRP</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>uploads/pdf/notification-proposals.pdf" target="_blank">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Copy of Notification for Proposals</a>
                        </li>
                        
                    </ul>
                </div>
                
               
               
                
                
                
                
            </div>
        </div>
    </div>
</section>   

    
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>
    
    
</body>
</html>
