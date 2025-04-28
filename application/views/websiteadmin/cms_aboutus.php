<!DOCTYPE html>
<html lang="en">

    <head>
        <?php $this->load->view('websiteadmin/inc_metacss');?>
 
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
                                <a href="<?php echo site_url($controller); ?>" class="breadcrumb-item"><span class="breadcrumb-item "><?php echo (isset($title)) ? $title : '' ?></span></a>
                                <span class="breadcrumb-item active"><?php echo (isset($sub_heading)) ? $sub_heading : '' ?></span>
                            </div>
                            <!-- <i href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> -->
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
                    <!-- Basic datatable -->


                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title "><?php echo (isset($sub_heading)) ? $sub_heading : '' ?> </h5>
                        </div>
                        <div class="card-body">
                            <form name="frm-edit" id="frm-edit" action="<?php echo site_url($controller . '/'.$fun_name) ?>" method="post" enctype="multipart/form-data"  >
                                <input type="hidden" name="mode" id="mode" value="submitform">
                                <input type="hidden" name="section" id="section" value="<?php echo isset($records['section']) ? $records['section'] : ''; ?>">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Name<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control alhanumeric1 maxlength-textarea" maxlength="200" name="heading" id="heading" value="<?php echo isset($records['heading']) ? $records['heading'] : ''; ?>" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="detail_mini">Details (mini):</label>
                                    <div class="col-lg-9">
                                    <textarea rows="2" cols="3" class="form-control " placeholder="Details (mini)" id="detail_mini" name="detail_mini"><?php echo isset($records['detail_mini'])?$this->common->getDbValue($records['detail_mini']):''; ?></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="details">Details :<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                    <textarea rows="15" cols="3" class="form-control summernote" placeholder="details" id="details" name="details"><?php echo isset($records['details'])?$this->common->getDbValue($records['details']):''; ?></textarea>

                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="box1">Box 1 :<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                    <textarea rows="3" cols="3" class="form-control  " placeholder="box1" id="box1" name="box1"><?php echo isset($records['box1'])?$this->common->getDbValue($records['box1']):''; ?></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="box2">Box 2 :<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                    <textarea rows="3" cols="3" class="form-control  " placeholder="box2" id="box2" name="box2"><?php echo isset($records['box2'])?$this->common->getDbValue($records['box2']):''; ?></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="box3">Box 3 :<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                    <textarea rows="3" cols="3" class="form-control  " placeholder="box3" id="box3" name="box3"><?php echo isset($records['box3'])?$this->common->getDbValue($records['box3']):''; ?></textarea>

                                    </div>
                                </div>
                                <div class="form-group  hideall   row">
                                <?php
                                
                                      $main_image = (isset($records['main_image']) && $records['main_image']!="") ? base_url()."../uploads/cms/".$records['main_image'] : 'http://www.placehold.it/200x30/EFEFEF/AAAAAA&amp;text=no+image'; ;
                                    ?>
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-10">
                                        <div class="row col-md-5">
                                            <img src="<?php echo $main_image?>" id="temppreviewimageki1" class="temppreviewimageki1" style="width:200px; height:auto;display:none1">
                                          
                                        </div>
                                        <div class="row col-md-6">

                                            <div class="input-group image-preview1">

                                                <input type="text" class="form-control image-preview-filename1" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                <span class="input-group-btn">
                                                    <!-- image-preview-clear button -->
                                                    <button type="button" class="btn btn-default image-preview-clear image-preview-clear1" style="display:none;" id=1>
                                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                                    </button>
                                                    <!-- image-preview-input -->
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span class="image-preview-input-title image-preview-input-title1">Browse</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif" class="browseimage" id="1" name="main_image" /> <!-- rename it -->

                                                    </div>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Image Size 1400px(width) 700px(height)</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2"></label>
                                    <div class="col-lg-9">
                                        <button type="submit" class="btn bg-blue">Submit <i class="icon-paperplane ml-2"></i></button>
                                        
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


                
               /*  if (!$("#details").val()) {
                    isError = true;
                    //$("#error_name").show()
                    $("#details").addClass("border-danger");

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

            $(".hideall").hide();




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

        // Control editor height
         $('.summernote').summernote({
            height: 400
        }); 
        // TableManageButtons.init();
        </script>
    </body>

</html>