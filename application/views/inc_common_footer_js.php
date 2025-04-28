<?php
//print_r($home);
$home_data  = json_decode(file_get_contents('uploads/jsondata/homejosn.json'), true);
//print_r($home_data);
$popupdata = [];
foreach($home_data['config_home'] as $key => $value){
    $popupdata[$value['key_name']] = $value['value'];
}
//print_r($popupdata);
 $page_url = $this->uri->segment(1);
?>


<!-- Modal popup -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog page_load">
        <div class="modal-content">
            <div class="pop_title">
                <h5 class="admission_title">
                    <?php echo (isset($popupdata['config_hello_bar'])) ? $popupdata['config_hello_bar'] : '';?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="pop_call">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="pop_phone"><i class="fa fa-phone" aria-hidden="true"></i> <a
                                href="callto:02224095792">022 2409 5792</a>/<a href="callto:02224035296">022 2403
                                5296</a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="pop_phone"><i class="fa fa-envelope enve lop" aria-hidden="true"></i> <a
                                href="mailto:admission@bmncollege.com">admission@bmncollege.com</a></div>
                    </div>
                </div>
            </div>

            <div class="modal-body pop_frm">
                <div id="message-contact2">

                    <div id="success_div2" class="hidedefault alert alert-success"> This is a success message.
                    </div>
                    <div id="err_div2" class="hidedefault alert alert-danger"> This is a error message.</div>

                </div>
                <form name="frm-admission-enquiry2" id="frm-admission-enquiry2"
                    action="<?php echo site_url($this->uri->segment(1)) ?>" method="post">
                    <input type="hidden" name="mode" id="mode" value="admission-enquiry">

                    <div class="row">
                        <div class="col-sm-6"><input name="full_name" id="full_name2" type="text" placeholder="Name"
                                class="form-control input_pop" /></div>
                        <div class="col-sm-6"><input name="contact_number" id="contact_number2" type="text"
                                placeholder="Contact Number" class="form-control input_pop validateMobile" /></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"><input name="email_addrress" id="email_addrress2" type="text"
                                placeholder="Email Id" class="form-control input_pop" /></div>
                        <div class="col-sm-6"><input name="city" id="city2" type="text" placeholder="City"
                                class="form-control input_pop" /></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <select name="program" id="program2" class="form-select input_pop"
                                aria-label="Default select example">

                                <option selected>Select Programs</option>
                                <option> Human Development</option>
                                <option> Resource Management (Hospitality Management) </option>
                                <option> Textile Science &amp; Fashion Design </option>
                                <option> Food Science &amp; Nutrition </option>
                                <option> Nutrition &amp; Dietetics </option>
                                <option> Bachelor of Computer Application </option>
                                <option> Foundational Courses </option>
                                <option> M.Sc Clinical Nutrition &amp; Dietetics </option>
                                <option> M.Sc Resource Management (Tourism &amp; Hospitality Management) </option>
                                <option> M.Sc Computer Science </option>
                                <option> PG Sports Science Fitness &amp; Nutrition </option>
                                <option> PG Early Childhood Education </option>
                                <option> Skill development Courses </option>
                                <option> Integrated Diploma in Fashion & Textile Designing (Institute) </option>
                                <option> Diploma in Interior Designing & Decoration (Govt. Recognized / Institute) </option>
                                <option> Diploma in Auxiliary Nurse & Midwives (Recognised by Maharashtra Nursing Council & Nursing Council of India) </option>
                                <option>  Diploma in Travel, Tourism & Hospitality Management (Institute) </option>
                                <option> Diploma in Fashion Designing & Apparel Merchandising (Institute) </option>
                                <option> Diploma in Beauty Culture & Hair Dressing (Government Recognized) </option>
                                <option> Diploma in Applied Arts (Limited seats available for boys) </option>
                                <option> Cook and Dine  </option>
                                <option> Smt. Hiraben Manilal Nanavati Junior College of Home Science </option>
                               
                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <input name="btn-admission-enquiry" id="btn-admission-enquiry2" type="submit" value="Submit"
                                class="pop_btn" />
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Modal popup -->

<!--menuzord -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/menuzord.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#menuzord").menuzord({
		align:"left"
	});
});
</script>
<!--menuzord-->    

<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>    
<!--slick slider-->
<script src="<?php echo base_url();?>assets/js/slick.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).on('ready', function() {
    
    $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 4,
        autoplay: true,
        slidesToScroll: 4,
        responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: true
      }
    },        
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    
  ]
      });
});
</script>
<!--jquery-min-->

<!-- font-increase-decrease jquery -->    
<script type="text/javascript">
	$(document).ready(
			function() {

				
				var $affectedElements = $("div,p,a,h5,h4,h3,h2,h1,ul,li,li.nav-link"); // Can be extended, ex. $("div, p, span.someClass")
				var rtext = 0;
				// Storing the original size in a data attribute so size can be reset
				$affectedElements.each(function() {
					var $this = $(this);
					$this.data("orig-size", $this.css("font-size"));
				});

				$(".increase").click(function() {
					if (rtext < 3) {
						rtext = rtext + 1;
						changeFontSize(1);
					}
				})

				$(".decrease").click(function() {
					if (rtext > -1) {
						rtext = rtext - 1;
						changeFontSize(-1);
					}
				})

				$(".reset").click(function() {
					$affectedElements.each(function() {
						var $this = $(this);
						$this.css("font-size", $this.data("orig-size"));
					});
				})

				function changeFontSize(direction) {

					$affectedElements.each(function() {
						var $this = $(this);
						//alert(parseInt($this.css("font-size"))+direction);
						$this.css("font-size", parseInt($this.css("font-size"))
								+ direction);
					});
				}

				
			});
