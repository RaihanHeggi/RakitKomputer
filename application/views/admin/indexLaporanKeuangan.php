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
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Status Belanja</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Cek Transaksi</th>
                        <th scope="col">Tambah Ke Laporan</th>
                        </tr>
                    </thead>
                    <tbody id="target">
                        <tr>
                        <tr><?php foreach($data_pesanan as $dp) : ?>
                        <td scope="row"><?= $dp['nama_pelanggan']?></td>
                        <td scope="row"><?= ucwords(strtolower($dp['status']))?></td>
                        <td scope="row"><?= $dp['tanggal']?></td>
                        <?php if( $dp['status'] == 'SUDAH BAYAR') :?>
                          <td><a class="btn btn-primary" href="<?= site_url('AdminController/dataLaporan/'.$dp['tanggal']) ?>" type="submit" style="border-radius: 10px;">See More</a></td></td>
                          <td><a class="btn btn-primary" href="<?= site_url('AdminController/addLaporan/'.$dp['tanggal']) ?>" type="submit" style="border-radius: 10px;">Tambah</a></td></td>
                        <?php else: ?>
                          <td><a class="btn btn-warning" type="submit" style="border-radius: 10px;"  data-toggle="modal" data-target="#done_pay">See More</a></td></td>
                          <td><a class="btn btn-warning" type="submit" style="border-radius: 10px;"  data-toggle="modal" data-target="#done_pay">Tambah</a></td></td>
                        <?php endif ?>
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
          <div class="modal-body">Transactions Not Completed</div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Back</button>
          </div>
        </div>
      </div>
    </div>