<div class="row">
   <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">   
                <div class="page-title">                    
					<span class="glyphicon glyphicon-book"></span> Data Class
                     <ul class="panel-controls">
                    <li><a href="<?= base_url('event/create_class')?>" class="panel"><span class="fa fa-plus-circle"></span></a></li> 
                </ul>   
				</div>                             
                                            
            </div>
            <div class="panel-body">
                <?php echo $this->session->flashdata('pesan')?>
                <table class="table datatable" >
          
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                   <?php foreach($data as $d){?>
                         <tr>
                            <th>
                            <a href="<?= base_url('event/class_update/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm">update</a>
                            <a href="<?= base_url('event/class_delete/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm">delete</a>
                          
                           </th>
                            <th><?= $d->name?></th>
                          
                    
                           
                        </tr>
                    <?php }?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
