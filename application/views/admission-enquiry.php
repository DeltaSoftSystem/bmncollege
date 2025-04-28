<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php $this->load->view('inc_header_title'); ?>
    <style type="text/css">
    .hidedefault {
        display: none;
    }
    </style>
</head>

<body>

    <!--header start here-->

    <?php $this->load->view('inc_header_menu'); ?>

    <!--header close here-->

    <section class="page_name">
        <h3 class="page_name_title">Admission Enquiry</h3>
        <p class="page_breadcrumb">
            <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
            <i class="fa fa-angle-right next" aria-hidden="true"></i> Admission
            <i class="fa fa-angle-right next" aria-hidden="true"></i> Admission Enquiry
        </p>
    </section>



    <section>
        <!--class="slide_bx"-->
        <div class="container">

            <?php
 
$admissionenquiry_message = "";

  $sql = "select * from  `wti_m_setting` where `group_name`='admissionenquiry_message'";
 $query = $this->db->query($sql);
 if ($query->num_rows() > 0) {
     $resultdata = $query->row_array();
     $admissionenquiry_message = $resultdata['value'];
 }
?>
            <div class="row">
                <div class="col-sm-12 mt-4">
                    <div id="message-contact"><?php echo $admissionenquiry_message?>
                    </div>
                </div>

            </div>

            <div class="row">


                <!--left Form contact form-->
                <div class="col-sm-8">

                    <div class="enquiry_bx">
                        <h3 class="research_title">Enquiry Form</h3>
                        <div id="message-contact">

                            <div id="success_div" class="hidedefault alert alert-success"> This is a success message.
                            </div>
                            <div id="err_div" class="hidedefault alert alert-danger"> This is a error message.</div>

                        </div>
                        <form name="frm-admission-enquiry" id="frm-admission-enquiry"
                            action="<?php echo site_url($this->uri->segment(1)) ?>" method="post">
                            <input type="hidden" name="mode" id="mode" value="admission-enquiry">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="cont_field_txt">Your Name <span>*</span> </h5>
                                    <input name="full_name" id="full_name" type="text"
                                        class="form-control input_pop border-danger " placeholder="" required1 />
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="cont_field_txt">Contact Number <span>*</span> </h5>
                                    <input name="contact_number" id="contact_number" type="text"
                                        class="form-control input_pop validateMobile" placeholder="" required1 />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="cont_field_txt">Email Id <span>*</span> </h5>
                                    <input name="email_addrress" id="email_addrress" type="text"
                                        class="form-control input_pop" placeholder="" required1 />
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="cont_field_txt">City </h5>
                                    <input name="city" id="city" type="text" class="form-control input_pop"
                                        placeholder="" />
                                </div>
                            </div>



                            <div class="col-sm-12">
                                <h5 class="cont_field_txt">Select Programs <span>*</span></h5>
                                <select name="program" id="program" class="form-select input_pop"
                                    aria-label="Default select example">
                                    <option value="">Select Programs</option>
                                    <option value="B.Sc Human Development"> B.Sc Human Development</option>
                                    <option value="B.Sc Resource Management (Hospitality Management)"> B.Sc Resource
                                        Management (Hospitality Management) </option>
                                    <option value="B.Sc Textile Science &amp; Fashion Design"> B.Sc Textile Science &amp; Fashion Design </option>
                                    <option value="B.Sc Food Science &amp; Nutrition"> B.Sc Food Science &amp; Nutrition
                                    </option>
                                    <option value="B.Sc Nutrition &amp; Dietetics"> B.Sc Nutrition &amp; Dietetics
                                    </option>
                                    <option value="Bachelor of Computer Application"> Bachelor of Computer Application
                                    </option>
                                    <option value="Foundation Courses"> Foundation Courses </option>
                                    <option value="M.Sc Clinical Nutrition &amp; Dietetics"> M.Sc Clinical Nutrition
                                        &amp; Dietetics </option>
                                    <option value="M.Sc Resource Management (Tourism & Hospitality Management)"> M.Sc
                                        Resource Management (Tourism &amp; Hospitality Management) </option>
                                    <option value="M.Sc Computer Science"> M.Sc Computer Science </option>
                                    <option value="PG Sports Science Fitness & Nutrition"> PG Sports Science Fitness
                                        &amp; Nutrition </option>
                                    <option value="PG Early Childhood Education"> PG Early Childhood Education </option>
                                    <option value="Skill development Courses"> Skill development Courses </option>
                                </select>
                            </div>

                            <div class="col-sm-12">
                                <h5 class="cont_field_txt">Description <span>*</span></h5>
                                <textarea name="message" id="message" class="form-control input_pop" rows="4"
                                    cols="50"></textarea>
                            </div>

                            <div><input name="btn-admission-enquiry" id="btn-admission-enquiry" type="submit"
                                    value="Submit" class="pop_btn contact"></div>

                        </form>
                    </div>
                </div>

                <!--right-image-->
                <div class="col-sm-4">
                    <img src="<?php echo base_url();?>assets/images/enquiry_pic.jpg" class="enquiry_pic" alt="">
                </div>
            </div>
        </div>
    </section>





    <?php $this->load->view('inc_footer'); ?>



    <?php $this->load->view('inc_common_footer_js'); ?>


</body>

</html>