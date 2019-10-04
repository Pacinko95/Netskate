<div class="row">
 <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">  
            <div class="panel-title-box">
                <h3>Data Athlete</h3>
                <span>List data athlete</span>
            </div>                                    
            <ul class="panel-controls" style="margin-top: 2px;">
                <a href="<?= base_url('club/form_athlete')?>">
                <button type="submit" class="btn btn-info">
                <span class="fa fa-plus-circle" title="New Athlete"></span> Create</button></a>
                </ul>
        </div>
        <div class="panel-body">
            <?php echo $this->session->flashdata('pesan')?>
            <table class="table datatable" >
                <thead>
                    <tr>
                        
                        <th>ACTION</th>
                        <th>NAME</th>
                        <th>BOD</th>
                        <th>SEX</th>
                        <th>DICIPLINE</th>
                        <th>CLASS</th>
                        <th>GROUP AGE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $d){?>
                        <tr>
                            <th><a href="<?= base_url('club/form_athlete/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" title="UPDATE">
                            <span class="fa fa-pencil"></span></a>
                            <a href="<?= base_url('club/delete_athlete/'.$d->id)?>" class="btn btn-default btn-rounded btn-sm" data-box="#message-box-default" title="DELETE">
                            <span class="fa fa-trash-o"></span></a>
                        </th>
                            <th><?= $d->name?></th>
                            <th><?= $d->dob?></th>
                            <th><?= $d->sex?></th>
                            
                            <th><?= $d->id_dicipline?></th>
                            <th><?= $d->idclass ?></th>
                            <th><?= $d->mkuname?></th>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>            

