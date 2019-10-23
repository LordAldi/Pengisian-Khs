<html>
<head>
        <meta name="author" content="LordAldi">
        <meta name="description" content="A website by LordAldi">
        <title>Pengisian KHS</title>
        <link rel="stylesheet" href="public/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="main1.css">
</head>
<body>
<?php
    include_once("webvars.inc");
    $conn = mysqli_connect($hostname, $db_user, $db_password, $selected_db)
    or die("Connection failed: " . mysqli_connect_error());

    if(isset($_POST['signup'])){
        $nama=$_POST['nama'];
        $nim=$_POST['nim'];
        $username=$_POST['username'];
        $password=$_POST['password'];

        $query= "select * from mahasiswa where nim= '$nim'";
        $result = mysqli_query($conn,$query);
        $data=mysqli_fetch_array($result);
        $query= "select * from mahasiswa where username= '$username'";
        $result = mysqli_query($conn,$query);
        $data1=mysqli_fetch_array($result);

        if(isset ($data['nim']) or ($data1['username']))
        {
            echo "nim atau username sudah terdaftar harap ganti";
        }
        else{
            $query= "insert into mahasiswa (nama,nim,username,password)values ('$nama','$nim','$username','$password')";
            $result = mysqli_query($conn,$query);
            echo "selamat ".$nama." sudah terdaftar";
        }


        
    }
?>
<div class="container">
            <h1 id="headline" >Sign Up </h1>
        </div>
        
        <div class="container border border-secondary" id="main">

            <div class="container">
                <form method="post" action="signup.php">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nim" placeholder="NIM">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">USERNAME</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">PASSWORD</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="password">
                        </div>
                    </div>
                    <input class="btn btn-primary"    type="submit" name="signup" value="Sign up">
                    <p>Sudah punya akun silahkan </p>
                    <a class="btn btn-primary" href="login.php" role="button">Login</a>
                </form>
            </div>
        </div>
</body>
</html>