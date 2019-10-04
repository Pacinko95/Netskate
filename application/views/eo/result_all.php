<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
 <div class="page-content-wrap">
 <div class="row">
 <form  action="<?= base_url('eo/result_save_all/'.$this->uri->segment(3))?>" method="post">
  <div class="col-sm-4">  <!-- START PANEL WITH REMOVE CALLBACKS -->
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Input data</h3>
                                </div>
                                <div class="panel-body">
                                <div class="form-group">
                                        <label class="col-md-4 col-xs-12 control-label">BIB</label>
                                        <div class="col-md-8 col-xs-12">                                            
                                            <div class="input-group">
                                                
                                            <input type="text" class="form-control"  name="bib" id="bib" >
                                        <span class="input-group-addon" id="klik"><span class="fa fa-search"></span></span>
                                            </div>                                            
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-12 control-label">Athlete Name</label>
                                        <div class="col-md-8 col-xs-12">                                            
                                            <div class="input-group">
                                                
                                            <input type="text" class="form-control"  name="athlete_name" id="athlete_name" >
                                       
                                            </div>                                            
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-12 control-label">Sex</label>
                                        <div class="col-md-8 col-xs-12">                                            
                                            <div class="input-group">
                                                
                                            <input type="text" class="form-control"  name="sex" id="sex" >
                                      
                                            </div>                                            
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-12 control-label">Club Name</label>
                                        <div class="col-md-8 col-xs-12">                                            
                                            <div class="input-group">
                                                
                                            <input type="text" class="form-control"  name="name_club" id="name_club" >
                                        
                                            </div>                                            
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-12 control-label">Class</label>
                                        <div class="col-md-8 col-xs-12">                                            
                                            <div class="input-group">
                                                
                                            <input type="text" class="form-control"  name="class" id="class" >
                                       
                                            </div>                                            
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-12 control-label">Group Age</label>
                                        <div class="col-md-8 col-xs-12">                                            
                                            <div class="input-group">
                                                
                                            <input type="text" class="form-control"  name="mku" id="mku" >
                                            <input type="hidden" id="code" name="code">
                                            </div>                                            
                                            
                                        </div>
                                    </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table " id="mydata">
                                            <thead>
                                            <tr >
                                                    <th >Race</th>
                                                    <th>Time</th>
                                                    <th>Rangking</th>
                                            </tr>
                                            </thead>
                                            <tbody id="show_data" style="font-size: 10px;">                                            
                                                
                                               
                                                    </tbody>
                                                </table>
                                               
                                </div>
                                <div class="panel-footer">                                
                                <a href="<?= base_url('eo/event')?>" class="btn btn-default">Back</a> 
                                    <input type="submit" class="btn btn-primary pull-right" value="Submit">
                                </div>
                            </div>
                            <!-- END PANEL WITH REMOVE CALLBACKS --></div>
                            </form>
  <div class="col-sm-8">  <!-- START PANEL WITH REMOVE CALLBACKS -->
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Table Athlete</h3>
                                </div>
                                <div class="panel-body">
                                <div class="table-responsive">
                                                    <table class="table datatable" id="mytable">
                                                    <thead>
                                                        <tr>
                                                            <th width="50">BIB</th>
                                                    <th>Name</th>
                                                    <th >Sex</th>
                                                        <th >Club</th>
                                                        <th >Class</th>
                                                        <th >Group Age</th>
                                                       
                                                        <th >#</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>   
                                                    
                                                    <?php foreach($data as $d){?>                                         
                                                        <tr>
                                                       <td><?= $d->bib?></td>
                                                       <td><?= $d->name_athlete?> </td>
                                                       <td><?= $d->sex?> </td>
                                                       <td><?= $d->name_club?> </td>
                                                       <td><?= $d->name_class?> </td>
                                                       <td><?= $d->name_mku?> </td>
                                                      
                                                      
                                                       <td> <button class="btn btn-default btn-rounded btn-sm" id="button" value="<?= $d->bib?>" ><span class="fa fa-pencil"></span></button> </td>
                                                       
                                                 
            
                                                     
                                                  
                                                </tr>
                                                <?php } ?>
                                            
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                                <div class="panel-footer">                                
                                  
                                </div>
                            </div>
                            <!-- END PANEL WITH REMOVE CALLBACKS --></div>
 
</div>
 
                
          
                
                                 
                
            </div>
