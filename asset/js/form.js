



/*
		Script For Validation
*/



import {url} from "./base_url.js"

// variable Input Siswa
	var nama_d 			=	document.getElementById('nama_depan');
	var nama_b 			= 	document.getElementById('nama_belakang');
	var nama_p 			= 	document.getElementById('nama_panggilan');
	var kewarganegaraan = 	document.getElementById('kewarganegaraan');
	var bhs_sehari 		= 	document.getElementById('bhs_sehari');
	var tl 				= 	document.getElementById('tanggal_lahir');
	var tp 				= 	document.getElementById('tp');
	var jk				= 	document.getElementById('jk');
	var agama			= 	document.getElementById('agama')
	var golongan_d		= 	document.getElementById('golongan_d');

	var anak_k			= 	document.getElementById('anak_k');
	var jumlah_saudara_k= 	document.getElementById('jumlah_saudara_k');
	var jenis_t			= 	document.getElementById('jenis_t');
	var alamat_t		= 	document.getElementById('alamat_t');
	var nis				= 	document.getElementById('nis');
	var nisn 			= 	document.getElementById('nisn');
	var no_telp			= 	document.getElementById('no_telp');
	var foto_siswa 		= document.getElementById('foto_siswa');

	//Sekolah
	var tahun_ajaran 	= document.getElementById('tahun_ajaran');
	var kelas_saat_ini	= document.getElementById('kelas_saat_ini');
	var status_pend		= document.getElementById('status_pendidikan');
	var submit 			= document.getElementById('submit');
	var form			= document.getElementById('form');

	//REGEX
	var dot_input  = /[.]+/;
	var num 	   = /[0-9]+/;

	//COLOR
	var c_default	= '#EBEBEB';
	var c_danger = 'rgb(182, 51, 51)';
	var f_def	 = 'white';


	//FORM ALERT
	var form  = '';
	var count = 0;
 
function validation_siswa(e){

		if(nis.value.trim() === ''){
			nis.style.backgroundColor = c_danger;
			form += '[SISWA] Input Nis belum diisi !!!\n';

		}

		if (jk.value.trim() === '') {
			jk.style.backgroundColor = c_danger;
			jk.style.color 			 = c_default;
			form += '[SISWA] Jenis Kelamin Siswa Belum Dipilih !!!\n';
		}

		
		//sekolah
		if (tahun_ajaran.value.trim() === '') {
			tahun_ajaran.style.backgroundColor = c_danger;
			tahun_ajaran.style.color 			 = c_default;
			form += '[SEKOLAH] Tahun Ajaran belum dipilih !!!\n';
		}
	
		if (kelas_saat_ini.value.trim() === '') {
			kelas_saat_ini.style.backgroundColor = c_danger;
			kelas_saat_ini.style.color 			 = c_default;
			form += '[SEKOLAH] Kelas siswa belum dipilih !!!\n';
		}

		if (status_pend.value.trim() === '') {
			status_pend.style.backgroundColor = c_danger;
			status_pend.style.color 		  = c_default;
			form += '[SEKOLAH] Status Pendidikan Siswa belum dipilih !!!\n';
		}


		if (form != '') {
			e.preventDefault();	
			alert_validation();
			form = '';		
		}else{
		   var body = document.getElementsByTagName('body')[0];

		   var div = document.createElement('div');
		       div.setAttribute('class','loading');
		   var img = document.createElement('img');
		       img.src = '/sekolah/asset/img/loading.gif';
		   div.appendChild(img);

		   body.insertBefore(div,body.childNodes[0]);	
		}

		
}

function alert_validation(){
	swal({
			title: "Peringatan !!! ".toUpperCase(),
			text: form.toUpperCase(),
			icon: "warning",
			timer: 10000,
			button:false,
		});
}

// validation file upload

		function valid_img() {

		    var file_input_path = foto_siswa.value;
		    var file_allowed = /(\.jpg|\.jpeg|\.png)$/i;

		    var img_prev = document.getElementById('preview_img');
		    var img_prev_def = document.getElementById('img_prev_def');


		    if (!file_allowed.exec(file_input_path)) {

		    	foto_siswa.value = '';
		    	img_prev.innerHTML = '';   	
		    	img_prev_def.innerHTML = `<img src="${url}asset/img/foto_siswa/default-avatar.png" width="100%" height="250px">`;
		       	swal({
					title: "Peringatan !!! ",
					text: "Silahkan pilih file yang diizinkan \n (JPEG,JPG,PNG) !!!",
					icon: "warning",
					timer: 10000,
					button:false,
				});
		        return true;
		    } else {
		        if (foto_siswa.files && foto_siswa.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function(e) {
		                img_prev.innerHTML = '<img src="' + e.target.result + '" width=100% height=250px />';
		                img_prev_def.innerHTML = '';
		            };
		            reader.readAsDataURL(foto_siswa.files[0]);
		        }
		    }
		}

		function delete_error(e){
			e.target.style.backgroundColor = c_default;
			e.target.style.color = '#222930';
		}

// Jalankan validation jika tombol submit di click
		submit.addEventListener('click',validation_siswa);
		foto_siswa.addEventListener('change',valid_img);

//jalankan event jika input difocuskan
				
		nama_d.addEventListener('focus',delete_error);
		nama_b.addEventListener('focus',delete_error);
		nama_p.addEventListener('focus',delete_error);
		kewarganegaraan.addEventListener('focus',delete_error);
		bhs_sehari.addEventListener('focus',delete_error);
		tl.addEventListener('focus',delete_error);
		tp.addEventListener('focus',delete_error);
		jk.addEventListener('focus',delete_error);
		agama.addEventListener('focus',delete_error);
		golongan_d.addEventListener('focus',delete_error);
		anak_k.addEventListener('focus',delete_error);
		jumlah_saudara_k.addEventListener('focus',delete_error);
		jenis_t.addEventListener('focus',delete_error);
		alamat_t.addEventListener('focus',delete_error);
		nis.addEventListener('focus',delete_error);
		nisn.addEventListener('focus',delete_error);
		no_telp.addEventListener('focus',delete_error);
		tahun_ajaran.addEventListener('focus',delete_error);
		kelas_saat_ini.addEventListener('focus',delete_error);
		status_pend.addEventListener('focus',delete_error);


/**
 * 
 * SECTION CETAK
 * 
 */



 
