<?php 
	
	require '../asset/library/phpoffice/autoload.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$excel = new Spreadsheet();


	//LIST SHEET
	$siswa = $excel->getActiveSheet();
	$siswa -> setTitle('Data Siswa');



// SECTION SISWA

// Set Cell for header
	$siswa->setCellValue('A1','DATA SISWA');
	$siswa->setCellValue('AF1','DATA AYAH SISWA');
	$siswa->setCellValue('AR1','DATA IBU SISWA');
	$siswa->setCellValue('BD1','DATA WALI SISWA');
	$siswa->setCellValue('BP1','DATA SEKOLAH SISWA');

//SUB HEADER

	//Siswa
	$siswa->setCellValue('A2','NO');
	$siswa->setCellValue('B2','NIS');
	$siswa->setCellValue('C2','NISN');
	$siswa->setCellValue('D2','NIK Siswa');
	$siswa->setCellValue('E2','Nama Depan');
	$siswa->setCellValue('F2','Nama Belakang');
	$siswa->setCellValue('G2','Nama Panggilan');
	$siswa->setCellValue('H2','Kewarganegaraan');
	$siswa->setCellValue('I2','Bahasa Sehari-hari');
	$siswa->setCellValue('J2','Tanggal Lahir');
	$siswa->setCellValue('K2','Tempat Lahir');
	$siswa->setCellValue('L2','Jenis Kelamin');
	$siswa->setCellValue('M2','Agama');
	$siswa->setCellValue('N2','Golongan Darah');
	$siswa->setCellValue('O2','Tinggi Badan');
	$siswa->setCellValue('P2','Berat Badan');
	$siswa->setCellValue('Q2','Anak Ke');
	$siswa->setCellValue('R2','Yatim Piatu');
	$siswa->setCellValue('S2','Jumlah Saudara Kandung');
	$siswa->setCellValue('T2','Jumlah Saudara Tiri');
	$siswa->setCellValue('U2','Jumlah Saudara Angkat');
	$siswa->setCellValue('V2','Jenis Tinggal');
	$siswa->setCellValue('W2','Alamat Tinggal');
	$siswa->setCellValue('X2','Kelurahan');
	$siswa->setCellValue('Y2','Kecamatan');
	$siswa->setCellValue('Z2','Kode Pos');
	$siswa->setCellValue('AA2','RT/RW');
	$siswa->setCellValue('AB2','Penyakit Diderita');
	$siswa->setCellValue('AC2','Kelainan Jasmani');
	$siswa->setCellValue('AD2','Pernah Dirawat');
	$siswa->setCellValue('AE2','No Telp');

	//AYAH
	$siswa->setCellValue('AF2','NIK Ayah');
	$siswa->setCellValue('AG2','Nama Depan Ayah');
	$siswa->setCellValue('AH2','Nama Belakang Ayah');
	$siswa->setCellValue('AI2','Tahun Lahir Ayah');
	$siswa->setCellValue('AJ2','Agama Ayah');
	$siswa->setCellValue('AK2','Kewarganegaraan Ayah');
	$siswa->setCellValue('AL2','Ijazah Tertinggi Ayah');
	$siswa->setCellValue('AM2','Pekerjaan Ayah');
	$siswa->setCellValue('AN2','Penghasilan Perbulan Ayah');
	$siswa->setCellValue('AO2','No Telp Ayah');
	$siswa->setCellValue('AP2','Riwayat Hidup Ayah');
	$siswa->setCellValue('AQ2','Alamat Rumah Ayah');

	//IBU
	$siswa->setCellValue('AR2','NIK Ibu');
	$siswa->setCellValue('AS2','Nama Depan Ibu');
	$siswa->setCellValue('AT2','Nama Belakang Ibu');
	$siswa->setCellValue('AU2','Tahun Lahir Ibu');
	$siswa->setCellValue('AV2','Agama Ibu');
	$siswa->setCellValue('AW2','Kewarganegaraan Ibu');
	$siswa->setCellValue('AX2','Ijazah Tertinggi Ibu');
	$siswa->setCellValue('AY2','Pekerjaan Ibu');
	$siswa->setCellValue('AZ2','Penghasilan Perbulan Ibu');
	$siswa->setCellValue('BA2','No Telp Ibu');
	$siswa->setCellValue('BB2','Riwayat Hidup Ibu');
	$siswa->setCellValue('BC2','Alamat Rumah Ibu');

	//WALI
	$siswa->setCellValue('BD2','NIK Wali');
	$siswa->setCellValue('BE2','Nama Depan Wali');
	$siswa->setCellValue('BF2','Nama Belakang Wali');
	$siswa->setCellValue('BG2','Tahun Lahir Wali');
	$siswa->setCellValue('BH2','Agama Wali');
	$siswa->setCellValue('BI2','Kewarganegaraan Wali');
	$siswa->setCellValue('BJ2','Ijazah Tertinggi Wali');
	$siswa->setCellValue('BK2','Pekerjaan Wali');
	$siswa->setCellValue('BL2','Penghasilan Perbulan Wali');
	$siswa->setCellValue('BM2','No Telp Wali');
	$siswa->setCellValue('BN2','Riwayat Hidup Wali');
	$siswa->setCellValue('BO2','Alamat Rumah Wali');

	//SEKOLAH
	$siswa->setCellValue('BP2','Tahun Masuk Siswa');
	$siswa->setCellValue('BQ2','Terdaftar Pada Kelas');
	$siswa->setCellValue('BR2','Menerima Beasiswa');
	$siswa->setCellValue('BS2','Nama Sekolah');
	$siswa->setCellValue('BT2','Kelas Saat Ini');
	$siswa->setCellValue('BU2','Program Study');
	$siswa->setCellValue('BV2','Jarak Rumah Kesekolah');
	$siswa->setCellValue('BW2','Alamat Sekolah');
	$siswa->setCellValue('BX2','Transportasi');
	$siswa->setCellValue('BY2','Asal Sekolah');	

	$siswa->setCellValue('BZ2','Lama Belajar');
	$siswa->setCellValue('CA2','Tanggal Dan Nomor STTB');
	$siswa->setCellValue('CB2','Nomor Peserta UN SD/MI');
	$siswa->setCellValue('CC2','Nomor Seri Ijazah SD/MI');
	$siswa->setCellValue('CD2','NOMOR SKHUN SD/MI');

	$siswa->setCellValue('CE2','Pindahan Dari Sekolah');
	$siswa->setCellValue('CF2','Tanggal Diterima Disekolah Ini');
	$siswa->setCellValue('CG2','Diterima Pada Kelas');
	$siswa->setCellValue('CH2','Alasan Pindah');

	$siswa->setCellValue('CI2','Tahun Meninggalkan Sekolah');
	$siswa->setCellValue('CJ2','Tamat Belajar Tahun');
	$siswa->setCellValue('CK2','Alasan');
	$siswa->setCellValue('CL2','Tanggal Dan Nomor STTB');
	$siswa->setCellValue('CM2','Status Pendidikan');


