<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('inc_header_title'); ?>

</head>

<body>
      <!-- Start Header Area -->
      <?php $this->load->view('inc_header_menu'); ?>
    <!-- end Header Area -->
    

    
  <div class="breadcrumb-outer-wrap">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo site_url('home')?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
      </nav>
    </div>
 </div>

 <section class="common-section">
    <div class="container">
      <div class="row align-items-center">
          <div class="col-12 col-sm-12 col-md-7 col-lg-5 col-xl-5" data-aos="fade-right"  data-aos-duration="800">
            <h1 class="color-blue mb20">We are committed to supply affordable, quality formulations.</h1>
            <p>Modavar Pharmaceuticals, LLC is a wholly-owned subsidiary of Cadila Pharmaceuticals, Ltd., Ahmedabad, India, and aims to emerge as a formulation sales and marketing arm of Cadila Pharmaceuticals into North America. </p>
            <p>Modavar, in conjunction with Cadila Pharmaceuticals, India is committed to supply affordable, quality formulations using some of the most aggressive research methods and cutting edge manufacturing processes.
            </p>
          </div>
          <div class="col-12 col-sm-12 col-md-5 col-lg-7 col-xl-7 text-right" data-aos="fade-left"  data-aos-duration="800">
            <div class="inner-slider-img">
              <img src="<?php echo base_url();?>assets/images/about.jpg" alt=""/>
            </div>
          </div>
      </div>
    </div>
</section>
 
  <section class="common-section our-purpose-outer-wrap bg-l-blue2">
      <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7"  data-aos="fade-up" data-aos-duration="900">
              <div class="our-purpose-inner-left">
                <h2>Our Purpose & Commitments</h2>
                <p>Modavar, in conjunction with Cadila Pharmaceuticals, India, is committed to supply affordable, quality formulations using some of the most aggressive research methods and cutting edge manufacturing processes.  </p>
                <p>We will discover, develop and successfully market pharmaceutical products to prevent, diagnose, alleviate and cure diseases. </p>
               
              </div>
            </div>
            <div class="col-md-5"  data-aos="fade-up" data-aos-duration="1600">
              <div class="our-purpose-inner-right">
                <img src="<?php echo base_url();?>assets/images/our-purpose.jpg" alt=""/>
              </div>
            </div>
          </div>

      </div>
  </section>


  <section class="common-section our-purpose-outer-wrap ">
    <div class="container">
        <h2>Our Office</h2>
        <div class="office-section-wrap">
              <div class="row">
                <div class="col-md-3">
                  <a href="#" data-bs-backdrop="false" data-bs-toggle="modal" data-bs-target="#video-wrraper">
                    <div class="office-img-wrap">
                      <img src="<?php echo base_url();?>assets/images/about.jpg" alt=""/>
                    </div>
                </a>
                </div>
                <div class="col-md-3">
                  <a href="#" data-bs-backdrop="false" data-bs-toggle="modal" data-bs-target="#video-wrraper">
                    <div class="office-img-wrap">
                      <img src="<?php echo base_url();?>assets/images/career.jpg" alt=""/>
                    </div>
                </a>
                </div>

                <div class="col-md-3">
                  <a href="#" data-bs-backdrop="false" data-bs-toggle="modal" data-bs-target="#video-wrraper">
                    <div class="office-img-wrap">
                      <img src="<?php echo base_url();?>assets/images/manufacturing-facilities.jpg" alt=""/>
                    </div>
                </a>
                </div>

                <div class="col-md-3">
                  <a href="#" data-bs-backdrop="false" data-bs-toggle="modal" data-bs-target="#video-wrraper">
                    <div class="office-img-wrap">
                      <img src="<?php echo base_url();?>assets/images/contract-manufacturing.jpg" alt=""/>
                    </div>
                </a>
                </div>
              </div>
        </div>

    </div>
</section>

  
    <!--== Start Footer Area Wrapper ==-->
    <?php $this->load->view('inc_footer'); ?>
    <?php $this->load->view('inc_common_footer_js'); ?>





   

</body>

</html>