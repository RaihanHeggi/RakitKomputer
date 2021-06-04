<div class="container">
	<h1>Judul: <?php echo $properti_konsultasi['judul']; ?></h1>
	<h4>From: <?php echo $properti_konsultasi['username']; ?></h4>
	<h4>Date: <?php echo $properti_konsultasi['timestamp']; ?></h4>
	<?php $n=1;
	foreach($komentar as $k) { ?>
	From: <?php echo $k['username']; ?><br>
	@ <?php echo $k['timestamp']; ?><br>
	Message: <?php echo $k['komentar']; ?><br>
	<?php if($k['username'] == $this->session->userdata('username')) { ?>
	<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-m-<?php echo $n; ?>">
		Edit
	</button>
	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-m-<?php echo $n; ?>">
		Hapus
	</button><br>

	<!-- Modal Edit -->
	<div id="edit-m-<?php echo $n; ?>" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<form method="POST" action="<?php echo base_url('index.php/konsultasi/editkomen'); ?>">
				<div class="modal-header">
					<h5 class="modal-title">Edit Komentar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-10">
						<input type="hidden" name="id" value="<?php echo $k['id_komentar']; ?>">
						<textarea name="komentar" class="form-control" id="exampleFormControlTextarea1"
							rows="5"><?php echo $k['komentar']; ?></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Simpan perubahan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- End of modal edit -->

	<!-- Modal hapus -->
	<div id="hapus-m-<?php echo $n; ?>" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="post" action="<?php echo base_url('index.php/konsultasi/deleteKomentar'); ?>">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Komentar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" value="<?php echo $k['id_komentar']; ?>">
					Anda yakin untuk menghapus balasan anda?
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Ya</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End of modal hapus -->
	<hr>
	<?php $n++; } ?>
	<form method="POST" action="<?php echo base_url('index.php/konsultasi/postKomentar'); ?>">
		<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
		<textarea name="komentar" id="" cols="50" rows="5"></textarea>
		<button type="submit" class="btn btn-primary mb-2">Kirim</button>
	</form>
</div>
