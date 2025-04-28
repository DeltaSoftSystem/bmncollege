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
        <h3 class="page_name_title">Incubation</h3>
        <p class="page_breadcrumb"><a href="<?php echo site_url('home')?>"><i class="fa fa-home"
                    aria-hidden="true"></i>&nbsp; Home</a>
            <i class="fa fa-angle-right next" aria-hidden="true"></i> EECH
            <i class="fa fa-angle-right next" aria-hidden="true"></i> Incubation
        </p>
    </section>



    <section class="slide_bx">
        <div class="container">
            <div class="row">


                <!--right-accordion-->
                <div class="col-sm-12">


                    <!--event-slider-->
                    <div class="venture_table">
                        <h2 class="research_title bca">Upcoming Events </h2>
                        <section class="lazy slider" data-sizes="50vw">
                        <?php
                        //print_r($results);  
                        foreach($results as $key => $records){
                        ?>  
                            <div>
                                <div class="incubation_slide">
                                <img src="<?php echo base_url();?><?php echo isset($records['featured_image']) ? '/uploads/cms/incubation/'.$records['featured_image'] : '/assets/images/activity-event.jpg'; ?>"
            alt="<?php echo isset($records['name']) ? $records['name'] : 'Incubation-event'; ?>">
            <div class="incubation_centered"><?php echo isset($records['name']) ? $records['name'] : 'Incubation-event'; ?></div>
                                </div>
                            </div>
                        <?php } ?>  


                        </section>

                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="wings_logo"><img src="<?php echo base_url();?>assets/images/wings_logo.png"
                                    alt=""> </div>
                        </div>

                        <div class="col-md-9">
                            <h2 class="research_title">Introduction to “WINGS”</h2>
                            <h6 class="wings_title"><span>WINGS</span>- “<span>W</span>omen’s <span>I</span>ncubation
                                cell for <span>G</span>rowth and <span>S</span>upport”.
                                <!--<p>WINGS an innovative undertaking by Dr. BMN College provides support and guidance to our student entrepreneurs and helps them during the initial turbulent times. WINGS provides these entrepreneurs with the initial required programs and resources in the form of guidance, publicity, and mentoring.</p>-->
                            </h6>

                            <div class="incubation_txt">
                                <p>WINGS an innovative undertaking by Dr. BMN College provides support and guidance to
                                    our student entrepreneurs and helps them during the initial turbulent times. WINGS
                                    provides these entrepreneurs with the initial required programs and resources in the
                                    form of guidance, publicity, and mentoring.</p>

                                <p>The Logo is designed by one of our students which depicts that the women can spread
                                    their wings by starting their own venture.</p>
                                <p>As the logo depicts, when given the wings and freedom of flying women can fly high
                                    with their aspirations and talents. We at Dr. BMN College have created this platform
                                    called WINGS which intends to encourage such women entrepreneurs so that they can
                                    reach their ambitions and soar high.</p>
                            </div>


                        </div>

                    </div>

                    <!--ventures-->
                    <div class="venture_table">
                        <h2 class="research_title bca">Ventures </h2>
                        <div class="tableFixHead">
                            <table>
                                <thead style="background-color: #f3b5db;">
                                    <tr>
                                        <th style="text-align: center;">Sr. No.</th>
                                        <th style="text-align: left;">Name</th>
                                        <th style="text-align: left;">Venture</th>
                                        <th style="text-align: center;">Link (PDF Link)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                //print_r($results_ventures);  
                                foreach($results_ventures as $key => $records){
                                    $sr = $key+1;
                                    $sr = ($sr<10) ? '0'.$sr : $sr;
                                ?>    
                                    <tr>
                                        <td style="text-align: center;"><?php echo $sr?></td>
                                        <td><?php echo isset($records['name']) ? $records['name'] : ''; ?></td>
                                        <td style="text-align: left;"><?php echo isset($records['venture_name']) ? $records['venture_name'] : ''; ?></td>
                                        <td style="text-align: center;">
                                        <?php
                                        if(isset($records['pdf_file']) && $records['pdf_file']!=""){
                                        ?>
                                    <a href="<?php echo base_url();?>uploads/cms/incubation/<?php echo isset($records['pdf_file']) ? $records['pdf_file'] : ''; ?>" target="_blank" class="pdf_link">PDF Catalogue</a>
                                    <?php }?>
                                      
                                        </td>
                                    </tr>
                                    <?php } ?>  
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--<div class="inc_adv">
                <a href="#" class="incubation_link">Advertisements</a>
               </div> -->




                </div>
            </div>
        </div>
    </section>


    <?php $this->load->view('inc_footer'); ?>



    <?php $this->load->view('inc_common_footer_js'); ?>


    <script src="<?php echo base_url()?>assets/js/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).on('ready', function() {

        $(".lazy").slick({
            lazyLoad: 'ondemand', // ondemand progressive anticipated
            autoplay: true,
            infinite: true,
            autoplaySpeed: 2000,
            dots: true
        });
    });
    </script>
</body>

</html>