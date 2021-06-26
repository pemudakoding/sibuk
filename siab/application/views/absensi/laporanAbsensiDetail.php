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
							<div class="col-6 p-0 d-flex pt-4 pb-4">
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
							<div class="col-6 presentase-kehadiran justify-content-center align-items-center">
							
							<div class="row habis">
								<div class="col">
									<div class="card bg-primary text-white">
										<div class="card-header bg-primary">Hadir</div>
										<div class="card-body">
											<?php echo $row['hadir']; ?>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card bg-secondary text-white">
										<div class="card-header bg-secondary">Alpa</div>
										<div class="card-body">
											<?php echo $row['alpa']; ?>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card bg-danger text-white">
										<div class="card-header bg-danger">Bolos</div>
										<div class="card-body">
											<?php echo $row['bolos']; ?>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card bg-warning text-white">
										<div class="card-header bg-warning">Izin</div>
										<div class="card-body">
											<?php echo $row['izin']; ?>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card bg-success text-white">
										<div class="card-header bg-success">Sakit</div>
										<div class="card-body">
											<?php echo $row['sakit']; ?>
										</div>
									</div>
								</div>
							</div>
							<h6>Presentasi Kehadiran</h6>
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
							</div>

								<!-- <table>
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
								</table> -->
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