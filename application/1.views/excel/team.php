
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");


// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Report.xls");

?>
 <table border="1s">
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Club Name</th>
                        <th>BIB</th>
                        <th>Athlete Name</th>
                        <th>Category</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $dt){ ?>
                        <tr>
                            <td><?= $dt->name_team?></td>
                            <td><?= $dt->name_club?></td>
                            <td><?= $dt->bib?></td>
                            <td><?= $dt->name_athlete?></td>
                            <td><?= $dt->category?></td>
                           
                        
                            
                        </tr>
                    <?php }?>
                </tbody>
            </table>
