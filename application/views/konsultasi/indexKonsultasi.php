<div class="container">
	<p>Now time <?php echo date("Y-m-d H:i:s"); ?></p>
	<p><?php print_r($this->session->userdata()); ?></p>
	<h1>Konsultasi Page</h1>

	<?php if($this->session->userdata('Status') == 'User') { ?>
	<p><a href="<?php echo base_url('index.php/KonsultasiController/postKonsultasi'); ?>">+ Tambah</a></p>
	<?php } ?>

	<?php
	foreach ($allKonsultasi as $k) { ?>
	<a href="<?php echo base_url('index.php/KonsultasiController/konsulDetail/').$k['id_konsultasi'] ?>">
		From: <?php echo $k['username']; ?><br>
		Judul: <?php echo $k['judul']; ?><br>
		@ <?php echo $k['timestamp']; ?><br>
	</a>
	<?php } ?>
</div>
