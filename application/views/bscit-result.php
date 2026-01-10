<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

    <?php $this->load->view('inc_header_title'); ?>

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/easy-responsive-tabs.css">



</head>



<body>



    <!--header start here-->



    <?php $this->load->view('inc_header_menu'); ?>



    <!--header close here-->



    <section class="page_name">

        <h3 class="page_name_title">BSC IT Results</h3>

        <p class="page_breadcrumb">

            <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>

            <i class="fa fa-angle-right next" aria-hidden="true"></i> Exam

            <i class="fa fa-angle-right next" aria-hidden="true"></i> Final Results

            <i class="fa fa-angle-right next" aria-hidden="true"></i> BSC IT

        </p>

    </section>







    <!--<section class="slide_bx">

    <div class="container">

        <div class="under_construction">

            <div class="under_txt">

                <h3 class="under_title"><span>Oops!</span> Under Maintenance</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dignissim tellus in elit tempor convallis. Nunc egestas felis urna, at elementum ligula luctus ac. In ex felis, finibus vel sollicitudin sit amet, congue eu orci. Quisque hendrerit sapien et velit bibendum, vel aliquam urna molestie. Donec et consequat mi</p>

            </div>

            <div class="under_pic"><img src="<?php echo base_url();?>assets/images/under-construction.jpg" alt=""> </div>

        </div>

    </div>

</section>-->

    <section class="ignou_tabs">

        <div class="container">



            <div class="a">

                <div id="horizontalTab">

                    <ul class="resp-tabs-list">

                        <?php

                //print_r($results);  

                foreach($results as $key1 => $degree_year){

                     $key1 = base64_decode($key1);

                ?>

                        <li><?php echo $key1?></li>

                        <?php } ?>

                    </ul>

                    <div class="resp-tabs-container">

                    <?php

                //print_r($results);  

                foreach($results as $key1 => $degree_year){

                   

                ?>

                        <!--<?php echo $key1?> tab-->

                        <div>

                            <div class="result_pdf">

                                <ul>

                                    <?php

                            foreach($degree_year as $key2 => $records){

                        ?>

                                    <li><a href="<?php echo base_url();?>uploads/cms/result/<?php echo isset($records['pdf_file']) ? $records['pdf_file'] : ''; ?>"  target="_blank"><i class="fa fa-paperclip" aria-hidden="true"></i>

                                            <?php echo isset($records['semester']) ? $records['semester'] : ''; ?></a>

                                    </li>

                                    <?php } ?>

                                </ul>

                            </div>

                        </div>



                        <?php } ?>



                    </div>

                </div>

            </div>



        </div>

    </section>





    <?php $this->load->view('inc_footer'); ?>







    <?php $this->load->view('inc_common_footer_js'); ?>

    <script src="<?php echo base_url()?>assets/js/easy-responsive-tabs.js"></script>

    <script>

    $(document).ready(function() {

        $('#horizontalTab').easyResponsiveTabs({

            type: 'default', //Types: default, vertical, accordion           

            width: 'auto', //auto or any width like 600px

            fit: true, // 100% fit in a container

            closed: 'accordion', // Start closed if in accordion view

            activate: function(event) { // Callback function if tab is switched

                var $tab = $(this);

                var $info = $('#tabInfo');

                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();

            }

        });

        $('#verticalTab').easyResponsiveTabs({

            type: 'vertical',

            width: 'auto',

            fit: true

        });

    });

    </script>



</body>



</html>