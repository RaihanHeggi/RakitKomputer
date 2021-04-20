<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/assets/css/style.css">
</head>
<body class="bodyLogin">  
    <nav class="navbar navbar-expand-md navbar-dark bg-dark pt-3 pb-3 ">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">    
                    <a class="nav-link" href="#">Logo Place</a>
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
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('login') ?>">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="grid">
        <div class="grid-left">
            <h1 id="LoginHeader">Menu Register</h1>
            <div class="login_card">
                <form action="<?= site_url('RegisterController/registerData') ?>" method="post">
                    <label>Email</label>
                    <input type="text" name="email" class="form_login" placeholder="Masukkan Email" required>
                    <label>Username</label>
                    <input type="text" name="username" class="form_login" placeholder="Masukkan Username" required>
                    <label>Password</label>
                    <input type="password" name="password" class="form_login" placeholder="Masukkan Password" required>
                    <label>Re-Password</label>
                    <input type="password" name="re-password" class="form_login" placeholder="Masukkan Kembali Password" required>
                    <label for="role">Mendaftar Sebagai</label>
                    <br>
                    <select name="role" id="role" required>
                      <option value="Konsultan">Konsultan</option>
                      <option value="Pelanggan">Pelanggan</option>
                    </select>
                    <br><br>
                    <input type="submit" class="buttonLogin" value="LOGIN">
                </form>
            </div>
        <div>
    <div>
    <footer></footer>
</body>
</html>