<div class="col-md-12">
    <form class="form-horizontal" action="<?= base_url('event/save_race/'.$this->uri->segment(3))?>" method="POST" enctype="multipart/form-data">
    <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
            <h3 class="panel-title"><strong>Create</strong> Race</h3>
        </div>
        <div class="panel-body">                                                                        
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name Race</label>
                        <div class="col-md-4">                                            
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?= @$data->name?>" name="name">
                                <span class="input-group-addon"></span>
                            </div> 
                            <span class="help-block" style="color: red; font-size: 8px;"><?php echo form_error('name'); ?></span>                                           
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Class Price</label>
                        <div class="col-md-4">                                            
                            <div class="input-group">
                                <input type="checkbox" style="margin-top: 10px;" checked="checked" disabled>
                              </div> 
                                                                    
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Race Price</label>
                        <div class="col-md-9">                                            
                            <div class="input-group">
                                <input type="checkbox" name="rp" value="1" style="margin-top: 10px;">
                              </div> 
                            <span class="help-block" style="color: red; font-size: 8px;"><?php echo form_error('rp'); ?></span>                                           
                        </div>
                        
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Team Price</label>
                        <div class="col-md-9">                                            
                            <div class="input-group">
                                <input type="checkbox" name="team" value="1" style="margin-top: 10px;">
                              </div> 
                            <span class="help-block" style="color: red; font-size: 8px;"><?php echo form_error('team'); ?></span>                                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a href="<?= base_url('event/race')?>" class="btn btn-default">Back</a>
            <button class="btn btn-primary pull-right" input type="submit" name="btnSubmit" value="Ubah">Submit</button>
        </div>
    </div>
    </form>
    </div>
                