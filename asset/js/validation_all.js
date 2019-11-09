console.log();
//COLOR
		import {url} from './base_url.js';
		var c_danger 	= '#b63333';
		var c_default	= '#EBEBEB';
		var c_butt		= '#778BEB';
		var c_text		= '#222930';


		//FORM 
		var input  = document.getElementsByTagName('input');
		var select = document.getElementsByTagName('select');
	  var foto   = document.getElementById('file');
		var file   = document.getElementById('submit'); 

		var input_name = '';
		var wrap_input = '';
		// FUNCTION

		function alert(alert_text){
			swal({
				title: "Gagal Melakukan Sebuah Aksi",
				text:  alert_text,
				icon: 'warning',
				dangerMode: true,
			});
			
			wrap_input = '';
		}
		function validation_input(e){
			if (input.length >= 0) {
				for(i = 0; i < input.length;){
					if (input[i].type === 'text' || input[i].type === 'number' 
						|| /*input[i].type === 'password' ||*/ input[i].type === 'radio') {
		
						if (input[i].value.trim() == "" && input[i].name !== 'awal_tahun_ajaran' && input[i].name !== 'akhir_tahun_ajaran') {
							e.preventDefault();
							input[i].style.backgroundColor = c_danger;	
							
							wrap_input += '[INPUT] '+input[i].previousElementSibling.textContent.toUpperCase()+ " BELUM DIINPUT\n";
							input_name = wrap_input;
						}
					}
					input[i].onclick = function(e){e.target.style.backgroundColor = c_default;};
					i++;
				}
			}

			if (select.length >= 0) {
				for(let j = 0; j < select.length;){
					if (select[j].value.trim() === "Pilih Mapel" || select[j].value.trim() === "Pilih Tingkat Kelas" || select[j].value.trim() === "Pilih Level") {
						e.preventDefault();
						select[j].style.backgroundColor = c_danger;	
						select[j].style.color = c_default;
						wrap_input += '[OPTION] '+select[j].previousElementSibling.textContent.toUpperCase()+ " BELUM DIINPUT\n";
						input_name = wrap_input;
					}
					select[j].onclick = function(e){e.target.style.backgroundColor = c_default; 
													e.target.style.color = c_text;};
					j++;
				}
			}

			if(input_name != ''){
				alert(input_name);
				input_name = '';
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

	
		function valid_img() {
		    var file_input_path = foto.value;
		    var file_allowed = /(\.jpg|\.jpeg|\.png)$/i;
		    if (!file_allowed.exec(file_input_path)) {

		    	foto.value = '';
		    	document.getElementById('preview_img').innerHTML = '';   	
		    	document.getElementById('img_prev_def').innerHTML = `<img src="${url}/asset/img/foto_siswa/default-avatar.png" width="100%" height="250px">`;
		       	swal({
					title: "Peringatan !!! ",
					text: "Silahkan pilih file yang diizinkan \n (JPEG,JPG,PNG) !!!",
					icon: "warning",
					dangerMode: true,
				});
		    }
		}

		function get_size(evt){
        var files = evt.target.files;
        for(var i = 0,f; f = files[i]; i++){
          
          	img_preview();
          }
        }
		

		function img_preview(e) {
			var foto_v = document.getElementById('file');
	        if (foto_v.files && foto_v.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function(e) {
	                document.getElementById('preview_img').innerHTML = '<img src="' + e.target.result + '" width=100% height=250px />';
	                document.getElementById('img_prev_def').innerHTML = '';
	            };
	            reader.readAsDataURL(foto_v.files[0]);
	        }
	    }

		foto.addEventListener('change',valid_img);
		foto.addEventListener('change',get_size);
		file.addEventListener('click',validation_input);
		// file.addEventListener('click',function(e){
		// 	e.preventDefault();
		// 	alert(document.getElementsByTagName('select').length);
		// });
