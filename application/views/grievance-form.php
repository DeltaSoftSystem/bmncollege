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
    <h3 class="page_name_title">Grievance Application Form</h3>
    <p class="page_breadcrumb">
        <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a> 
        <i class="fa fa-angle-right next" aria-hidden="true"></i> Committee
        <i class="fa fa-angle-right next" aria-hidden="true"></i> College Level
        <i class="fa fa-angle-right next" aria-hidden="true"></i> Grievance
        <i class="fa fa-angle-right next" aria-hidden="true"></i> Grievance Application Form
    </p>
</section>    
   
  
    
<section><!--class="slide_bx"-->
    <div class="container">
        
        
        
        
        <div class="row">
            
            
            <!--left Form contact form-->
            <div class="col-sm-8">
                <div class="enquiry_bx">
                <h3 class="research_title">Grievance Application Form</h3>                
                <form action="" method="get">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="cont_field_txt">Name of the Applicant  </h5>
                            <input name="" type="text" class="form-control input_pop" placeholder="" /></div>
                        <div class="col-sm-6">
                            <h5 class="cont_field_txt"> Class </h5>     
                            <input name="" type="text" class="form-control input_pop" placeholder="" /></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="cont_field_txt"> Contact No. </h5>    
                            <input name="" type="text" class="form-control input_pop" placeholder="" /></div>
                        <div class="col-sm-6">
                            <h5 class="cont_field_txt">Date of Application </h5>    
                            <input name="" type="date" class="form-control input_pop" placeholder="" /></div>
                    </div>
                    
                    
                    <div class="col-sm-12">
                         <h5 class="cont_field_txt">  Have you approached the college Authorities before the application  </h5>    
                         <div class="row">
                            <div class="col-sm-2">
                                <input type="checkbox" id="Yes" name="Yes" value="Bike" class="mb">
                                <label for="Yes"> Yes</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" id="No" name="No" value="Bike" class="mb">
                                <label for="No"> No</label> 
                            </div>     
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="col-sm-12">
                        <h5 class="cont_field_txt">Complain Description: (Kindly provide complete details of the complaint)</h5> 
                        <textarea name="" class="form-control input_pop" rows="4" cols="50"></textarea>
                    </div>
                    
                    <div><input name="" type="button" value="Submit" class="pop_btn contact"></div>
                    
                </form>
            </div>
                </div>
            
            <!--right-image-->
            <div class="col-sm-4">                
                <img src="<?php echo base_url();?>assets/images/enquiry_pic.jpg" class="enquiry_pic"  alt="">
            </div>
        </div>
    </div>
</section> 
    

     
<?php $this->load->view('inc_footer'); ?>

    
   
<?php $this->load->view('inc_common_footer_js'); ?>

    
</body>
</html>
