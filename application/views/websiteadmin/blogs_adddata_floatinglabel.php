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
                                <a href="<?php echo site_url($controller . "/adddata"); ?>" class="breadcrumb-elements-item">
                                    <button type="button" class="btn btn-success btn-sm"><i class="icon-plus2 mr-2"></i> Add New</button>
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
if (1) {
    ?>
                        <div class="alert bg-warning text-white alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            <span class="font-weight-semibold">Error! </span> <?php echo $error ?>Already Added
                        </div>
                        <?php }?>

                        <!-- Text inputs -->

                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"><?php echo (isset($sub_heading)) ? $sub_heading : '' ?></h5>
                            <div class="header-elements">

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group form-group-float">
                                <label class="form-group-float-label">Category</label>
                                <div class="multi-select-full">
                                    <select class="form-control form-control-multiselect" multiple="multiple" data-fouc>
                                        <option value="cheese">Cheese</option>
                                        <option value="tomatoes" selected>Tomatoes</option>
                                        <option value="mozarella">Mozzarella</option>
                                        <option value="mushrooms">Mushrooms</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group-float">
                                <label class="form-group-float-label">Blog Title</label>
                                <input type="text" class="form-control alhanumeric1 maxlength-textarea" maxlength="225"  value="" placeholder="Blog Title">
                            </div>

                            <div class="form-group form-group-float">
                                <label class="form-group-float-label">Blogger name</label>
                                <input type="text" class="form-control " placeholder="Input with helper">
                                <span class="form-text text-muted">Blogger name</span>
                            </div>
                            <div class="form-group form-group-float">
                                <label class="form-group-float-label">Tags (Lifestyle, Travel, Music)</label>
                                <input type="text" class="form-control token-field" placeholder="- Comma separated Lifestyle, Travel, Music
" data-fouc>


                                <span class="form-text text-muted">Comma separated Lifestyle, Travel, Music</span>
                            </div>
                            <!--
                                <div class="form-group form-group-float">
                                <label class="form-group-float-label">Input with helper</label>
                                <input type="text" class="form-control border-danger" placeholder="Input with helper">
                                <span class="form-text text-muted">Input helper text block</span>
                            </div> -->


                            <div class="form-group form-group-float">
                                <label class="form-group-float-label">Description</label>
                                <textarea name="editor-full" id="editor-full" rows="2" cols="2"> <p class="blog_txt">Lorem Ipsums is simply dummy text of the print industry. Lorem Ipsum has industry's standard dummy
          text ever since. Lorem Ipsums is simply dummy text of the print industry. Lorem Ipsum has industry's standard dummy
          text ever since.</p>
        <p class="blog_txt">Proin vitae blandit felis. Proin rhoncus imperdiet facilisis. Etiam et mauris ex. Maecenas posuere
          ipsum orci, at imperdiet est venenatis quis. Maecenas quis fermentum ipsum, ac eleifend urna. Cras sed viverra nibh.
          Mauris eget finibus erat. Mauris tempor varius purus nec cursus. Nullam ornare eget ipsum sit amet consequat. Nunc
          finibus vitae diam non suscipit. Praesent elementum felis sit amet urna tempus commodo. Proin congue id ante ac
          maximus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec euismod arcu venenatis, viverra arcu eu,
           efficitur mauris. Aliquam sagittis sagittis elit, in cursus est faucibus in.</p>
        <p class="blog_txt">Lorem Ipsums is simply dummy text of the print industry. Lorem Ipsum has industry's standard dummy
           text ever since. Lorem Ipsums is simply dummy text of the print industry. Lorem Ipsum has industry's standard dummy
           text ever since.</p>
        
</textarea>
                            </div>
                            <div class="form-group form-group-float">
                                <label class="d-block form-group-float-label"> Header Image</label>
                                <input type="file" class="form-control-uniform" data-fouc1>
                                <span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
                            </div>
                            <div class="form-group">
									<label class="d-block font-weight-semibold">Publish Status</label>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="radio" class="form-check-input-styled-success" name="radio-unstyled-inline-left" checked>
											Active
										</label>
									</div>

									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="radio" class="form-check-input-styled-danger" name="radio-unstyled-inline-left">
											In-active
										</label>
									</div>
								</div>
                            <div class="text-center">


                                <button type="submit" class="btn btn-primary ml-3">Submit <i class="icon-paperplane ml-2"></i></button>
                                <button type="reset" class="btn btn-light" id="reset">Back <i class="icon-reload-alt ml-2"></i></button>

                            </div>
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
    <!-- Remove modal -->
    <div id="remove_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm action</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    You are about to remove this row. Are you sure?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Yes, remove</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">No, thanks</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /remove modal -->
    <script>
    // Custom bootbox dialog
    $('.bootbox_custom').on('click', function() {
        var uuid = $(this).data("uuid") // will return the number 123
        bootbox.confirm({
            title: 'Confirm ',
            message: 'Are you sure you want to delete selected records ?',
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-link'
                }
            },
            callback: function(result) {
                if (result) {

                    location.href = "http://127.0.0.1/doice/bo-ice_adminpanel/index.php/zone/deletecity/" + uuid;


                }
            }
        });
    });
    </Script>

    <script>
    jQuery('.numbersOnly').keyup(function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.alphaonly').keyup(function() {
        this.value = this.value.replace(/[^a-zA-Z\s]+$/, '');
    });
    jQuery('.alhanumeric').keyup(function() {
        this.value = this.value.replace(/[^a-zA-Z0-9\-\s]+$/, '');
    });


    function validateEmail(email) {
        var eml = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (eml.test($.trim(email)) == false) {
            return false;
        }
        return true;
    }

    function validateMobile(mobile) {
        var mob = /^[1-9]{1}[0-9]{9}$/;
        if (mob.test($.trim(mobile)) == false) {
            return false;
        }
        return true;
    }

    function validationzipcode(zipcode) {
        var zip = /^[1-9][0-9]{6}$/;
        if (zip.test($.trim(zipcode)) == false) {
            return false;
        }
        return true;
    }
    </script>

</html>