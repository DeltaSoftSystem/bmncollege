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
                            <div class="breadcrumb justify-content-center">
                                 <a href="<?php echo site_url($controller . "/sociallinks"); ?>" class="breadcrumb-elements-item">
                                    <button type="button" class="btn btn-light btn-sm"><i class="icon-arrow-left7"></i> Back</button>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Table header styling -->
                    <div class="card">


                        <?php
$success = $this->session->flashdata('success');
if ($success) {
    ?>
                        <div class="alert bg-success text-white alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            <span class="font-weight-semibold">Success! </span><?php echo $success ?>
                        </div>
                        <?php }?>
                        <?php
$error = $this->session->flashdata('error');
if ($error) {
    ?>
                        <div class="alert bg-danger text-white alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            <span class="font-weight-semibold">Error! </span> <?php echo $error ?>
                        </div>
                        <?php }?>
                        <?php
$warning = $this->session->flashdata('warning');
if ($warning) {
    ?>
                        <div class="alert bg-danger text-white alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            <span class="font-weight-semibold">Warning! </span> <?php echo $warning ?>
                        </div>
                        <?php }?>
                        <!-- Text inputs -->

                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"><?php echo (isset($sub_heading)) ? $sub_heading : '' ?></h5>
                            <div class="header-elements">

                            </div>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" id="blogform1" name="blogform1" method="post" action="<?php echo site_url($controller.'/'.$fun_name)?>" enctype="multipart/form-data">
                                <input type="hidden" name="mode" id="mode" value="edit_content">


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="title">Social Name  </label>
                                    <div class="col-sm-10">
                                       <strong> <?php echo isset($records['title']) ? $records['title'] : ''; ?></strong>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="url">Social Url  </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="url" name="url" placeholder="Social Url" type="text" value="<?php echo isset($records['url']) ? $records['url'] : ''; ?>">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php
                                      $status = isset($records['status_flag']) ? $records['status_flag'] : '1'; ;
                                    ?>
                                    <label class="col-lg-2 col-form-label">Publish Status <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status_flag" id="status_flag1" class="form-check-input-styled-success" value="1" name="radio-unstyled-inline-left" <?php echo ($status==1)?' checked':''?>>
                                                Active
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status_flag" id="status_flag2" class="form-check-input-styled-danger" value="2" name="radio-unstyled-inline-left" <?php echo ($status==0)?' checked':''?>>
                                                In-active
                                            </label>

                                        </div>
                                        <div class="hidedefault validation-invalid-label mt-2" id="error_status_flag">Please select status</div>
                                    </div>

                                </div>
                                


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mr-3">Submit <i class="icon-paperplane "></i></button>


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