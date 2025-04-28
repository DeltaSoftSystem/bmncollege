
<!--footer start here-->    
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.799596805155!2d72.85765081430644!3d19.0285504584084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cf2f051bdd6f%3A0xf26f202e33ba0e2b!2sDr.%20BMN%20College%20of%20Home%20Science!5e0!3m2!1sen!2sin!4v1640724225657!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="connect_bx">
                    <h3 class="footer_title"><?php echo $this->lang->line("Connect With Us");?></h3>
                    <ul class="footer_address">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $this->lang->line("338, Rafi Ahmed Kidwai Road,Matunga,");?> <br><?php echo $this->lang->line("Mumbai -400019");?> </li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $this->lang->line("Phone");?>: <a href="callto:02224095792"><?php echo $this->lang->line("022 2409 5792");?></a>  <a href="callto:02224035296"></a> </li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $this->lang->line("Email");?>: <a href="mailto:smesedu@gmail.com">smesedu@gmail.com</a> </li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="footer_title social"><?php echo $this->lang->line("FOLLOW US ON");?></h3>
                    <ul class="social_icn">
                        <li><a href="https://instagram.com/bmn_college?igshid=YmMyMTA2M2Y=" target="_blank"><img src="<?php echo base_url();?>assets/images/social_insta.png" alt=""></a></li>
                        <li><a href="https://www.facebook.com/Dr-BMN-College-of-Home-Science-208633133133272/" target="_blank"><img src="<?php echo base_url();?>assets/images/social_fb.png" alt=""></a></li>
                        <li><a href="https://twitter.com/DrBMNCollege" target="_blank"><img src="<?php echo base_url();?>assets/images/social_twt.png" alt=""></a></li>
                        <li><a href="https://www.youtube.com/channel/UCksh44oXAYahaIpYz6cciQw" target="_blank"><img src="<?php echo base_url();?>assets/images/social_yt.png" alt=""></a></li>
                        <!-- <li><a href="https://www.linkedin.com/school/dr-bmn-college-of-home-science/" target="_blank"><img src="<?php echo base_url();?>assets/images/social_in.png" alt=""></a></li> -->
                    </ul>
                </div>
                
            </div>
            
            <div class="col-sm-2">
                <h3 class="footer_title"><?php echo $this->lang->line("Quick Links");?></h3>
                <ul class="footer_menu">
                    <li><a href="<?php echo site_url('home')?>"><i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("Home");?> </a></li>
                    <li><a href="about-us"><i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("About Us");?> </a></li>
                    <li><a href="HD-programm"><i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("Programme");?> </a></li>
                    <li><a href="library"><i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("Library");?> </a></li>
                    <li><a href="contact-us"><i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("Contact Us");?> </a></li>
                </ul>
            </div>
            
            
            
            <div class="col-sm-3">
                <h3 class="footer_title"><?php echo $this->lang->line("Important Links");?></h3>
                <ul class="footer_menu">
                    <li><a href="https://www.maharashtra.gov.in/1125/Home" target="_blank">
                        <i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("Government of Maharashtra");?> 
                    </a></li>
                    <li><a href="https://sndt.ac.in/" target="_blank">
                        <i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("SNDT UNIV");?> 
                    </a></li>
                    <li><a href="https://www.education.gov.in/en" target="_blank">
                        <i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("Ministry of Education");?> 
                    </a></li>
                    <li><a href="https://scholarships.gov.in/" target="_blank">
                        <i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("National Scholarship Portal");?> 
                    </a></li>
                    <li><a href="https://www.academicdepository.com/NAD/uidStudentReg.action?activePage=regactuidStudentReg" target="_blank">
                        <i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("National Academic Depository");?>
                    </a></li>
                    <li><a href="http://rusa.nic.in/" target="_blank">
                        <i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->lang->line("Rashtriya Uchchatar Shiksha Abhiyan");?></a> </li>
                        <!--<li><a href="https://sndt.ac.in/" target="_blank">-->
                        <!--<i class="fa fa-check" aria-hidden="true"></i> <?php //echo $this->lang->line("Rashtriya Uchchatar Shiksha Abhiyan");?></a> </li>-->
                        
                </ul>
            </div>
        </div> 
        
        <div class="copyright_row">
            <div class="copyright_l">
            <?php echo $this->lang->line("Copyright");?> © <?php echo date("Y")?>-<?php echo (date("Y")+1)?> <?php echo $this->lang->line("BMN College of Home Science");?> &nbsp;  | &nbsp;  <?php echo $this->lang->line("All Rights Reserved.");?>
            </div>
            <div class="copyright_r">
                <?php
                $sql = "select * from wti_m_visitor_counter";
                $query = $this->db->query($sql);
                 $rs_counter = $query->row_array();         
                ?>
                <span>Visitor Counter :</span>
                <div class="incremental-counter" data-value="<?php echo $rs_counter['visitor_count']?>"></div>
            </div>
            <div class="clr"></div>
        </div>
        
         <!--<div class="copyright">
            Copyright © 2021-22 BMN College of Home Science &nbsp;  | &nbsp;  All Rights Reserved.             
         </div>-->
    </div>
   
</footer>
<?php
$sql = "update  wti_m_visitor_counter set visitor_count = visitor_count+1";
$this->db->query($sql);
?>
<!--footer close here-->