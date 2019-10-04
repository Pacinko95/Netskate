<div class="row">
   <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">  
                <div class="panel-title-box">
                    <h3>Data Invoice</h3>
                    
                </div>                                    
                                           
            </div>
            <div class="panel-body">
                <?php echo $this->session->flashdata('pesan')?>
                <table class="table datatable" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Invoice</th>
                            <th>Event Name</th>
                            <th>Date</th>
                             <th>Payment</th>
                      
                            <th>Status</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $d){?>
                    <tr>
                        <td width="100px">
                            <?php if($d->code_invoice != ''){?>
                             <?php if($d->id_status == 6){ ?>
                                <?php if($d->step == 1){ ?>
                                
                                <a href="<?= base_url('club_event/create_event/'.$d->id_event.'/'.$d->code_invoice)?>" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
                                <?php }elseif($d->step == 2){ ?> 
                                
                                    <a href="<?= base_url('Club_event/team_name/'.$d->id_event.'/'.$d->code_invoice)?>" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
                           
                           <?php } }else{ ?>
                            <a href="<?= base_url('invoice/detail/'.$d->code_invoice)?>" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
                        <?php } } ?>
                        <?php if($d->id_status == 4){?>
                            <a href="<?= base_url('invoice/print_invoice/'.$d->code_invoice) ?>" class="btn btn-default btn-rounded btn-sm" target="_blank"><span class="fa fa-print"></span></a> 

                            <!-- <a href="<?= base_url('invoice/excel_invoice/'.$d->code_invoice)?>" class="btn btn-default btn-rounded btn-sm" target="_blank"><span class="fa fa-file-excel-o"></span></a> -->
                        <?php }?>
                          <?php  if($d->id_status == 1 || $d->id_status == 6){?>
                                    <a href="<?= base_url('invoice/delete_invoice/'.$d->code_invoice)?>" class="btn btn-default btn-rounded btn-sm" ><span class="fa fa-trash-o"></span></a>
                              <?php }?>
                        </td>
                        <td><?= $d->code_invoice?></td>
                        <td><?= $d->name_event?></td>
                        <td><?= $d->create_date?></td>
                        <td>Rp. <?= $d->hasil?></td>
                      
                        <td> <?php if($d->id_status =='1' || $d->id_status =='6'){
                                echo '<b>'.$d->status.'</b>';
                        }else{
                            echo $d->status;
                        } 
                        ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>            

             