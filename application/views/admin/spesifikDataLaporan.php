<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= site_url('index_admin')?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?= site_url('laporan_keuangan')?>">Laporan Keuangan</a>
        </li>
        <li class="breadcrumb-item active">Spesifik Data</li>
      </ol>
      <div class="row">
        <div class="col-12">
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tanggal Pesanan</div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col">Nama Pelanggan</th>
                            </tr>   
                        </thead>
                        <tbody id="target">
                            <tr>
                            <tr><?php foreach($data_pesanan as $dp) : ?>
                                <td scope="row"><?= $dp['id']?></td>
                                <td scope="row"><?= $dp['Metode Pembayaran']?></td>
                                <td scope="row"><?= $dp['Nama Barang']?></td>
                                <td scope="row"><?= $dp['Harga Barang']?></td>
                                <td scope="row"><?= $dp['Nama Pelanggan']?></td>
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