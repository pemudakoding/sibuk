<?php
    require_once('../core/init.php');
    
    $siswa = mysqli_query($koneksi,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE status_pendidikan = 'Aktif' AND kelas.kelas = '8' ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INI KLAPPER</title>
    <link rel="stylesheet" href="klapper.css">
</head>
<body>
    
    <div class="container">

        <table>
            <thead>
                <tr>
                    <th colspan="11"><h3>BUKU KLAPPER SISWA <br>SMPN 15 PALU</h3></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th rowspan="2" colspan="2">Nomor</th>
                </tr>
                <tr>
                    <th rowspan="2" colspan="1">Nama Siswa</th>
                    <th rowspan="2" colspan="1">L/P</th>
                    <th rowspan="2" colspan="1">Tempat Tanggal Lahir</th>
                    <th rowspan="2" colspan="1">Nama Orang Tua</th>
                    <th rowspan="1" colspan="2">MASUK</th>
                    <th rowspan="2" >Tahun Keluar</th>
                    <th rowspan="2" >Alamat</th>
                    <th rowspan="2" >Ket</th>
                </tr>

                <tr>
                    <th colspan="1">Urut</th>
                    <th colspan="1">NIS/NISN</th>
                    <th colspan="1">Tahun</th>
                    <th colspan="1">Kelas</th>
                </tr> 
                <?php $i=1; while($row = mysqli_fetch_assoc($siswa)): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['nis'] ?> / <?= $row['nisn'] ?></td>
                    <td><?= $row['nama_depan']." ".$row['nama_belakang'] ?></td>
                    <td><?= substr($row['jenis_kelamin'],0,1) ?></td>
                    <td><?= strtoupper($row['tempat_lahir']).", ".$row['tanggal_lahir'] ?></td>
                    <td>
                        <?php 
                            $orangtua = '';
                            if($row['nama_depan_ayah'] == ''){
                                $orangtua = $row['nama_depan_ibu']." ".$row['nama_belakang_ibu'];
                            }else{
                                $orangtua = $row['nama_depan_ayah']." ".$row['nama_belakang_ayah'];
                            }
                            echo $orangtua;
                        ?>
                    </td>
                    <td><?= $row['tahun_masuk_siswa'] ?></td>
                    <td><?= $row['kelas'].$row['nama_kelas'] ?></td>
                    <td></td>
                    <td><?= $row['alamat'] ?></td>
                    <td></td>
                </tr>
                <?php $i++; endwhile; ?>
            </tbody>
            
        </table>
    </div>

</body>
</html>