</script>  
    
    
<!--scroll to top-->
<script type="text/javascript">
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>    
    
<!--visitor Counter-->
<script src="<?php echo base_url();?>assets/js/jquery.incremental-counter.js"></script>
<script>
$(".incremental-counter").incrementalCounter();
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>  
    

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

    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("readmore");
        var btnText = document.getElementById("myBtnreadmore");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "<?php echo $this->lang->line("Read more");?>";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "<?php echo $this->lang->line("Read less");?>";
            moreText.style.display = "inline";
        }
    }
    </script>
    <script>
 
    $(document).ready(function() {
        $("input").keypress(function(){
            $(this).removeClass("border-danger");
        });
        $("textarea").keypress(function(){
            $(this).removeClass("border-danger");
        });
        $("select").click(function(){
            $(this).removeClass("border-danger");
        });
        $(".form-control").removeClass("border-danger");
        $(".form-control-select2").removeClass("border-danger");
        $("#error_status_flag").hide();
         $("#frm-admission-enquiry").submit(function(e) {
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
            if (!$("#contact_number").val()) {
                isError = true;
                $("#contact_number").addClass("border-danger");
               
            }
            if (!$("#email_addrress").val()) {
                isError = true;
                $("#email_addrress").addClass("border-danger");
               
            }
            
            if (!$("#email_addrress").val() || !validateEmail($("#email_addrress").val())) {
                isError = true;
                error_msg = "Please enter valid email id";
                $("#email_addrress").addClass("border-danger");
            }

            if (!$("#program").val()) {
                isError = true;
                $("#program").addClass("border-danger");
               
            }
            if (!$("#message").val()) {
                isError = true;
                $("#message").addClass("border-danger");
               
            }
            
            if (isError) {
                return false;
            } else {
               var  dataString = $("#frm-admission-enquiry").serialize();
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
                            $('#contact_number').val("");
                            $('#email_addrress').val("");
                            $('#city').val("");
                            $('#message').val("");
                            $('#program').val("");
                            $('#frm-admission-enquiry').hide();
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
               // $("#frm-admission-enquiry").submit();
            }

            return false;
        });

       ///
       $("#frm-admission-enquiry2").submit(function(e) {
            e.preventDefault();
            var isError = false;
            var errMsg = "";
            var errMsg_alert = "";
            $(".form-control").removeClass("border-danger");
            $(".form-control-select2").removeClass("border-danger");
            $("#error_status_flag").hide();
            
            if (!$("#full_name2").val()) {
                isError = true;
                $("#full_name2").addClass("border-danger");
               
            }
            if (!$("#contact_number2").val()) {
                isError = true;
                $("#contact_number2").addClass("border-danger");
               
            }
            if (!$("#email_addrress2").val()) {
                isError = true;
                $("#email_addrress2").addClass("border-danger");
               
            }
            
            if (!$("#email_addrress2").val() || !validateEmail($("#email_addrress2").val())) {
                isError = true;
                error_msg = "Please enter valid email id";
                $("#email_addrress2").addClass("border-danger");
            }

            if (!$("#program2").val()) {
                isError = true;
                $("#program2").addClass("border-danger");
               
            }
           
            
            if (isError) {
                return false;
            } else {
               var  dataString = $("#frm-admission-enquiry2").serialize();
              //alert(dataString);
                
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: dataString, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  //  contentType: false, // The content type used when sending data to the server.
                  //   cache: false, // To unable request pages to be cached
                 //   processData: false, // To send DOMDocument or non processed data file it is set to false
                    url: '<?php echo site_url('admission-enquiry') ?>',

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


                            $("#success_div2").html(redata.retcomment);
                            $("#success_div2").show();

                            $("#err_div2").hide();
                            $('#full_name2').val("");
                            $('#contact_number2').val("");
                            $('#email_addrress2').val("");
                            $('#city2').val("");
                            $('#message2').val("");
                            $('#program2').val("");
                            $('#frm-admission-enquiry2').hide();
                        } else {
                            // alert(redata.retcomment);
                            $("#err_div2").html(redata.retcomment);
                            $("#err_div2").show();

                            $("#success_div2").hide();
                            
                        }
                        return false;
                    },
                    error: function(redata) {
                        
                        $("#err_div2").html(redata.retcomment);
                        $("#err_div2").show();
                        // $('#submit-contact').removeAttr('disabled');
                    }
                });
               // $("#frm-admission-enquiry").submit();
            }

            return false;
        });
       ///

    });

     /*---exampleModal Popup---*/
     <?php
                    if(($page_url=="" || $page_url=="home" ) &&  isset($popupdata['config_hellobar_show']) && $popupdata['config_hellobar_show']==1){
                    ?>
     setTimeout(function() {
             
       
        $('#exampleModal').modal('show');

            
        }, 2000);
        <?php }?>
    </script>

    