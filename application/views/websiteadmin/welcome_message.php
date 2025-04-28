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
                                <span class="breadcrumb-item active"><?php echo (isset($title)) ? $title : '' ?></span>
                            </div>
                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>


                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-xl-2">

                            <div class="card bg-primary text-white">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title">Total Blogs</h6>
                                </div>
                                <div class="card-body">
                                    297
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-2">

                            <div class="card bg-primary text-white">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title">Total Testimonials1</h6>
                                </div>
                                <div class="card-body">
                                    297
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-2">

                            <div class="card bg-primary text-white">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title">Total Testimonials2</h6>
                                </div>
                                <div class="card-body">
                                    297
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-2">

                            <div class="card bg-primary text-white">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title">Total Events</h6>
                                </div>
                                <div class="card-body">
                                    297
                                </div>
                            </div>

                        </div>
                    </div>
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

    </body>

</html>