<?php
	require_once "../core/init.php";
	$keyword 	= mysqli_real_escape_string( $koneksi,strip_tags($_GET['q']) );
	$query_guru= search_data_guru($keyword);
	if ($keyword == '') {
		header('location:'.$url);
	}
 ?>

<div class="row">
<?php while($data = mysqli_fetch_assoc($query_guru) ): ?>

	<?php
		$nama = parse_name_url('nama_d_g','nama_b_g');
	?>
	<div class="data box4 box-md-6 box-sm-12">
	<div class="wrap_hasil">
		<a href="hapus/<?= mysqli_real_escape_string($koneksi,strip_tags($data['nim']));?>" class="button-close butt-del" id='delete'>X
				<a href="<?= $url."/guru/detail/".mysqli_real_escape_string($koneksi,strip_tags($data['nim']))."/".$nama?>">
					<div class="data-siswa data-oth" style="height: auto;">
					<?php

						if ($data['foto_guru'] != '') {
							echo "<img src='../asset/img/foto_guru/compress/{$data['foto_guru']}' class='img_profil'>";
						}else{
							echo "<img src='../asset/img/foto_siswa/default-avatar.png' class='img_profil'>";
						}

					 ?>
						<div class="data-detail-siswa"  style="padding: 25px 0px;">
							<h4><?= $data['nama_guru'];?></h4>
							<p>NIP: <?= $data['nim'];?></p>
							<p><?= "Mapel:"." ".$data['nama_mapel']; ?></p>
							<p class="kls">Wali Kelas:
							<?php if($data['nama_kelas']  == ''){
								echo "<span style='color:deeppink'> Guru biasa </span>";
							}else{
								echo $data['kelas']." ".$data['nama_kelas'];
							}
							?>
							</p>
						</div>
					</div>
				</a>
			</a>
		</div>
	</div>
<?php endwhile;?>
</div>
