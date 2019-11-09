<div class="col-12 col-sm-6 col-md-6 col-lg-8 col-xl-8">
  <div class="row">
    <?php
      $query=$this->db->query("SELECT *, COUNT('kelas') as jumlah_kelas FROM kelas WHERE status_kelas = 'Aktif' GROUP BY kelas")->result_array();
      foreach ($query as $row) {
    ?>
    <div class="col-12">
      <div class="card box-shadow-siapW">
        <div class="card-body">
          <h4 class="card-title"><i class="fas fa-user-friends"></i> Kelas <?php echo $row["kelas"]; ?></h4>
          <p>Daftar Kelas <code><?php echo $row["kelas"]; ?></code> dengan jumlah kelas <code><?php echo $row["jumlah_kelas"]; ?></code>, pilih salah satu kelas untuk melihat jadwal</p>

          <div class="row">
            <?php
              $kelas=$row['kelas'];
              $queryKelas=$this->db->query("SELECT * FROM kelas WHERE kelas='$kelas' AND status_kelas = 'Aktif'")->result_array();
              foreach ($queryKelas as $rowKelas) {
            ?>
              <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <a href="<?php echo base_url("jadwal/kelas/").$rowKelas["id_kelas"]; ?>" class="btn btn-primary btn-lg btn-block" style="margin-bottom:0.5em;">Kelas <?php echo $rowKelas["kelas"]." ".$rowKelas["nama_kelas"]; ?></a>
              </div>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
