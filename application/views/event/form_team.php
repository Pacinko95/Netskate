<div class="col-md-12">
    <form class="form-horizontal" action="<?= base_url('Club_event/team_save/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>" method="POST" enctype="multipart/form-data">
    <form>
    <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">
            <h3 class="panel-title"><strong>Create</strong> Team Relay</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <!-- <div class="col-md-4">
                <label>&nbsp;&nbsp;&nbsp;All Athlete </label>
                    <table class="table " >
                        <thead>
                            <tr style="font-size: 10px" >
                                <th>Nama Athlete</th>
                                <th>Sex</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($athlete as $at){ ?>
                            <tr>
                                <td><?= @$at->name ?></td>
                                <td><?= @$at->sex ?></td>
                                <td><?= @$at->name_class ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div> -->
                <div class="col-md-12">

                    <table class="table " >
                        <thead>
                            <tr style="font-size: 10px" >
                                <th>ATHLETE NAME</th>
                                <th>SEX</th>
                                <th>CLASS</th>
                                <th>MKU</th>
                                <th>CATEGORY</th>
                                <th>TEAM</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($athlete_team as $at){ ?>
                            <tr>
                                <td><?= @$at->name ?><input type="hidden" name="id_athlete<?= @$at->id_athlete ?>" value="<?= @$at->id_athlete ?>"></td>
                                <td><?= @$at->sex ?><input type="hidden" name="sex<?= @$at->id_athlete ?>" value="<?= @$at->sex ?>"></td>
                                <td><?= @$at->name_class ?></td>
                                <td><?= @$at->mkuname ?></td>
                                <td><select name="category<?= @$at->id_athlete ?>" ><option> select </option><?php foreach($mku_team as $mku){?> <option value="<?= @$mku->id?>"> <?= @$mku->last_name.' '.@$mku->first_name.' '.@$mku->name?> </option> <?php }?></select></td>
                                <td><input type="number" min="1" max="4" name="team<?= @$at->id_athlete ?>" required></td>
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
