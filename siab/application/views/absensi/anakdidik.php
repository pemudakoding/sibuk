<div class="col-12 col-sm-6 col-md-6 col-lg-8 col-xl-8">

  <div class="row">
    <div class="col-12">
      <div class="card box-shadow-siap">
        <div class="card-body"><span>Daftar Anak Didik Kelas <b><?=  $siswa[0]['kelas']." ". $siswa[0]['nama_kelas'] ?></b></span>
          <div class="table-responsive tabel-siswa-siap">
            <table class="table table-striped table-hover table-sm">
              <thead>
                <tr>
                  <th class="text-center">NO</th>
                  <th>NIS</th>
                  <th>NAMA</th>
                  <th class="text-center">GENDER</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 1;  
                  foreach($siswa as $row):?>
                  <tr>
                    <td class="text-center"><?= $i++; ?></td>
                    <td><?= $row['nisn']; ?></td>
                    <td><?= $row['nama_depan']." ".$row['nama_belakang']; ?></td>
                    <td class="text-center"><?= substr($row['jenis_kelamin'],0,1) ?></td>
                    <td><a class="btn btn-secondary btn-block btn-sm" href="<?= 'http://localhost/sekolah/siswa/detail/'.$row['nis'].'/'.str_replace(' ','-',strtolower($row['nama_depan']." ".$row['nama_belakang']))?>" target="_blank">lihat</a></td>
                  </tr>
                <?php  endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
