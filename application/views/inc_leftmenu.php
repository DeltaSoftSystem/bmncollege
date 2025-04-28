<?php
$session_user_data = $this->session->userdata('user_data');
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
                    <a href="<?php echo site_url("home"); ?>" class="nav-link <?php if ($activaation_id == "1") {echo " active";}?>">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu <?php if ($activaation_id == "101") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-file-text2"></i> <span>CMS</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="<?php echo site_url('cms/banner') ?>" class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_8"){ echo 'active';}?>">Home Slider</a></li>
                        <!-- <li class="nav-item"><a href="<?php echo site_url('cms/aboutus') ?>" class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_1"){ echo 'active';}?>">About-us</a></li>
                        <li class="nav-item"><a href="<?php echo site_url('cms/termscondtion') ?>" class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_2"){ echo 'active';}?>">Terms Condtion</a></li> -->
                        <li class="nav-item"><a href="<?php echo site_url('cms/privacy') ?>" class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_3"){ echo 'active';}?>">Privacy</a></li>
                        <li class="nav-item"><a href="<?php echo site_url('cms/address') ?>" class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_4"){ echo 'active';}?>">Address</a></li>
                        <li class="nav-item"><a href="<?php echo site_url('cms/metatags') ?>" class="nav-link <?php if(isset($sub_activaation_id) && $sub_activaation_id== "101_5"){ echo 'active';}?>">Meta Tags</a></li>
                    </ul>
                </li>
                

                <!-- <li class="nav-item nav-item-submenu <?php if ($activaation_id == "1011") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-magazine  "></i> <span>Blog</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="<?php echo site_url('blogs/blogcategory') ?>" class="nav-link  <?php if ($sub_activaation_id == "1011_1") {echo " active";}?>"><i class="icon-price-tag3 "></i>Category</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('blogs/bloglist') ?>" class="nav-link <?php if ($sub_activaation_id == "1011_2") {echo " active";}?>"><i class="icon-file-text3 " aria-hidden="true"></i>Blog List</a>
                        </li>
                       
                    </ul>
                </li> -->
                <li class="nav-item nav-item-submenu <?php if ($activaation_id == "1011") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-magazine  "></i> <span>News</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="#<?php echo site_url('news/newscategory') ?>" class="nav-link  <?php if ($sub_activaation_id == "1011_1") {echo " active";}?>"><i class="icon-price-tag3 "></i>Category</a>
                        </li>
                        <li class="nav-item"><a href="#<?php echo site_url('news/newslist') ?>" class="nav-link <?php if ($sub_activaation_id == "1011_2") {echo " active";}?>"><i class="icon-file-text3 " aria-hidden="true"></i>News List</a>
                        </li>
                       <!--  <li class="nav-item"><a href="<?php echo site_url('news/adddata') ?>" class="nav-link <?php if ($sub_activaation_id == "1011_3") {echo " active";}?>"><i class="icon-file-plus" aria-hidden="true"></i>Blogs New</a>
                        </li> -->
                    </ul>
                </li>
                
                
               <!--  <li class="nav-item nav-item-submenu <?php if ($activaation_id == "103") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class="icon-bubbles4"></i></i> <span>Testimonial</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="<?php echo site_url('testimonial/testimonialsListout') ?>" class="nav-link  <?php if ($sub_activaation_id == "103_1") {echo " active";}?>"><i class="icon-bubble2"></i>Customer</a>
                        </li>
                       

                    </ul>
                </li> -->
                <li class="nav-item nav-item-submenu <?php if ($activaation_id == "1101") {echo " nav-item-expanded nav-item-open";}?>">
                    <a href="#" class="nav-link"><i class=" icon-cog3  "></i> <span>Setting</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                          <li class="nav-item"><a href="<?php echo site_url('sitecontrol/sociallinks') ?>" class="nav-link  <?php if ($sub_activaation_id == "1101_1") {echo " active";}?>"><i class="icon-share3 "></i>Social Links</a>
                        </li>  
                       <!--  <li class="nav-item"><a href="<?php echo site_url('sitecontrol/sitemail') ?>" class="nav-link <?php if ($sub_activaation_id == "1101_2") {echo " active";}?>"><i class="icon-mail5 " aria-hidden="true"></i>Mail Setting</a>
                        </li>-->
                       <li class="nav-item"><a href="<?php echo site_url('sitecontrol/maintenancemode') ?>" class="nav-link  <?php if ($sub_activaation_id == "1101_3") {echo " active";}?>"><i class="icon-wrench3 "></i>Maintenance Mode</a>
                        </li>  
                        <!-- <li class="nav-item"><a href="<?php echo site_url('sitecontrol/list_all')?>" class="nav-link <?php if ($sub_activaation_id == "1101_4") {echo " active";}?>"><i class="icon-cog3 " aria-hidden="true"></i>Settings</a></li> -->
                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="<?php echo site_url("contactus/listall"); ?>" class="nav-link <?php echo ($sub_activaation_id == "1105_1") ? 'active' : '' ?>">
                        <i class="fa icon-user" aria-hidden="true"></i>
                        <span>Contact Us </span>
                    </a>
                </li>

               <!--  <li class="nav-item"><a href="<?php echo site_url('gallery/home_slider') ?>" class="nav-link <?php echo ($sub_activaation_id == "1106_1") ? 'active' : '' ?>"><i class="icon-images2"></i>Gallery</a></li> -->

                <li class="nav-item ">
                    <a href="<?php echo site_url("administration/profile"); ?>" class="nav-link <?php echo ($sub_activaation_id == "1947") ? 'active' : '' ?>">
                        <i class="fa icon-user" aria-hidden="true"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url("dashboard/logout"); ?>" class="nav-link">
                        <i class="icon-switch2"></i>
                        <span>Logout</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url(); ?>" target="_blank" class="nav-link">
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