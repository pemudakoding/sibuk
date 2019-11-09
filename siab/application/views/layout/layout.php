<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript" src="<?php echo base_url("vendor/"); ?>jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("vendor/"); ?>sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("vendor/bootstrap/js/"); ?>bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?> | SIAB</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("vendor/bootstrap/css/"); ?>bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("vendor/bootstrap/css/"); ?>styles.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("vendor/fontawesome/css/"); ?>all.min.css" />
  </head>
  <body>
    <div class="loading"></div>
    <div class="container container-siap">
      <div class="row">
        <?php      
          echo $sidebarSIAB;
          echo $main;
        ?>
      </div>
    </div>
    <script src="<?= base_url('vendor/js/loading.js') ?>"></script>
  </body>
    
</html>
