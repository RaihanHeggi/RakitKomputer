<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= site_url('index_admin')?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Pelanggan</li>
      </ol>
      <div class="row">
        <div class="col-12">
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Pelanggan</div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody id="target">
                        <tr>
                          <tr><?php foreach($data_pelanggan as $dp) : ?>
                            <td scope="row"><?= $dp['id']?></td>
                            <td scope="row"><?= $dp['nama']?></td>
                            <td scope="row"><?= $dp['username']?></td>
                            <td scope="row"><?= $dp['email']?></td>
                            <td scope="row"><?= $dp['alamat']?></td>
                          </tr><?php endforeach; ?>
                    </tbody>                   
                </table>
            </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->