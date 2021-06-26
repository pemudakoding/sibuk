<div class="col-12 col-sm-6 col-md-6 col-lg-8 col-xl-8">
  <div class="card box-shadow-siap">
      <div class="card-body">
        <a href="<?php echo base_url("jadwal"); ?>" class="btn btn-primary float-left"><i class="fas fa-arrow-left"></i> Kembali</a>
        <h4 class="float-right"><?php echo "Kelas: ".$namaKelas; ?></h4>
      </div>
  </div>
  <div class="row">
    <?php foreach($resultHari as $rowHari){ ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">

      <div class="card box-shadow-siap">
        <div class="card-body">
          <h4 class="card-title"><i class="fas fa-calendar-week"></i> <?php echo $rowHari["hari"]; ?></h4>

          <hr/>

          <?php
          $queryJamJadwal=$this->jadwalModels->getJamJadwal($rowHari["id_hari"]);
            if(empty($queryJamJadwal)){
          ?>
            <center><h5>Kosong!</h5>
            pergi ke menu <b>Pengaturan Jadwal</b>, untuk mengisi <b>Jam</b>!
          </center>
          <?php
            }
          foreach($queryJamJadwal as $rowJamJadwal){
          ?>
          <div class="itemJadwal">
            jam ke <?php echo $rowJamJadwal["jam_ke"]; ?>
            <?php
              $queryJadwal=$this->jadwalModels->getJadwal($rowHari["id_hari"],$idKelas,$rowJamJadwal["id_jam_jadwal"]);
              foreach($queryJadwal as $rowJadwal){
            ?>
            <a data-toggle="modal" data-target="#modalUbahJadwal" href="#" class="btn float-right btnSetting btn-sm" data-tooltip="tooltip" data-placement="left" title="Ubah" data-jamke="<?php echo $rowJamJadwal["jam_ke"]; ?>" data-idjadwal="<?php echo $rowJadwal['id_jadwal']; ?>" data-hari="<?php echo $rowHari["hari"]; ?>"><i class="fas fa-cog"></i></a>
            <hr/>
            <b><?php echo $rowJadwal["nama_guru"]."<br/>".$rowJadwal["nama_mapel"]; ?></b>
            <hr/>
            <a data-toggle="modal" href="#" data-jadwalid="<?php echo $rowJadwal["id_jadwal"]; ?>" class="btn float-right btnDelete" data-tooltip="tooltip" data-placement="left" title="kosongkan Jadwal"  data-target="#kosongJadwal"><i class="fas fa-trash"></i></a>
            <?php
              }
              if($queryJadwal==NULL){
            ?>

              <button data-idhari="<?php echo $rowHari["id_hari"]; ?>" data-idkelas="<?php echo $idKelas; ?>" data-idjamjadwal="<?php echo $rowJamJadwal["id_jam_jadwal"]; ?>" data-jamke="<?php echo $rowJamJadwal["jam_ke"]; ?>" data-hari="<?php echo $rowHari["hari"]; ?>" type="button" class="btn btn-primary btn-block btn-tambahJadwal" data-toggle="modal" data-target="#modalTambahJadwal"><i class="far fa-plus-square"></i> Isi Jadwal </button>
              <hr/>
            <?php
              }
              echo $rowJamJadwal["jam"];
            ?>
          </div>
          <?php } ?>

        </div>
      </div>

    </div>
    <?php } ?>

  </div>
</div>

<!-- modal kosongkan jadwal  -->
<div class="modal fade" id="kosongJadwal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-body">
        <h5>Yakin Ingin Mengosongkan Jadwal Ini ?</h5>
        <div class="msgKosongJadwal"></div>
      </div>

      <div class="modal-footer">
        <button id="btnKosongJadwalSubmit" class="btn btn-primary">Hapus</button>
        <button id="btnKosongJadwalKeluar" class="btn btn-danger" data-dismiss="modal">Tidak</button>
      </div>

    </div>
  </div>
</div>

