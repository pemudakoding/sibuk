<div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
	<div class="card box-shadow-siap card-siap">
		<div class="card-header">
			<div class="row">
				<div class="col">
					<h5 class="text-left mb-0">Pelaporan Absensi Kelas : <?= $kelas['kelas']." ".$kelas['nama_kelas'] ?></h5>
				</div>
				<div class="col">
					<h5 class="text-right mb-0">Jumlah Siswa : <?= $jumlahSiswa ?></h5>
				</div>
			</div>
		</div>

		<div class="card-body section-absen pt-0">
			
			<div class="card-body card-siswa-siap">
				<?php if(!count($siswa) < 1): ?>
					<?php $i=1; foreach ($siswa as $row): ?>
						<div class="row">
							<div class="col-7 p-0 d-flex pt-4 pb-4">
								<div class="col-1 align-self-center ">
									<h6 class="text-center d-xl-flex justify-content-center align-content-center"><?= $i ?></h6>
								</div>
								
								<div class="col-11 ">
									<h5 class="m-0">
										<?php 

											echo $row['nama_depan']." ".$row['nama_belakang'];
											echo " <br/> ";
											echo "<span class='text-monospace text-muted'>".$row['nis'];
											echo " - " ;
											echo $row['jenis_kelamin'];
											echo "</span>";

										?>
									</h5>				
								</div>
							</div>
							<div class="col-5 presentase-kehadiran d-flex justify-content-center align-items-center">
								<table>
									<tr>
										<th class="bg-success border border-success text-white">Hadir</th>
										<td></td>
										<th class="bg-secondary border border-secondary text-white">Alpa</th>
										<td></td>
										<th class="bg-warning border border-warning text-white">Sakit</th>
										<td></td>
										<th class="bg-info border border-info text-white">Izin</th>
										<td></td>
										<th class="bg-danger border border-danger text-white">Bolos</th>								

									</tr>
									<tr>
										<td class="border border-success"><?= $row['hadir'] ?></td>
										<td></td>
										<td class="border border-secondary"><?= $row['alpa'] ?></td>
										<td></td>
										<td class="border border-warning"><?= $row['sakit'] ?></td>
										<td></td>
										<td class="border border-info"><?= $row['izin'] ?></td>
										<td></td>
										<td class="border border-danger"><?= $row['bolos'] ?></td>
									</tr>
									<tr>
										<td class="bg-dark text-white border border-dark" colspan="3">Presentase</td>
										<td class="bg-secondary text-white border border-secondary" colspan="6">75%</td>
									</tr>
								</table>
							</div>
						</div>
						
					<?php $i++; endforeach;?>
				<?php else: ?>
					<div class="row">
						<div class="col-12 text-danger d-flex justify-content-center align-content-center pt-5">
							<h5>Belum ada pelaporan untuk kelas ini !!!</h5>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>