var kelurahanNode = document.getElementById('kelurahan');
var zona          = ['besusu barat','ujuna','kampung baru','talise','baru'];

kelurahanNode.addEventListener('blur',function (){
    var searchValue = kelurahanNode.value.trim().toLowerCase();
    if(!zona.includes(searchValue)){
        swal({
            title:'PEMBERITAHUAN !!!',
            text: 'PENDAFTAR TIDAK BERADA DIZONA SMPN 15 PALU',
            icon: 'warning',
            dangerMode:true,
        });
    }
})