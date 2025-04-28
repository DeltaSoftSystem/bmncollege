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
        <h3 class="page_name_title">Error 404</h3>
        <p class="page_breadcrumb">
            <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
            <i class="fa fa-angle-right next" aria-hidden="true"></i> Error 404
        </p>
    </section>



    <section class="slide_bx">
        <div class="container">

            <p class="rusa_txt text-center">
            Maybe this page moved? Got deleted? Is hiding out in quarantine? Never existed in the first place?
Let's go <a href="home">home</a> and try from there.
            </p>


        
        </div>
    </section>
 


    <?php $this->load->view('inc_footer'); ?>



    <?php $this->load->view('inc_common_footer_js'); ?>


</body>

</html>