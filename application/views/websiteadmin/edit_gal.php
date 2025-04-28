<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('websiteadmin/inc_metacss');?>

	<!-- Core JS files -->
	 
 
    
    <script src="<?php echo base_url()?>global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	
    <script src="<?php echo base_url()?>global_assets/js/demo_pages/form_select2.js"></script>
    
	<!-- /theme JS files -->    
	<script src="<?PHP echo base_url()?>web_editor/ckeditor.js"></script>
    
</head>

<body>

	<!-- Main navbar -->
		<?php $this->load->view('websiteadmin/inc_topmenu');?>	
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">
		<!-- Main sidebar -->
		<?php $this->load->view('websiteadmin/inc_leftmenu');?>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
                    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="<?php echo site_url("home");?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                                <span class="breadcrumb-item ">Gallery   </span>
                                <span class="breadcrumb-item active">Edit Gallery</span>
                            </div>

                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>

                        <div class="header-elements d-none">
                            <div class="breadcrumb justify-content-center">
                                <a href="<?php echo site_url($this->ctrl_name."/home_slider");?>" class="breadcrumb-elements-item">
                                    <button type="button" class="btn btn-success btn-sm"><i class="icon-plus2 mr-2"></i> Back</button>
                                </a>

                            </div>
                        </div>
                    </div>

                </div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Page length options -->
			  <div class="card">
				<div class="card-header header-elements-inline">
						<h5 class="card-title">Edit Gallery</h5>
			    </div>


				  <div class="card-body">

<form action="<?php echo site_url($this->ctrl_name.'/edit_slider/'.$id)?>" name="ed_pg_frm" id="ed_pg_frm" method="post" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="mode_edt" id="mode_edt" value="add_att">


                                
<div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="company"> Description :</label>
                                    <div class="col-lg-9">
										<textarea class="form-control col-md-12" rows="5" name="slider_text" id="slider_text" placeholder="Description"><?php echo $this->common->getDbValue($sel_rs['slider_text'])?></textarea>                                    
                                    </div>                                    
                                </div>  
                                

                           
                            
							<div class="form-group row">
                                <?php
                                      $slider_image = (isset($sel_rs['slider_image']) && $sel_rs['slider_image']!="") ? base_url()."../uploads/gallery/".$sel_rs['slider_image'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; ;
                                    ?>
                                    <label class="col-md-2 col-form-label">  Image</label>
                                    <div class="col-md-10">
                                        <div class="row col-md-5">
                                            <img src="<?php echo $slider_image?>" id="temppreviewimageki1" class="temppreviewimageki1" style="width:200px; height:auto;display:none1">
                                          
                                        </div>
                                        <div class="row col-md-6">

                                            <div class="input-group image-preview1">

                                                <input type="text" class="form-control image-preview-filename1" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                <span class="input-group-btn">
                                                    <!-- image-preview-clear button -->
                                                    <button type="button" class="btn btn-default image-preview-clear image-preview-clear1" style="display:none;" id=1>
                                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                                    </button>
                                                    <!-- image-preview-input -->
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span class="image-preview-input-title image-preview-input-title1">Browse</span>
                                                        <input type="file" accept="image/png, image/jpeg, image/gif" class="browseimage" id="1" name="slider_image" /> <!-- rename it -->

                                                    </div>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Image Size 800px(width)  360px(height)</span>

                                        </div>
                                    </div>
                                </div>             
                                                            


								<div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="status">Status :</label>
                                    <div class="col-lg-9">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled-success" value="0" name="slider_status" id="slider_status" <?php if($sel_rs['slider_status']==0){?> checked <?php } ?>>
                                                Active
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                 <input type="radio" class="form-check-input-styled-danger" value="1" name="slider_status" id="slider_status" <?php if($sel_rs['slider_status']==1){?> checked <?php } ?>>
                                                In-active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                                   

                                
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2"></label>
                                    <div class="col-lg-9">
                                        <button type="submit" class="btn bg-blue">Save <i class="icon-paperplane ml-2"></i></button>
                                        <a href="<?php echo site_url($this->ctrl_name.'/home_slider')?>"><button type="button" class="btn btn-light  ml-2">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
				</div>
				<!-- /page length options -->


			</div>
			<!-- /content area -->


			<!-- Footer -->
			<?php $this->load->view('websiteadmin/inc_footer');?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {






            $(function() {


                //image 1
                // Create the close button
                var closebtn1 = $('<button/>', {
                    type: "button",
                    text: 'x',
                    id: 'close-preview1',
                    style: 'font-size: initial;',
                });
                closebtn1.attr("class", "close pull-right");
                // Set the popover default content
                $('.image-preview1').popover({
                    trigger: 'manual',
                    html: true,
                    title: "<strong>Preview</strong>" + $(closebtn1)[0].outerHTML,
                    content: "There's no image",
                    placement: 'bottom'
                });
                // Clear event
                $('.image-preview-clear').click(function() {
                    var imgid = $(this).attr('id');
                    $('.image-preview' + imgid).attr("data-content", "").popover('hide');
                    $('.image-preview-filename' + imgid).val("");
                    $('.image-preview-clear' + imgid).hide();
                    //$('.image-preview-input input:file').val("");
                    $(".image-preview-input-title" + imgid).text("Browse");
                    $(".temppreviewimageki" + imgid).attr("src", '');
                    $(".temppreviewimageki" + imgid).hide();
                });
                // Create the preview image
                $(".browseimage").change(function() {
                    var img = $('<img/>', {
                        id: 'dynamic',
                        width: 250,
                        height: 200,
                    });
                    var imgid = $(this).attr('id');
                    var file = this.files[0];
                    var reader = new FileReader();
                    // Set preview image into the popover data-content
                    reader.onload = function(e) {

                        $(".image-preview-input-title" + imgid).text("Change");
                        $(".image-preview-clear" + imgid).show();
                        $(".image-preview-filename" + imgid).val(file.name);
                        img.attr('src', e.target.result);

                        $(".temppreviewimageki" + imgid).attr("src", $(img)[0].src);
                        $(".temppreviewimageki" + imgid).show();
                        //img.attr('src', e.target.result);
                        //alert(e.target.result);
                        ///alert($(img)[0].outerHTML);
                        //$(".image-preview1").attr("data-content",$(img)[0].outerHTML).popover("show");
                    }
                    reader.readAsDataURL(file);
                });
                //end  
            });
        });

        // TableManageButtons.init();
        </script>

</body>
</html>
