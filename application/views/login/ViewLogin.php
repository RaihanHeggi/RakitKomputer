<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
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
            <div class = "foto">
                <img src="<?php echo $this->config->item('base_url'); ?>/assets/img/loginBackground.jpg">
            </div>
        </div>
        <div class="grid-right">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1" d="M0,288L26.7,272C53.3,256,107,224,160,229.3C213.3,235,267,277,320,293.3C373.3,309,427,299,480,245.3C533.3,192,587,96,640,80C693.3,64,747,128,800,144C853.3,160,907,128,960,112C1013.3,96,1067,96,1120,85.3C1173.3,75,1227,53,1280,80C1333.3,107,1387,181,1413,218.7L1440,256L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path>
            </svg>
            <h1 id="LoginHeader">Selamat</br>Datang</h1>
            <div class="login_card">
                <form action="" method="post">
                    <label>Username/Email</label>
                    <input type="text" name="username" class="form_login" placeholder="Masukkan Username atau Email">
        
                    <label>Password</label>
                    <input type="password" name="password" class="form_login" placeholder="Masukkan Password">
        
                    <div class="signUp">
                        <p>Belum Mempunyai Akun ? <span><a href="<?= site_url('a') ?>" style="color: #17A1EF;">Register</a></span></p>
                    </div>
                    <input type="submit" class="buttonLogin" value="LOGIN">
                </form>
            </div>
        <div>
    <div>
    <footer></footer>
 
</body>
</html>