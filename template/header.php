<div class="sub-headbar">
	<div class="section-button">
	<a href="#" class="button button-menu" id="button-menu"></a>
	<a href="#" class="button button-show" id="button-show"></a>

	<?php if (isset($_SESSION['login'])): ?>
		<a href='<?= $url; ?>/keluar.php' class="button button-logout">keluar</a>
	<?php endif; ?>
	<?php if (!isset($_SESSION['login'])): ?>
		<a href='<?= $url; ?>/login.php' class="button button-logout">LOGIN</a>
	<?php endif; ?>
	</div>
</div>
