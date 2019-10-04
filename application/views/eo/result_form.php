<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            
            <form class="form-horizontal" action="<?= base_url('eo/result_save/'.$this->uri->segment(3))?>" method="POST"  enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><strong>Create Price Event</h3> </strong>
                  
                </div>
                <div class="panel-body">                                                                        
                   
                    <div class="row">
                        
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">File</label>
                                <div class="col-md-9">                                            
                                <input type="file" name="file" id="file">
                                                                         
                                   
                                </div>
                                <br><br>
                                 <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">                                            
                               <textarea name="description"></textarea>
                                    </div>                                            
                                   
                               
                            </div>
                            </div>
                          </div>
                          
                    
                    </div>
                </div>
                <div class="panel-footer">
                   
                    <a href="<?= base_url('eo/event')?>" class="btn btn-default"> Back</a>                                    
                    <button class="btn btn-primary pull-right">Submit</button>
                </div>
            </div>
            </form>            
        </div>
    </div>                    
    
</div>