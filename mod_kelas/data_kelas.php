<?php 
	require_once "../core/init.php";
	$keyword = mysqli_real_escape_string( $koneksi,strip_tags($_GET['q']) );
	$query_kelas= search_data_kelas($keyword);
	if ($keyword == '') {
		header('location:'.$url);
	}
 ?>

<div class="row">
<?php while($data = mysqli_fetch_assoc($query_kelas) ): ?>
	<?php 
		$nama = parse_name_url('kelas','nama_kelas');
	 ?>
	<div class="data box4 box-md-6 box-sm-12">
		<div class="wrap_hasil">
			<a href="hapus_data.php?id_kelas=<?= (int)$data['id_kelas'];?>" class="button-close butt-del" id='delete'>X
				<a href="detail/<?= (int)$data['id_kelas'];?>/<?= $nama ?>">
					<div class="data-siswa" style="height: auto;">
						<div class="data-detail-siswa"  style="padding: 25px 20px; width: 100%;align-items: flex-start;">	
							<h4 style="padding: 0;">Nama Kelas: <?= $data['nama_kelas'];?></h4>
							<h4 style="padding: 0;">Kelas: <?= $data['kelas']?></h4>
							<p class="kls">Wali kelas: 
							<?php if($data['nama_guru']  == ''){
								echo "<span style='color:deeppink'> Tidak Ada Wali Kelas </span>";
							}else{
								echo strtoupper("<span style='color:dodgerblue'> {$data['nama_guru']} </span>");
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