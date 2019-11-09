<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
  <div id="profil">
    <div class="row">
      <div class="col-3 justify-content-center align-self-center profil-image-siap">
        <img class="rounded-circle img-fluid" src="<?php echo base_url("vendor/bootstrap/img/"); ?>765-default-avatar.png">
      </div>
      <div class="col-9">
        <h5 class="mb-0"><?php echo $namaguru; ?></h5><span><?php echo $matapelajaran; ?></span>
      </div>
      <div class="col-12">
        <a class="btn btn-primary btn-block shadow-none btn-danger-siap btn-keluar-siap" href="<?php echo base_url('beranda/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Log Out</a>
      </div>
    </div>
  </div>
  
  <div id="menu">
    <ul class="nav nav-pills flex-column nav-pills-siap">
      <!-- menu untuk user guru dan wali kelas -->
      <!-- wali kelas dan guru -->
      <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> Beranda</a></li>

      
      <?php if($matapelajaran != 'operator'): ?>
        <!-- wali kelas dan guru -->
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url("absensi"); ?>"><i class="fas fa-pager"></i> Absensi</a></li>
        <!-- hanya wali kelas    -->
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url("laporanAbsensi"); ?>"><i class="fas fa-file-export"></i> Laporan Absensi</a></li>
      <?php endif; ?>
      <!-- hanya wali kelas    -->
      <?php if($user['wali_kelas'] > 0): ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url("absensi/anakdidik"); ?>"><i class="fas fa-users"></i> Lihat Anak Didik</a></li>
      <?php endif; ?>
      

      <!-- menu untuk user kurikulum -->
      <?php if($matapelajaran == 'operator'): ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url("jadwal"); ?>"><i class="fas fa-file-export"></i> Pengaturan Jadwal</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url("jadwal/pengaturan"); ?>"><i class="fas fa-cog"></i> Pengaturan Jam</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url("jadwal/laporan"); ?>"><i class="fas fa-file-export"></i> Laporan Jadwal</a></li>
      <?php endif; ?>
    </ul>
  </div>
</div>
