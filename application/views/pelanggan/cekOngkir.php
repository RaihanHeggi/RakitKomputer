<!DOCTYPE html>
<html>
<head>
	<title>Rakit Komputer</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/assets/css/style_ongkir.css">
    <link href="<?php echo $this->config->item('base_url'); ?>/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark pt-3 pb-3">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">    
                    <a class="nav-link" href="#">Logo Place </a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="<?= site_url('PelangganController') ?>">Rakit Komputer</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('tabel_konsultan') ?>">Konsultasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('halaman_pesanan') ?>"><i class="fa fa-shopping-cart"></i> Cart </a>
                </li>
                <li class="nav-item dropdown">
                  <div class="dropdown-menu"aria-labelledby="navbarDropdown">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('profile_pelanggan') ?>">Profile</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>Logout
                        </a>
                    </li>
                  </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4 ">
            <div class="row">
                <div class=" mx-auto col-md-10">
                    <h2>Cek Ongkir via Pos Indonesia</h2>
                    <form id="cekOngkirForm" action="<?= site_url('Cek_Ongkir/hasilOngkir') ?>" method="post">
                        <div class="form-group">
                          <label for="asal">Kota/Kabupaten Asal: <span class="text-danger"><strong>*</strong></span></label>
                          <select class="form-control" name="kota_asal" id="kota-asal">
                            <option value="">&mdash; Pilih Kota/Kabupaten Asal &mdash;</option>
                            <?php foreach ($city as $c): ?>
                                <option value="<?=$c['city_id']?>"><?=$c['type']?> <?=$c['city_name']?></option>
                            <?php endforeach; ?>   
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="tujuan">Kota/Kabupaten Tujuan: <span class="text-danger"><strong>*</strong></span></label>
                          <select class="form-control" name="kota_tujuan" id="kota-tujuan">
                            <option value="">&mdash; Pilih Kota/Kabupaten Tujuan &mdash;</option>
                            <?php foreach ($city as $c): ?>
                                <option value="<?=$c['city_id']?>"><?=$c['type']?> <?=$c['city_name']?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="berat">Berat Barang: <span class="text-danger"><strong>*</strong></span></label>
                          <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat barang (dalam satuan gram)">
                        </div>
                        <p><span class="text-danger"><strong>*</strong></span>) Wajib Diisi</p>
                        <button type="submit" class="btn btn-primary mb-3" style="width:100%">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-md-12" id="hasil-resi-wrapper"></div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= site_url('logout') ?>">Logout</a>
            </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/js/sb-admin-datatables.min.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/js/sb-admin-charts.min.js"></script>
</body>
</html>
