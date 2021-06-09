<!DOCTYPE html>
<html>
<head>
	<title>Rakit Komputer</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/assets/css/style.css">
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
            <a class="navbar-brand mx-auto" href="<?= site_url('halaman_manajer') ?>">Rakit Komputer</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <div class="card mt-3 mb-3">
                <div class="card-header">
                <i class="fa fa-table"></i> Tanggal Transaksi</div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">See More</th>
                                <th scope="col">Export To PDF</th>
                                </tr>
                            </thead>
                            <tbody id="target">
                                <tr>
                                <tr><?php foreach($data_pesanan as $dp) : ?>
                                    <td scope="row"><?= $dp['tanggal_laporan']?></td>
                                    <td><a class="btn btn-primary" href="<?= site_url('ManajerController/laporanKeuangan/'.$dp['tanggal_laporan']) ?>" type="submit" style="border-radius: 10px;">See More</a></td></td>
                                    <td><a class="btn btn-success" href="<?= site_url('ManajerController/exportToPDF/'.$dp['tanggal_laporan']) ?>" type="submit" style="border-radius: 10px;">Export Data</a></td></td>
                                </tr><?php endforeach; ?>
                            </tbody>                   
                        </table>
                    </div>
                    </div>
                    <div class="card-footer small text-muted"> <?php echo $this->session->flashdata('info'); ?></div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->


    <!-- Tidak Ada Data Modal-->
    <div class="modal fade" id="done_pay" tabindex="-1" role="dialog" aria-labelledby="done_pay" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">No Result</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Transactions Not Found</div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Back</button>
          </div>
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
