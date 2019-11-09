<?php

    

    require_once('../core/init.php');
    require_once('../asset/library/phpqrcode/qrlib.php');

    if(!isset($_SESSION['psb'])){
        header("location: $url/siswa/");
    }

    $sekolah = mysqli_fetch_assoc(data_sekolah());
    $day   = date('j');
    $month = date('m');

    switch ($month) {
        case '01': $month='Januari';
        break;
        case '02': $month='Februari';
        break;
        case '03': $month='Maret';
        break;
        case '04': $month='April';
        break;
        case '05': $month='Mei';
        break;
        case '06': $month='Juni';
        break;
        case '07': $month='Juli';
        break;
        case '08': $month='Agustus';
        break;
        case '09': $month='September';
        break;
        case '10': $month='Oktober';
        break;
        case '11': $month='November';
        break;
        case '12': $month='Desember';
        break;
    }
    

    QRcode::png("NO: {$_SESSION['psb']['nis']}\nPENCETAK: {$_SESSION['psb']['user']['nama_depan']} {$_SESSION['psb']['user']['nama_belakang']}",'../asset/img/qrcode/SIBUK-'.$_SESSION['psb']['nis'].'.png','L',3.36,2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CETAK SURAT PSB</title>
    <style>
        *{
            margin:0;
            padding:0;
            font-family: 'Times New Roman';
        }
        .header-ket{
            display:flex;
            justify-content:space-between;
            /* border:1px solid black; */
        }

        body{
            width:210mm;
            height:297mm;
            /* border:2px solid black; */
        }

        .left-logo{
            padding-left:80px; 
            /* border:1px solid black; */
        }

        .left-logo img {

            width: 46px !important;

        }
        .right-logo{
            padding-right:80px;
            /* border:1px solid black; */
        }
        .center-content{
            /* border:1px solid black; */
            width:100%;
            text-align:center;
        }

        .address-school p{
            font-size:0.7em;
            text-align:center;
        }
        .italic{
            font-style: italic;
        }
        hr{
            margin-top:5px;
            border: 2px solid black;;
        }
        .sub-header{
            display:flex;
            flex-direction:column;
            align-items:center;
            margin-top:10px;
        }
        .header-text .left-content p{
            background: yellowgreen;
            padding:5px;
            font-weight:bolder;
            font-family:sans-serif;
            position:relative;
            left:320px;
            bottom:20px;
            color:white;
            text-align:center;
        }
        .header-text .right-content div{
            width:110px;
            height:110px;
            border:2px solid yellowgreen;
            position:relative;
            left:320px;
            bottom:20px;
        }
        .header-text h2{
            text-align:center;
        }
        .main-data table{
            position:relative;
            bottom:100px;
        }
        .main-data table tr td:first-child{
            padding-right:5px;
        }
        .main-data table tr td:nth-child(2){
            padding-right:10px;
        }
        .main-data table tr td:nth-child(3){
            padding-right:5px;
        }
        .main-data table tr td{
            text-transform:capitalize;
            font-size:1.2em;
        }
        .ttd{
            display:flex;
            justify-content:flex-end;
            text-align:center;
            font-weight:bold;
            font-size:1.2em;
            position:relative;
            bottom:90px;
        }
        .cut{
            border-top: 2px dashed darkred;
            display:flex;
        }
        .main-cut{
            width:50%;
            margin-top:20px;
        }
        .main-cut .header-cut{
            border:1px solid black;
            padding:10px;
            font-weight:bold;
            text-align:center;
        }
        .main-cut .keterangan{
            border:1px solid black;
            height:100px;
        }
        .main-cut:nth-child(2) .keterangan{
            
            display:flex;
            justify-content:center;
            align-items:center;
            font-weight:bold;
            font-family:sans-serif;
        }
        .main-cut:nth-child(2) .keterangan p{
            font-family:sans-serif;
            font-size:1.5em;
        }
    </style>

</head>
<body onload="window.print()">

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
    
    <hr>
    <div class="sub-header">
        <div class="header-text">
            <h2>FORMULIR PENDAFTARAN</h2>
            <h2>SISWA BARU</h2>
        </div>
        <div class="header-text">
            <div class="left-content">
                <p>NO: <?= $_SESSION['psb']['nis'] ?></p>
            </div>
            <div class="right-content">
                <div><img src="../asset/img/qrcode/SIBUK-<?= $_SESSION['psb']['nis'] ?>.png"></div>
            </div>
        </div>
    </div>
    <div class="main-data">
        <table>
            <tr>
                <td>1.</td>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['nama_lengkap'] ?></td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['ttl'] ?></td>
            </tr>
            <tr>
                <td>3.</td>
                <td>NIK</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['nik'] ?></td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['jk'] ?></td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Agama</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['agama'] ?></td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Sekolah Asal</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['sekolah'] ?></td>
            </tr>
            <tr>
                <td>7.</td>
                <td>Nama Ayah</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['nama_ayah'] ?></td>
            </tr>
            <tr>
                <td>8.</td>
                <td>Nama Ibu</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['nama_ibu'] ?></td>
            </tr>
            <tr>
                <td>9.</td>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['alamat'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Kecamatan</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['kecamatan'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Kelurahan</td>
                <td>:</td>
                <td><?= $_SESSION['psb']['kelurahan'] ?></td>
            </tr>
        </table>
    </div>
    <div class="ttd">
        <p>Palu, <?= $day ?> <?= $month ?> <?= date('Y') ?> <br> <br> <br> Wali Murid</p>
    </div>
    <div class="cut">
        <div class="main-cut">
            <div class="header-cut">
                <h4>KETERANGAN</h4>
            </div>
            <div class="keterangan">
            </div>
        </div>
        <div class="main-cut">
            <div class="header-cut">
                <h4>NO PENDAFTARAN</h4>
            </div>
            <div class="keterangan">
                <p><?= $_SESSION['psb']['nis'] ?></p>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php

if(isset($_SESSION['psb'])){
    unset($_SESSION['psb']);
}

?>