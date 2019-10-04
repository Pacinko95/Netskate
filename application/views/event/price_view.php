<div class="row">
<!-- <form class="form-horizontal" action="<?= base_url('event/publis/'.$this->uri->segment('3').'/'.$this->uri->segment('4'))?>" method="POST" enctype="multipart/form-data"> -->
   <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">   
                <div class="page-title">                    
					<span class="glyphicon glyphicon-book"></span> Data Price
                      
				</div>                             
                                            
            </div>
            <div class="panel-body">
                <?php echo $this->session->flashdata('pesan')?>
                <div class="row">
                    <div class="col-sm-9 col-md-6" >
                        Category Class
                        <div class="panel panel-info">
                            <div class="panel-body">
                            <?php foreach($v_class as $p){ ?>     
                                <div class="row">
                                    <div class="col-sm-3 col-md-6" >
                                        <?= $p->name?>
                                    </div>
                                    <div class="col-sm-3 col-md-6" >
                                    <input type="text"  class="input-form" value="<?= $p->price ?>">
                                    </div>
                                </div><br>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;Category Race
                    <div class="col-sm-9 col-md-6" >
                        <div class="panel panel-info">
                            <div class="panel-body">
                            <?php foreach($v_team as $r){ ?>     
                                <div class="row">
                                    <div class="col-sm-3 col-md-6" >
                                        <?= @$r->name?> <b><?= @$r->team ?></b>
                                    </div>
                                    <div class="col-sm-3 col-md-6" >
                                    <input type="text" class="input-form" value="<?= @$r->price ?>">
                                    </div>
                                </div><br>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="panel-footer">
            <a href="<?= base_url('eo/event')?>" class="btn btn-default">Back</a>
            <!-- <button class="btn btn-primary pull-right" input type="submit" name="btnSubmit" value="Ubah">Submit</button> -->
        </div>
    </div>
    <!-- </form> -->
</div>            
