<div class="col-md-12">                            
    <form class="form-horizontal" action="<?= base_url('athlete/update')?>" method="POST" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <h3 class="panel-title"><strong>Create</strong> Athlete</h3>
            </div>
            <div class="panel-body">
            <?php echo $this->session->flashdata('pesan')?>                                                                        
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Photo</label>
                            <div class="col-md-9">     
                                <div id="imagePreview"></div>
                                <?php if($_SESSION['logo'] ==''){?>
                                    <img src="<?= base_url('assets/image/user.png')?>" style="height: 200px;width: 200px" id="img"> 
                                <?php }else{  ?>
                                    <img src="<?= base_url($_SESSION['logo'])?>" style="height: 200px;width: 200px" id="img"> 
                                <?php }  ?>

                                <input type="file" id="file" name="img_file" value="<?= @$data->img ?>"onchange="return fileValidation()"/>
                            </span>
                        </div>  
                    </div>  

                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="name" class="form-control" value="<?= @$data->name?>">
                            </div>                                            
                            <span class="help-block"></span>
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sex</label>
                        <div class="col-md-9">                                            
                            <div class="input-group">
                                <input type="radio" name="sex" value="Male" <?php echo (@$data->sex=='Male')?'checked':'' ?>> Male &nbsp &nbsp
                                <input type="radio" name="sex" value="Female" <?php echo (@$data->sex=='Female')?'checked':'' ?>> Female<br>
                            </div>                                            
                            <span class="help-block"></span>
                            <?php echo form_error('sex'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Date Of Birth</label>
                        <div class="col-md-5">
                            <h5><?= @$data->dob ?></h5>
                            <?php echo form_error('dob'); ?>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                <input type="text" name="dob" id="dp-3" class="form-control datepicker" value="<?= @$data->dob ?>" data-date="06-06-2014" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Discipline</label>
                        <div class="col-md-9">                                            
                            <!-- <div class="input-group"> -->
                                <select class="form-control"  name="id_dicipline" id="id_dicipline">
                                  <option value='0'> Select </option>
                                  <?php foreach($dcp as $d){?>
                                    <option value="<?=$d->id?>" <?= $d->id == @$data->iddicipline ? "selected='selected'" : '' ?> ><?=@$d->name?></option>
                                <?php } ?>
                            </select>
                            <?php echo form_error('id_dicipline'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Class</label>
                        <div class="col-md-9">                                            
                            <select class="form-control" name="idclass" id="idclass">
                                <option value='0'> Select</option>
                                <?php foreach($data_class as $c){?>
                                   <option value="<?= $c->id?>" <?= $c->id == @$data->idclass ? "selected='selected'" : '' ?> ><?= $c->name?></option>
                               <?php } ?>
                           </select>
                           <?php echo form_error('idclass'); ?>
                       </div>
                   </div>­­­­­­
                   
               </div>
               
               <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">Address</label>
                    <div class="col-md-9 col-xs-15">                                            
                        <textarea class="form-control" name="address" rows="5" class="form-control" placeholder="Please input your address"><?= @$data->address?></textarea>
                        <span class="help-block"></span>
                        <?php echo form_error('address'); ?>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Province</label>
                    <div class="col-md-9">                                                                                            
                        <select class="form-control" id="id_provinsi" name="idprovinsi">
                            <option>Select Province</option>
                            <?php
                            
                            foreach($data_provinsi as $provinsi){                                                                                                                   
                                ?>
                                <option value = "<?php echo $provinsi->idprovinsi?>" <?= $provinsi->idprovinsi == @$data->idprovinsi ? "selected='selected'" : '' ?>><?php echo $provinsi->name?></option>
                                <?php
                            }
                            ?>                                                    
                        </select>
                    </div>
                </div>
                

                <div class="form-group">
                    <label class="col-md-3 control-label">City</label>
                    <div class="col-md-9">                                                                                            
                        <select class="form-control" id="id_city" name="idkabupaten">
                            <option value="0">Select City</option>                                           
                        </select>                                                    
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">District</label>
                    <div class="col-md-9">                                                                                            
                        <select class="form-control" id="id_subdistrict" name="idkecamatan">
                            <option value="0">Select District</option>
                            
                        </select>
                        
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Village</label>
                    <div class="col-md-9">                                                                                            
                        <select class="form-control" id="id_urbanvillage" name="idkelurahan">
                            <option value="0">Select Urban Village</option>
                            
                        </select>
                        
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Phone</label>
                    <div class="col-md-9">                                            
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" value="<?= @$data->no_tlp?>" name="no_tlp">
                        </div>             
                        <?php echo form_error('no_tlp'); ?>                               
                        <span class="help-block"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">E-Mail</label>
                    <div class="col-md-9">                                            
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" value="<?= @$data->email?>" name="email">
                        </div>                 
                        <?php echo form_error('email'); ?>                           
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            
            
        </div>

    </div>
    <div class="panel-footer">
        <!-- <button class="btn btn-default" > Clear Form</button>                                     -->
        <button class="btn btn-primary pull-right" input type="submit" name="btnSubmit" value="Ubah">Update</button>
    </div>
</div>

</form>

</div>
