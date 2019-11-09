import {url} from './base_url.js';
$(document).ready(function(){
	$('#nis').blur(function(){
		var nis = $(this).val();	
		$.ajax({
			url:url+'/mod_siswa/check.php',
			method:"POST",
			data:{'nis':`${nis}`},
			dataType: 'json',
			success:function(data){
				console.log(data);
				if(data.jumlah != 0) {
						swal({
						title: data.nama,
						text:'Telah Menggunakan NIS yang anda isi',
						icon: 'warning',
						dangerMode: true,
					})
					$('#submit').attr('disabled','disabled');
					
				}else if(data.jumlah == 0){
					$('#submit').attr('disabled',false);
					
				}
			},
			error:function(msg){
				console.log(msg);
			}
		});
	});
});