//MERGE COLUMN
	//COLUMN SISWA
	$siswa->MergeCells('A1:AE1');

	//COLUMN AYAH
	$siswa->MergeCells('AF1:AP1');

	//COLUMN IBU
	$siswa->MergeCells('AR1:BB1');

	//COLUMN WALI
	$siswa->MergeCells('BD1:BN1');


	//COLUMN SEKOLAH
	$siswa->MergeCells('BP1:CM1');


//STYLE SHEET SISWA WIDTH ROW

	// ALL CELL
	$siswa->getDefaultColumnDimension()->setWidth(25);
	$siswa->getDefaultColumnDimension()->setAutoSize(false);
	$siswa->getDefaultRowDimension()->setRowHeight(15);

	//CELL NO
	$siswa->getColumnDimension('A')->setWidth(5);
	$siswa->getStyle('A')->getAlignment()->setHORIZONTAL(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


//HEADER STYLE

	//ARAY STYLE
		$border_style = [
					 	'borders'=>[
					 		'left' => [
					 			'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
					 			'color' => ['argb'=> 'ffffff'],
					 		],
					 	] ,
					];
	

	//SISWA
	$siswa->getStyle('A1:BP1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
	$siswa->getStyle('A1:BP1')->getAlignment()->setWrapText(true);

	$siswa->getStyle('A1:BP1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

	$siswa->getStyle('A1:BP1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
	$siswa->getStyle('A1:BP1')->getFill()->getStartColor()->setARGB('222930');

	//AYAH
	$siswa->getStyle('AF1')->applyFromArray($border_style);

	//IBU
	$siswa->getStyle('AR1')->applyFromArray($border_style);

	//WALI
	$siswa->getStyle('BD1')->applyFromArray($border_style);

	//WALI
	$siswa->getStyle('BP1')->applyFromArray($border_style);
#2e9c56

//SUBHEADER STYLE
	
	//SISWA
	$color_siswa = '9c2e49';

    $siswa->getStyle('A2:CM2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $siswa->getStyle('A2:CM2')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
	$siswa->getStyle('A2:CM2')->getFont()->setBold(true);

    $siswa->getStyle('A2:CM2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
	$siswa->getStyle('A2:CM2')->getFill()->getStartColor()->setARGB($color_siswa);


	//AYAH

	$siswa->getStyle('AF2')->applyFromArray($border_style);
	$siswa->getStyle('AF2:AQ2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
	$siswa->getStyle('AF2:AQ2')->getFill()->getStartColor()->setARGB('e9c56');

	//IBU
	$siswa->getStyle('AR2')->applyFromArray($border_style);
	$siswa->getStyle('AR2:BC2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
	$siswa->getStyle('AR2:BC2')->getFill()->getStartColor()->setARGB('2e949c');

	//WALI
	$siswa->getStyle('BD2')->applyFromArray($border_style);
	$siswa->getStyle('BD2:BO2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
	$siswa->getStyle('BD2:BO2')->getFill()->getStartColor()->setARGB('9c682e');

	//SEKOLAH
	$siswa->getStyle('BP2')->applyFromArray($border_style);
	$siswa->getStyle('BP2:CM2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
	$siswa->getStyle('BP2:CM2')->getFill()->getStartColor()->setARGB('4c2e9c');

//Data
$col = 3;
$no  = 1;

//BEAUTY NOMOR HP
function nomor($nomor){
	$nomor_telepon = $nomor;
	$nomor_telepon = preg_replace('/^[0]/', '+62 ', $nomor_telepon);
	$nomor_telepon = substr($nomor_telepon,0,7).'-'.substr($nomor_telepon,7,4).'-'.substr($nomor_telepon,11,6);

	return $nomor_telepon;
}

while($data = mysqli_fetch_assoc($data_siswa)){

	$no_siswa = nomor($data['nomor_telepon']);
	$no_ayah  = nomor($data['nomor_telepon_ayah']);
	$no_ibu	  = nomor($data['nomor_telepon_ibu']);
	$no_wali  = nomor($data['nomor_telepon_wali']);

	$row = 1;
	//SECTION SISWA
	$siswa->setCellValueByColumnAndRow(1,$col,$no);
	$siswa->setCellValueByColumnAndRow(2,$col,trim($data['nis']));
	$siswa->setCellValueByColumnAndRow(3,$col,trim($data['nisn']));
	$siswa->setCellValueByColumnAndRow(4,$col,trim($data['nik_siswa']));
	$siswa->setCellValueByColumnAndRow(5,$col,trim($data['nama_depan']));
	$siswa->setCellValueByColumnAndRow(6,$col,trim($data['nama_belakang']));
	$siswa->setCellValueByColumnAndRow(7,$col,trim($data['nama_panggilan']));
	$siswa->setCellValueByColumnAndRow(8,$col,trim($data['kewarganegaraan']));
	$siswa->setCellValueByColumnAndRow(9,$col,trim($data['bahasa_sehari_hari']));
	$siswa->setCellValueByColumnAndRow(10,$col,trim($data['tanggal_lahir']));
	$siswa->setCellValueByColumnAndRow(11,$col,trim($data['tempat_lahir']));
	$siswa->setCellValueByColumnAndRow(12,$col,trim($data['jenis_kelamin']));
	$siswa->setCellValueByColumnAndRow(13,$col,trim($data['agama']));
	$siswa->setCellValueByColumnAndRow(14,$col,trim($data['golongan_darah']));
	$siswa->setCellValueByColumnAndRow(15,$col,trim($data['tinggi_siswa']." CM"));
	$siswa->setCellValueByColumnAndRow(16,$col,trim($data['berat_siswa']." Kg"));
	$siswa->setCellValueByColumnAndRow(17,$col,trim($data['anak_keberapa']));
	$siswa->setCellValueByColumnAndRow(18,$col,trim($data['anak_yatim']));
	$siswa->setCellValueByColumnAndRow(19,$col,trim($data['jumlah_saudara_kandung']));
	$siswa->setCellValueByColumnAndRow(20,$col,trim($data['jumlah_saudara_tiri']));
	$siswa->setCellValueByColumnAndRow(21,$col,trim($data['jumlah_saudara_angkat']));
	$siswa->setCellValueByColumnAndRow(22,$col,trim($data['alamat_tersebut']));
	$siswa->setCellValueByColumnAndRow(23,$col,trim($data['alamat']));
	$siswa->setCellValueByColumnAndRow(24,$col,trim($data['kelurahan']));
	$siswa->setCellValueByColumnAndRow(25,$col,trim($data['kecamatan']));
	$siswa->setCellValueByColumnAndRow(26,$col,trim($data['kodepos']));
	$siswa->setCellValueByColumnAndRow(27,$col,trim($data['rt_rw']));
	$siswa->setCellValueByColumnAndRow(28,$col,trim($data['penyakit_yang_pernah_diderita']));
	$siswa->setCellValueByColumnAndRow(29,$col,trim($data['kelainan_jasmani']));
	$siswa->setCellValueByColumnAndRow(30,$col,trim($data['pernah_dirawat_di']));
	$siswa->setCellValueByColumnAndRow(31,$col,trim($no_siswa));
	

	//AYAH
	$siswa->setCellValueByColumnAndRow(32,$col,trim($data['nik_ayah']));
	$siswa->setCellValueByColumnAndRow(33,$col,trim($data['nama_depan_ayah']));
	$siswa->setCellValueByColumnAndRow(34,$col,trim($data['nama_belakang_ayah']));
	$siswa->setCellValueByColumnAndRow(35,$col,trim($data['tanggal_lahir_ayah']));
	$siswa->setCellValueByColumnAndRow(36,$col,trim($data['agama_ayah']));
	$siswa->setCellValueByColumnAndRow(37,$col,trim($data['kewarganegaraan_ayah']));
	$siswa->setCellValueByColumnAndRow(38,$col,trim($data['ijazah_tertinggi_ayah']));
	$siswa->setCellValueByColumnAndRow(39,$col,trim($data['pekerjaan_ayah']));
	$siswa->setCellValueByColumnAndRow(40,$col,trim($data['penghasilan_perbulan_ayah']));
	$siswa->setCellValueByColumnAndRow(41,$col,trim($no_ayah));
	$siswa->setCellValueByColumnAndRow(42,$col,trim($data['riwayat_hidup_ayah']));
	$siswa->setCellValueByColumnAndRow(43,$col,trim($data['alamat_rumah_ayah']));

	//IBU
	$siswa->setCellValueByColumnAndRow(44,$col,trim($data['nik_ibu']));
	$siswa->setCellValueByColumnAndRow(45,$col,trim($data['nama_depan_ibu']));
	$siswa->setCellValueByColumnAndRow(46,$col,trim($data['nama_belakang_ibu']));
	$siswa->setCellValueByColumnAndRow(47,$col,trim($data['tanggal_lahir_ibu']));
	$siswa->setCellValueByColumnAndRow(48,$col,trim($data['agama_ibu']));
	$siswa->setCellValueByColumnAndRow(49,$col,trim($data['kewarganegaraan_ibu']));
	$siswa->setCellValueByColumnAndRow(50,$col,trim($data['ijazah_tertinggi_ibu']));
	$siswa->setCellValueByColumnAndRow(51,$col,trim($data['pekerjaan_ibu']));
	$siswa->setCellValueByColumnAndRow(52,$col,trim($data['penghasilan_perbulan_ibu']));
	$siswa->setCellValueByColumnAndRow(53,$col,trim($no_ibu));
	$siswa->setCellValueByColumnAndRow(54,$col,trim($data['riwayat_hidup_ibu']));
	$siswa->setCellValueByColumnAndRow(55,$col,trim($data['alamat_rumah_ibu']));

	//WALI
	$siswa->setCellValueByColumnAndRow(56,$col,trim($data['nik_wali']));
	$siswa->setCellValueByColumnAndRow(57,$col,trim($data['nama_depan_wali']));
	$siswa->setCellValueByColumnAndRow(58,$col,trim($data['nama_belakang_wali']));
	$siswa->setCellValueByColumnAndRow(59,$col,trim($data['tanggal_lahir_wali']));
	$siswa->setCellValueByColumnAndRow(60,$col,trim($data['agama_wali']));
	$siswa->setCellValueByColumnAndRow(61,$col,trim($data['kewarganegaraan_wali']));
	$siswa->setCellValueByColumnAndRow(62,$col,trim($data['ijazah_tertinggi_wali']));
	$siswa->setCellValueByColumnAndRow(63,$col,trim($data['pekerjaan_wali']));
	$siswa->setCellValueByColumnAndRow(64,$col,trim($data['penghasilan_perbulan_wali']));
	$siswa->setCellValueByColumnAndRow(65,$col,trim($no_wali));
	$siswa->setCellValueByColumnAndRow(66,$col,trim($data['riwayat_hidup_wali']));
	$siswa->setCellValueByColumnAndRow(67,$col,trim($data['alamat_rumah_wali']));

	$siswa->setCellValueByColumnAndRow(68,$col,trim($data['tahun_masuk_siswa']));
	$siswa->setCellValueByColumnAndRow(69,$col,trim($data['terdaftar_pada_kelas']));
	$siswa->setCellValueByColumnAndRow(70,$col,trim($data['menerima_bea_siswa']));
	$siswa->setCellValueByColumnAndRow(71,$col,trim($data['nama_sekolah']));
	$siswa->setCellValueByColumnAndRow(72,$col,trim($data['kelas']." ".$data['nama_kelas']));
	$siswa->setCellValueByColumnAndRow(73,$col,trim($data['program_study']));
	$siswa->setCellValueByColumnAndRow(74,$col,trim($data['jarak_rumah_dari_sekolah']." Km"));
	$siswa->setCellValueByColumnAndRow(75,$col,trim($data['alamat_sekolah']));
	$siswa->setCellValueByColumnAndRow(76,$col,trim($data['ke_sekolah_dengan']));
	$siswa->setCellValueByColumnAndRow(77,$col,trim($data['asal_sekolah']));
	$siswa->setCellValueByColumnAndRow(78,$col,trim($data['lama_belajar']));
	$siswa->setCellValueByColumnAndRow(79,$col,trim($data['tanggal_dan_nomor_sttb']));
	$siswa->setCellValueByColumnAndRow(80,$col,trim($data['no_peserta_un']));
	$siswa->setCellValueByColumnAndRow(81,$col,trim($data['no_seri_ijazah']));
	$siswa->setCellValueByColumnAndRow(82,$col,trim($data['no_skhun']));
	$siswa->setCellValueByColumnAndRow(83,$col,trim($data['pindahan_dari_sekolah']));
	$siswa->setCellValueByColumnAndRow(84,$col,trim($data['tanggal_diterima_disekolah_ini']));
	$siswa->setCellValueByColumnAndRow(85,$col,trim($data['diterima_pada_kelas']));
	$siswa->setCellValueByColumnAndRow(86,$col,trim($data['alasan_pindah']));
	$siswa->setCellValueByColumnAndRow(87,$col,trim($data['tahun_meninggalkan_sekolah']));
	$siswa->setCellValueByColumnAndRow(88,$col,trim($data['tamat_belajar_tahun']));
	$siswa->setCellValueByColumnAndRow(89,$col,trim($data['alasan']));
	$siswa->setCellValueByColumnAndRow(90,$col,trim($data['tanggal_dan_no_sttb_alumni']));
	$siswa->setCellValueByColumnAndRow(91,$col,trim($data['status_pendidikan']));


	$col++;
	$no++;

}

 ?>