<!-- modal ubah jam -->
<div class="modal fade" id="modalUbahJadwal" tabindex="-1" role="dialog" aria-labelledby="modalUbahJadwal" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUbahJadwal"></h5>
      </div>
      <div class="modal-body" id="msgUbahJadwal"></div>
      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal" id="submitKeluarUbahJadwal">Keluar</button>
        <button type="button" class="btn btn-primary" id="submitUbahJadwal">Buat</button>
      </div>
    </div>
  </div>
</div>

<!-- modal isi jadwal -->
<div class="modal fade" id="modalTambahJadwal" tabindex="-1" role="dialog" aria-labelledby="modalTambahJadwal" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahJadwal"></h5>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="pilihMataPelajaran" class="col-form-label">Pilih Mata Pelajaran</label>
            <select class="form-control" id="pilihMataPelajaran">
              <option value="">-Pilih-</option>
              <?php
                $queryMapel=$this->db->query("SELECT * FROM mapel ORDER BY nama_mapel");
                foreach($queryMapel->result() as $rowMapel){
                  echo "<option value=\"".$rowMapel->id_mapel."\">".$rowMapel->nama_mapel."</option>";
                }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="pilihGuru" class="col-form-label">Pilih Guru</label>
            <select class="form-control" id="pilihGuru" disabled>
              <option value="">-Pilih-</option>
            </select>
          </div>

          <div id="msgJadwal"></div>

          <input type="text" class="hiddenInput" id="inputHari"/>
          <input type="text" class="hiddenInput" id="inputKelas"/>
          <input type="text" class="hiddenInput" id="inputJamJadwal"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="submitKeluarJadwal">Keluar</button>
        <button type="button" class="btn btn-primary" id="submitJadwal">Buat</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

$('#kosongJadwal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data('jadwalid');

  $("#btnKosongJadwalSubmit").click(function(){
      $.ajax({
      type:"POST",
       url:"<?php echo base_url('jadwal/prosesKosongJadwal'); ?>",
      data:{"id":id},
        success:function(msg){
        if(msg=="berhasil"){
          location.reload();
          $("#btnKosongJadwalSubmit").attr("disabled",true);
        }
      }
    });
  });
});

$("#submitKeluarUbahJadwal").click(function(){
  $("#alertUpJadwal").remove();
  $("#msUpJadwal").html("");
});

