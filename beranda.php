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
    if(isset($_SESSION['username']) and ($_SESSION['password'])){
        $username_lg = $_SESSION['username'];
        $password_lg =$_SESSION['password'];
        $query= "select * from mahasiswa where username = '$username_lg' and password = '$password_lg'";
        $result = mysqli_query($conn,$query);
        $data=mysqli_fetch_array($result);
    ?>
    <div class="container border border-secondary" id="main">
        <div class="container text-center">
            <h4>Nama: <?php echo $data['nama'];?></h4>
            <h4>NIM: <?php echo $data['nim'];?></h4>
            
            <a class="btn btn-primary" href="index.php" role="button">Input Khs</a>
            <a class="btn btn-primary" href="print.php" role="button">Cetak Khs</a>
            <form method="post" action="login.php">
                <div class="form-group row">
                    <input class="btn btn-primary"    type="submit" name="logout" value="Logout">
                </div>
            </form>
        </div>
    </div>

        <script type="text/javascript" src="public/vendor/jquery/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="public/vendor/popper/js/popper.min.js"></script>
        <script type="text/javascript" src="public/vendor/bootstrap/js/bootstrap.min.js"></script>    
    <?php }
    else{
        header("Location: login.php");
        exit;
    }
    ?>
    </body>     
    
</html>