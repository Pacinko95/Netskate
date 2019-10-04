<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
    	<!-- meta charec set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="theme-color" content="#0f1b23">
		<!-- Page Title -->
        <title>LYRA</title>		
		<!-- Meta Description -->
        <meta name="description" content="Laria">
        <meta name="keywords" content="Laria">
		<meta name="author" content="Laria">
		<link rel="icon" href="img/icon.png" type="image/png">

		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Google Font -->
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- CSS
		================================================== -->
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/font-awesome.min.css">
		<!-- Twitter Bootstrap css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">
		<!-- jquery.fancybox  -->
        <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/jquery.fancybox.css">
		<!-- animate -->
        <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/login-atlet.css">
		<!-- media-queries -->
        <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/media-queries.css">

		<!-- Modernizer Script for old Browsers -->
        <script src="<?php echo base_url('assets/') ?>js/modernizr-2.6.2.min.js"></script>

    </head>
	
    <body id="body" style="background-color:#1C2D39;">
    <?php echo validation_errors(); ?>
        <div class="container">
            <div class="content-login-atlet">
                <div class="rows">
                    <div class="column hidden-xs">
                        <div class="bg-login">
                            <div class="column-left">
                                <h1 align="center" class="text-white"><strong>HI NETSKATER.....</strong></h1>
                                <br/><br/>
                                <p class="text-white" align="center">
                                   Netskate help you to connect with other skater, club, and Event Organizer. Share your skating experience here and build your digital family<br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="column-form-login">
                        <div class="column-form-registrasi">
                        <h2>Create your account,</h2>
                        <hr/>
                        <form class="form-horizontal" action="<?= base_url('register/create')?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?>" placeholder="Enter Name">
                            <span style="color:red; font-size: 8px"><?php echo form_error('name'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" id="username"  value="<?php echo set_value('username'); ?>" placeholder="Enter Username">
                            <span style="color:red; font-size: 8px"><?php echo form_error('username'); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" id="email"  value="<?php echo set_value('email'); ?>" placeholder="Enter email">
                            <span style="color:red; font-size: 8px"><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Hp</label>
                            <input type="text" class="form-control" name="no_tlp" id="no_tlp" value="<?php echo set_value('no_tlp'); ?>" placeholder="Enter No Hp">
                            <span style="color:red; font-size: 8px"><?php echo form_error('no_tlp'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-4">
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="3" disabled="">
                              <strong>Atlet</strong>
                            </label>
                            </div>
                            <div class="col-md-4">
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="2" required="required">
                              <strong>CLUB</strong>
                            </label>
                            </div>
                            <div class="col-md-4">
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" required="required">
                              <strong>EO</strong>
                            </label>
                            </div>
                          </div>
                          <br/>
                          <button type="submit" class="btn btn-dark btn-block btn-lg">Registrasi</button>
                        </div>
                        </form>
                        <p>you have a account ? <a href="<?php echo base_url('login') ?>" style="color:#2B3E4E"><strong><u>Login Now</u></strong></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url() ?>" class="btn btn-back-home">
            Back to home
            </a>
        </div>

		<!-- Essential jQuery Plugins
		================================================== -->
		<!-- Main jQuery -->
        <script src="<?php echo base_url('assets/') ?>js/jquery-1.11.1.min.js"></script>
		<!-- Single Page Nav -->
        <script src="<?php echo base_url('assets/') ?>js/jquery.singlePageNav.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="<?php echo base_url('assets/') ?>js/bootstrap.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="<?php echo base_url('assets/') ?>js/jquery.fancybox.pack.js"></script>
		<!-- jquery.mixitup.min -->
        <script src="<?php echo base_url('assets/') ?>js/jquery.mixitup.min.js"></script>
		<!-- jquery.parallax -->
        <script src="<?php echo base_url('assets/') ?>js/jquery.parallax-1.1.3.js"></script>
		<!-- jquery.countTo -->
        <script src="<?php echo base_url('assets/') ?>js/jquery-countTo.js"></script>
		<!-- jquery.appear -->
        <script src="<?php echo base_url('assets/') ?>js/jquery.appear.js"></script>
		<!-- Contact form validation -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
		<!-- Google Map -->
        <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
		<!-- jquery easing -->
        <script src="<?php echo base_url('assets/') ?>js/jquery.easing.min.js"></script>
		<!-- jquery easing -->
        <script src="<?php echo base_url('assets/') ?>js/wow.min.js"></script>
		<script>
			var wow = new WOW ({
				boxClass:     'wow',      // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset:       120,          // distance to the element when triggering the animation (default is 0)
				mobile:       false,       // trigger animations on mobile devices (default is true)
				live:         true        // act on asynchronously loaded content (default is true)
			  }
			);
			wow.init();
		</script> 
		<!-- Custom Functions -->
        <script src="<?php echo base_url('assets') ?>/js/custom.js"></script>
		
    </body>
</html>
