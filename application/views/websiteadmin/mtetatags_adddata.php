<!DOCTYPE html>
<html lang="en">

    <head>
        <?php $this->load->view('websiteadmin/inc_metacss');?>
        <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/datatables_responsive.js"></script>
        <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/notifications/bootbox.min.js"></script>
        <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/form_floating_labels.js"></script>
        <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/editor_ckeditor.js"></script>
        <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
        <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/form_controls_extended.js"></script>
        <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/form_layouts.js"></script>
       
    </head>

    <body>

        <!-- Main navbar -->
        <?php $this->load->view('websiteadmin/inc_topmenu');?>

        <!-- /main navbar -->


        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <?php $this->load->view('websiteadmin/inc_leftmenu');?>
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header page-header-light">


                    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="<?php echo site_url("home"); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                                <span class="breadcrumb-item "><?php echo (isset($title)) ? $title : '' ?></span>
                                <span class="breadcrumb-item active"><?php echo (isset($sub_heading)) ? $sub_heading : '' ?></span>
                            </div>
                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>
                        <div class="header-elements d-none">
                            
                        </div>

                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Table header styling -->
                    <div class="card">


                        <?php
$error = $this->session->flashdata('error');
if ($error) {
    ?>
                        <div class="alert bg-warning text-white alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            <span class="font-weight-semibold">Error! </span> <?php echo $error ?>
                        </div>
                        <?php }?>

                        <!-- Text inputs -->

                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"><?php echo (isset($sub_heading)) ? $sub_heading : '' ?></h5>
                            <div class="header-elements">

                            </div>
                        </div>

                        <div class="card-body">
                        <form  class="form-horizontal" id="blogform1" name="blogform1" method="post" action="<?php echo site_url($controller.'/'.$fun_name)?>"  enctype="multipart/form-data" >
                        <input type="hidden" name="mode" id="mode" value="edit_content">

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="name">Name </label>
                                    <div class="col-lg-10">
                                    <strong><?php echo isset($records['name']) ? $records['name'] : ''; ?></strong>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="meta_title">Meta title </label>
                                    <div class="col-lg-10">
                              
                                    <input type="text" name='meta_title' id="meta_title" class="form-control   " value="<?php echo isset($records['meta_title']) ? $records['meta_title'] : ''; ?>" placeholder="Meta title"  > 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="meta_keywords">Meta keywords </label>
                                    <div class="col-lg-10">
                              
                                    <input type="text" name='meta_keywords' id="meta_keywords" class="form-control   " value="<?php echo isset($records['meta_keywords']) ? $records['meta_keywords'] : ''; ?>" placeholder="Meta keywords"  > 
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="meta_descriptions">Meta descriptions </label>
                                    <div class="col-lg-10">
                                    <input type="text" name='meta_descriptions' id="meta_descriptions" class="form-control   " value="<?php echo isset($records['meta_descriptions']) ? $records['meta_descriptions'] : ''; ?>" placeholder="Meta descriptions"  > 
                                        
                                    </div>
                                </div> 

                                
                           
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mr-3">Submit <i class="icon-paperplane "></i></button>
                                    <a href="<?php echo site_url($controller."/metatags");?>"><button type="button" class="btn btn-light" id="reset"><i class="icon-arrow-left7"></i> Back</button></a>

                                </div>
                            </form>
                        </div>

                        <!-- /text inputs -->
                    </div>
                    <!-- /table header styling -->





                </div>
                <!-- /content area -->


                <!-- Footer -->
                <?php $this->load->view('websiteadmin/inc_footer');?>

                <!-- /footer -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </body>
   
     

    

</html>