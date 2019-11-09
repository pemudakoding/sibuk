
<div class="col-12 col-sm-6 col-md-6 col-lg-8 col-xl-8">
  <div class="row">
  <?php foreach($resultHari as $rowHari){ ?>
  <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <div class="card box-shadow-siap">
      <div class="card-body">
        <h4 class="card-title"><i class="fas fa-calendar-week"></i> <?php echo $rowHari["hari"]; ?></h4>
        <hr/>
        <?php
          $jamkeAdd=$this->jadwalModels->getJamKeAkhir($rowHari["id_hari"]);
          $resultJamJadwal=$this->jadwalModels->getJamHari($rowHari["id_hari"]);
          if($resultJamJadwal==NULL){
        ?>
          <center><b>Kosong</b>, Silahkan Tambahkan Jam.</center>
        <?php
          }
        ?>
        <ul class="list-group">
          <?php


            foreach($resultJamJadwal as $rowJamJadwal){
          ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo "<b>#".$rowJamJadwal["jam_ke"]."</b> ".$rowJamJadwal["jam"] ; ?>
            <button type="button" class="btn badge badge-success badge-pill btn-success" data-toggle="modal" data-target="#modalUbahJam" data-idjam="<?php echo $rowJamJadwal["id_jam_jadwal"]; ?>" data-jamke="<?php echo $rowJamJadwal["jam_ke"]; ?>" data-hari="<?php echo $rowHari["hari"]; ?>"><i class="fas fa-cog"></i></button>
          </li>
          <?php } ?>
        </ul>

        <br/>
        <button data-jamke="<?php echo $jamkeAdd[0]["result"]+1; ?>" data-idhari="<?php echo $rowHari["id_hari"]; ?>" data-hari="<?php echo $rowHari["hari"]; ?>" class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#modalTambahJam"><i class="far fa-plus-square"></i> Tambah Jam</button>

      </div>
    </div>
  </div>
  <?php } ?>
  </div>
</div>
<!-- modal ubah jam -->
<div class="modal fade" id="modalUbahJam" tabindex="-1" role="dialog" aria-labelledby="modalUbahJam" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUbahJam"></h5>
      </div>
      <div class="modal-body" id="msgUbahJam"></div>
      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal" id="submitKeluarUbahJam">Keluar</button>
        <button type="button" class="btn btn-primary" id="submitUbahJam">Buat</button>
      </div>
    </div>
  </div>
</div>

