<form action="<?= base_url('Athlete_event/create_event/'.$this->uri->segment(3))?>" method="post" >



<div class="row">
   <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">   
                <div class="page-title">                    
					<span class="fa fa-users"></span> Event Registration
				        <ul class="panel-controls" style="margin-top: 2px;">
                            <!-- <li><a href="<?= base_url('athlete/invoice')?>" class="panel-"><span class="fa fa-floppy-o"></span></a></li> -->
                            <li><button type="submit" class="panel-"><span class="fa fa-floppy-o"></span></button></li>
                                                                           
                        </ul>      
                </div>       
            </div>
            <?php echo $this->session->flashdata('pesan')?>
            <div class="panel-body" style="padding: 1px;">
                <table class="table" style="font-size: 9px;">
                    <thead >
                        <tr >
                            <th style="font-size: 9px;">Name</th>
                            <th style="font-size: 9px;">DOB</th>
                            <th style="font-size: 9px;">SEX</th>
                            <th style="font-size: 9px;">DISCIPLINE</th>
                            <th style="font-size: 9px;">CLASS</th>
                            <th style="font-size: 9px;">GROUP AGE</th>
                          
                            <th style="font-size: 9px;">100 m</th>
                            <th style="font-size: 9px;">200 m </th>
                            <th style="font-size: 9px;">300 m</th>
                            <th style="font-size: 9px;">500 m </th>
                            <th style="font-size: 9px;">1 K</th>
                            <th style="font-size: 9px;">3 K</th>
                            <th style="font-size: 9px;">5 K</th>
                            <th style="font-size: 9px;">10 K</th>
                            <th style="font-size: 9px;">15 K</th>
                            <!-- <th style="font-size: 9px;">20 K</th> -->
                            <th style="font-size: 9px;">Relay</th>
                             <th style="font-size: 9px;">SKATECROSS</th>
                            <th style="font-size: 9px;">COACHING CLINIC</th>
                           </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $d){?>
                        <tr>
                            <th><?= $d->name?></th>
                            <th><?= $d->dob?></th> 
                            <th><?= $d->sex?></th> 
                            <th><?= $d->id_dicipline?></th>
                            <th><?= $d->idclass?></th> 
                            <th><?= $d->mkuname?></th>
                            <?php foreach($get_race as $r){?>
                                <th>
                                <?php if($d->id_class == 1){
                                    if($r->id == 2 OR $r->id == 3 OR $r->id ==16){?>
                                <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                <?php } }elseif($d->id_class == 2 ){ if( $r->id == 4 OR $r->id == 5 OR $r->id == 6 OR $r->id ==12 OR $r->id ==16){ ?>
                                        <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                <?php } }elseif($d->id_class == 3){ 
                                    
                                    if($d->id_mku == 2 OR $d->id_mku == 4){
                                    if($r->id ==4 OR $r->id ==5  OR $r->id ==6 OR $r->id ==7 OR $r->id ==12 OR $r->id ==16){ ?>
                                    
                                    <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                    <?php }}elseif($d->id_mku == 6){
                                        if($r->id ==3 OR $r->id ==5  OR $r->id ==6 OR $r->id ==8 OR $r->id ==12 OR $r->id ==16){ ?>
                                            <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                       <?php }}elseif($d->id_mku == 8){
                                        if($r->id ==3 OR $r->id ==5  OR $r->id ==6 OR $r->id ==9 OR $r->id ==12 OR $r->id ==16){ ?>
                                            <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                 <?php   } }elseif($d->id_mku == 9 OR $d->id_mku == 9){ 
                                     if($r->id ==3 OR $r->id ==5  OR $r->id ==6 OR $r->id ==10 OR $r->id ==12 OR $r->id ==16){ ?>
                                    <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                               <?php  }} ?>


                               <?php }elseif($d->id_class == 4){?>
                                    <?php if($r->id ==15 OR $r->id ==16  ){ ?>
                                     <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                 <?php } ?>
                               <?php } ?>
                                </th>   
                            <?php }?>                       
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
</form>
