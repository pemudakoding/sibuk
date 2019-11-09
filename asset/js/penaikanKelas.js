var button = document.getElementsByClassName('butt-penaikan')[0];

    button.onclick = function() {
        swal({
            title: "Apakah Anda Yakin ingin menaikan kelas dan meluluskan ?".toUpperCase(),
            text: "Jika kelas sudah dinaikkan dan diluluskan. \n Sangat tidak mungkin untuk dikembalikan sekaligus lagi !!!",
            icon: "warning",
            buttons: [
                'Batalkan',
                'Ya, Saya Yakin'
            ],
            dangerMode: true,
        }).then(function(isconfirm){
            if(isconfirm){
                window.location.href = '../mod_kelas/naik_kelas.php';
            }else{
                swal({
                    title: 'Penaikan Kelas dibatalkan !!!'.toUpperCase(),
                    icon: 'success',
                })
            }
        });
    }