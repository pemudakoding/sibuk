<?php
  require_once('core/base_url.php');
  session_start();
  session_destroy();

  header("location: {$url}");
 ?>
