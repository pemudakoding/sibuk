<div class="col-12 col-sm-12 col-md-9 col-lg-7 col-xl-7">
	<div class="card box-shadow-siap card-siap">
		<div class="card-header">
			<div class="row">
				<div class="col">
					<h5 class="text-left mb-0">Absen Kelas : <?php echo $namaKelas; ?></h5>
				</div>
				<div class="col">
					<h5 class="text-right mb-0">Jumlah Siswa : <?php echo $jumlahSiswa; ?></h5>
				</div>
			</div>
		</div>

		<div class="card-body section-absen">
			<!-- Tag Pembuka Dari form ada view/absensi/sidebarAbsensi.php -->
			<?php  
				$no=1;
				foreach ($resultSiswa as $row){ 
			?>
			<div class="card-body card-siswa-siap">
				<div class="row">
					<div class="col-1 align-self-center">
						<h6 class="text-center d-xl-flex justify-content-center align-content-center"><?php echo $no++; ?></h6>
					</div>
					
					<div class="col">
						<h5>
							<?php 

								echo $row["nama_depan"]." ".$row['nama_belakang'];
								echo " <br/> ";
								echo "<span class='text-monospace text-muted'>".$row["nisn"];
								echo " - " ;
								echo $row['jenis_kelamin'];
								echo "</span>";

								if(!isset($row['absen'])):$row['absen'] = ''; endif;
							?>
						</h5>

						<div class="form-check">
							<input class="form-check-input" type="radio" name="absen[<?php echo $row['nis']; ?>]" id="absen-h-<?php echo $row['nis']; ?>" value="h" <?php if($row['absen'] == 'h'  || $row['absen'] == ''): echo "checked"; endif; ?>/>
							<label class="form-check-label" for="absen-h-<?php echo $row['nis']; ?>">
							    Hadir
							</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" type="radio" name="absen[<?php echo $row['nis']; ?>]" id="absen-a-<?php echo $row['nis']; ?>" value="a" <?php if($row['absen'] == 'a'): echo "checked"; endif; ?>/>
							<label class="form-check-label" for="absen-a-<?php echo $row['nis']; ?>" >
							    Alpah
							</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" type="radio" name="absen[<?php echo $row['nis']; ?>]" id="absen-i-<?php echo $row['nis']; ?>" value="i" <?php if($row['absen'] == 'i'): echo "checked"; endif; ?>/>
							<label class="form-check-label" for="absen-i-<?php echo $row['nis']; ?>">
							    Izin
							</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" type="radio" name="absen[<?php echo $row['nis']; ?>]" id="absen-b-<?php echo $row['nis']; ?>" value="b" <?php if($row['absen'] == 'b'): echo "checked"; endif; ?>/>
							<label class="form-check-label" for="absen-b-<?php echo $row['nis']; ?>">
							    Bolos
							</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" type="radio" name="absen[<?php echo $row['nis']; ?>]" id="absen-s-<?php echo $row['nis']; ?>" value="s" <?php if($row['absen'] == 's'): echo "checked"; endif; ?>/>
							<label class="form-check-label" for="absen-s-<?php echo $row['nis']; ?>">
							    Sakit
							</label>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			</form>
		</div>
	</div>
</div>
<?php
  /**
   * [$waktu description]
   * @var DateTime
   * Buat object waktuu
   * lalu ambil timestamp waktu server
   * lalu simpan di variable $waktuSekarang
   */
  $waktu = new DateTime();
  $waktuSekarang = $waktu->getTimestamp();
?>
<script src="<?= base_url('vendor/js/') ?>padDigits.js"></script>

<script>
	$(document).ready(function(){
		var checkAbsensi = setInterval(checkTime,1000);

		initTime = true;
		time     = '';

		var jamMasuk  = $('.jam-masuk')[0].innerHTML;
		var jamKeluar = $('.jam-keluar')[0].innerHTML;
		var jamAbsen  = jamMasuk+'-'+jamKeluar;
			jamAbsen  = jamAbsen.split('-');

		function checkTime()
		{
			/**
			   * [if | Jika InitTime true maka init variable timer dengan timestamp yang telahdibuat lalu dikali 1000]
			   * @param  {[Boolean]} initTime [true or false]
			   * @return {[integer]}          [timestamp disimpa kevariable timer]
			   */
			  if(initTime){
			    timer = <?= $waktuSekarang ?>*1000;
			  }

				var time    = new Date(timer);
				var jam     = padDigits(time.getHours(),2);
				var menit   = padDigits(time.getMinutes(),2);
				var detik   = padDigits(time.getSeconds(),2);
				if(jam+":"+menit >= jamAbsen[1]){	
					window.location.href = '<?= base_url('absensi/checkWaktuAbsen/selesai') ?>';
				}

				if(jam+":"+menit < jamAbsen[0]){	
					window.location.href = '<?= base_url('absensi/checkWaktuAbsen/belum') ?>';
				}
				initTime = false;
				timer    = timer+1000;

		}
	});

</script>