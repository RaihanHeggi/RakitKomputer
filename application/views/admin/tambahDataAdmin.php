<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= site_url('index_admin')?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data</li>
      </ol>
      <div class="ml-4 mr-3">
        <h1 class="mb-5">Form Tambah Data Admin/Manajer</h1>
        <?php echo $this->session->flashdata('info'); ?>
        <form action="<?= site_url('RegisterController/registerData') ?>" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>
            <div class="form-group">
                <label>Re-Password</label>
                <input type="password" name="re-password" class="form-control" placeholder="Masukkan Kembali Password" required>
            </div>
            <div class="form-group">
                <label>Alamat Pengiriman</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Pengiriman" required>
            </div>
            <div class="form-group">
                <label for="role">Tambahkan Sebagai</label>
                <br>
                <select name="role" id="role" style="width:100%;height:40px" required>
                <option value="Manajer">Manajer</option>
                <option value="Admin">Admin</option>
                </select>
                 <br><br>
            </div>                    
            <button type="submit" class="btn btn-primary mb-3" style="width:100%">Submit</button>
        </form>
    </div>
    <!-- /.container-fluid-->