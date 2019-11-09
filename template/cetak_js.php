<?php 

    echo "<script>
            function orta(pemohon)
            {
                var nama_orta;
                var regex   = /[\s]+/gi;
                if(pemohon == 'Ayah'){
                    var nama_d      = document.getElementById('nama_d_a').value.trim();
                    var nama_b      = document.getElementById('nama_b_a').value.trim();
                    var alamat      = document.getElementById('alamat_rumah_a').value.trim();
                    var pekerjaan   = document.getElementById('pekerjaan_a').value.trim();
                    var nama_orta = nama_d + ' ' + nama_b + ',' +pekerjaan + ','+alamat;
                }else if(pemohon == 'Ibu'){
                    var nama_d = document.getElementById('nama_d_i').value.trim();
                    var nama_b = document.getElementById('nama_b_i').value.trim();
                    var pekerjaan   = document.getElementById('pekerjaan_i').value.trim();
                    var alamat      = document.getElementById('alamat_rumah_i').value.trim();
                    var nama_orta = nama_d + ' ' + nama_b + ',' +pekerjaan + ','+alamat;
                }else if(pemohon == 'Wali'){
                    var nama_d = document.getElementById('nama_d_w').value.trim();
                    var nama_b = document.getElementById('nama_b_w').value.trim();
                    var pekerjaan   = document.getElementById('pekerjaan_w').value.trim();
                    var alamat      = document.getElementById('alamat_rumah_w').value.trim();
                    var nama_orta = nama_d + ' ' + nama_b + ',' +pekerjaan + ','+alamat;
                }
                
                return nama_orta.replace(regex,'-');
            }

            function cetak()
            {
                var nama_depan    = document.getElementById('nama_depan').value.trim();
                var nama_belakang = document.getElementById('nama_belakang').value.trim();
                var nama          = nama_depan + ' ' + nama_belakang;
                var tp            = document.getElementById('tp').value.trim();
                var tgl           = document.getElementById('tanggal_lahir').value.trim();
                var nis           = document.getElementById('nis').value.trim();
                var nisn          = document.getElementById('nisn').value.trim();
                var id_kelas      = document.getElementById('kelas_saat_ini').value.trim();
                var alamat        = document.getElementById('alamat_t').value.trim();

                var regex   = /[\s]+/gi;
                var token   = Math.random().toString(36).substr(2);
                var token   = token + token + token + token;

                var url     = nama+','+tp+','+tgl+','+nisn+','+id_kelas+','+alamat+','+nis;
                var url     = url.replace(regex,'-');

                var pemohon_surat = document.getElementById('pemohon_surat_option').value.trim();
                var urlOrta = orta(pemohon_surat);

                var nama_sekolah = document.getElementById('nama_sekolah').value.trim();
                var alasan       = document.getElementById('input_alasan').value.trim();
                
                var id_user      = '$user[id_user]';
                var urlSekolah   = nama_sekolah +','+ alasan+','+id_user;
                var urlSekolah   =  urlSekolah.replace(regex,'-');
                
                
                
                window.open('$url/cetak/pindah/?ssiwa='+token+'&siswa='+url+'&data_pers='+token+'&orta='+urlOrta+'&skail='+urlSekolah);


            }
    </script>"

?>