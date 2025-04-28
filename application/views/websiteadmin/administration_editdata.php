<!DOCTYPE html>
<html lang="en">

<head>
    <script>
    var st_url = "<?php echo site_url()?>/";
    </script>
    <?php $this->load->view('websiteadmin/inc_metacss');?>
    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/form_floating_labels.js"></script>
    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/form_controls_extended.js"></script>
    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/form_layouts.js"></script>

    <style>
    .btn-group-vertical>.btn,
    .btn-group>.btn {
        z-index: 1;
    }
    </style>
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
                            <a href="<?php echo site_url("home"); ?>" class="breadcrumb-item"><i
                                    class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item "><?php echo (isset($title)) ? $title : '' ?></span>
                            <span
                                class="breadcrumb-item active"><?php echo (isset($sub_heading)) ? $sub_heading : '' ?></span>
                        </div>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                    <div class="header-elements d-none">
                        <div class="breadcrumb justify-content-center">
                            <a href="<?php echo site_url($back_link ); ?>" class="breadcrumb-elements-item">
                                <button type="button" class="btn btn-light btn-sm"><i class="icon-arrow-left7"></i>
                                    Back</button>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
            <!-- /page header -->
            <!-- Content area -->
            <div class="content">
                <?php
						$success = $this->session->flashdata('success');
						if ($success) {
					?>
                <div class="alert bg-success text-white alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    <span class="font-weight-semibold">Success! </span><?php echo $success?>
                </div>
                <?php }?>
                <?php
						$error = $this->session->flashdata('error');
						if ($error) {
					?>
                <div class="alert bg-danger text-white alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    <span class="font-weight-semibold">Error! </span> <?php echo $error?>
                </div>
                <?php }?>
                <?php
						$warning = $this->session->flashdata('warning');
						if ($warning) {
					?>
                <div class="alert bg-danger text-white alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    <span class="font-weight-semibold">Warning! </span> <?php echo $warning?>
                </div>
                <?php }?>
                <!-- Basic datatable -->

                <?php
						 if (isset($records) && sizeof($records)>0) { 
					    ?>
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title"><?php echo (isset($sub_heading))?$sub_heading:''?> </h6>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" id="blogform1" name="blogform1" method="post"
                            action="<?php echo site_url($controller.'/'.$fun_name)?>" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="submitform">
                            <input type="hidden" name="email_old" id="email_old"
                                value="<?php echo isset($records['user_email'])?$this->common->getDbValue($records['user_email']):''; ?>">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="first_name">First Name :<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9"><input type="text" class="form-control  alhanumeric"
                                        id="first_name" name="first_name" placeholder="Enter First Name"
                                        value="<?php echo isset($records['firstname'])?$this->common->getDbValue($records['firstname']):''; ?>">
                                    <!-- <div id="basic-error" class="validation-invalid-label" for="basic">This field is required.</div> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="last_name">Last Name :<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9"><input type="text" class="form-control alhanumeric" id="last_name"
                                        name="last_name" placeholder="Enter Last Name"
                                        value="<?php echo isset($records['lastname'])?$this->common->getDbValue($records['lastname']):''; ?>"
                                        required1> </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="email">Email :<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9"><input type="text" class="form-control" id="email" name="email"
                                        placeholder="Enter email abc@abc.com"
                                        value="<?php echo isset($records['user_email'])?$this->common->getDbValue($records['user_email']):''; ?>"
                                        required1> </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="user_status">Status :<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled-success" value="Active"
                                                name="user_status" id="user_status1"
                                                <?php if (isset($records['status_flag']) && $records['status_flag'] == 'Active')  {  echo 'checked'; } ?>>
                                            Active
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled-danger" value="Inactive"
                                                name="user_status" id="user_status2"
                                                <?php if (isset($records['status_flag']) && $records['status_flag'] == 'Inactive')  {  echo 'checked'; } ?>>
                                            In-Active
                                        </label>
                                    </div>
                                    <div class="hidedefault validation-invalid-label mt-2" id="error_phonenumber">Please
                                        select status</div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn bg-blue">Submit <i
                                            class="icon-paperplane ml-2"></i></button>
                                    <a href="<?php echo site_url($controller);?>"><button type="button"
                                            class="btn btn-light  ml-2">Cancel</button></a>
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" id="blogform1" name="blogform1" method="post"
                            action="<?php echo site_url($controller.'/'.$fun_name)?>" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="edit_content_password">

                            <fieldset>
                                <legend class="font-weight-semibold text-uppercase font-size-sm">Edit Login Details
                                </legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="email">Email :<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9"><input type="text" class="form-control" id="email"
                                            name="email" placeholder="Enter Email abc@abc.com"
                                            value="<?php echo isset($records['user_email'])?$this->common->getDbValue($records['user_email']):''; ?>"
                                            autocomplete="off" required readonly></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="email">Password :<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9"><input type="password" class="form-control"
                                            id="login_password" name="login_password" placeholder="Enter Password"
                                            value="" autocomplete="off" required> </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2"></label>
                                    <div class="col-lg-9">
                                        <button type="submit" class="btn bg-blue">Submit <i
                                                class="icon-paperplane ml-2"></i></button>
                                        <a href="<?php echo site_url($controller);?>"><button type="button"
                                                class="btn btn-light  ml-2">Cancel</button></a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <?php }?>
            </div>
            <!-- /content area -->
            <!-- Footer -->
            <?php $this->load->view('websiteadmin/inc_footer');?>
            <!-- /footer -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
    <script>
    $(document).ready(function() {
        $(".form-control").removeClass("border-danger");
        $("#frm-edit").submit(function(e) {
            var isError = false;
            var errMsg = "";
            var errMsg_alert = "";
            $(".form-control").removeClass("border-danger");


            if (!$("#first_name").val()) {
                isError = true;
                //$("#error_first_name").show()
                $("#first_name").addClass("border-danger");

            }
            if (!$("#last_name").val()) {
                isError = true;
                // $("#error_last_name").show()
                $("#last_name").addClass("border-danger");
            }


            if (!$("#email").val() || !validateEmail($("#email").val())) {
                isError = true;
                $("#email").addClass("border-danger");
                if (!$("#email").val()) {
                    //  $("#error_email").html("Please enter email-id");
                } else {
                    //  $("#error_email").html("Please enter valid email-id");
                }
                $("#error_email").show()
            }
            if (!$("#mobile").val()) {
                isError = true;
                $("#mobile").addClass("border-danger");
            }

            //frd_email
            if (isError) {
                return false;
            } else {
                $("#frm-edit").submit();
            }

            return false;
        });


    });
    </script>
</body>

</html>