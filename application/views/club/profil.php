<div class="col-md-12">
                            
                            <form class="form-horizontal" action="<?= base_url('club/profil_create')?>" method="POST" enctype="multipart/form-data">
                            <div class="panel panel-default">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title"><strong>CLUB</strong> Profile</h3>
                                   
                                </div>
                                <?php echo $this->session->flashdata('pesan')?>
                               

                                <div class="panel-body">
                                      <!-- <h4>Profil Event Organizer</h4> -->
                                    <div class="row">
                                        <div class="col-md-2">
                                           
                                            <div class="form-group">
                                                
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <div id="imagePreview"></div>
                                                        <?php if($data->img ==''){?>
                                                        <img src="<?= base_url('assets/image/user.png')?>" style="height: 150px;width: 200px" id="img"> 
                                                        <?php }else{  ?>
                                                        <img src="<?= base_url($data->img)?>" style="height: 150px;width: 200px" id="img"> 
                                                         <?php }  ?>
                                                        <input type="file" id="file" name="img_file" onchange="return fileValidation()"/>
                                                    </div>                                            
                                                    
                                                </div>
                                            </div>
                                        </div>
                                 
                                        
                                        <div class="col-md-7">
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Club Name</label>
                                                <div class="col-md-9">   
                                                    <div class="input-group">
                                                         <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="name_club" value="<?= $data->name_club?>">
                                                    </div>                                            
                                                 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Phone Number</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="no_tlp" value="<?= $data->no_tlp?>">
                                                    </div>                                            
                                                    
                                                </div>
                                            </div>
                                            
                                          
                                                    
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email</label>
                                               <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="email" value="<?= $data->email?>">
                                                    </div>                                            
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Coach</label>
                                               <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="coach" value="<?= $data->coach?>">
                                                    </div>                                            
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Official</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="official" value="<?= $data->official?>">
                                                    </div>                                            
                                                </div>
                                            </div>   
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Address</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <textarea class="form-control" rows="5" name="address"><?= $data->address?></textarea>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>                                                                         
                                        </div>

                                    </div>
                                            
                                </div>
                                <div class="panel-footer">
                                  
                                    
                                 
                                    <button class="btn btn-primary pull-right" type="submit">Update</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>

