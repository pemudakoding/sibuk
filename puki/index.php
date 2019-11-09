<?php
    $koneksi    = mysqli_connect('localhost','root','','sibuk');
    $nis        = mysqli_real_escape_string($koneksi,$_GET['nis']);
    $dataSiswa  = mysqli_fetch_object(mysqli_query($koneksi,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE nis = '$nis' "));
    $dataSekolah= mysqli_fetch_object(mysqli_query($koneksi,"SELECT * FROM sekolah"));
    $dot        = '.............................';


     if($dataSiswa->nama_panggilan == ''){$dataSiswa->nama_panggilan = $dot; } if($dataSiswa->jenis_kelamin == 'Laki-Laki'){$dataSiswa->jenis_kelamin = "Laki-Laki / <strike> Perempuan </strike>"; }else{$dataSiswa->jenis_kelamin = "<strike> Laki-Laki </strike> / Perempuan"; } if($dataSiswa->anak_keberapa == 0 || $dataSiswa->anak_keberapa == ''){$dataSiswa->anak_keberapa = $dot; } if($dataSiswa->jumlah_saudara_kandung == 0 || $dataSiswa->jumlah_saudara_kandung == ''){$dataSiswa->jumlah_saudara_kandung = $dot; } if($dataSiswa->jumlah_saudara_tiri == 0 || $dataSiswa->jumlah_saudara_tiri == ''){$dataSiswa->jumlah_saudara_tiri = $dot; } if($dataSiswa->jumlah_saudara_angkat == 0 || $dataSiswa->jumlah_saudara_angkat == ''){$dataSiswa->jumlah_saudara_angkat = $dot; } if($dataSiswa->anak_yatim == '-' || $dataSiswa->anak_yatim == ''){$dataSiswa->anak_yatim = $dot; } if($dataSiswa->nomor_telepon == '0' || $dataSiswa->nomor_telepon == ''){$dataSiswa->nomor_telepon = $dot; } if($dataSiswa->pernah_dirawat_di == '' || $dataSiswa->pernah_dirawat_di == '-'){$dataSiswa->pernah_dirawat_di = $dot;} if($dataSiswa->tanggal_dan_nomor_sttb == ''){$dataSiswa->tanggal_dan_nomor_sttb = $dot; } if ($dataSiswa->lama_belajar == '') {$dataSiswa->lama_belajar = '..........'; } if($dataSiswa->ijazah_tertinggi_ayah == '-' || $dataSiswa->ijazah_tertinggi_ayah == ''){$dataSiswa->ijazah_tertinggi_ayah = $dot; } if($dataSiswa->ijazah_tertinggi_ibu == '-' || $dataSiswa->ijazah_tertinggi_ibu == '' ){$dataSiswa->ijazah_tertinggi_ibu = $dot; } if($dataSiswa->nama_depan_ayah == '' && $dataSiswa->nama_belakang_ayah == ''){$nama_ayah = $dot; }else{$nama_ayah = $dataSiswa->nama_depan_ayah." ".$dataSiswa->nama_belakang_ayah; } if($dataSiswa->nama_depan_ibu == '' && $dataSiswa->nama_belakang_ibu == ''){$nama_ibu = $dot; }else{$nama_ibu = $dataSiswa->nama_depan_ibu." ".$dataSiswa->nama_belakang_ibu; } if($dataSiswa->penghasilan_perbulan_ayah == ''){$dataSiswa->penghasilan_perbulan_ayah = $dot; } if($dataSiswa->penghasilan_perbulan_ibu == ''){$dataSiswa->penghasilan_perbulan_ibu = $dot; } if($dataSiswa->pekerjaan_ayah == '-' || $dataSiswa->pekerjaan_ayah == ''){$dataSiswa->pekerjaan_ayah = $dot; } if($dataSiswa->pekerjaan_ibu == '-' || $dataSiswa->pekerjaan_ibu == '' ){$dataSiswa->pekerjaan_ibu = $dot; } if($dataSiswa->riwayat_hidup_ayah == ''){$dataSiswa->riwayat_hidup_ayah = $dot; } if($dataSiswa->riwayat_hidup_ibu == ''){$dataSiswa->riwayat_hidup_ibu = $dot; } if($dataSiswa->alamat_rumah_ayah == ''){$dataSiswa->alamat_rumah_ayah = $dot; } if($dataSiswa->alamat_rumah_ibu == ''){$dataSiswa->alamat_rumah_ibu = $dot; } if($dataSiswa->agama_ayah == ''){$dataSiswa->agama_ayah = $dot; }if($dataSiswa->agama_ibu == ''){$dataSiswa->agama_ibu = $dot; } if($dataSiswa->kewarganegaraan_ayah == ''){$dataSiswa->kewarganegaraan_ayah = $dot; } if($dataSiswa->kewarganegaraan_ibu == ''){$dataSiswa->kewarganegaraan_ibu = $dot; } if($dataSiswa->tinggi_siswa == 0){$dataSiswa->tinggi_siswa = ''; } if($dataSiswa->berat_siswa == 0){$dataSiswa->berat_siswa = ''; } if($dataSiswa->nama_depan_wali == '' && $dataSiswa->nama_belakang_wali == ''){$nama_wali = $dot; }else{$nama_wali = $dataSiswa->nama_depan_wali." ".$dataSiswa->nama_belakang_wali; } if($dataSiswa->agama_wali == ""){$dataSiswa->agama_wali = $dot; } if($dataSiswa->kewarganegaraan_wali == ''){$dataSiswa->kewarganegaraan_wali = $dot; } if($dataSiswa->ijazah_tertinggi_wali == ''){$dataSiswa->ijazah_tertinggi_wali = $dot; } if($dataSiswa->pekerjaan_wali == ''){$dataSiswa->pekerjaan_wali = $dot; } if($dataSiswa->pekerjaan_wali == ''){$dataSiswa->pekerjaan_wali = $dot; } if($dataSiswa->penghasilan_perbulan_wali == ''){$dataSiswa->penghasilan_perbulan_wali = $dot; } if($dataSiswa->alamat_rumah_wali == ''){$dataSiswa->alamat_rumah_wali = $dot; } if($dataSiswa->nomor_telepon_wali == 0){$dataSiswa->nomor_telepon_wali = $dot; } if($dataSiswa->jarak_rumah_dari_sekolah == '' || $dataSiswa->jarak_rumah_dari_sekolah == 0){$dataSiswa->jarak_rumah_dari_sekolah = ''; } if($dataSiswa->tanggal_lahir != ''){$dataSiswa->tanggal_lahir = explode('-',$dataSiswa->tanggal_lahir); }switch ($dataSiswa->tanggal_lahir[1]) {case '01': $dataSiswa->tanggal_lahir[1] = 'Januari'; break; case '02': $dataSiswa->tanggal_lahir[1] = 'Februari'; break; case '03': $dataSiswa->tanggal_lahir[1] = 'Maret'; break; case '04': $dataSiswa->tanggal_lahir[1] = 'April'; break; case '05': $dataSiswa->tanggal_lahir[1] = 'Mei'; break; case '06': $dataSiswa->tanggal_lahir[1] = 'Juni'; break; case '07': $dataSiswa->tanggal_lahir[1] = 'Juli'; break; case '08': $dataSiswa->tanggal_lahir[1] = 'Agustus'; break; case '09': $dataSiswa->tanggal_lahir[1] = 'September'; break; case '10': $dataSiswa->tanggal_lahir[1] = 'Oktober'; break; case '11': $dataSiswa->tanggal_lahir[1] = 'November'; break; case '12': $dataSiswa->tanggal_lahir[1] = 'Desember'; break; } if(stristr($dataSiswa->berat_siswa, 'KG') ||stristr($dataSiswa->berat_siswa, 'Kg') || stristr($dataSiswa->berat_siswa, 'kg') ){$dataSiswa->berat_siswa = str_replace('KG', '', $dataSiswa->berat_siswa); $dataSiswa->berat_siswa = str_replace('Kg', '', $dataSiswa->berat_siswa); $dataSiswa->berat_siswa = str_replace('kg', '', $dataSiswa->berat_siswa); } if(stristr($dataSiswa->tinggi_siswa, 'CM') ||stristr($dataSiswa->tinggi_siswa, 'Cm') || stristr($dataSiswa->tinggi_siswa, 'cm') ){$dataSiswa->tinggi_siswa = str_replace('CM', '', $dataSiswa->tinggi_siswa); $dataSiswa->tinggi_siswa = str_replace('Cm', '', $dataSiswa->tinggi_siswa); $dataSiswa->tinggi_siswa = str_replace('cm', '', $dataSiswa->tinggi_siswa); } if(stristr($dataSiswa->jarak_rumah_dari_sekolah, 'KM') ||stristr($dataSiswa->jarak_rumah_dari_sekolah, 'Km') || stristr($dataSiswa->jarak_rumah_dari_sekolah, 'km') ){$dataSiswa->jarak_rumah_dari_sekolah = str_replace('KM', '', $dataSiswa->jarak_rumah_dari_sekolah); $dataSiswa->jarak_rumah_dari_sekolah = str_replace('Km', '', $dataSiswa->jarak_rumah_dari_sekolah); $dataSiswa->jarak_rumah_dari_sekolah = str_replace('km', '', $dataSiswa->jarak_rumah_dari_sekolah); }
     
     if($dataSiswa->agama_wali == 'Pilih Agama'){
         $dataSiswa->agama_wali = $dot;
     }

    if($dataSiswa->golongan_darah == 'Pilih Golongan Darah'){
        $dataSiswa->golongan_darah = '';
    }




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
                        <td><p><?= $dataSiswa->nama_depan." ".$dataSiswa->nama_belakang ?></p></td>
                    </tr>
                    <tr>
                        <td><p>NIS/NISN</p></td>
                        <td><p>:</p></td>
                        <td><p><?= $dataSiswa->nis. "/" . $dataSiswa->nisn ?></p></td>
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
                            <td><p><?= $dataSiswa->nama_depan." ".$dataSiswa->nama_belakang ?></p></td>
                        </tr>
                        <tr class="nested-data">
                            <td><p>b.</p></td>
                            <td><p>Nama Panggilan</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->nama_panggilan ?></p></td>
                        </tr> 
                        <!--  END NESTED --> 
                    </table>

                    <table class="default-table ">
                        <tr>
                            <td><p>2.</p></td>
                            <td><p>Jenis Kelamin</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->jenis_kelamin; ?></p></td>
                        </tr>
                        <tr class="capitalize">
                            <td><p>3.</p></td>
                            <td><p>Tempat Dan Tanggal Lahir</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->tempat_lahir.", ".$dataSiswa->tanggal_lahir[0]."-".$dataSiswa->tanggal_lahir[1]."-".$dataSiswa->tanggal_lahir[2]; ?></p></td>
                        </tr>
                        <tr>
                            <td><p>4.</p></td>
                            <td><p>Agama</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->agama ?></p></td>
                        </tr>

                        <tr>
                            <td><p>5.</p></td>
                            <td><p>Kewarganegaraan</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->kewarganegaraan ?></p></td>
                        </tr>

                        <tr>
                            <td><p>6.</p></td>
                            <td><p>Anak Keberapa</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->anak_keberapa ?></p></td>
                        </tr>

                        <tr>
                            <td><p>7.</p></td>
                            <td><p>Jumlah Saudara Kandung</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->jumlah_saudara_kandung ?></p></td>
                        </tr>

                        <tr>
                            <td><p>8.</p></td>
                            <td><p>Jumlah Saudara Tiri</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->jumlah_saudara_tiri ?></p></td>
                        </tr>

                        <tr>
                            <td><p>9.</p></td>
                            <td><p>Jumlah Saudara Angkat</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->jumlah_saudara_angkat ?></p></td>
                        </tr>

                        <tr>
                            <td><p>10.</p></td>
                            <td><p>Anak Yatim/Piatu/Yatim Piatu</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->anak_yatim ?></p></td>
                        </tr>

                        <tr>
                            <td><p>11.</p></td>
                            <td><p>Bahasa Sehari-hari</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->bahasa_sehari_hari ?></p></td>
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
                            <td><p><?= $dataSiswa->alamat ?></p></td>
                        </tr>
                        <tr>
                            <td><p>13.</p></td>
                            <td><p>Nomor Telepon</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->nomor_telepon ?></p></td>
                        </tr>
                        <tr>
                            <td><p style="position: relative; top: -18px;">14.</p></td>
                            <td><p style="position: relative; top: -18px;">Alamat Tersebut</p></td>
                            <td><p style="position: relative; top: -18px;">:</p></td>
                            <td style="position: relative; top: 2px;">

                            	<?php
                                    if($dataSiswa->alamat_tersebut == 'Bersama orang tua' || $dataSiswa->alamat_tersebut == 'Bersama Orang Tua' ):
                                ?>

                                <div class="box"><b> √ </b></div><p style="float: left; margin-left: 5px;">a. Tempat Tinggal Orang Tua</p><div style="clear: both;"></div>
                                <div class="box"></div><p style="float: left; margin-left: 5px;">b. Menumpang pada orang lain</p><div style="clear: both;"></div>
                                <div class="box"></div><p style="float: left; margin-left: 5px;">c. Di Asrama</p><div style="clear: both;"></div></td>

                                <?php endif ?>

                                <?php
                                    if($dataSiswa->alamat_tersebut == 'Lainnya' || $dataSiswa->alamat_tersebut == '' || $dataSiswa->alamat_tersebut == '-'  || $dataSiswa->alamat_tersebut != 'Bersama orang tua' ):
                                ?>

                                <div class="box"></div><p style="float: left; margin-left: 5px;">a. Tempat Tinggal Orang Tua</p><div style="clear: both;"></div>
                                <div class="box"></div><p style="float: left; margin-left: 5px;">b. Menumpang pada orang lain</p><div style="clear: both;"></div>
                                <div class="box"></div><p style="float: left; margin-left: 5px;">c. Di Asrama</p><div style="clear: both;"></div></td>

                                <?php endif ?>
                                
                               
                                



                        </tr>

                        <tr style="position: relative; top: 5px;">
                            <td><p>15.</p></td>
                            <td><p>Jarak dari Tempat Tinggal ke <br>Sekolah</p></td>
                            <td><p>:</p></td>
                            <td> <div class="box" style="font-size: 0.8em;"><?= $dataSiswa->jarak_rumah_dari_sekolah ?></div><p> Km</p></td>
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
                                <div class="box"><span style="font-size: 10px;"><?= $dataSiswa->golongan_darah ?></span></div>
                                <p style="float: left; margin-left: 5px;"><?= $dot ?></p>
                                <div style="clear: both;"></div>
                        </tr>   

                        <tr>
                            <td><p>18.</p></td>
                            <td><p>Penyakit yang pernah diderita</p></td>
                            <td><p>:</p></td>
                            <td style="position: relative; top: 5px; display: flex; align-items: center;">
                            <?php
                                if($dataSiswa->penyakit_yang_pernah_diderita == 'TBC'): 
                            ?>

                                <div class="box"><b>√</b></div><p style="float: left; margin-right: 5px; font-size: 10px">TBC</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">CACAR</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">LEVER</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">Malaria</p>

                            <?php endif; ?>

                            <?php
                                if($dataSiswa->penyakit_yang_pernah_diderita == 'Cacar'): 
                            ?>

                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">TBC</p>
                                <div class="box"><b>√</b></div><p style="float: left; margin-right: 5px; font-size: 10px">CACAR</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">LEVER</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">MALARIA</p>

                            <?php endif?>

                            <?php
                                if($dataSiswa->penyakit_yang_pernah_diderita == 'Lever'): 
                            ?>

                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">TBC</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">CACAR</p>
                                <div class="box"><b>√</b></div><p style="float: left; margin-right: 5px; font-size: 10px">LEVER</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">MALARIA</p>

                            <?php endif?>

                            <?php
                                if($dataSiswa->penyakit_yang_pernah_diderita == 'Malaria'): 
                            ?>

                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">TBC</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">CACAR</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">LEVER</p>
                                <div class="box"><b>√</b></div><p style="float: left; margin-right: 5px; font-size: 10px">MALARIA</p>

                            <?php endif ?>

                            <?php
                                if($dataSiswa->penyakit_yang_pernah_diderita == '-' || $dataSiswa->penyakit_yang_pernah_diderita == ''): 
                            ?>

                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">TBC</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">CACAR</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">LEVER</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">MALARIA</p>

                            <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p>dan dirawat di</p></td>
                            <td><p>:</p></td>
                            <td><p style="margin-top: 5px; font-size: 10px;"><?= $dataSiswa->pernah_dirawat_di ?></p></td>
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
                                <div class="box"><span style="font-size: 10px;"><?= $dataSiswa->tinggi_siswa ?></span></div><p style="float: left; margin-right: 5px; font-size: 10px">Cm</p>
                                <div class="box"><span style="font-size: 10px;"><?= $dataSiswa->berat_siswa ?></span></div><p style="float: left; margin-right: 5px; font-size: 10px">Kg</p>
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
                            <?php
                                if($dataSiswa->asal_sekolah == '' || $dataSiswa->asal_sekolah == '-'):
                            ?>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">SD</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">MI</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">SEDERAJAT</p>
                            <?php endif; ?>

                            <?php
                                if($dataSiswa->asal_sekolah == 'SD'):
                            ?>
                                <div class="box"><b>√</b></div><p style="float: left; margin-right: 5px; font-size: 10px">SD</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">MI</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">SEDERAJAT</p>
                            <?php endif ?>

                            <?php
                                if($dataSiswa->asal_sekolah == 'MI'):
                            ?>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">SD</p>
                                <div class="box"><b>√</b></div><p style="float: left; margin-right: 5px; font-size: 10px">MI</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">SEDERAJAT</p>
                            <?php endif ?>

                            <?php
                                if($dataSiswa->asal_sekolah == 'Sederajatnya'):
                            ?>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">SD</p>
                                <div class="box"></div><p style="float: left; margin-right: 5px; font-size: 10px">MI</p>
                                <div class="box"><b>√</b></div><p style="float: left; margin-right: 5px; font-size: 10px">SEDERAJAT</p>
                            <?php endif; ?>

                           



                            </td>
                        </tr>

                        <tr class="nested-data">
                            <td style="padding-top: 5px;"><p>b.</p></td>
                            <td style="padding-top: 5px;"><p>Tanggal dan Nomor STTB</p></td>
                            <td style="padding-top: 5px;"><p>:</p></td>
                            <td style="padding-top: 5px;"><p><?= $dataSiswa->tanggal_dan_nomor_sttb ?></p></td>
                        </tr> 

                         <tr class="nested-data">
                            <td style="padding-top: 5px;"><p>C.</p></td>
                            <td style="padding-top: 5px;"><p>Lama Belajar</p></td>
                            <td style="padding-top: 5px;"><p>:</p></td>
                            <td style="padding-top: 5px;"><p><?= $dataSiswa->lama_belajar ?>  </p></td>
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
                            <td><p><?= $nama_ayah ?></p></td>
                            <td><p><?= $nama_ibu?></p></td>
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
                            <td><p><?= $dataSiswa->agama_ayah ?></p></td>
                            <td><p><?= $dataSiswa->agama_ibu ?></p></td>
                        </tr>  
                        <tr>
                            <td><p>26</p></td>
                            <td><p>Kewarganegaraan</p></td>
                            <td><p><?= $dataSiswa->kewarganegaraan_ayah ?></p></td>
                            <td><p><?= $dataSiswa->kewarganegaraan_ibu ?></p></td>
                        </tr>
                        <tr>
                            <td><p>27</p></td>
                            <td><p>Ijazah Tertinggi</p></td>
                            <td><p><?= $dataSiswa->ijazah_tertinggi_ayah?></p></td>
                            <td><p><?= $dataSiswa->ijazah_tertinggi_ibu ?></p></td>
                        </tr>
                        <tr>
                            <td><p>28</p></td>
                            <td><p>Pekerjaan</p></td>
                            <td><p><?=$dataSiswa->pekerjaan_ayah?></p></td>
                            <td><p><?=$dataSiswa->pekerjaan_ibu?></p></td>
                        </tr>
                        <tr>
                            <td><p>29</p></td>
                            <td><p>Penghasilan/bulan</p></td>
                            <td><p><?= $dataSiswa->penghasilan_perbulan_ayah ?></p></td>
                            <td><p><?= $dataSiswa->penghasilan_perbulan_ibu ?></p></td>
                        </tr>
                        <tr>
                            <td><p>30</p></td>
                            <td><p>Alamat rumah dan nomor Telepon</p></td>
                            <td><p><?= $dataSiswa->alamat_rumah_ayah ?></p></td>
                            <td><p><?= $dataSiswa->alamat_rumah_ibu ?></p></td>
                        </tr>
                        <tr>
                            <td><p>31</p></td>
                            <td><p>Masih hidup/meninggal dunia</p></td>
                            <td><p><?= $dataSiswa->riwayat_hidup_ayah ?></p></td>
                            <td><p><?= $dataSiswa->riwayat_hidup_ibu ?></p></td>
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
                            <td><p><?= $nama_wali; ?></p></td>
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
                            <td><p><?= $dataSiswa->agama_wali ?></p></td>
                        </tr>

                        <tr>
                            <td><p>35.</p></td>
                            <td><p>Kewarganegaraan</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->kewarganegaraan_wali ?></p></td>
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
                            <td><p><?= $dataSiswa->ijazah_tertinggi_wali ?></p></td>
                        </tr>

                        <tr>
                            <td><p>38.</p></td>
                            <td><p>Pekerjaan</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->pekerjaan_wali ?></p></td>
                        </tr>

                        <tr>
                            <td><p>39.</p></td>
                            <td><p>Penghasilan/bulan</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->penghasilan_perbulan_wali ?></p></td>
                        </tr>

                        <tr>
                            <td><p>40.</p></td>
                            <td><p>Alamat rumah</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->alamat_rumah_wali ?></p></td>
                        </tr>
                        <tr>
                            <td><p>41.</p></td>
                            <td><p>Nomor Telepon</p></td>
                            <td><p>:</p></td>
                            <td><p><?= $dataSiswa->nomor_telepon_wali ?></p></td>
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
                    <?php if ($dataSiswa->foto_siswa !== ''): ?>
                        <img src="http://sibuk.com/asset/img/foto_siswa/<?= $dataSiswa->foto_siswa ?>" class="foto" style="object-fit: cover;">
                    <?php endif ?>
                </div>
                <div class="foto foto-bawah">
                     <?php if ($dataSiswa->foto_siswa !== ''): ?>
                        <img src="http://sibuk.com/asset/img/foto_siswa/<?= $dataSiswa->foto_siswa ?>" class="foto" style="object-fit: cover;">
                    <?php endif ?>
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
                        <td><p>&nbsp;<?= $dataSiswa->nama_depan." ".$dataSiswa->nama_belakang ?></p></td>
                    </tr>
                    <tr>
                        <td><p>&nbsp;NOMOR INDUK</p></td>
                        <td><p>&nbsp;:</p></td>
                        <td><p>&nbsp;<?= $dataSiswa->nisn ?> / <?= $dataSiswa->nis ?></p></td>
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