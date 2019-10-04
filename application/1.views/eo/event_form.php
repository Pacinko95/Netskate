<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            
            <form class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><strong>Create Event</h3> </strong>
                    <ul class="panel-controls">
                        <li><a href="<?= base_url('eo/event')?>" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">                                                                        
                    
                    <div class="row">
                        
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Event Name</label>
                                <div class="col-md-9">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control">
                                    </div>                                            
                                   
                                </div>
                            </div>
                                                       
                            <div class="form-group">
                                <label class="col-md-3 control-label">Event Description</label>
                                <div class="col-md-9 col-xs-12">                                            
                                    <textarea class="form-control" rows="5"></textarea>
                               
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Event Image</label>
                                <div class="col-md-9">                                                                                                      <input type="file" name="">                                
                                  
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">                                        
                                <label class="col-md-3 control-label">Open Registration</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" class="form-control datepicker" value="">                                            
                                    </div>
                                
                                </div>
                            </div>

                            <div class="form-group">                                        
                                <label class="col-md-3 control-label">End Registration</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" class="form-control datepicker" value="">                                            
                                    </div>
                                  
                                </div>
                            </div>
                                                      
                                                                                                          
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-default">Clear Form</button>                                    
                    <button class="btn btn-primary pull-right">Submit</button>
                </div>
            </div>
            </form>            
        </div>
    </div>                    
    
</div>