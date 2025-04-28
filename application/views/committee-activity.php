<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php $this->load->view('inc_header_title'); ?>

</head>

<body>

    <!--header start here-->

    <?php $this->load->view('inc_header_menu'); ?>

    <!--header close here-->

    <section class="page_name">
        <h3 class="page_name_title">Committee Activities</h3>
        <p class="page_breadcrumb">
            <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
            <i class="fa fa-angle-right next" aria-hidden="true"></i> Committees
            <i class="fa fa-angle-right next" aria-hidden="true"></i> College Level
            <i class="fa fa-angle-right next" aria-hidden="true"></i> Committee Activities
        </p>
    </section>



    <section class="slide_bx">
        <div class="container">
            <div class="row">


                <?php
            //print_r($results);  
             foreach($results as $key => $records){
			?>
                <div class="col-sm-4">
                    <div class="activity_bx">
                        <img src="<?php echo base_url();?><?php echo isset($records['featured_image']) ? '/uploads/events/'.$records['featured_image'] : '/assets/images/activity-event.jpg'; ?>"
                            alt="<?php echo isset($records['featured_image']) ? $records['featured_image'] : 'activity-event'; ?>">

                        <div class="activity_cont">
                            <h3 class="activity_title">
                                <?php echo isset($records['heading']) ? $records['heading'] : ''; ?>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $this->common->getDateFormat($records['event_dates'],'d M Y')?> &nbsp; |
                                    &nbsp;
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <?php echo isset($records['event_time']) ? $records['event_time'] : ''; ?> &nbsp; |
                                    &nbsp;
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                    <?php echo isset($records['location']) ? $records['location'] : ''; ?>

                                </span>
                            </h3>
                            <p><?php echo isset($records['descriptions']) ? $records['descriptions'] : ''; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>



            </div>
        </div>
    </section>

    <?php $this->load->view('inc_footer'); ?>



    <?php $this->load->view('inc_common_footer_js'); ?>



</body>

</html>