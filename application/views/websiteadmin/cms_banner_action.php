<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('websiteadmin/inc_metacss');?>
    <script src="<?php echo base_url() ?>global_assets/js/demo_pages/datatables_responsive.js"></script>
    <script src="<?php echo base_url() ?>global_assets/js/plugins/notifications/bootbox.min.js"></script>
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
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="<?php echo site_url('cms/homepage') ?>"
                                    class="nav-link <?php echo (isset($tab1)) ? 'active' : ''?>"
                                    data-toggle1="tab">Hello Bar</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('cms/banner') ?>" class="nav-link active"
                                    data-toggle1="tab">Slider</a>
                            </li>
                            <li class="nav-item"><a href="<?php echo site_url('cms/homepage') ?>" class="nav-link" data-toggle="tab">Section 1
                                    (Box 3)</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('cms/homepage') ?>" class="nav-link" data-toggle="tab">Section 2
                                    (Box 6)</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('cms/homepage') ?>" class="nav-link" data-toggle="tab">Section
                                    3</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('cms/homepage') ?>" class="nav-link" data-toggle="tab">Section
                                    4</a></li>
                        </ul>

                        <div class="tab-content">
                            <form name="frm-edit" id="frm-edit"
                                action="<?php echo site_url($controller . '/'.$fun_name) ?>" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="mode" id="mode" value="submitform">
                                <input type="hidden" class="form-control alhanumeric1 maxlength-textarea"
                                            maxlength="200" name="banner_name" id="banner_name"
                                            value="<?php echo isset($records['banner_name']) ? $records['banner_name'] : ''; ?>"
                                            placeholder="Name">
                              <!--   <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="banner_name">Name<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                            maxlength="200" name="banner_name" id="banner_name"
                                            value="<?php echo isset($records['banner_name']) ? $records['banner_name'] : ''; ?>"
                                            placeholder="Name">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="banner_text">Text 1 </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                            maxlength="200" name="banner_text" id="banner_text"
                                            value="<?php echo isset($records['banner_text']) ? $records['banner_text'] : ''; ?>"
                                            placeholder="Text 1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="banner_text2">Text 2 </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                            maxlength="200" name="banner_text2" id="banner_text2"
                                            value="<?php echo isset($records['banner_text2']) ? $records['banner_text2'] : ''; ?>"
                                            placeholder="Text 2">
                                    </div>
                                </div>



                                <!-- <div class="form-group row">
                                    <?php
                                
                                      $main_image = (isset($records['main_image']) && $records['main_image']!="") ? base_url()."../uploads/banner/".$records['main_image'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; ;
                                    ?>
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-10">
                                        <div class="row col-md-5">
                                            <img src="<?php echo $main_image?>" id="temppreviewimageki1"
                                                class="temppreviewimageki1"
                                                style="width:200px; height:auto;display:none1">

                                        </div>
                                        <div class="row col-md-6">

                                            <div class="input-group image-preview1">

                                                <input type="text" class="form-control image-preview-filename1"
                                                    disabled="disabled">
                                                
                                                <span class="input-group-btn">
                                                    
                                                    <button type="button"
                                                        class="btn btn-default image-preview-clear image-preview-clear1"
                                                        style="display:none;" id=1>
                                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                                    </button>
                                                    
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span
                                                            class="image-preview-input-title image-preview-input-title1">Browse</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif"
                                                            class="browseimage" id="1" name="main_image" />
                                                       

                                                    </div>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Image Size 1400px(width)
                                                700px(height)</span>

                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="link_name">URL (read more)</label>
                                    <div class="col-lg-10">
                                        <div class=" row">
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control " placeholder="URL"
                                                    name="link_name" id="link_name"
                                                    value="<?php echo isset($records['link_name']) ? $records['link_name'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="link_name">link_name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class=" row">
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control " placeholder="Sort Order"
                                                    name="link_name" id="link_name"
                                                    value="<?php echo isset($records['link_name']) ? $records['link_name'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <!--  <div class="form-group row">
                                    <?php
                                      $status = isset($records['status_flag']) ? $records['status_flag'] : '1'; ;
                                    ?>
                                    <label class="col-lg-2 col-form-label">Publish Status <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status_flag" id="status_flag1"
                                                    class="form-check-input-styled-success" value="1"
                                                    name="radio-unstyled-inline-left"
                                                    <?php echo ($status==1)?' checked':''?>>
                                                Active
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status_flag" id="status_flag2"
                                                    class="form-check-input-styled-danger" value="2"
                                                    name="radio-unstyled-inline-left"
                                                    <?php echo ($status==2)?' checked':''?>>
                                                In-active
                                            </label>

                                        </div>
                                        <div class="hidedefault validation-invalid-label mt-2" id="error_status_flag">
                                            Please select status</div>
                                    </div>

                                </div>  -->
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