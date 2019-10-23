<?php
session_start();
?>
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
    if(isset($_SESSION['username']) and ($_SESSION['password'])){
        $username_lg = $_SESSION['username'];
        $password_lg =$_SESSION['password'];
        $query= "select * from mahasiswa where username = '$username_lg' and password = '$password_lg'";
        $result = mysqli_query($conn,$query);
        $data=mysqli_fetch_array($result);
?>
<div class="container">
            <h1 id="headline" >Pengisian KHS </h1>
        </div>
        
        <div class="container border border-secondary" id="main">

            <div class="container">
                <form method="post" action="print.php">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-10">
                        <?php echo $data['nama'];?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                        <?php echo $data['nim'];?>
                        </div>
                    </div>

                   
                    <table class="table">
                        <thead class="" id="theadnew">
                            <tr>
                            <th scope="col" width="10%">No</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col" width="20%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>
                                <div class="form-group row">
                                <input type="text" class="form-control" name="mk1">
                                </div>
                            </td>
                            <td><div class="form-group row">
                                <input type="number" class="form-control" name="nilai1">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>
                                <div class="form-group row">
                                <input type="text" class="form-control" name="mk2">
                                </div>
                            </td>
                            <td><div class="form-group row">
                                <input type="number" class="form-control" name="nilai2">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>
                                <div class="form-group row">
                                <input type="text" class="form-control" name="mk3">
                                </div>
                            </td>
                            <td><div class="form-group row">
                                <input type="number" class="form-control" name="nilai3">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">4</th>
                            <td>
                                <div class="form-group row">
                                <input type="text" class="form-control" name="mk4">
                                </div>
                            </td>
                            <td><div class="form-group row">
                                <input type="number" class="form-control" name="nilai4">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">5</th>
                            <td>
                                <div class="form-group row">
                                <input type="text" class="form-control" name="mk5">
                                </div>
                            </td>
                            <td><div class="form-group row">
                                <input type="number" class="form-control" name="nilai5">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">6</th>
                            <td>
                                <div class="form-group row">
                                <input type="text" class="form-control" name="mk6">
                                </div>
                            </td>
                            <td><div class="form-group row">
                                <input type="number" class="form-control" name="nilai6">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">7</th>
                            <td>
                                <div class="form-group row">
                                <input type="text" class="form-control" name="mk7">
                                </div>
                            </td>
                            <td><div class="form-group row">
                                <input type="number" class="form-control" name="nilai7">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">8</th>
                            <td>
                                <div class="form-group row">
                                <input type="text" class="form-control" name="mk8">
                                </div>
                            </td>
                            <td><div class="form-group row">
                                <input type="number" class="form-control" name="nilai8">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">9</th>
                            <td>
                                <div class="form-group row">
                                <input type="text" class="form-control" name="mk9">
                                </div>
                            </td>
                            <td><div class="form-group row">
                                <input type="number" class="form-control" name="nilai9">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">10</th>
                            <td>
                                <div class="form-group row">
                                <input type="text" class="form-control" name="mk10">
                                </div>
                            </td>
                            <td><div class="form-group row">
                                <input type="number" class="form-control" name="nilai10">
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                    <input class="btn btn-primary"    type="submit" name="submit" value="Cetak KHS">
                    <a class="btn btn-primary" href="login.php" role="button">Login</a>
                    <a class="btn btn-primary" href="beranda.php" role="button">Beranda</a>
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
    }?>    
</body>
</html>