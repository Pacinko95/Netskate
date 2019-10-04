<div class="row">
   <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">   
                <div class="page-title">                    
					<span class="glyphicon glyphicon-book"></span> Data MKU
                     <ul class="panel-controls">
                    <a href="<?= base_url('event/create_mku')?>">
                    <button type="submit" class="btn btn-info" title="New Master Kelompok Umur">
                   <span class="fa fa-plus-circle"></span> Create</button></a> 
                </ul>   
				</div>                             
                                            
            </div>
            <div class="panel-body">
                <?php echo $this->session->flashdata('pesan')?>
                <table class="table datatable" >
          
                    <thead>
                        <tr>
                            <th>ACTION</th>
                            <th>NAME CLASS</th>
                            <th>GROUP AGE</th>
                            <th>AGE START</th>
                           <th>AGE END</th>
                        </tr>
                    </thead>
                    <tbody>
                   <?php foreach($mku as $d){?>
                         <tr>
                            <th>
                                <a href="<?= base_url('event/mku_update/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" data-toggle="tooltip" title="EDIT" ><span class="fa fa-pencil"></a>
                                <a href="<?= base_url('event/mku_delete/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" data-toggle="tooltip" title="DELETE"><span class="fa fa-trash-o"></a>
                           </th>
                           <th><?= $d->name_class?></th>
                            <th><?= $d->name?></th>
                            <th><?= $d->age_start?></th>
                            <th><?= $d->age_end?></th>
                        </tr>
                    <?php }?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>          

