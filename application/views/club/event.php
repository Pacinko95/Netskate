
<div class="page-title">
<?php  ?>
<h2><span class="fa fa-users"></span> Event List </h2>
</div>


<?php


foreach($data as $d ){
  
   ?>
    <div class="col-md-4">
        <!-- CONTACT ITEM -->
        <div class="panel panel-default">
            <div class="panel-body profile">
                <div class="profile-image">
                    <img src="<?= base_url($d->img)?>" alt="Nadia Ali">
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?= $d->name ?></div>
                </div>

            </div>
            <div class="panel-body">
                <div class="contact-info">
                    <p><small>Address</small><br><?=$d->address?></p>
                    <p><small>Description</small><br><?=$d->description?></p>
                    <p><small>Contact</small><br><?=$d->no_tlp?></p>
                    <?php $date =  date('Ymd'); $date_db =  str_replace('-', '', @$d->end_reg); if($date < $date_db){ ?>
                   <div ><a href="<?php echo base_url('club/eventreg/'.$d->id) ?>" class="btn btn-success btn-block">Daftar</a></div>
                    <?php }else{?>
                    <div ><a href="#" class="btn btn-danger">CLOSE</a> <a href="<?= base_url('eo/result_main/'.$d->id)?>" class="btn btn-default">RESULT</a></div>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- END CONTACT ITEM -->
        </div>
    <?php }  ?>
   