<?php
    require_once('../core/init.php');
    $jumlahKelas = mysqli_num_rows(data_kelas(""));
    if($jumlahKelas != 0){
        if(penaikanKelas()){
            setFlashMessages("Berhasil Menaikan Kelas dan meluluskan !!!","success");
            header("location: $url/kelas/");
        }
    }else{
        setFlashMessages('Gagal Menaikan Kelas \n Karena Kelas Tidak ada / Sudah Alumni !!!',"error",'true');
        header("location: $url/kelas/");
    }
?>
