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
        <h3 class="page_name_title">Testimonials</h3>
        <p class="page_breadcrumb">
            <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
            <i class="fa fa-angle-right next" aria-hidden="true"></i> About Us
            <i class="fa fa-angle-right next" aria-hidden="true"></i> Testimonials
        </p>
    </section>



    <section class="slide_bx">
        <div class="container">


            <h3 class="research_title bca">Success Stories of our students</h3>
            <p class="testi_txt">We thank all of our students to give us an opportunity to work on key challenges and
                help us to accomplish same!!</p>

            <?php
              //print_r($results);  
              if(!empty($results)){
                foreach($results as $key => $records){
                    $key_sr = $key+1;
    
                    if($key_sr%2==0){
                ?>
            <div class="testi_one">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="testimonial_txt">
                            <?php echo isset($records['testimonial']) ? $records['testimonial'] : ''; ?></div>
                    </div>
                    <div class="col-sm-3">
                        <div class="testimonial_pic">

                            <img src="<?php echo base_url();?><?php echo (isset($records['from_image'])) ? '/uploads/testimonials/'.$records['from_image'] : '/assets/images/activity-event.jpg'; ?>"
                                alt="<?php echo isset($records['from_name']) ? $records['from_name'] : 'testimonial'; ?>">
                            <h3><?php echo isset($records['from_name']) ? $records['from_name'] : ''; ?>
                                <span>- <?php echo isset($records['post_name']) ? $records['post_name'] : ''; ?></span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else {?>
            <!--2-->

            <div class="testi_one">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="testimonial_pic">
                            <img src="<?php echo base_url();?><?php echo (isset($records['from_image'])) ? '/uploads/testimonials/'.$records['from_image'] : '/assets/images/activity-event.jpg'; ?>"
                                alt="<?php echo isset($records['from_name']) ? $records['from_name'] : 'testimonial'; ?>">
                            <h3><?php echo isset($records['from_name']) ? $records['from_name'] : ''; ?>
                                <span>- <?php echo isset($records['post_name']) ? $records['post_name'] : ''; ?></span>
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="testimonial_txt">
                            <?php echo isset($records['testimonial']) ? $records['testimonial'] : ''; ?></div>
                    </div>
                </div>
            </div>

            <?php }?>
            <?php }        
              }
              
       ?>
        </div>
    </section>


    <?php $this->load->view('inc_footer'); ?>



    <?php $this->load->view('inc_common_footer_js'); ?>


</body>

</html>