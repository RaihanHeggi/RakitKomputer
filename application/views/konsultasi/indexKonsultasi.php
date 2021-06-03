<div class="container">
	<p>Now time <?php echo date("Y-m-d H:i:s"); ?></p>
	<h1>Konsultasi Page</h1>
	<p><a href="<?php echo base_url('index.php/KonsultasiController/postKonsultasi'); ?>">+ Tambah</a></p>
	<?php
	foreach ($allKonsultasi as $k) { ?>
	<a href="<?php echo base_url('index.php/KonsultasiController/konsulDetail/').$k['id_konsultasi'] ?>">
		From: <?php echo $k['username']; ?><br>
		Judul: <?php echo $k['judul']; ?><br>
		@ <?php echo $k['timestamp']; ?><br>
	</a>
	<?php } ?>
</div>
