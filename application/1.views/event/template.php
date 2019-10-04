<div class="row">
   <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">   
                <div class="page-title">                    
					<span class="glyphicon glyphicon-book"></span> Data Template
                     <ul class="panel-controls">
                    <a href="<?= base_url('event/form_template')?>">
                    <button type="submit" class="btn btn-info" title="New Template">
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
                            <th>NAME</th>
                            <th>VERSION</th>
                            <th>STATUS</th>
                            <th>CREATED DATE</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $d){?>
                         <tr>
                            <th>
                            <?php if($d->flag == 2){ ?>  
                            <a href="<?= base_url('event/form_template/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" title="EDIT"><span class="fa fa-pencil"></a>
                            <?php }else{ ?>
                                <a href="<?= base_url('event/view_template/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" title="VIEW"><span class="fa fa-list"></span></a>
                                <a href="<?= base_url('event/edit_template/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" title="EDIT"><span class="fa fa-pencil"></a>
                            <?php } ?>   
                         </th>
                            <th><?= $d->name?></th>
                            <th><?= $d->version?></th>
                            <th><?php if($d->flag == 1){ echo 'PUBLIS'; }else{ echo 'DRAF';} ?></th>
                            <th><?= $d->create_date?></th>
                    
                           
                        </tr>
                    <?php }?>   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>          
 
<script type='text/javascript' src="<?php echo base_url('assets/js/template_setting.js') ?>"></script>
<script type='text/javascript' >
$( "p" ).click(function() {
  alert();
});

</script>