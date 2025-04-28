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
    <h3 class="page_name_title">Skill Development Courses</h3>
    <p class="page_breadcrumb">
        <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
        <i class="fa fa-angle-right next" aria-hidden="true"></i> Programme 
        <i class="fa fa-angle-right next" aria-hidden="true"></i> Skill Development Courses
        <i class="fa fa-angle-right next" aria-hidden="true"></i> Additional Credits Courses
    </p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        
        <h3 class="research_title">Additional Capacity Building Certificate Courses offered by
Dr. BMN College of Home Science (Autonomous)</h3>
        
        <ul class="iqac_list">
            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> A student enrolled in the institution (Undergraduate Programmes) will be encouraged to pursue the following skill based/enrichment/value added / Online courses.</li>
            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Student will be getting individual course certificates on completion of each course.</li>
            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Students will be awarded an additional Consolidated Certificate on successful completion of at least 15 Capacity Building Credit s at the end of 6 semesters.</li>
            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Students are required to check Eligibility Criteria before joining the course.</li>
            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Conditions for obtaining Course Certificate:
                <span>- Need to have more than 75% attendance</span>
                <span>- Passing Percentage of the course is 40%.</span>
            </li>
            
        </ul>
        
        
        <div class="skill_list">
            <h3 class="research_title">Skill Based Courses :</h3>
            <ul>
                <?php
                 foreach($results as $key => $value){
                    $pdf_file = (isset($value['pdf_file']) && $value['pdf_file']!="") ? base_url()."uploads/cms/programme/".$value['pdf_file'] : '' ;
                ?>
                <li><a href="<?php echo $pdf_file;?>" target="_blank"><span><?php echo $value['heading']?> :</span> <?php echo $value['descriptions']?></a></li>
                <?php }?>
                <!-- <li><a href="<?php echo base_url();?>uploads/pdf/category-II.pdf" target="_blank"><span>Catergory 02 :</span> Computer Literacy Courses</a></li>
                <li><a href="<?php echo base_url();?>uploads/pdf/category-III.pdf" target="_blank"><span>Catergory 03 :</span> Language And Communication Skills Related Courses</a></li>
                <li><a href="<?php echo base_url();?>uploads/pdf/category-IV.pdf" target="_blank"><span>Catergory 04 :</span> Courses Related to Life skills and Personality Development</a></li>
                <li><a href="<?php echo base_url();?>uploads/pdf/category-V.pdf" target="_blank"><span>Catergory 05 :</span> Courses For Enhancing Employability / Skill Based</a></li>
                <li><a href="<?php echo base_url();?>uploads/pdf/category-VI.pdf" target="_blank"><span>Catergory 06 :</span> Value Added Courses</a></li>
                <li><a href="<?php echo base_url();?>uploads/pdf/category-VII.pdf" target="_blank"><span>Catergory 07 :</span> Credits For Cocurricular Activities</a></li>
                <li><a href="<?php echo base_url();?>uploads/pdf/category-VIII.pdf" target="_blank"><span>Catergory 08 :</span> Online Courses</a></li> -->
            </ul>
        </div>
        
        
    </div>
</section>    
    
     
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>
     
    
</body>
</html>
