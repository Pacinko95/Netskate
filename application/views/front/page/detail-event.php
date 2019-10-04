

<section id="facts" class="facts" style="padding-top:70px">

<center><img src="<?= base_url(@$detail_event->img_layer)?>" alt="" class="img-responsive"  height="200px"></center>
<!-- <center>  <img src="<?= base_url(@$detail_event->img_layer)?>" alt="" class="img-responsive" style="height: 500px;"></center> -->

</section>
<div class="schedule">
<div class="container">
<div class="row">
<div class="col-md-3 pading-info-event border-right" align="center">
<h4 class="text-white">Registration Date</h4>
<h3 class="text-white" style="padding-top:10px;"><strong>
<?= date('d', strtotime(@$detail_event->start_reg))?> - <?= date('d F Y', strtotime(@$detail_event->end_reg))?></strong></h3>
</div>

<div class="col-md-5 pading-info-event border-right" align="center">
<h4 class="text-white">Location</h4>
<h3 class="text-white" style="padding-top:10px;"><strong><?= @$detail_event->address?></strong></h3>
</div>

<div class="col-md-2 pading-info-event border-right" align="center">
<h4 class="text-white">Club</h4>
<h3 class="text-white" style="padding-top:10px;"><strong><?=@$countclub->club?></strong></h3>
</div>

<div class="col-md-2 pading-info-event" align="center">
<h4 class="text-white">Athlete</h4>
<h3 class="text-white" style="padding-top:10px;"><strong><?= @$athlete->athlete?></strong></h3>
</div>
</div>
</div>
</div>

<div class="sponsor">
<div class="container">
<h2 align="center" class="text-black"><strong>REGISTERED ATHLETE</strong></h2>
<div class="list-sponsor">
<div class="row">
<div class="panel-body">
<table id="example" class="table table-striped table-bordered display nowrap" style="width:100%">
<thead style="    background: #f79700;
color: #000;">
<tr >
<th>BIB</th>

<th>ATHLETE NAME</th>
<th>CLUB NAME</th>
<th>BOD</th>
<th>SEX</th>
<th>DICIPLINE</th>
<th>CLASS</th>
<th>GROUP AGE</th>

</tr>
</thead>
<tbody>
<?php foreach($data as $d){?>
<tr>
<th><?= $d->bib?></th>
<th><?= $d->name?></th>
<th><?= $d->name_club?></th>

<th><?= $d->dob?></th>
<th><?= $d->sex?></th>
<th><?= $d->name_diciplin?></th>
<th><?= $d->name_class?></th>
<th><?= $d->mku?></th>

</tr>
<?php }?>
</tbody>
</table>
</div>
</div>


</div>
</div>
</div>
<div class="info-event">
<div class="rows">
<div class="col-info" align="center">
<h3 class="text-white" style="padding-top:20px;">
<strong>Dapatkan Buku Panduan!</strong>
</h3>
<br/><br/>
<a href="<?= base_url(@$detail_event->book) ?>" class="btn btn-dark btn-lg" download>
Download
</a>
</div>

<div class="col-about">
<h3 class="text-black">
<strong>Tentang event</strong>
</h3>
<br/>
<p class="text-black">
<?= @$detail_event->description?>
<!--  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio magni accusamus officiis autem velit animi tempore dolores quis iure assumenda voluptatum temporibus voluptate, sit perspiciatis, voluptatem, reiciendis esse ipsum repellendus.</p>
<br/>
<a href="" class="btn btn-dark">Selengkapnya</a> -->
</div>
</div>
</div>

<div class="contat-evet">
<div class="container" align="center">
<h2 align="center" class="text-black"><strong>Kontak Event</strong></h2>
<br/>
<p class="text-black"><!-- <?=  $detail_event->sex == 'Male' ? "Bapak" : 'Ibu' ?>  <?= @$detail_event->contact_name?> --> Kami akan selalu siap menjawab setiap pertanyaan anda</p>
<div class="kontak-event">
<img src="<?php echo base_url('assets/img/icon/phone.png') ?>" alt="" width="4%">
<br/><br/>
<!-- <h4><?= @$detail_event->no_tlp?></h4> -->
<?= @$detail_event->no_tlp?>

</div>
</div>
</div>


