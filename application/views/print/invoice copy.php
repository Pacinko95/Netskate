<html  >
<style type="text/css">
	/* @media print{@page {size: landscape}}; */

	body {
  margin: 5em;


}

/* override styles when printing */
@media print {

}


</style>
<table width="100%" border="0">
	<tr>
		<th width="20%">INVOICE  CODE  :<br> <hb style="font-family: Arial, Helvetica, sans-serif;"><?= @$invoice->code_invoice?> </b></th>
		<th width="20%">Event  Name: <br> <b style="font-family: Arial, Helvetica, sans-serif;"><?= @$invoice->name_event?></b></th>
		<th width="20%">STATUS:<br> <b style="font-family: Arial, Helvetica, sans-serif;"><?= @$invoice->status?> </b></th>
		<th width="60%" rowspan="2" style="text-align: right;"><img src="<?= base_url(@$count_race->img)?>" width="100%" height="35%"> </th>
	</tr>
	<tr>
		<th></th>
		<th></th>
		<th></th>
	</tr>
</table>
<p><p>
	<?= @$invoice->status_namae?>: <?= @$invoice->name?><br>
	OFFICIAL   : <?= @$invoice->official?><p><p>
	<h5>Detail Invoice Athlete Individu </h5>
		<table width="100%" border="1">
			<tr style="font-size: 10px; ">
				<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">BIB</th>
				<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">NAME</th>
				<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">SEX</th>
				<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">BOD</th>
				<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">DICIPLINE</th>
				<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">CLASS</th>
				<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">GROUP AGE</th>
				<?php foreach($race as $r){?>
					<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;"><?= $r->name?></th>
				<?php }?>
				<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed; width: 100px">PRICE</th>
			</tr>
				  <?php foreach($data_athlete as $dt){ ?>
                        <tr style="font-size: 10px; border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;">
                        	<td><?= $dt->bib?></td>
                            <td><?= $dt->name?></td>
                            <td><?= $dt->sex?></td>
                            <td><?= $dt->bod?></td>
                            <td><?= $dt->disname?></td>
                            <td><?= $dt->clname?></td>
                             <td><?= $dt->mku?></td>

                            <?php foreach($race as $r){?>
                            <td ><?php
                            $h = $dt->id_athlete.'-'.$r->id;
                            foreach($data_invoice as $rt){
                            	if($rt->data == $h ){
                            		echo '<center>x</center>';
                            	}
                            }
                             ?></td>
                        <?php } ?>
                     
						<td>Rp. <?php $count_all = $dt->price2 + $dt->count_rp;
                                    echo number_format($count_all,0,',',','); ?> </td>
                        

                        
                        </tr>
           <?php } ?>


            
		</table>

<br>

<h5>Detail Invoice Athlete Team</h5>

		<table width="100%" border="1">

			<thead>
				<tr style="font-size: 10px; ">
					<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">NAME TEAM</th>
					<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">NAME ATHLETE</th>
					<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">CATEGORY</th>
					<th style="padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">PRICE</th>

				</tr>
		</thead>
		<tbody>

					<?php foreach($mku_team as $mt){ ?>
							<tr style="font-size: 10px; border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;">
								<td><center><b><?= @$mt->name_team?></b></center></td>
								<td>
									<?php $no = 0; foreach($get_sub_athlete as $sub){ if($sub->team == $mt->team){?>
										<?= ++$no.'. '.@$sub->name ?> <br>
									<?php } }?>
								</td>
								<td><center><?= @$mt->last_name.' '.@$mt->first_name.' '.@$mt->name_class?></center></td>
								<td><center>Rp. <?= number_format(@$get_one_team->price,0,',',',')  ?></center></td>
								</tr>


					 <?php } ?>
		</tbody>


		</table>
		<br>
		<table  width="100%" >
		<tr> 
           	<th colspan="<?= @$count_race->count_race + 8?>" style="text-align: right; font-size: 18px; padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;" ><b>UNIQUE CODE</b></th>
           		<td colspan="2" style="font-size: 18px; padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;"><?= @$total->code_payment?></td>
           </tr>
           <tr>
           	<td colspan="<?= @$count_race->count_race + 8?>" style="text-align: right; font-size: 18px; padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;" ><b>TOTAL</b></td>
           		<td   style="font-size: 18px; padding: 5px 5px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed; width: 100px">
				 
				   <?= @$total->pay?></td>
           </tr>
		</table>
		<p>
			NOTE:<br>
			- Show this invoice to change with starter kits on Technical Meeting<br>
			- Call the administrator for further information<br>


			<script>
		window.print();
	</script>
	</html>
