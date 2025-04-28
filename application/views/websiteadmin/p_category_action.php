<!DOCTYPE html>
<html lang="en">

    <head>
    <script>
		var st_url = "<?php echo site_url()?>/";
		</script>  
        <?php $this->load->view('websiteadmin/inc_metacss');?>
        <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
        
    
    
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
                            <a href="<?php echo site_url($controller . "/".$listfun); ?>" class="breadcrumb-elements-item">
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
$error = (isset($error_msg))?$error_msg:'';
if ($error!="") {
    ?>
                        <div class="alert bg-warning text-white alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            <span class="font-weight-semibold">Error! </span> <?php echo $error ?>
                        </div>
                        <?php }?>

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

                        <!-- Text inputs -->

                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"><?php echo (isset($sub_heading)) ? $sub_heading : '' ?></h5>
                            <div class="header-elements">

                            </div>
                        </div>

                        <div class="card-body">
                            
                            <form name="frm-edit" id="frm-edit" action="<?php echo site_url($controller . '/'.$fun_name) ?>" method="post" enctype="multipart/form-data"  >
                                <input type="hidden" name="mode" id="mode" value="submitform">
                                <input type="hidden" name="name_title_old" id="name_title_old" value="<?php echo isset($records['name_title']) ? $records['name_title'] : ''; ?>">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="name_title">Name<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control alhanumeric1 maxlength-textarea" maxlength="200" name="name_title" id="name_title" value="<?php echo isset($records['name_title']) ? $records['name_title'] : ''; ?>" placeholder="Name">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description_mini">Details  <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                    <textarea rows="3" cols="3" class="form-control summernote1" placeholder="Details " id="description_mini" name="description_mini"><?php echo isset($records['description_mini'])?$this->common->getDbValue($records['description_mini']):''; ?></textarea>
                                    </div>
                                </div>  

                                <div class="form-group row">
                                <?php
                                
                                      $main_image = (isset($records['main_image']) && $records['main_image']!="") ? base_url()."../uploads/product/".$records['main_image'] : 'http://www.placehold.it/70x70/EFEFEF/AAAAAA&amp;text=no+image'; ;
                                    ?>
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-10">
                                        <div class="row col-md-5">
                                            <img src="<?php echo $main_image?>" id="temppreviewimageki1" class="temppreviewimageki1" style="width:70px; height:auto;display:none1">
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
                                            <span class="form-text text-muted">Image Size 400px(width) 400px(height)</span>

                                        </div>
                                    </div>
                                </div>
                                
                               <!--  <div class="form-group row">
                                <?php
                                
                                    //  $breadcum_image = (isset($records['breadcum_image']) && $records['breadcum_image']!="") ? base_url()."../uploads/product/".$records['breadcum_image'] : 'http://www.placehold.it/70x70/EFEFEF/AAAAAA&amp;text=no+image'; ;
                                    ?>
                                    <label class="col-md-2 control-label">Breadcrumb image</label>
                                    <div class="col-md-10">
                                        <div class="row col-md-5">
                                            <img src="<?php echo $breadcum_image?>" id="temppreviewimageki2" class="temppreviewimageki2" style="width:70px; height:auto;display:none1">
                                        </div>
                                        <div class="row col-md-6">

                                            <div class="input-group image-preview2">

                                                <input type="text" class="form-control image-preview-filename2" disabled="disabled">  
                                                <span class="input-group-btn">
                                                  
                                                    <button type="button" class="btn btn-default image-preview-clear image-preview-clear2" style="display:none;" id=2>
                                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                                    </button>
                                                   
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span class="image-preview-input-title image-preview-input-title2">Browse</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif" class="browseimage" id="2" name="breadcum_image" />  

                                                    </div>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Image Size 400px(width) 400px(height)</span>

                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="meta_title">Meta Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control alhanumeric1 maxlength-textarea" maxlength="256" name="meta_title" id="meta_title" value="<?php echo isset($records['meta_title']) ? $records['meta_title'] : ''; ?>" placeholder="Meta title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="meta_keywords">Meta Keywords</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control alhanumeric1 maxlength-textarea" maxlength="256" name="meta_keywords" id="meta_keywords" value="<?php echo isset($records['meta_keywords']) ? $records['meta_keywords'] : ''; ?>" placeholder="Meta Keywords">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="meta_description">Meta Description</label>
                                    <div class="col-lg-10">
                                    <textarea rows="2" cols="3" class="form-control summernote1" placeholder="Details " id="meta_description" name="meta_description"><?php echo isset($records['meta_description'])?$this->common->getDbValue($records['meta_description']):''; ?></textarea>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"  for="sort_no">Sort Order <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class=" row">
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control " placeholder="Sort Order" name="sort_no" id="sort_no" value="<?php echo isset($records['sort_no']) ? $records['sort_no'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php
                                      $status = isset($records['status_flag']) ? $records['status_flag'] : '1'; ;
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
                                <div class="form-group row">
                                    <?php
                                      $page_template_type = isset($records['page_template_type']) ? $records['page_template_type'] : 'Image'; ;
                                    ?>
                                    <label class="col-lg-2 col-form-label">Front Template <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="page_template_type" id="page_template_type1" class="form-check-input-styled-success" value="Image" name="radio-unstyled-inline-left" <?php echo ($page_template_type=='Image')?' checked':''?>>
                                                With Image
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="page_template_type" id="page_template_type2" class="form-check-input-styled-danger" value="Table" name="radio-unstyled-inline-left" <?php echo ($page_template_type=='Table')?' checked':''?>>
                                              Table
                                            </label>

                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="page_template_type" id="page_template_type3" class="form-check-input-styled-info" value="List" name="radio-unstyled-inline-left" <?php echo ($page_template_type=='List')?' checked':''?>>
                                               List
                                            </label>

                                        </div>
                                        <div class="hidedefault validation-invalid-label mt-2" id="error_page_template_type">Please select Front Template</div>
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
            
            if (!$("#name_title").val()) {
                isError = true;

                $("#name_title").addClass("border-danger");

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