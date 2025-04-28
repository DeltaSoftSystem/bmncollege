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

                <!-- Page length options -->
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
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Add Gallery</h5>
                    </div>


                    <div class="card-body">

                        <form class="form-horizontal" id="blogform1" name="blogform1" method="post"
                            action="<?php echo site_url($controller.'/'.$fun_name)?>" enctype="multipart/form-data">
                            <input type="hidden" name="mode_add" id="mode_add" value="add_att">



                            <div class="form-group row">
                                <?php
                                      $slider_image = (isset($records['slider_image']) && $records['slider_image']!="") ? base_url()."uploads/gallery/".$records['slider_image'] : 'https://via.placeholder.com/100x100'; ;
                                    ?>
                                <label class="col-md-2 col-form-label"> Image</label>
                                <div class="col-md-10">
                                    <div class="row col-md-5">
                                        <img src="<?php echo $slider_image?>" id="temppreviewimageki1"
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
                                                        class="browseimage" id="1" name="slider_image" />
                                                    <!-- rename it -->

                                                </div>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">Image Size 800px(width) 360px(height)</span>

                                    </div>
                                </div>
                            </div>

                           
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="slider_text"> Name :</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                        name="slider_text" id="slider_text" maxlength="200"
                                        value="<?php echo isset($records['slider_text']) ? $records['slider_text'] : ''; ?>" placeholder="Name" required>
                                </div>
                            </div>
                            <?php
                            if($gallery_type!="recruiters"){
                             ?>  
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="post_name"> Post Name :</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                        name="post_name" id="post_name" maxlength="200"
                                        value="<?php echo isset($records['post_name']) ? $records['post_name'] : ''; ?>" placeholder="Head, Child Welfare and Education/Alpha MD as Junior Developer" required>
                                </div>
                            </div>
                            <?php   
                            }
                            ?>
                            <?php
                            if($gallery_type=="alumnae"){
                             ?>
                             <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="alumnae_type"> Alumnae Type :</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                        name="alumnae_type" id="alumnae_type" maxlength="200"
                                        value="<?php echo isset($records['alumnae_type']) ? $records['alumnae_type'] : ''; ?>" placeholder="TSAD Alumnae" required>
                                </div>
                            </div>
                             <?php   
                            }
                            ?>
                            <?php
                                      $status = isset($records['status_flag']) ? $records['status_flag'] : '1'; ;
                                    ?>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2" for="status">Status :</label>
                                <div class="col-lg-9">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled-success" value="1"
                                                name="status_flag" id="status_flag1"  <?php echo ($status==1)?' checked':''?>>
                                            Active
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled-danger" value="2"
                                                name="status_flag" id="status_flag2"  <?php echo ($status==2)?' checked':''?>>
                                            In-active
                                        </label>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn bg-blue">Save <i
                                            class="icon-paperplane ml-2"></i></button>
                                    <a href="<?php echo site_url($back_link);?>"><button type="button"
                                            class="btn btn-light" id="reset"><i class="icon-arrow-left7"></i>
                                            Back</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /page length options -->


            </div>
            <!-- /content area -->


            <!-- Footer -->
            <?php $this->load->view('websiteadmin/inc_footer');?>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
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
                $("#slider_text").val("");
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

                   
                    if($("#slider_text").val()==""){
                        var fullPath = file.name;
                        var index = fullPath.lastIndexOf("/");
                        var filename = fullPath;
                        filename = filename.split('.').slice(0, -1).join('.')
                        document.getElementById("slider_text").value = filename;
                    }
                    
                    
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