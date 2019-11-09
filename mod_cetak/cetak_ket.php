<?php

    require_once "../core/init.php";
    
    $user = mysqli_fetch_assoc(cek_user($_SESSION['username']));
    if(!isset($_SESSION['cetak_tambah']))
    {
        if(!isset($_GET['ssiwa']) || !isset($_GET['data_pers']))
        {
            header("location: $url");
        }else{

            function dash_rem($string)
            {
                $d_nama = $string;
                $d_nama = strtolower(preg_replace('/[(\-|\s|\')]+/',' ',$d_nama));

                return $d_nama;
            }

            //Section Siswa
            $siswa = explode(',',strip_tags($_GET['siswa']));
            $nama_siswa  = dash_rem($siswa[0]);
            $ttl_siswa   = strip_tags(dash_rem($siswa[1]).","." ".$siswa[2]);
            $nisn_siswa  = strip_tags($siswa['3']);
            $kelas_siswa = mysqli_fetch_assoc(detail_data_kelas(mysqli_real_escape_string($koneksi,strip_tags($siswa[4]))));
            $alamat_siswa= dash_rem(strip_tags($siswa[5]));
            $nis_siswa   = strip_tags($siswa[6]);

            //Section Orang Tua/Wali
            $orang_tua      = explode(',',strip_tags($_GET['orta']));
            $nama_orta      = dash_rem($orang_tua[0]);
            $pekerjaan_orta = dash_rem($orang_tua[1]);
            $alamat_orta    = dash_rem($orang_tua[2]);

            //Section Sekolah
            $sekolah    = explode(',',strip_tags($_GET['skail']));
            $nama_skail = strtoupper(dash_rem($sekolah[0]));
            $alasan     = dash_rem($sekolah[1]);

            if(add_history_print($nis_siswa,$nisn_siswa,$user['id_user'])){
                unset($_SESSION['cetak_tambah']);
            }
        }
        
    }else{

        $nama_siswa       = $_SESSION['cetak_tambah']['nama_siswa'];
        $ttl_siswa        = $_SESSION['cetak_tambah']['ttl'];
        $nisn_siswa       = $_SESSION['cetak_tambah']['nisn'];
        $kelas_siswa      = mysqli_fetch_assoc(detail_data_kelas(mysqli_real_escape_string($koneksi,strip_tags($_SESSION['cetak_tambah']['kelas']))));
        $alamat_siswa     = $_SESSION['cetak_tambah']['alamat'];

        $nama_orta        = $_SESSION['cetak_tambah']['nama_pemohon'];
        $pekerjaan_orta   = $_SESSION['cetak_tambah']['pekerjaan_pemohon'];
        $alamat_orta      = $_SESSION['cetak_tambah']['alamat_pemohon'];

        $nama_skail       = $_SESSION['cetak_tambah']['sekolah'];
        $alasan           = $_SESSION['cetak_tambah']['alasan'];

        
        
        if(add_history_print($_SESSION['cetak_tambah']['nis'],$nisn_siswa,$user['id_user'])){
            unset($_SESSION['cetak_tambah']);
        }
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
                <h4>SURAT KETERANGAN PINDAH SEKOLAH</h4>
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
            <div class="section-data">
                <p>Sesuai Surat Permohonan Orang Tua/Wali</p>

                <table id="pemohon">
                    <tr>
                        <td>Nama</td><td>:</td><td><?= $nama_orta ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td><td>:</td><td><?= $pekerjaan_orta ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td><td>:</td><td><?= $alamat_orta ?></td>
                    </tr>
                </table>
            </div>
            <div class="section-data  ket-per">
                <p>Telah mengajukan permohonan pindah kesekolah <span class="italic">"<?= $nama_skail ?>"</span>
                   dengan alasan <span class="italic alasan"><?= $alasan ?></span>
                </p>
                <p>Bersama ini pula dilampirkan surat permohonan Pindah Sekolah dari Orang tua/wali siswa
                    yang bersangkutan
                </p>
                <p>Demikian surat keterangan pindah sekolah ini dibuat untuk digunakan sebagaimana mestinya</p>
                <p id="catatan" class="italic"><span>CATATAN: Setelah surat mutasi ini dikeluarkan, maka yang bersangkutan 
                    tidak dapat diterima kembali pada sekolah ini.</span></p>
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