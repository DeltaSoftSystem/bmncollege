<?php

$home = json_decode(file_get_contents('uploads/jsondata/homejosn.json'), true);



$wti_cms_exam_timetable = (isset($home['wti_cms_exam_timetable'])) ? $home['wti_cms_exam_timetable'] : [];

$wti_cms_exam_continuous = (isset($home['wti_cms_exam_continuous'])) ? $home['wti_cms_exam_continuous'] : [];

//print_r($wti_cms_exam_continuous);

$wti_cms_exam_timetable_temp = [];

$wti_cms_exam_continuous_temp = [];

//print_r($wti_cms_exam_timetable);

foreach($wti_cms_exam_timetable as $key => $value){

    $wti_cms_exam_timetable_temp[$value['degree_name']][$value['semester']]= $value['pdf_file'];

}

foreach($wti_cms_exam_continuous as $key => $value){

    $wti_cms_exam_continuous_temp[$value['degree_name']]= $value['pdf_file'];

}

     

//print_r($wti_cms_exam_timetable_temp);

$page_url = $this->uri->segment(1);

?>

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"

        aria-hidden="true"></i></button>



<style type="text/css">

    @media (min-width: 1200px) {

    .container, .container-lg, .container-md, .container-sm, .container-xl {

        max-width: 1200px!important;

    }

}

.hidedefault {

    display: none;

}

.menuzord-menu>li>a {

    padding: 14px 7px!important;

}

</style>

<header>



    <div class="container">

        <div class="row">

            <div class="col-sm-6"><a href="<?php echo site_url('home')?>">

                    <h1><img src="<?php echo base_url();?>assets/images/logo.png" alt="" class="main_logo"></h1>

                </a></div>

            <div class="col-sm-6">

                <div class="language_row">

                    <div class="call_top">

                        <i class="fa fa-phone" aria-hidden="true"></i> <a href="callto:02224095792"><?php echo $this->lang->line("022 2409 5792");?></a>  

                        <!-- <a href="callto:02224035296">022 2403 5296</a> -->

                    </div>

                    <div class="call_size"><span class="small">

                            <a href="javascript:void(0);" title="Text Size: Decrease" id="btn-decrease"

                                class="decrease">A-</a>

                        </span>

                        <span class="medium">

                            <a href="javascript:void(0);" title="Text Size: Normal" id="btn-orig" class="reset">A</a>

                        </span>

                        <span class="large">

                            <a href="javascript:void(0);" title="Text Size: Increase" id="btn-increase"

                                class="increase">A+</a>

                        </span>

                    </div>



                    <div class="call_language">

                        <a href="<?php echo site_url('languageswitcher/switchlang/english')?>" onclick1="changelang(1);">English</a> &nbsp;|&nbsp;

                        <a href="<?php echo site_url('languageswitcher/switchlang/marathi')?>" onclick1="changelang(2);">Marathi</a>

                    </div>





                </div>



                <div class="login_btns">

                    <a href="http://eduerp.bmncollege.com/login" class="student_btn"><i class="fa fa-lock" aria-hidden="true"></i> <?php echo $this->lang->line("Student Login");?></a>

                    <a href="http://eduerp.bmncollege.com/login" class="teacher_btn"><i class="fa fa-lock" aria-hidden="true"></i> <?php echo $this->lang->line("Teacher Login");?></a>



                </div>



                <div class="top_search">

                    <form action="<?php echo site_url('search')?>" method="get">

                        <input type="text" name="keywords" value="<?php echo $this->input->get('keywords')?>"

                            id="top_keyword" class="search_inpt" placeholder="<?php echo $this->lang->line("Search Here");?>">

                        <button type="submit" class="submit_search"><i class="fa fa-search"

                                aria-hidden="true"></i></button>

                    </form>

                </div>

            </div>

        </div>

    </div>



<?php

$homelinks[] = 'home';

$homelinks[] = 'AISHE';

$homelinks[] = 'library';







$about_us[] = 'about-us';

$about_us[] = 'organogram';

$about_us[] = 'unique-feature';

$about_us[] = 'testimonials';



$Programmes[] = 'HD-programm';

$Programmes[] = 'RM-hospitality-programm';

$Programmes[] = 'TSAD-programm';

$Programmes[] = 'fsn-programm';

$Programmes[] = 'ND-programm';

$Programmes[] = 'bca-programm';

$Programmes[] = 'foundation-programm';

$Programmes[] = 'bsc-programm';

$Programmes[] = 'msc-cnd-programm';

$Programmes[] = 'msc-tourism-hospital-programm';

$Programmes[] = 'msc-cs-programm';

