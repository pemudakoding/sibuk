<div class="sidebar">
			<div class="header">SISTEM INFORMASI KELAS</div>
			<div class="sub-sidebar">
				<ul>
				
					<li><a href='<?= $url ?>/index.php'>Beranda</a></li>
					
					<?php if (isset($_SESSION['login']) && $_SESSION['level'] != 'guru' &&  $_SESSION['level'] != 'operator'  ): ?>
						<li> <a href='<?= $url; ?>/beranda.php'>Sistem Informasi Buku Induk</a> </li>
					<?php elseif(isset($_SESSION['login']) && $_SESSION['level'] == 'guru' || isset($_SESSION['login']) && $_SESSION['level'] == 'operator' ): ?>
						<li> <a href='<?= $url; ?>/siab/'>Abensi</a> </li>
					<?php endif; ?>

						<li><a href="javascript:void(0)" class="data0 parrent_menu"><p>Data Kelas</p> <p>+</p></a>
						<ul class="data-show0 dropdown">
							<li><a href='<?= $url ?>/daftar-kelas/7'>Kelas 7</a></li>
							<li><a href='<?= $url ?>/daftar-kelas/8'>Kelas 8</a></li>
							<li><a href='<?= $url ?>/daftar-kelas/9'>Kelas 9</a></li>
						</ul>
						
					</li>

					
					
				</ul>
				
			</div>
		</div>

		
