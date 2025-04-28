<!DOCTYPE html>
<html lang="en">

<head>
    <script>
    var st_url = "<?php echo site_url()?>/";
    </script>
    <?php $this->load->view('websiteadmin/inc_metacss');?>
    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>

<style>
   .product-list-inner {
    font-size: 12px;
    color: #0D1317;
    line-height: 20px;
    border-bottom: 1px solid #EBEBEB;
    margin-bottom: 0px;
    display: flex;
}
.product-list-inner span {
    min-width: 200px;
    display: inline-block;
    font-weight: 500;
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
                            <a href="<?php echo site_url($controller . "/".$listfun); ?>"
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

                        <form name="frm-edit" id="frm-edit" action="<?php echo site_url($controller . '/'.$fun_name) ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="submitform">
                            
                            <input type="hidden" name="name_title_old" id="name_title_old"
                                value="<?php echo isset($records['name_title']) ? $records['name_title'] : ''; ?>">
                                <div class="form-group row  ">
                                <label class="col-lg-2 col-form-label" for="category_id">Select Category </label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="category_id"
                                        id="category_id"  data-fouc1>
                                        <?php
                                        
                                          $category_id  = isset($records['category_id']) ? $records['category_id'] : '0';

                                          $sql = "select * from wti_m_category where    status_flag!='Delete' and parent_id=0 order by name asc   ";
                                          $query_result_cat = $this->db->query($sql);
                                          $results_cat = $query_result_cat->result_array();
                                        ?>
                                        <?php
                                        foreach($results_cat as $key => $value) {
                                             
                                            
                                        ?>
                                        <option value="<?php echo $value['category_id']?>" <?php echo ($category_id==$value['category_id'] ? ' selected' : '')?>><?php echo $value['name']?></option>
                                            <?php
                                        
                                    }
                                    ?>
                                           
                                    </select>
                                </div>
                            </div>
                           <!-- 
                            <div class="form-group row  ">
                                <label class="col-lg-2 col-form-label" for="name_title">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                        maxlength="200" name="name_title" id="name_title"
                                        value="<?php echo isset($records['name_title']) ? $records['name_title'] : ''; ?>"
                                        placeholder="Name">
                                </div>
                            </div> -->
                            <div class="form-group row  ">
                                <label class="col-lg-2 col-form-label" for="product_heading">Product Heading</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                         name="product_heading" id="product_heading"
                                        value="<?php echo isset($records['product_heading']) ? $records['product_heading'] : ''; ?>"
                                        placeholder="Product Heading">
                                </div>
                            </div>
                            <div class="form-group row  ">
                                <label class="col-lg-2 col-form-label" for="ProductLabelInsert">Product Label & Insert</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                        maxlength="200" name="ProductLabelInsert" id="ProductLabelInsert"
                                        value="<?php echo isset($records['ProductLabelInsert']) ? $records['ProductLabelInsert'] : ''; ?>"
                                        placeholder="Product Label & Insert">
                                </div>
                            </div>
                            <div class="form-group row  ">
                                <label class="col-lg-2 col-form-label" for="DrugGroup">Drug Group</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                        maxlength="200" name="DrugGroup" id="DrugGroup"
                                        value="<?php echo isset($records['DrugGroup']) ? $records['DrugGroup'] : ''; ?>"
                                        placeholder="Drug Group">
                                </div>
                            </div>
                            <div class="form-group row  ">
                                <label class="col-lg-2 col-form-label" for="PatientMedicationGuide">Patient Medication Guide</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control alhanumeric1 maxlength-textarea"
                                        maxlength="200" name="PatientMedicationGuide" id="PatientMedicationGuide"
                                        value="<?php echo isset($records['PatientMedicationGuide']) ? $records['PatientMedicationGuide'] : ''; ?>"
                                        placeholder="Patient Medication Guide">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="importexcel">Import Xlsx File
                                    File:</label>
                                <div class="col-md-6">
                                    <input type="file" id="importexcel" name="importexcel" class="form-input-styled"
                                        accept=".xlsx" data-fouc required1>
                                    <div class="form-text text-muted">Accepted formats:  xlsx </div>
                                    <div class="form-text text-muted">* It will reads data from sheet 1 (First Sheet only)  </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <button type="button" id="btnUploadCSVSubmit" name="btnUploadCSVSubmit"
                                        class="btn btn-primary">Uplaod
                                        File <i class="icon-paperplane ml-2"></i></button>
                                </div> -->

                            </div>
                            <div class="form-group row   hideall1 Image ">
                                <?php
                                
                                      $main_image = (isset($records['main_image']) && $records['main_image']!="") ? base_url()."../uploads/product/".$records['main_image'] : 'http://www.placehold.it/70x70/EFEFEF/AAAAAA&amp;text=no+image'; ;
                                    ?>
                                <label class="col-md-2 control-label">Image</label>
                                <div class="col-md-10">
                                    <div class="row col-md-5">
                                        <img src="<?php echo $main_image?>" id="temppreviewimageki1"
                                            class="temppreviewimageki1" style="width:70px; height:auto;display:none1">
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
                                        <span class="form-text text-muted">Image Size 800px(width) 800px(height)</span>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row   hideall1 Image ">
                                <?php
                                
                                      $main_image_back = (isset($records['main_image_back']) && $records['main_image_back']!="") ? base_url()."../uploads/product/".$records['main_image_back'] : 'http://www.placehold.it/70x70/EFEFEF/AAAAAA&amp;text=no+image'; ;
                                    ?>
                                <label class="col-md-2 control-label">Image (Back)</label>
                                <div class="col-md-10">
                                    <div class="row col-md-5">
                                        <img src="<?php echo $main_image_back?>" id="temppreviewimageki2"
                                            class="temppreviewimageki2" style="width:70px; height:auto;display:none1">
                                    </div>
                                    <div class="row col-md-6">

                                        <div class="input-group image-preview2">

                                            <input type="text" class="form-control image-preview-filename2"
                                                disabled="disabled">
                                            <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button"
                                                    class="btn btn-default image-preview-clear image-preview-clear2"
                                                    style="display:none;" id=2>
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span
                                                        class="image-preview-input-title image-preview-input-title2">Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif"
                                                        class="browseimage" id="2" name="main_image_back" />
                                                    <!-- rename it -->

                                                </div>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">Image Size 800px(width) 800px(height)</span>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="position">SDS Download </label>
                                <div class="col-lg-10">
                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <input type="file" id="SDS" name="SDS"
                                                class="form-control-uniform" data-fouc1>
                                            <span class="form-text text-muted">Accepted formats: pdf </span>

                                            <?php
                                
                                $SDS = (isset($records['SDS']) && $records['SDS']!="") ? base_url()."../uploads/product/".$records['SDS'] : '' ;
                                                if($SDS!=""){
                              ?>
                                            <span class="form-text text-muted">Current File: <a
                                                    href="<?php echo $SDS?>" target="_blank">View</a> </span>
                                            <?php }?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="HDASheet">HDA Sheet Download </label>
                                <div class="col-lg-10">
                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <input type="file" id="HDASheet" name="HDASheet"
                                                class="form-control-uniform" data-fouc1>
                                            <span class="form-text text-muted">Accepted formats: pdf </span>

                                            <?php
                                
                                $HDASheet = (isset($records['HDASheet']) && $records['HDASheet']!="") ? base_url()."../uploads/product/".$records['HDASheet'] : '' ;
                                                if($HDASheet!=""){
                              ?>
                                            <span class="form-text text-muted">Current File: <a
                                                    href="<?php echo $HDASheet?>" target="_blank">View</a> </span>
                                            <?php }?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="sort_no">Sort Order </label>
                                <div class="col-lg-10">
                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control " placeholder="Sort Order"
                                                name="sort_no" id="sort_no"
                                                value="<?php echo isset($records['sort_no']) ? $records['sort_no'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <?php
                                      $status = isset($records['status_flag']) ? $records['status_flag'] : 'Active'; ;
                                    ?>
                                <label class="col-lg-2 col-form-label">Publish Status </label>
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
                                <label class="col-form-label col-lg-2"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn bg-blue">Submit <i
                                            class="icon-paperplane ml-2"></i></button>

                                </div>
                            </div>
                            <span class="form-text text-muted">* All Labels and Values Like Product Name, Pronunciation,Strength,Size, NDC etc will be automatic comes excel file  </span>
                        </form>
                    </div>

                    <!-- /text inputs -->
                </div>
                <!-- /table header styling -->

                <div class="card">
                    <div class="card-body">
                           <?php
                           $description = (!empty($records['description'])) ? json_decode($records['description'],true) : array();
                         //  print_r($description);
                           if(count($description)>0){
                           foreach($description as $key => $value){
                            ?>
                            <p class="product-list-inner"><span><?php echo $value['key_value']?>:</span> <?php echo $value['value_data']?></p>
                            <?php
                           }
                        }
                           ?>  
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

</body>
<!-- Remove modal -->
 
<!-- /remove modal -->
<script>
$(document).ready(function() {


    // File input
    // Initialize
    $('.form-input-styled').uniform({
        fileButtonClass: 'action btn bg-pink-400'
    });
   

});
</script>
<script>
$(document).ready(function() {
    $(".hideall").hide();


     

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
        /* if (!$("#category_id").val()) {
            isError = true;
            $("#category_id").addClass("border-danger");
        } */
        if (!$("#name_title").val()) {
            isError = true;
            $("#name_title").addClass("border-danger");

        }

 
/* 
        //frd_email
        if (isError) {
            return false;
        } else {
            //   $("#frm-edit").submit();
            return true;
        }

        return false; */
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
//category_id


/* setTimeout(function(){
    var edit_category_id = $("#edit_category_id").val(); //for edit
    if(edit_category_id>0){
    $("#category_id").val(edit_category_id).trigger("change");
    }
},1000); */
</script>

</html>