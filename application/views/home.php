<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('inc_header_title'); ?>
    <style>
    .sub_designation {
        margin-top: 10px;
        color: #ff8c06;
        font-size: 15px;
        text-transform: uppercase;
        display: block;
        line-height: 20px;
    }
    #readmore {display: none;}
    .abt_txt span {
    font-family: 'Roboto-Regular';
}
    </style>
</head>

<body>


    <!--header start here-->

    <?php $this->load->view('inc_header_menu'); ?>

    <!--header close here-->

    <section class="slide_bx">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                    <div class="vertical">
                        <ul>
                            <li><a href="AISHE"><i class="fa fa-university" aria-hidden="true"></i> <?php echo $this->lang->line("AISHE");?> </a></li>
                            <!--<li><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> NIRF </a></li>-->
                            <li><a href="#"><i class="fa fa-desktop" aria-hidden="true"></i> <?php echo $this->lang->line("NIRF");?>
                                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                <ul>
                                    <li><a href="#" target="_blank"><?php echo $this->lang->line("a2020");?></a>
                                        <ul>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/college-2020.pdf"
                                                    target="_blank"><?php echo $this->lang->line("College 2020");?></a></li>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/overall-2020.pdf"
                                                    target="_blank"><?php echo $this->lang->line("Overall 2020");?></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><?php echo $this->lang->line("a2021");?></a>
                                        <ul>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/college-2021.pdf"
                                                    target="_blank"><?php echo $this->lang->line("College 2021");?></a></li>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/overall-2021.pdf"
                                                    target="_blank"><?php echo $this->lang->line("Overall 2021");?></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><?php echo $this->lang->line("a2022");?></a>
                                        <ul>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/college-2022.pdf"
                                                    target="_blank"><?php echo $this->lang->line("College 2022");?></a></li>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/overall-2022.pdf"
                                                    target="_blank"><?php echo $this->lang->line("Overall 2022");?></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">2023</a>
                                        <ul>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/NIRF 2024 - COLLEGE Dr. Bhanuben Mahendra Nanavati College of Home Science20231223-.pdf"
                                                    target="_blank">College 2023</a></li>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/NIRF 2024 - COLLEGE Dr. Bhanuben Mahendra Nanavati College of Home Science20231223-.pdf"
                                                    target="_blank">Overall 2023</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">2024</a>
                                        <ul>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/OVERALL - Dr. Bhanuben Mahendra Nanavati College of Home Science20240111-.pdf"
                                                    target="_blank">College 2024</a></li>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/OVERALL - Dr. Bhanuben Mahendra Nanavati College of Home Science20240111-.pdf"
                                                    target="_blank">Overall 2024</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">2025</a>
                                        <ul>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/College - Dr. Bhanuben Mahendra Nanavati College of Home Science20250103-.pdf"
                                                    target="_blank">College 2025</a></li>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/OVERALL -Dr. Bhanuben Mahendra Nanavati College of Home Science20250111-.pdf"
                                                    target="_blank">Overall 2025</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <!--<li class="mobile_menu_on"><a href="https://swayam.gov.in/" target="_blank"><i-->
                            <!--            class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $this->lang->line("2020");?></a></li>-->
                            <li class="mobile_menu_on sub"><a
                                    href="<?php echo base_url();?>uploads/pdf/college-2020.pdf" target="_blank"><i
                                        class="fa fa-circle-o" aria-hidden="true"></i> <?php echo $this->lang->line("College 2020");?></a></li>
                            <li class="mobile_menu_on sub"><a
                                    href="<?php echo base_url();?>uploads/pdf/college-2020.pdf" target="_blank"><i
                                        class="fa fa-circle-o" aria-hidden="true"></i> <?php echo $this->lang->line("Overall 2020");?></a></li>


                            <!--<li class="mobile_menu_on"><a href="https://swayam.gov.in/" target="_blank"><i-->
                            <!--            class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $this->lang->line("2021");?></a></li>-->
                            <li class="mobile_menu_on sub"><a
                                    href="<?php echo base_url();?>uploads/pdf/college-2020.pdf" target="_blank"><i
                                        class="fa fa-circle-o" aria-hidden="true"></i> <?php echo $this->lang->line("College 2021");?></a></li>
                            <li class="mobile_menu_on sub"><a
                                    href="<?php echo base_url();?>uploads/pdf/college-2020.pdf" target="_blank"><i
                                        class="fa fa-circle-o" aria-hidden="true"></i> <?php echo $this->lang->line("Overall 2021");?></a></li>

                            <!--<li class="mobile_menu_on"><a href="https://swayam.gov.in/" target="_blank"><i-->
                            <!--            class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $this->lang->line("2022");?></a></li>-->
                            <li class="mobile_menu_on sub"><a
                                    href="<?php echo base_url();?>uploads/pdf/college-2020.pdf" target="_blank"><i
                                        class="fa fa-circle-o" aria-hidden="true"></i> <?php echo $this->lang->line("College 2022");?></a></li>
                            <li class="mobile_menu_on sub"><a
                                    href="<?php echo base_url();?>uploads/pdf/college-2020.pdf" target="_blank"><i
                                        class="fa fa-circle-o" aria-hidden="true"></i> <?php echo $this->lang->line("Overall 2022");?></a></li>
