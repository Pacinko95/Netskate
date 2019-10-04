<div class="col-md-12">
    <form class="form-horizontal" action="<?= base_url('event/save_class/'.$this->uri->segment(3))?>" method="POST" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <h3 class="panel-title"><strong>Create</strong> Class</h3>
            </div>
            <div class="panel-body">                                                                        
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name Class</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?= @$data->name?>" name="name">
                                    <span class="input-group-addon"></span>
                                </div> 
                                    <span class="help-block" style="color: red; font-size: 8px;"><?php echo form_error('name'); ?></span>                                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="<?= base_url('event/class')?>" class="btn btn-default">Back</a>
                <button class="btn btn-primary pull-right" input type="submit" name="btnSubmit" value="Ubah">Submit</button>
            </div>
        </div>
    </form>
</div>
                