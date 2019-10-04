
<style>
@media print{@page {size: landscape}};
  body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 21cm;
        min-height: 29.7cm;
        padding: 1cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
    }
    

table {
  font-family: Arial, Helvetica, sans-serif;
  color: #666;
  text-shadow: 1px 1px 0px #fff;
  background: #eaebec;
  }
 
table th {
  padding: 15px 35px;
  border-left:1px solid #e0e0e0;
  background: #ededed;
}
 
table th:first-child{  
  border-left:none;  
}
 
table tr {
  text-align: center;
  padding-left: 20px;
}
 
table td:first-child {
  text-align: left;
  padding-left: 0.1px;
  border-left: 0;
}
 
table td {
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
}
 
table tr:last-child td {
  border-bottom: 0;
}
 
table tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 3px;
  -webkit-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
 
table tr:last-child td:last-child {
  -moz-border-radius-bottomright: 3px;
  -webkit-border-bottom-right-radius: 3px;
  border-bottom-right-radius: 3px;
}
 
table tr:hover td {
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
}

    @page {
        size: A4; 
        margin: 0;
    }
    @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;

        }

    }


ul {
    margin:0;padding:0;
}
ul li {
   padding-top: 1em;
    padding-right: 2em;
    padding-bottom: 2em;
    padding-left: 2em;
   
}

ul li span {
    display:block;
    font-size:1.4em;
    color: black;
    font-weight: bold;
}
ul {
    display:grid;
    list-style-type:none;
    margin:0;padding:0;
    grid-template-columns: repeat(3, auto);
    grid-template-rows: repeat(2, auto);
}
img{
	width: 200px;
	height: 200px;
}
label{
	color: black;
	font-weight: bold;
}
.nu{
	letter-spacing: 2px;
	text-align: center;
}
.nu1{
	font-size: 20;
}
div#header {
    position:fixed;
    top:0px;
    left:0px;
    width:100%;
    color:#CCC;
    background:#333;
    padding:8px;
}
div#footer {
    position:fixed;
    bottom:0px;
    left:0px;
    width:100%;
    color:#CCC;
    background:#333;
    padding:8px;
	text-align: right;
}

</style>
<div class="book">
    <div class="page">
    	 <footer>
<table width="100%" >
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
		<table  border="1" class="table" style="width: 19cm;">
			<tr style="font-size: 10px; ">
				<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  ">BIB</th>
				<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0; ">NAME</th>
				<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;">SEX</th>
				<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;">BOD</th>
				<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;">DICIPLINE</th>
				<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;">CLASS</th>
				<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;">GROUP AGE</th>
				<?php foreach($race as $r){?>
					<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;"><?= $r->name?></th>
				<?php }?>
				<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;">PRICE</th>
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
          		<td>Rp. <?php $count_all = $dt->price2 + $dt->count_rp;  echo number_format($count_all,0,',',','); ?> </td>
              </tr>
           <?php } ?>
		</table>
<br>
<h5>Detail Invoice Athlete Team</h5>
		<table width="100%" border="1">
			<thead>
				<tr style="font-size: 10px; ">
					<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">NAME TEAM</th>
					<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">NAME ATHLETE</th>
					<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">CATEGORY</th>
					<th style="padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;">PRICE</th>
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
           	<th colspan="<?= @$count_race->count_race + 7?>" style="text-align: right; font-size: 15px; padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;" ><b>UNIQUE CODE</b></th>
           		<td colspan="2" style="text-align: left;font-size: 15px; padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;"><?= @$total->code_payment?></td>
           </tr>
           <tr>
           	<td colspan="<?= @$count_race->count_race + 7?>" style="text-align: right; font-size: 15px; padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed;" ><b>TOTAL</b></td>
           		<td   style="text-align: left;font-size: 15px; padding: 0.1px 0.1px;border-left:1px solid #e0e0e0;  border-bottom: 1px solid #e0e0e0;  background: #ededed; width: 100px">
				 
				   <?= @$total->pay?></td>
           </tr>
		</table>

		<p><label style="font-size: 10px;">
			NOTE:<br>
			<i>
			- Show this invoice to change with starter kits on Technical Meeting<br>
			- Call the administrator for further information<br></i>
			</label>

</div>
    </div>
    	 </footer>
			<script>
		window.print();
	</script>
	<div id="footer"><img src="http://localhost/net/assets/logo/logo.png" style="width: 100px; height: 20px;"></div>
	</html>
