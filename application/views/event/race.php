<div class="row">
   <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">   
                <div class="page-title">                    
					<span class="glyphicon glyphicon-book"></span> Data Race
                     <ul class="panel-controls">
                    <a href="<?= base_url('event/race_create')?>" >
                    <button type="submit" class="btn btn-info" title="New Race">
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
                            <th>RACE</th>
                            <th>CLASS PRICE</th>
                            <th>RACE PRICE</th>
                            <th>TEAM PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                   <?php foreach($race as $d){?>
                         <tr>
                            <th width="200px">
                            <a href="<?= base_url('event/race_update/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" data-toggle="tooltip" title="EDIT">
                            <span class="fa fa-pencil"></span></a>
                            <a href="<?= base_url('event/race_delete/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" data-toggle="tooltip" title="DELETE">
                            <span class="fa fa-trash-o"></a>
                           </th>
                            <th><?= $d->name?></th>
                            <th><span class="glyphicon glyphicon-ok"></span></th>
                            <th><?php if($d->rp == 1){ echo '<span class="glyphicon glyphicon-ok"></span>'; } ?></th>
                            <th><?php if($d->team == 1){ echo '<span class="glyphicon glyphicon-ok"></span>'; } ?></th>
                     </tr>
                    <?php }?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>         
