<div style="background-color:#122942; padding:50px; color:#FFF; font-size:16px; margin-top:70px"  align="center">
			<p>Joining or Creating Your Own Event has never been this easy. Netskate is the Integrated Online Sport Management Platform that allows you to live your life more. Give us a try. For Free.</p>
		</div>
<div style="background:#f5f5f5;">
			<div class="container">
				<div style="padding:50px 0px;">
					<div align="center">
						<img src="<?php echo base_url('assets/img/icon/appointment.png') ?>" alt="" width="60">
						<h3 style="color: #051b38; padding-top: 16px;"><strong>LATEST EVENT</strong></h3>
					</div>
					<?php foreach($event as $e){ ?>
						<div class="col-md-3 wow bounceInUp animated" style="padding:50px 0px;">
							<div style="background: #FFF; box-shadow: 1px 1px 1px 1px #f3f3f3;">
								<center style="padding:10px;"><img src="<?= $e->img?>" alt="" class="img-responsive" width="200px"></center>
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

        <div class="container" align="center">
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<li>
						<a href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
						</li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
						<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
        </div>