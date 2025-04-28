<!DOCTYPE html>
<html lang="en">

    <head>
    <script>
		var st_url = "<?php echo site_url()?>/";
		</script>  
        <?php $this->load->view('websiteadmin/inc_metacss');?>
        <script src="<?php echo base_url() ?>global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
        
    
    
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
                              
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="question">Question :<span class="text-danger">*</span></label>
                                    <div class="col-lg-9"><input type="text" class="form-control " id="question" name="question" placeholder="Question  " value="<?php echo isset($records['question'])?$this->common->getDbValue($records['question']):''; ?>">
                                      
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="answer">Answer :<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                    <textarea rows="3" cols="3" class="form-control" placeholder="Answer" id="answer" name="answer"><?php echo isset($records['answer'])?$this->common->getDbValue($records['answer']):''; ?></textarea>

                                    </div>
                                </div>
                              
                               
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="sort_no">Sort No:</label>
                                    <div class="col-lg-9"><input type="text" class="form-control " id="sort_no" name="sort_no" placeholder="Sort No" value="<?php echo isset($records['sort_no'])?$this->common->getDbValue($records['sort_no']):''; ?>">
                                     
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
            
            
            if (!$("#question").val()) {
                    isError = true;
                    //$("#error_name").show()
                    $("#question").addClass("border-danger");

                }
              
                if (!$("#answer").val()) {
                    isError = true;
                    //$("#error_name").show()
                    $("#answer").addClass("border-danger");

                }
       
             
            
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
        
 
          // Always show badge
          $('.maxlength-textarea').maxlength({
            alwaysShow: true
        });
        // TableManageButtons.init();
        </script>

</html>