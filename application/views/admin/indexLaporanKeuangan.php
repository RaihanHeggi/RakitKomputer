<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= site_url('index_admin')?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Laporan Keuangan</li>
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
                        <th scope="col">Tanggal</th>
                        <th scope="col">See More</th>
                        </tr>
                    </thead>
                    <tbody id="target">
                        <tr>
                        <tr><?php foreach($data_pesanan as $dp) : ?>
                        <td scope="row"><?= $dp['tanggal']?></td>
                        <td><a class="btn btn-primary" href="<?= site_url('AdminController/dataLaporan/'.$dp['tanggal']) ?>" type="submit" style="border-radius: 10px;">See More</a></td></td>
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