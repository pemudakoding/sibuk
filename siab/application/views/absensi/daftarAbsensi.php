<div class="col-12 col-sm-6 col-md-6 col-lg-8 col-xl-8">

  <?php if($resultAbsen=="libur"){ ?>
    <div class="card box-shadow-siap">
      <div class="card-body">
        <center>
          <br/>
          <img src="<?php echo base_url('vendor/bootstrap/img/libur.svg'); ?>" alt="libur" width="50%" />
          <br/><br/>
          <h1>Oops!</h1>
          <h3>Anda Terlalu Rajin, Hari Ini Libur!</h3>
        </center>
      </div>
    </div>
  <?php
    }else{
      // tidak libur
  ?>
  <div class="heading-siap">
    <div class="row">
        <div class="col-6">
          <h2><font color="white"><?php echo $hari; ?></font></h2>
        </div>
        <div class="col-6 d-inline-flex justify-content-center align-items-center">
          <div class="text-left text-light font-weight-bold mr-2 "><h5>Jam Sekarang: </h5></div>
          <div class="waktu text-light"></div>
        </div>  
    </div>
  </div>

  <div class="row">
    <?php if($resultAbsen==NULL){ ?>
      <div class="col-12">
        <div class="card box-shadow-siap">
          <div class="card-body">
            <center>
              <br/>
              <img src="<?php echo base_url('vendor/bootstrap/img/kosong.svg'); ?>" alt="jadwal kosong!" width="30%" />
              <br/><br/>
              <h1>Jadwal Kosong!</h1>
              <h3>hubungi pihak kurikulum untuk menambahkan jadwal.</h3>
            </center>
          </div>
        </div>
      </div>
    <?php
    }

    foreach ($resultAbsen as $row) { ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
      <div class="jadwal-siap"> 
        <div class="row">
          <div class="col-5 logo-cdr-siap">
            <img class="img-fluid jadwal-logo-cdr-siap" src="<?php echo base_url("vendor/bootstrap/img/"); ?>cldr.svg">
            <h6 class="text-center jam"><?php echo $row['jam']; ?></h6>
          </div>
          <div class="col-7 right-jadwal-siap">
            <h4><?php echo $row['kelas']." ".$row['nama_kelas']; ?></h4>
            <h6><?php echo $row['nama_mapel']; ?></h6>
            <a class="btn btn-primary btn-block shadow-none" role="button" href="<?php echo base_url('absensi/absenkelas/').$row['id_kelas']; ?>">Absensi</a>
            <div class="msg"></div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <?php } ?>
</div>
<?php
  /**
   * [$waktu description]
   * @var DateTime
   * Buat object waktuu
   * lalu ambil timestamp waktu server
   * lalu simpan di variable $waktuSekarang
   */
  $waktu = new DateTime();
  $waktuSekarang = $waktu->getTimestamp();
?>
<script src="<?= base_url('vendor/js/') ?>padDigits.js"></script>
<script>
  $(document).ready(function(){

    var absenList = $('.jadwal-siap');
    var checkAbsensi = setInterval(checkTime,1000);

    

    /**
     * Buat ngecek nanti distatement
     * @type {Boolean}
     */
    initTime = true;
    timer    = '';
    function checkTime(){
      
      /**
       * [if | Jika InitTime true maka init variable timer dengan timestamp yang telahdibuat lalu dikali 1000]
       * @param  {[Boolean]} initTime [true or false]
       * @return {[integer]}          [timestamp disimpa kevariable timer]
       */
      if(initTime){
        timer = <?= $waktuSekarang ?>*1000;
      }
      var time    = new Date(timer);
      var jam     = padDigits(time.getHours(),2);
      var menit   = padDigits(time.getMinutes(),2);
      var detik   = padDigits(time.getSeconds(),2);

      for(let i = 0;i<absenList.length;i++){
        var jamAbsen = $('.jam')[i].innerHTML;
				    jamAbsen = jamAbsen.split('-');

        var btnAbsen = $('.jam')[i].parentNode.nextElementSibling.lastElementChild.previousElementSibling;
        // jam+":"+menit
        
        /**
         * [if menentukan apakah jam  absen udah mulai apa belomm]
         * @param  {[statment]} jam+":"+menit < jamAbsen[0] [apakah jam sekarang lebih kecil dari jam mulai absen ?]
         * 
         * @return {[return]}                               [Kalo TRUE tampilkan pesan dan sembunyikan tombol absensi
         *                                                   kalo False Tampilkan tombol absensi dan hilangkan Pesan]
         */
        if(jam+":"+menit < jamAbsen[0]){
          btnAbsen.classList.add('hide');
          var msg = "Waktu mengajar anda belum mulai dikelas ini.";                                    
          btnAbsen.nextElementSibling.innerHTML = `<h6 class="msg1 text-danger font-weight-bold" style="font-size:0.9em;"> ${msg} </h6>`;
        }else{
          btnAbsen.classList.remove('hide');
          btnAbsen.nextElementSibling.innerHTML = '';
        }
        /**
         * [if Menentukan apakah jam sekarang udah melewati jam absen atau blum ]
         * @param  {[Statement]} jam+":"+menit >= jamAbsen[1] [Apa jam sekarang udah melebihi atau sama dengan jamAbsen ?]
         * 
         * @return {[nilai]} [Kalo iya sembunyi tombol absensi,lalu tampilkan pesan]
         */
        if(jam+":"+menit >= jamAbsen[1]){
          btnAbsen.classList.add('hide');
          var msg = "Waktu mengajar anda dikelas ini telah selesai.";
          btnAbsen.nextElementSibling.innerHTML = `<h6 class="msg1 text-success font-weight-bold" style="font-size:0.9em;"> ${msg} </h6>`;
        }
      }

      $('.waktu').html("<h5>"+jam+":"+menit+":"+detik+"</h5>");
      initTime = false;
      timer = timer+1000;
    }

  });
</script>
<?= $flashMessages ?>