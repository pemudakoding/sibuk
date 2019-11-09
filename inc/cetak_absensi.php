<?php 
	require '../asset/library/phpoffice/autoload.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$excel = new Spreadsheet();



	//LIST SHEET
	$absen = $excel->getActiveSheet();
	$absen->setTitle('ABSENSI');

	//GAMBAR HEADER
	$logo_kiri = new \PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing();
	$logo_kiri->setName('LOGO SEKOLAH');
	$logo_kiri->setPath('../asset/img/foto_cetak/kotapalu.png');
	$logo_kiri->setHeight(100);
	$logo_kiri->setCoordinates('A1');
	$logo_kiri->setWorksheet($absen);

	$logo_kanan = new \PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing();
	$logo_kanan->setName('LOGO SEKOLAH');
	$logo_kanan->setPath('../asset/img/foto_cetak/tutwuri.png');
	$logo_kanan->setHeight(80);
	$logo_kanan->setCoordinates('Z1');
	$logo_kanan->setWorksheet($absen);
	//Buat Header

	//

	//HEADING TEXT
	$kelas  = mysqli_fetch_array($data_siswa1);
	$kelas  = $kelas['kelas']." ".$kelas['nama_kelas'];
	$absen->setCellValue('C1','Pemerintah Kota Palu');
	$absen->setCellValue('C2','Dinas Pendidikan Dan Kebudayaan');
	$absen->setCellValue('C3',$data_sekolah['nama_sekolah']);
	$absen->setCellValue('C4',"{$data_sekolah['alamat_sekolah']} Telp {$data_sekolah['no_telp_sekolah']} E-mail {$data_sekolah['email_sekolah']} Web {$data_sekolah['web_sekolah']} ");
	$absen->setCellValue('C5','DAFTAR HADIR SISWA KELAS '.$kelas."\n Tahun Ajaran ".date('Y',strtotime('-1 years'))."/".date('Y'));

	//BIO SISWA
	$absen->setCellValue('A6','No');
	$absen->setCellValue('B6',"No \n Induk");
	$absen->setCellValue('C6',"Nama");
	$absen->setCellValue('D6',"Agama");
	$absen->setCellValue('E6',"L/ \n P");

	//BIO KEHADIRAN
	$absen->setCellValue('F6',"Hari/Kehadiran");
	$absen->setCellValue('F7',"Senin");
	$absen->setCellValue('J7',"Selasa");
	$absen->setCellValue('N7',"Rabu");
	$absen->setCellValue('R7',"Kamis");
	$absen->setCellValue('V7',"Jumat");

	//BIO JUMLAH
	$absen->setCellValue('Z6',"JUMLAH");
	$absen->setCellValue('Z7',"S");
	$absen->setCellValue('AA7',"I");
	$absen->setCellValue('AB7',"A");
	$absen->setCellValue('AC7',"B");

	//SECTION TANDA TANGAN Kepsek
	$absen->setCellValue('A43',"Mengetahui");
	$absen->setCellValue('A44',"Kepala Sekolah");
	$absen->setCellValue('A47',"{$data_sekolah['nama_kepsek']}");
	$absen->setCellValue('A48',"NIP {$data_sekolah['nip_kepsek']}");
	//Section Tanda Tangan Wakel
	$absen->setCellValue('F44',"Wali Kelas,");
	$absen->setCellValue('F47',"{$guru['nama_guru']}");
	$absen->setCellValue('F48',"NIP {$guru['nim']}");

	//section tanggal
	$absen->setCellValue('F43',"{$data_sekolah['kota_sekolah']},");
	$absen->setCellValue('J43',date('F Y'));


	//Set Width Column
	$absen->getColumnDimension('A')->setWidth(4);
	$absen->getColumnDimension('B')->setWidth(10);
	$absen->getColumnDimension('C')->setWidth(25);
	$absen->getColumnDimension('D')->setWidth(7);
	$absen->getColumnDimension('E')->setWidth(4);

	$absen->getColumnDimension('Z')->setWidth(3);
	$absen->getColumnDimension('AA')->setWidth(3);
	$absen->getColumnDimension('AB')->setWidth(3);
	$absen->getColumnDimension('AC')->setWidth(3);


	//Set column in range 
	foreach(range('F','Y') as $columnID) {
	    $absen->getColumnDimension($columnID)
	        ->setWidth(2);
	}





	//Merge Cell
	//HEADING TEXT
	$absen->mergeCells('C1:X1');
	$absen->mergeCells('C2:X2');
	$absen->mergeCells('C3:X3');
	$absen->mergeCells('C4:X4');
	$absen->mergeCells('C5:X5');

	$absen->mergeCells('A1:B4');
	$absen->mergeCells('Z1:AC4');
	//Biodata siswa

	$absen->mergeCells('A6:A7');
	$absen->mergeCells('B6:B7');
	$absen->mergeCells('C6:C7');
	$absen->mergeCells('D6:D7');
	$absen->mergeCells('E6:E7');

	//Bio Kehadiran
	$absen->mergeCells('F6:Y6');
	$absen->mergeCells('F7:I7');
	$absen->mergeCells('J7:M7');
	$absen->mergeCells('N7:Q7');
	$absen->mergeCells('R7:U7');
	$absen->mergeCells('V7:Y7');

	//BIO JUMLAH
	$absen->mergeCells('Z6:AC6');

	//ALIGN TEXT
	$absen->getStyle('A1:AC7')
    ->getAlignment()
    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $absen->getStyle('A1:AC7')
    ->getAlignment()
    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    //style border
    $border = [
	    'borders' => [
	        'allBorders' => [
	            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
	            'color' => ['argb' => '000'],
	        ],
	    ],
	];

	//STYLE TEXT
	//PEMERINTAH KOTA PALU
	$absen->getRowDimension(1)->setRowHeight(20);
	$absen->getStyle('C1')->getFont()->setSize(25);

	//DINAS PENDIDIKAN KOTA PALU
	$absen->getRowDimension(2)->setRowHeight(30);
	$absen->getStyle('C2')->getFont()->setSize(25);

	//NAME SEKOLAH
	$absen->getStyle('C3')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKRED);
	$absen->getStyle('C3')->getFont()->setSize(20);

	//Bio Sekolah 
	$absen->getStyle('C4')->getFont()->setSize(9);
	$absen->getStyle('A45:F45')->getFont()->setBold(true);


	//Name Kelas
	$absen->getRowDimension(5)->setRowHeight(40);
   
   
    $row  = 8;

    while ($data = mysqli_fetch_assoc($data_siswa)) {	
   		 $absen->setCellValueByColumnAndRow(1,$row,trim((string)$row - 7));
   		 $absen->setCellValueByColumnAndRow(2,$row,trim($data['nis']));
   		 $absen->setCellValueByColumnAndRow(3,$row,trim($data['nama_depan']." ".$data['nama_belakang']));
   		 $absen->setCellValueByColumnAndRow(4,$row,trim($data['agama']));
   		 $absen->setCellValueByColumnAndRow(5,$row,trim(substr($data['jenis_kelamin'], 0,1)));

   		 if (strlen($data['nama_depan']." ".$data['nama_belakang']) >= 20 ) {
   		 	$absen->getRowDimension($row)->setRowHeight(25);
   		 }

    	 $row++;
    }

   $cell = 6;
   while($cell <= 42){
   	 $absen->getStyle("A".$cell.":"."AC".$cell)->applyFromArray($border);
   	 $absen->getStyle("A".$cell.":"."AC".$cell)->getAlignment()->setWrapText(true);
   	 $absen->getStyle("A".$cell.":"."AC".$cell)->getAlignment()->setWrapText(true);	
   	 $absen->getStyle("A".$cell.":"."AC".$cell)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
   	 $absen->getStyle("A".$cell.":"."AC".$cell)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
     $cell++;
   } 
 ?>