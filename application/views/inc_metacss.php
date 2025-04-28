<?php
$session_user_data = $this->session->userdata('user_data');
$trandomuuid = $this->common->randomuuid();
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Admin Management</title>

<!-- Global stylesheets -->

<link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<!--font-family: 'Muli', sans-serif;-->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<!--font-family: 'Poppins', sans-serif;-->

<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>websiteadmin/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>websiteadmin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>websiteadmin/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>websiteadmin/assets/css/layout.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>websiteadmin/assets/css/components.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>websiteadmin/assets/css/colors.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>websiteadmin/assets/css/custom.css" rel="stylesheet" type="text/css">

 	 
<link href="<?php echo base_url() ?>websiteadmin/assets/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->
 
<!-- Core JS files -->
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/main/jquery.min.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/main/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/loaders/blockui.min.js"></script>

	<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/ui/ripple.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->

<!-- Theme JS files -->

<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
 

 
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/selects/select2.min.js"></script>




<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/pickers/daterangepicker.js"></script>

<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/pickers/anytime.min.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/notifications/bootbox.min.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/styling/switchery.min.js"></script>

<script src="https://kppm.in/websiteadmin/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
 	 
<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/inputs/inputmask.js"></script>
          
	<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/extensions/jquery_ui/core.min.js"></script>


    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/inputs/passy.js"></script>
	<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/tags/tagsinput.min.js"></script>
	<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/tags/tokenfield.min.js"></script>

    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/inputs/typeahead/handlebars.min.js"></script>

 
    
	<!-- Theme JS files -->
  
 	<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/inputs/maxlength.min.js"></script>
    <script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/forms/inputs/formatter.min.js"></script>
	<script src="<?php echo base_url() ?>websiteadmin/global_assets/js/plugins/uploaders/dropzone.min.js"></script>
	<script src="<?php echo base_url() ?>websiteadmin/assets/js/bootstrap-datepicker.min.js"></script>

 
<script src="<?php echo base_url() ?>websiteadmin/assets/js/app.js"></script>

<!-- /theme JS files -->


<script  >
var st_url = "<?php echo site_url() ?>/";
</script>
<style  >
.hidedefault {
    display: none;
}
.topemenuwti {
   /*  background-image:
        url("<?php echo base_url() ?>websiteadmin/global_assets/images/header1.jpg");
    background-repeat: no-repeat;
   color: #ffffff!important; */
}
</style>