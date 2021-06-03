<div class="container">
	<h1>Judul: <?php echo $properti_konsultasi['judul']; ?></h1>
	<h4>From: <?php echo $properti_konsultasi['username']; ?></h4>
	<h4>Date: <?php echo $properti_konsultasi['timestamp']; ?></h4>
	<?php
	foreach($komentar as $k) { ?>
	From: <?php echo $k['username']; ?><br>
	@ <?php echo $k['timestamp']; ?><br>
	Message: <?php echo $k['komentar']; ?><br>
	<?php } ?>
	<form method="POST" action="<?php echo base_url('index.php/postKomentar') ?>">
		<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
		<textarea name="komentar" id="" cols="50" rows="5"></textarea>
		<button type="submit" class="btn btn-primary mb-2">Kirim</button>
	</form>
</div>
