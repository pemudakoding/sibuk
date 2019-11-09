<?php 
	require_once "../../core/init.php";	
	
	$keyword = mysqli_real_escape_string( $koneksi,strip_tags($_GET['q']) );
	if(isset($_GET['status']))
	{	
		$status 	= mysqli_real_escape_string( $koneksi,strip_tags($_GET['status']) );
		$query_siswa= search_data_siswa($status,$keyword);
	}else{
		$query_siswa= search_data_siswa('aktif',$keyword);
	}

	if ($keyword == '' || !isset($_GET['q'])) {
		header('location:'.$url);
	}
 ?>

<div class="row">
	<?php while($data = mysqli_fetch_assoc($query_siswa) ): ?>
	<?php 
		$nama = parse_name_url('nama_depan','nama_belakang');
	?>
	<div class="data box4 box-md-6 box-sm-12">
		<div class="wrap_hasil">
			<a href='<?= $url."/siswa/hapus/".mysqli_real_escape_string($koneksi,strip_tags($data['nis']));?>' class="button-close butt-del" id='delete'>X
				<a href="<?= $url."/siswa/detail/".mysqli_real_escape_string($koneksi,strip_tags($data['nis']))."/".$nama?>">
					<div class="data-siswa">
						<?php 

							if ($data['foto_siswa'] != '') {
								echo "<img src='$url/asset/img/foto_siswa/{$data['foto_siswa']}' class='img_profil'>";
							}else{
								echo "<img src='$url/asset/img/foto_siswa/default-avatar.png' class='img_profil'>";
							}

						?>
						<div class="data-detail-siswa">	
							<h4><?= $data['nama_depan']." ".$data['nama_belakang'];?></h4>
							<p><?= "NIS:"." ".$data['nis']; ?></p>
							<p class="kls">Kelas: 
								<?php 
									if ($data['kelas'] == '') {
										echo "<span style='color:deeppink'> Tidak Ada Kelas </span>";
									}else{
										echo $data['kelas']." ".$data['nama_kelas'];
									}

								?>
								<?php if($data['status_pendidikan'] == 'Pindah'): ?>
									<p>Pindah kesekolah: <br><span style='color:dodgerblue;'><?= $data['nama_sekolah'] ?></span></p>
								<?php endif; ?>
							</p>
						</div>
					</div>	
				</a>
			</a>				
		</div>
	</div>
	<?php endwhile;?>
</div>