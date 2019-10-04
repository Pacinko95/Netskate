<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
            <h3 class="panel-title"><strong>View</strong> Template</h3>
        </div>
        <div class="panel-body">                                                                        
            <div class="row">
                <div class="col-md-12">
                    <table class="table " border="1">
                        <thead>
                            <tr style="font-size: 10px" > 
                                <th>CLASSES</th>
                                <th>GROUP AGE</th>
                                <?php foreach($race as $r){ ?>
                                <th><?= $r->name?></th>
                                <?php }?>   
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $dt){ ?>
                            <tr>
                                <td><?= $dt->name_class?></td>
                                <td><?= $dt->name_mku?></td>
                                <?php foreach($race as $r){ ?>
                                <td>
                                <?php 
                                foreach($data_race as $dr){
                                if($dr->id_mku ==  $dt->id && $dr->id_race == $r->id){?>
                                    <center>  X</center>
                                <?php }} ?> 
                                </td>
                                <?php } ?>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
            <a href="<?= base_url('event/template')?>" class="btn btn-default">Back</a>
          </div>
        </div>
  </div>

                