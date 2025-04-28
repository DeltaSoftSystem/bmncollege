<?php
$session_user_data = $this->session->userdata('user_data');
?>
<div class="navbar navbar-expand-md navbar-dark bg-primary1 navbar-static topemenuwti" >
		<div class="navbar-brand logoheader" >
			<a href="<?php echo site_url()?>" class="d-inline-block">
				<img src="<?php echo base_url()?>global_assets/images/ModavarLogo.png"  alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse topemenuwti" id="navbar-mobile">
			<ul class="navbar-nav topemenuwti">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
 
			</ul>

			<span class="badge1   ml-md-3 mr-md-auto">   </span>

			<ul class="navbar-nav">
				  
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url()?>global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span><?php echo (isset($session_user_data['first_name']))?$session_user_data['first_name']:''?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo site_url("dashboard/logout");?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>