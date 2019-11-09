
<?php 
	require_once "../core/init.php";
	$keyword = mysqli_real_escape_string( $koneksi,strip_tags($_GET['q']) );
	$query_mapel= search_data_mapel($keyword);
	if ($keyword == '') {
		header('location:'.$url);
	}
 ?>
 <div class="row">
<?php while($data = mysqli_fetch_assoc($query_mapel) ): ?>
	<div class="data box4 box-md-6 box-sm-12">
		<div class="wrap_hasil">
			<a href="hapus/<?= (int)$data['id_mapel'];?>" class="button-close butt-del" id='delete'>X
				<a href="edit/<?= (int)$data['id_mapel'];?>/<?= $nama ?>">
					<div class="data-siswa" style="height: auto;">
						<div class="data-detail-siswa"  style="padding: 25px 0px;">	
							<h4>Mata Pelajaran</h4>
							<h4 style="color: dodgerblue"><?= $data['nama_mapel'];?></h4>
						</div>
					</div>	
				</a>
			</a>				
		</div>
	</div>
<?php endwhile;?>
</div>