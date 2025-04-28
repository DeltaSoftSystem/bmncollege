<!DOCTYPE html>
<html lang="en">

    <head>
        <?php $this->load->view('websiteadmin/inc_metacss');?>
          <script src="<?php echo base_url()?>global_assets/js/demo_pages/datatables_responsive.js"></script>
       
        <!-- /theme JS files -->
        <style type="text/css">
        .hiderow1{
            display: none !important;
        }
        .grab {cursor: -webkit-grab; cursor: grab;}
.grabbing {cursor: -webkit-grabbing; cursor: grabbing;}
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
                                <a href="<?php echo site_url("home");?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                                <span class="breadcrumb-item "><?php echo (isset($this->pg_title))?$this->pg_title:''?></span>
                                <span class="breadcrumb-item active"><?php echo (isset($sub_heading))?$sub_heading:''?></span>
                            </div>

                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>

                        <div class="header-elements d-none">
                            <div class="breadcrumb justify-content-center">
                                <a href="<?php echo site_url($this->controller."/category_action");?>" class="breadcrumb-elements-item">
                                    <button type="button" class="btn btn-success btn-sm"><i class="icon-plus2 mr-2"></i> Add New</button>
                                </a>

                            </div>
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
                        <span class="font-weight-semibold">Success! </span><?php echo $success?>
                    </div>
                    <?php }?>
                    <?php
						$error = $this->session->flashdata('error');
						if ($error) {
					?>
                    <div class="alert bg-danger text-white alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        <span class="font-weight-semibold">Error! </span> <?php echo $error?>
                    </div>
                    <?php }?>
                    <?php
						$warning = $this->session->flashdata('warning');
						if ($warning) {
					?>
                    <div class="alert bg-danger text-white alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        <span class="font-weight-semibold">Warning! </span> <?php echo $warning?>
                    </div>
                    <?php }?>
                    <!-- Basic datatable -->
                    <div class="card  ">
                        <?php
						 if (isset($results) && sizeof($results)>0) { 
					    ?>
                        <div class="table-responsive">
                        <input type="hidden" name="temp_sortnos" id="temp_sortnos" value="0">

                        <table class="table table-hover   datatable-basicwti"  id="sortable-list-basic">
                                <thead>
                                    <tr class="bg-blue ">
                                        <th  >#</th>
                                        <th>Name</th>
                                        
                                        <th>No.Product</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable-list-basic">
                                    <?php  $i=0;
									foreach($results as $key => $value){
									$i++;
									$status_flag = $this->common->getDbValue($value['status_flag']);
									
									$where_cond = " WHERE status_flag!='Delete' and   category_id=".$this->common->getDbValue($value['category_id'])." ORDER BY sort_no asc";
									$results_sub = $this->common->getAllRow('wti_m_products', $where_cond);
									
                                    $sql_count = " where category_id = '{$value['category_id']}'";
                                    $total_story = $this->common->getRecordsCount('wti_m_products',$sql_count);
                                    // print_r($results_sub);

								?>
                                
                                    <tr   data-toggle="collapse" href="#collapse-link-collapsed<?php echo $this->common->getDbValue($value['category_id']) ?>" class="grabbing  border-left-3 showsub  <?php echo ($status_flag == "Active") ? 'border-left-success' : 'border-left-danger' ?>  tr<?php echo $this->common->getDbValue($value['status_flag']); ?>" id="id-<?php echo $this->common->getDbValue($value['category_id']) ?>">
                                        <td valign="top"><?php echo $i?><input type="hidden"   value="<?php echo $this->common->getDbValue($value['category_id']) ?>"
                    name="sortno" id="sortno<?php echo $this->common->getDbValue($value['category_id']) ?>">    </td>
                                        <td valign="top"><strong><?php echo $this->common->getDbValue($value['name']); ?></strong></td>
                                        
                                       <td><?php echo $total_story;?></td>
                                        <td valign="top">
                                            <?php
                                        if($status_flag=="Active"){echo '<span class="badge badge-success">Active</span>';}
                                        ?>
                                            <?php
                                        if($status_flag=="Inactive"){echo '<span class="badge badge-danger">Inactive</span>';}
                                        ?>
                                        </td>
                                        <td valign="top">
                                            <div class="list-icons">
                                            <a href="<?php echo site_url($this->controller . '/product_action') ?>" class="list-icons-item text-primary-600" data-popup="tooltip" title="" data-original-title="Add Product"><i class="icon-plus2"></i></a>

                                                <a href="<?php echo site_url($this->controller . '/category_action/' . $this->common->getDbValue($value['category_id'])) ?>" class="list-icons-item text-primary-600" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a>
                                                <a href="#" class="list-icons-item text-danger-600 bootbox_custom" data-duid="<?php echo $this->common->getDbValue($value['category_id']) ?>" data-popup="tooltip" title="" data-original-title="Delete"><i class="icon-trash"></i></a> 

                                            </div>
                                        </td>
                                    </tr>
                                    <?php if($results_sub){?>
                                        <?php foreach($results_sub as $key => $value_sub){

                                 

                                        $status_flag = $this->common->getDbValue($value_sub['status_flag']);

?>
                                                    <tr aria-expanded="false" id="collapse-link-collapsed<?php echo $this->common->getDbValue($value['category_id']) ?>" class="collapse hiderow  border-left-2 sub<?php echo $this->common->getDbValue($value['category_id']) ?>  <?php echo ($status_flag == "Active") ? 'border-left-success' : 'border-left-danger' ?>  tr<?php echo $this->common->getDbValue($value_sub['status_flag']); ?>"  >
                                                        <td valign="top" class="  border-left-2" >--</td>
                                                        
                                                        <td valign="top" class="ml-3"><?php echo $this->common->getDbValue($value_sub['name_title']); ?></td>
                                                         <td>  <?php
                                        if($value_sub['main_image']!=""){
                                        ?>
                                        <img src="<?php echo base_url().  $this->common->showImageAdmin('../uploads/product/',$value_sub['main_image']);?>"
                                            style="width:100px; height:auto">
                                        <?php }?> </td>
                                                     
                                                        <td valign="top">
                                                            <?php
                                        if($status_flag=="Active"){echo '<span class="badge badge-success">Active</span>';}
                                        ?>
                                                            <?php
                                        if($status_flag=="Inactive"){echo '<span class="badge badge-danger">Inactive</span>';}
                                        ?>
                                                        </td>
                                                        <td valign="top">
                                                            <div class="list-icons">


                                                            <a href="<?php echo site_url($this->controller . '/product_action/' . $this->common->getDbValue($value_sub['id'])) ?>" class="list-icons-item text-primary-600" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a>
                                                <a href="#" class="list-icons-item text-danger-600 bootbox_custom_product" data-duid="<?php echo $this->common->getDbValue($value_sub['id']) ?>" data-popup="tooltip" title="" data-original-title="Delete"><i class="icon-trash"></i></a> 


                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>

                                    <?php } ?>


                                 

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } else {
                        ?>
                        <div class=" text-center  card-body border-top-info1">
                            No record found
                        </div>
                        <?php    
                            }?>
                    </div>
                    <!-- /basic datatable -->
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
// Setting datatable defaults
$.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
    language: {
        search: '<span>Filter:</span> _INPUT_',
        searchPlaceholder: 'Type to filter...',
        lengthMenu: '<span>Show:</span> _MENU_',
        paginate: {
            'first': 'First',
            'last': 'Last',
            'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
            'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
        }
    }
});



