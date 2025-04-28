<!DOCTYPE html>
<html lang="en">

    <head>
        <?php $this->load->view('websiteadmin/inc_metacss');?>
       
        <!-- Global stylesheets -->

        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!--font-family: 'Muli', sans-serif;-->

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <!--font-family: 'Poppins', sans-serif;-->

        <link href="<?php echo base_url() ?>websiteadmin/assets/css/loginstyle.css" rel="stylesheet" type="text/css">

        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <style>
    .login_bg1 {
        background-image:
            url("<?php echo base_url() ?>websiteadmin/global_assets/images/login_bg.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        height: 100vh;
    }

    body {
        background-image:
            url("<?php echo base_url() ?>assets/images/slide_pic_2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        height: 100vh;
    }

    .no-background1 {
        background-image:
            url("<?php echo base_url() ?>websiteadmin/global_assets/images/bg2.jpg");
    }
    </style>

    </head>
 

    <body>
        <div class="login_bg">

            <div class="page_loader"></div>



            <!-- login-form -->

            <div class="loginInner" id="pass_form1">

                <div class="login_l">
                    <a href="#"><img src="<?php echo base_url() ?>assets/images/logo.png" alt="" style="width:350px; heigh:auto"></a>

                    <!-- <h1 class="welcome_title"> BMN Admin</h1> --> </span>


                </div>

                <div class="login_r">




                    <h2 class="login_head_one">Website Admin panel</h1>
                    <div class="clr"></div>



                    <!-- Login form -->
                    <form class="login-form" action="<?php echo site_url('websiteadmin/home') ?>" method="post">

                        <div>
                            <!--class="card mb-0"-->
                            <div>
                                <!--class="card-body"-->
                                <div class="text-center mb-3">


                                </div>
                                <?php //$error_msg = $this->session->flashdata('error_msg');
if ($error_msg) {
?>
                                <div class="alert alert-danger" id="errormsg">
                                    <?php echo $error_msg; ?>
                                </div>
                                <?php } else {?>
                                <div class="alert alert-danger" id="errormsg" style="display:none">

                                </div>
                                <?php }?>
                            </div>
                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="signin_btn">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                            </div>
                            <!--btn btn-primary btn-block-->

                            <!-- <div class="text-center">
        <a href="login_password_recover.html">Forgot password?</a>
    </div> -->
                        </div>
                </div>
                <div class="clr"></div>
                </form>
                <!-- /login form -->


            </div>

            <div class="clr"></div>
        </div>







        </div>



        </div>


    </body>


</html>