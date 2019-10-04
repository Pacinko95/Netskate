<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading ui-draggable-handle">
			<h3 class="panel-title">
				<strong>Detail</strong> Invoice
			</h3>
		</div>
		<div class="panel-body">
			<form  action="<?= base_url('eo/upadte_invoice/'.$this->uri->segment(3))?>" method="post">
				<input type="hidden" name="id_event" value="<?= @$data->id_event ?>">
					<div class="row">
						<div class="form-group">
							<label class="col-md-4 control-label">No Invoice</label>
								<div class="col-md-6">
									<div class="input-group"> 
										<?= @$data->code_invoice?>
									</div>
									<span class="help-block"></span>
								</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Total</label>
											<div class="col-md-6">
												<div class="input-group">
													 <b><?= @$data->total?></b>
												</div>
												<span class="help-block"></span>
											</div>
										</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Club Name </label>
											<div class="col-md-6">
												<div class="input-group">
													<?= @$data->name_club?>
											</div>
											<span class="help-block"></span>
										</div>
									</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Request Date </label>
									<div class="col-md-6">
										<div class="input-group">
											<?= @$data->date?>
										</div>
										<span class="help-block"></span>
									</div>
								</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Phone </label>
								<div class="col-md-6">
									<div class="input-group">
										<?= @$data->no_tlp?>
									</div>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Email </label>
								<div class="col-md-9">
									<div class="input-group">
										<?= @$data->email?>
									</div>
									<span class="help-block"></span>
								</div>
							</div>


				      <div class="form-group">
										<label class="col-md-3 control-label">Status</label>
										<div class="col-md-9 ">
											<div class="input-group">
												<input type="radio" name="status" value="4" <?php echo (@$data->id_status=='4')?'checked':'' ?> required="required" > Approve &nbsp &nbsp
												<input type="radio" name="status" value="5"<?php echo (@$data->id_status=='5')?'checked':'' ?> required="required" > Not Approve
															<span class="help-block"></span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">Description</label>
													<div class="col-md-9 ">
														<textarea class="form-control" rows="3" name="remaks">
															<?= @$data->remaks?>
														</textarea>
														<span class="help-block"></span>
													</div>
												</div>
                        <div class="form-group">
                          <!-- <label class="col-md-3 control-label">Images</label> -->
                          <div class="col-md-12 col-xs-12">
                            <div class="input-group">
                           <center>   <img src="
                                <?= base_url(@$data->img)?>" style="height: 100px;width: 100px" id="myImg" data-toggle="modal" data-target="#myModal">
                                </center>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View Image</button> -->
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body">
                                        <img src="
                                          <?= base_url(@$data->img)?>" class="img-responsive">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <span class="help-block"></span>
                                </div>
                              </div>
                            </div>
											</div>
										</div>
                    </div>
						<div class="panel-footer">
											<a href="
												<?= base_url('eo/invoice/'.@$data->id_event)?>" class="btn btn-primary">Back
											</a>
											<?php  if(@$data->id_status == 2 ){?>
											<input type="hidden" name="code_invoice" value="<?= $this->uri->segment(3)?>">
												<button class="btn btn-primary pull-right">Submit</button>
												<?php } ?>
											</div>
										</div>
									</div>
								</form>

							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading ui-draggable-handle">
										<h3 class="panel-title">
											<span class="fa fa-credit-card"></span> Detail Invoice Athlete Individu
										</h3>
										<ul class="panel-controls">
											<!--  <li><a href="
											<?= base_url('invoice/excel_invoice/'.$this->uri->segment(3))?>" class="panel-" target="_blank"><span class="fa fa-file-excel-o"></span></a></li> -->
											<li>
												<a href="#" class="panel-collapse">
													<span class="fa fa-angle-down"></span>
												</a>
											</li>
										</ul>
									</div>
									<div class="panel-body">
										<table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0">
											<thead>
												<tr style="font-size: 10px">
													<th>BIB</th>
													<th>NAME</th>
													<th>SEX</th>
													<th>DOB</th>
													<th>SIZE</th>
													<th>DICIPLINE</th>
													<th>CLASSES</th>
													<th>GROUP AGE</th>
													<?php foreach($race as $r){?>
													<th>
														<?= @$r->name?>
													</th>
													<?php } ?>
												</tr>
											</thead>
											<tbody>
												<?php foreach($data_athlete as $dt){ ?>
												<tr>
													<td><?= $dt->bib?></td>
													<td><?= $dt->name?></td>
													<td><?= $dt->sex?></td>
													<td><?= $dt->bod?></td>
													<td><?= $dt->tshirt?></td>
													<td><?= $dt->disname?></td>
													<td><?= $dt->clname?></td>
													<td><?= $dt->mku?></td>
													<?php foreach($race as $r){?>
													<td>
														<?php $hasil =  $dt->id_athlete.'-'.$r->id;
                                foreach($data_invoice as $k)

                                    if($hasil == $k->data){
                                        echo '<center><span class="fa fa-check"></span></center>';
                                    }

                                ?>
													</td>
													<?php } ?>
												</tr>
												<?php }?>
											</tbody>
										</table>
									</div>
								</div>
                <div class="panel panel-default">
                  <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                      <span class="fa fa-credit-card"></span> Detail Invoice Athlete Team
                    </h3>
                    <ul class="panel-controls">
                      <!--  <li><a href="
                      <?= base_url('invoice/excel_invoice/'.$this->uri->segment(3))?>" class="panel-" target="_blank"><span class="fa fa-file-excel-o"></span></a></li> -->
                      <li>
                        <a href="#" class="panel-collapse">
                          <span class="fa fa-angle-down"></span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="panel-body">
                    <table class="table " >
                      <thead>
                        <tr style="font-size: 10px">

                          <th>NAME TEAM</th>
                          <th>NAME ATHLETE</th>
                          <th>CATEGORY</th>

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
