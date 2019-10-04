
<form action="<?= base_url('Club_event/create_event/'.$this->uri->segment(3))?>" method="post" >
    <div class="row">
       <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">   
                <div class="page-title">                    
                 <span class="fa fa-users"></span> Event Registration
                 <ul class="panel-controls" style="margin-top: 2px;">
                    <li><button type="submit" class="btn btn-info"><span class="fa fa-floppy-o"></span></button></li>
                </ul>      
            </div>       
        </div>
        <div class="panel-body" >
            <!-- <table class="table datatable"  style="font-size: 9px;"> -->
                <table id="example" class="table" style="font-size: 9px;" border="1">
                    <thead >
                        <tr>
                            <th style="font-size: 9px;">NAME</th>
                            <th style="font-size: 9px;">BOD</th>
                            <th style="font-size: 9px;">SEX</th>
                            <th style="font-size: 9px;">DICIPLINE</th>
                            <th style="font-size: 9px;">CLASS</th>
                            <th style="font-size: 9px;">GROUP AGE</th>
                            <th style="font-size: 9px;">100 M</th>
                            <th style="font-size: 9px;">200 M </th>
                            <th style="font-size: 9px;">300 M</th>
                            <th style="font-size: 9px;">500 M </th>
                            <th style="font-size: 9px;">1 K</th>
                            <th style="font-size: 9px;">3 K</th>
                            <th style="font-size: 9px;">5 K</th>
                            <th style="font-size: 9px;">10 K</th>
                            <th style="font-size: 9px;">15 K</th>
                            <th style="font-size: 9px;">RELAY</th>
                            <th style="font-size: 9px;">SKATECROSS</th>
                            <th style="font-size: 9px;">COACHING CLINIC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $d){?>
                            <tr>
                                <td><?= $d->name?></td>
                                <td><?= $d->dob?></td> 
                                <td><?= $d->sex?></td> 
                                <td><?= $d->id_dicipline?></td>
                                <td><?= $d->idclass?></td> 
                                <td><?= $d->mkuname?></td>
                                <?php foreach($get_race as $r){?>
                                    <td>
                                        <?php if($d->id_athlete == 0){ ?>
                                            <?php if($d->id_class == 1){
                                                if($r->id == 2 OR $r->id == 3 OR $r->id ==15 ){?>
                                                    <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                                <?php }?>
                                            <?php }elseif($d->id_class == 2 ){ ?>
                                                <?php if( $r->id == 4 OR $r->id == 5 OR $r->id == 6 OR $r->id ==12 OR $r->id ==15 ){ ?>
                                                    <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                                <?php } ?>
                                                <?php if(($d->id_mku == 7 OR $d->id_mku == 5) AND  $r->id ==16){?>
                                                    <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                                <?php } ?>
                                            <?php }elseif($d->id_class == 3){ ?>
                                                <?php   if($d->id_mku == 2 OR $d->id_mku == 4){
                                                if($r->id ==4 OR $r->id ==5  OR $r->id ==6 OR $r->id ==7 OR $r->id ==12  OR $r->id ==15 ){ ?>

                                                    <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                                <?php } ?>
                                            <?php }elseif($d->id_mku == 6){
                                                if($r->id ==3 OR $r->id ==5  OR $r->id ==6 OR $r->id ==8 OR $r->id ==12  OR $r->id ==15 ){ ?>
                                                    <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                                <?php } ?>
                                            <?php }elseif($d->id_mku == 8){
                                                if($r->id ==3 OR $r->id ==5  OR $r->id ==6 OR $r->id ==9 OR $r->id ==12 OR  $r->id ==15 ){ ?>
                                                    <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                                <?php   } ?>
                                            <?php }elseif($d->id_mku == 9 OR $d->id_mku == 10){ 
                                             if($r->id ==3 OR $r->id ==5  OR $r->id ==6 OR $r->id ==10 OR $r->id ==12 OR  $r->id ==15 ){ ?>
                                                <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                                
                                            <?php  } ?>

                                        <?php } ?>
                                        <?php if( $r->id == 16 AND  ($d->id_mku == 6 OR $d->id_mku == 8 OR $d->id_mku == 9 OR $d->id_mku == 10)){?>
                                           <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                       <?php } ?>
                                   <?php }elseif($d->id_class == 4){?>

                                    <?php if($r->id ==15  ){ ?>
                                     <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">  
                                 <?php } ?>
                             <?php } ?>

                             <?php }else{ ?>

                            <?php if($d->id_class == 2 ){ ?>
                                              
                                                <?php if(($d->id_mku == 7 OR $d->id_mku == 5) AND  $r->id ==16){?>

                                                    <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                                <?php } ?>

                                            <?php }elseif($d->id_class == 3){ ?>

                                        <?php if( $r->id == 16 AND  ($d->id_mku == 6 OR $d->id_mku == 8 OR $d->id_mku == 9 OR $d->id_mku == 10)){?>
                                           <input type="checkbox" name="race[]" value="<?= $r->id.','.$d->id.','.$d->id_mku ?>">
                                       <?php } ?>
                                  
                             <?php } ?>






                             <?php }?>
                         </td>	

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