<?php
$academicCalendar = "uploads/pdf/ACADEMIC CALENDAR  (June 2023 - May 2024)dated 4th jan.pdf"; 
if(isset($home['academicCalendar']) && is_array($home['academicCalendar'])){
  $academicCalendar = "uploads/cms/".$home['academicCalendar'][0]['value'];
} 
?>
                            <li ><a href="#<?php echo base_url();?><?php echo $academicCalendar?>"
                                    target1="_blank"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $this->lang->line("Academic Calendar");?>
                                     <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </a>
                             <ul>
                                    <li><a href="<?php echo base_url();?>uploads/pdf/2020 - 2021 ACADEMIC CALENDAR.pdf" target="_blank"><?php echo $this->lang->line("2020-2021");?> </a></li>
                                    <li><a href="<?php echo base_url();?>uploads/pdf/ACADEMIC-CALENDAR-(2021-2022).pdf" target="_blank"><?php echo $this->lang->line("2021-2022");?> </a></li>
                                    <li><a href="<?php echo base_url();?>uploads/pdf/ACADEMIC CALENDAR  (JUNE 2022 - JUNE 2023).pdf" target="_blank"><?php echo $this->lang->line("2022-2023");?> </a></li>
                                    <li><a href="<?php echo base_url();?>uploads/pdf/ACADEMIC CALENDAR  (June 2023 - May 2024).pptx" target="_blank"><?php echo $this->lang->line("2023-2024");?> </a></li>
                                    <li><a href="<?php echo base_url();?>uploads/pdf/ACADEMIC CALENDAR  (JUNE 2024 - MAY2025).pptx.pdf" target="_blank">2024-2025</a></li>
                                    <li><a href="<?php echo base_url();?>uploads/pdf/2025 - 2026 ACADEMIC CALENDAR  (JUNE 2025 - MAY 2026).pptx (1).pdf" target="_blank">2025-2026</a></li>
                                </ul>
                            </li>
 <li class="mobile_menu_on sub"><a href="<?php echo base_url();?>uploads/pdf/2020 - 2021 ACADEMIC CALENDAR.pdf" target="_blank"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i> <?php echo $this->lang->line("2020-2021");?> </a></li>
                                    <li class="mobile_menu_on sub"><a href="<?php echo base_url();?>uploads/pdf/ACADEMIC-CALENDAR-(2021-2022).pdf" target="_blank"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i> <?php echo $this->lang->line("2021-2022");?> </a></li>
                                    <li class="mobile_menu_on sub"><a href="<?php echo base_url();?>uploads/pdf/ACADEMIC CALENDAR  (JUNE 2022 - JUNE 2023).pdf" target="_blank"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i> <?php echo $this->lang->line("2022-2023");?> </a></li>
                                    <li class="mobile_menu_on sub"><a href="<?php echo base_url();?>uploads/pdf/ACADEMIC CALENDAR  (June 2023 - May 2024).pptx" target="_blank"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i> 2023-2024</a></li>
                                    <li class="mobile_menu_on sub"><a href="<?php echo base_url();?>uploads/pdf/ACADEMIC CALENDAR  (JUNE 2024 - MAY2025).pptx.pdf" target="_blank"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i> 2024-2025 </a></li>    
                                    <li class="mobile_menu_on sub"><a href="<?php echo base_url();?>uploads/pdf/ACADEMIC CALENDAR 2025 - 2026 .pptx.pdf" target="_blank"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i> 2025-2026 </a></li>    

                            <li><a href="#"><i class="fa fa-desktop" aria-hidden="true"></i> <?php echo $this->lang->line("E-Learning");?>
                                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                <ul>
                                    <li><a href="e-content"><?php echo $this->lang->line("E-Content");?> </a></li>
                                    <li><a href="https://swayam.gov.in/" target="_blank">SWAYAM</a></li>
                                </ul>
                            </li>

                            <li class="mobile_menu_on"><a href="e-content"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i> <?php echo $this->lang->line("E-Content");?> </a></li>
                            <li class="mobile_menu_on"><a href="https://swayam.gov.in/" target="_blank"><i
                                        class="fa fa-angle-right" aria-hidden="true"></i> SWAYAM</a></li>


                            <li><a href="library"><i class="fa fa-book" aria-hidden="true"></i> <?php echo $this->lang->line("Library");?></a></li>
                            <?php
