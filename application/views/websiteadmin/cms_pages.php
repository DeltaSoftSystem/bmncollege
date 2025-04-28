<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('websiteadmin/inc_metacss');?>
    <link href="<?php echo base_url() ?>assets/css/fontawesome-v5.7.2-pro.min.css" rel="stylesheet" type="text/css">

    <script src="<?php echo base_url() ?>global_assets/js/demo_pages/datatables_responsive.js"></script>
    <script src="<?php echo base_url() ?>global_assets/js/plugins/notifications/bootbox.min.js"></script>

    <style>
    /*multiple img upload css end*/

    .trans-list-para-postcode.add-photos-main-section span {
        position: relative;
        right: auto;
    }

    .upload-photo {
        float: left;
        margin: 0 20px 20px 0;
        overflow: hidden;
        position: relative;
        width: 225px;
        height: 187px;
    }

    .upload-photo>img {
        border: 1px solid #c6d1d5;
        text-align: center;
        width: 100%;
        height: 100%;
    }

    .upload-photo:hover {
        background-color: #f8f8f8;
        opacity: 0.8;
        filter: alpha(opacity=80);
        transition: all 0.4s ease-in-out 0s;
    }

    .upload-photo:hover .upload-close {
        opacity: 1;
        filter: alpha(opacity=100);
        cursor: pointer;
        transition: all 0.4s ease-in-out 0s;
    }

    .upload_pic_btn {
        cursor: pointer;
        font-size: 14px;
        left: 0;
        margin: 0;
        opacity: 0;
        padding: 0;
        position: absolute;
        right: 0;
        top: 0;
        height: 100% !important;
        width: 100%;
    }

    .trans-list-para-postcode.add-photos-main-section .upload-close {
        text-align: center;
        color: #e05e14;
        font-size: 14px;
        opacity: 0;
        position: absolute;
        z-index: 9999;
        top: 0;
    }

    .upload-photo:hover .upload-close {
        padding: 77px 0;
        cursor: pointer;
        opacity: 1;
        transition: all 0.4s ease-in-out 0s;
        background: rgba(38, 43, 104, 0.6);
        display: block;
        height: 100%;
        width: 100%;
    }

    .upload-close>a {
        background: #fff;
        border-radius: 50%;
        color: #e05e14;
        display: block;
        font-size: 19px;
        height: 38px;
        margin: 0 auto;
        padding-top: 6px;
        width: 38px;
    }

    .fa.fa-times-circle {
        color: #e05e14;
        font-size: 18px;
    }

    /*multiple img upload css end*/
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
                        <input type="hidden" name="section" id="section" value="<?php echo $section?>">

                        <?php
                         if($section=='aboutus'){

                           $page = (!empty($records['aboutus'])) ? json_decode($records['aboutus'],true) : array();
                           // print_r($aboutus);
                           
                         ?>

                        <form name="frm-edit" id="frm-edit" action="<?php echo site_url($controller . '/'.$fun_name) ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="aboutus">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="breadcrumbs">Breadcrumbs </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="breadcrumbs" id='breadcrumbs' placeholder=""
                                        type="text"
                                        value="<?php echo (!empty($resultdata['breadcrumbs'])) ? $resultdata['breadcrumbs'] : ''?>"
                                        required>

                                </div>
                            </div>
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-home2  mr-2"></i> Section 1</legend>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box1][heading]" id='heading'
                                            placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                            value="<?php echo (!empty($page['box1']['heading'])) ? $page['box1']['heading'] : ''?>"
                                            required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control " rows="7" name="page[box1][description]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="description"
                                            required><?php echo (!empty($page['box1']['description'])) ? $page['box1']['description'] : ''?></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php
                                
                                      $main_image = (!empty($page['box1']['image1'])) ? base_url()."../".$page['box1']['image1'] : 'https://via.placeholder.com/150x150'; ;

                                    ?>
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-10">
                                        <input type="hidden" name="page[box1][image1]" id="mainimage71"
                                            value="<?php echo  (!empty($page['box1']['image1'])) ? $page['box1']['image1'] : ''; ?>"
                                            placeholder="">
                                        <div class="row col-md-5">
                                            <img src="<?php echo $main_image?>" id="temppreviewimageki71"
                                                class="temppreviewimageki71"
                                                style="width:200px; height:auto;display:none1">

                                        </div>
                                        <div class="row col-md-12">

                                            <div class="input-group image-preview71">

                                                <input type="text" class="form-control image-preview-filename71"
                                                    disabled="disabled">
                                                <!-- don't give a name === doesn't send on POST/GET -->
                                                <span class="input-group-btn">
                                                    <!-- image-preview-clear button -->
                                                    <button type="button"
                                                        class="btn btn-default image-preview-clear image-preview-clear71"
                                                        style="display:none;" id=71>
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                        Clear
                                                    </button>
                                                    <!-- image-preview-input -->
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span
                                                            class="image-preview-input-title image-preview-input-title71">Browse</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif"
                                                            class="browseimage" id="71" name="page[box1][image1]" />
                                                        <!-- rename it -->

                                                    </div>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Image Size
                                                560px(width)
                                                283px(height)</span>

                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-pencil5 mr-2"></i> Section 2
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box2][heading]" id='heading'
                                            placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                            value="<?php echo (!empty($page['box2']['heading'])) ? $page['box2']['heading'] : ''?>"
                                            required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control " rows="7" name="page[box2][description]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="description"
                                            required><?php echo (!empty($page['box2']['description'])) ? $page['box2']['description'] : ''?></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php
                                
                                      $main_image = (!empty($page['box2']['image1'])) ? base_url()."../".$page['box2']['image1'] : 'https://via.placeholder.com/150x150'; ;

                                    ?>
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-10">
                                        <input type="hidden" name="page[box2][image1]" id="mainimage72"
                                            value="<?php echo  (!empty($page['box2']['image1'])) ? $page['box2']['image1'] : ''; ?>"
                                            placeholder="">
                                        <div class="row col-md-5">
                                            <img src="<?php echo $main_image?>" id="temppreviewimageki72"
                                                class="temppreviewimageki72"
                                                style="width:200px; height:auto;display:none1">

                                        </div>
                                        <div class="row col-md-12">

                                            <div class="input-group image-preview72">

                                                <input type="text" class="form-control image-preview-filename72"
                                                    disabled="disabled">
                                                <!-- don't give a name === doesn't send on POST/GET -->
                                                <span class="input-group-btn">
                                                    <!-- image-preview-clear button -->
                                                    <button type="button"
                                                        class="btn btn-default image-preview-clear image-preview-clear72"
                                                        style="display:none;" id=72>
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                        Clear
                                                    </button>
                                                    <!-- image-preview-input -->
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span
                                                            class="image-preview-input-title image-preview-input-title72">Browse</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif"
                                                            class="browseimage" id="72" name="page[box2][image1]" />
                                                        <!-- rename it -->

                                                    </div>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Image Size
                                                560px(width)
                                                283px(height)</span>

                                        </div>
                                    </div>
                                </div>
                                <fieldset>
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-pencil5 mr-2"></i> Section 3
                                        </legend>
                                        <div class="form-group trans-list-para-postcode add-photos-main-section">
                                            <label>Add Photos</label>
                                            <div class="add-photos-main-section-images">
                                                <span data-multiupload="1">
                                                    <span data-multiupload-holder></span>
                                                    <?php
                            //  print_r($consignmentimage_temp);
                                if(isset($wti_cms_pages_images) && sizeof($wti_cms_pages_images) > 0) { 
                                    foreach($wti_cms_pages_images as $key => $val){
                                        if(isset($val['id'])){
                                            $folder_path = "../uploads/cms/pages/";
                                        } else {
                                            $folder_path = "../uploads/cms/pages/";
                                        }
                                ?>
                                                    <div class="upload-photo"
                                                        id="multiupload_img_1_<?php echo $val['id']?>"><span
                                                            class="upload-close"><a href="javascript:void(0)"
                                                                onclick="bindRemoveMultiUpload_new('<?php echo $val['id']?>')"
                                                                id="multiupload_img_remove1_<?php echo $val['id']?>"><i
                                                                    class="fal fa-trash-alt"></i></a></span><img
                                                            src="<?php echo base_url();?><?php echo $folder_path?><?php echo $val['image_name']?>">
                                                    </div>
                                                    <?php    }
                                    }
                                ?>
                                                    <span class="upload-photo">
                                                        <img src="<?php echo base_url() ?>global_assets/images/multi-images-main-img.jpg"
                                                            alt="plus img">
                                                        <input data-multiupload-src class="upload_pic_btn" type="file"
                                                            multiple="">
                                                        <span data-multiupload-fileinputs></span>
                                                    </span>

                                                </span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2"></label>
                                        <div class="col-lg-9">
                                            <button type="submit" class="btn bg-blue">Submit <i
                                                    class="icon-paperplane ml-2"></i></button>

                                        </div>
                                    </div>

                        </form>
                        <?php }
                         ?>

                        <?php
                         
                         if($section=='formulation'){

                            $page = (!empty($records['formulation'])) ? json_decode($records['formulation'],true) : array();
                            // print_r($formulation);    

                      
                         
                       ?>

                        <form name="frm-edit" id="frm-edit" action="<?php echo site_url($controller . '/'.$fun_name) ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="formulation">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="breadcrumbs">Breadcrumbs </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="breadcrumbs" id='breadcrumbs' placeholder=""
                                        type="text"
                                        value="<?php echo (!empty($resultdata['breadcrumbs'])) ? $resultdata['breadcrumbs'] : ''?>"
                                        required>

                                </div>
                            </div>
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-home2  mr-2"></i> Section 1</legend>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box1][heading]" id='heading'
                                            placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                            value="<?php echo (!empty($page['box1']['heading'])) ? $page['box1']['heading'] : ''?>"
                                            required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control " rows="7" name="page[box1][description]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="description"
                                            required><?php echo (!empty($page['box1']['description'])) ? $page['box1']['description'] : ''?></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php
                              
                                    $main_image = (!empty($page['box1']['image1'])) ? base_url()."../".$page['box1']['image1'] : 'https://via.placeholder.com/150x150'; ;

                                  ?>
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-10">
                                        <input type="hidden" name="page[box1][image1]" id="mainimage71"
                                            value="<?php echo  (!empty($page['box1']['image1'])) ? $page['box1']['image1'] : ''; ?>"
                                            placeholder="">
                                        <div class="row col-md-5">
                                            <img src="<?php echo $main_image?>" id="temppreviewimageki71"
                                                class="temppreviewimageki71"
                                                style="width:200px; height:auto;display:none1">

                                        </div>
                                        <div class="row col-md-12">

                                            <div class="input-group image-preview71">

                                                <input type="text" class="form-control image-preview-filename71"
                                                    disabled="disabled">
                                                <!-- don't give a name === doesn't send on POST/GET -->
                                                <span class="input-group-btn">
                                                    <!-- image-preview-clear button -->
                                                    <button type="button"
                                                        class="btn btn-default image-preview-clear image-preview-clear71"
                                                        style="display:none;" id=71>
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                        Clear
                                                    </button>
                                                    <!-- image-preview-input -->
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span
                                                            class="image-preview-input-title image-preview-input-title71">Browse</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif"
                                                            class="browseimage" id="71" name="page[box1][image1]" />
                                                        <!-- rename it -->

                                                    </div>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Image Size
                                                560px(width)
                                                283px(height)</span>

                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-pencil5 mr-2"></i> Section 2
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box2][heading]" id='heading'
                                            placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                            value="<?php echo (!empty($page['box2']['heading'])) ? $page['box2']['heading'] : ''?>"
                                            required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control " rows="7" name="page[box2][description]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="description"
                                            required><?php echo (!empty($page['box2']['description'])) ? $page['box2']['description'] : ''?></textarea>

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
                        <?php }
                         ?>

                        <?php
                         
                         if($section=='contract-manufacturing'){

                            $page = (!empty($records['contract-manufacturing'])) ? json_decode($records['contract-manufacturing'],true) : array();
                            // print_r($contract-manufacturing);    

                      
                         
                       ?>

                        <form name="frm-edit" id="frm-edit" action="<?php echo site_url($controller . '/'.$fun_name) ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="contract-manufacturing">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="breadcrumbs">Breadcrumbs </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="breadcrumbs" id='breadcrumbs' placeholder=""
                                        type="text"
                                        value="<?php echo (!empty($resultdata['breadcrumbs'])) ? $resultdata['breadcrumbs'] : ''?>"
                                        required>

                                </div>
                            </div>
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-home2  mr-2"></i> Section 1</legend>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box1][heading]" id='heading'
                                            placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                            value="<?php echo (!empty($page['box1']['heading'])) ? $page['box1']['heading'] : ''?>"
                                            required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control " rows="7" name="page[box1][description]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="description"
                                            required><?php echo (!empty($page['box1']['description'])) ? $page['box1']['description'] : ''?></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php
                              
                                    $main_image = (!empty($page['box1']['image1'])) ? base_url()."../".$page['box1']['image1'] : 'https://via.placeholder.com/150x150'; ;

                                  ?>
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-10">
                                        <input type="hidden" name="page[box1][image1]" id="mainimage71"
                                            value="<?php echo  (!empty($page['box1']['image1'])) ? $page['box1']['image1'] : ''; ?>"
                                            placeholder="">
                                        <div class="row col-md-5">
                                            <img src="<?php echo $main_image?>" id="temppreviewimageki71"
                                                class="temppreviewimageki71"
                                                style="width:200px; height:auto;display:none1">

                                        </div>
                                        <div class="row col-md-12">

                                            <div class="input-group image-preview71">

                                                <input type="text" class="form-control image-preview-filename71"
                                                    disabled="disabled">
                                                <!-- don't give a name === doesn't send on POST/GET -->
                                                <span class="input-group-btn">
                                                    <!-- image-preview-clear button -->
                                                    <button type="button"
                                                        class="btn btn-default image-preview-clear image-preview-clear71"
                                                        style="display:none;" id=71>
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                        Clear
                                                    </button>
                                                    <!-- image-preview-input -->
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span
                                                            class="image-preview-input-title image-preview-input-title71">Browse</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif"
                                                            class="browseimage" id="71" name="page[box1][image1]" />
                                                        <!-- rename it -->

                                                    </div>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Image Size
                                                560px(width)
                                                283px(height)</span>

                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-pencil5 mr-2"></i> Section 2
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box2][heading]" id='heading'
                                            placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                            value="<?php echo (!empty($page['box2']['heading'])) ? $page['box2']['heading'] : ''?>"
                                            required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control " rows="7" name="page[box2][description]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="description"
                                            required><?php echo (!empty($page['box2']['description'])) ? $page['box2']['description'] : ''?></textarea>

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
                        <?php }
                         ?>


                        <?php
                         
                         if($section=='research-dev' || $section=='manufacturing-capability' || $section=='business-development' || $section=='careers'){

                            $page = (!empty($records[$section])) ? json_decode($records[$section],true) : array();
                            // print_r($research-dev);    

                      
                         
                       ?>

                        <form name="frm-edit" id="frm-edit" action="<?php echo site_url($controller . '/'.$fun_name) ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="<?php echo $section?>">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="breadcrumbs">Breadcrumbs </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="breadcrumbs" id='breadcrumbs' placeholder=""
                                        type="text"
                                        value="<?php echo (!empty($resultdata['breadcrumbs'])) ? $resultdata['breadcrumbs'] : ''?>"
                                        required>

                                </div>
                            </div>

                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-home2  mr-2"></i> Section 1</legend>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box1][heading]" id='heading'
                                            placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                            value="<?php echo (!empty($page['box1']['heading'])) ? $page['box1']['heading'] : ''?>">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control " rows="7" name="page[box1][description]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="description"
                                            required><?php echo (!empty($page['box1']['description'])) ? $page['box1']['description'] : ''?></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php
                              
                                    $main_image = (!empty($page['box1']['image1'])) ? base_url()."../".$page['box1']['image1'] : 'https://via.placeholder.com/150x150'; ;

                                  ?>
                                    <label class="col-md-2 control-label">Image</label>
                                    <div class="col-md-10">
                                        <input type="hidden" name="page[box1][image1]" id="mainimage71"
                                            value="<?php echo  (!empty($page['box1']['image1'])) ? $page['box1']['image1'] : ''; ?>"
                                            placeholder="">
                                        <div class="row col-md-5">
                                            <img src="<?php echo $main_image?>" id="temppreviewimageki71"
                                                class="temppreviewimageki71"
                                                style="width:200px; height:auto;display:none1">

                                        </div>
                                        <div class="row col-md-12">

                                            <div class="input-group image-preview71">

                                                <input type="text" class="form-control image-preview-filename71"
                                                    disabled="disabled">
                                                <!-- don't give a name === doesn't send on POST/GET -->
                                                <span class="input-group-btn">
                                                    <!-- image-preview-clear button -->
                                                    <button type="button"
                                                        class="btn btn-default image-preview-clear image-preview-clear71"
                                                        style="display:none;" id=71>
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                        Clear
                                                    </button>
                                                    <!-- image-preview-input -->
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span
                                                            class="image-preview-input-title image-preview-input-title71">Browse</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif"
                                                            class="browseimage" id="71" name="page[box1][image1]" />
                                                        <!-- rename it -->

                                                    </div>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Image Size
                                                560px(width)
                                                283px(height)</span>

                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-pencil5 mr-2"></i> Section 2
                                </legend>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box2][heading]" id='heading'
                                            placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                            value="<?php echo (!empty($page['box2']['heading'])) ? $page['box2']['heading'] : ''?>">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control " rows="10" name="page[box2][description]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="description"
                                            required><?php echo (!empty($page['box2']['description'])) ? $page['box2']['description'] : ''?></textarea>

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
                        <?php }
                         ?>

                        <?php   //|| $section=='cookies' 
                         
                         if($section=='privacy-policy' || $section=='terms-conditions'  || $section=='accessibility' ){

                            $page = (!empty($records[$section])) ? json_decode($records[$section],true) : array();
                            // print_r($research-dev);    

                      
                         
                       ?>

                        <form name="frm-edit" id="frm-edit" action="<?php echo site_url($controller . '/'.$fun_name) ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="<?php echo $section?>">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="breadcrumbs">Breadcrumbs </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="breadcrumbs" id='breadcrumbs' placeholder=""
                                        type="text"
                                        value="<?php echo (!empty($resultdata['breadcrumbs'])) ? $resultdata['breadcrumbs'] : ''?>"
                                        required>

                                </div>
                            </div>
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-home2  mr-2"></i> Section 1</legend>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box1][heading]" id='heading'
                                            placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                            value="<?php echo (!empty($page['box1']['heading'])) ? $page['box1']['heading'] : ''?>">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control " rows="15" name="page[box1][description]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="description"
                                            required><?php echo (!empty($page['box1']['description'])) ? $page['box1']['description'] : ''?></textarea>

                                    </div>
                                </div>

                            </fieldset>


                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn bg-blue">Submit <i
                                            class="icon-paperplane ml-2"></i></button>

                                </div>
                            </div>

                        </form>
                        <?php }
                         ?>
                        <?php   //|| $section=='cookies' 
                         
                         if($section=='cookies'){

                            $page = (!empty($records[$section])) ? json_decode($records[$section],true) : array();
                            // print_r($research-dev);    

                      
                         
                       ?>

                        <form name="frm-edit" id="frm-edit" action="<?php echo site_url($controller . '/'.$fun_name) ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="<?php echo $section?>">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="breadcrumbs">Breadcrumbs </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="breadcrumbs" id='breadcrumbs' placeholder=""
                                        type="text"
                                        value="<?php echo (!empty($resultdata['breadcrumbs'])) ? $resultdata['breadcrumbs'] : ''?>"
                                        required>

                                </div>
                            </div>
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-home2  mr-2"></i> Section 1</legend>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box1][heading]" id='heading'
                                            placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                            value="<?php echo (!empty($page['box1']['heading'])) ? $page['box1']['heading'] : ''?>">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Detail for Page </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control " rows="15" name="page[box1][description]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="description"
                                            required><?php echo (!empty($page['box1']['description'])) ? $page['box1']['description'] : ''?></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="popup">Popup Message </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control " rows="15" name="page[box1][popup]"
                                            placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                            id="popup"
                                            value="<?php echo (!empty($page['box1']['popup'])) ? $page['box1']['popup'] : ''?>"
                                            required>

                                    </div>
                                </div>

                            </fieldset>


                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn bg-blue">Submit <i
                                            class="icon-paperplane ml-2"></i></button>

                                </div>
                            </div>

                        </form>
                        <?php }
                         ?>

                        <?php
                         
                         if($section=='contactus' ){

                            $page = (!empty($records[$section])) ? json_decode($records[$section],true) : array();
                            // print_r($research-dev);    
                       ?>

                        <form name="frm-edit" id="frm-edit" action="<?php echo site_url($controller . '/'.$fun_name) ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="mode" id="mode" value="<?php echo $section?>">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="breadcrumbs">Breadcrumbs </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="breadcrumbs" id='breadcrumbs' placeholder=""
                                        type="text"
                                        value="<?php echo (!empty($resultdata['breadcrumbs'])) ? $resultdata['breadcrumbs'] : ''?>"
                                        required>

                                </div>
                            </div>
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-home2  mr-2"></i> Section 1</legend>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box1][heading]" id='heading'
                                            placeholder="Have a question? Please get in touch with us." type="text"
                                            value="<?php echo (!empty($page['box1']['heading'])) ? $page['box1']['heading'] : ''?>">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="formheading1">Form Heading1 </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box1][formheading1]" id='formheading1'
                                            placeholder="Let us help you" type="text"
                                            value="<?php echo (!empty($page['box1']['formheading1'])) ? $page['box1']['formheading1'] : ''?>">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="formheading2">Form Heading2 </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="page[box1][formheading2]" id='formheading2'
                                            placeholder="Fill out the below form, and someone will be in touch with you soon."
                                            type="text"
                                            value="<?php echo (!empty($page['box1']['formheading2'])) ? $page['box1']['formheading2'] : ''?>">

                                    </div>
                                </div>


                            </fieldset>


                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn bg-blue">Submit <i
                                            class="icon-paperplane ml-2"></i></button>

                                </div>
                            </div>

                        </form>
                        <?php }
                         ?>
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

                location.href = "<?php echo site_url($controller . '/banner_action_delete/') ?>" +
                    uuid;


            }
        }
    });
});
</Script>
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


