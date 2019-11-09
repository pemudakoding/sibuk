<?php
    $status_p 		= mysqli_real_escape_string($koneksi,strip_tags($_POST['status_pendidikan']));
    switch ($status_p) {

    case 'Pindah':
        require('function/variable/variable_siswa.php');

        switch (strip_tags($_POST['pemohon'])) {
            case 'Ayah':
                $nama_pemohon 		 = $nama_depan_ayah." ".$nama_belakang_ayah;
                $pekerjaan_pemohon = $pekerjaan_ayah;
                $alamat_pemohon		 = $alamat_rumah_ayah;
                break;
            case 'Ibu':
                $nama_pemohon 		 = $nama_depan_ibu." ".$nama_belakang_ibu;
                $pekerjaan_pemohon = $pekerjaan_ibu;
                $alamat_pemohon		 = $alamat_rumah_ibu;
                break;
        }

        $cetak = [
                            'nama_siswa' 	    => $nama_depan.' '.$nama_belakang,
                            'ttl'	 			=> $tempat_lahir.', '.$tanggal_lahir,
                            'nis'				=> $nis,
                            'nisn'				=> $nisn,
                            'kelas'				=> $id_kelas_saat_ini,
                            'alamat' 			=> $alamat,
                        

                            'nama_pemohon'			=> $nama_pemohon,
                            'pekerjaan_pemohon'	    => $pekerjaan_pemohon,
                            'alamat_pemohon'		=> $alamat_pemohon,
                            
                            'sekolah'	=> $nama_sekolah,
                            'alasan'	=> $alasan_siswa_pindah];
        set_session('cetak_tambah',$cetak);
        break;
    
}
?>