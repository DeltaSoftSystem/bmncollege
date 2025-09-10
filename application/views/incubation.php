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

                    <!-- <div class="venture_table">

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



                    </div> -->



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

                        <!-- <h2 class="research_title bca">Ventures </h2> -->
                        <h2 class="research_title bca">Events Organised </h2>

                        <div class="tableFixHead">

                            <!-- <table>

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

                            </table> -->

                            <table style="width: 1130.05px;">
                                <tbody>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p><strong>Date</strong></p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p><strong>Details</strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 1013.05px;" colspan="2">
                                            <p><strong>Academic Year 2024 - 2025</strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p>27.07.2024</p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p>Conducted the Orientation of EECH for TYBCA students.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p>3.08.2024</p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p>Conducted the Orientation of EECH for SYBCA students.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p>21.08.2024</p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A guest lecture on " Understanding Entrepreneurship" was organized for sybca and tybca students.</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total 71 from Sybca and 90 from Tybca attended the lecture</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The resource person was Mr. Gaurang Shetty, chief Innovation Catalyst, riidl, Somaiya Vidyavihar, Mumbai.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p>03.12.2024</p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A guest lecture on " Business Proposal Making" was organized for sybca and tybca students.</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total 37 students from Sybca and Tybca attended the lecture</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The resource person was Mr. Shailesh B. Sargade, Assistant Professor, Mumbai Educational Trust, Bandra.</p>
                                            <p>&nbsp;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p>17.12.2024</p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A workshop on IDEATION was organized for BCA students under EECH on 17th December, 2024.</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A total of 23 students participated in the workshop.</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The resource person was Mr.Shreenivas Ransubhe, Ux Design Leadership Consultant, Mumbai.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p>26.01.2025</p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p>A MoU was signed between Research Innovation Incubation</p>
                                            <p>Design Laboratory Foundation, Somaiya Vidyavihar Mr Gaurang Shetty, Chief Innovation Catalyst and Prof. Mala Pandurang Principal, Dr. Bhanuben Mahendra Nanavati College of Home Science (Autonomous) under EECH Committee for</p>
                                            <p>Startup Incubation and Mentorship</p>
                                            <p>● The Second Party will offer guidance to scale and validate student</p>
                                            <p>business ideas.</p>
                                            <p>● Students will have access to riidl&rsquo;s infrastructure, mentorship and</p>
                                            <p>training programs.</p>
                                            <p>● Provide certification for training programs upon successful</p>
                                            <p>completion.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p>08.02.2025</p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Employability and Entrepreneurship Career Hub (EECH), in collaboration with the Alumnae Committee, organized an enriching alumni interaction session for the current TYBCA students on Saturday, 08th February 2025.</p>
                                            <p>&nbsp;</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The esteemed alumnae who shared their insights were:</p>
                                            <ol>
                                                <li>Ms. Himanshi Ajmera (2006-07) Project Manager, Deloitte</li>
                                                <li>Ms. Aishwarya Suryavanshi (Batch 2013-14), FinOps Associate, Nomura</li>
                                                <li>Ms. Sadaf Shaikh (Batch 2016-17), Consultant, PWC</li>
                                                <li>Ms. Sejal Hatiskar (Batch 2021-22), Manager, Jio Reliance</li>
                                            </ol>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The session proved to be an eye-opener for students, offering valuable perspectives on career planning and providing much-needed clarity about their future paths.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p>21.02.2025-</p>
                                            <p>22.02.2025</p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 95 SYBCA students visited riidl (Research Innovation Incubation Design Lab) of Somaiya college for a 2 day Somaiya Innovation and&nbsp; Impact Festival on 21st and 22nd February 2025.</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Students explored groundbreaking innovations, participated in interactive workshops, and engaged with industry experts. From inspired talks and startup showcases to hands-on creative activities like VR gaming, drone challenges, and art workshops, the festival provided a dynamic learning experience.</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The students thoroughly enjoyed the event, but more importantly, they gained valuable insights into innovation, entrepreneurship, and future industry trends.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p>20.03.2025</p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rinku Choudhary, Vanshika Jain, Anushree Lele participated&nbsp; in WISE SNDTWU INCUBATION CENTRE&rsquo;s IDEATION 3.0.</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Their topic was &ldquo;Dhoom Machale&rdquo; (Karaoke Room).</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; They were elemented after the 1st round and could not proceed further in the competition.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 95px;">
                                            <p>17.06.2025</p>
                                        </td>
                                        <td style="width: 918.047px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Orientation on Placement was conducted for TYBCA students by Ms. Neetu Singhi.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 94px;">
                                            <p>17.06.2025</p>
                                        </td>
                                        <td style="width: 919.094px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Orientation on Placement was conducted for TYBCA students by Ms. Neetu Singhi.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 94px;">
                                            <p>20.06.2025</p>
                                        </td>
                                        <td style="width: 919.094px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Orientation on EECH was conducted for SYBCA students by Ms. Neetu Singhi.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 94px;">
                                            <p>03.07.2025</p>
                                        </td>
                                        <td style="width: 919.094px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Orientation on EECH was conducted for FYBSC IT students by Ms. Neetu Singhi.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 94px;">
                                            <p>08.07.2025</p>
                                        </td>
                                        <td style="width: 919.094px;">
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A guest lecture on " Introduction to Entrepreneurship" was organized for sybca and fybsc IT students.</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A total of 36 students from SYBCA and&nbsp; 41 students from FYBSC-IT attended the lecture.</p>
                                            <p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The resource person was Mr. Akshay Shah, founder and CEO, iweb technology Solutions Pvt. Ltd, Mumbai.</p>
                                        </td>
                                    </tr>
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