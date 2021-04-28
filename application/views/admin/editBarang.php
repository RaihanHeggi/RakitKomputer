  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= site_url('index_admin')?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= site_url('data_barang')?>">Data Barang</a>
        </li>
        <li class="breadcrumb-item active">Edit Data Barang</li>
      </ol>
      <div class="ml-4 mr-4">
        <h1 class="mb-5">Form Edit Data Barang</h1>
        <form action="" method="post">
            <?php foreach($data_barang as $db) : ?>
            <div class="form-group">
                <input type="hidden" class="form-control" id="idbarang" value="<?= $db['id_barang'] ?>">
            </div>
            <div class="form-group">
                <label for="namabarang" style="font-weight:bold">NAMA BARANG</label>
                <input type="text" class="form-control" id="namabarang" placeholder="<?= $db['nama_barang']?>" required>
            </div>
            <div class="form-group">
                <label for="tipebarang" style="font-weight:bold">TIPE BARANG</label>
                <input type="text" class="form-control" id="tipebarang" placeholder="<?= $db['tipe_barang']?>" required>
            </div>
            <div class="form-group">
                <label for="merkbarang" style="font-weight:bold">MERK BARANG</label>
                <input type="text" class="form-control" id="merkbarang" placeholder="<?= $db['merk_barang']?>" required>
            </div>
            <div class="form-group">
                <label for="hargabarang" style="font-weight:bold">HARGA BARANG</label>
                <input type="text" class="form-control" id="hargabarang" placeholder="<?= $db['harga_barang']?>" required>
            </div>
            <div class="form-group">
                <label for="stokbarang" style="font-weight:bold">STOK BARANG</label>
                <input type="text" class="form-control" id="stokbarang" placeholder="<?= $db['stok_barang']?>" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3" style="width:100%">Submit</button>
        </form>
        <?php endforeach; ?>
      </div>

    </div>
    <!-- /.container-fluid-->