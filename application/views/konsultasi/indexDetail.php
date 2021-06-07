<div class="container">

	<div class="row">
		<div class="col-lg-12">
			<div class="wrapper wrapper-content">
				<div class="mt-5">
					<h3><b><?php echo $properti_konsultasi['judul']; ?></b></h3>
					<p>Diposting oleh <?php echo $properti_konsultasi['username']; ?> pada <?php echo $properti_konsultasi['timestamp']; ?></p>
					<div class="card">
						<div class="card-body">
							<?php 
							$n = 1;
							foreach($komentar as $k) { ?>
							<div class="card my-2">
								<?php if($this->session->userdata('username') == $k['username']) { ?>
								<div class="card-body bg-light">
								<?php } else { ?>
								<div class="card-body">
								<?php } ?>
									<p class="m-0">Dari: <?php echo $k['username']; ?></p>
									<small><?php echo $k['timestamp']; ?></small>
									<p class="m-0"><?php echo $k['komentar']; ?></p>
								</div>
								<?php if($k['username'] == $this->session->userdata('username')) { ?>
								<div class="card-footer">
									<button type="button" class="btn btn-secondary btn-sm" 
										data-toggle="modal" data-target="#edit-m-<?php echo $n; ?>">
										Edit
									</button>
									<?php if($n != 1) { ?>
									<button type="button" class="btn btn-danger btn-sm" 
										data-toggle="modal" data-target="#hapus-m-<?php echo $n; ?>">
										Hapus
									</button>
									<?php } ?>
								</div>
								<?php } ?>
							</div>
							<?php $n++; } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php $n=1;
	foreach($komentar as $k) {
		if($k['username'] == $this->session->userdata('username')) { ?>
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
	<?php $n++; } ?>
	<form class="form-group" method="POST" action="<?php echo base_url('index.php/konsultasi/postKomentar'); ?>">
		<div class="input-group mb-3">
			<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
  			<input name="komentar" type="text" class="form-control" placeholder="Balasan" 
			  aria-label="Balasan" aria-describedby="basic-addon2">
  			<div class="input-group-append">
    			<button class="btn btn-outline-primary" type="submit">Kirim</button>
  			</div>
		</div>
	</form>
</div>
