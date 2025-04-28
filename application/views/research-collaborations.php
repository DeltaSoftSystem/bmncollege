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
    <h3 class="page_name_title">Collaborations</h3>
    <p class="page_breadcrumb">
    <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Research
    <i class="fa fa-angle-right next" aria-hidden="true"></i>  Collaborations</p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="quick_link mobile">
                    <!--<h3><i class="fa fa-link" aria-hidden="true"></i> Quick Links</h3>-->
                    <ul class="quick_menu research">
                        <li><a href="research-committee"><i class="fa fa-paperclip" aria-hidden="true"></i>  Committee </a></li>
                        <li><a href="research-page"><i class="fa fa-paperclip" aria-hidden="true"></i> Research</a></li>
                        <li><a href="research-activity"><i class="fa fa-paperclip" aria-hidden="true"></i> Activities</a></li>
                        <li><a href="research-collaborations" class="active"><i class="fa fa-paperclip" aria-hidden="true"></i> Collaborations  </a></li>
                        <li><a href="research-critical-thinking"><i class="fa fa-paperclip" aria-hidden="true"></i> Critical Thinking  </a></li>                        
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <h3 class="research_title space">Collaborations</h3>
                <p class="abt_txt">In keeping with the objectives of the Research Capacity Building Centre, collaborations have been signed with multiple organizations. These collaborations allow the Centre to organize novel and unique research activities and lectures. The Centre has hosted excellent resource persons and facilitators who have facilitated insightful sessions on topics ranging from Creative Thinking to Research Writing for the Humanities. </p>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="event_tab">
                            <img src="<?php echo base_url();?>assets/images/collaborations_1.jpg" alt="">
                            <h4>Learning to Explore and Investigate</h4>
                            <a href="<?php echo base_url();?>uploads/pdf/collaborations_1.pdf" target="_blank" class="iqac_link pdf">Read More</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="event_tab">
                            <img src="<?php echo base_url();?>assets/images/collaborations_2.jpg" alt="">
                            <h4>Exploring our Questions </h4>
                            <a href="<?php echo base_url();?>uploads/pdf/collaborations_2.pdf" target="_blank" class="iqac_link pdf">Read More</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="event_tab">
                            <img src="<?php echo base_url();?>assets/images/collaborations_3.jpg" alt="">
                            <h4>Design Thinking for Staff Members </h4>
                            <a href="<?php echo base_url();?>uploads/pdf/collaborations_3.pdf" target="_blank" class="iqac_link pdf">Read More</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="event_tab">
                            <img src="<?php echo base_url();?>assets/images/collaborations_4.jpg" alt="">
                            <h4>Design Thinking - Session II </h4>
                            <a href="<?php echo base_url();?>uploads/pdf/collaborations_4.pdf" target="_blank" class="iqac_link pdf">Read More</a>
                        </div>
                    </div>
                    <!--<div class="col-sm-4">
                        <div class="event_tab">
                            <img src="<?php echo base_url();?>assets/images/collaborations_1.jpg" alt="">
                            <h4>Design Thinking - Session II</h4>
                            <a href="<?php echo base_url();?>uploads/pdf/collaborations_5.pdf" target="_blank" class="iqac_link pdf">Read More</a>
                        </div>
                    </div>-->
                    <div class="col-sm-6">
                        <div class="event_tab">
                            <img src="<?php echo base_url();?>assets/images/collaborations_6.jpg" alt="">
                            <h4>Creative Thinking - Session II</h4>
                            <a href="<?php echo base_url();?>uploads/pdf/collaborations_6.pdf" target="_blank" class="iqac_link pdf">Read More</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="event_tab">
                            <img src="<?php echo base_url();?>assets/images/collaborations_7.jpg" alt="">
                            <h4>CrCreative Thinking -  Session I</h4>
                            <a href="<?php echo base_url();?>uploads/pdf/collaborations_7.pdf" target="_blank" class="iqac_link pdf">Read More</a>
                        </div>
                    </div>
                </div>
                
                
                <div class="skill_list">
                   <h3 class="research_title space"> Activities under Collaboration</h3>
                    <ul>
                        <li>
                            <a href="https://youtu.be/Ky5GxWS11Wc" target="_blank">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Research Writing for Humanities</a>
                        </li>
                        <li>
                            <a href="https://drive.google.com/file/d/1ZkNrI6H5u4gS9qCmBIAoRndaWxacDJch/view?usp=sharing" target="_blank"> 
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Creative Thinking - Session II</a>
                        </li>
                        <li>
                            <a href="https://drive.google.com/file/d/1oP2qh1nKbFn8k5IqrT6S5JL_aiKaAE4j/view?usp=sharing" target="_blank"> 
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Learning to Explore and Investigate</a>
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
