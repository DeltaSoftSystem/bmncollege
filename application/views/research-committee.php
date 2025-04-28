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
    <h3 class="page_name_title">Committee</h3>
    <p class="page_breadcrumb">
    <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Research
    <i class="fa fa-angle-right next" aria-hidden="true"></i> Committee</p>
</section>    
   
  
    
<section class="slide_bx">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="quick_link mobile">
                    <ul class="quick_menu research">
                        <li><a href="research-committee" class="active"><i class="fa fa-paperclip" aria-hidden="true"></i>  Committee </a></li>
                        <li><a href="research-page"><i class="fa fa-paperclip" aria-hidden="true"></i> Research</a></li>
                        <li><a href="research-activity"><i class="fa fa-paperclip" aria-hidden="true"></i> Activities</a></li>
                        <li><a href="research-collaborations"><i class="fa fa-paperclip" aria-hidden="true"></i> Collaborations  </a></li>
                        <li><a href="research-critical-thinking"><i class="fa fa-paperclip" aria-hidden="true"></i> Critical Thinking  </a></li>                        
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <h3 class="research_title">The STRIDE Team at Dr. BMN College of Home Science (Autonomous)</h3>
                <div class="commitee_list top">
                    <ul>
                        <li><i class="fa fa-user" aria-hidden="true"></i> Prof. Dr. Mala Pandurang, <span>Principal</span></li>
                        <li><i class="fa fa-user" aria-hidden="true"></i> Dr. Pradnya Ambre, <span>Coordinator</span></li>
                        <li><i class="fa fa-user" aria-hidden="true"></i> Ms. Manjot Kaur, <span>Asst Professor</span></li>
                        <li><i class="fa fa-user" aria-hidden="true"></i> Dr. Lakshmi Menon, <span>Asst Professor</span></li>
                        <li><i class="fa fa-user" aria-hidden="true"></i> Dr. Harsha Chopra, <span>Asst Professor</span></li>
                        <!--<li><i class="fa fa-user" aria-hidden="true"></i> Ms. Huda Sayyed, <span>Project Assistant</span></li>-->
                    </ul>
                </div>
                
                <h3 class="research_title space">Mentoring and Monitoring Committee</h3>
                <div class="commitee_list">
                    <ul>
                        <li><i class="fa fa-user" aria-hidden="true"></i> Dr. Vidita Vaidya, <span>UGC Nominee</span>
                        <span class="second_line">Professor, Department of Biological Sciences, TIFR</span>
                        </li>
                        <li><i class="fa fa-user" aria-hidden="true"></i> Dr. Sandeep More, <span>Eminent Scientist</span>
                        <span class="second_line">DST Inspire Fellow, Dept Of Fiber and Textile Processing Technology, ICT, Mumbai</span>
                        </li>
                        <li><i class="fa fa-user" aria-hidden="true"></i> Dr. Ratna Thar, <span>Eminent Scholar</span>
                        <span class="second_line">Research Director, College of Home Science, Nirmala Niketan</span>
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
