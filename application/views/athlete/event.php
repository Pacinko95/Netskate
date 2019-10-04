<!-- <div>
    <h2><b>    EVENT LIST  </b></h2>
</div>
<div class="container">
    <div class="row">
        <div class="row">
            <?php foreach($data as $d){?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                    data-image="<?= base_url($d->img)?>"
                    data-target="#image-gallery">
                    <img class="img-thumbnail"
                    src="<?= base_url($d->img)?>"
                    alt="Another alt text">
                </a>
                <strong><?= $d->name ?></strong><br>
                <p><?=$d->description?></p>
                <p><?=$d->address?></p>
                <p>Contact : <?=$d->no_tlp?></p>
                <a href="<?php echo base_url('athlete/eventreg/'.$d->id) ?>" class="btn btn-success btn-xs">Daftar</a>
            </div>
        <?php } ?> 

        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="page-title">                    
    <h2><span class="fa fa-users"></span> Event List </h2>
</div>

<?php foreach($data as $d){?>
    <div class="col-md-3">
        <!-- CONTACT ITEM -->
        <div class="panel panel-default">
            <div class="panel-body profile">
                <div class="profile-image" style="">
                    <img src="<?= base_url($d->img)?>" alt="Nadia Ali">
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?= $d->name ?></div>
                </div>

            </div>                                
            <div class="panel-body">                                    
                <div class="contact-info">

                    <!-- <strong><?= $d->name ?></strong><br> -->
                <!-- <p><?=$d->description?></p>
                    <p>Contact : </p> -->

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
    <?php } ?> 
