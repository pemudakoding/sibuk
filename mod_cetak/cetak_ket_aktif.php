<?php
    require_once('../core/init.php');

    if(isset($_SESSION['username'])){
        function dash_rem($string)
            {
                $d_nama = $string;
                $d_nama = strtolower(preg_replace('/[(\-|\s|\')]+/',' ',$d_nama));

                return $d_nama;
            }

            //Section Siswa
            $siswa = explode(',',strip_tags($_GET['siswa']));
            $nama_siswa  = dash_rem($siswa[0]);
            
            $tanggal 	 = explode('-',strip_tags($siswa[2]));         
            switch ($tanggal[1]) {
				case '01': $tanggal[1]='Januari';
				break;
				case '02': $tanggal[1]='Februari';
				break;
				case '03': $tanggal[1]='Maret';
				break;
				case '04': $tanggal[1]='April';
				break;
				case '05': $tanggal[1]='Mei';
				break;
				case '06': $tanggal[1]='Juni';
				break;
				case '07': $tanggal[1]='Juli';
				break;
				case '08': $tanggal[1]='Agustus';
				break;
				case '09': $tanggal[1]='September';
				break;
				case '10': $tanggal[1]='Oktober';
				break;
				case '11': $tanggal[1]='November';
				break;
				case '12': $tanggal[1]='Desember';
				break;
			}
			$ttl_siswa   = strip_tags(dash_rem($siswa[1]).", ".$tanggal[0].'-'.$tanggal[1].'-'.$tanggal[2]);    
            $nisn_siswa  = strip_tags($siswa['3']);
            $kelas_siswa = mysqli_fetch_assoc(detail_data_kelas(mysqli_real_escape_string($koneksi,strip_tags($siswa[4]))));
            $alamat_siswa= dash_rem(strip_tags($siswa[5]));
    }
    $sekolah = mysqli_fetch_assoc(data_sekolah());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type='text/css' media="print" >
        @page{
            margin:0;
            size: auto;
        }
        
    </style>
    <link rel="stylesheet" href="<?= $url ?>/asset/css/cetak-pindah.css">
</head>
<!-- onload="window.print()" -->
<body onload="window.print()">

    <div class="container-ket">
        <!-- HEADER -->
        <div class="header-ket">
            <div class="left-logo">
                <img src="<?= $url ?>/asset/img/foto_cetak/kotapalu.png" width="60px;">
            </div>
            <div class="center-content">
                <h4>PEMERINTAH KOTA PALU
                    <br>
                    DINAS PENDIDIKAN DAN KEBUDAYAAN
                </h4>

                <h2><?= $sekolah['nama_sekolah'] ?></h2>

                <h5><?= $sekolah['status_sekolah'] ?></h5>
            </div>
            <div class="right-logo">
                <img src="<?= $url ?>/asset/img/foto_cetak/tutwuri.png" width="60px;">
            </div>
        </div>
        <div class="address-school">
            <p><?= "{$sekolah['alamat_sekolah']} Telp {$sekolah['no_telp_sekolah']} 
                   E-mail {$sekolah['email_sekolah']} Web {$sekolah['web_sekolah']} " ?></p>
        </div>
        <!-- END HEADER -->
        <hr>
        <!-- SECTION MAIN -->
        <main>
            <div class="ket">
                <h4>SURAT KETERANGAN</h4>
                <span>Nomor:</span><span>/</span><span>/421.3/Dikbud</span>
            </div>
            <div class="section-data">
                <p>Yang Bertanda tangan dibawah ini Kepala <?= $sekolah['nama_sekolah'] ?>,
                Kecamatan <?= $sekolah['kecamatan'] ?>,Provinsi <?= $sekolah['provinsi']?>. Menerangkan bahwa :
                </p>

                <table>
                    <tr>
                        <td>Nama</td><td>:</td><td><?= $nama_siswa ?></td>          
                    </tr>
                    <tr>
                        <td>Tempat Tanggal Lahir</td><td>:</td><td><?= $ttl_siswa ?></td>
                    </tr>
                    <tr>
                        <td>NISN</td><td>:</td><td><?= $nisn_siswa ?> </td>
                    </tr>
                    <tr>
                        <td>Kelas</td><td>:</td><td><?= $kelas_siswa['kelas'].'/'.$kelas_siswa['nama_kelas'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td><td>:</td><td><?= $alamat_siswa ?></td>
                    </tr>
                </table>
            </div>
            
            <div class="section-data  ket-per">
                <p>Benar bahwa siswa tersebut diatas adalah siswa <?=$sekolah['nama_sekolah']?>, dan <b>masih aktif mengikuti kegiatan belajar.</b></p>
                
                <br>
                <p>Demikian surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.</p>
            </div>
            <div class="section-data section-kepsek">
                <div class="wrap-kepsek">
                    <p id="ket-waktu"><span><?= $sekolah['kota_sekolah'] ?>,</span> <?= date('F Y'); ?><br>Kepala Sekolah</p>
                    <p><b><?= $sekolah['nama_kepsek']?></b>
                        <br>
                        <?= $sekolah['jabatan_kepsek'] ?>
                        <br>
                    NIP: <?= $sekolah['nip_kepsek'] ?>
                    </p>
                </div>
            </div>
        </main>
    </div>
    

</body>
</html>
