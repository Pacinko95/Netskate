<style>
table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}


</style>




<form action="<?= base_url('Club_event/create_event/'.$this->uri->segment(3))?>" method="post" name="form1" id="form1">
    <div class="row">
       <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <div class="page-title">
                 <span class="fa fa-users"></span> Event Registration
                 <ul class="panel-controls" style="margin-top: 2px;">
                    <li><button type="submit" class="btn btn-info"><span class="fa fa-arrow-circle-right"></span> Next</button></li>
                </ul>
            </div>
        </div>
        <div class="panel-body" >
            <!-- <table class="table datatable"  style="font-size: 9px;"> -->
            <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0">
            <!-- id="dtDynamicVerticalScrollExample"  -->
                    <thead >
                        <tr>
                            <th style="font-size: 9px;">NO</th>
                            <th style="font-size: 9px; width:10px;" >NAME</th>
                            <th style="font-size: 9px; width:5px;">BOD</th>
                            <th style="font-size: 9px;">SEX</th>
                            <th style="font-size: 9px;">DICIPLINE</th>
                            <th style="font-size: 9px;">CLASS</th>
                            <th style="font-size: 9px;">GROUP AGE</th>
                            <!-- <?php foreach($get_race as $ra){ ?>
                                <th style="font-size: 9px;"><?= @$ra->name ?></th>

                            <?php } ?> -->
                            <th style="font-size: 9px;"><center>Race</center></th>

                        </tr>
                    </thead>
                    <tbody >
                        <?php $no = 0;  foreach($data as $d){?>
                            <tr style="font-size: 9px;">
                                <td><?= ++$no ?></td>
                                <td><?= $d->name?></td>
                                <td><?= $d->dob?></td>
                                <td><?= $d->sex?></td>
                                <td><?= $d->id_dicipline?></td>
                                <td><?= $d->idclass?></td>
                                <td><?= $d->mkuname?>
           
                                </td>
                                                
                                <td>
                                <table>
                                            <tbody id="<?= $d->id?>">
                                        <tr >
                                        <?php foreach($get_race as $ra){  $data = $d->l_id_mku.'-'.$ra->id;?>
                                            <th style="font-size: 9px;" id="<?= $d->id.$d->id_mku_list?>">

                                                <?php foreach($mku as $m){ if($data == $m->strconcat){?>
                                                <div style="width: 100px;">
                                                    <?=  $ra->name?><br>
                                                    <input type="checkbox" name="race[]" value="<?= $ra->id.','.$d->id.','.$d->l_id_mku ?>">
                                                </div>
                                                <?php } }?>
                                            </th>

                                    <?php } ?>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                 </tr>
             <?php }?>
         </tbody>
     </table>

 </div>
</div>
</div>

</div>
</form>

