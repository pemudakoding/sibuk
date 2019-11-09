<?php 
	require_once "../core/init.php";
	$keyword    = mysqli_real_escape_string( $koneksi,strip_tags($_GET['q']) );
	$query_user = search_data_user($keyword);
	if ($keyword == '') {
		header('location:'.$url);
	}
 ?>

 <div class="row">
<?php while($data = mysqli_fetch_assoc($query_user) ): ?>
	<div class="data box4 box-md-6 box-sm-12">
		<div class="wrap_hasil">
			<a href="hapus_user.php?id_user=<?= (int)$data['id_user'];?>" class="button-close butt-del" id='delete'>X
				<a href="detail_guru.php?nim=<?= (int)$data['id_user'];?>">
					<div class="data-siswa" style="height: auto;">
						<?php 

							if ($data['foto_user'] != '') {
								echo "<img src='../asset/img/foto_user/{$data['foto_user']}' class='img_profil'>";
							}else{
								echo "<img src='../asset/img/foto_siswa/default-avatar.png' class='img_profil'>";
							}

						 ?>
						<div class="data-detail-siswa"  style="padding: 25px 0px;">	
							<h4><?= $data['nama_depan']." ".$data['nama_belakang'];?></h4>
							<p>Level: <span style="color:dodgerblue; text-transform: capitalize;"><?= $data['level'];?></span></p>
							<p><?= "Akses Login:"." ".$data['akses']; ?></p>
						</div>
					</div>	
				</a>
			</a>				
		</div>
	</div>
<?php endwhile;?>
</div>