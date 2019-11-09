var color = ['dodgerblue','#FF9F40','#FF6384','skyblue','#22CEA0','#222930',
						 '#7337d7','#2230ce','#cece22'];

			//PARENT Chart
			var ckelas 		= document.getElementById('body-chart-kelas');
			var cjk 		= document.getElementById('body-chart-jk');
			var cagama 		= document.getElementById('body-chart-agama');
			var kelas7 		= document.getElementById('body-chart-kelas7');
			var kelas8 		= document.getElementById('body-chart-kelas8');
			var kelas9 		= document.getElementById('body-chart-kelas9');

			var chart_kelas = new Chart(ckelas, {
				type: 'pie',
				data: {
					labels: ['Kelas 9','Kelas 8','Kelas 7'],
					datasets: [
						{
							label: 'Jumlah Berdasarkan Kelas',
							data: [<?= $j_kelas9 ?>,<?= $j_kelas8 ?>,<?= $j_kelas7 ?>],
							backgroundColor: [
							 color[0],
							 color[1],
							 color[2]
							],
							borderColor: [
								"white"
							],
							borderWidth: 2
						}
					]
				}
			})

			var chart_jk = new Chart(cjk, {
				type: 'pie',
				data: {
					labels: ['Laki-Laki','Perempuan'],
					datasets: [
						{
							data: [<?= $jk_l ?>,<?= $jk_p ?>],
							backgroundColor: [
							 color[0],
							 color[2]
							],
							borderColor: [
								'white'
							],
							borderWidth: 2
						}
					]
				}
			})


			var chart_agama = new Chart(cagama, {
				type: 'pie',
				data: {
					labels: ['Islam','Kristen','Hindu',"Budha","Konghucu"],
					datasets: [
						{
							label: 'Jumlah Berdasarkan Kelas',
							data: [<?= $a_islam ?>,<?= $a_kristen ?>,<?= $a_hindu ?>,<?= $a_budha ?>,<?= $a_konghucu ?>],
							backgroundColor: [
							 color[0],
							 color[1],
							 color[2],
							 color[3],
							 color[4]
							],
							borderColor: [
								"white"
							],
							borderWidth: 2
						}
					],
					options: {
						display: true,
						fullWidth: true,
						responsive: true
					}
				}
			})

			var chart_kelas_7 = new Chart(kelas7, {
				type: 'pie',
				data: {
					labels: [<?php 
									  while($kelas = mysqli_fetch_assoc($kelas7)){
									  	echo " '7 {$kelas['nama_kelas']}',";
									  }
									?>],
					datasets: [
						{
							label: 'Jumlah Berdasarkan Kelas',
							data: [<?php 
									  while($kelas = mysqli_fetch_assoc($kelas77)){
									  	echo " '{$kelas['jumlah_siswa']}',";
									  }
									?>],
							backgroundColor: [
							 color[3],
							 color[2],
							 color[1],
							 color[4],
							 color[5],
							 color[6],
							 color[7],
							 color[8],
							 color[9]
							],
							borderColor: [
								"white"
							],
							borderWidth: 2
						}
					]
				}
			})

			var chart_kelas_8 = new Chart(kelas8, {
				type: 'pie',
				data: {
					labels: [<?php 
									  while($kelas = mysqli_fetch_assoc($kelas8)){
									  	echo " '8 {$kelas['nama_kelas']}', ";
									  }
									?>],
					datasets: [
						{
							label: 'Jumlah Berdasarkan Kelas',
							data: [<?php 
									  while($kelas = mysqli_fetch_assoc($kelas88)){
									  	echo " '{$kelas['jumlah_siswa']}',";
									  }
									?>],
							backgroundColor: [
							 color[2], 
							 color[5],
							 color[3],
							 color[1],
							 color[4],
							 color[6],
							 color[7],
							 color[8],	 
							 color[9]
							],
							borderColor: [
								"white"
							],
							borderWidth: 2
						}
					]
				}
			})

			var chart_kelas_9 = new Chart(kelas9, {
				type: 'pie',
				data: {
					labels: [<?php 
									  while($kelas = mysqli_fetch_assoc($kelas9)){
									  	echo " '9 {$kelas['nama_kelas']}', ";
									  }
									?>],
					datasets: [
						{
							label: 'Jumlah Berdasarkan Kelas',
							data: [<?php 
									  while($kelas = mysqli_fetch_assoc($kelas99)){
									  	echo " '{$kelas['jumlah_siswa']}',";
									  }
									?>],
							backgroundColor: [
							 color[8],
							 color[2], 
							 color[5],	
							 color[3],
							 color[1],
							 color[6],
							 color[7],
							 color[4],						 	  
							 color[9]
							],
							borderColor: [
								"white"
							],
							borderWidth: 2
						}
					]
				}
			})