$downloadhome = ""; 
if(isset($home['downloadhome']) && is_array($home['downloadhome'])){
  $downloadhome = $home['downloadhome'][0]['value'];
} 
?>                            
                            <li><a href="<?php echo base_url();?>uploads/cms/<?php echo $downloadhome?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> <?php echo $this->lang->line("Downloads");?></a></li>
                        </ul>
                    </div>





                </div>
                <div class="col-sm-9">
                    <div class="slider_bx">



                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" style="text-align: center;">
                                    <img src="<?php echo base_url();?>assets/images/slide_pic_2.jpg" alt=""
                                        style="width: 100%;">
                                    <div class="slide_caption">
                                        <div class="caption_cont">
                                            <h3 class="caption_title">An investment in all aspects of Women’s <br>
                                                education is an investment in their future.</h3>
                                            <!--<p class="caption_txt">Thousands of students are already studying BMN University for all ages!</p>-->
                                            <!--<p class="caption_txt">Thousands of students are already studying BMN University for all ages!</p>-->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"><?php echo $this->lang->line("Previous");?></span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"><?php echo $this->lang->line("Next");?></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--about-us box-->
    <section class="about_bx">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="abt_pic">
                        <img src="<?php echo base_url();?>assets/images/principle_pic.jpg" alt="">
                        <div class="principle_nm"><?php echo $this->lang->line("Prof. Dr. Mala Pandurang");?> <br> <?php echo $this->lang->line("Principal");?></div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h2 class="page_title">
                        <span><?php echo $this->lang->line("Message From Principal");?></span>
                        <?php echo $this->lang->line("Achieve your Goals with");?>
                    </h2>

                    <!--<p class="abt_txt"><i>Greetings! The Academic year 2019-2020 has been a momentous year which will be impinged on our institutional memory for a variety of reasons.</i></p>-->
                    <p class="abt_txt">
                    <?php echo $this->lang->line("Dear Friends,");?> </br>
                    <?php echo $this->lang->line("Greetings!");?> </br>
                    <?php echo $this->lang->line("greeting_msg1");?> 
                    
                    </p>
                    
                    <div class="sub_designation">
                    <div style="color: #333333;margin-bottom:10px;"><?php echo $this->lang->line("with warmth and best wishes");?></div>
                        <div><?php echo $this->lang->line("Prof. (Dr.) Mala Pandurang");?></div>
                        <div> <?php echo $this->lang->line("Principal");?> </div>


                    </div>

                </div>
            </div>
        </div>

        <!-- <div class="container bor_top">
            <div class="row">
            <div class="col-sm-4">
                <div class="iqac_bx">
                    <h3 class="naac_title">Library</h3>
                    <p class="naac_txt">Institutional repository is a set of services that a institution offers to the members of its community for the management and dissemination of digital materials created by the institution and its community members.</p>
                    
                    <ul class="iqac_list lib">
                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            B.C.A Qs Papers</li>
                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            B.Sc. Qs Papers</li>
                        <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            MSc (CND)</li>
                    </ul>
                    
                    <a href="library" class="iqac_link">Read More About Library</a> 
                    
                </div>
                
            </div>
            <div class="col-sm-8">
                <div class="iqac_bx">
                    <h3 class="naac_title">IQAC</h3>
                    <h4 class="iqac_sub_title">The IQAC works towards the following objectives:</h4>
                    <ul class="iqac_list">
                        <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            To ensure the continuous improvement of academic and administrative functioning</li>
                        <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            To follow up on action on internalization of quality culture and institutionalization of best practices.</li>
                        <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            To promote integration of modern methods of teaching to ensure participatory learning processes.</li>
                        <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            To ensure the timely preparation of the Annual Quality Assurance Report (AQAR) as per the guidelines of NAAC.</li>
                    </ul>
                   
                    
                    <a href="#" class="iqac_link">About IQAC</a> 
                    <a href="<?php echo base_url();?>uploads/pdf/academic-audit-2020-1.pdf" target="_blank" class="iqac_link">Academic Audit Report</a>
                    <a href="external-peer-team" class="iqac_link">External Peer Team</a> 
                    <a href="#" class="iqac_link">AQAR Annual Report</a>
                    <a href="#" class="iqac_link">IQAC-Minutes 2019-20</a> <a href="#" class="iqac_link">IQAC-Minutes 2020-21</a>       
                    <a href="#" class="iqac_link">Minutes of all 4 external IQAC Meeting</a> 
                    <a href="#" class="iqac_link">Student Feedback Analysis</a> 
                    <a href="best-practice" class="iqac_link">Best Practices</a> 
                    <a href="#" class="iqac_link">Institutional Distinctiveness</a> 
                    <a href="#" class="iqac_link">POLICIES</a>
                </div>
            </div>
            </div>    
        </div>-->
    </section>
    <!--about-us box-->

    <!--students stastics box start here-->
    <section class="events_bx">
        <div class="container">
            <div class="row">
                <!--Latest-Post-->
                <?php
            if(isset($home['wti_t_newsblogs']) && is_array($home['wti_t_newsblogs'])){
                $index=0;
            ?>
                <div class="col-sm-4 fixedheight">
                    <h3 class="event_title"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $this->lang->line("Latest Posts");?></h3>

                    <?php
               foreach($home['wti_t_newsblogs'] as $key => $value){ 
                //print_r($value);
                if($index==0){
                ?>
                    <div class="latest_bx_two">
                        <div class="latest_txt">
                            <?php
                            if($value['featured_image']!=""){
                            ?>
                            <img src="<?php echo base_url();?><?php echo $value['featured_image']?>"
                                alt="<?php echo basename($value['featured_image'])?>">
                            <?php }?>
                            <div class="latest_txt_container">
                                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $this->common->getDateFormat($value['event_dates'],'F d, Y')?></span>
                                <h3 class="latest_title"><?php echo $value['heading']?></h3>
                                <p><?php echo substr(strip_tags($value['descriptions']),0,128)?>...</p>
                            </div>

                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="latest_bx_two">
                        <div class="latest_txt">
                            <?php
                            if($value['featured_image']!=""){
                            ?>
                            <img src="<?php echo base_url();?><?php echo $value['featured_image']?>"
                                alt="<?php echo basename($value['featured_image'])?>">
                            <?php }?>
                            <div class="latest_txt_container">
                                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $this->common->getDateFormat($value['event_dates'],'F d, Y')?></span>
                                <h3 class="latest_title"><?php echo $value['heading']?></h3>
                                <p><?php echo substr(strip_tags($value['descriptions']),0,128)?>...</p>
                            </div>

                        </div>
                    </div>
                    <?php } 
                    $index++;
                ?>
                    <?php } ?>
                    <div class="dicover_div">
                        <a href="latest-post" class="discover_btn"><?php echo $this->lang->line("Discover More");?></a>
                    </div>
                </div>
                <?php }
            ?>
                <!--upcoming-events-box-->
                <?php
            if(isset($home['wti_m_events']) && is_array($home['wti_m_events'])){
                $index=0;
            ?>
                <div class="col-sm-4 fixedheight">
                    <h3 class="event_title"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $this->lang->line("Upcoming Events");?></h3>
                    <div class="upcoming_bx" style="overflow-y:scroll">
                        <?php
               foreach($home['wti_m_events'] as $key => $value){ 
                
                ?>
                        <!--event-one-->
                        <div class="event_one">
                            <div class="event_date">
                                <div class="event_l">
                                    <span><?php echo $this->common->getDateFormat($value['event_dates'],'d')?></span>
                                    <?php echo $this->common->getDateFormat($value['event_dates'],'M, Y')?>
                                </div>
                                <div class="event_r"><?php echo $value['heading']?></div>
                                <div class="clr"></div>
                            </div>
                            <p class="event_txt"><?php echo substr(strip_tags($value['descriptions']),0,128)?>...</p>
                            <div class="event_time">
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <?php echo $value['location']?></span>
                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> 10am - 05pm</span>
                            </div>

                        </div>

                        <?php }
                    ?>


                    </div>
                    <div class="dicover_div">
                        <a href="upcoming-events" class="discover_btn"><?php echo $this->lang->line("Discover More");?></a>
                    </div>
                </div>
                <?php }
            ?>
                <?php
            if(isset($home['wti_m_notice']) && is_array($home['wti_m_notice'])){
                $index=0;
            ?>
                <div class="col-sm-4 fixedheight">
                    <h3 class="event_title"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $this->lang->line("General Notices");?></h3>
                    <?php
               foreach($home['wti_m_notice'] as $key => $value){ 
               // print_r($value);
                if($index==0){
                ?>

                    <div class="latest_bx_one">
                        <div class="latest_txt">
                            <?php
                            if($value['featured_image']!=""){
                            ?>
                            <img src="<?php echo base_url();?><?php echo $value['featured_image']?>"
                                alt="<?php echo basename($value['featured_image'])?>">
                            <?php }?>
                            <div class="latest_txt_container">
                                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $this->common->getDateFormat($value['event_dates'],'F d, Y')?></span>
                                <h3 class="latest_title"><?php echo $value['heading']?></h3>
                                <p><?php echo substr(strip_tags($value['descriptions']),0,128)?>...</p>
                            </div>

                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="latest_bx_one">
                        <div class="latest_txt">
                            <?php
                            if($value['featured_image']!=""){
                            ?>
                            <img src="<?php echo base_url();?><?php echo $value['featured_image']?>"
                                alt="<?php echo basename($value['featured_image'])?>">
                            <?php }?>
                            <div class="latest_txt_container">
                                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $this->common->getDateFormat($value['event_dates'],'F d, Y')?></span>
                                <h3 class="latest_title"><?php echo $value['heading']?></h3>
                                <p><?php echo substr(strip_tags($value['descriptions']),0,128)?>...</p>
                            </div>

                        </div>
                    </div>
                    <?php } 
                    $index++;
                ?>

                    <?php } ?>
                    <div class="dicover_div">
                        <a href="student-notice" class="discover_btn"><?php echo $this->lang->line("Discover More");?></a>
                    </div>
                </div>
                <?php }
            ?>
            </div>
        </div>
    </section>
    <!--students stastics box close here-->

    <!--social media post start here-->
    <?php
            if(isset($home['wti_m_gallery']) && is_array($home['wti_m_gallery'])){
            // print_r($home['wti_m_gallery'] );
            ?>
    <section class="post_bx">
        <div class="container">
            <h3 class="research_title"><?php echo $this->lang->line("Notable Alumnae");?> </h3>
            <!--&amp; Featured Students-->
            <div class="row">
                <section class="regular slider">
                    <?php
               foreach($home['wti_m_gallery'] as $key => $value){ 
                    if($value['status_flag']==1){

                    
                ?>
                    <div>
                        <!--10-->
                        <div class="col-sm-12">
                            <div class="alumnae_hover">
                                <img src="<?php echo base_url();?><?php echo $value['slider_image']?>"
                                    alt="<?php echo $value['slider_text']?>">
                                <div class="offer_nm_one">
                                    <div class="offer_nm_alumn"><?php echo $value['alumnae_type']?></div>
                                </div>
                                <h3 class="pic_title">
                                    <?php echo $value['slider_text']?> <span><?php echo $value['post_name']?></span>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <?php
                    }
                } ?>



                </section>






            </div>
        </div>
    </section>
    <?php } ?>
    <!--social media post close here-->

    <?php $this->load->view('inc_footer'); ?>



    <?php $this->load->view('inc_common_footer_js'); ?>



</body>

</html>