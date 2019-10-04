<div class="row">
 <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">   
            <div class="page-title">                    
               <span class="fa fa-credit-card"></span> Data Invoice
               <ul class="panel-controls">
                <a href="<?= base_url('eo/event')?>" >
                    <button type="submit" class="btn btn-info" title="BACK">
                   <span class="fa fa-mail-reply-all"></span> BACK</button></a>                   
                </ul>      
        </div>                             

    </div>
    <div class="panel-body">
        <table class="table datatable" >
            <thead>
                <tr>
                    <th>ACTION</th>
                    <th>NO INVOICE</th>
                    <th>NAME CLUB</th>
                    <th>DATE</th>
                    <th>STATUS</th>
                </tr>
            </thead> 
            <tbody>
                <?php foreach($data as $d){?>
                    <tr>
                        <td style="width: 150px">
                            <a href="<?= base_url('eo/form_invoice/'.$d->code_invoice)?>" class="btn btn-default btn-rounded btn-sm" data-toggle="tooltip" title="Detail" >
                            <span class="fa fa-pencil"></span></a>
                            <?php if($d->id_status ==5){ ?>
                                <a href="<?= base_url('invoice/print_invoice/'.$d->code_invoice)?>" class="btn btn-default btn-rounded btn-sm" data-toggle="tooltip" title="Print Invoice"target="_blank">
                            <span class="fa fa-print"></span></a>
                            <?php } ?>
                            </td>
                            <td><?= $d->code_invoice?></td>
                            <td><?= $d->name_club?></td>
                            <td><?= $d->date?></td>
                            <td>
                                <?php if($d->id_status == '1'){ ?>
                                    <span class="label label-default"><?= $d->status?></span>
                                    
                                <?php }elseif($d->id_status == '2'){?>
                                    <span class="label label-warning"><?= $d->status?></span>
                                <?php }elseif($d->id_status == '3'){?>
                                   <span class="label label-warning"><?= $d->status?></span>
                                <?php }elseif($d->id_status == '4'){?>
                                     <span class="label label-success"><?= $d->status?></span>
                                <?php }elseif($d->id_status == '5'){?>
                                     <span class="label label-danger"><?= $d->status?></span>
                                <?php } ?>
                            </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>            

