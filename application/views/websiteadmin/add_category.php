<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('websiteadmin/inc_metacss');?>
    <script src="<?php echo base_url()?>global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="<?php echo base_url()?>global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="<?php echo base_url()?>global_assets/js/demo_pages/form_layouts.js"></script>
    <script src="<?php echo base_url()?>global_assets/js/demo_pages/form_checkboxes_radios.js"></script>

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
                            <a href="<?php echo site_url("home");?>" class="breadcrumb-item"><i
                                    class="icon-home2 mr-2"></i> Home</a>
                            <a href="<?php echo site_url($this->controller);?>" class="breadcrumb-item"><span
                                    class="breadcrumb-item "><?php echo (isset($this->pg_title))?$this->pg_title:''?></span></a>
                            <span
                                class="breadcrumb-item active"><?php echo (isset($sub_heading))?$sub_heading:''?></span>
                        </div>
                        <!-- <i href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> -->
                    </div>
                    <div class="header-elements d-none">
                        <div class="breadcrumb justify-content-center">
                            <a href="<?php echo site_url($this->controller."/categorylistall");?>"
                                class="breadcrumb-elements-item">
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


                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title"><?php echo (isset($sub_heading))?$sub_heading:''?> </h6>
                    </div>
                    <div class="card-body">
                        <form name="frm-edit" id="frm-edit"
                            action="<?php echo site_url($this->controller.'/'.$fun_name) ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="submitform">
                            <input type="hidden" name="name_old" id="name_old"
                                value="<?php echo isset($records['name']) ? $records['name'] : ''; ?>">

                            
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="name">Name:<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9"><input type="text" class="form-control  " id="name"
                                        name="name" placeholder="Name"
                                        value="<?php echo isset($records['name']) ? $records['name'] : ''; ?>">
                                    <!-- <div id="basic-error" class="validation-invalid-label" for="basic">This field is required.</div> -->
                                </div>
                            </div>


                            <div class="form-group row">
                                <?php
                                      $status = isset($records['status_flag']) ? $records['status_flag'] : 'Active'; 
                                    ?>

                                <label class="col-form-label col-lg-2" for="status">Status :<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled-success" value="Active"
                                                name="status" id="status1"
                                                <?php echo ($status=='Active')?' checked':''?>>
                                            Active
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled-danger" value="Inactive"
                                                name="status" id="status2"
                                                <?php echo ($status=='Inactive')?' checked':''?>>
                                            In-Active
                                        </label>
                                    </div>
                                    <div class="hidedefault validation-invalid-label mt-2" id="error_phonenumber">Please
                                        select status</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="sort_order">Sort order :<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9"><input type="text" class="form-control  numbersOnly"
                                        id="sort_order" name="sort_order" placeholder="sort order"
                                        value="<?php echo isset($records['sort_order']) ? $records['sort_order'] : ''; ?>">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn bg-blue">Submit <i
                                            class="icon-paperplane ml-2"></i></button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

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


            if (!$("#name").val()) {
                isError = true;
                //$("#error_first_name").show()
                $("#name").addClass("border-danger");

            }

            /*  if (!$("#description").val()) {
                 isError = true;
                 //$("#error_first_name").show()
                 $("#description").addClass("border-danger");
             }	 */


            if (!$("#sort_order").val()) {
                isError = true;
                //$("#error_first_name").show()
                $("#sort_order").addClass("border-danger");
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

    <script type="text/javascript">
    jQuery(document).ready(function($) {


    });

    // TableManageButtons.init();
    </script>

    <script type="text/javascript">
    jQuery(document).ready(function($) {






        $(function() {


            //image 1
            // Create the close button
            var closebtn1 = $('<button/>', {
                type: "button",
                text: 'x',
                id: 'close-preview1',
                style: 'font-size: initial;',
            });
            closebtn1.attr("class", "close pull-right");
            // Set the popover default content
            $('.image-preview1').popover({
                trigger: 'manual',
                html: true,
                title: "<strong>Preview</strong>" + $(closebtn1)[0].outerHTML,
                content: "There's no image",
                placement: 'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function() {
                var imgid = $(this).attr('id');
                $('.image-preview' + imgid).attr("data-content", "").popover('hide');
                $('.image-preview-filename' + imgid).val("");
                $('.image-preview-clear' + imgid).hide();
                //$('.image-preview-input input:file').val("");
                $(".image-preview-input-title" + imgid).text("Browse");
                $(".temppreviewimageki" + imgid).attr("src", '');
                $(".temppreviewimageki" + imgid).hide();
            });
            // Create the preview image
            $(".browseimage").change(function() {
                var img = $('<img/>', {
                    id: 'dynamic',
                    width: 250,
                    height: 200,
                });
                var imgid = $(this).attr('id');
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function(e) {

                    $(".image-preview-input-title" + imgid).text("Change");
                    $(".image-preview-clear" + imgid).show();
                    $(".image-preview-filename" + imgid).val(file.name);
                    img.attr('src', e.target.result);

                    $(".temppreviewimageki" + imgid).attr("src", $(img)[0].src);
                    $(".temppreviewimageki" + imgid).show();
                    //img.attr('src', e.target.result);
                    //alert(e.target.result);
                    ///alert($(img)[0].outerHTML);
                    //$(".image-preview1").attr("data-content",$(img)[0].outerHTML).popover("show");
                }
                reader.readAsDataURL(file);
            });
            //end  
        });
    });

    // TableManageButtons.init();
    </script>
</body>

</html>