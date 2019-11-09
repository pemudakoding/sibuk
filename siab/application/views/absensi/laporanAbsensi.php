
<div class="col-12 col-sm-6 col-md-6 col-lg-8 col-xl-8">

  <div class="row">
    <div class="col-12">
      <div class="card box-shadow-siap ">
        <div class="card-body d-flex align-items-center">
          <h5 class="mb-0">Laporan Absensi</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  	<?php foreach ($listKelas as $row):?>
	  	<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
	  		<div class="jadwal-siap">
	  			<div class="row">  				
	  				<div class="col-5 logo-cdr-siap">
	  					<img class="img-fluid jadwal-logo-cdr-siap" src="<?php echo base_url("vendor/bootstrap/img/"); ?>cldr.svg">
	  				</div>
	  				<div class="col-7 right-jadwal-siap">
	  					<h4><?= $row['kelas']." ".$row['nama_kelas'] ?></h4>
	  					<h6><?= $row['nama_mapel'] ?></h6>
	  					<a class="btn btn-outline-info btn-block shadow-none" role="button" href="<?= base_url('laporanAbsensi/laporanKelas/').$row['id_kelas']?>">Laporan</a>
	  				</div>  				
	  			</div>
	  		</div>  		
  		</div>
	<?php endforeach;?>
  </div>

</div>
