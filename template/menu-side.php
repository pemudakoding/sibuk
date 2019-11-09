<?php 
	$user = mysqli_fetch_assoc(cek_user($_SESSION['username']));
 ?>
<div class="sidebar">
			<div class="header">SISTEM INFORMASI BUKU INDUK</div>
			<div class="panel">
				<div class="profile">
					<div class="gambar">
						<?php 
						
							if ($user['foto_user'] == '') {
								echo "<img src='$url/asset/img/foto_siswa/default-avatar.png' class='gambar'>";
							}else if($user['level'] === 'guru'){
								echo "<img src='$url/asset/img/foto_guru/{$user['foto_user']}' class='gambar'/>";
								
							}else{
								echo "<img src='$url/asset/img/foto_user/{$user['foto_user']}' class='gambar'/>";
							}
						 ?>
					</div>
					<div class="nama-profile"><h1><?= $user['nama_depan']." ".$user['nama_belakang'];?></h1> <h2><?= $user['level'];?></h2></div>
				</div>
			</div>
			<div class="sub-sidebar">
				<ul>

					<?php if ($user['level'] === 'TataUsaha' || $user['level'] === 'administrator'  ): ?>
					<li><a href='<?= $url ?>/beranda.php'>BERANDA</a></li>
					<li><a href='<?= $url ?>/index.php'>Sistem Informasi Kelas</a></li>
					<li><a href="javascript:void(0)" class="data0 parrent_menu"><p>Siswa</p> <p>+</p></a>
						<ul class="data-show0 dropdown">
							<li><a href='<?= $url ?>/siswa/'>DATA SISWA</a></li>
							<li><a href='<?= $url ?>/siswa/pindah/'>DATA PINDAHAN</a></li>
							<li><a href='<?= $url ?>/kelas/'>DATA Kelas</a></li>
						</ul>
					</li>

					<li><a href="javascript:void(0)" class="data1 parrent_menu"><p>Guru</p> <p>+</p></a>
						<ul class="data-show1 dropdown">
							<li><a href='<?= $url ?>/guru/'>DATA GURU</a></li>
							<li><a href='<?= $url ?>/mapel/'>DATA Mata Pelajaran</a></li>
						</ul>
					</li>

					<?php endif ?>
					
					<li><a href="javascript:void(0)" class="data2  parrent_menu"><p>Cetak Data</p> <p>+</p></a>
						
						<ul class="data-show2 dropdown">
							<?php if($user['username'] == 'sgb' || $user['username'] == 'ariyadin'): ?>
								<li><a href='<?= $url ?>/puki/klapper.php' target="_blank">Cetak KLAPPER Siswa</a></li>
							<?php endif; ?>
							<li><a href='<?= $url ?>/cetak/'>Cetak Semua Data Siswa</a></li>
							<?php 
								for ($i=7; $i <= 9 ; $i++) { 
									echo "<li><a href='{$url}/cetak/kelas/$i'> Cetak Data Siswa Kelas $i </a></li>";
								}

							?>
							
						</ul>
					</li>

					
						<li><a href="javascript:void(0)" class="data3  parrent_menu"><p>Pengaturan</p> <p>+</p></a>
						<ul class="data-show3 dropdown">
							<?php if ($user['level'] != 'guru'): ?>
								<li><a href='<?= $url ?>/sekolah/'>Biodata sekolah</a></li>
							<?php endif ?>
							<?php if ($user['level'] === 'administrator'): ?>
								<li><a href='<?= $url ?>/user/'>Informasi User</a></li>
							<?php endif ?>
						</ul>
					</li>
				
					
				</ul>
				
			</div>
		</div>

		