// Initialize
$('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity,
    dropdownAutoWidth: true,
    width: 'auto'
});

// Basic datatable
var lastIdx = null;
var table = $('.datatable-basicwti').DataTable({
    columnDefs: [{
        orderable: false,
        targets: [0,1,2,3,4]
    }],
    autoWidth: true,

    scrollCollapse: true,
    "paging": false,
    buttons: {
        buttons: [{
                extend: 'copyHtml5',
                className: 'd-none btn btn-light',
                text: '<i class="icon-copy3 mr-2"></i> Copy'
            },
            {
                extend: 'csvHtml5',
                className: 'd-none  btn btn-light',
                text: '<i class="icon-file-spreadsheet mr-2"></i> CSV',
                fieldSeparator: '\t',
                extension: '.tsv'
            },
            {
                extend: 'print',
                className: 'd-none  btn btn-light',
                text: '<i class="icon-printer mr-2"></i> Print table',
                autoPrint: false

            }
        ]
    },
    "bLengthChange": true, //thought this line could hide the LengthMenu
    "bInfo": true,
    "aaSorting": [],
    "bInfo": true,
    "bFilter": true,
    responsive: true,
});


$('.datatable-basicwti tbody').on('mouseover', 'td', function() {
            var colIdx = table.cell(this).index().column;

            if (colIdx !== lastIdx) {
                $(table.cells().nodes()).removeClass('active');
                $(table.column(colIdx).nodes()).addClass('active');
            }
        }).on('mouseleave', function() {
            $(table.cells().nodes()).removeClass('active');
        });
</script>

        <Script>
        // Custom bootbox dialog
        $('.bootbox_custom').on('click', function() {
            var duid = $(this).data("duid") // will return the number 123
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

                        location.href = "<?php echo site_url($this->controller . '/delete_category/') ?>" + duid;


                    }
                }
            });
        });
        $('.bootbox_custom_product').on('click', function() {
            var duid = $(this).data("duid") // will return the number 123
            bootbox.confirm({
                title: 'Confirm ',
                message: 'Are you sure you want to delete selected product ?',
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

                        location.href = "<?php echo site_url($this->controller . '/delete_product/') ?>" + duid;


                    }
                }
            });
        });

            // Basic functionality
         /*    $('#sortable-list-basic').sortable();
        $('#sortable-list-basic').disableSelection();
        $( "#sortable-list-basic" ).sortable({
        stop: function( ) {
            alert("22");
        }
    }); */
        </Script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#sortable-list-basic').sortable({
            opacity: '0.5',
            update: function(e, ui) {
                serial = jQuery(this).sortable("serialize");
                 console.log("serial ",serial);
                  jQuery.ajax({

                    url: "<?php echo site_url('story/sortcategory'); ?>",
                    
                    type: "POST",
                    data: serial,
                    // complete: function(){},
                    success: function(feedback) {
                      //  alert(feedback);
                        document.getElementById("temp_sortnos").value = feedback;
                        location.reload();
                    }
                    // error: function(){}
                }); 
            }
        });
    });

    
    </script>
</html>