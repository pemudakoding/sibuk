
<div class="col-12 col-sm-6 col-md-6 col-lg-8 col-xl-8">

  <div class="row">
    <div class="col-12">
      <div class="card box-shadow-siap ">
        <div class="col-12 d-flex">
        	<div class="col-4 card-body d-flex align-items-center">
          		<h5 class="mb-0">Laporan Absensi</h5>
       	 	</div>
       	 	<div class="col-8 d-flex justify-content-end">
       	 		<form action="" class="d-flex align-items-center ">
       	 			<div class="form-group m-0 mr-2 d-flex flex-wrap " id="selectJenisRekap">
       	 				<select class="form-control form-control-sm" id="rekap" name="tipeJenisRekap">
						  <option value="">Pilih Jenis Rekap</option>
						  <option value="tahun">Tahunan</option>
						  <option value="bulan">Bulanan</option>
						  <option value="mingguan">Mingguan</option>
						  <option value="harian">Harian</option>
						  <option value="btanggal">Berdasarkan Tanggal</option>
						</select>
       	 			</div>
       	 			<div class="form-group m-0 ">
       	 				<button type="button" class="btn btn-outline-primary btn-sm pt-1 pb-1 pl-4 pr-4" id="submit">SUBMIT</button>
       	 			</div>
       	 		</form>
       	 	</div>
        </div>
      </div>
    </div>
  </div>
  <div class="row" id="dataLaporan">
  	<div id="loading" class="d-flex justify-content-center align-items-center w-100"> 
  		<div class="spinner-border text-light" role="status"> <span class="sr-only">Loading...</span> </div> 
  	</div>
  </div>

</div>

<script>
	
	$(document).ready(function(){

		
		if($('#rekap').val() == ''){
			tampilLaporan();
		}
		
		function tampilLaporan()
		{
			$.ajax({
				url: "<?= base_url("LaporanAbsensi/getLaporan") ?>",
				type:"GET",				
				success: function(msg){
					let getDataLaporan = JSON.parse(msg);
					let dataLaporan;
					let node = '';
					let link = '';

						

					for (dataLaporan in getDataLaporan) {
						dataLaporan = getDataLaporan[dataLaporan];

						if($('#rekap').val() == ''){
								link = '<?= base_url('laporanAbsensi/laporanKelas/')?>'+dataLaporan['id_kelas'];
						}else if($('#rekap').val() == 'tahun'){
								link = '<?= base_url('laporanAbsensi/laporanKelas/')?>'+dataLaporan['id_kelas']+"/"+$('#rekap').val();
						}else if($('#rekap').val() == 'bulan'){
								link = '<?= base_url('laporanAbsensi/laporanKelas/')?>'+dataLaporan['id_kelas']+"/"+$('#rekap').val();
						}else if($('#rekap').val() == 'mingguan'){
								link = '<?= base_url('laporanAbsensi/laporanKelas/')?>'+dataLaporan['id_kelas']+"/"+$('#rekap').val();
						}else if($('#rekap').val() == 'harian'){
								link = '<?= base_url('laporanAbsensi/laporanKelas/')?>'+dataLaporan['id_kelas']+"/"+$('#rekap').val();
						}
						node += '<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">' +
							 		'<div class="jadwal-siap">' +
							 			'<div class="row">'+
							 				'<div class="col-5 logo-cdr-siap">' +
							 					'<img class="img-fluid jadwal-logo-cdr-siap" src="<?php echo base_url("vendor/bootstrap/img/"); ?>cldr.svg">' +
							  				'</div>'+
							  				'<div class="col-7 right-jadwal-siap">' +
							  					'<h4>'+ dataLaporan['kelas'] +' ' + dataLaporan['nama_kelas'] +'</h4>' +
							  					'<h6>' + dataLaporan['nama_mapel'] + '</h6>'+
							  					'<a class="btn btn-outline-info btn-block shadow-none btn-laporan" role="button" href="'+ link +'">Laporan</a>' +
							  				'</div>' +
							  			'</div>' +
							  		'</div>'+
							  	'</div>';

					}
					setTimeout(function(){
						$('#loading').remove();
						$('#dataLaporan').html(node);
					},300)

				}
			});

		}

		$('#submit').on('click',function(){
			$('#dataLaporan').html('<div id="loading" class="d-flex justify-content-center align-items-center w-100"> <div class="spinner-border text-light" role="status"> <span class="sr-only">Loading...</span> </div> </div>');
			tampilLaporan();
		});

		$('#rekap').on('change',function(){

			if($('#rekap').val() == 'btanggal'){			

				var currentYear	   = new Date();
				var currentYear    = currentYear.getFullYear();

				var nodeSelectWaktu = "<div class='d-flex form-group mt-2 mb-2' id='selectWaktu'> </div>";

				var selectTanggal  = '';
				var selectTanggal  = "<select class='form-control form-control-sm mr-1'>";
					selectTanggal += "<option> Pilih Tanggal </option>";
					for(let i = 1; i <= 31; i++){
						selectTanggal += "<option value="+i+">"+ i +"</option>"; 
					}
					selectTanggal += "</select>";


				var bulan;
				var selectBulan	   = '';
				var selectBulan  = "<select class='form-control form-control-sm mr-1'>";
					selectBulan += "<option> Pilih Bulan </option>";
					for(let i = 1; i <= 12; i++){
						switch(i){
							case 1:
								bulan = 'Januari';
							break;
							case 2:
								bulan = 'Februari';
								break;
							case 3:
								bulan = 'Maret';
							break;
							case 4:
								bulan = 'April';
								break;
							case 5:
								bulan = 'Mei';
								break;
							case 6:
								bulan = 'Juni';
								break;
							case 7:
								bulan = 'Juli';
								break;
							case 8:
								bulan = 'Agustus';
								break;
							case 9: 
								bulan = 'September';
								break;
							case 10:
								bulan = 'Oktober';
								break;
							case 11: 
								bulan = 'November';
								break;
							case 12: 
								bulan = 'Desember';
								break;

						}
						selectBulan += "<option value="+ i +">"+ bulan +"</option>"; 
					}
					selectBulan += "</select>";


				var selectTahun  = "<select class='form-control form-control-sm'>";
					selectTahun  += "<option> Pilih Tahun </option>";
					for(let i = 2019; i <= currentYear; i++){
						selectTahun += "<option value="+ i +">"+ i +"</option>"; 
					}
					selectTahun += "</select>";

					$('#selectJenisRekap').append(nodeSelectWaktu);
					$('#selectWaktu').append(selectTanggal+selectBulan+selectTahun);
					$('#selectJenisRekap').addClass('mt-2');
					$('#submit').css('margin-top','38px');
			}else{

				if($('#selectWaktu') != undefined){
					$('#selectWaktu').remove();
					$('#selectJenisRekap').removeClass('mt-2');
					$('#submit').removeAttr('style');
				}

			}
		})
	});

</script>;