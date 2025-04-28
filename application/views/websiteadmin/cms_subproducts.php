<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('websiteadmin/inc_metacss');?>
    <script src="<?php echo base_url() ?>global_assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="<?php echo base_url() ?>global_assets/js/demo_pages/datatables_responsive.js"></script>
    <script src="<?php echo base_url() ?>global_assets/js/plugins/notifications/bootbox.min.js"></script>
    <style>
    td.highlight {
        background-color: whitesmoke !important;
    }

    #progress-wrp1 {
        border: 1px solid #0099CC;
        padding: 1px;
        position: relative;
        height: 30px;
        border-radius: 3px;
        margin: 10px;
        text-align: left;
        background: #fff;
        box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
    }

    #progress-wrp1 .progress-bar {
        height: 100%;
        border-radius: 3px;
        background-color: #f39ac7;
        width: 0;
        box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
    }

    #progress-wrp1 .status {
        top: 3px;
        left: 50%;
        position: absolute;
        display: inline-block;
        color: #000000;
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

                    <div class="card-body">
                        
                    <form action="<?php echo site_url("leave/leave_process_uploadfile"); ?>"
                                                    method="POST" enctype="multipart/form-data" accept-charset="utf-8"
                                                    class="form-inline1 justify-content-center">



                                                    <div class="form-group row ">
                                                        <label class="col-md-2 col-form-label">Attach
                                                            File:</label>
                                                        <div class="col-md-6">
                                                            <input type="file" id="userfile" name="userfile"
                                                                class="form-input-styled" accept=".xls" data-fouc
                                                                required>
                                                            <span class="form-text text-muted">Accepted formats:
                                                                xls </span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button type="button" id="btnUploadCSVSubmit"
                                                                name="btnUploadCSVSubmit" class="btn btn-primary">Uplaod
                                                                File <i class="icon-paperplane ml-2"></i></button>
                                                        </div>

                                                    </div>




                                                </form>
                    </div>

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
     

// File input
// Initialize
$('.form-input-styled').uniform({
    fileButtonClass: 'action btn bg-pink-400'
});
    $(".form-control").removeClass("border-danger");
    $(".form-control-select2").removeClass("border-danger");
    $("#error_status_flag").hide();
    $("#frm-edit").submit(function(e) {
        var isError = false;
        var errMsg = "";
        var errMsg_alert = "";
        $(".form-control").removeClass("border-danger");
        $(".form-control-select2").removeClass("border-danger");
        $("#error_status_flag").hide();

        if (!$("#banner_name").val()) {
            isError = true;

            $("#banner_name").addClass("border-danger");

        }


        /*  if (!$("#description_mini").val()) {
             isError = true;
             
           //  $("#error_description").show();
             $("#description_mini").addClass("border-danger");

         } */


        //frd_email
        if (isError) {
            return false;
        } else {
            //   $("#frm-edit").submit();
            return true;
        }

        return false;
    });


});
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

$('.summernote').summernote({
    height: 400
});
// Always show badge
$('.maxlength-textarea').maxlength({
    alwaysShow: true
});
// TableManageButtons.init();
</script>

</html>