<!-- modal isi jam -->
<div class="modal fade" id="modalTambahJam" tabindex="-1" role="dialog" aria-labelledby="modalTambahJam" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahJam"></h5>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label class="col-form-label"><b>Jam Mulai</b></label>
            <div class="row">
              <div class="col-6">
                <select id="jamMulaiJam" class="form-control">
                  <option>Jam</option>
                  <?php
                  for ($no=1; $no<=24; $no++) {
                    $a=strlen($no)==1 ? str_pad($no, 2, "0", STR_PAD_LEFT) : $no;
                    echo "<option>".$a."</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="col-6">
                <select id="jamMulaiMenit" class="form-control">
                  <option>Menit</option>
                  <?php
                  for ($no=0; $no<=60; $no++) {
                    $a=strlen($no)==1 ? str_pad($no, 2, "0", STR_PAD_LEFT) : $no;
                    echo "<option>".$a."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-form-label"><b>Jam Selesai</b></label>
            <div class="row">
              <div class="col-6">
                <select id="jamSelesaiJam" class="form-control">
                  <option>Jam</option>
                  <?php
                  for ($no=1; $no<=24; $no++) {
                    $a=strlen($no)==1 ? str_pad($no, 2, "0", STR_PAD_LEFT) : $no;
                    echo "<option>".$a."</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="col-6">
                <select id="jamSelesaiMenit" class="form-control">
                  <option>Menit</option>
                  <?php
                  for ($no=0; $no<=60; $no++) {
                    $a=strlen($no)==1 ? str_pad($no, 2, "0", STR_PAD_LEFT) : $no;
                    echo "<option>".$a."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

          <div id="msgJadwal"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="submitKeluarJam">Keluar</button>
        <button type="button" class="btn btn-primary" id="submitJam">Buat</button>
      </div>
    </div>
  </div>
</div>


<script>

$('#modalUbahJam').on('show.bs.modal', function (event) {
    var button  = $(event.relatedTarget); // Button that triggered the modal
    var hari    = button.data('hari'); // ambil data di data-hari
    var jamke   = button.data('jamke');

    var modal = $(this);
    modal.find('.modal-title').text('Mengubah Jam Ke ' + jamke + ' Di Hari ' + hari);

    var idjam = button.data('idjam');

    $.ajax({
      method:"POST",
      url:"<?php echo  base_url("jadwal/getJamJadwal"); ?>",
      data:{"id":idjam},
      success:function(msg){
        $("#msgUbahJam").html(msg);
      }
    });

    $("#submitUbahJam").click(function(){
      $("#submitUbahJam").attr("disabled","true");

      var jamMulaiJam = $("#jamMulaiJamUbah").val();
      var jamMulaiMenit = $("#jamMulaiMenitUbah").val();
      var jamSelesaiJam = $("#jamSelesaiJamUbah").val();
      var jamSelesaiMenit = $("#jamSelesaiMenitUbah").val();

      var jam = jamMulaiJam+":"+jamMulaiMenit +"-"+ jamSelesaiJam+":"+jamSelesaiMenit;

      $.ajax({
        method:"POST",
        url:"<?php echo  base_url("jadwal/prosesUbahPengaturan"); ?>",
        data:{"jam":jam,"idjam":idjam},
        success:function(msg){
          if(msg=="berhasil"){
            $("#submitUbahJam").removeAttr("disabled");
            $("#msgJadwalUbah").html("<div id='alertJadwal' class='alert alert-success alert-dismissible fade show' role='alert'>berhasil, akan dialihkan ke halaman jadwal <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>");
            location.reload();
          }else{
            $("#submitUbahJam").attr("disabled","false");
            $("#msgJadwalUbah").html("<div id='alertJadwal' class='alert alert-danger alert-dismissible fade show' role='alert'>Oops! ada yang salah <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>");
          }
        }
      });
    });
});

$('#modalTambahJam').on('show.bs.modal', function (event) {
    var button  = $(event.relatedTarget); // Button that triggered the modal
    var hari    = button.data('hari'); // ambil data di data-hari

    var jamke   = button.data('jamke');
    var id_hari = button.data('idhari');

    var modal = $(this);
    modal.find('.modal-title').text('Mengisi Jam Ke ' + jamke + ' Di Hari ' + hari);

    $("#submitJam").click(function(){
      $("#submitJam").attr("disabled","true");

      var jamMulaiJam = $("#jamMulaiJam").val();
      var jamMulaiMenit = $("#jamMulaiMenit").val();
      var jamSelesaiJam = $("#jamSelesaiJam").val();
      var jamSelesaiMenit = $("#jamSelesaiMenit").val();

      var jam = jamMulaiJam+":"+jamMulaiMenit +"-"+ jamSelesaiJam+":"+jamSelesaiMenit;

      if(jamMulaiJam=='Jam' || jamMulaiMenit=='Menit' || jamSelesaiJam=='Jam' || jamSelesaiMenit=='Menit'){
        $("#submitJam").removeAttr("disabled");
        $("#msgJadwal").html("<div id=\"alertJadwal\" class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">Wajib Di isi Semua <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\">&times;</span> </button> </div>");
      }else{
        $.ajax({
          method:"POST",
          url:"<?php echo base_url("jadwal/prosesPengaturan"); ?>",
          data:{"jam":jam,"jam_ke":jamke,"id_hari":id_hari},
          success:function(msg){
            if(msg=="berhasil"){
              $("#submitJam").attr("disabled","true");
              $("#msgJadwal").html("<div id=\"alertJadwal\" class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">berhasil, akan dialihkan ke halaman jadwal <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\">&times;</span> </button> </div>");
              location.reload();
            }else{
              $("#submitJam").removeAttr("disabled");
              $("#msgJadwal").html("<div id=\"alertJadwal\" class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">Oops! ada yang salah <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\">&times;</span> </button> </div>");
            }
          }
        });
      }

    });
});


</script>
