<?php
session_start();
?>

<html>
    <head>
        <meta name="author" content="LordAldi">
        <meta name="description" content="A website by LordAldi">
        <title>Login</title>
        <link rel="stylesheet" href="public/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="main1.css">
        
    </head>
 
    <body>
    <?php 
        include_once("webvars.inc");
        $conn = mysqli_connect($hostname, $db_user, $db_password, $selected_db)
        or die("Connection failed: " . mysqli_connect_error());
        if(isset($_POST['logout'])){
            echo "logout berhasil";
            session_unset();
            session_destroy();
        }
        if(isset($_POST['login'])){
            $username_lg = $_POST['username_lg'];
            $password_lg = $_POST['password_lg'];
            $query= "select * from mahasiswa where username = '$username_lg' and password = '$password_lg'";
            $result = mysqli_query($conn,$query);
            $data=mysqli_fetch_array($result);
            if(isset($data['username']) or ($data['password'])){
                $_SESSION['username']=$_POST['username_lg'];
                $_SESSION['password']=$_POST['password_lg'];
                header("Location: beranda.php");
                exit;
            }
            else{
                echo "pass atau username salah";
            }
        }
    ?>
    <div class="container">
            <h1 id="headline" >Login</h1>
        </div>
    <div class="container border border-secondary" id="main">

<div class="container" style="width:50%">

    <div class="container">
                    <form method="post" action="login.php">
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">username</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="username_lg" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">password</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" name="password_lg" placeholder="Password">
                            </div>
                        </div>
                       <center> <input class="btn btn-primary"    type="submit" name="login" value="Login"></center>
                       <p>Jika belum punya akun </p>
                    <a class="btn btn-primary" href="signup.php" role="button">Sign Up</a>
                    </form>
    </div>
        <script type="text/javascript" src="public/vendor/jquery/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="public/vendor/popper/js/popper.min.js"></script>
        <script type="text/javascript" src="public/vendor/bootstrap/js/bootstrap.min.js"></script>    
    </body>     
    
</html>