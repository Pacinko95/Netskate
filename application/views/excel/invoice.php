
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");


// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Report.xls");

?>
 <table border="1s">
                <thead>
                    <tr>
                        <th>BIB</th>
                        <th>ATHLETE NAME</th>
                        <th>CLUB NAME</th>
                        <th>SEX</th>
                        <th>DOB</th>
                        <th>DISCIPLINE</th>
                        <th>CLASSES</th>
                        <th>GROUP AGE</th>
                        <?php foreach($race as $r){?>
                        <th><?= @$r->name ?> </th>
                        <?php   } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_athlete as $dt){ ?>
                        <tr>
                            <td><?= $dt->bib?></td>
                            <td><?= $dt->name?></td>
                            <td><?= $dt->name_club?></td>
                            <td><?= $dt->sex?></td>
                            <td><?= $dt->bod?></td>
                            <td><?= $dt->disname?></td>
                            <td><?= $dt->clname?></td>
                            <td><?= $dt->gpname?></td>
                            <?php foreach($race as $r){?>

                            <td>

                                <?php $hasil =  $dt->id_athlete.'-'.$r->id;
                                foreach($data_invoice as $k)
                                    if($hasil == $k->data){
                                        echo '<center><b>X</b></center>';
                                } ?>


                                </td>
                        <?php } ?>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
