<!DOCTYPE html>
<html lang="en">

    <head>
        <?php $this->load->view('websiteadmin/inc_metacss');?>
        <script src="<?php echo base_url() ?>global_assets/js/demo_pages/datatables_responsive.js"></script>
        <script src="<?php echo base_url() ?>global_assets/js/plugins/notifications/bootbox.min.js"></script>
        <script src="<?php echo base_url() ?>global_assets/js/demo_pages/form_floating_labels.js"></script>
        <script src="<?php echo base_url() ?>global_assets/js/demo_pages/editor_ckeditor.js"></script>
        <script src="<?php echo base_url() ?>global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
        <script src="<?php echo base_url() ?>global_assets/js/demo_pages/form_controls_extended.js"></script>
        <script src="<?php echo base_url() ?>global_assets/js/demo_pages/form_layouts.js"></script>
       
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
                                <a href="<?php echo site_url("blogs/blogcategory");?>" class="breadcrumb-elements-item">
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
<input type="hidden" name="uuid" id="uuid" value="<?php echo isset($records['uuid']) ? $records['uuid'] : ''; ?>">
<input type="hidden" name="old_cate_name" id="old_cate_name" value="<?php echo isset($records['cate_name']) ? $records['cate_name'] : ''; ?>">
                                 

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Name <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" name='cate_name' id="cate_name" class="form-control alhanumeric1 maxlength-textarea" maxlength="225" value="<?php echo isset($records['cate_name']) ? $records['cate_name'] : ''; ?>" placeholder="Name"   >
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Sort Order</label>
                                    <div class="col-lg-10">
                                        <input type="text" name='sort_no' id="sort_no" class="form-control numbersOnly " value="<?php echo isset($records['sort_no']) ? $records['sort_no'] : '1'; ?>" placeholder="sort order"  >
                                    </div>
                                </div>
                                

                                <div class="form-group row">
                                    <?php
                                      $status = isset($records['status_flag']) ? $records['status_flag'] : '1' 
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
                                                <input type="radio" name="status_flag" id="status_flag2" class="form-check-input-styled-danger" value="2" name="radio-unstyled-inline-left" <?php echo ($status==2)?' checked':''?>>
                                                In-active
                                            </label>

                                        </div>
                                        <div class="hidedefault validation-invalid-label mt-2" id="error_status_flag">Please select status</div>
                                    </div>

                                </div>
                               
                           
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mr-3">Submit <i class="icon-paperplane "></i></button>
                                    <a href="<?php echo site_url("blogs/blogcategory");?>"><button type="button" class="btn btn-light" id="reset"><i class="icon-arrow-left7"></i> Back</button></a>

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
   
    <script>
        $(document).ready(function() {
           
            $(".form-control").removeClass("border-danger");
            $("#blogform1").submit(function(e) {
                var isError = false;
                var errMsg = "";
                var errMsg_alert = "";
                $(".form-control").removeClass("border-danger");


                if (!$("#cate_name").val()) {
                    isError = true;
                    //$("#error_cate_name").show()
                    $("#cate_name").addClass("border-danger");

                }
               

                //frd_email
                if (isError) {
                    return false;
                } else {
                    $("#blogform1").submit();
                }

                return false;
            });


        });
        </script>
 

    

</html>