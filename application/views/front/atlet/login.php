<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
    	<!-- meta charec set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
    
        <div class="container">
            <div class="content-login-atlet">
                <div class="rows">
                    <div class="column">
                        <div class="bg-login">
                            <div class="column-left">
                                <h1 align="center" class="text-white"><strong>Are you a <br/> roller skater ?</strong></h1>
                                <br/><br/>
                                <p class="text-white" align="center">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus nulla deserunt et nemo ratione repellendus vel aperiam quos asperiores velit alias eos aliquid, facere sint, eum, odio perspiciatis ex. Dolorem!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="column-form-login">
                        <div class="column-form">
                        <h2>Create your accout,</h2>
                        <p>
                            Please Login
                        </p>
                        <hr/>
                        <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-dark btn-block btn-lg">Login</button>
                        </form>
                        <br/>
                        <p>Do you have a account ? <a href="<?php echo base_url('registrasi') ?>" style="color:#2B3E4E"><strong><u>Create Aaccount</u></strong></a></p>
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
