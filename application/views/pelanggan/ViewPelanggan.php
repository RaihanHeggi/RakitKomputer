<!DOCTYPE html>
<html>
<head>
	<title>Rakit Komputer</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/assets/css/style_main_pelanggan.css">
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
                    <li class="nav-item">
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
  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url('https://images.unsplash.com/photo-1570451488142-71d08e1511e3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmV1dHJhbHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80'); background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="text-center white-text mt-5 mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Selamat Datang Pelanggan Di Website Rakit Komputer</strong>
              </h1>
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
      <div class="view" style="background-image: url('https://images.unsplash.com/photo-1570451488142-71d08e1511e3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmV1dHJhbHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80'); background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="text-center white-text mt-5 mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Selamat Berbelanja Di Website Kami</strong>
              </h1>
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
      <div class="view" style="background-image: url('https://images.unsplash.com/photo-1570451488142-71d08e1511e3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmV1dHJhbHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80'); background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="text-center white-text mt-5 mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Rakit Komputer Menyediakan Kebutuhan Anda</strong>
              </h1>
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
      </div>
      <!--/Third slide-->
    </div>

    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
  </div>
  <!--/.Carousel Wrapper-->


  <!--Main layout-->
  <main>
    <div class="container">
        <!--Section: Products v.3-->
        <section class="text-center mt-4 mb-4">
            <!--Grid row-->        
            <div class="row">
            <?php foreach($data_barang as $db) : ?>
                    <div class="col-3 mb-4">
                        <!--Card-->
                        <div class="card">
                            <!--Card image-->
                            <div class="view overlay">
                                <img src="https://dynamic.brandcrowd.com/asset/logo/c5fdd617-ad9c-4dea-bc97-72d48e2cc66f/logo?v=4" class="card-img-top" alt="">
                                <a>
                                <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--Card image-->
                            <!--Card content-->
                            <div class="card-body text-center">
                                <!--Category & Title-->
                                <a href="" class="grey-text">
                                    <h5><?= $db['nama_barang']?></h5>
                                </a>
                                <h5>
                                <strong>
                                    <a href="" class="dark-grey-text"><?= $db['merk_barang']?></a>
                                </strong>
                                </h5>
                                <h4 class="font-weight-bold blue-text">
                                    <strong>Rp <?=$db['harga_barang'] ?></strong>
                                </h4>
                                <a class="btn btn-primary" href="<?= site_url('PelangganController/addPesanan/'.$db['id_barang'])?>" type="submit" style="border-radius: 10px;">Beli</a>
                            </div>
                            <!--Card content-->
                        </div>
                        <!--Card-->
                    </div>
            <?php endforeach?>
            </div>
            <!--Grid row-->
            
        </section>
    </div>
  </main>
  <!--Main layout-->

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
            <a class="btn btn-primary" href="<?= site_url('halaman_index') ?>">Logout</a>
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