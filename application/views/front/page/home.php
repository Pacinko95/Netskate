<section id="slider">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			
				<!-- Indicators bullet -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<!-- <li data-target="#carousel-example-generic" data-slide-to="1"></li> -->
				</ol>
				<!-- End Indicators bullet -->				
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					
					<!-- single slide -->
					<div class="item active" style="background-image: url(<?php echo base_url('assets') ?>/img/banner.jpg);">
						<div class="carousel-caption">
							<h2 data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated"><span> WELCOME TO</span>!</h2>
							<h3 data-wow-duration="1000ms" class="wow slideInLeft animated">NETSKATE</h3>
							<p data-wow-duration="1000ms" class="wow slideInRight animated">Integrated Online Sport Management Platform</p>
						</div>
					</div>
					<!-- end single slide -->
					
					<!-- single slide -->
					<!-- <div class="item" style="background-image: url(img/banner.jpg);">
						<div class="carousel-caption">
							<h2 data-wow-duration="500ms" data-wow-delay="500ms" class="wow bounceInDown animated">Meet<span> Team</span>!</h2>
							<h3 data-wow-duration="500ms" class="wow slideInLeft animated"><span class="color">/creative</span> one page template.</h3>
							<p data-wow-duration="500ms" class="wow slideInRight animated">We are a team of professionals</p>
						</div>
					</div> -->
					<!-- end single slide -->
					
				</div>
				<!-- End Wrapper for slides -->
				
			</div>
		</section>
		
        <!--
        End Home SliderEnd
        ==================================== -->
		
        <!--
        Features
        ==================================== -->

		<div style="background-color:#122942; padding:50px; color:#FFF; font-size:16px;"  align="center">
			<p>Joining or Creating Your Own Event has never been this easy. Netskate is the Integrated Online Sport Management Platform that allows you to live your life more. Give us a try. For Free.</p>
		</div>
		
        <!--
        End Features
        ==================================== -->
		
		
        <!--
        Our Works
        ==================================== -->

		<div style="background:#f5f5f5">
			<div class="container">
				<div style="padding:50px 0px;">
					<div align="center">
						<img src="<?php echo base_url('assets/img/icon/appointment.png') ?>" alt="" width="60">
						<h3 style="color: #051b38; padding-top: 16px;"><strong>LATEST EVENT</strong></h3>
					</div>
					<?php foreach($event as $e){ ?>
						<div class="col-md-3 wow bounceInUp animated" style="padding:50px 0px;">
							<div style="background: #FFF; box-shadow: 1px 1px 1px 1px #f3f3f3;">
							
								<center style="padding:10px;"><img src="<?= $e->img?>" alt="" class="img-responsive" width="200px" height="150px" ></center>
								<div class="desc-home">
									<p class="text-black" style="font-size: 16px;">
									<strong><?= $e->name?></strong>
									</p>
									<p class="text-black" style="font-size: 10px; line-height: 16px; padding: 10px 0px 0px 0px;">
									<?= $e->description?>
									</p>
									<br/>
									<a href="<?php echo base_url('event/detail/'.$e->id) ?>" class="btn btn-orange">
										More..
									</a>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
			</div>
		</div>