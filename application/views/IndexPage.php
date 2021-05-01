<!DOCTYPE html>
<html>
<head>
	<title>Rakit Komputer</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark pt-3 pb-3">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">    
                    <a class="nav-link" href="#">Logo Place </a>
                </li>
                <li class="nav-item">    
                    <a class="nav-link" href="#">Left</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="//codeply.com">Codeply</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="<?= site_url('halaman_index') ?>">Rakit Komputer</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('login') ?>">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron">
        <h1 class="display-4">Hello, There!</h1>
        <p class="text-center lead" style="font-size:25px">Selamat Berbelanja Di Website Kami</p>
        <hr class="my-4">
        <p></p>
        <p></p>
    </div>
    <div class="mx-auto mt-2" style="width: 40 rem;font-family: proxima_nova,Helvetica Neue,Helvetica,Arial,sans-serif;">
        <h1 style="font-size:80px">SELAMAT DATANG DI RAKIT KOMPUTER</h1>
    </div>
    
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Rakit Komputer</small>
        </div>
      </div>
    </footer>
</body>
</html> 