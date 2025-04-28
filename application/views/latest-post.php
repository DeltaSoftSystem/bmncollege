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
        <h3 class="page_name_title">Latest Post</h3>
        <p class="page_breadcrumb">
            <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
            <i class="fa fa-angle-right next" aria-hidden="true"></i> Latest Post
        </p>
    </section>



    <section class="slide_bx">
        <div class="container">

            <?php
             foreach($results as $key => $records){
			?>
            <div class="post_bx_one">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="post_pic"><img src="<?php echo base_url();?><?php echo isset($records['featured_image']) ? '/uploads/news/'.$records['featured_image'] : '/assets/images/dummy_faculty.jpg'; ?>" alt="<?php echo isset($records['featured_image']) ? $records['featured_image'] : ''; ?>"></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="post_title_row">
                            <div class="post_title_l">
                                <?php echo isset($records['heading']) ? $records['heading'] : ''; ?></div>
                            <div class="post_title_r">
                                <?php
                        if(isset($records['pdf_file'])){    
                        ?>
                                <a href="<?php echo base_url();?>uploads/news/<?php echo isset($records['pdf_file']) ? $records['pdf_file'] : ''; ?>"
                                    target="_blank" title="<?php echo isset($records['pdf_file']) ? $records['pdf_file'] : ''; ?>">Download PDF</a>
                                <?php }?>
                            </div>
                        </div>
                        <div class="post_title_date">
                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <?php echo $this->common->getDateFormat($records['event_dates'],'F d, Y')?> &nbsp;|&nbsp;
                            Posted By: <?php echo isset($records['blogger_name']) ? $records['blogger_name'] : ''; ?>
                        </div>

                        <p class="post_txt">
                            <?php echo isset($records['descriptions']) ? $records['descriptions'] : ''; ?>
                            </span>
                        </p>
                        <button onclick="myFunction()" id="myBtn" class="abt_more">Read more</button>

                    </div>
                </div>
            </div>
            <?php } ?>


            <?php if($num_row>=$maxm){ ?>
            <div class="row">
                <div class="col-xl-12 text-center  ">
                    <ul class="pagination-flat justify-content-center twbs-flat pagination pull-right">
                        <?php echo $this->common->ajaxpagingnation_admin_new($start,$num_row,$maxm,'',$fun_name,$other_para); ?>

                    </ul>
                </div>
            </div>
            <?php } ?>

        </div>
    </section>

    <?php $this->load->view('inc_footer'); ?>



    <?php $this->load->view('inc_common_footer_js'); ?>

</body>

</html>