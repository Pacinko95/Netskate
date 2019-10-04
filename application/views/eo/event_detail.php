<form action="<?= base_url('eo/save_detail/'.$this->uri->segment(3))?>" method="post" id="add" >
<div class="row">
   <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">   
                <div class="panel-title-box">
                    <h3>Detail Event</h3>
                    <span></span>
                </div>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <button type="submit" class="btn btn-info"><span class="fa fa-save"></span></button>
                </ul>                          
            </div>
            <div class="panel-body">
                <table  class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>MKU</th>
                            <?php foreach($get_race as $race){?>
                            <th style="text-align: center;"><?=$race->name?></th>
                            <?php }?>
                        </tr>


                            <!-- <th>50 m</th>
                            <th>100 m</th>
                            <th>200 m </th>
                            <th>300 m</th>
                            <th>500 m </th>
                            <th>1 K</th>
                            <th>3 K</th>
                            <th>5 K</th>
                            <th>10 K</th>
                            <th>15 K</th>
                            <th>20 K</th>
                            <th>Relay</th>
                            <th>Marathon</th>
                            <th>Criterium</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($get_class as $class){?>
                            <tr>
                            <td> <?= $class->name?></td>
                            <td><?= $class->mku?></td>
                            <?php foreach($get_race as $race){?>
                            <td style="text-align: center;"> 
                                <input type="checkbox" name="race[]" value="<?= $class->id.','.$race->id?>">
                             </td>
                            <?php }?>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
</form>           

                