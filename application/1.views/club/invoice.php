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
                            <th>Date</th>
                            <th>Status</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $d){?>
                    <tr>
                        <td><a href="<?= base_url('invoice/detail/'.$d->code_invoice)?>" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></a></td>
                        <td><?= $d->code_invoice?></td>
                        <td><?= $d->create_date?></td>
                        <td><?= $d->status?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>            

             