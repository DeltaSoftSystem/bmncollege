<!DOCTYPE html>
<html lang="en">

    <head>
        <?php $this->load->view('websiteadmin/inc_metacss');?>
        <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/demo_pages/datatables_responsive.js"></script>
        <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/notifications/bootbox.min.js"></script>
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
                                <a href="<?php echo site_url($controller . "/products_action"); ?>" class="breadcrumb-elements-item">
                                    <button type="button" class="btn btn-success btn-sm"><i class="icon-plus2 mr-2"></i> Add New</button>
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

                        <?php
						        if (isset($resultist)  &&  sizeof($resultist)>0 ) { 
                        ?> <div class="table-responsive">
                            <table class="table table-hover   datatable-basicwti">

                                <thead>
                                    <tr class="bg-blue">
                                        <th>#</th>
                                         
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $i=0;
                                     
                                      foreach($resultist as $key => $value){
                                           


                                          $i++;
                                          $status = $this->common->getDbValue($value['status_flag']);
									  ?>
                                     <tr class="  border-left-3  <?php echo ($status == "1") ? 'border-left-success' : 'border-left-danger' ?>  tr<?php echo $this->common->getDbValue($value['status_flag']); ?>">
                                        <td><?php echo $i; ?></td>
                                        
                                        <td><?php echo $this->common->getDbValue($value['name_title']); ?></td>
                                        <td>
                                        <?php
                                        if($value['main_image']!=""){
                                        ?>    
                                        <img src="<?php echo base_url().  $this->common->showImageAdmin('../uploads/product/',$value['main_image']);?>" style="width:100px; height:auto">
                                            <?php }?>
                                    </td>
                                        <td><?php echo isset($value['add_date']) ? $this->common->getDateFormat($value['add_date'], DATE_FORMAT_PHP) : ''; ?></td>
                                        <td> 
                                            <?php
if ($status == "1") {echo '<span class="badge badge-success  w-25">Active</span>';}
      ?>
                                            <?php
if ($status == "2") {echo '<span class="badge badge-danger  w-25">Inactive</span>';}
      ?></td>
                                        <td><a href="<?php echo site_url($controller.'/products_action/'.$value['id'])?>" class="list-icons-item text-primary-600" data-popup="tooltip" title="Edit" data-container="body"><i class="icon-pencil7"></i></a>
                                            <a href="#" data-uuid="<?php echo $value['id'] ?>" class="list-icons-item text-danger-600 bootbox_custom" data-popup="tooltip" title="Delete" data-container="body"><i class="icon-trash"></i></a>

                                        </td>
                                    </tr>
                                    <?php }?>

                                </tbody>
                            </table>
                        </div>
                        <?php }   else {
                                ?>
                        <div class="row">
                            <div class="col-xl-12 text-center  "> No record found
                            </div>
                        </div>
                        <?php   
                                       }?>
                                         <div class="row">
                            <div class="col-xl-12 text-center  ">
                                <ul class="pagination-flat justify-content-center twbs-flat pagination pull-right">
                                    <?php //echo $this->common->ajaxpagingnation_lux_new($page,$num_row,$maxm,'7',$fun_name,$other_para); ?>

                                </ul>
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

                    location.href = "<?php echo site_url($controller . '/products_action_delete/') ?>" + uuid;


                }
            }
        });
    });
    </Script>
<script>
	 // Setting datatable defaults
	 $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            "lengthMenu": [ 100, 250, 500,, 5000 ],
            "pageLength":100,
            columnDefs: [{ 
                orderable: false,
                width: 100,
                targets: [ 1 ]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });

        // Basic datatable
        $('.datatable-basicwti').DataTable({
        columnDefs: [{
            orderable: false,
            targets: [6]
        }],
        autoWidth: true,
        
        scrollCollapse: true,
        "paging": true,
        "bLengthChange": true, //thought this line could hide the LengthMenu
        "bInfo": true,
        "aaSorting": [],
        /*  fixedColumns : {
					leftColumns : 2,
					rightColumns : 1
				},  */
        "bFilter": true,
        responsive: true,
    });
	</script>
</html>