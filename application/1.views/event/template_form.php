


<div class="col-md-12">
    <form class="form-horizontal" action="<?= base_url('event/save_template/'.$this->uri->segment(3))?>" method="POST" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <h3 class="panel-title"><strong>Create</strong> Template</h3>
            </div>
           
            <div class="panel-body">                                                                        
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="name" class="form-control" value="<?= @$detail->name?>" <?php if(@$detail->name != null){ echo'readonly';}?>>
                                </div>                                            
                                <span class="help-block" style="color: red; font-size: 8px;"><?php echo form_error('name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                <input type="radio" name="status" value="1"  required="required" <?php if(@$detail->flag == 1){ echo 'checked';}?> > Publis &nbsp; &nbsp;
                                <input type="radio" name="status" value="2"  required="required" <?php if(@$detail->flag == 2){ echo 'checked';}?> > Draf<br>
                                <input type="hidden" name="txflag" value="<?= @$detail->flag ?>">
                                <input type="hidden" name="version" value="<?= @$detail->version ?>">
                                <span class="help-block"></span>
                                </div>                                           
                                <span class="help-block" style="color: red; font-size: 8px;"><?php echo form_error('name'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <br><br><br>
                <div class="row">
                <label class="control-label"><h4> Kelompok Umur</h4><hr></label>
                    <div class="col-md-12">
                    <table class="table " border="1">
                <thead>
                    <tr style="font-size: 10px" > 
                       
                        <th>CLASSES</th>
                        <th>GROUP AGE</th>
                        <?php foreach($race as $r){ ?>
                            <th><?= $r->name?></th>
                        <?php }?>   

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $dt){ ?>
                        <tr>
                           
                            <td><?= $dt->name_class?></td>
                            <td><?= $dt->name_mku?></td>
                            <?php foreach($race as $r){?>

                            <td> 
                            
                            <input type="checkbox" name="race[]" value="<?= $dt->id.'-'.$r->id?>" <?php foreach($template as $temp): ?> <?php $a= $dt->id.'-'.$r->id; if($a == $temp->mr ){ echo 'checked';}?> <?php endforeach; ?>>
                            

                            
                            
                             </td>
                        <?php } ?>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
            <a href="<?= base_url('event/template')?>" class="btn btn-default">Back</a>
            <button class="btn btn-primary pull-right"  type="submit" name="btnSubmit" value="Ubah">Submit</button>
        </div>
        </div>
    </form>
</div>
                