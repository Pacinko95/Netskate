<div class="row">
 <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading ui-draggable-handle">   
            <div class="page-title">                    
               <span class="glyphicon glyphicon-book"></span> Result Event
               <ul class="panel-controls">
                <?php if(!empty(@$_SESSION['id_eo'])){ ?>
                <li><a href="<?= base_url('eo/event')?>" class="panel"><span class="fa fa-arrow-circle-left"></span></a></li>
                <li><a href="<?= base_url('eo/result_form/'.$this->uri->segment(3))?>" class="panel"><span class="fa fa-plus-circle"></span></a></li>
            <?php } ?>
            </ul>   
        </div>                             

    </div>


    <div class="gallery" id="links" style="width: 50%">
        <?php $no = 0; foreach($data as $d){?>

            <a class="gallery-item" href="<?php echo base_url($d->file)?>" title="<?php echo str_replace('result_doc/', '',$d->file);?>" data-gallery="">
                <div class="image">                              
                    <img src="<?= base_url('assets/image/excel-1.png')?>" alt="<?php echo str_replace('result_doc/', '',$d->file);?>">                                        
                    <ul class="gallery-item-controls">

                    </ul>                                                                    
                </div>
                <div class="meta">
                    <strong><?php echo str_replace('result_doc/', '',$d->file);?></strong>
                    <span><?= $d->description?></span>
                
                </div>                                
            </a>

        <?php }?> 





    </div>
</div>
</div>
</div>            
