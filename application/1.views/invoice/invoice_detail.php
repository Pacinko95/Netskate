<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">  
				<div class="panel-title-box">
					<h3>Detail Invoice Athlete Individu</h3>
				</div>                                    
			</div>
			<div class="panel-body">
				<table class="table " >
					<thead>
						<tr>
							<th>BIB</th>
							<th>NAME</th>
							<th>SEX</th>
							<th>DICIPLINE</th>
							<th>CLASS</th>
							<th>GROUP AGE</th>
							<th>PRICE</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data as $d){?>
							<tr>
								<td><?= $d->bib?></td>
								<td><?= $d->name?></td>
								<td><?= $d->sex?></td>
								<td><?= $d->disname?></td>
								<td><?= $d->clname?></td>
								<td><?= $d->mku?></td>
                                <td>Rp. <?php $count_all = $d->price2 + $d->count_rp;
                                    echo number_format($count_all,0,',',','); ?></td>
							</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-heading">  
				<div class="panel-title-box">
					<h3>Detail Invoice Athlete Team </h3>
				</div>                                    
			</div>
			<div class="panel-body">
				<table class="table " >
				<table class="table " >
                        <thead>
                            <tr style="font-size: 10px" > 
                                <th>Nama Team</th>
                                <th>Nama Athlete</th>
                                <th>Category</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php foreach($mku_team as $mt){?> 
                        <tr>
                            <td><?= @$mt->name_team?></td>
                            <td>
                            <?php $no = 0; foreach($get_sub_athlete as $sub){ if($sub->team == $mt->team){?> 
                                <?= ++$no.'. '.@$sub->name ?> <br>
                            <?php } }?>
                            </td>
                            <td><?= @$mt->last_name.' '.@$mt->first_name.' '.@$mt->name_class?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
				</table>
			</div>
		</div>
	</div>

<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading">  
			<div class="panel-title-box">
				<h3>List Payment Invoice</h3>
			</div>                                    

		</div>
		<div class="panel-body">
			<form action="<?= base_url('invoice/price/'.$this->uri->segment(3))?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-md-5 control-label">Payment</label>
					</div><br><br>
					<div class="form-group">
						<label class="col-md-1"></label>
						<label class="col-md-4 control-label" > Code Invoice</label>
						<label class="col-md-1"> </label>
						<div class="col-md-6" >                                            
							<div class="input-group" >
								<b><?= $this->uri->segment(3)?></b>
								
							</div>                                            

						</div>
					</div><br>
					<div class="form-group">
						<label class="col-md-1"></label>
						<label class="col-md-4 control-label" > Individu</label>
						<label class="col-md-1">Rp.</label>
						<div class="col-md-6" >                                            
							<div class="input-group" >
							<?php 
						
							foreach($price_rp as $pp){
									$jumlah[] =  @$pp->rp;
								} 
								if(empty($price_rp)){
									$count_rp_class = 0;
								}else{
									$count_rp_class = array_sum(@$jumlah);
								}

								foreach($data as $k){
									// echo $count_all = $d->price2 + $d->count_rp;
								}
							foreach($data as $d){
									$jml[] =  @$d->count_rp;
								} 

								$data_jml = array_sum(@$jml);
								// echo $data_jml;
								

							if($data_jml == 0){
								// $a =  @$list->hasil;
								$a = $d->price2 + $d->count_rp;
							}else{
								// echo  @$list->hasil; echo '='.$price_rp->count_race;
								$a =  @$list->hasil + $price_rp->count_race;
							}

							
							?>
							<?php //$count_all = $d->price2 + $d->count_rp;  echo number_format($count_all,0,',',','); ?>
							
								<?php    echo number_format($a,0,',',',') ;?>
								
							</div>                                            

						</div>
					</div><br>
					
				
				<div class="form-group">
				<label class="col-md-1"></label>
					<label class="col-md-4 control-label" > Team </label>
					<!-- &nbsp;(<?php echo @$count_team->max_team ; ?>) -->
					<label class="col-md-1">Rp.</label>
					<div class="col-md-6">                                            
						<div class="input-group">
							<?= number_format(@$count_price_team->price,0,',',',') ?>
						</div>                                            
					</div>
				</div><br><br>
				<div class="form-group">
					<label class="col-md-5 control-label">Unique Code</label>
					<label class="col-md-1">Rp.</label>
					<div class="col-md-6">                                            
						<div class="input-group" style="text-align: right;">
							<?php if(@$list->status ==1){?>
								<?php echo @$list->code_payments; $code_payment = @$list->code_payments?>
							<?php }else{?>
								<?php echo @$list->code_payments; $code_payment = @$list->code_payments?>
							<?php }?>
						</div>                                            
					</div>
				</div> <br><hr>
				<div class="form-group">
					<label class="col-md-5"><b>Total Payment</b></label>
					<label class="col-md-1">Rp.</label>
					<div class="col-md-6">                                            
						<div class="input-group" style="text-align: right;">
							<?php $hasil = $count_rp_class+$code_payment+$a+@$count_price_team->price; echo  number_format($hasil,0,'.',',') ;?>
							<input type="hidden" name="payment" value="<?= $count_rp_class+$code_payment+@$a+@$count_price_team->price?>">
							<input type="hidden" name="code_payment" value="<?= $code_payment?>">
						</div>                                            
					</div>
				</div> <br><br>
				<div class="panel-body panel-body-pricing" align="center" style="border: 2px solid red;">
                    <h3 >Please Transfer to:<br></h3>                                
                    <p> <?= $rek->rek_name?></p>
                    <p><?= $rek->rek_nomor?></p>
                    <p> An. <?= $rek->rek_address?></p>    
                                </div>
				<br><br><br><br>
				<div class="form-group">
					<label class="col-md-4">Image</label>

					<div class="col-md-8">                                            
						<div class="input-group" style="text-align: right;">
							<?php if(@$list->status ==1){?>
								<input type="file" name="img_file" id="img_file" required="required">
							<?php }else{ ?>
								<center><img src="<?= base_url(@$list->img)?>" style="height: 100%;width: 50%" data-toggle="modal" data-target="#myModal"></center>
								<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-body">
												<img src="<?= base_url(@$list->img)?>" class="img-responsive">
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>                                            
					</div>
				</div>               
				<div class="block">
                <div class="block">
                	<div class="form-group">
                		<div class="col-md-12">
                				<?php if(@$list->status ==1){?>
                					<button type="submit" class="btn btn-success btn-block">Pay</button>
                				<?php }else{ ?>
                					<a href="<?= base_url('invoice')?>" class="btn btn-success btn-block">Back</a>
                				<?php } ?>
                			</div>
                		</div>
                	</div>
                </form>
            </div>
       </div>
    </div>   

	
