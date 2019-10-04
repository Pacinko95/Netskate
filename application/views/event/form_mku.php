<div class="col-md-12">
    <form class="form-horizontal" action="<?= base_url('event/save_mku/'.$this->uri->segment(3))?>" method="POST" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <h3 class="panel-title"><strong>Create</strong> MKU</h3>
            </div>
            <div class="panel-body">                                                                        
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NAMA</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?= @$data->name?>" name="name">
                                    <span class="input-group-addon"></span>
                                </div> 
                                 <span class="help-block" style="color: red; font-size: 8px;"><?php echo form_error('name'); ?></span>                                           
                            </div>
                        </div>
                                            
                        <div class="form-group">
                            <label class="col-md-3 control-label">AGE</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Start</span>
                                        <input type="number" class="form-control" value="<?= @$data->name?>" name="age_start" min="0">
                                        <span class="input-group-addon">thn</span>
                                    </div> 
                                    <span class="help-block" style="color: red; font-size: 8px;"><?php echo form_error('name'); ?></span>                                           
                                </div>
                                <label class="col-md-1 control-label">SAMPAI</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">End</span>
                                        <input type="number" class="form-control" value="<?= @$data->name?>" name="age_end" min="1">
                                        <span class="input-group-addon">thn</span>
                                    </div> 
                                    <span class="help-block" style="color: red; font-size: 8px;"><?php echo form_error('name'); ?></span>                                           
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">CLASS</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <select class="form-control" name="id_class">
                                        <option> - Pilih -</option>
                                        <?php foreach($class as $c){?>
                                        <option value="<?= $c->id ?>"><?= $c->name ?></option>   
                                        <?php } ?>
                                    </select>
                                    <span class="input-group-addon"></span>
                                </div> 
                                <span class="help-block" style="color: red; font-size: 8px;"><?php echo form_error('name'); ?></span>                                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a href="<?= base_url('event/mku')?>" class="btn btn-default">Back</a>
            <button class="btn btn-primary pull-right" input type="submit" name="btnSubmit" value="Ubah">Submit</button>
        </div>
    </div>
    </form>
</div>
                