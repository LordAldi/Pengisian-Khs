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
          if(!(isset($_SESSION['username']) and ($_SESSION['password']))){
            header("Location: login.php");
            exit;
        }
        else{
            $username_lg = $_SESSION['username'];
            $password_lg = $_SESSION['password'];
            $query= "select * from mahasiswa where username = '$username_lg' and password = '$password_lg'";
            $result = mysqli_query($conn,$query);
            $data=mysqli_fetch_array($result);
            $nim=$data['nim'];
            $nama=$data['nama'];

        }
    ?>
    <div class="container">
            <h1 id="headline" >EDIT DATA</h1>
        </div>
    <div class="container border border-secondary" id="main">

<div class="container" style="width:50%">

    <div class="container">
                    <form method="get" action="print.php">
                    <?php 
                    $_SESSION["tanda"]=$_GET['idx'];
                    $idx =  $_SESSION["tanda"];
                    $query= " SELECT mk,nilai,idx FROM khs where idx = '$idx' ";
                    $result = mysqli_query($conn,$query);
                    while ($data=mysqli_fetch_array($result)){
                    ?>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="edit_nama" value="<?php echo $nama ?>" placeholder="Nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="edit_NIM" value="<?php echo $nim ?>" placeholder="NIM" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="NIM" class="col-sm-2 col-form-label">MATA KULIAH</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="edit_mk" value="<?php echo $data["mk"]?>" placeholder="NIM" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="NIM" class="col-sm-2 col-form-label">NILAI</label>
                            <div class="col-sm-10">
                            <select name="edit_nilai" class="form-control">
                                <option value ="<?php echo $data["nilai"]?>"><?php echo $data["nilai"]?></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                
                            </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="NIM" class="col-sm-2 col-form-label">NILAI</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="edit_nilai" value="<?php echo $data["nilai"]?>" placeholder="NIM" >
                            </div> -->
                        </div>
                    <?php } ?>
                       <center> <input class="btn btn-primary"    type="submit" name="edit" value="Cetak KHS"></center>
                    </form>
    </div>




        <script type="text/javascript" src="public/vendor/jquery/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="public/vendor/popper/js/popper.min.js"></script>
        <script type="text/javascript" src="public/vendor/bootstrap/js/bootstrap.min.js"></script>    
    </body>     
</html>