<div class="row">
   <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title">Event Price</h3>
                                    <ul class="panel-controls">
                                    
                                        <li><a href="<?= base_url('eo/form_price/'.$this->uri->segment(3))?>" class="panel-"><span class="fa fa-plus-circle"></span></a></li>
                                    </ul>
                                </div>
            <div class="panel-body">
                <table class="table datatable" >
                    <thead>
                        <tr>
                            <!-- <th>#</th> -->
                            <th>Class</th>
                            <th>Price</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $d){ ?>
                        
                        <tr>
                            <!-- <th><a href="<?= base_url('eo/form_price/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></a></th> -->
                            <td><?= $d->name?></td>
                            <td><?= "Rp " .number_format($d->price,2,',','.') ?></td>
                            <br></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>            

                