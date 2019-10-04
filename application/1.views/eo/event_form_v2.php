<div class="col-md-12">
    <form class="form-horizontal" action="<?= base_url('eo/insert_event')?>" method="POST" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <h3 class="panel-title"><strong>Create</strong> Event</h3>
            </div>
            <div class="panel-body">
                <div class="row">
            
                    <div class="col-md-4">
                    <label class="control-label"> DESIGN <hr></label>
                    </div>
                  <div class="col-md-4">
                                           
                 
                    <div class="col-md-4">
                    </div>
                             
                </div>

                <div class="row">
                    <div class="col-md-4">
                    </div>
                  <div class="col-md-4">
                                           
                    <div class="form-group">
                                                
                        <div class="col-md-12">                                            
                            <div class="input-group">
                                    <center>
                                        <div id="imagePreview"></div>
                                        <img src="<?= base_url('assets/image/user.png')?>" style="height: 150px;width: 200px" id="img"> 
                                                        
                                      <input type="file" id="file" name="img_file" onchange="return fileValidation()" style="width: 100px"/>
                                    </center>
                                </div>                                            
                                                   
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                             
                </div>


                <div class="row">
                         

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Name</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name">
                                </div>                                            
                                   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Open Registration</label>
                            <div class="col-md-4">                                                                              
                                <input type="text" class="form-control datepicker" placeholder="Start" name="start_reg">  
                                
                            </div>
                            <div class="col-md-4">                                                                              
                                <input type="text" class="form-control datepicker" placeholder="End" name="end_reg">  
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> No Contact</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <input type="text" class="form-control" name="no_tlp">
                                </div>                                            
                                   
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Location</label>
                            <div class="col-md-9 col-xs-12">                                            
                               <textarea class="form-control" rows="5" name="address"></textarea>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-9 col-xs-12">                                            
                               <textarea class="form-control" rows="5" name="description"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                <div class="row">
            
                    
                    
                 </div>
                 <div class="col-md-6">
                        <label class="control-label"> TEMPLATE <hr></label>
                        <div class="form-group">
                            <!-- <label class="col-md-3 control-label"></label> -->
                            <div class="col-md-9 col-xs-12">                                            
                              <select class="">
                              <option> select </option>
                              <?php foreach($template as $t){?>
                                <option > <?= $t->name?> Ver.<?= $t->version?> </option>
                              <?php } ?>
                              </select>
                            </div>
                        </div>
                    </div>
                    
                 </div>
             
        </div>
        <div class="panel-footer">
                 <a href="<?= base_url('event/template')?>" class="btn btn-default pull-left">Back</a>
                 <button class="btn btn-primary pull-right" type="submit">Save</button>
            </div>
    </form>
</div>