$('#modalUbahJadwal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var jamke = button.data('jamke'); // ambil data di data-jamke
  var hari = button.data('hari'); // ambil data di data-hari

  var modal = $(this);
  modal.find('.modal-title').text('Mengubah Jam Ke ' + jamke + ' Di Hari ' + hari);

  var id_jadwal = button.data('idjadwal');

  var id_mapel  = button.data('id_mapel');
  var id_guru   = button.data('id_guru');

  $.ajax({
    method:"POST",
    url:"<?php echo base_url("jadwal/getUbahJadwal"); ?>",
    data:{"id_jadwal":id_jadwal},
    success:function(msg){
      $("#msgUbahJadwal").html(msg);
    }
  });

  $("#submitUbahJadwal").click(function(){
      var idmapel = $("#pilihMataPelajaranUbah").val();
      var idguru = $("#pilihGuruUbah").val();
      $("#submitUbahJadwal").attr("disabled","true");

      $.ajax({
         method:"POST",
            url:"<?php echo base_url("jadwal/prosesUbahJadwal") ?>",
           data:{"id_jadwal":id_jadwal,"id_guru":idguru},
        success:function(msg){          
          if(msg=="wajib"){
            $("#submitUbahJadwal").removeAttr("disabled");
            $("#msUpJadwal").html("<div id='alertUpJadwal' class='alert alert-danger alert-dismissible fade show' role='alert'>Pilih Guru Terlebih Dahulu<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          }else if(msg=="tidakBerhasil"){
            $("#submitUbahJadwal").removeAttr("disabled");
            $("#msUpJadwal").html("<div id='alertUpJadwal' class='alert alert-danger alert-dismissible fade show' role='alert'>Tidak Bisa Diubah!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          }else if(msg=="berhasil"){
            $("#submitUbahJadwal").attr("disabled","true");
            $("#msUpJadwal").html("<div id='alertUpJadwal' class='alert alert-success alert-dismissible fade show' role='alert'>Berhasil, akan dialihkan ke halaman jadwal<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            location.reload();
          }else if(msg=="oops"){
            $("#submitUbahJadwal").removeAttr("disabled");
            $("#msUpJadwal").html("<div id='alertUpJadwal' class='alert alert-danger alert-dismissible fade show' role='alert'>terjadi kesalahan :(<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          }else{
            $("#msUpJadwal").html("Oops!");
            
          }

        }
      });

  });

});

$("#submitKeluarJadwal").click(function(){
  $("#pilihMataPelajaran")[0].selectedIndex = 0;
  $("#pilihGuru")[0].selectedIndex = 0;
  $("#alertJadwal").remove();
  $("#msgJadwal").html("");
});

$('#modalTambahJadwal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var jamKe = button.data('jamke'); // ambil data di data-jamke
  var hari = button.data('hari'); // ambil data di data-hari

  var id_hari         = button.data('idhari');
  var id_kelas        = button.data('idkelas');
  var id_jam_jadwal   = button.data('idjamjadwal');

  var modal = $(this);
  modal.find('.modal-title').text('Mengisi Jam Ke ' + jamKe + ' Di Hari ' + hari);

  modal.find('.modal-body #inputHari').val(id_hari);
  modal.find('.modal-body #inputKelas').val(id_kelas);
  modal.find('.modal-body #inputJamJadwal').val(id_jam_jadwal);

  $("#pilihMataPelajaran")[0].selectedIndex = 0;
  $("#pilihGuru")[0].selectedIndex = 0;
  $("#alertJadwal").remove();
  $("#msgJadwal").html("");
})


$("#pilihMataPelajaran").change(function(){
  $("#pilihGuru").removeAttr("disabled");

  var mapel = $("#pilihMataPelajaran").val();
  $.ajax({
     method:"POST",
        url:"<?php echo base_url("jadwal/cariGuru"); ?>",
       data:{"mapel":mapel}
  }).done(function(msg){
    $("#pilihGuru").html(msg);
  });
});

$("#submitJadwal").click(function(){
  var id_hari       = $("#inputHari").val();
  var id_kelas      = $("#inputKelas").val();
  var id_guru       = $("#pilihGuru").val();
  var id_jam_jadwal = $("#inputJamJadwal").val();

  $("#submitJadwal").attr("disabled","true");

  $.ajax({
    method:"POST",
       url:"<?php echo base_url("jadwal/prosesJadwal"); ?>",
      data:{"id_hari":id_hari,"id_kelas":id_kelas,"id_guru":id_guru,"id_jam_jadwal":id_jam_jadwal},
   success:function(msg){
        if(msg=="wajib"){
          $("#submitJadwal").removeAttr("disabled");
          $("#msgJadwal").html("<div id='alertJadwal' class='alert alert-danger alert-dismissible fade show' role='alert'>Pilih Guru Terlebih Dahulu<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        }else if(msg.search('bentrok') > 1){
          let dataGuru = JSON.parse(msg)[0];
          $("#submitJadwal").removeAttr("disabled");
          $("#msgJadwal").html("<div id='alertJadwal' class='alert alert-warning alert-dismissible fade show' role='alert'>Guru Ini Sudah Ada DiKelas <b>" +  dataGuru.kelas + dataGuru.nama_kelas +"</b> Dijam Yang Sama<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        }else if(msg=="tidakBentrok"){
          $("#submitJadwal").attr("disabled","true");
          $("#msgJadwal").html("<div id='alertJadwal' class='alert alert-success alert-dismissible fade show' role='alert'>Berhasil, akan dialihkan ke halaman jadwal<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          location.reload();
        }else if(msg=="oops"){
          $("#submitJadwal").removeAttr("disabled");
          $("#msgJadwal").html("<div id='alertJadwal' class='alert alert-danger alert-dismissible fade show' role='alert'>terjadi kesalahan :(<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        }else{
          $("#msgJadwal").html("Oops!");
        }
      }
  });
});

$('[data-tooltip="tooltip"]').tooltip();

</script>
