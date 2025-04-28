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
                            <li class="nav-item"><a href="#Section-tab1"
                                    class="nav-link <?php echo (isset($tab) && $tab==1) ? 'active' : '' ?>"
                                    data-toggle="tab">Page Popup</a></li>
                          
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
                                            for="config_hellobar_show"><?php echo isset($records['label']) ? $records['label'] : 'Display Popup Pgae'; ?>
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
                                            for="config_hello_bar"><?php echo isset($records['label']) ? $records['label'] : 'Display Popup Title'; ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control"  name="config_hello_bar"
                                                id="config_hello_bar" value="<?php echo isset($records['config_hello_bar'])?$this->common->getDbValue($records['config_hello_bar']):''; ?>">
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
  
<script type="text/javascript">
 

// Always show badge
$('.maxlength-textarea').maxlength({
    alwaysShow: true
});
// TableManageButtons.init();
</script>

</html>