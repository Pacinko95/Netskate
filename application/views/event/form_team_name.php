<div class="col-md-12">
    <form class="form-horizontal" action="<?= base_url('Club_event/team_name_save/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>" method="POST" enctype="multipart/form-data">
    <form>
    <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
            <h3 class="panel-title"><strong>Create</strong> Name Team</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table " >
                        <thead>
                            <tr style="font-size: 10px" >
                                <th>Nama Team</th>
                                <th>Nama Athlete</th>
                                <th>Category</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php foreach($mku_team as $mt){?>
                        <tr>
                            <td><input type="text" name="name<?= @$this->uri->segment(4).''.$mt->team?>" required></td>
                            <td>
                            <?php $no = 0; foreach($get_sub_athlete as $sub){ if($sub->team == $mt->team){?>
                                <?= ++$no.'. '.@$sub->name ?> <br>
                            <?php } }?>
                            </td>
                            <td><?= @$mt->last_name.' '.@$mt->first_name.' '.@$mt->name_class?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary pull-right" input type="submit" name="btnSubmit" value="Ubah">Submit</button>
        </div>
    </div>
    </form>
</div>
