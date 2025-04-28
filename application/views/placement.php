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
        <h3 class="page_name_title">Placement</h3>
        <p class="page_breadcrumb"><a href="<?php echo site_url('home')?>"><i class="fa fa-home"
                    aria-hidden="true"></i>&nbsp; Home</a>
            <i class="fa fa-angle-right next" aria-hidden="true"></i> EECH
            <i class="fa fa-angle-right next" aria-hidden="true"></i> Placement
        </p>
    </section>

    <!--placed students-->
    <section class="about_bx">
        <div class="container">
            <h3 class="research_title">Placed Students (2023-2024)</h3>

            <div class="row">
                <section class="regular slider">
                    <?php
              //print_r($results);  
              foreach($results as $key => $records){
            ?>
                    <div>
                        <!--7-->
                        <div class="col-sm-12">
                            <div class="alumnae_hover">
                                <img src="<?php echo base_url();?>/uploads/gallery/<?php echo $records['slider_image']?>"
                                    alt="<?php echo $records['slider_text']?>">
                            </div>

                            <h3 class="pic_title placement">
                                <?php echo $records['slider_text']?> <span><?php echo $records['post_name']?> </span>
                            </h3>

                        </div>
                    </div>
                    <?php } ?>
                </section>
            </div>
        </div>
    </section>

    <!--companies logo-->
    <section class="slide_bx">
        <div class="container">
            <h3 class="research_title bca">Our Recruiters</h3>


            <div class="row">
                <?php
              //print_r($results);  
              foreach($recruiters as $key => $records){
            ?>
                <div class="col-sm-3">
                    <div class="placement_logo">
                        <img src="<?php echo base_url();?>/uploads/gallery/<?php echo $records['slider_image']?>"
                            alt="<?php echo $records['slider_text']?>" style="width:auto; height:160px">
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </section>

    <section class="ignou_tabs">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="research_title committee">Committee Members of B. Sc. Home Science</h3>
                    <div class="member_bx">
                        <?php
                    //print_r($results);  
                    foreach($committeemembers['Committee_Members_of_B_Sc_Home_Science'] as $key => $records){
                    ?>
                        <h4 class="incharge_title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <?php echo $records['heading']?> - <span><?php echo $records['post_name']?></span></h4>
                        <?php } ?>

                    </div>

                    <h3 class="research_title committee">M. Sc. CND</h3>
                    <div>
                        <?php
                    //print_r($results);  
                    foreach($committeemembers['M_Sc_CND'] as $key => $records){
                    ?>
                        <h4 class="incharge_title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <?php echo $records['heading']?> - <span><?php echo $records['post_name']?></span></h4>
                        <?php } ?>
                    </div>


                </div>
                <div class="col-sm-6">
                    <h3 class="research_title committee">Committee Members of Smt. K. G. Shah Department of Computer
                        Applications</h3>
                    <div>
                        <?php
                    //print_r($results);  
                    foreach($committeemembers['Committee_Members_of_Smt_K_G_Shah_Department_of_Computer_Applications'] as $key => $records){
                    ?>
                        <h4 class="incharge_title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <?php echo $records['heading']?> - <span><?php echo $records['post_name']?></span></h4>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="placement_add">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="placement_pic"><img src="<?php echo base_url();?>assets/images/placement_lady.png"
                            alt=""> </div>
                </div>
                <div class="col-sm-9">
                    <div class="placement_title">
                        <h3>Objectives of Placement Committee!</h3>
                        <h4>The objectives of the Placement Committee are specifically to:</h4>
                        <div class="placement_list">
                            <h3>1</h3>
                            <h2>
                                Look for 100% placement of all the students
                            </h2>
                        </div>

                        <div class="placement_list">
                            <h3>2</h3>
                            <h2>
                                Assisting different companies in recruiting candidates as per their requirements.
                            </h2>
                        </div>
                        <div class="placement_list">
                            <h3>3</h3>
                            <h2>
                                To help students get placed in renowned corporate houses
                            </h2>
                        </div>
                        <div class="placement_list">
                            <h3>4</h3>
                            <h2>
                            To help them become financially independent thereby empowering women
                            </h2>
                        </div>
                        <div class="placement_list">
                            <h3>5</h3>
                            <h2>
                            To identify suitable potential employers and help them achieve their hiring goals.
                            </h2>
                        </div>
                        <div class="placement_list">
                            <h3>6</h3>
                            <h2>
                            To organize activities concerning career planning.
                            </h2>
                        </div>
                        <div class="placement_list">
                            <h3>7</h3>
                            <h2>
                            To take feedback from industry and provide inputs for curriculum.
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="slide_bx">
        <div class="container">

            <h3 class="research_title bca">Events Organised in College</h3>


            <div class="row">

                <!--right-accordion-->
                <div class="col-sm-12">

                    <!--ventures-->
                    <div class="venture_table">

                        <div class="tableFixHead placement">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 120px;">Event Date</th>
                                        <th style="text-align: left;">Event/ Activities/ Particulars</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                        //print_r($placement_events);  
                        foreach($placement_events as $key => $records){
                        ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <?php echo isset($records['event_dates_from']) ? $this->common->getDateFormat($records['event_dates_from'], 'd M Y') : ''; ?>
                                            <?php echo (!empty($records['event_dates_to'])) ? ' to '.$this->common->getDateFormat($records['event_dates_to'], 'd M Y') : ''; ?>
                                        </td>
                                        <td><?php echo htmlspecialchars_decode($records['descriptions'])?></td>
                                    </tr>

                                    <?php } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>








                </div>
            </div>
        </div>
    </section>

    <section class="ignou_tabs">
        <div class="container">

            <h3 class="research_title bca">Webinar Conducted</h3>


            <div class="row">

                <!--right-accordion-->
                <div class="col-sm-12">

                    <!--ventures-->
                    <div class="venture_table">

                        <div class="tableFixHead placement">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 120px;">Event Date</th>
                                        <th style="text-align: left;">Event/ Activities/ Particulars</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                        //print_r($placement_events);  
                        foreach($placement_Webinar as $key => $records){
                            //print_r($records);
                        ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <?php echo isset($records['event_dates_from']) ? $this->common->getDateFormat($records['event_dates_from'], 'd M Y') : ''; ?>
                                            <?php echo (!empty($records['event_dates_to'])) ? '<br> to <br>'.$this->common->getDateFormat($records['event_dates_to'], 'd M Y') : ''; ?>
                                        </td>
                                        <td><?php echo htmlspecialchars_decode($records['descriptions'])?></td>
                                    </tr>

                                    <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>








                </div>
            </div>
        </div>
    </section>


    <?php $this->load->view('inc_footer'); ?>



    <?php $this->load->view('inc_common_footer_js'); ?>


</body>

</html>