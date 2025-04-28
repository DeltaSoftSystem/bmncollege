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
                                    class="nav-link <?php (isset($tab) && $tab==1) ? 'active' : '' ?>"
                                    data-toggle1="tab">Hello
                                    Bar</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('cms/banner') ?>" class="nav-link "
                                    data-toggle1="tab">Slider</a>
                            </li>
                            <li class="nav-item"><a href="#Section-tab3"
                                    class="nav-link <?php echo (isset($tab) && $tab==3) ? 'active' : '' ?>"
                                    data-toggle="tab">Section 1
                                    (Box 3)</a></li>
                            <li class="nav-item"><a href="#Section-tab4"
                                    class="nav-link <?php echo (isset($tab) && $tab==4) ? 'active' : '' ?>"
                                    data-toggle="tab">Section 2
                                    (Box 6)</a></li>
                            <li class="nav-item"><a href="#Section-tab5"
                                    class="nav-link <?php echo (isset($tab) && $tab==5) ? 'active' : '' ?>"
                                    data-toggle="tab">Section
                                    3</a></li>
                            <li class="nav-item"><a href="#Section-tab6"
                                    class="nav-link <?php echo (isset($tab) && $tab==6) ? 'active' : '' ?>"
                                    data-toggle="tab">Section
                                    4</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade  <?php echo  (isset($tab) && $tab==1) ? ' show active' : '' ?>"
                                id="Section-tab1">
                                <?php
                               // print_r($records);
                                ?>
                                <form name="frm-edit" id="frm-edit"
                                    action="<?php echo site_url($controller . '/'.$fun_name) ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="mode" id="mode" value="hello_bar">
                                    <input type="hidden" name="tab" id="tab" value="1">
                                    <!--   <input type="hidden" name="group_name" id="group_name" value="config_home">
                                    <input type="hidden" name="key_name" id="key_name" value="hello_bar">
                                    <input type="hidden" name="serialized" id="serialized" value="0"> -->
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label"
                                            for="config_hellobar_show"><?php echo isset($records['label']) ? $records['label'] : 'Text'; ?>
                                            <span class="text-danger">*</span></label>
                                        <div class="col-lg-6 col-sm-12 ">
                                            <select name="config_hellobar_show" id="config_hellobar_show"
                                                class="form-control">
                                                <option value="1"
                                                    <?php echo (isset($records['config_hellobar_show']) && $records['config_hellobar_show']=="1")?'selected':''; ?>>
                                                    Yes</option>
                                                <option value="0"
                                                    <?php echo (isset($records['config_hellobar_show']) && $records['config_hellobar_show']=="0")?'selected':''; ?>>
                                                    No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label"
                                            for="config_hello_bar"><?php echo isset($records['label']) ? $records['label'] : 'Text'; ?></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control " name="config_hello_bar"
                                                id="config_hello_bar"><?php echo isset($records['config_hello_bar'])?$this->common->getDbValue($records['config_hello_bar']):''; ?></textarea>
                                            <span class="form-text text-muted">* Leave blank If want to hide top
                                                bar(Hello bar) </span>
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


                            <div class="tab-pane fade <?php echo (isset($tab) && $tab==3) ? ' show active' : '' ?>"
                                id="Section-tab3">
                                <?php
                                $config_section1 = (!empty($records['config_section1'])) ? json_decode($records['config_section1'],true) : array();
                               // print_r($config_section1);
                                ?>
                                <form name="frm-edit" id="frm-edit"
                                    action="<?php echo site_url($controller . '/'.$fun_name) ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="mode" id="mode" value="section1">
                                    <input type="hidden" name="tab" id="tab" value="3">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="smallheading">Small heading </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="config_section1[smallheading]"
                                                id="smallheading" placeholder="WELCOME TO" type="text"
                                                value="<?php echo (!empty($config_section1['smallheading'])) ? $config_section1['smallheading'] : ''?>"
                                                required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="heading">Heading 2 </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="config_section1[heading]" id='heading'
                                                placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                                value="<?php echo (!empty($config_section1['heading'])) ? $config_section1['heading'] : ''?>"
                                                required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="config_section1[description]"
                                                placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                                id="description"
                                                required><?php echo (!empty($config_section1['description'])) ? $config_section1['description'] : ''?></textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="title">Box </label>
                                        <div class="col-sm-10">
                                            <!---box1-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div
                                                            class="card-header bg-info text-white header-elements-inline">
                                                            <h6 class="card-title">Box1</h6>

                                                        </div>

                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <?php
                                
                                      $main_image = (!empty($config_section1['box1']['image1'])) ? base_url()."../".$config_section1['box1']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; ;

                                    ?>
                                                                <label class="col-md-2 control-label">Image</label>
                                                                <div class="col-md-10">
                                                                    <input type="hidden"
                                                                        name="config_section1[box1][image1]"
                                                                        id="box1image1"
                                                                        value="<?php echo  (!empty($config_section1['box1']['image1'])) ? $config_section1['box1']['image1'] : ''; ?>"
                                                                        placeholder="">
                                                                    <div class="row col-md-5">
                                                                        <img src="<?php echo $main_image?>"
                                                                            id="temppreviewimageki1"
                                                                            class="temppreviewimageki1"
                                                                            style="width:200px; height:auto;display:none1">

                                                                    </div>
                                                                    <div class="row col-md-12">

                                                                        <div class="input-group image-preview1">

                                                                            <input type="text"
                                                                                class="form-control image-preview-filename1"
                                                                                disabled="disabled">
                                                                            <!-- don't give a name === doesn't send on POST/GET -->
                                                                            <span class="input-group-btn">
                                                                                <!-- image-preview-clear button -->
                                                                                <button type="button"
                                                                                    class="btn btn-default image-preview-clear image-preview-clear1"
                                                                                    style="display:none;" id=1>
                                                                                    <span
                                                                                        class="glyphicon glyphicon-remove"></span>
                                                                                    Clear
                                                                                </button>
                                                                                <!-- image-preview-input -->
                                                                                <div
                                                                                    class="btn btn-default image-preview-input">
                                                                                    <span
                                                                                        class="glyphicon glyphicon-folder-open"></span>
                                                                                    <span
                                                                                        class="image-preview-input-title image-preview-input-title1">Browse</span>
                                                                                    <input type="file"
                                                                                        accept="image/png, image/jpeg, image/gif"
                                                                                        class="browseimage" id="1"
                                                                                        name="config_section1[box1][image1]" />
                                                                                    <!-- rename it -->

                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                        <span class="form-text text-muted">Image Size
                                                                            428px(width)
                                                                            242px(height)</span>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label"
                                                                    for="box1text1">Text 1 </label>
                                                                <div class="col-lg-10">
                                                                    <input type="text"
                                                                        class="form-control alhanumeric1 maxlength-textarea"
                                                                        maxlength="200"
                                                                        name="config_section1[box1][text1]"
                                                                        id="box1text1"
                                                                        value="<?php echo  (!empty($config_section1['box1']['text1'])) ? $config_section1['box1']['text1'] : ''; ?>"
                                                                        placeholder="Text 1" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label"
                                                                    for="box1text12">Text 2 </label>
                                                                <div class="col-lg-10">
                                                                    <textarea class="form-control "
                                                                        name="config_section1[box1][text2]"
                                                                        id="box1text12"
                                                                        required><?php echo  (!empty($config_section1['box1']['text2'])) ? $config_section1['box1']['text2'] : ''; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label"
                                                                    for="box1text13">URL (read more)</label>
                                                                <div class="col-lg-10">
                                                                    <div class=" row">
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control "
                                                                                placeholder="URL"
                                                                                name="config_section1[box1][url1]"
                                                                                id="box1text13"
                                                                                value="<?php echo  (!empty($config_section1['box1']['url1'])) ? $config_section1['box1']['url1'] : ''; ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!---box2 --->

                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div
                                                            class="card-header bg-info text-white header-elements-inline">
                                                            <h6 class="card-title">Box2</h6>

                                                        </div>

                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <?php
                                
                                $main_image = (!empty($config_section1['box2']['image1'])) ? base_url()."../".$config_section1['box2']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; ;
                                    ?>
                                                                <label class="col-md-2 control-label">Image</label>
                                                                <div class="col-md-10">
                                                                    <input type="hidden"
                                                                        name="config_section1[box2][image1]"
                                                                        id="box2image1"
                                                                        value="<?php echo  (!empty($config_section1['box2']['image1'])) ? $config_section1['box2']['image1'] : ''; ?>"
                                                                        placeholder="">
                                                                    <div class="row col-md-5">
                                                                        <img src="<?php echo $main_image?>"
                                                                            id="temppreviewimageki2"
                                                                            class="temppreviewimageki2"
                                                                            style="width:200px; height:auto;display:none1">

                                                                    </div>
                                                                    <div class="row col-md-12">

                                                                        <div class="input-group image-preview2">

                                                                            <input type="text"
                                                                                class="form-control image-preview-filename2"
                                                                                disabled="disabled">
                                                                            <!-- don't give a name === doesn't send on POST/GET -->
                                                                            <span class="input-group-btn">
                                                                                <!-- image-preview-clear button -->
                                                                                <button type="button"
                                                                                    class="btn btn-default image-preview-clear image-preview-clear2"
                                                                                    style="display:none;" id=2>
                                                                                    <span
                                                                                        class="glyphicon glyphicon-remove"></span>
                                                                                    Clear
                                                                                </button>
                                                                                <!-- image-preview-input -->
                                                                                <div
                                                                                    class="btn btn-default image-preview-input">
                                                                                    <span
                                                                                        class="glyphicon glyphicon-folder-open"></span>
                                                                                    <span
                                                                                        class="image-preview-input-title image-preview-input-title2">Browse</span>
                                                                                    <input type="file"
                                                                                        accept="image/png, image/jpeg, image/gif"
                                                                                        class="browseimage" id="2"
                                                                                        name="config_section1[box2][image1]" />
                                                                                    <!-- rename it -->

                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                        <span class="form-text text-muted">Image Size
                                                                            428px(width)
                                                                            242px(height)</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label"
                                                                    for="box2text11">Text 1 </label>
                                                                <div class="col-lg-10">
                                                                    <input type="text"
                                                                        class="form-control alhanumeric1 maxlength-textarea"
                                                                        maxlength="200"
                                                                        name="config_section1[box2][text1]"
                                                                        id="box2text11"
                                                                        value="<?php echo  (!empty($config_section1['box2']['text1'])) ? $config_section1['box2']['text1'] : ''; ?>"
                                                                        placeholder="Text 1" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label"
                                                                    for="box2text12">Text 2 </label>
                                                                <div class="col-lg-10">
                                                                    <textarea class="form-control "
                                                                        name="config_section1[box2][text2]"
                                                                        id="box2text12"
                                                                        required><?php echo  (!empty($config_section1['box2']['text2'])) ? $config_section1['box2']['text2'] : ''; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label"
                                                                    for="box2text13">URL (read more)</label>
                                                                <div class="col-lg-10">
                                                                    <div class=" row">
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control "
                                                                                placeholder="URL"
                                                                                name="config_section1[box2][url1]"
                                                                                id="box2text13"
                                                                                value="<?php echo  (!empty($config_section1['box2']['url1'])) ? $config_section1['box2']['url1'] : ''; ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!---box3-->

                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div
                                                            class="card-header bg-info text-white header-elements-inline">
                                                            <h6 class="card-title">Box3</h6>

                                                        </div>

                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <?php
                                
                                $main_image = (!empty($config_section1['box3']['image1'])) ? base_url()."../".$config_section1['box3']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; 
                                //$main_image1 = (!empty($config_section1['box3']['image1'])) ? 1  : '0'; ;
                                    ?>
                                                                <label class="col-md-2 control-label">Image</label>
                                                                <div class="col-md-10">
                                                                    <input type="hidden"
                                                                        name="config_section1[box3][image1]"
                                                                        id="box3image1"
                                                                        value="<?php echo  (!empty($config_section1['box3']['image1'])) ? $config_section1['box3']['image1'] : ''; ?>"
                                                                        placeholder="">
                                                                    <div class="row col-md-5">
                                                                        <img src="<?php echo $main_image?>"
                                                                            id="temppreviewimageki3"
                                                                            class="temppreviewimageki3"
                                                                            style="width:200px; height:auto;display:none1">

                                                                    </div>
                                                                    <div class="row col-md-12">

                                                                        <div class="input-group image-preview3">

                                                                            <input type="text"
                                                                                class="form-control image-preview-filename3"
                                                                                disabled="disabled">
                                                                            <!-- don't give a name === doesn't send on POST/GET -->
                                                                            <span class="input-group-btn">
                                                                                <!-- image-preview-clear button -->
                                                                                <button type="button"
                                                                                    class="btn btn-default image-preview-clear image-preview-clear3"
                                                                                    style="display:none;" id=3>
                                                                                    <span
                                                                                        class="glyphicon glyphicon-remove"></span>
                                                                                    Clear
                                                                                </button>
                                                                                <!-- image-preview-input -->
                                                                                <div
                                                                                    class="btn btn-default image-preview-input">
                                                                                    <span
                                                                                        class="glyphicon glyphicon-folder-open"></span>
                                                                                    <span
                                                                                        class="image-preview-input-title image-preview-input-title1">Browse</span>
                                                                                    <input type="file"
                                                                                        accept="image/png, image/jpeg, image/gif"
                                                                                        class="browseimage" id="3"
                                                                                        name="config_section1[box3][image1]" />
                                                                                    <!-- rename it -->

                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                        <span class="form-text text-muted">Image Size
                                                                            428px(width)
                                                                            242px(height)</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label"
                                                                    for="box3text11">Text 1 </label>
                                                                <div class="col-lg-10">
                                                                    <input type="text"
                                                                        class="form-control alhanumeric1 maxlength-textarea"
                                                                        maxlength="200"
                                                                        name="config_section1[box3][text1]"
                                                                        id="box3text11"
                                                                        value="<?php echo  (!empty($config_section1['box3']['text1'])) ? $config_section1['box3']['text1'] : ''; ?>"
                                                                        placeholder="Text 1" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label"
                                                                    for="box3text12">Text 2 </label>
                                                                <div class="col-lg-10">
                                                                    <textarea class="form-control "
                                                                        name="config_section1[box3][text2]"
                                                                        id="box3text12"
                                                                        required><?php echo  (!empty($config_section1['box3']['text2'])) ? $config_section1['box3']['text2'] : ''; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label"
                                                                    for="box3text13">URL (read more)</label>
                                                                <div class="col-lg-10">
                                                                    <div class=" row">
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control "
                                                                                placeholder="URL"
                                                                                name="config_section1[box3][url1]"
                                                                                id="box3text13"
                                                                                value="<?php echo  (!empty($config_section1['box3']['url1'])) ? $config_section1['box3']['url1'] : ''; ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
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
                            <!--tab4 -->
                            <div class="tab-pane fade <?php echo (isset($tab) && $tab==4) ? ' show active' : '' ?>"
                                id="Section-tab4">
                                <?php
                                $config_section2 = (!empty($records['config_section2'])) ? json_decode($records['config_section2'],true) : array();
                               // print_r($config_section2);
                                ?>
                                <form name="frm-edit" id="frm-edit"
                                    action="<?php echo site_url($controller . '/'.$fun_name) ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="mode" id="mode" value="section2">
                                    <input type="hidden" name="tab" id="tab" value="4">

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="config_section2[heading]" id='heading'
                                                placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                                value="<?php echo (!empty($config_section2['heading'])) ? $config_section2['heading'] : ''?>"
                                                required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="config_section2[description]"
                                                placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                                id="description"
                                                required><?php echo (!empty($config_section2['description'])) ? $config_section2['description'] : ''?></textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="title">Box </label>
                                        <div class="col-sm-10">
                                            <!---box1-->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div
                                                            class="card-header bg-info text-white header-elements-inline">
                                                            <h6 class="card-title">Box1</h6>

                                                        </div>

                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <?php
                                
                                      $main_image = (!empty($config_section2['box1']['image1'])) ? base_url()."../".$config_section2['box1']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; ;

                                    ?>
                                                                <label class="col-md-12 control-label">Image</label>
                                                                <div class="col-md-12">
                                                                    <input type="hidden"
                                                                        name="config_section2[box1][image1]"
                                                                        id="box1image61"
                                                                        value="<?php echo  (!empty($config_section2['box1']['image1'])) ? $config_section2['box1']['image1'] : ''; ?>"
                                                                        placeholder="">
                                                                    <div class="row col-md-5">
                                                                        <img src="<?php echo $main_image?>"
                                                                            id="temppreviewimageki61"
                                                                            class="temppreviewimageki61"
                                                                            style="width:41px; height:auto;display:none1">

                                                                    </div>
                                                                    <div class="row col-md-12">

                                                                        <div class="input-group image-preview61">

                                                                            <input type="text"
                                                                                class="form-control image-preview-filename61"
                                                                                disabled="disabled">
                                                                            <!-- don't give a name === doesn't send on POST/GET -->
                                                                            <span class="input-group-btn">
                                                                                <!-- image-preview-clear button -->
                                                                                <button type="button"
                                                                                    class="btn btn-default image-preview-clear image-preview-clear61"
                                                                                    style="display:none;" id=61>
                                                                                    <span
                                                                                        class="glyphicon glyphicon-remove"></span>
                                                                                    Clear
                                                                                </button>
                                                                                <!-- image-preview-input -->
                                                                                <div
                                                                                    class="btn btn-default image-preview-input">
                                                                                    <span
                                                                                        class="glyphicon glyphicon-folder-open"></span>
                                                                                    <span
                                                                                        class="image-preview-input-title image-preview-input-title61">Browse</span>
                                                                                    <input type="file"
                                                                                        accept="image/png, image/jpeg, image/gif"
                                                                                        class="browseimage" id="61"
                                                                                        name="config_section2[box1][image1]" />
                                                                                    <!-- rename it -->

                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                        <span class="form-text text-muted">Image Size
                                                                            41px(width)
                                                                            37px(height)</span>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box1text1">Text 1 </label>
                                                                <div class="col-lg-12">
                                                                    <input type="text"
                                                                        class="form-control alhanumeric1 maxlength-textarea"
                                                                        maxlength="200"
                                                                        name="config_section2[box1][text1]"
                                                                        id="box1text1"
                                                                        value="<?php echo  (!empty($config_section2['box1']['text1'])) ? $config_section2['box1']['text1'] : ''; ?>"
                                                                        placeholder="Text 1" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box1text12">Text 2 </label>
                                                                <div class="col-lg-12">
                                                                    <textarea class="form-control "
                                                                        name="config_section2[box1][text2]"
                                                                        id="box1text12"
                                                                        required><?php echo  (!empty($config_section2['box1']['text2'])) ? $config_section2['box1']['text2'] : ''; ?></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!---box2 --->

                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div
                                                            class="card-header bg-info text-white header-elements-inline">
                                                            <h6 class="card-title">Box2</h6>

                                                        </div>

                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <?php
                                
                                $main_image = (!empty($config_section2['box2']['image1'])) ? base_url()."../".$config_section2['box2']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; ;
                                    ?>
                                                                <label class="col-md-12 control-label">Image</label>
                                                                <div class="col-md-12">
                                                                    <input type="hidden"
                                                                        name="config_section2[box2][image1]"
                                                                        id="box2image1"
                                                                        value="<?php echo  (!empty($config_section2['box2']['image1'])) ? $config_section2['box2']['image1'] : ''; ?>"
                                                                        placeholder="">
                                                                    <div class="row col-md-5">
                                                                        <img src="<?php echo $main_image?>"
                                                                            id="temppreviewimageki62"
                                                                            class="temppreviewimageki62"
                                                                            style="width:41px; height:auto;display:none1">

                                                                    </div>
                                                                    <div class="row col-md-12">

                                                                        <div class="input-group image-preview62">

                                                                            <input type="text"
                                                                                class="form-control image-preview-filename62"
                                                                                disabled="disabled">
                                                                            <!-- don't give a name === doesn't send on POST/GET -->
                                                                            <span class="input-group-btn">
                                                                                <!-- image-preview-clear button -->
                                                                                <button type="button"
                                                                                    class="btn btn-default image-preview-clear image-preview-clear62"
                                                                                    style="display:none;" id=62>
                                                                                    <span
                                                                                        class="glyphicon glyphicon-remove"></span>
                                                                                    Clear
                                                                                </button>
                                                                                <!-- image-preview-input -->
                                                                                <div
                                                                                    class="btn btn-default image-preview-input">
                                                                                    <span
                                                                                        class="glyphicon glyphicon-folder-open"></span>
                                                                                    <span
                                                                                        class="image-preview-input-title image-preview-input-title62">Browse</span>
                                                                                    <input type="file"
                                                                                        accept="image/png, image/jpeg, image/gif"
                                                                                        class="browseimage" id="62"
                                                                                        name="config_section2[box2][image1]" />
                                                                                    <!-- rename it -->

                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                        <span class="form-text text-muted">Image Size
                                                                            41px(width)
                                                                            37px(height)</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box2text11">Text 1 </label>
                                                                <div class="col-lg-12">
                                                                    <input type="text"
                                                                        class="form-control alhanumeric1 maxlength-textarea"
                                                                        maxlength="200"
                                                                        name="config_section2[box2][text1]"
                                                                        id="box2text11"
                                                                        value="<?php echo  (!empty($config_section2['box2']['text1'])) ? $config_section2['box2']['text1'] : ''; ?>"
                                                                        placeholder="Text 1" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box2text12">Text 2 </label>
                                                                <div class="col-lg-12">
                                                                    <textarea class="form-control "
                                                                        name="config_section2[box2][text2]"
                                                                        id="box2text12"
                                                                        required><?php echo  (!empty($config_section2['box2']['text2'])) ? $config_section2['box2']['text2'] : ''; ?></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!---box3-->

                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div
                                                            class="card-header bg-info text-white header-elements-inline">
                                                            <h6 class="card-title">Box3</h6>

                                                        </div>

                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <?php
                                
                                $main_image = (!empty($config_section2['box3']['image1'])) ? base_url()."../".$config_section2['box3']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; 
                              
                                    ?>
                                                                <label class="col-md-12 control-label">Image</label>
                                                                <div class="col-md-12">
                                                                    <input type="hidden"
                                                                        name="config_section2[box3][image1]"
                                                                        id="box3image1"
                                                                        value="<?php echo  (!empty($config_section2['box3']['image1'])) ? $config_section2['box3']['image1'] : ''; ?>"
                                                                        placeholder="">
                                                                    <div class="row col-md-5">
                                                                        <img src="<?php echo $main_image?>"
                                                                            id="temppreviewimageki63"
                                                                            class="temppreviewimageki63"
                                                                            style="width:41px; height:auto;display:none1">

                                                                    </div>
                                                                    <div class="row col-md-12">

                                                                        <div class="input-group image-preview63">

                                                                            <input type="text"
                                                                                class="form-control image-preview-filename63"
                                                                                disabled="disabled">
                                                                            <!-- don't give a name === doesn't send on POST/GET -->
                                                                            <span class="input-group-btn">
                                                                                <!-- image-preview-clear button -->
                                                                                <button type="button"
                                                                                    class="btn btn-default image-preview-clear image-preview-clear63"
                                                                                    style="display:none;" id=63>
                                                                                    <span
                                                                                        class="glyphicon glyphicon-remove"></span>
                                                                                    Clear
                                                                                </button>
                                                                                <!-- image-preview-input -->
                                                                                <div
                                                                                    class="btn btn-default image-preview-input">
                                                                                    <span
                                                                                        class="glyphicon glyphicon-folder-open"></span>
                                                                                    <span
                                                                                        class="image-preview-input-title image-preview-input-title63">Browse</span>
                                                                                    <input type="file"
                                                                                        accept="image/png, image/jpeg, image/gif"
                                                                                        class="browseimage" id="63"
                                                                                        name="config_section2[box3][image1]" />
                                                                                    <!-- rename it -->

                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                        <span class="form-text text-muted">Image Size
                                                                            41px(width)
                                                                            37px(height)</span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box3text11">Text 1 </label>
                                                                <div class="col-lg-12">
                                                                    <input type="text"
                                                                        class="form-control  maxlength-textarea"
                                                                        maxlength="200"
                                                                        name="config_section2[box3][text1]"
                                                                        id="box3text11"
                                                                        value="<?php echo  (!empty($config_section2['box3']['text1'])) ? $config_section2['box3']['text1'] : ''; ?>"
                                                                        placeholder="Text 1" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box3text12">Text 2 </label>
                                                                <div class="col-lg-12">
                                                                    <textarea class="form-control "
                                                                        name="config_section2[box3][text2]"
                                                                        id="box3text12"
                                                                        required><?php echo  (!empty($config_section2['box3']['text2'])) ? $config_section2['box3']['text2'] : ''; ?></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--box4-->
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div
                                                            class="card-header bg-info text-white header-elements-inline">
                                                            <h6 class="card-title">Box4</h6>

                                                        </div>

                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <?php
                                
                                      $main_image = (!empty($config_section2['box4']['image1'])) ? base_url()."../".$config_section2['box4']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; ;

                                    ?>
                                                                <label class="col-md-12 control-label">Image</label>
                                                                <div class="col-md-12">
                                                                    <input type="hidden"
                                                                        name="config_section2[box4][image1]"
                                                                        id="box4image64"
                                                                        value="<?php echo  (!empty($config_section2['box4']['image1'])) ? $config_section2['box4']['image1'] : ''; ?>"
                                                                        placeholder="">
                                                                    <div class="row col-md-5">
                                                                        <img src="<?php echo $main_image?>"
                                                                            id="temppreviewimageki64"
                                                                            class="temppreviewimageki64"
                                                                            style="width:41px; height:auto;display:none1">

                                                                    </div>
                                                                    <div class="row col-md-12">

                                                                        <div class="input-group image-preview64">

                                                                            <input type="text"
                                                                                class="form-control image-preview-filename64"
                                                                                disabled="disabled">
                                                                            <!-- don't give a name === doesn't send on POST/GET -->
                                                                            <span class="input-group-btn">
                                                                                <!-- image-preview-clear button -->
                                                                                <button type="button"
                                                                                    class="btn btn-default image-preview-clear image-preview-clear64"
                                                                                    style="display:none;" id=64>
                                                                                    <span
                                                                                        class="glyphicon glyphicon-remove"></span>
                                                                                    Clear
                                                                                </button>
                                                                                <!-- image-preview-input -->
                                                                                <div
                                                                                    class="btn btn-default image-preview-input">
                                                                                    <span
                                                                                        class="glyphicon glyphicon-folder-open"></span>
                                                                                    <span
                                                                                        class="image-preview-input-title image-preview-input-title64">Browse</span>
                                                                                    <input type="file"
                                                                                        accept="image/png, image/jpeg, image/gif"
                                                                                        class="browseimage" id="64"
                                                                                        name="config_section2[box4][image1]" />
                                                                                    <!-- rename it -->

                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                        <span class="form-text text-muted">Image Size
                                                                            41px(width)
                                                                            37px(height)</span>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box4text1">Text 1 </label>
                                                                <div class="col-lg-12">
                                                                    <input type="text"
                                                                        class="form-control alhanumeric1 maxlength-textarea"
                                                                        maxlength="200"
                                                                        name="config_section2[box4][text1]"
                                                                        id="box4text1"
                                                                        value="<?php echo  (!empty($config_section2['box4']['text1'])) ? $config_section2['box4']['text1'] : ''; ?>"
                                                                        placeholder="Text 1" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box4text12">Text 2 </label>
                                                                <div class="col-lg-12">
                                                                    <textarea class="form-control "
                                                                        name="config_section2[box4][text2]"
                                                                        id="box4text12"
                                                                        required><?php echo  (!empty($config_section2['box4']['text2'])) ? $config_section2['box4']['text2'] : ''; ?></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--box5-->
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div
                                                            class="card-header bg-info text-white header-elements-inline">
                                                            <h6 class="card-title">Box5</h6>

                                                        </div>

                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <?php
                                
                                      $main_image = (!empty($config_section2['box5']['image1'])) ? base_url()."../".$config_section2['box5']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; ;

                                    ?>
                                                                <label class="col-md-12 control-label">Image</label>
                                                                <div class="col-md-12">
                                                                    <input type="hidden"
                                                                        name="config_section2[box5][image1]"
                                                                        id="box5image65"
                                                                        value="<?php echo  (!empty($config_section2['box5']['image1'])) ? $config_section2['box5']['image1'] : ''; ?>"
                                                                        placeholder="">
                                                                    <div class="row col-md-5">
                                                                        <img src="<?php echo $main_image?>"
                                                                            id="temppreviewimageki65"
                                                                            class="temppreviewimageki65"
                                                                            style="width:41px; height:auto;display:none1">

                                                                    </div>
                                                                    <div class="row col-md-12">

                                                                        <div class="input-group image-preview65">

                                                                            <input type="text"
                                                                                class="form-control image-preview-filename65"
                                                                                disabled="disabled">
                                                                            <!-- don't give a name === doesn't send on POST/GET -->
                                                                            <span class="input-group-btn">
                                                                                <!-- image-preview-clear button -->
                                                                                <button type="button"
                                                                                    class="btn btn-default image-preview-clear image-preview-clear65"
                                                                                    style="display:none;" id=65>
                                                                                    <span
                                                                                        class="glyphicon glyphicon-remove"></span>
                                                                                    Clear
                                                                                </button>
                                                                                <!-- image-preview-input -->
                                                                                <div
                                                                                    class="btn btn-default image-preview-input">
                                                                                    <span
                                                                                        class="glyphicon glyphicon-folder-open"></span>
                                                                                    <span
                                                                                        class="image-preview-input-title image-preview-input-title65">Browse</span>
                                                                                    <input type="file"
                                                                                        accept="image/png, image/jpeg, image/gif"
                                                                                        class="browseimage" id="65"
                                                                                        name="config_section2[box5][image1]" />
                                                                                    <!-- rename it -->

                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                        <span class="form-text text-muted">Image Size
                                                                            41px(width)
                                                                            37px(height)</span>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box5text1">Text 1 </label>
                                                                <div class="col-lg-12">
                                                                    <input type="text"
                                                                        class="form-control alhanumeric1 maxlength-textarea"
                                                                        maxlength="200"
                                                                        name="config_section2[box5][text1]"
                                                                        id="box5text1"
                                                                        value="<?php echo  (!empty($config_section2['box5']['text1'])) ? $config_section2['box5']['text1'] : ''; ?>"
                                                                        placeholder="Text 1" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box5text12">Text 2 </label>
                                                                <div class="col-lg-12">
                                                                    <textarea class="form-control "
                                                                        name="config_section2[box5][text2]"
                                                                        id="box5text12"
                                                                        required><?php echo  (!empty($config_section2['box5']['text2'])) ? $config_section2['box5']['text2'] : ''; ?></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!---box6-->
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div
                                                            class="card-header bg-info text-white header-elements-inline">
                                                            <h6 class="card-title">Box6</h6>

                                                        </div>

                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <?php
                                
                                      $main_image = (!empty($config_section2['box6']['image1'])) ? base_url()."../".$config_section2['box6']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; ;

                                    ?>
                                                                <label class="col-md-12 control-label">Image</label>
                                                                <div class="col-md-12">
                                                                    <input type="hidden"
                                                                        name="config_section2[box6][image1]"
                                                                        id="box6image66"
                                                                        value="<?php echo  (!empty($config_section2['box6']['image1'])) ? $config_section2['box6']['image1'] : ''; ?>"
                                                                        placeholder="">
                                                                    <div class="row col-md-5">
                                                                        <img src="<?php echo $main_image?>"
                                                                            id="temppreviewimageki66"
                                                                            class="temppreviewimageki66"
                                                                            style="width:41px; height:auto;display:none1">

                                                                    </div>
                                                                    <div class="row col-md-12">

                                                                        <div class="input-group image-preview66">

                                                                            <input type="text"
                                                                                class="form-control image-preview-filename66"
                                                                                disabled="disabled">
                                                                            <!-- don't give a name === doesn't send on POST/GET -->
                                                                            <span class="input-group-btn">
                                                                                <!-- image-preview-clear button -->
                                                                                <button type="button"
                                                                                    class="btn btn-default image-preview-clear image-preview-clear66"
                                                                                    style="display:none;" id=66>
                                                                                    <span
                                                                                        class="glyphicon glyphicon-remove"></span>
                                                                                    Clear
                                                                                </button>
                                                                                <!-- image-preview-input -->
                                                                                <div
                                                                                    class="btn btn-default image-preview-input">
                                                                                    <span
                                                                                        class="glyphicon glyphicon-folder-open"></span>
                                                                                    <span
                                                                                        class="image-preview-input-title image-preview-input-title66">Browse</span>
                                                                                    <input type="file"
                                                                                        accept="image/png, image/jpeg, image/gif"
                                                                                        class="browseimage" id="66"
                                                                                        name="config_section2[box6][image1]" />
                                                                                    <!-- rename it -->

                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                        <span class="form-text text-muted">Image Size
                                                                            41px(width)
                                                                            37px(height)</span>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box6text1">Text 1 </label>
                                                                <div class="col-lg-12">
                                                                    <input type="text"
                                                                        class="form-control alhanumeric1 maxlength-textarea"
                                                                        maxlength="200"
                                                                        name="config_section2[box6][text1]"
                                                                        id="box6text1"
                                                                        value="<?php echo  (!empty($config_section2['box6']['text1'])) ? $config_section2['box6']['text1'] : ''; ?>"
                                                                        placeholder="Text 1" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-12 col-form-label"
                                                                    for="box6text12">Text 2 </label>
                                                                <div class="col-lg-12">
                                                                    <textarea class="form-control "
                                                                        name="config_section2[box6][text2]"
                                                                        id="box6text12"
                                                                        required><?php echo  (!empty($config_section2['box6']['text2'])) ? $config_section2['box6']['text2'] : ''; ?></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
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
                            <!--end of tab4-->
                            <!--tab5-->
                            <div class="tab-pane fade <?php echo (isset($tab) && $tab==5) ? ' show active' : '' ?>"
                                id="Section-tab5">
                                <?php
                                $config_section3 = (!empty($records['config_section3'])) ? json_decode($records['config_section3'],true) : array();
                                //print_r($config_section3);
                                ?>
                                <form name="frm-edit" id="frm-edit"
                                    action="<?php echo site_url($controller . '/'.$fun_name) ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="mode" id="mode" value="section3">
                                    <input type="hidden" name="tab" id="tab" value="5">

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="config_section3[heading]" id='heading'
                                                placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                                value="<?php echo (!empty($config_section3['heading'])) ? $config_section3['heading'] : ''?>"
                                                required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="config_section3[description]"
                                                placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                                id="description"
                                                required><?php echo (!empty($config_section3['description'])) ? $config_section3['description'] : ''?></textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <?php
                                
                                      $main_image = (!empty($config_section3['main']['image1'])) ? base_url()."../".$config_section3['main']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; ;

                                    ?>
                                        <label class="col-md-2 control-label">Image</label>
                                        <div class="col-md-10">
                                            <input type="hidden" name="config_section3[main][image1]" id="mainimage71"
                                                value="<?php echo  (!empty($config_section3['main']['image1'])) ? $config_section3['main']['image1'] : ''; ?>"
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
                                                                class="browseimage" id="71"
                                                                name="config_section3[main][image1]" />
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
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2"></label>
                                        <div class="col-lg-9">
                                            <button type="submit" class="btn bg-blue">Submit <i
                                                    class="icon-paperplane ml-2"></i></button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end of tab6-->
                            
                            <!--tab6-->
                            <div class="tab-pane fade <?php echo (isset($tab) && $tab==6) ? ' show active' : '' ?>"
                                id="Section-tab6">
                                <?php
                             //   print_r($records['config_section4']);
                                $config_section4 = (!empty($records['config_section4'])) ? json_decode(html_entity_decode($records['config_section4']),true) : array();
                               // print_r($config_section4);
                                ?>
                                <form name="frm-edit" id="frm-edit"
                                    action="<?php echo site_url($controller . '/'.$fun_name) ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="mode" id="mode" value="section4">
                                    <input type="hidden" name="tab" id="tab" value="6">

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="heading">Heading </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="config_section4[heading]" id='heading'
                                                placeholder="Modavar Pharmaceuticals, LLC" type="text"
                                                value="<?php echo (!empty($config_section4['heading'])) ? base64_decode($config_section4['heading']) : ''?>"
                                                required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="description">Detail </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="config_section4[description]"
                                                placeholder="Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, ...."
                                                id="description"
                                                required><?php echo (!empty($config_section4['description'])) ? base64_decode($config_section4['description']) : ''?></textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <?php
                                
                                      $main_image = (!empty($config_section4['main']['image1'])) ? base_url()."../".$config_section4['main']['image1'] : 'http://www.placehold.it/20x20/EFEFEF/AAAAAA&amp;text=no+image'; ;

                                    ?>
                                        <label class="col-md-2 control-label">Image</label>
                                        <div class="col-md-10">
                                            <input type="hidden" name="config_section4[main][image1]" id="mainimage81"
                                                value="<?php echo  (!empty($config_section4['main']['image1'])) ? $config_section4['main']['image1'] : ''; ?>"
                                                placeholder="">
                                            <div class="row col-md-5">
                                                <img src="<?php echo $main_image?>" id="temppreviewimageki81"
                                                    class="temppreviewimageki81"
                                                    style="width:200px; height:auto;display:none1">

                                            </div>
                                            <div class="row col-md-12">

                                                <div class="input-group image-preview81">

                                                    <input type="text" class="form-control image-preview-filename81"
                                                        disabled="disabled">
                                                    <!-- don't give a name === doesn't send on POST/GET -->
                                                    <span class="input-group-btn">
                                                        <!-- image-preview-clear button -->
                                                        <button type="button"
                                                            class="btn btn-default image-preview-clear image-preview-clear81"
                                                            style="display:none;" id=81>
                                                            <span class="glyphicon glyphicon-remove"></span>
                                                            Clear
                                                        </button>
                                                        <!-- image-preview-input -->
                                                        <div class="btn btn-default image-preview-input">
                                                            <span class="glyphicon glyphicon-folder-open"></span>
                                                            <span
                                                                class="image-preview-input-title image-preview-input-title81">Browse</span>
                                                            <input type="file" accept="image/png, image/jpeg, image/gif"
                                                                class="browseimage" id="81"
                                                                name="config_section4[main][image1]" />
                                                            <!-- rename it -->

                                                        </div>
                                                    </span>
                                                </div>
                                                <span class="form-text text-muted">Image Size
                                                    500px(width)
                                                    288px(height)</span>

                                            </div>
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
                            <!--end of tab6-->

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
</script>

</html>