// Always show badge
$('.maxlength-textarea').maxlength({
    alwaysShow: true
});
// TableManageButtons.init();

//dropzone script with multiple files
(function($) {
    function readMultiUploadURL(input, callback) {
        if (input.files) {
            $.each(input.files, function(index, file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    callback(false, e.target.result);
                }
                reader.readAsDataURL(file);
            });
        }
        callback(true, false);
    }
    var arr_multiupload = $("span[data-multiupload]");
    if (arr_multiupload.length > 0) {
        $.each(arr_multiupload, function(index, elem) {
            var container_id = $(elem).attr("data-multiupload");
            var id_multiupload_img = "multiupload_img_" + container_id + "_";
            var id_multiupload_img_remove = "multiupload_img_remove" + container_id + "_";
            var id_multiupload_file = id_multiupload_img + "_file";
            var block_multiupload_src = "data-multiupload-src-" + container_id;
            var block_multiupload_holder = "data-multiupload-holder-" + container_id;
            var block_multiupload_fileinputs = "data-multiupload-fileinputs-" + container_id;
            var input_src = $(elem).find("input[data-multiupload-src]");
            $(input_src).removeAttr('data-multiupload-src')
                .attr(block_multiupload_src, "");
            var block_img_holder = $(elem).find("span[data-multiupload-holder]");
            $(block_img_holder).removeAttr('data-multiupload-holder')
                .attr(block_multiupload_holder, "");
            var block_fileinputs = $(elem).find("span[data-multiupload-fileinputs]");
            $(block_fileinputs).removeAttr('data-multiupload-fileinputs')
                .attr(block_multiupload_fileinputs, "");
            $(input_src).on('change', function(event) {
                readMultiUploadURL(event.target, function(has_error, img_src) {
                    if (has_error == false) {
                        addImgToMultiUpload(img_src);
                    }
                })
            });

            function addImgToMultiUpload(img_src) {

                var id = Math.random().toString(36).substring(2, 10);
                var section = $("#section").val();

                console.log(section);
                $.post('<?php echo site_url('cms/doAddimage')?>', {
                        img_src: img_src,
                        img_id: id,
                        section: section
                    },
                    function(data) {

                    });



                var html = '<div class="upload-photo" id="' + id_multiupload_img + id + '">' +
                    '<span class="upload-close">' +
                    '<a href="javascript:void(0)" id="' + id_multiupload_img_remove + id +
                    '" ><i class="fal fa-trash-alt"></i></a>' +
                    '</span>' +
                    '<img src="' + img_src + '" >' +
                    '</div>';
                var file_input = '<input type="file" name="file[]" id="' + id_multiupload_file + id +
                    '" style="display:none" />';
                $(block_img_holder).append(html);
                $(block_fileinputs).append(file_input);
                bindRemoveMultiUpload(id);
            }

            function bindRemoveMultiUpload(id) {
                $("#" + id_multiupload_img_remove + id).on('click', function() {
                    $("#" + id_multiupload_img + id).remove();
                    $("#" + id_multiupload_file + id).remove();

                    $.post('<?php echo site_url('cms/doDeletImage')?>', {

                            img_id: id
                        },
                        function(data) {
                            console.log(data);
                        });
                });
            }
        });
    }
})(jQuery);

function bindRemoveMultiUpload_new(id) {

    $("#multiupload_img_1_" + id).remove();

    $.post('<?php echo site_url('cms/doDeletImage')?>', {

            img_id: id
        },
        function(data) {
            console.log(data);
        });
}
</script>

</html>