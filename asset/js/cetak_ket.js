// import {url} from "./base_url.js";

var status_pend		= document.getElementById('status_pendidikan');
status_pend.onchange = function(){
	if(status_pend.value.trim() == 'Pindah')
	{	
		
		// 	document.getElementById('buttons-print').innerHTML =
		// 		'<button type="button" class="buttons " id="cetak_data" style="background:orange; cursor:pointer; font-weight:bold;" onclick="cetak()"> CETAK KET PINDAH </button>';
		var input_status = document.getElementById('status_pend');
		//INPUTAN ALASAN SISW PINDH
		var input_alasan = document.createElement('input');
			input_alasan.type = 'text';
			input_alasan.name = 'alasan_siswa_pindah';
			input_alasan.id   = 'input_alasan';

		//HEADING INPUT ALASAN SISWA PINDAH
		var heading_input= document.createElement('h4');
		var	text_heading = document.createTextNode('Alasan Pindah');
			heading_input.appendChild(text_heading);

		//Buat element
		input_status.appendChild(heading_input);
		input_status.appendChild(input_alasan);

		//OPTION PEMOHON SURAT
		var pemohon		    	= document.getElementById('pemohon');
		var pemohon_element 	= document.createElement('select');
			pemohon_element.id  = 'pemohon_surat_option';
			pemohon_element.name= 'pemohon';
		var list_pemohon 		= ['Ayah','Ibu','Wali'];

		for(i=0; i < list_pemohon.length; i++)
		{

			//Buat element option dan buat valuenya sesuai array
			var option 		 = document.createElement('option');
				option.value = list_pemohon[i];

			//Buat text sesuai array lalu gabungkan di option yang telah dibuat
			var option_text  = document.createTextNode(list_pemohon[i]);
				option.appendChild(option_text);
			
			//gabungkan option ke select
			pemohon_element.appendChild(option);
				
		}

		//heading pemohon surat
		var heading_pemohon= document.createElement('h4');
		var text_h_pemohon = document.createTextNode('Pemohon Surat');
			heading_pemohon.appendChild(text_h_pemohon);

		pemohon.appendChild(heading_pemohon);
		pemohon.appendChild(pemohon_element);
		


	}else{
		document.getElementById('buttons-print').innerHTML = '';
		document.getElementById('status_pend').innerHTML = '';
		document.getElementById('pemohon').innerHTML = '';
	}
}


