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
    <h3 class="page_name_title">Critical Thinking</h3>
    <p class="page_breadcrumb">
    <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Research
    <i class="fa fa-angle-right next" aria-hidden="true"></i>  Critical Thinking</p>
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
                        <li><a href="research-collaborations"><i class="fa fa-paperclip" aria-hidden="true"></i> Collaborations  </a></li>
                        <li><a href="research-critical-thinking" class="active"><i class="fa fa-paperclip" aria-hidden="true"></i> Critical Thinking  </a></li>                        
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <h3 class="research_title space">Critical Thinking Lab</h3>
                <p class="abt_txt">As per the implementation of the proposed plan under the project, the Centre has developed the Critical Thinking Lab to provide an exclusive space for the students to undertake various activities related to research capacity building. The focus is on independent thinking skills and on applying critical thinking to life situations. The main objectives of the lab are as follows: </p>
                    
                <ul class="iqac_list research"> 
                    <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Conduct workshops to develop critical thinking skills.</li>
                    <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Develop problem solving and analytical skills.</li>
                    <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Understand concepts, features and theories of critical thinking.</li>
                    <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Apply varied approach to develop interdisciplinary research.</li>                
                </ul>       

                
                
                
                <div class="skill_list research">
                   
                    <ul>
                        <li>
                            <a href="<?php echo base_url();?>uploads/pdf/food-product-development-initiative.pdf" target="_blank">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Food Product Development Initiative</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>uploads/pdf/exploring-development.pdf" target="_blank"> 
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exploring Techniques of Innovative Ecoprinting on Textiles and Product Development</a>
                        </li>
                        
                    </ul>
                </div>
                
                <div class="a">
                    <img src="<?php echo base_url();?>assets/images/critical_pic.jpg" alt="">
                </div>
                
                
               
               
                
                
                
                
            </div>
        </div>
    </div>
</section>   

    
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>
   
    
</body>
</html>
