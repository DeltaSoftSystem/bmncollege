<?php
$session_user_data = $this->session->userdata('user_data');
//print_r($session_user_data);

$activaation_id = (isset($activaation_id))?$activaation_id:0;
$sub_activaation_id = (isset($sub_activaation_id))?$sub_activaation_id:0;
?>
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">




        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->

                <li class="nav-item">
                    <a href="<?php echo site_url("websiteadmin/home"); ?>"
                        class="nav-link <?php if ($activaation_id == "1") {echo " active";}?>">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "101") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-file-text2"></i> <span>CMS</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="CMS">
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/homepage') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_101"){ echo 'active';}?>">Page
                                Popup</a></li>

                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/econtent') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_105"){ echo 'active';}?>">E-Content</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/linkages') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_102"){ echo 'active';}?>">Linkages</a>
                        </li>
                        <!--  <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/incubation_events') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_103"){ echo 'active';}?>">Incubation
                                -Events</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/incubation_ventures') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_104"){ echo 'active';}?>">Incubation
                                -Ventures</a>
                        </li> -->
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/committeeactivity/listshow') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "1022_2") {echo " active";}?>">Committee
                                Activity</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/gallery/alumnae') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "11105_2") {echo " active";}?>">Alumnae</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/testimonial/listshow') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "103_1") {echo " active";}?>">Testimonial</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/academicCalendar') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "101_106") {echo " active";}?>">Academic Calendar</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/admissionenquiry_message') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "101_107") {echo " active";}?>">Admission Enquiry Message</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/downloadhome') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "101_108") {echo " active";}?>">Download</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/feedbackform') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "101_109") {echo " active";}?>">Feedback Form</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "2041") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link legitRipple"><i class="icon-graduation"></i> <span>Programme</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Programme">
                        <li
                            class="nav-item nav-item-submenu <?php if ($sub_activaation_id == "2041_1") {echo " nav-item-expanded nav-item-open";}?>">
                            <a href="#" class="nav-link legitRipple">Undergraduate</a>
                            <ul class="nav nav-group-sub">

                               
                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/ug_common/HD-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='HD-programm'){ echo 'active';}?> legitRipple">Human
                                        Development</a></li>


                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/ug_common/RM-hospitality-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='RM-hospitality-programm'){ echo 'active';}?> legitRipple">RM
                                        Hospitality Management</a></li>

                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/ug_common/TSAD-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='TSAD-programm'){ echo 'active';}?> legitRipple">TSAD
                                        Programme</a></li>

                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/ug_common/fsn-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='fsn-programm'){ echo 'active';}?> legitRipple">FSN
                                        Programme</a></li>

                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/ug_common/ND-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='ND-programm'){ echo 'active';}?> legitRipple">ND
                                        Programme</a></li>

                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/ug_common/bca-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='bca-programm'){ echo 'active';}?> legitRipple">BCA
                                        Programme</a></li>
                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/ug_common/foundation-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='foundation-programm'){ echo 'active';}?> legitRipple">Foundation
                                        Programme</a></li>

                            </ul>
                        </li>
                        <li
                            class="nav-item nav-item-submenu <?php if ($sub_activaation_id == "2042_2_1") {echo " nav-item-expanded nav-item-open";}?>">
                            <a href="#" class="nav-link legitRipple">Postgraduate</a>
                            <ul class="nav nav-group-sub">

                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/pg_common/msc-cnd-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='msc-cnd-programm'){ echo 'active';}?> legitRipple">M.Sc
                                        Cnd Programme</a></li>
                                <!--  <li class="nav-item "><a href="<?php echo site_url('websiteadmin/cms/pg_common/msc-tourism-hospital-programm') ?>" class="nav-link <?php if($this->uri->segment(4)=='msc-tourism-hospital-programm'){ echo 'active';}?> legitRipple">Resource Management</a></li> -->
                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/pg_common/msc-cs-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='msc-cs-programm'){ echo 'active';}?> legitRipple">M.Sc
                                        CS Programme</a></li>
                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/pg_common/PGDSSFN-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='PGDSSFN-programm'){ echo 'active';}?> legitRipple">PGDSSFN
                                        Programme</a></li>
                                <li class="nav-item "><a
                                        href="<?php echo site_url('websiteadmin/cms/pg_common/PGECE-programm') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='PGECE-programm'){ echo 'active';}?> legitRipple">PGECE
                                        Programme</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/skillbasedcourses') ?>"
                                class="nav-link <?php if($this->uri->segment(3)=='skillbasedcourses'){ echo 'active';}?> legitRipple">Skill
                                Based Courses</a>
                        </li>

                    </ul>
                </li>
                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "2055") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link legitRipple"><i class="icon-graduation"></i> <span>Library</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Exam">
                        
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/newarrivals') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "2055_1"){ echo 'active';}?>"><i
                                    class="icon-menu7" aria-hidden="true"></i>   New Arrivals </a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/publication') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "2055_2"){ echo 'active';}?>"><i
                                    class="icon-menu7" aria-hidden="true"></i>  Publication</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/questionpapers') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "2055_3"){ echo 'active';}?>"><i
                                    class="icon-menu7" aria-hidden="true"></i>  Question Papers</a>
                        </li>  

                    </ul>
                </li>
                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "2051") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link legitRipple"><i class="icon-graduation"></i> <span>Exam</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Exam">
                        <li
                            class="nav-item nav-item-submenu <?php if ($sub_activaation_id == "2051_1") {echo " nav-item-expanded nav-item-open";}?>">
                            <a href="#" class="nav-link"><i class="icon-clipboard2"></i> <span>Result</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Result">
                                <li class="nav-item"><a
                                        href="<?php echo site_url('websiteadmin/cms/result/bsc-result') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='bsc-result'){ echo 'active';}?>"><i
                                            class="icon-menu7" aria-hidden="true"></i> BSC</a>
                                </li>
                                <li class="nav-item"><a
                                        href="<?php echo site_url('websiteadmin/cms/result/bca-result') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='bca-result'){ echo 'active';}?>"><i
                                            class="icon-menu7" aria-hidden="true"></i> BCA</a>
                                </li>
                                <li class="nav-item"><a
                                        href="<?php echo site_url('websiteadmin/cms/result/pg-result') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='pg-result'){ echo 'active';}?>"><i
                                            class="icon-menu7" aria-hidden="true"></i>PG</a>
                                </li>
                                <li class="nav-item"><a
                                        href="<?php echo site_url('websiteadmin/cms/resulttab') ?>"
                                        class="nav-link <?php if($this->uri->segment(3)=='resulttab' || $this->uri->segment(3) =='resulttab_action'){ echo 'active';}?>"><i
                                            class="icon-menu7" aria-hidden="true"></i>TABS</a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item nav-item-submenu <?php if ($sub_activaation_id == "2052_1") {echo " nav-item-expanded nav-item-open";}?>">
                            <a href="#" class="nav-link"><i class="icon-clipboard2"></i> <span>Time Table</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Time Table">


                                <li class="nav-item"><a
                                        href="<?php echo site_url('websiteadmin/cms/examtimetable/BSc-Exam') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='BSc-Exam'){ echo 'active';}?>"><i
                                            class="icon-menu7" aria-hidden="true"></i> BSC</a>
                                </li>
                                <li class="nav-item"><a
                                        href="<?php echo site_url('websiteadmin/cms/examtimetable/BCA-Exam') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='BCA-Exam'){ echo 'active';}?>"><i
                                            class="icon-menu7" aria-hidden="true"></i> BCA</a>
                                </li>
                                <li class="nav-item"><a
                                        href="<?php echo site_url('websiteadmin/cms/examtimetable/PG-Exam') ?>"
                                        class="nav-link <?php if($this->uri->segment(4)=='PG-Exam'){ echo 'active';}?>"><i
                                            class="icon-menu7" aria-hidden="true"></i> PG</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/continuous') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "2053_1"){ echo 'active';}?>"><i
                                    class="icon-menu7" aria-hidden="true"></i> Continuous Assessment </a>
                        </li>

                    </ul>
                </li>
                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "2031") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-lab"></i> <span>Research</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Research">

                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/research') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "2031_1"){ echo 'active';}?>"><i
                                    class="icon-calendar" aria-hidden="true"></i> Workshop</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/researchcourse') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "2031_2"){ echo 'active';}?>"><i
                                    class="icon-menu7" aria-hidden="true"></i> Courses Offered</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "2021") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-alarm "></i> <span>Incubation</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Incubation">

                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/incubation_events') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "2021_103"){ echo 'active';}?>"><i
                                    class="icon-calendar" aria-hidden="true"></i> Incubation -Events</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/incubation_ventures') ?>"
                                class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "2021_104"){ echo 'active';}?>"><i
                                    class="icon-menu7" aria-hidden="true"></i> Incubation -Ventures</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "2011") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-office "></i> <span>Placement</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Placement">

                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/gallery/placement') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "2011_22") {echo " active";}?>"><i
                                    class="icon-man-woman " aria-hidden="true"></i> Placed Students</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/gallery/recruiters') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "2011_2") {echo " active";}?>"><i
                                    class="icon-office" aria-hidden="true"></i> Recruiters</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/committeemembers') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "2011_3") {echo " active";}?>"><i
                                    class="icon-tree7" aria-hidden="true"></i> Committee Members</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/placementevents') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "2011_4") {echo " active";}?>"><i
                                    class="icon-calendar" aria-hidden="true"></i> Events Organised</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/cms/placementWebinar') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "2011_5") {echo " active";}?>"><i
                                    class="icon-calendar2" aria-hidden="true"></i> Webinar Conducted</a>
                        </li>
                    </ul>
                </li>
                
                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "1011") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-magazine  "></i> <span>Post</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Post">
                        <!-- <li class="nav-item"><a href="<?php echo site_url('websiteadmin/news/blogcategory') ?>" class="nav-link  <?php if ($sub_activaation_id == "1011_1") {echo " active";}?>"><i class="icon-price-tag3 "></i>Category</a>
                        </li> -->
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/news/listshow') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "1011_2") {echo " active";}?>"><i
                                    class="icon-file-text3 " aria-hidden="true"></i> List</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/news/news_action') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "1011_3") {echo " active";}?>"><i
                                    class="icon-file-plus" aria-hidden="true"></i>Add New</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "1012") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-calendar "></i> <span>Event</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Event">
                        <!-- <li class="nav-item"><a href="<?php echo site_url('websiteadmin/events/blogcategory') ?>" class="nav-link  <?php if ($sub_activaation_id == "1012_1") {echo " active";}?>"><i class="icon-price-tag3 "></i>Category</a>
                        </li> -->
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/events/listshow') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "1012_2") {echo " active";}?>"><i
                                    class="icon-file-text3 " aria-hidden="true"></i> List</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/events/events_action') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "1012_3") {echo " active";}?>"><i
                                    class="icon-file-plus" aria-hidden="true"></i>Add New</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "1013") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-clipboard3 "></i> <span>Notice</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Notice">
                        <!-- <li class="nav-item"><a href="<?php echo site_url('websiteadmin/notice/blogcategory') ?>" class="nav-link  <?php if ($sub_activaation_id == "1013_1") {echo " active";}?>"><i class="icon-price-tag3 "></i>Category</a>
                        </li> -->
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/notice/listshow') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "1013_2") {echo " active";}?>"><i
                                    class="icon-file-text3 " aria-hidden="true"></i> List</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('websiteadmin/notice/notice_action') ?>"
                                class="nav-link <?php if ($sub_activaation_id == "1013_3") {echo " active";}?>"><i
                                    class="icon-file-plus" aria-hidden="true"></i>Add New</a>
                        </li>
                    </ul>
                </li>




                <!--  <li class="nav-item">
                    <a href="<?php echo site_url("websiteadmin/sitecontrol/maintenancemode"); ?>"
                        class="nav-link <?php echo ($sub_activaation_id == "1101_3") ? 'active' : '' ?>">
                        <i class="icon-wrench3"></i>
                        <span>Maintenance Mode</span>
                    </a>
                </li> -->
                <li class="nav-item ">
                    <a href="<?php echo site_url("websiteadmin/contactus/listall"); ?>"
                        class="nav-link <?php echo ($sub_activaation_id == "1105_1") ? 'active' : '' ?>">
                        <i class="icon-envelop3" aria-hidden="true"></i>
                        <span>Contact Us </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?php echo site_url("websiteadmin/admissionenquiry/listall"); ?>"
                        class="nav-link <?php echo ($sub_activaation_id == "1105_2") ? 'active' : '' ?>">
                        <i class="icon-phone-incoming" aria-hidden="true"></i>
                        <span>Admission enquiry</span>
                    </a>
                </li>
                <li
                    class="nav-item nav-item-submenu <?php if ($activaation_id == "1101") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class=" icon-cog3  "></i> <span>Setting</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">

                        <li class="nav-item"><a
                                href="<?php echo site_url('websiteadmin/sitecontrol/maintenancemode') ?>"
                                class="nav-link  <?php if ($sub_activaation_id == "1101_3") {echo " active";}?>"><i
                                    class="icon-wrench3 "></i>Maintenance Mode</a>
                        </li>

                    </ul>
                </li>
                <?php
                if($session_user_data['roles']=="SA"){
                ?>
                <li class="nav-item ">
                    <a href="<?php echo site_url("websiteadmin/administration/listall"); ?>"
                        class="nav-link <?php echo ($sub_activaation_id == "1947") ? 'active' : '' ?>">
                        <i class="icon-user-plus" aria-hidden="true"></i>
                        <span>Admin-Staff</span>
                    </a>
                </li>
                <?php } else {
                ?>
                <li class="nav-item ">
                    <a href="<?php echo site_url("websiteadmin/administration/profile"); ?>"
                        class="nav-link <?php echo ($sub_activaation_id == "1947") ? 'active' : '' ?>">
                        <i class="icon-user-tie" aria-hidden="true"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <?php }?>
                <li class="nav-item">
                    <a href="<?php echo site_url("websiteadmin/dashboard/logout"); ?>" class="nav-link">
                        <i class="icon-switch2"></i>
                        <span>Logout</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(""); ?>" target="_blank" class="nav-link">
                        <i class="icon-earth"></i>
                        <span>View Website</span>
                    </a>
                </li>
                <!-- /page kits -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>