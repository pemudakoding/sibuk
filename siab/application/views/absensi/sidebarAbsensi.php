<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 offset-0 offset-sm-0 offset-md-0 offset-lg-1 offset-xl-1">
    <div class="card box-shadow-siap card-siap">
        <div class="card-header">
            <div class="row">
                <div class="col-3 justify-content-center align-self-center profil-image-siap">
                    <img class="rounded-circle img-fluid" src="<?php echo base_url("vendor/bootstrap/img/"); ?>765-default-avatar.png">
                </div>
                <div class="col-9">
                    <h6 class="mb-0"><?php echo $namaguru; ?></h6><span><?php echo $matapelajaran; ?></span>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row panel-absensi-siap">
                <div class="col-6">
                    <h6 class="text-center">Masuk</h6>
                    <h5 class="text-center jam-masuk"><?= $resultAbsen['awalJam'] ?></h5>
                </div>
                <div class="col-6">
                    <h6 class="text-center">Keluar</h6>
                    <h5 class="text-center jam-keluar"><?= $resultAbsen['akhirJam'] ?></h5>
                </div>
                <div class="col">
                    <form method="POST" action="<?php echo base_url('absensi/prosesAbsen'); ?>">
                    <button class="btn btn-primary btn-block shadow-none btn-danger-siap btn-selesai-siap" type="submit">Selesai Absensi</button>
                    <!-- Tag penutup Dari form ada view/absensi/absensi.php -->
                </div>
            </div>
        </div>
    </div>
</div>