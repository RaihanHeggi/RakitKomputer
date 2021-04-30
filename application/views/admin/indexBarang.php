  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= site_url('index_admin')?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Barang</li>
      </ol>
      <div>
        <a class="btn btn-primary mr-3 mb-3" href="<?= site_url('tambah_barang') ?>" role="button">Tambah Data Barang</a>
      </div>
      <div class="row">
        <div class="col-12">
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Barang Di Inventory</div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Tipe Barang</th>
                        <th scope="col">Merk Barang</th>
                        <th scope="col">Harga Barang</th>
                        <th scope="col">Stok Barang</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody id="target">
                        <tr>
                          <tr><?php foreach($data_barang as $db) : ?>
                            <td scope="row"><?= $db['id_barang']?></td>
                            <td scope="row"><?= $db['nama_barang']?></td>
                            <td scope="row"><?= $db['tipe_barang']?></td>
                            <td scope="row"><?= $db['merk_barang']?></td>
                            <td scope="row"><?= $db['harga_barang']?></td>
                            <td scope="row"><?= $db['stok_barang']?></td>
                            <td><a class="btn btn-primary" href="<?= site_url('AdminController/editBarang/'.$db['id_barang'])?>" type="submit" style="border-radius: 10px;">Edit</a></td>
                            <td><a class="btn btn-danger" href="<?=  site_url('AdminController/FuncDeleteData/'.$db['id_barang']) ?>" type="submit" style="border-radius: 10px;">Delete</a></td></td>
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