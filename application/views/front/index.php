<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
    	<!-- meta charec set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="theme-color" content="#0f1b23">

		<!-- Page Title -->
        <title>NETSKATE</title>		
		<!-- Meta Description -->
        <meta name="description" content="Netskate">
        <meta name="keywords" content="Netskate">
		<meta name="author" content="Netskate">
		<link rel="icon" href="img/icon.png" type="image/png">

		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/icon.png') ?>">
		
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
        <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/main.css">
		<!-- media-queries -->
        <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/media-queries.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

		<!-- Modernizer Script for old Browsers -->
        <script src="<?php echo base_url('assets/') ?>js/modernizr-2.6.2.min.js"></script>

    </head>
	
    <body id="body">
        <header id="navigation" class="navbar-fixed-top navbar">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
                    <a class="navbar-brand" href="#body">
						<h1 id="logo">
							<img src="<?php echo base_url('assets') ?>/logo/logo.png" alt="Brandi" class="navbar-logo">
						</h1>
					</a>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav">
                        <li class="current"><a href="<?php echo base_url() ?>">HOME</a></li>
                        <li><a href="<?php echo base_url() ?>event">EVENT</a></li>
                      <!--   <li><a href="<?php echo base_url() ?>atlet">ATLET</a></li>
                        <li><a href="<?php echo base_url() ?>">CLUB</a></li> -->
                        <li><a href="<?php echo base_url('contact') ?>">CONTACT</a></li>
                         <li><a href="<?php echo base_url('login') ?>">LOGIN</a></li>
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
		
		<?php $this->load->view($page) ?>
		
		
		<footer id="footer" class="footer">
			<div class="container">
				<div class="row">
				
					<div class="col-md-8 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms">
						<div class="footer-single">
							<h6 class="text-black">Tentang Kami</h6>
							<p class="text-black">Netskate  merupakan  platform  digital  untuk  para  skater,  club,  dan  juga  event  organizer  untuk  saling  berinteraksi.  Sejumlah  fasilitas  kami  sediakan  untuk  mengelola  organisasi  klub,  monitoring  prestasi  atlit,  pendaftaran  event,  dan  juga  berbagai  program  training.  </p></div>
					</div>
				
					<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="200ms">
						<div class="footer-single">
							<h6 class="text-black">Kontak Kami</h6>
							<p class="text-black">Diskusi  Kopi  <br>Jl.  Halimun  Raya  no.  11b  Setiabudi  Jakarta  Selatan </p>
						</div>
						<h4 style="padding-top:10px;"><img src="<?php echo base_url('assets') ?>/img/icon/phone.png" alt="" width="30"> : <span class="text-black">089656932005 </span></h4>
						<h4 style="padding-top:10px;"><img src="<?php echo base_url('assets') ?>/img/icon/email.png" alt="" width="30"> : <span class="text-black">info@netskate.id</span></h4>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="copyright text-center text-dark">
							Copyright © 2019 PT. Bitdata Solusi Indonesia
						</p>
					</div>
				</div>
			</div>
		</footer>
		
		<a href="javascript:void(0);" id="back-top"><i class="fa fa-angle-up fa-3x"></i></a>

		<!-- Essential jQuery Plugins
		================================================== -->
		<!-- Main jQuery -->
        <script src="<?php echo base_url('assets/') ?>js/jquery-1.11.1.min.js"></script>
		<!-- Single Page Nav -->
        <script src="<?php echo base_url('assets/') ?>js/jquery.singlePageNav.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="<?php echo base_url('assets/') ?>js/bootstrap.min.js"></script>

		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>




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
		<script type="text/javascript" src="<?= base_url('assets/vendor/js/plugins/bootstrap/bootstrap-datepicker.js')?>"></script>
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

		<script>
$(document).ready(function() {
    $('#example').DataTable({
        responsive: true
    });
} );

</script>
		<!-- Custom Functions -->
        <script src="<?php echo base_url('assets') ?>/js/custom.js"></script>
		
    </body>
</html>
