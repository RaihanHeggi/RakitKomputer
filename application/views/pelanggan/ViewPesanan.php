<!DOCTYPE html>
<html>
<head>
	<title>Rakit Komputer</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/assets/css/style.css">
    <link href="<?php echo $this->config->item('base_url'); ?>/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
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
            <a class="navbar-brand mx-auto" href="<?= site_url('PelangganController') ?>">Rakit Komputer</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= site_url('halaman_pesanan') ?>"><i class="fa fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('halaman_index') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> PESANAN YANG ANDA MILIKI</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Harga Barang</th>
                                    <th scope="col">Status Bayar</th>
                                    <th scope="col">Verifikasi Pembayaran</th>
                                </tr>   
                                </thead>
                                <tbody id="target">
                                    <tr>
                                        <tr><?php foreach($data_pesanan as $dp) : ?>
                                            <td scope="row"><?= $dp['id']?></td>
                                            <td scope="row"><?= $dp['nama_barang']?></td>
                                            <td scope="row"><?= $dp['harga']?></td>
                                            <td scope="row"><?= $dp['status']?></td>  
                                            <td><button class="btn btn-primary" type="submit" style="border-radius: 10px;"  data-toggle="modal" data-target="#edit-data<?php echo $dp['id'] ?>" > Verifikasi Bayar</button></td>
                                        </tr><?php endforeach; ?>
                                </tbody>                   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php foreach($data_pesanan as $dp) :?>
    <div class="modal fade" id="edit-data<?php echo $dp['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verifikasi Pembayaran</h4>
                </div>
                <form class="form-horizontal" action="<?= site_url('PesananController/updateData')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <input name = "id" type ="hidden" value="<?php echo $dp['id']; ?>">
                        <div class="form-group">
                            <label for="role">Metode Pembayaran</label>
                            <br>
                            <select name="metode" id="metode" style="width:100%;height:40px" required>
                                <option value="Transfer Bank">Transfer</option>
                                <option value="Cash On Delivery">COD</option>
                            </select>
                            <br><br>
                        </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
                                    
   
</body>
</html>