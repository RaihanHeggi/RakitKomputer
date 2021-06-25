<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="wrapper wrapper-content">
				<div class="mt-5">
					<?php if($this->session->userdata('Role') == 'Pelanggan') { ?>
					<div class="d-inline">
						<div class="card">
							<div class="card-header">
								<h4><b>Konsultasi</b></h4>
							</div>
						</div>
						<p><a type=" button" class="btn btn-primary mt-4 ml-2" href="<?php echo base_url('index.php/konsultasi/tambah'); ?>">+ Buat Konsultasi</a></p>
					</div>
					<?php } ?>
				</div>
				<div id="threads">
					<?php
					foreach ($allKonsultasi as $k) { ?>
					<a class="link-dark" style="color:black;"
						onMouseOver="this.style.color='#3366BB'"
   						onMouseOut="this.style.color='#000000'"
						href="<?php echo base_url('index.php/konsultasi/konsulDetail/').$k['id_konsultasi'] ?>">
					<div class="card my-2">
						<div class="card-body py-0">
							<p class="mt-1 mb-1"><strong><?php echo $k['judul']; ?></strong></p>
							<p class="mb-2">Diposting oleh <?php echo $k['username']; ?> pada <?php echo $k['timestamp']; ?>.</p>
						</div>
					</div>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
