<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thumbnail_sample extends CI_Controller {
	 

		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('common');
			$this->load->helper('security');
			$this->load->library('email');
			$this->load->helper('url_helper');
			 
			 
		}
		
	public function index(){
		   $src_img=$_GET['img'];
		 
		$image = @getimagesize(urldecode($src_img));
		if($image=="")
		$src_img = "uploads/grey-no-image.jpg";	
		
		$filename = $this->modify_tn_path(basename(urldecode($src_img)) .'.thumb_'.$_GET['w'].'x'.$_GET['h'].'.png');
	 
		if (!is_file(urldecode($filename))) {
		  $this->load->library('Thumbnail');
		  $thumb=new Thumbnail($src_img);	        // Contructor and set source image file
		
			$thumb->output_format='PNG';  
			$thumb->bicubic_resample=false;             // [OPTIONAL] set resample algorithm to bicubic
			//$thumb->CalculateQFactor(10000); 
			if($_GET['h']!="")
			{
			$thumb->size($_GET['w'],$_GET['h']);		            // [OPTIONAL] set the biggest width and height for thumbnail
			}
			else
			{
			$thumb->size_auto($_GET['w']);	
			}
	
			$thumb->process();   				        // generate image
	
			$thumb->show();	
	
			$status=$thumb->save($filename);            // save your thumbnail to file
			
			//echo ($thumb->error_msg);                 // print Error Mensage
		}
		else
		{
 		$this->load->library('Thumbnail');
		$thumb=new Thumbnail($filename);	        // Contructor and set source image file
	
			$thumb->output_format='PNG';  
			$thumb->bicubic_resample=false;             // [OPTIONAL] set resample algorithm to bicubic
			//$thumb->CalculateQFactor(10000); 
			if($_GET['h']!="")
			{
			$thumb->size($_GET['w'],$_GET['h']);		            // [OPTIONAL] set the biggest width and height for thumbnail
			}
			else
			{
			$thumb->size_auto($_GET['w']);	
			}
	
			$thumb->process();   				        // generate image
			$thumb->show();	
			// show your thumbnail, or
			$status=$thumb->save($filename);            // save your thumbnail to file
			
		}
	}
	function modify_tn_path($file)
	{
		
	//	return "images/thumbnails/".basename($file);	
	return "temp/thumbs_cache/".basename($file);
		
	
	}
	   	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */