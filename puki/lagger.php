<?php
    require_once('../core/init.php');
    
    $nis = $_GET['nis'];
    $siswa = mysqli_query($koneksi,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE status_pendidikan = 'Aktif' AND kelas.kelas = '8' AND siswa.nis = '$nis' ");
    $siswa = mysqli_fetch_assoc($siswa);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BAPAK KAO</title>
    <link rel="stylesheet" href="lagger.css">

</head>
<body>
    <div class="profil">
        <div class="foto">
            <?php if($siswa['foto_siswa'] != ''):?>
            <img src="http://sibuk.com/asset/img/foto_siswa/<?= $siswa['foto_siswa'] ?>"  style="object-fit: cover;width:3cm;height:4cm;">
            <?php endif?>
        </div>
        <div class="main-data">
            <div class="heading">
                <h4>CATATAN HASIL BELAJAR SISWA SEKOLAH MENENGAN PERTAMA (SMP)</h4>
            </div>
            <div class="data">
                <table>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td><?= $siswa['nama_depan']." ".$siswa['nama_belakang'] ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $siswa['kelas']." ".$siswa['nama_kelas'];?></td>
                    </tr>
                    <tr>
                        <td>No Induk</td>
                        <td>:</td>
                        <td><?= $siswa['nis'] ?></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $siswa['nisn'] ?></td>
                    </tr>
                    
                </table>
                <table>
                    <tr>
                        <td>No Urut</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tahun Pelajaran</td>
                        <td>:</td>
                        <td>2018/2019</td>
                    </tr>
                    <tr>
                        <td>Program Study</td>
                        <td>:</td>
                        <td><?= $siswa['program_study'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        
        <table>
            <tr>
                <th rowspan="3">No</th>
                <th rowspan="3">Komponen</th>
            </tr>
            <tr>
                <th colspan="4">Semester 1</th>
                <th colspan="4">Semester 2</th>
            </tr>
            <tr>
                <th>KKM</th>
                <th>Angka</th>
                <th>Huruf</th>
                <th>DKB</th>
                <th>KKM</th>
                <th>Angka</th>
                <th>Huruf</th>
                <th>DKB</th>
            </tr>
            <tr>
                <td>A.</td>
                <td>Program Umum Kelas VII,VIII,IX</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Pendidikan Agama</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Pendidikan Kewarganegaraan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Bahasa Indonesia</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Bahasa inggris</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5.</td>
                <td>matematika</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6.</td>
                <td>ilmu pengetahuan alam</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7.</td>
                <td>ilmu pengetahuan sosial</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8.</td>
                <td>seni budaya</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9.</td>
                <td>pend. jasmani, olahraga & kesehatan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>10.</td>
                <td>Teknologi Informasi dan Komunikasi</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>11.</td>
                <td>Keterampilan/Bahasa Asing <br> .............................................</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <th>B</th>
                <th>MUATAN LOKAL</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            
            <tr>
                <td>1.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            

            <tr>
                <th colspan="2">Pengembangan diri</th>
                <th colspan="4">Keterangan</th>
                <th colspan="4">Keterangan</th>
            </tr>
        </table>

        <table>
            <tr>
                <th rowspan="6">A. Kegiatan <br> Ekstrakulikuler</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th rowspan="6">B. Keikut Sertaan <br> dalam organisasi/ <br>Kegiatan di <br>Sekolah</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th rowspan="11">Ahlak  Mulia <br>& Kepribadian</th>
            </tr>
            <tr>
                <td>1. Kedisiplinan</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2. Kebersihan</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3. Kesehatan</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4. Tanggung Jawab</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5. Sopan Santun</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6. Percaya Diri</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7. Kompetitif</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8. Hubungan Sosial</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9. Kejujuran</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>10. Pelaksaan Ibadah</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th rowspan="4">Ketidak Hadiran</th>
            </tr>
            <tr>
                <td>1. Karena Sakit</td>
                <th>.......................... Hari</th>
                <th>.......................... Hari</th>
            </tr>
            <tr>
                <td>2. Dengan Izin</td>
                <th>.......................... Hari</th>
                <th>.......................... Hari</th>
            </tr>
            <tr>
                <td>3. Tanpa Keterangan</td>
                <th>.......................... Hari</th>
                <th>.......................... Hari</th>
            </tr>
            
            <tr>
                <td colspan="2" style="padding-left:10px">Berdasarkan hasil yang dicapai pada <br> Semester 1 dan Semester 2, maka siswa ini ditetapkan</td>
                <td colspan="2" style="padding-left:10px">Naik/Tidak Naik*) &nbsp;&nbsp; Tanggal:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20 <br> Naik/Tidak Naik*) &nbsp;&nbsp; Tanggal:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp20</td>
            </tr>
        </table>
    </div>
</body>
</html>