$Programmes[] = 'PGDSSFN-programm';

$Programmes[] = 'PGECE-programm';

$Programmes[] = 'skill-based-courses';

$Programmes[] = 'gandhian-studies-center';

$Programmes[] = 'ignou';





$Admission[] = 'admission-enquiry';

$Admission[] = 'admission-process';



$Exams[] = 'student-notice';

$Exams[] = 'bsc-result';

$Exams[] = 'bca-result';

$Exams[] = 'pg-result';



$Committees[] = 'grievance-redressal-committee';

$Committees[] = 'committee-activity';





$Research[] = 'research';

$Research[] = 'research-committee';

$Research[] = 'research-page';

$Research[] = 'research-activity';

$Research[] = 'research-collaborations';

$Research[] = 'research-critical-thinking';



$EECH[] = 'incubation';

$EECH[] = 'placement';





$linkages[] = 'linkages';



$Grants[] = 'grant-received';

$Grants[] = 'quotations-for-rusa';



$contactus[] = 'contact-us';

?>



    <div class="main_menu">

        <div class="container">

            <div class="row">

                <div id="menuzord" class="menuzord red menuzord-responsive">

                    <div class="showhide32"></div>

                    <ul class="menuzord-menu me#menusnuzord-right menuzord-indented scrollable">



                        <li class="<?php echo (in_array($page_url,$homelinks)) ? 'active' : ''?>"><a href="<?php echo site_url('home')?>"><?php echo $this->lang->line("HOME");?></a></li>



                        <li  class="<?php echo (in_array($page_url,$about_us)) ? 'active' : ''?>"><a href="#"><?php echo $this->lang->line("ABOUT US");?></a>

                            <ul class="dropdown">

                                <li><a href="about-us"><?php echo $this->lang->line("Parent Body (SMES)");?></a></li>

                                <li><a href="organogram"><?php echo $this->lang->line("Organogram");?> </a></li>

                                <li><a href="unique-feature"><?php echo $this->lang->line("Facilities/Unique features");?></a></li>

                                <li><a href="testimonials"><?php echo $this->lang->line("Testimonials");?> </a></li>

                            </ul>

                        </li>



                        <li class="<?php echo (in_array($page_url,$Programmes)) ? 'active' : ''?>"><a href="#"><?php echo $this->lang->line("PROGRAMMES");?></a>

                            <ul class="dropdown">

                                <li><a href="#"><?php echo $this->lang->line("Undergraduate");?></a>

                                    <ul class="dropdown">

                                        <li><a href="HD-programm"><?php echo $this->lang->line("Human Development");?></a></li>

                                        <li><a href="RM-hospitality-programm"><?php echo $this->lang->line("Resource Management (Hospitality Management)");?></a></li>

                                        <li><a href="TSAD-programm"><?php echo $this->lang->line("Textile Science &amp; Apparel Design");?></a></li>

                                        <li><a href="fsn-programm"><?php echo $this->lang->line("Food Science &amp; Nutrition");?></a></li>

                                        <li><a href="ND-programm"><?php echo $this->lang->line("Nutrition &amp; Dietetics");?></a></li>

                                        <li><a href="bca-programm"><?php echo $this->lang->line("Bachelor of Computer Applications");?> </a></li>

                                        <li><a href="foundation-programm"><?php echo $this->lang->line("Foundational Courses");?> </a></li>

                                        <li><a href="bsc-programm"><?php echo $this->lang->line("BSc. Information Technology");?> </a></li>

                                    </ul>

                                </li>



                                <li><a href="#"><?php echo $this->lang->line("Postgraduate");?></a>

                                    <ul class="dropdown">

                                        <li><a href="msc-cnd-programm"><?php echo $this->lang->line("M.Sc Clinical Nutrition &amp; Dietetics");?></a></li>

                                        <li><a href="msc-tourism-hospital-programm"><?php echo $this->lang->line("M.Sc Resource Management (Tourism &amp; Hospitality Management)");?></a></li>

                                        <li><a href="msc-cs-programm"><?php echo $this->lang->line("M.Sc Computer Science");?></a></li>

                                        <li><a href="PGDSSFN-programm"><?php echo $this->lang->line("PG Sports Science Fitness &amp; Nutrition");?></a>

                                        </li>

                                        <li><a href="PGECE-programm"><?php echo $this->lang->line("PG Early Childhood Education");?></a></li>

                                    </ul>

                                </li>



                                <!--<li><a href="diploma-programm">Certificate /Diploma Programs</a></li>-->

                                <li><a href="#"><?php echo $this->lang->line("Skill development Courses");?></a>

                                    <ul class="dropdown">

                                        <li><a href="skill-based-courses"><?php echo $this->lang->line("Additional Credits Courses");?></a></li>

                                        

                                        <li><a href="skill-development-programm"><?php echo $this->lang->line("Capacity Building Certificate Courses");?> </a>

                                             <ul class="dropdown">

                                                <li><a href="<?php echo base_url('uploads/pdf/Beauty-Culture-Hair-Dressing-Department.docx');?>"

                                                        target="_blank"><?php echo $this->lang->line("Beauty Culture & Hair Dressing Department");?></a></li>

                                                <li><a href="<?php echo base_url('uploads/pdf/Event-management.pdf');?>"   target="_blank"><?php echo $this->lang->line("Event-management");?> </a></li>

                                                <li><a href="<?php echo base_url('uploads/pdf/Nutrition-Physical-Fitness-and-Weight-Management-short-Term.docx');?>"   target="_blank"><?php echo $this->lang->line("Nutrition & Physical Fitness and Weight Management (short Term)");?> </a></li>

                                            </ul>

                                    </li>

                                        

                                         

                                    </ul>

                                </li>

                                <!-- <li><a href="skill-based-courses">Skill development Courses</a></li> -->

                                <!--<li><a href="#">Additional credits courses</a>

                                             <ul class="dropdown">

                                                 <li><a href="skill-development-programm">Skill development Courses </a></li>

                                            </ul>

                                        </li>-->

                                <li><a href="https://www.hmnscnip.in/junior/index.php" target="_blank"><?php echo $this->lang->line("Smt. HMN College of Home Science");?> </a></li>

                                <li><a href="https://www.hmnscnip.in/polytechnic.php" target="_blank"><?php echo $this->lang->line("Smt. Shardaben Champaklal Nanavati Institute of Polytechnic");?></a></li>

                                <li><a href="gandhian-studies-center"><?php echo $this->lang->line("Gandhian Studies Center");?></a></li>

                                <li><a href="ignou"><?php echo $this->lang->line("IGNOU");?></a></li>

                                <!-- <li><a href="gandhian-studies-center"><?php echo $this->lang->line("Gandhian Studies Center");?></a></li> -->

                                <li><a href="https://drive.google.com/drive/folders/1syRpreOGqyGpOgLiO_NfdYUQyM9XyLXZ" target="_blank">Syllabus</a></li>

                            </ul>

                        </li>



                        <li class="<?php echo (in_array($page_url,$Admission)) ? 'active' : ''?>"><a href="#"><?php echo $this->lang->line("ADMISSION");?></a>

                            <ul class="dropdown">

                                <li><a href="admission-enquiry"><?php echo $this->lang->line("Admission Enquiry");?></a></li>

                                <li><a href="admission-process"><?php echo $this->lang->line("Admission Process");?></a></li>

                                <li><a href="<?php echo base_url();?>uploads/pdf/admission-policy-21.05.2023.pdf"

                                        target="_blank"><?php echo $this->lang->line("Admission Policy");?></a></li>

                                <li><a href="<?php echo base_url();?>uploads/pdf/refund-rules.pdf"

                                        target="_blank"><?php echo $this->lang->line("Refund Rules");?></a></li>

                                <li><a href="<?php echo base_url();?>uploads/pdf/Code-of-Conduct.pdf"

                                        target="_blank">Code of Conduct</a></li>        

                                <!--<li><a href="#">Leaving/ Migration/ Bonafide/ Transcript Form</a></li>

                                        <li><a href="#">Online Fees Payment</a></li>-->

                            </ul>

                        </li>

                        <li  class="<?php echo (in_array($page_url,$Exams)) ? 'active' : ''?>"><a href="#"><?php echo $this->lang->line("EXAMS");?></a>

                            <ul class="dropdown">

                                <li><a href="student-notice"><?php echo $this->lang->line("Important Notices");?> </a></li>

                                <li><a href="#"><?php echo $this->lang->line("Time Table");?> </a>

                                    <ul class="dropdown">

                                        <!--pdf/revised-BSC-Final-exam-time-table-2021-22.pdf-->

                                        <li><a href="#">BSc Exam</a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?><?php echo (isset($wti_cms_exam_timetable_temp['BSc-Exam']['Freshers'])) ? $wti_cms_exam_timetable_temp['BSc-Exam']['Freshers']:'';?>"

                                                        target="_blank"><?php echo $this->lang->line("Freshers");?></a></li>

                                                <li><a href="<?php echo base_url();?><?php echo (isset($wti_cms_exam_timetable_temp['BSc-Exam']['Repeaters'])) ? $wti_cms_exam_timetable_temp['BSc-Exam']['Repeaters']:'';?>"

                                                        target="_blank"><?php echo $this->lang->line("Repeaters");?> </a></li>

                                            </ul>

                                        </li>

                                        <!--pdf/revised-BCA-time-table-final-exam-2021-22.pdf-->

                                        <li><a href="#">BCA Exam</a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?><?php echo (isset($wti_cms_exam_timetable_temp['BCA-Exam']['Freshers'])) ? $wti_cms_exam_timetable_temp['BCA-Exam']['Freshers']:'';?>"

                                                        target="_blank"><?php echo $this->lang->line("Freshers");?></a></li>

                                                <li><a href="<?php echo base_url();?><?php echo (isset($wti_cms_exam_timetable_temp['BCA-Exam']['Repeaters'])) ? $wti_cms_exam_timetable_temp['BCA-Exam']['Repeaters']:'';?>"

                                                        target="_blank"><?php echo $this->lang->line("Repeaters");?> </a></li>

                                            </ul>

                                        </li>

                                        <!--pdf/revised-PG-courses-final-exam-time-table-2021-22.pdf-->

                                        <li><a href="#">PG Exam</a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?><?php echo (isset($wti_cms_exam_timetable_temp['PG-Exam']['Freshers'])) ? $wti_cms_exam_timetable_temp['PG-Exam']['Freshers']:'';?>"

                                                        target="_blank"><?php echo $this->lang->line("Freshers");?></a></li>

                                                <li><a href="<?php echo base_url();?><?php echo (isset($wti_cms_exam_timetable_temp['PG-Exam']['Repeaters'])) ? $wti_cms_exam_timetable_temp['PG-Exam']['Repeaters']:'';?>"><?php echo $this->lang->line("Repeaters");?> </a></li>

                                            </ul>

                                        </li>

                                    </ul>

                                </li>



                                <li>

                                    <!-- <a href="<?php echo base_url();?>uploads/pdf/continuous-assessment.pdf"

                                        target="_blank">Continuous Assessment</a> -->

                                   <a href="#"><?php echo $this->lang->line("Continuous Assessment");?> </a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?><?php echo (isset($wti_cms_exam_continuous_temp['BSc'])) ? $wti_cms_exam_continuous_temp['BSc']:'';?>"  target="_blank"><?php echo $this->lang->line("BSc");?></a></li>

                                                <li><a href="<?php echo base_url();?><?php echo (isset($wti_cms_exam_continuous_temp['BCA'])) ? $wti_cms_exam_continuous_temp['BCA']:'';?>"  target="_blank"><?php echo $this->lang->line("BCA");?></a></li>

                                                <li><a href="<?php echo base_url();?><?php echo (isset($wti_cms_exam_continuous_temp['PG'])) ? $wti_cms_exam_continuous_temp['PG']:'';?>"  target="_blank"><?php echo $this->lang->line("PG");?></a></li>

                                            </ul> 

                                </li>

                                <li><a href="#"><?php echo $this->lang->line("Result");?> </a>

                                    <ul class="dropdown">

                                        <li><a href="bsc-result"><?php echo $this->lang->line("BSc");?></a></li>

                                        <li><a href="bca-result"><?php echo $this->lang->line("BCA");?></a></li>

                                        <li><a href="pg-result"><?php echo $this->lang->line("PG");?></a></li>

                                    </ul>

                                </li>

                                <!--<li><a href="#">Required Forms </a></li>

                                        <li><a href="#">Re exam Fee Receipt </a></li>-->

                            </ul>

                        </li>



                        <li><a href="#"><?php echo $this->lang->line("NAAC");?></a>

                            <ul class="dropdown">

                                <li><a href="#"><?php echo $this->lang->line("IQAC");?> </a>

                                    <ul class="dropdown">

                                        <li><a href="#"><?php echo $this->lang->line("Composition of IQAC");?></a>

                                            <ul class="dropdown">

                                                <!--<li><a href="<?php echo base_url();?>uploads/pdf/iqac.pdf" target="_blank">2017-2021</a></li>-->

                                                <li><a href="<?php echo base_url();?>uploads/pdf/INTERNAL QUALITY ASSURANCE CELL.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2021-2024");?></a></li>

                                            </ul>

                                        </li>

                                        <li><a href="#"><?php echo $this->lang->line("Minutes of IQAC Meeting");?></a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?>uploads/pdf/IQAC-Minutes-18-19.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2018-2019");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/IQAC-Minutes-19-20.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2019-2020");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/IQAC-Minues-20-21.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2020-2021");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/IQAC-Minues-21-22.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2021-2022");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/IQAC Minutes 2022-23 (1).pdf"

                                                        target="_blank">2022-2023</a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Minutes of IQAC Meeting 2023-2024.pdf"

                                                        target="_blank">2023-2024</a></li>



                                            </ul>

                                        </li>

                                    </ul>

                                </li>

                                <li><a href="#"><?php echo $this->lang->line("Documents &amp; Reports");?></a>

                                    <ul class="dropdown">

                                        <li><a href="#"><?php echo $this->lang->line("AQAR");?></a>

                                            <ul class="dropdown">

                                                <!--<li><a href="#" target="_blank">2018-2019</a></li>

                                                        <li><a href="#" target="_blank">2019-2020</a></li>-->

                                                <li><a href="<?php echo base_url();?>uploads/pdf/AQAR-2017-2018.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2017 -2018");?> </a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/AQAR-2018-2019.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2018 -2019");?> </a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/AQAR-2019-2020.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2019- 2020");?> </a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/AQAR-2020-2021.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2020-2021");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/AQAR-2021-2022.pdf" target="_blank"><?php echo $this->lang->line("2021-2022");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/AQAR 2022-2023.pdf" target="_blank"><?php echo $this->lang->line("2022-2023");?></a></li>

                                            </ul>

                                        </li>



                                        <li><a href="#"><?php echo $this->lang->line("Best Practice");?></a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Best-Practice-17-18.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2017-2018");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Best-Pracice-18-19.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2018-2019");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Best-Pracice-19-20.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2019-2020");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Best-Practice-20-21.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2020-2021");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Best-Practices-2021-2022.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2021-2022");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Best Practices 2022-23.pdf"

                                                        target="_blank">2022-2023</a></li>

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Best Practice 23-24.pdf"

                                                        target="_blank">2023-2024</a></li>



                                            </ul>

                                        </li>

                                        <li><a href="#"><?php echo $this->lang->line("RAR Report");?></a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?>uploads/pdf/ssr-report-16-17.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2016-2017");?></a></li>

                                                <!--<li><a href="#">2019-2020</a></li>

                                                        <li><a href="#">2020-2021</a></li>-->

                                            </ul>

                                        </li>

                                        <li><a href="#"><?php echo $this->lang->line("Audit Reports");?></a>

                                            <ul class="dropdown">

                                                <li><a href="#" target="_blank">Administrative Audit </a>

                                                <ul class="dropdown">

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Administrative Audit Report 2022.pdf"    target="_blank">2022</a></li>

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Administrative Audit 2023.pdf"    target="_blank">2023</a></li>

                                                        

                                                    </ul>

                                                </li>

                                                     <li><a href="#" target="_blank">Gender Audit </a>

                                                      <ul class="dropdown">

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Gender Audit Report 2020-21.pdf"    target="_blank">2020-21</a></li>

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Gender Audit 2023.pdf"    target="_blank">2022-23</a></li>

                                                        

                                                    </ul>

                                                     </li> 

 <li><a href="#" target="_blank">Academic Audit </a>

                                                      <ul class="dropdown">

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Academic Audit report 2022.pdf"    target="_blank">2020-21</a></li>

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Academic Audit 2023.pdf"    target="_blank">2022-23</a></li>

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Academic  Audit Report 2023- 24.pdf"    target="_blank">2023-24</a></li>

                                                        

                                                    </ul>

                                                     </li> 

                                                <li><a href="#"><?php echo $this->lang->line("Green Audit Report");?></a>

                                                    <ul class="dropdown">

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Green-Audit-2019-2020.pdf"

                                                                target="_blank"><?php echo $this->lang->line("2019-2020");?></a></li>

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Green-Audit-2020-2021.pdf"

                                                                target="_blank"><?php echo $this->lang->line("2020-2021");?></a></li>

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Green-Audit-2021-2022.pdf"

                                                                target="_blank"><?php echo $this->lang->line("2021-2022");?></a></li>

                                                                <li><a href="<?php echo base_url();?>uploads/pdf/Green Audit Report 2022.pdf"

                                                                target="_blank">2022-2023</a></li>

                                                                

                                                    </ul>

                                                </li>

                                            </ul>

                                        </li>

                                        <li><a href="#">Institutional Development Plan</a>

                                            <ul class="dropdown">

                                                <!--<li><a href="#">2018-2019</a></li>

                                                        <li><a href="#">2019-2020</a></li>-->

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Perspective-plan.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2021-2024");?> </a></li>

                                            </ul>

                                        </li>

                                        

                                        <li><a href="#"><?php echo $this->lang->line("Feedback");?></a>

                                            <ul class="dropdown">

                                                <li><a href="#"><?php echo $this->lang->line("Student Satisfaction Survey");?></a>

                                                <ul class="dropdown">

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/StudentSatisfactionSurvey(2022-23)Responses.pdf"    target="_blank">2022-2023</a></li>

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Student Satisfaction Survey (2023-24) (Responses).pdf"    target="_blank">2023-2024</a></li>

                                                         

                                                        

                                                    </ul>

                                                </li>

                                                <li><a href="#">Curriculum Feedback</a>

                                                <ul class="dropdown">

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Curriculum Feedback Analysis - Criteria 1 2022-23.docx.pdf"    target="_blank">2022-2023</a></li>

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/Curriculum Feedback Analysis - 2023-24.pdf"    target="_blank">2023-2024</a></li>

                                                    </ul>

                                                </li>

                                            </ul>

                                        </li>

                                         

                                       

                                        <li><a href="#"><?php echo $this->lang->line("Policy");?></a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Admission-Policy.pdf"

                                                        target="_blank"> <?php echo $this->lang->line("Admission Policy");?> </a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Infrastructure-utilization.pdf"

                                                        target="_blank"> <?php echo $this->lang->line("Infrastructure Utilization &amp; Maintenance Policy");?> </a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/IT-policy.pdf"

                                                        target="_blank"> <?php echo $this->lang->line("IT Policy");?> </a></li>

                                                <!--<li><a href="<?php echo base_url();?>uploads/pdf/ethical-policy.pdf"-->

                                                <!--        target="_blank"> <?php echo $this->lang->line("Ethical Policy");?> </a></li>-->

                                                <li><a href="<?php echo base_url();?>uploads/pdf/resource-mobilisation-policy.pdf"

                                                        target="_blank"> <?php echo $this->lang->line("Resource Mobilisation Policy");?> </a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Consultancy-Policy-2022.pdf"

                                                        target="_blank"> <?php echo $this->lang->line("Consultancy Policy");?> </a></li>        

                                            </ul>

                                        </li>

                                        <li><a href="#"><?php echo $this->lang->line("ICT Tools");?></a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?>uploads/pdf/ICT tools used by faculties 2022-23.pdf"

                                                        target="_blank">2022-2023 </a></li>

                                                        <li><a href="<?php echo base_url();?>uploads/pdf/ICT tools used by faculties.pdf"

                                                        target="_blank">2023-2024 </a></li>

                                                        

                                            </ul>

                                        </li>

                                        <li><a href="#"><?php echo $this->lang->line("Magazine");?></a>

                                            <ul class="dropdown">

                                               <li><a href="<?php echo base_url();?>uploads/pdf/Magazine 2022-2023.pdf"

                                                        target="_blank"><?php echo $this->lang->line("2022-2023");?></a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Magazine 2023-2024 Final.pdf"

                                                        target="_blank">2023-2024</a></li>        

                                                <!-- <li><a href="<?php echo base_url();?>uploads/pdf/BMN bulletin for magazine.pdf"

                                                        target="_blank">2023-24</a></li>         -->

                                            </ul>

                                        </li>

                                        <li><a href="#">BMN bulletin</a>

                                            <ul class="dropdown">

                                               <li><a href="<?php echo base_url();?>uploads/pdf/BMN bulletin for magazine.pdf"

                                                        target="_blank">2023-24</a></li>

                                            </ul>

                                        </li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/NAAC_certificate.pdf"

                                                target="_blank">NAAC Certificate</a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/UGC Approval 2 (F) & 12 (B).jpg"

                                                target="_blank">UGC Approval</a></li>

                                    </ul>

                                </li>

                            </ul>

                        </li>



                        <li class="<?php echo (in_array($page_url,$Committees)) ? 'active' : ''?>"><a href="#"><?php echo $this->lang->line("COMMITTEES");?></a>

                            <ul class="dropdown">

                                <li><a href="#"><?php echo $this->lang->line("Statutory");?></a>

                                    <ul class="dropdown">

                                        <li><a href="<?php echo base_url();?>uploads/pdf/GOVERNING BODY.pdf"

                                                target="_blank"><?php echo $this->lang->line("Governing Body");?> </a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/ACADEMIC COUNCIL.pdf"

                                                target="_blank"><?php echo $this->lang->line("Academic Council");?> </a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/COMPOSITION OF FINANCE COMMITTEE.pdf"

                                                target="_blank"><?php echo $this->lang->line("Finance Committee");?> </a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/Board of Studies.pdf"

                                                target="_blank"><?php echo $this->lang->line("Board of Studies");?> </a></li>



                                        <li><a href="<?php echo base_url();?>uploads/pdf/EXAMINATION CELL (1).pdf"

                                                target="_blank"><?php echo $this->lang->line("Examination CELL");?> </a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/INTERNAL QUALITY ASSURANCE CELL.pdf"

                                                target="_blank"><?php echo $this->lang->line("Internnal Quality Assuarance Cell (IQAC)");?> </a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/COLLEGE DEVELOPMENT COMMITTEE.pdf"

                                                target="_blank"><?php echo $this->lang->line("College Development Committee");?> </a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/INTERNAL COMMITTEE WOMEN’S CELL.pdf"

                                                target="_blank"><?php echo $this->lang->line("Internal Committee / Women’s Cell");?></a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/RIGHT TO INFORMATION CELL.pdf"

                                                target="_blank"><?php echo $this->lang->line("Right To Information Cell");?> </a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/CELL FOR PREVENTION OF CASTE-BASED DISCRIMINATION EQUAL OPPORTUNITY.pdf"

                                                target="_blank"><?php echo $this->lang->line("Equality Opportunity Centre");?> </a></li>

                                                

                                        <li><a href="<?php echo base_url();?>uploads/pdf/COMMITTEE FOR UNFAIR MEANS.pdf"

                                                target="_blank"> Committee For Unfair Means </a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/STUDENTS WELFARE FREESHIP COMMITTEE.pdf"

                                                target="_blank">Students Welfare Freeship Committee</a></li>   

                                        <li><a href="<?php echo base_url();?>uploads/pdf/Ethical Committee.pdf"

                                                target="_blank">Ethical Committee</a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/Internship  cell.pdf"

                                                target="_blank">Internship Cell</a></li>

                                                        

                                                

                                    </ul>

                                </li>

                                <li><a href="#"><?php echo $this->lang->line("College Level");?> </a>

                                    <ul class="dropdown">

                                        <li><a href="#"><?php echo $this->lang->line("Grievance Redressal Committee");?></a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?>uploads/pdf/STUDENTS GRIEVANCE REDRESSAL CELL  (1).pdf" target="_blank"   >GRIEVANCE REDRESSAL CELL FORM </a></li>

                                                <li><a href="#"     >Minutes</a>

                                                <ul class="dropdown">

                                                    <li><a href="<?php echo base_url();?>uploads/pdf/Minutes of meeting grievance redressal 30th March 2024.docx" target="_blank"   >March 2024</a></li>

                                                </li>

                                            </ul>

                                                </li>

                                            </ul>

                                        </li>

                                        

                                        <!-- <li><a href="<?php echo base_url();?>uploads/pdf/GRIEVANCE REDRESSAL CELL.pdf"  target="_blank" ><?php echo $this->lang->line("Grievance Redressal Committee");?></a> -->



                                        </li>

                                        <li><a href="committee-activity"><?php echo $this->lang->line("Committee Activities");?></a></li>

                                    </ul>

                                </li>

                                <li><a href="#"  >ANTI-RAGGING</a>

                                    <ul class="dropdown">

                                        <li><a href="#"   >Minutes</a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Minutes of anti ragging commitee 15th October 2022.pdf" target="_blank"   >Oct 2022</a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Minutes of anti ragging commitee 13th April 2023.pdf"  target="_blank"   >April 2023</a></li>  

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Minutes of anti ragging commitee 14th October 2023.pdf" target="_blank"   >Oct 2023</a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/Minutes of anti ragging commitee 30th march 2024.pdf"

                                            target="_blank">March 2024</a></li>

                                                         

                                            </ul>

                                        </li>

                                        

                                    </ul>

                                </li>

                                    

                                </li>

                                <!--<li><a href="#">Non Statuory </a>

                                            <ul class="dropdown">

                                                <li><a href="#">Cultural</a></li>

                                                <li><a href="#">Sports</a></li>

                                                <li><a href="#">NSS</a></li>

                                                <li><a href="#">Alumnae</a></li>

                                                <li><a href="#">Placement</a></li>

                                                <li><a href="#">Seminar and Workshop</a></li>

                                                <li><a href="#">Mentoring</a></li>

                                                <li><a href="#">Environment and Sensitization committee </a></li> 

                                            </ul>

                                        </li>-->

                                <!-- <li><a href="#">College Level </a>

                                            <ul class="dropdown">

                                                <li><a href="<?php echo base_url();?>uploads/pdf/anti-ragging-committee.pdf" target="_blank">Anti-ragging Committee</a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/grievance-redressal-cell.pdf" target="_blank">Grievance Redressal Cell</a></li>

                                                <li><a href="#">Unfair means in Examination at College</a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/caste-based-discrimination.pdf" target="_blank">For Prevention of Caste-based Discrimination</a></li>

                                                <li><a href="<?php echo base_url();?>uploads/pdf/students-welfare-committee.pdf" target="_blank">Students Welfare Committee</a></li>

                                            </ul>

                                        </li> -->

                            </ul>

                        </li>







                        <li class="<?php echo (in_array($page_url,$Research)) ? 'active' : ''?>"><a href="#"><?php echo $this->lang->line("RESEARCH");?></a>

                            <ul class="dropdown">

                                <li><a href="research"><?php echo $this->lang->line("Research Capacity Building Center");?></a></li>

                                <!--pdf/Publications-Jan-2020-Dec-2020.pdf-->

                                <li><a href="#"><?php echo $this->lang->line("Publications");?></a>

                                    <ul class="dropdown">

                                        <li><a href="<?php echo base_url();?>uploads/pdf/research-2017-2018.pdf"

                                                target="_blank"><?php echo $this->lang->line("2017-2018");?></a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/research-2018-2019.pdf"

                                                target="_blank"><?php echo $this->lang->line("2018-2019");?></a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/research-2019-2020.pdf"

                                                target="_blank"><?php echo $this->lang->line("2019-2020");?></a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/research-2021-2022.pdf"

                                                target="_blank"><?php echo $this->lang->line("2021-2022");?></a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/PUBLICATIONS 2022 - 2023.pdf"

                                                target="_blank">2022-2023</a></li>

                                        <li><a href="<?php echo base_url();?>uploads/pdf/PUBLICATIONS 2023 -2024 (1).pdf"

                                                target="_blank">2023-2024</a></li>

                                    </ul>

                                </li>

                                <li><a href="<?php echo base_url();?>uploads/pdf/research-policy.pdf"

                                        target="_blank"><?php echo $this->lang->line("Policy");?></a></li>

                            </ul>

                        </li>



                        <!--<li>

                                    <a href="#">Library</a>

                                </li>-->







                        <li class="<?php echo (in_array($page_url,$EECH)) ? 'active' : ''?>"><a href="#"><?php echo $this->lang->line("EECH");?></a>

                            <ul class="dropdown">

                                <li><a href="incubation"><?php echo $this->lang->line("Incubation");?> </a></li>

                                <li><a href="placement"><?php echo $this->lang->line("Placement");?> </a></li>

                                <!--pdf/Placement-Report.pdf-->



                                <!--<li><a href="#">Enterpeneurship </a></li>-->

                            </ul>

                        </li>

                        <!--<li><a href="<?php echo base_url();?>uploads/pdf/linkages.pdf" target="_blank">LINKAGES</a></li>-->

                        <li  class="<?php echo (in_array($page_url,$linkages)) ? 'active' : ''?>"><a href="linkages"><?php echo $this->lang->line("LINKAGES");?></a></li>



                        <li  class="<?php echo (in_array($page_url,$Grants)) ? 'active' : ''?>"><a href="#"><?php echo $this->lang->line("GRANTS/SCHEMES");?> </a>

                            <ul class="dropdown">

                                <li><a href="grant-received"><?php echo $this->lang->line("Grants Received");?></a></li>

                                <li><a href="quotations-for-rusa"><?php echo $this->lang->line("RUSA");?> </a></li>

                            </ul>

                        </li>

                        <li class="<?php echo (in_array($page_url,$contactus)) ? 'active' : ''?>"><a href="contact-us" style="padding:14px 2px;"><?php echo $this->lang->line("CONTACT US");?></a></li>

                        <li style="margin-right: -20px;"><a href="https://instagram.com/bmn_college?igshid=YmMyMTA2M2Y=" target="_blank"  style="padding:14px 2px;max-width:75%;"><img src="<?php echo base_url();?>assets/images/social_insta.png" alt=""></a></li>

                        <li  style="margin-right: -20px;"><a href="https://www.facebook.com/Dr-BMN-College-of-Home-Science-208633133133272/" target="_blank"  style="padding:14px 2px;max-width:75%;"><img src="<?php echo base_url();?>assets/images/social_fb.png" alt=""></a></li>

                        <li  style="margin-right: -20px;"><a href="https://twitter.com/DrBMNCollege" target="_blank"  style="padding:14px 2px;max-width:75%;"><img src="<?php echo base_url();?>assets/images/social_twt.png" alt=""></a></li>

                        <li  style="margin-right: -20px;"><a href="https://www.youtube.com/channel/UCksh44oXAYahaIpYz6cciQw" target="_blank"  style="padding:14px 2px;max-width:75%;"><img src="<?php echo base_url();?>assets/images/social_yt.png" alt=""></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>



</header>



