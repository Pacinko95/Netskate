<div class="col-md-12">
    <form class="form-horizontal" action="<?= base_url('eo/update')?>" method="POST" enctype="multipart/form-data">
     <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
            <h3 class="panel-title"><strong>PROFILE</strong> Event Organizer</h3>
        </div>
        <!-- <div class="panel-body">
            <h4>Person in charge</h4>
            <?php echo $this->session->flashdata('pesan')?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-6">                                            
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?= @$data->name?>" readonly>
                            </div>                                            
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                   <div class="form-group">
                    <label class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">                                            
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?= @$data->email?>" readonly>
                        </div>                                            
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <hr style="width: 100%; color: black; height: 1px; background-color:#efeeee;" /> -->
    <div class="panel-body">
    <?php echo $this->session->flashdata('pesan')?>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <div class="col-md-9">                                            
                        <div class="input-group">
                            <div id="imagePreview"></div>
                                <?php if(@$data->img ==''){?>
                                    <img src="<?= base_url('assets/image/user.png')?>" style="height: 100px;width: 100px" id="img"> 
                                <?php }else{  ?>
                                    <img src="<?= base_url(@$data->img)?>" style="height: 100px;width: 100px" id="img"> 
                                <?php }  ?>
                                <input type="file" id="file" name="img_file" onchange="return fileValidation()"/>
                            </div>                                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-md-8 ">                                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="name_eo" value="<?= @$data->name?>">  
                            </div>                                            
                        </div>
                    </div>
                    <span class="help-block"></span>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Phone Number</label>
                        <div class="col-md-8">                                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="no_tlp" value="<?= @$data->no_tlp?>">
                            </div>                                            
                        </div>
                    </div>
                    <span class="help-block"></span>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Address</label>
                        <div class="col-md-8 col-xs-12">                                            
                            <textarea class="form-control" rows="5" name="address"><?= @$data->address?></textarea>
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

