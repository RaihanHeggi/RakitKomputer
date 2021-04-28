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
        <li class="breadcrumb-item active">Tambah Barang</li>
      </ol>
      <div class="ml-4 mr-3">
        <h1 class="mb-5">Form Tambah Data Barang</h1>
        <form action="" method="">
            <div class="form-group">
                <label for="namabarang" style="font-weight:bold">NAMA BARANG</label>
                <input type="text" class="form-control" id="namabarang" placeholder="Masukkan Nama Barang" required>
            </div>
            <div class="form-group">
                <label for="tipebarang" style="font-weight:bold">TIPE BARANG</label>
                <input type="text" class="form-control" id="tipebarang" placeholder="Masukkan Tipe Barang" required>
            </div>
            <div class="form-group">
                <label for="merkbarang" style="font-weight:bold">MERK BARANG</label>
                <input type="text" class="form-control" id="merkbarang" placeholder="Masukkan Merk Barang" required>
            </div>
            <div class="form-group">
                <label for="hargabarang" style="font-weight:bold">HARGA BARANG</label>
                <input type="text" class="form-control" id="hargabarang" placeholder="Masukkan Harga Barang" required>
            </div>
            <div class="form-group">
                <label for="stokbarang" style="font-weight:bold">STOK BARANG</label>
                <input type="text" class="form-control" id="stokbarang" placeholder="Masukan Stok Barang" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3" style="width:100%">Submit</button>
        </form>
      </div>

    </div>
    <!-- /.container-fluid-->