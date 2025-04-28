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
        <h3 class="page_name_title">Connect with Us</h3>
        <p class="page_breadcrumb">
            <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
            <i class="fa fa-angle-right next" aria-hidden="true"></i> Contact Us
        </p>
    </section>



    <section class="slide_bx">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="research_title"><?php echo $this->lang->line("Dr. BMN College of Home Science");?></h3>
                    <div class="address_bor">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="address_left">
                                    <h4 class="detail_title"><?php echo $this->lang->line("Contact Details");?></h4>
                                    <div class="address_one"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <span><?php echo $this->lang->line("Address");?> :</span> <?php echo $this->lang->line("338, Rafi Ahmed Kidwai Road, Matunga, Mumbai -400019");?>
                                    </div>
                                    <div class="address_one"><i class="fa fa-phone" aria-hidden="true"></i>
                                        <span><?php echo $this->lang->line("Phone");?> : </span> <?php echo $this->lang->line("022 2409 5792");?>  <br>
                                    </div>
                                    <div class="address_one"><i class="fa fa-envelope cont" aria-hidden="true"></i>
                                        <span><?php echo $this->lang->line("Email ID");?> :</span> smesedu@gmail.com
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="address_right">
                                    <h4 class="detail_title"><?php echo $this->lang->line("Travelling options");?> </h4>
                                    <img src="<?php echo base_url();?>assets/images/place_icn.png" class="place_icn"
                                        alt="">

                                    <div class="travel_one"><img
                                            src="<?php echo base_url();?>assets/images/road_icn.png" alt=""> <span><?php echo $this->lang->line("Via Road");?> :</span> <?php echo $this->lang->line("Rafi Ahmed Kidwai Marg");?></div>
                                    <div class="travel_one"><img src="<?php echo base_url();?>assets/images/bus_icn.png"
                                            alt=""><span><?php echo $this->lang->line("Near by Bus Stop");?> :</span> <?php echo $this->lang->line("Maheshwari Udyaan");?></div>
                                    <div class="travel_one"><img
                                            src="<?php echo base_url();?>assets/images/train_icn.png" alt=""><span><?php echo $this->lang->line("Via Train");?> :</span> <?php echo $this->lang->line("WR – Matunga Road");?> <br>
                                            <?php echo $this->lang->line("CR – Matunga station");?> <br>
                                            <?php echo $this->lang->line("HR – Kingcircle station / Wadala station");?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <!--contact form-->
                <div class="col-sm-6">
                    <h3 class="research_title">Help Needed</h3>
                    <div id="message-contact">

                        <div id="success_div" class="hidedefault alert alert-success"> This is a success message.
                        </div>
                        <div id="err_div" class="hidedefault alert alert-danger"> This is a error message.</div>

                    </div>
                    <form name="frm-contact-us" id="frm-contact-us"
                        action="<?php echo site_url($this->uri->segment(1)) ?>" method="post">
                        <input type="hidden" name="mode" id="mode" value="contact-us">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="cont_field_txt">Your Name <span>*</span> </h5>
                                <input name="full_name" id="full_name" type="text" class="form-control input_pop" placeholder="" required1 />
                            </div>
                            <div class="col-sm-6">
                                <h5 class="cont_field_txt">Email Id <span>*</span> </h5>
                                <input name="contact_email" id="contact_email" type="text" class="form-control input_pop" placeholder="" required1 />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="cont_field_txt">Phone No. <span>*</span> </h5>
                                <input name="contact_phone" id="contact_phone" type="text" class="form-control input_pop validateMobile"  placeholder="" required1 />
                            </div>
                            <div class="col-sm-6">
                                <h5 class="cont_field_txt">Enquiry for</h5>
                                <select name="contact_subject" id="contact_subject" class="form-select input_pop cont" aria-label="Default select example">
                                    <option value="" >Enquiry for</option>
                                    <option value="Admission enquiry">Admission enquiry</option>
                                    <option value="Examination, Courses enquiry"> Examination, Courses enquiry</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="cont_field_txt">In what way can we help you? </h5>
                                <textarea name="contact_message" id="contact_message" cols="" rows="5" class="form-control input_pop"
                                    placeholder=""></textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12"><input name="btn-contact-us" id="btn-contact-us" type="submit" value="Submit"
                                    class="pop_btn contact" /></div>
                        </div>

                    </form>
                </div>
                <!--college map-->
                <div class="col-sm-6">
                    <h3 class="research_title">Site Map</h3>
                    <div class="college_map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.799596805155!2d72.85765081430644!3d19.0285504584084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cf2f051bdd6f%3A0xf26f202e33ba0e2b!2sDr.%20BMN%20College%20of%20Home%20Science!5e0!3m2!1sen!2sin!4v1640724225657!5m2!1sen!2sin"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php $this->load->view('inc_footer'); ?>



    <?php $this->load->view('inc_common_footer_js'); ?>


    <script>
    jQuery('.numbersOnly').keyup(function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.validateMobile').keyup(function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    jQuery('.alphaonly').keyup(function() {
        this.value = this.value.replace(/[^a-zA-Z\s]+$/, '');
    });

    jQuery('.alhanumeric').keyup(function() {
        this.value = this.value.replace(/[^a-zA-Z0-9\-\s]+$/, '');
    });



    function validateEmail(email) {
        var eml = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (eml.test($.trim(email)) == false) {
            return false;
        }
        return true;
    }

    function validateMobile(mobile) {
        var mob = /^[1-9]{1}[0-9]{9}$/;
        if (mob.test($.trim(mobile)) == false) {
            return false;
        }
        return true;

    }
    </script>
    <script>
    $(document).ready(function() {
        $("input").keypress(function() {
            $(this).removeClass("border-danger");
        });
        $("textarea").keypress(function() {
            $(this).removeClass("border-danger");
        });
        $("select").click(function() {
            $(this).removeClass("border-danger");
        });
        $(".form-control").removeClass("border-danger");
        $(".form-control-select2").removeClass("border-danger");
        $("#error_status_flag").hide();
        $("#frm-contact-us").submit(function(e) {
            e.preventDefault();
            var isError = false;
            var errMsg = "";
            var errMsg_alert = "";
            $(".form-control").removeClass("border-danger");
            $(".form-control-select2").removeClass("border-danger");
            $("#error_status_flag").hide();

            if (!$("#full_name").val()) {
                isError = true;
                $("#full_name").addClass("border-danger");

            }
            if (!$("#contact_phone").val()) {
                isError = true;
                $("#contact_phone").addClass("border-danger");

            }
            if (!$("#contact_email").val()) {
                isError = true;
                $("#contact_email").addClass("border-danger");

            }

            if (!$("#contact_email").val() || !validateEmail($("#contact_email").val())) {
                isError = true;
                error_msg = "Please enter valid email id";
                $("#contact_email").addClass("border-danger");
            }

          /*   if (!$("#contact_subject").val()) {
                isError = true;
                $("#contact_subject").addClass("border-danger");

            }
            if (!$("#contact_message").val()) {
                isError = true;
                $("#contact_message").addClass("border-danger");

            } */

            if (isError) {
                return false;
            } else {
                var dataString = $("#frm-contact-us").serialize();
                // alert(dataString);
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: dataString, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    //  contentType: false, // The content type used when sending data to the server.
                    //   cache: false, // To unable request pages to be cached
                    //   processData: false, // To send DOMDocument or non processed data file it is set to false
                    url: '<?php echo site_url($this->uri->segment(1)) ?>',

                    beforeSend: function() {
                        // this is where we append a loading image
                        //$("#contact-btn").attr("disabled", "disabled");
                        //btnRegister

                    },
                    success: function(redata) {
                        //  redata = jQuery.trim(redata);
                        // successful request; do something with the data
                        //  alert(redata);
                        // alert(redata);
                        console.log(redata);
                        if (redata.status) {


                            $("#success_div").html(redata.retcomment);
                            $("#success_div").show();

                            $("#err_div").hide();
                            $('#full_name').val("");
                            $('#contact_phone').val("");
                            $('#contact_email').val("");
                            $('#city').val("");
                            $('#contact_message').val("");
                            $('#contact_subject').val("");
                            $('#frm-contact-us').hide();
                        } else {
                            // alert(redata.retcomment);
                            $("#err_div").html(redata.retcomment);
                            $("#err_div").show();

                            $("#success_div").hide();

                        }
                        return false;
                    },
                    error: function(redata) {

                        $("#err_div").html(redata.retcomment);
                        $("#err_div").show();
                        // $('#submit-contact').removeAttr('disabled');
                    }
                });
                // $("#frm-contact-us").submit();
            }

            return false;
        });


    });
    </script>
</body>

</html>