<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('websiteadmin/inc_metacss');?>
    <link rel="stylesheet" href="<?php echo base_url() ?>websiteadmin/assets/css/bootstrap-datepicker.css"
        type="text/css" />

    <script type="text/javascript" src="<?php echo base_url() ?>websiteadmin/assets/js/bootstrap-datepicker.js">
    </script>

    <!-- Theme JS files -->
    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/visualization/c3/c3.min.js"></script>
    <style>
    
    .heightfixed{
        height: 310px;
        overflow-y: hidden;
    }
    .heightfixed2{
        height: 120px;
        overflow-y: hidden;
    }
    
    .row-sm>div {
        padding-left: 10px;
        padding-right: 10px;
    }

    .rounded {
        border-radius: 3px !important;
    }

    .t-15 {
        top: 16px;
    }

    .r-5 {
        right: 12px;
    }

    .pos-absolute {
        position: absolute;
    }

    .square-8 {
        display: inline-block;
        width: 8px;
        height: 8px;
    }

    .rounded-circle {
        border-radius: 50%;
    }

    .bg-danger {
        background-color: #dc3545 !important;
    }

    .pd-25 {
        padding: 25px;
    }

    .align-items-center {
        align-items: center !important;
    }

    .d-flex {
        display: flex !important;
    }

    .tx-60 {
        font-size: 60px;
    }

    .lh-0 {
        line-height: 0;
    }

    .tx-white {
        color: #fff;
    }

    .op-7 {
        opacity: 0.7;
    }

    .ion-bag:before {
        content: "\f110";
    }

    .mg-l-20 {
        margin-left: 20px;
    }

    .tx-10 {
        font-size: 10px;
    }

    .tx-uppercase {
        text-transform: uppercase;
    }

    .tx-spacing-1 {
        letter-spacing: 0.5px;
    }

    .tx-white-8 {
        color: rgba(255, 255, 255, 0.8);
    }

    .tx-mont {
        font-family: "Montserrat", "Fira Sans", "Helvetica Neue", Arial, sans-serif;
    }

    .tx-medium {
        font-weight: 500;
    }

    .mg-b-10 {
        margin-bottom: 10px;
    }

    .tx-24 {
        font-size: 24px;
    }

    .lh-1 {
        line-height: 1.1;
    }

    .tx-white {
        color: #fff;
    }

    .tx-lato {
        font-family: "Lato", "Helvetica Neue", Arial, sans-serif;
    }

    .tx-bold {
        font-weight: 700;
    }

    .mg-b-2 {
        margin-bottom: 2px;
    }

    .tx-11 {
        font-size: 11px;
    }

    .tx-white-6 {
        color: rgba(255, 255, 255, 0.6);
    }

    .tx-roboto {
        font-family: "Roboto", "Helvetica Neue", Arial, sans-serif;
    }

    .tileswti .card-body {
        height: 108px;
    }

    .testimonial {
        background-image: url("<?php echo base_url()?>websiteadmin/global_assets/testimonial.png");
        background-repeat: no-repeat;
        background-position-y: center;
        background-position-x: 20px;
    }

    .email {
        background-image: url("<?php echo base_url()?>websiteadmin/global_assets/email.png");
        background-repeat: no-repeat;
        background-position-y: center;
        background-position-x: 20px;
    }

    .price-tag {
        background-image: url("<?php echo base_url()?>websiteadmin/global_assets/price-tag.png");
        background-repeat: no-repeat;
        background-position-y: center;
        background-position-x: 20px;

    }

    .lotus {
        background-image: url("<?php echo base_url()?>websiteadmin/global_assets/lotus.png");
        background-repeat: no-repeat;
        background-position-y: center;
        background-position-x: 20px;

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
                            <a href="<?php echo site_url("websiteadmin/dashboard"); ?>" class="breadcrumb-item"><i
                                    class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active"><?php echo (isset($title)) ? $title : '' ?></span>
                        </div>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->
            <!-- Content area -->
            <div class="content">
                <!-- Quick stats boxes -->

                <div class="row tileswti">

                    <div class="col">
                        <a href="<?php echo site_url('websiteadmin/notice/listshow')?>">
                            <div class="card bg-info-300">
                                <div class="lotus1 card-body">
                                    <i class="icon-clipboard3 icon-3x"></i>
                                    <div class="d-flex align-items-center float-right">
                                        <div class="mg-l-20">

                                            <p
                                                class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10 text-right">
                                                Manage Notice</p>
                                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1 text-right">
                                                <?php echo (isset($wti_m_notice)) ? $wti_m_notice :0; ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="<?php echo site_url('websiteadmin/news/listshow')?>">
                            <div class="card bg-primary-800">
                                <div class="lotus1 card-body">
                                    <i class="icon-magazine icon-3x"></i>
                                    <div class="d-flex align-items-center float-right">
                                        <div class="mg-l-20">

                                            <p
                                                class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10 text-right">
                                                Manage Post</p>
                                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1 text-right">
                                                <?php echo (isset($wti_t_newsblogs)) ? $wti_t_newsblogs :0; ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="<?php echo site_url("websiteadmin/events/listshow");?>">
                            <div class="card bg-purple-400">
                                <div class="email1 card-body">
                                    <i class="icon-calendar icon-3x"></i>
                                    <div class="d-flex align-items-center float-right">
                                        <div class="mg-l-20">
                                            <p
                                                class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10 text-right">
                                                Manage Event</p>
                                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1 text-right">
                                                <?php echo (isset($wti_m_events)) ? $wti_m_events :0; ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="<?php echo site_url("websiteadmin/contactus/listall");?>">
                            <div class="card bg-success-400">
                                <div class="email1 card-body">
                                    <i class="icon-envelop3 icon-3x"></i>
                                    <div class="d-flex align-items-center float-right">
                                        <div class="mg-l-20">
                                            <p
                                                class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10 text-right">
                                                Manage Contactus</p>
                                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1 text-right">
                                                <?php echo (isset($wti_t_contactus)) ? $wti_t_contactus :0; ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="<?php echo site_url("websiteadmin/admissionenquiry/listall");?>">
                            <div class="card bg-orange-600">
                                <div class="email1 card-body">
                                    <i class="icon-phone-incoming icon-3x"></i>
                                    <div class="d-flex align-items-center float-right">
                                        <div class="mg-l-20">
                                            <p
                                                class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10 text-right">
                                                Admission Enquiry</p>
                                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1 text-right">
                                                <?php echo (isset($wti_t_admission_enquiry)) ? $wti_t_admission_enquiry :0; ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row tileswti">
                    
                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Scrollable table -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Latest Message</h5>

                                <div class="list-icons ml-3">
                                <a href="<?php echo site_url("websiteadmin/contactus/listall");?>" data-popup="tooltip" title="View All" data-container="body"><i class="icon-menu7"></i></a>
                                </div>
                            </div>


                            <div class="table-responsive table-scrollable heightfixed">
                                <table class="table">
                                    <thead>
                                    <tr class="bg-blue">
                                            
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($wti_t_contactus_resultdata as $key => $wti_t_contactus){
                                        ?>
                                        <tr>
                                            
                                            <td><?php echo $wti_t_contactus['contact_fname']?></br><?php echo $wti_t_contactus['contact_email']?></br><?php echo $wti_t_contactus['contact_phone']?></td>
                                            
                                            <td><?php echo $wti_t_contactus['contact_subject']?></td>
                                            <td><?php echo isset($wti_t_contactus['add_date']) ? $this->common->getDateFormat($wti_t_contactus['add_date'], DATE_FORMAT_PHP) : ''; ?></td>
                                            <td class="text-center"><a href="<?php echo site_url('websiteadmin/contactus/editdata/'.$wti_t_contactus['id'])?>" class="list-icons-item text-primary-600" data-popup="tooltip" title="Edit" data-container="body"><i class="icon-pencil7"></i></a></td>
                                        </tr>
                                         <?php 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /scrollable table -->
                    </div>
                    <div class="col-md-6">
                        <!-- Scrollable table -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Latest Enquiry</h5>
                                <div class="list-icons ml-3">
                                <a href="<?php echo site_url("websiteadmin/admissionenquiry/listall");?>" data-popup="tooltip" title="View All" data-container="body"><i class="icon-menu7"></i></a>
                                </div>
                            </div>



                            <div class="table-responsive table-scrollable  heightfixed">
                            <table class="table">
                                    <thead>
                                    <tr class="bg-blue">
                                            
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($wti_t_admission_enquiry_resultdata as $key => $wti_t_admission_enquiry){
                                        ?>
                                        <tr>
                                            
                                            <td><?php echo $wti_t_admission_enquiry['full_name']?></br><?php echo $wti_t_admission_enquiry['email_addrress']?></br><?php echo $wti_t_admission_enquiry['contact_number']?></td>
                                            
                                            <td><?php echo $wti_t_admission_enquiry['program']?></td>
                                            <td><?php echo isset($wti_t_admission_enquiry['add_date']) ? $this->common->getDateFormat($wti_t_admission_enquiry['add_date'], DATE_FORMAT_PHP) : ''; ?></td>
                                            <td class="text-center"><a href="<?php echo site_url('websiteadmin/admissionenquiry/editdata/'.$wti_t_admission_enquiry['id'])?>" class="list-icons-item text-primary-600" data-popup="tooltip" title="Edit" data-container="body"><i class="icon-pencil7"></i></a></td>
                                        </tr>
                                         <?php 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /scrollable table -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- My messages -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">Notice</h6>
                                <div class="header-elements">
                                <a href="<?php echo site_url("websiteadmin/notice/listshow");?>"  data-popup="tooltip" title="View All" data-container="body"><i class="icon-menu7"></i></a>

                                </div>
                            </div>

                            <div class="card-body  heightfixed2">
                                <ul class="media-list">

                                <?php
                                      $i=0;
                                     
                                      foreach($wti_m_notice_list as $key => $value){
                                          $i++;
                                          $status = $this->common->getDbValue($value['status_flag']);
									  ?>
                                    <li class="media">
                                         

                                        <div class="media-body">
                                            <div class="d-flex justify-content-between">
                                                <a href="<?php echo site_url('websiteadmin/notice/notice_action/'.$value['uuid'])?>"><?php echo substr($this->common->getDbValue($value['heading']),0,100); ?> </a>
                                                <span class="font-size-sm text-muted"><?php echo isset($value['event_dates']) ? $this->common->getDateFormat($value['event_dates'], DATE_FORMAT_PHP) : ''; ?></span>
                                            </div>


                                        </div>
                                    </li>
                                    <?php 
                                        }
                                        ?>
                                    

                                </ul>
                            </div>






                        </div>
                        <!-- /my messages -->

                    </div>
                    <div class="col-md-4">
                        <!-- My messages -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">Event</h6>
                                <div class="header-elements">
                                    <div class="list-icons ml-3">
                                    <a href="<?php echo site_url("websiteadmin/events/listshow");?>"  data-popup="tooltip" title="View All" data-container="body"><i class="icon-menu7"></i></a>
                                    </div>

                                </div>
                            </div>

                            <div class="card-body  heightfixed2">
                                <ul class="media-list">
                                <?php
                                      $i=0;
                                     
                                      foreach($wti_m_events_list as $key => $value){
                                          $i++;
                                          $status = $this->common->getDbValue($value['status_flag']);
									  ?>
                                    <li class="media">
                                         

                                        <div class="media-body">
                                            <div class="d-flex justify-content-between">
                                                <a href="<?php echo site_url('websiteadmin/events/events_action/'.$value['uuid'])?>"><?php echo substr($this->common->getDbValue($value['heading']),0,100); ?> </a>
                                                <span class="font-size-sm text-muted"><?php echo isset($value['event_dates']) ? $this->common->getDateFormat($value['event_dates'], DATE_FORMAT_PHP) : ''; ?></span>
                                            </div>


                                        </div>
                                    </li>
                                    <?php 
                                        }
                                        ?>

                                </ul>
                            </div>






                        </div>
                        <!-- /my messages -->

                    </div>
                    <div class="col-md-4">
                        <!-- My messages -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">Post</h6>
                                <div class="header-elements">
                                    <div class="list-icons ml-3">
                                    <a href="<?php echo site_url("websiteadmin/news/listshow");?>"  data-popup="tooltip" title="View All" data-container="body"><i class="icon-menu7"></i></a>
                                    </div>

                                </div>
                            </div>

                            <div class="card-body  heightfixed2">
                                <ul class="media-list">
                                <?php
                                      $i=0;
                                     
                                      foreach($wti_t_newsblogs_list as $key => $value){
                                          $i++;
                                          $status = $this->common->getDbValue($value['status_flag']);
									  ?>
                                    <li class="media">
                                         

                                        <div class="media-body">
                                            <div class="d-flex justify-content-between">
                                                <a href="<?php echo site_url('websiteadmin/news/news_action/'.$value['uuid'])?>"><?php echo substr($this->common->getDbValue($value['heading']),0,100); ?> </a>
                                                <span class="font-size-sm text-muted"><?php echo isset($value['event_dates']) ? $this->common->getDateFormat($value['event_dates'], DATE_FORMAT_PHP) : ''; ?></span>
                                            </div>


                                        </div>
                                    </li>
                                    <?php 
                                        }
                                        ?>

                                </ul>
                            </div>






                        </div>
                        <!-- /my messages -->

                    </div>
                </div>
                <!-- /quick stats boxes -->
                <!-- Main charts -->

                <!-- /main charts -->
            </div>
            <!-- /content area -->
            <!-- Footer -->
            <?php $this->load->view('websiteadmin/inc_footer');?>
            <!-- /footer -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->

    <?php //this->load->view('inc_footer_firebase');?>
</body>
<script>
// Datatable with saving state
// Scrollable datatable
var table = $('.dashboarddatatable').DataTable({
    columnDefs: [{
        orderable: false,
        targets: [0]
    }],
    autoWidth: true,
    scrollX: true,
    scrollY: '35vh',
    scrollCollapse: false,
    "paging": false,
    "bLengthChange": false, //thought this line could hide the LengthMenu
    "bInfo": false,
    "aaSorting": [],
    /*  fixedColumns : {
					leftColumns : 2,
					rightColumns : 1
				},  */
    "bFilter": false,
    responsive: true,
});
// Define charts elements
var line_chart_element = document.getElementById('c3-line-chart');
// Line chart
if (line_chart_element) {
    // Generate chart
    var line_chart = c3.generate({
        bindto: line_chart_element,
        point: {
            r: 4
        },
        color: {
            pattern: ['#1075bd', '#F4511E', '#1E88E5']
        },
        data: {
            x: 'x',
            columns: [
                ['x', <?php echo $days_str; ?>],
                ["<?php echo $date_sales_graph?>", <?php echo $days_array_final_str; ?>]
            ],
            type: 'spline'
        },
        grid: {
            y: {
                show: true
            }
        },
        axis: {
            x: {
                label: 'Month'
            },
            y: {
                label: 'Total Amount (In Kip)'
            }
        }
    });
    // Resize chart on sidebar width change
    $('.sidebar-control').on('click', function() {
        line_chart.resize();
    });
}
var donut_chart_element = document.getElementById('c3-donut-chart');
// Donut chart
if (donut_chart_element) {
    var donut_chart = c3.generate({
        bindto: donut_chart_element,
        size: {
            width: 350
        },
        color: {
            pattern: ['#3F51B5', '#FF9800', '#4CAF50', '#00BCD4', '#F44336']
        },
        data: {
            columns: [
                ["<?php echo (isset($topproduct[0]['name'])) ? $topproduct[0]['name']  :'' ?>",
                    "<?php echo (isset($topproduct[0]['name'])) ? $topproduct[0]['topproduct']  :'' ?>"
                ],
                ["<?php echo (isset($topproduct[1]['name'])) ? $topproduct[1]['name']  :'' ?>",
                    "<?php echo (isset($topproduct[1]['topproduct'])) ? $topproduct[1]['topproduct']  :0 ?>"
                ],
                ["<?php echo (isset($topproduct[2]['name'])) ? $topproduct[2]['name']  :'' ?>",
                    "<?php echo (isset($topproduct[2]['topproduct'])) ? $topproduct[2]['topproduct']  :0 ?>"
                ],
                ["<?php echo (isset($topproduct[3]['name'])) ? $topproduct[3]['name']  :'' ?>",
                    "<?php echo (isset($topproduct[3]['topproduct'])) ? $topproduct[3]['topproduct']  :0 ?>"
                ],
                ["<?php echo (isset($topproduct[4]['name'])) ? $topproduct[4]['name']  :'' ?>",
                    "<?php echo (isset($topproduct[4]['topproduct'])) ? $topproduct[4]['topproduct']  :0 ?>"
                ],
            ],
            type: 'donut'
        },
        donut: {
            title: "Top <?php echo sizeof($topproduct);?> products"
        }
    });
    // Resize chart on sidebar width change
    $('.sidebar-control').on('click', function() {
        donut_chart.resize();
    });

}
// Single picker
$('.daterange-single').daterangepicker({
    singleDatePicker: true,
    locale: {
        format: 'YYYY-MM-DD'
    }
});
</script>
<script>
$(document).ready(function() {
    // month selector
    $('.datepicker').datepicker({
        autoclose: true,
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months"

    });


});
</script>

</html>