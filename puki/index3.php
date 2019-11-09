<?php
    $koneksi    = mysqli_connect('localhost','root','','sibuk');
    $dataSekolah= mysqli_fetch_object(mysqli_query($koneksi,"SELECT * FROM sekolah"));
    $dot        = '.............................';





     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAKLO GEMING</title>
    <link rel="stylesheet" href="main.css">

    <style type="text/css">
    	@media print {
    		.capitalize  td p {
   text-transform: capitalize;
}
    	}
    </style>

</head>
<body>
    <div class="container">
        <div class="header">
            <h1>LEMBARAN BUKU INDUK <br>TAHUN AJARAN 2018/2019</h1>
        </div>
        <div class="main-content">
            <div class="section-left">
                <div class="siswa">
                    <table class="section-siswa">
                    <tr>
                        <td><p>Nama Lengkap</p></td>
                        <td><p>:</p></td>
                        <td><p><?= $dot ?> 
                    </tr>
                    <tr>
                        <td><p>NIS/NISN</p></td>
                        <td><p>:</p></td>
                        <td><p><?= $dot ?> 
                    </tr>
                    <tr>
                        <td><p>Nama/Jenis Sekolah</p></td>
                        <td><p>:</p></td>
                        <td><p><?= $dataSekolah->nama_sekolah ?></p></td>
                    </tr>
                    <tr>
                        <td><p>Alamat Sekolah</p></td>
                        <td><p>:</p></td>
                        <td><p><?= $dataSekolah->alamat_sekolah ?></p></td>
                    </tr>
                    </table>
                </div>

                <div class="ket-pribadi" style=" padding-top: 30px;">
                    <h5 style="">A. KETERANGAN PRIBADI</h5>
                    <table class="table-nested">
                        <!-- SECTION NESTED TABLE -->
                        <tr>
                            <td><p>1.</p></td>
                            <td><p>Nama Siswa</p></td>
                        </tr>
                        
                        <tr class="nested-data">
                            <td><p>a.</p></td>
                            <td><p>Nama Lengkap</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?> 
                        </tr>
                        <tr class="nested-data">
                            <td><p>b.</p></td>
                            <td><p>Nama Panggilan</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?> 
                        </tr> 
                        <!--  END NESTED --> 
                    </table>

                    <table class="default-table ">
                        <tr>
                            <td><p>2.</p></td>
                            <td><p>Jenis Kelamin</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?> 
                        </tr>
                        <tr class="capitalize">
                            <td><p>3.</p></td>
                            <td><p>Tempat Dan Tanggal Lahir</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?> 
                        </tr>
                        <tr>
                            <td><p>4.</p></td>
                            <td><p>Agama</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?> 
                        </tr>

                        <tr>
                            <td><p>5.</p></td>
                            <td><p>Kewarganegaraan</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?> 
                        </tr>

                        <tr>
                            <td><p>6.</p></td>
                            <td><p>Anak Keberapa</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?> 
                        </tr>

                        <tr>
                            <td><p>7.</p></td>
                            <td><p>Jumlah Saudara Kandung</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?> 
                        </tr>

                        <tr>
                            <td><p>8.</p></td>
                            <td><p>Jumlah Saudara Tiri</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>

                        <tr>
                            <td><p>9.</p></td>
                            <td><p>Jumlah Saudara Angkat</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>

                        <tr>
                            <td><p>10.</p></td>
                            <td><p>Anak Yatim/Piatu/Yatim Piatu</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>

                        <tr>
                            <td><p>11.</p></td>
                            <td><p>Bahasa Sehari-hari</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>
                    </table>
    
                </div>
                <div class="ket-pribadi ket-tempat-tinggal">
                    <h5>B. KETERANGAN TEMPAT TINGGAL</h5>
                    <table class="table-nested">
                        <!-- SECTION NESTED TABLE -->

                    <table class="default-table tempat-tinggal">
                        <tr>
                            <td><p>12.</p></td>
                            <td><p>Alamat</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>
                        <tr>
                            <td><p>13.</p></td>
                            <td><p>Nomor Telepon</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>
                        <tr>
                            <td><p style="position: relative; top: -18px;">14.</p></td>
                            <td><p style="position: relative; top: -18px;">Alamat Tersebut</p></td>
                            <td><p style="position: relative; top: -18px;">:</p></td>
                            <td style="position: relative; top: 2px;">

                            	

                
                            

                                <div class="box"></div><p style="float: left; margin-left: 5px;">a. Tempat Tinggal Orang Tua</p><div style="clear: both;"></div>
                                <div class="box"></div><p style="float: left; margin-left: 5px;">b. Menumpang pada orang lain</p><div style="clear: both;"></div>
                                <div class="box"></div><p style="float: left; margin-left: 5px;">c. Di Asrama</p><div style="clear: both;"></div></td>

                                
                               
                                



                        </tr>

                        <tr style="position: relative; top: 5px;">
                            <td><p>15.</p></td>
                            <td><p>Jarak dari Tempat Tinggal ke <br>Sekolah</p></td>
                            <td><p>:</p></td>
                            <td> <div class="box" style="font-size: 0.8em;">
                        </tr>

                        <tr>
                            <td><p style="position: relative; top: -15px;">16.</p></td>
                            <td><p style="position: relative; top: -15px;">Kesekolah Dengan</p></td>
                            <td><p style="position: relative; top: -15px;">:</p></td>
                            <td style="position: relative; top: 0px;"><div class="box"></div><p style="float: left; margin-left: 5px;">Kendaraan Umum</p><div style="clear: both;"></div>
                                <div class="box"></div><p style="float: left; margin-left: 5px;">Kendaraan Pribadi</p><div style="clear: both;"></div>
                                <div class="box"></div><p style="float: left; margin-left: 5px;">Jalan Kaki</p><div style="clear: both;"></div></td>
                        </tr>
                    </table>
    
                </div>

                <div class="ket-pribadi ket-tempat-tinggal">
                    <h5>C. KETERANGAN KESEHATAN</h5>
                    <table class="table-nested">
                        <!-- SECTION NESTED TABLE -->

                    <table class="default-table ket-kesehatan">
                        <tr>
                            <td><p>17.</p></td>
                            <td><p>Golongan Darah</p></td>
                            <td><p>:</p></td>
                            <td style="display: flex;align-items: flex-end;">
                                <div class="box"><span style="font-size: 10px;">
                                <p style="float: left; margin-left: 5px;"></p>
                                <div style="clear: both;"></div>
                        </tr>   

                        <tr>
                            <td><p>18.</p></td>
                            <td><p>Penyakit yang pernah diderita</p></td>
                            <td><p>:</p></td>
                            <td style="position: relative; top: 5px; display: flex; align-items: center;">

                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">TBC</p>
                                <div class="box"><b></b></div><p style="float: left; margin-right: 5px; font-size: 10px">CACAR</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">LEVER</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">MALARIA</p>

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p>dan dirawat di</p></td>
                            <td><p>:</p></td>
                            <td><p style="margin-top: 5px; font-size: 10px;"><?=  $dot ?> 
                        </tr>
                        <tr>
                            <td><p>19</p></td>
                            <td><p>Kelainan Jasmani</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?></p></td>
                        </tr>

                        <tr>
                            <td><p>20.</p></td>
                            <td><p>Tinggi dan Berat Siswa</p></td>
                            <td><p>:</p></td>
                            <td style="position: relative; top: 5px; display: flex;align-items: center;">
                                <div class="box"><span style="font-size: 10px;">
                                <div class="box"><span style="font-size: 10px;"> 
                            </td>
                        </tr>
                    </table>
    
                </div>

                <div class="ket-pribadi ket-pendidikan-prev">
                    <h5>D. KETERANGAN PENDIDIKAN SEBELUMNYA</h5>
                    <table class="table-nested">
                        <!-- SECTION NESTED TABLE -->
                        <tr>
                            <td><p>21.</p></td>
                            <td><p>Sekolah Asal</p></td>
                        </tr>
                        
                        <tr class="nested-data">
                            <td style="padding-top: 5px;"><p>a.</p></td>
                            <td style="padding-top: 5px;"><p>SD atau Sederajat</p></td>
                            <td style="padding-top: 5px;"><p>:</p></td>
                            <td style="position: relative; top: 5px; display: flex; align-items: center;">
                    
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">SD</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">MI</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">SEDERAJAT</p>
                            </td>
                        </tr>

                        <tr class="nested-data">
                            <td style="padding-top: 5px;"><p>b.</p></td>
                            <td style="padding-top: 5px;"><p>Tanggal dan Nomor STTB</p></td>
                            <td style="padding-top: 5px;"><p>:</p></td>
                            <td style="padding-top: 5px;"><p><?=  $dot ?>
                        </tr> 

                         <tr class="nested-data">
                            <td style="padding-top: 5px;"><p>C.</p></td>
                            <td style="padding-top: 5px;"><p>Lama Belajar</p></td>
                            <td style="padding-top: 5px;"><p>:</p></td>
                            <td style="padding-top: 5px;"><p><?= $dot ?>
                        </tr> 
                        <!--  END NESTED --> 
                    </table>
                </div>
            </div>

            <div class="section-center">
                <div class="siswa">
                    <table class="table-nested table-pindah">
                        <!-- SECTION NESTED TABLE -->
                        <tr>
                            <td style="padding-left: 0px"><p>22.</p></td>
                            <td><p>Pindahan dari sekolah</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?></p></td>
                        </tr>
                        <tr class="nested-data">
                            <td><p></p></td>
                            <td><p >Diterima di Sekolah ini</p></td>
                            <td>:</td>
                            <td><p><?= $dot ?></p></td>
                        </tr>
                        <tr class="nested-data">
                            <td><p></p></td>
                            <td><p >Tanggal</p></td>
                            <td><p>:</p></td>
                            <td><p ><?= $dot ?></p></td>
                        </tr>

                        <tr class="nested-data">
                            <td><p></p></td>
                            <td><p >Kelas</p></td>
                            <td><p>:</p></td>
                            <td><p ><?= $dot ?></p></td>
                        </tr>

                        <tr class="nested-data">
                            <td><p></p></td>
                            <td><p >Alasan Pindah</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?></p></td>
                        </tr> 
                        <!--  END NESTED --> 
                    </table>
                </div>

                <div class="ket-pribadi ket-orangtua">
                    <h5>E. KETERANGAN TENTANG ORANG TUA</h5>
                    <table style="height: 4cm;">
                        <tr>
                            <td><p>No</p></td>
                            <td><p>Orang Tua Kandung</p></td>
                            <td><p>Ayah</p></td>
                            <td><p>Ibu </p></td>
                        </tr>
                        <tr>
                            <td><p>23</p></td>
                            <td><p>Nama</p></td>
                            <td><p><?= $dot ?></p></td>
                            <td><p><?= $dot ?></p></td>
                        </tr>
                        <tr>
                            <td><p>24</p></td>
                            <td><p>Tempat dan Tanggal Lahir</p></td>
                            <td><p><?= $dot ?></p></td>
                            <td><p><?= $dot ?></p></td>
                        </tr>
                        <tr>
                            <td><p>25</p></td>
                            <td><p>Agama</p></td>
                            <td><p><?= $dot ?>
                            <td><p><?= $dot ?>
                        </tr>  
                        <tr>
                            <td><p>26</p></td>
                            <td><p>Kewarganegaraan</p></td>
                            <td><p><?= $dot ?>
                            <td><p><?= $dot ?>
                        </tr>
                        <tr>
                            <td><p>27</p></td>
                            <td><p>Ijazah Tertinggi</p></td>
                            <td><p><?= $dot ?>
                            <td><p><?= $dot ?>
                        </tr>
                        <tr>
                            <td><p>28</p></td>
                            <td><p>Pekerjaan</p></td>
                            <td><p><?= $dot ?>
                            <td><p><?= $dot ?>
                        </tr>
                        <tr>
                            <td><p>29</p></td>
                            <td><p>Penghasilan/bulan</p></td>
                            <td><p><?= $dot ?> 
                            <td><p><?= $dot ?> 
                        </tr>
                        <tr>
                            <td><p>30</p></td>
                            <td><p>Alamat rumah dan nomor Telepon</p></td>
                            <td><p><?= $dot ?> 
                            <td><p><?= $dot ?> 
                        </tr>
                        <tr>
                            <td><p>31</p></td>
                            <td><p>Masih hidup/meninggal dunia</p></td>
                            <td><p><?= $dot ?> 
                            <td><p><?= $dot ?> 
                        </tr>
                    </table>
                </div>

                <div class="ket-pribadi " style="padding-top: 15px;">
                    <h5>F. KETERANGAN TENTANG WALI</h5>
                    <table class="default-table wali-table">
                        <tr>
                            <td><p>32.</p></td>
                            <td><p>Nama</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot; ?></p></td>
                        </tr>
                        <tr>
                            <td><p>33.</p></td>
                            <td><p>Tempat Dan Tanggal Lahir</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?></p></td>
                        </tr>
                        <tr>
                            <td><p>34.</p></td>
                            <td><p>Agama</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>

                        <tr>
                            <td><p>35.</p></td>
                            <td><p>Kewarganegaraan</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>

                        <tr>
                            <td><p>36.</p></td>
                            <td><p>Hubungan Keluarga</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?> </p></td>
                        </tr>

                        <tr>
                            <td><p>37.</p></td>
                            <td><p>Ijazah Tertinggi</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>

                        <tr>
                            <td><p>38.</p></td>
                            <td><p>Pekerjaan</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>

                        <tr>
                            <td><p>39.</p></td>
                            <td><p>Penghasilan/bulan</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>

                        <tr>
                            <td><p>40.</p></td>
                            <td><p>Alamat rumah</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>
                        <tr>
                            <td><p>41.</p></td>
                            <td><p>Nomor Telepon</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dot ?>
                        </tr>
                    </table>
                </div>

                <div class="ket-pribadi " style="padding-top: 36px;">
                    <h5>G. KETERANGAN PERKEMBANGAN SISWA</h5>
                    <div class="siswa">
                        <table class="default-table perkembangan-table">
                            <tr>
                                <td><p>42.</p></td>
                                <td><p>Tahun masuk/terdaftar</p></td>
                                <td><p>:</p></td>
                                <td><p><?= $dot?></p></td>
                            </tr>
                            <tr>
                                <td><p>43.</p></td>
                                <td><p>Menerima Bea siswa</p></td>
                                <td><p>:</p></td>
                                <td style="display:flex;flex-direction: column; align-items: flex-end; margin-top: 15px;line-height: 20px;">
                                    <p style="margin-right: 53px;">Dari .......................</p> 
                                    <p>Tahun .............. Kelas .......... <p>
                                </td>
                            </tr>
                        </table>
                        <table class="table-nested table-pindah nested-last" style="margin-top: 10px;"> 
                            <!-- SECTION NESTED TABLE -->
                            <tr>
                                <td style="padding-left: 0px"><p>44.</p></td>
                                <td><p>Tahun meninggalkan sekolah</p></td>
                                <td><p>:</p></td>
                                <td><p><?= $dot ?></p></td>
                            </tr>
                            <tr class="nested-data nested-last">
                                <td><p></p></td>
                                <td><p >Alasan</p></td>
                                <td>:</td>
                                <td><p><?= $dot ?><br><?= $dot ?></p></td>
                            </tr>
                            <tr class="nested-data nested-last">
                                <td><p></p></td>
                                <td><p >Tamat belajar tahun</p></td>
                                <td><p>:</p></td>
                                <td><p ><?= $dot ?></p></td>
                            </tr>

                            <tr class="nested-data nested-last">
                                <td><p></p></td>
                                <td><p >Tanggal dan Nomor STTB</p></td>
                                <td><p>:</p></td>
                                <td><p ><?= $dot ?></p></td>
                            </tr>

                            <tr class="nested-data nested-last">
                                <td><p></p></td>
                                <td><p >Melanjutkan pendidikan/</p></td>
                                <td><p>:</p></td>
                                <td>
                                    <div class="box"></div><p style="float: left; margin-left: 5px;">Melanjut ke .......</p><div style="clear: both;"></div>
                                </td>
                            </tr> 

                            <tr class="nested-data nested-last">
                                <td><p></p></td>
                                <td><p >bekerja</p></td>
                                <td><p>:</p></td>
                                <td>
                                    <div class="box"></div><p style="float: left; margin-left: 5px;">Bekerja di .........</p><div style="clear: both;"></div>
                                </div></td>
                            </tr> 
                            <tr class="nested-data nested-last">
                                <td><p></p></td>
                                <td><p ></p></td>
                                <td><p>:</p></td>
                                <td>
                                    <div class="box"></div><p style="float: left; margin-left: 5px;">Dan lain-lain ......</p><div style="clear: both;"></div>
                                </div></td>
                            </tr> 
                            <!--  END NESTED --> 
                        </table>
                    </div>
                </div>
            </div>

            <div class="section-right">
                <div class="foto foto-atas">
                
                </div>
                <div class="foto foto-bawah">
                     
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="header">
            <h1> LAPORAN PENILAIAN HASIL BELAJAR <br> SEKOLAH MENENGAH PERTAMA (SMP)</h1>
        </div>
        <div class="main-content">
            <div class="section-left" style="position: relative;">
                <div class="siswa">
                    <table class="section-siswa">
                    <tr>
                        <td><p>&nbsp;Nama Sekolah</p></td>
                        <td><p>&nbsp;:</p></td>
                        <td><p>&nbsp;<?= $dataSekolah->nama_sekolah ?></p></td>
                    </tr>
                    <tr>
                        <td><p>&nbsp;Alamat Sekolah</p></td>
                        <td><p>&nbsp;:</p></td>
                        <td><p>&nbsp;<?= $dataSekolah->alamat_sekolah ?></p></td>
                    </tr>
                    <tr>
                        <td><p>&nbsp;Nama Lengkap</p></td>
                        <td><p>&nbsp;:</p></td>
                        <td><p>&nbsp;<?= $dot ?>
                    </tr>
                    <tr>
                        <td><p>&nbsp;NOMOR INDUK</p></td>
                        <td><p>&nbsp;:</p></td>
                        <td><p>&nbsp;<?= $dot ?>
                    </tr>
                    
                    
                    </table>
                </div>
                <div class="ket">
                    <div class="ket1">
                        <table>
                            <tr>
                                <td>KELAS</td>
                                <td>:</td>
                                <td>VII</td>
                            </tr>
                            <tr>
                                <td>TAHUN AJARAN</td>
                                <td>:</td>
                                <td>2018/2019</td>
                            </tr>
                        </table>
                    </div>

                    <div class="ket1">
                        <table>
                            <tr>
                                <td>KELAS</td>
                                <td>:</td>
                                <td>.................</td>
                            </tr>
                            <tr>
                                <td>TAHUN AJARAN</td>
                                <td>:</td>
                                <td>.................</td>
                            </tr>
                        </table>
                    </div>

                    <div class="ket1">
                        <table>
                            <tr>
                                <td>KELAS</td>
                                <td>:</td>
                                <td>.................</td>
                            </tr>
                            <tr>
                                <td>TAHUN AJARAN</td>
                                <td>:</td>
                                <td>.................</td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="table-nilai">
                    <table>
                        <!-- HEADER -->
                            <tr>
                                <th rowspan="4">No</th>
                                <th rowspan="4">MATA PELAJARAN</th>
                                <th rowspan="4">Aspek Penilaian</th>
                            </tr>
                            <tr>
                                <th colspan="2">Nilai Semester I</th>
                                <th colspan="2">Nilai Semester II</th>
                            </tr>
                            <tr>
                                <th rowspan="2">Angka</th>
                                <th rowspan="2">Predikat</th>
                            </tr>
                            <tr>
                                <th>Angka</th>
                                <th>Predikat</th>
                            </tr>
                        <!-- DATA -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3">1</td>
                                <td rowspan="3">Pendidikan Agaman dan Budi Pekerti</td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3">2</td>
                                <td rowspan="3">Pend. Pancasila dan Kewarganegaraan</td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3">3</td>
                                <td rowspan="3">Bahasa Indonesia</td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3">4</td>
                                <td rowspan="3">Bahasa Inggris</td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3">5</td>
                                <td rowspan="3">Matematika</td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3">6</td>
                                <td rowspan="3">Ilmu Pengetahuan Alam</td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3">7</td>
                                <td rowspan="3">Ilmu Pengetahuan Sosial</td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3">8</td>
                                <td rowspan="3">Seni Budaya</td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3">9</td>
                                <td rowspan="3">Pendidikan Jasmani, Olahraga dan Kesehatan</td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3">10</td>
                                <td rowspan="3">Prakarya</td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->

                        <!-- START -->
                            <tr>
                                <td rowspan="3"></td>
                                <td rowspan="3"><b>Rata-rata Nilai</b></td>
                            </tr>
                            <tr>
                                <td>Pengetahuan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                             <tr>
                                <td>Keterampilan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- END -->
                        

                    </table>
                    <!-- Section Bottom Table -->
                    <div class="wrap-ket-hadir">
                        <table class="ket-hadir sem1">
                            <tr>
                                <td>Ketidak Hadiran</td>
                                <td>Hari</td>
                            </tr>
                            <tr>
                                <td>1. Sakit</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. Izin</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. Tanpat Ket</td>
                                <td></td>
                            </tr>
                        </table>

                        <table class="ket-hadir sem2">
                            <tr>
                                <td>Ketidak Hadiran</td>
                                <td>Hari</td>
                            </tr>
                            <tr>
                                <td>1. Sakit</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. Izin</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. Tanpat Ket</td>
                                <td></td>
                            </tr>
                        </table>

                        <table class="ket-hadir sem3">
                            <tr>
                                <td>Naik Ke</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Kelas .........</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tinggal di</td>
                                <td></td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>

            <div class="section-left section-child">
                <div class="siswa">
                    <div class="table-nilai table-next">
                        <table>
                            <!-- HEADER -->

                                <tr>
                                    <th colspan="2">Nilai Semester I</th>
                                    <th colspan="2">Nilai Semester II</th>
                                </tr>
                                <tr>
                                    <th rowspan="2">Angka</th>
                                    <th rowspan="2" class="predikat">Predikat</th>
                                </tr>
                                <tr>
                                    <th>Angka</th>
                                    <th class="predikat">Predikat</th>
                                </tr>
                            <!-- DATA -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->
                        </table>
                        <!-- Section Bottom Table -->
                        <div class="wrap-ket-hadir">
                            <table class="ket-hadir sem1-child">
                                <tr>
                                    <td>Ketidak Hadiran</td>
                                    <td>Hari</td>
                                </tr>
                                <tr>
                                    <td>1. Sakit</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. Izin</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. Tanpat Ket</td>
                                    <td></td>
                                </tr>
                            </table>

                            <table class="ket-hadir sem2-child">
                                <tr>
                                    <td>Ketidak Hadiran</td>
                                    <td>Hari</td>
                                </tr>
                                <tr>
                                    <td>1. Sakit</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. Izin</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. Tanpat Ket</td>
                                    <td></td>
                                </tr>
                            </table>


                        </div>
                        <table class="ket-hadir sem3 sem4">
                            <tr>
                                <td>Naik Ke</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Kelas .........</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tinggal di</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="siswa">
                    <div class="table-nilai table-next">
                        <table>
                            <!-- HEADER -->

                                <tr>
                                    <th colspan="2">Nilai Semester I</th>
                                    <th colspan="2">Nilai Semester II</th>
                                </tr>
                                <tr>
                                    <th rowspan="2">Angka</th>
                                    <th rowspan="2" class="predikat">Predikat</th>
                                </tr>
                                <tr>
                                    <th>Angka</th>
                                    <th class="predikat">Predikat</th>
                                </tr>
                            <!-- DATA -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->

                            <!-- START -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <!-- END -->
                        </table>
                        <!-- Section Bottom Table -->
                        <div class="wrap-ket-hadir">
                            <table class="ket-hadir sem1-child">
                                <tr>
                                    <td>Ketidak Hadiran</td>
                                    <td>Hari</td>
                                </tr>
                                <tr>
                                    <td>1. Sakit</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. Izin</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. Tanpat Ket</td>
                                    <td></td>
                                </tr>
                            </table>

                            <table class="ket-hadir sem2-child">
                                <tr>
                                    <td>Ketidak Hadiran</td>
                                    <td>Hari</td>
                                </tr>
                                <tr>
                                    <td>1. Sakit</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2. Izin</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3. Tanpat Ket</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <img src="test.png" alt="">  -->
</body>
</html>