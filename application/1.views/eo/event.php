<div class="row">
   <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">   
                <div class="page-title">                    
					<span class="glyphicon glyphicon-book"></span> Data Event
                     <ul class="panel-controls">
                    <a href="<?= base_url('event/design')?>">
                    <button type="submit" class="btn btn-info" title="New Event">
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
                            <th>EVENT NAME</th>
                            <th>OPEN REGISTRATION</th>
                            <th>CLOSE REGISTRATION</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $d){?>
                        <tr>
                            <th>
                            <?php if($d->flag == 1){?>
                            <a href="<?= base_url('eo/invoice/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" title="INVOICE">
                            <span class="fa fa-file-text-o"></span></a>
                            <a href="<?= base_url('invoice/excel_invoice_eo/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" title="Download Invoice" target="_blank">
                            <span class="fa fa-file-excel-o">  </span></a>
                            <a href="<?= base_url('eo/result_all/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" title="RESULT" >
                            <span class="glyphicon glyphicon-inbox"></span></a>

                            <a href="<?= base_url('event/price_view/'.$d->id.'/'.$d->id_template)?>" class="btn btn-default btn-rounded btn-sm" title="RESULT" >
                            <span class="fa fa-money"></span></a>
                            <a href="<?= base_url('event/team_donload/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" title="Download Team" target="_blank">
                            <span class="fa fa-users"></span></a>
                            <?php }else{?>
                                <a href="<?= base_url('event/price/'.$d->id.'/'.$d->id_template)?>" class="btn btn-default btn-rounded btn-sm" title="PUBLISH">
                                <span class="glyphicon glyphicon-send"></span></a>
                            <?php } ?>
                            <!-- <a href="<?= base_url('event/event_update/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" title="UPDATE"><span class="fa fa-pencil"></span></a> -->
                             </th>
                            <th><?= $d->name?></th>
                            <th><?= $d->start_reg?></th>
                            <th><?= $d->end_reg?></th>
                            <!-- <th><?php if(date('Y-m-d') == $d->end_reg){ echo '<span class="label label-danger">CLOSE</span>';}else{echo '<span class="label label-success">OPEN</span>';} ?></th> -->
                            <th><?php if($d->flag == 1){ echo 'Publis';}else{echo 'Draf';} ?></th> 
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>            
