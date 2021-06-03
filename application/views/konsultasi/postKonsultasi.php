<div class="container">
	<h1>Post Konsultasi</h1>

	<div class="col-sm-10" id="form_konsultasi">
		<form method="POST" action="<?php echo base_url('index.php/konsultasi') ?>">
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Judul</label>
				<div class="col-sm-10">
					<input name="judul" type="text" class="form-control" id="staticEmail" value="">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Keluhan</label>
				<div class="col-sm-10">
					<textarea name="komentar" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm">
					<button type="submit" class="btn btn-primary mb-2">Kirim</button>
				</div>
			</div>
		</form>
	</div>


</div>
