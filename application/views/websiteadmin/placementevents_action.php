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
                        <?php
                       // print_r($records);
                        ?>
                        <form class="form-horizontal" id="blogform1" name="blogform1" method="post"
                            action="<?php echo site_url($controller.'/'.$fun_name)?>" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="edit_content">
                            <input type="hidden" name="blogger_name_id" id="blogger_name_id" value="1|Admin">
                            <input type="hidden" name="heading_old" id="heading_old"
                                value="<?php echo isset($records['heading']) ? $records['heading'] : ''; ?>">
                            <input type="hidden" name="sort_no" id="sort_no"
                                value="<?php echo isset($records['sort_no']) ? $records['sort_no'] : ''; ?>">

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="event_dates_from">From Date <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-2">

                                    <input type="text" class="form-control alhanumeric1 " name="event_dates_from"
                                        id="event_dates_from"
                                        value="<?php echo isset($records['event_dates_from']) ? $records['event_dates_from'] : ''; ?>"
                                        placeholder="Date">
                                </div>
                                <label class="col-lg-2 col-form-label text-right" for="event_dates_to">To Date </label>
                                <div class="col-lg-2">

                                    <input type="text" class="form-control alhanumeric1 " name="event_dates_to"
                                        id="event_dates_to"
                                        value="<?php echo isset($records['event_dates_to']) ? $records['event_dates_to'] : ''; ?>"
                                        placeholder="Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Description <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <?php
                                       // print_r($records);
                                        ?>
                                    <textarea name="descriptions" id="descriptions"
                                        class="form-control summernote"><?php echo isset($records['descriptions']) ? $records['descriptions'] : ''; ?></textarea>
                                    <div class="hidedefault validation-invalid-label mt-2" id="error_descriptions">
                                        Please enter detail </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <?php
                                      $status = isset($records['status_flag']) ? $records['status_flag'] : 'Active'; ;
                                    ?>
                                <label class="col-lg-2 col-form-label">Publish Status <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="status_flag" id="status_flag1"
                                                class="form-check-input-styled-success" value="Active"
                                                name="radio-unstyled-inline-left"
                                                <?php echo ($status=='Active')?' checked':''?>>
                                            Active
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="status_flag" id="status_flag2"
                                                class="form-check-input-styled-danger" value="Inactive"
                                                name="radio-unstyled-inline-left"
                                                <?php echo ($status=='Inactive')?' checked':''?>>
                                            In-active
                                        </label>

                                    </div>
                                    <div class="hidedefault validation-invalid-label mt-2" id="error_status_flag">Please
                                        select status</div>
                                </div>

                            </div>
                            <!-- <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for ="page_meta_title">Meta title</label>
                                    <div class="col-lg-10">
                                        <div class=" row">
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control maxlength-textarea" maxlength="255" placeholder="page_meta_title" name="page_meta_title" id="page_meta_title" value="<?php echo isset($records['page_meta_title']) ? $records['page_meta_title'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for ="meta_keywords">Meta Keywords</label>
                                    <div class="col-lg-10">
                                        <div class=" row">
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control maxlength-textarea" maxlength="255" placeholder="Meta Keywords" name="meta_keywords" id="meta_keywords" value="<?php echo isset($records['meta_keywords']) ? $records['meta_keywords'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="meta_description">Meta description</label>
                                    <div class="col-lg-10">
                                        <div class=" row">
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control maxlength-textarea" maxlength="160" placeholder="Meta description" name="meta_description" id="meta_description" value="<?php echo isset($records['meta_description']) ? $records['meta_description'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>   -->
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label"> </label>
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-primary mr-3">Submit <i
                                            class="icon-paperplane "></i></button>
                                    <a href="<?php echo site_url($back_link);?>"><button type="button"
                                            class="btn btn-light" id="reset"><i class="icon-arrow-left7"></i>
                                            Back</button></a>

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
$(document).ready(function() {
    $("#event_dates_from , #event_dates_to").datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true,
    })

 

});

$('.summernote').summernote({
    height: 400
});
$(document).ready(function() {
    $("input").keypress(function() {
        $(this).removeClass("border-danger");
    });

    $(".form-control").removeClass("border-danger");
    $(".form-control-select2").removeClass("border-danger");
    $("#error_status_flag").hide();
    $("#blogform1").submit(function(e) {
        var isError = false;
        var errMsg = "";
        var errMsg_alert = "";
        $(".form-control").removeClass("border-danger");
        $(".form-control-select2").removeClass("border-danger");
        $("#error_status_flag").hide();

       
        if (!$("#event_dates_from").val()) {
            isError = true;
            $("#event_dates_from").addClass("border-danger");

        }
        /*  if (!$("#descriptions").val()) {
             isError = true;
             
           //  $("#error_descriptions").show();
             $("#descriptions").addClass("border-danger");
             alert(44);
         } */
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
<script type="text/javascript">
jQuery(document).ready( 

);

// TableManageButtons.init();
</script>

</html>