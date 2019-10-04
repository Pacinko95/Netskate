<div class="row">
<form class="form-horizontal" action="<?= base_url('event/publis/'.$this->uri->segment('3').'/'.$this->uri->segment('4'))?>" method="POST" enctype="multipart/form-data">
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
                            <?php foreach($price as $p){ ?>     
                                <div class="row">
                                    <div class="col-sm-3 col-md-6" >
                                        <?= $p->name_class?>
                                    </div>
                                    <div class="col-sm-3 col-md-6" >
                                    <input type="text" name="price<?= $p->id_class.'-'.$p->id_mku ?>" class="input-form">
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
                            <?php foreach($rp as $r){ ?>     
                                <div class="row">
                                    <div class="col-sm-3 col-md-6" >
                                        <?= $r->name?>
                                    </div>
                                    <div class="col-sm-3 col-md-6" >
                                    <input type="text" name="price_race<?= $r->id_race.'-'.$r->id_mku?>" class="input-form">
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
            <button class="btn btn-primary pull-right" input type="submit" name="btnSubmit" value="Ubah">Submit</button>
        </div>
    </div>
    </form>
</div>            
