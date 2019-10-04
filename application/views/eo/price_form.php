<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            
            <form class="form-horizontal" action="<?= base_url('eo/save_price/'.$this->uri->segment(3))?>" method="POST" >
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><strong>Create Price Event</h3> </strong>
                  
                </div>
                <div class="panel-body">                                                                        
                   
                    <div class="row">
                        
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Class</label>
                                <div class="col-md-9">                                            
                                <select class="form-control" name="class" id="class" > 
                                    <option>Select Class</option>
                                    <?php foreach($class as $c){?>
                                    <option value="<?= $c->id?>" <?= @$data->id == $c->id ? "selected='selected'" : '' ?>><?= $c->name?></option>
                                    <?php }?>
                                    <option id="other">OTHER</option>
                                </select>
                                                                         
                                   
                                </div>
                                <br><br>
                                 <div class="form-group">
                                <label class="col-md-3 control-label">Price</label>
                                <div class="col-md-9">                                            
                                 <input type="text" name="price" id="price" class="form-control">
                                    </div>                                            
                                   
                               
                            </div>
                            </div>
                          </div>
                          
                    
                    </div>
                </div>
                <div class="panel-footer">
                   
                    <a href="<?= base_url('eo/price')?>" class="btn btn-default"> Back</a>                                    
                    <button class="btn btn-primary pull-right">Submit</button>
                </div>
            </div>
            </form>            
        </div>
    </div>                    
    
</div>