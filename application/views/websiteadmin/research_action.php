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
                                <label class="col-form-label col-lg-2" for="data_type"> Activities of </label>
                                <div class="col-lg-9">
                                    <select name="data_type" id="data_type" class="form-control"
                                        aria-label="Default select example">
                                        <option value="Teachers Activities"
                                            <?php echo (isset($records['data_type']) && $records['data_type']=="Teachers Activities") ? ' selected' : ''?>>
                                            Teachers Activities</option>
                                        <option value="Students Activities"
                                            <?php echo (isset($records['data_type']) && $records['data_type']=="Students Activities") ? ' selected' : ''?>>
                                            Students Activities
                                        </option>


                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="heading"> Heading <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                        name="heading" id="heading" maxlength="512"
                                        value="<?php echo isset($records['heading']) ? $records['heading'] : ''; ?>"
                                        placeholder="Heading " required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="date_year"> Year <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control alhanumeric1 " name="date_year"
                                        id="date_year"
                                        value="<?php echo isset($records['date_year']) ? $records['date_year']  : ''; ?>"
                                        placeholder="2021-2022" required>
                                </div>
                            </div>
                            <div class="form-group row" id="div_session_name">
                                <label class="col-form-label col-lg-2" for="session_name"> Session Name</label>
                                <div class="col-lg-9">
                                <select name="session_name" id="session_name" class="form-control"
                                        aria-label="Default select example">
                                        <option value=""
                                            <?php echo (isset($records['session_name']) && $records['session_name']=="") ? ' selected' : ''?>>None / Blank
                                            </option>
                                        <option value="UG SESSIONS"
                                            <?php echo (isset($records['session_name']) && $records['session_name']=="UG SESSIONS") ? ' selected' : ''?>>
                                            UG SESSIONS</option>
                                        <option value="PG SESSIONS"
                                            <?php echo (isset($records['session_name']) && $records['session_name']=="PG SESSIONS") ? ' selected' : ''?>>
                                             PG SESSIONS
                                        </option>


                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <?php
                                      $main_image = (isset($records['main_image']) && $records['main_image']!="") ? base_url()."uploads/cms/research/".$records['main_image'] : 'https://via.placeholder.com/100x100'; ;
                                    ?>
                                <label class="col-md-2 col-form-label"> Image</label>
                                <div class="col-md-10">
                                    <div class="row col-md-5">
                                        <img src="<?php echo $main_image?>" id="temppreviewimageki1"
                                            class="temppreviewimageki1" style="width:100px; height:auto;display:none1">

                                    </div>
                                    <div class="row col-md-6">

                                        <div class="input-group image-preview1">

                                            <input type="text" class="form-control image-preview-filename1"
                                                disabled="disabled">
                                            <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button"
                                                    class="btn btn-default image-preview-clear image-preview-clear1"
                                                    style="display:none;" id=1>
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span
                                                        class="image-preview-input-title image-preview-input-title1">Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif"
                                                        class="browseimage" id="1" name="main_image" />
                                                    <!-- rename it -->

                                                </div>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">Image Size 800px(width) 360px(height)</span>

                                    </div>
                                </div>
                            </div>
                             
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="pdf_file">File </label>
                                <div class="col-lg-10">
                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <input type="file" id="pdf_file" name="pdf_file"
                                                class="form-control-uniform" data-fouc1>
                                            <span class="form-text text-muted">Accepted formats: pdf </span>

                                            <?php
                                
                                $pdf_file = (isset($records['pdf_file']) && $records['pdf_file']!="") ? base_url()."uploads/cms/research/".$records['pdf_file'] : '' ;
                                                if($pdf_file!=""){
                              ?>
                                            <span class="form-text text-muted">Current File: <a
                                                    href="<?php echo $pdf_file?>" target="_blank">View</a> </span>
                                            <?php }?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="video_url"> Video url :</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                        name="video_url" id="video_url" maxlength="512"
                                        value="<?php echo isset($records['video_url']) ? $records['video_url'] : ''; ?>"
                                        placeholder="Video url ">
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
    $("#date_year").datepicker({
        format: 'yyyy',
        minViewMode: 2,
        todayHighlight: true,
        multidateSeparator: "-",
        //  autoclose: true,
        multidate: 2,
    })


});

 
$(document).ready(function() {
    $("input").keypress(function() {
        $(this).removeClass("border-danger");
    });

    $("#data_type").change(function() {
        var data_type = $("#data_type").val();
        if(data_type=="Students Activities"){
            $("#div_session_name").show();
        } else {
            $("#div_session_name").hide();
        }
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


        if (!$("#data_type").val()) {
            isError = true;
            $("#data_type").addClass("border-danger");

        }
        if (!$("#heading").val()) {
            isError = true;
            $("#heading").addClass("border-danger");

        }
        if (!$("#date_year").val()) {
            isError = true;
            $("#date_year").addClass("border-danger");

        }

        //frd_email

        if (isError) {

            return false;
        } else {

            $("#blogform1").submit();
        }

        return false;
    });

//data_type
    $("#data_type").trigger('change');
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

        // TableManageButtons.init();
        </script>

</html>