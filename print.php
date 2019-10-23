<?php
session_start();
?>
<html>
    <head>
        <meta name="author" content="LordAldi">
        <meta name="description" content="A website by LordAldi">
        <title>Print KHS</title>
        <link rel="stylesheet" href="public/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="main1.css">
        
    </head>
 
    <body>
    <?php
        include_once("webvars.inc");
        $conn = mysqli_connect($hostname, $db_user, $db_password, $selected_db)
        or die("Connection failed: " . mysqli_connect_error());

        if(!(isset($_SESSION['username']) and ($_SESSION['password']))){
            header("Location: login.php");exit;
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


        if(isset($_POST['submit'])){
            $mk=array();   
            if($_POST['mk1']!=""){
                $mk[]=$_POST['mk1'];
                $nilai[]=$_POST['nilai1'];
            }
            if($_POST['mk2']!=""){
                $mk[]=$_POST['mk2'];
                $nilai[]=$_POST['nilai2'];

            }
            if($_POST['mk3']!=""){
                $mk[]=$_POST['mk3'];
                $nilai[]=$_POST['nilai3'];
            } 
            if($_POST['mk4']!=""){
                $mk[]=$_POST['mk4'];
                $nilai[]=$_POST['nilai4'];
            } 
            if($_POST['mk5']!=""){
                $mk[]=$_POST['mk5'];
                $nilai[]=$_POST['nilai5'];
            } 
            if($_POST['mk6']!=""){
                $mk[]=$_POST['mk6'];
                $nilai[]=$_POST['nilai6'];
            } 
            if($_POST['mk7']!=""){
                $mk[]=$_POST['mk7'];
                $nilai[]=$_POST['nilai7'];
            } 
            if($_POST['mk8']!=""){
                $mk[]=$_POST['mk8'];
                $nilai[]=$_POST['nilai8'];
            } 
            if($_POST['mk9']!=""){
                $mk[]=$_POST['mk9'];
                $nilai[]=$_POST['nilai9'];
            } 
            if($_POST['mk10']!=""){
                $mk[]=$_POST['mk10'];
                $nilai[]=$_POST['nilai10'];
            }         
            $total=0;
            for ($i=0; $i < count($mk) ; $i++){
                if($nilai[$i]>85){
                    $nilai[$i]='A';
                    
                }
                else if($nilai[$i]>70){
                    $nilai[$i]='B';
                    
                }
                else if($nilai[$i]>55){
                    $nilai[$i]='C';
                    
                }
                else if($nilai[$i]>40){
                    $nilai[$i]='D';
                
                }
                else {
                    $nilai[$i]='E';
                    
                }
            }
            
            for ($i=0; $i < count($mk) ; $i++){
                $query= "INSERT INTO khs (nim,mk,nilai) VALUES ('$nim','$mk[$i]','$nilai[$i]')";
                $result = mysqli_query($conn,$query);
                }
                    $query= "SELECT nilai FROM khs where nim = '$nim' ";
                    $result = mysqli_query($conn,$query);
                    $jumlah = array();
                    while ($data=mysqli_fetch_array($result)){
                        switch ($data['nilai']){
                            case 'A':
                            $jumlah[]=4;
                            
                            break;
                            case 'B':
                            $jumlah[]=3;
                            break;
                            case 'C':
                            $jumlah[]=2;
                            break;
                            case 'D':
                            $jumlah[]=1;
                            break;
                            case 'E':
                            $jumlah[]=0;
                            break;
                        }

                        
                    }
                    $total=0;

                    for ($i=0; $i < count($jumlah) ; $i++){
                        $total=$total+$jumlah[$i];
                    }
                    if(count($jumlah)>0){

                    $IP=$total/count($jumlah);

                    $query= "INSERT INTO mahasiswa (nama, nim,ipk) VALUES ('$nama','$nim',$IP)";
                    $result = mysqli_query($conn,$query);

                    
                    $query= "UPDATE mahasiswa SET ipk=$IP WHERE nim=$nim";
                    $result = mysqli_query($conn,$query);}
        }
        elseif(isset($_GET['edit'])){
            $edit_n=$_GET['edit_nilai'];
            $edit_mk=$_GET['edit_mk'];
            $idx = $_SESSION['tanda'];
            $query= "UPDATE mahasiswa SET nama='$nama' WHERE nim = '$nim'";
            $result = mysqli_query($conn,$query);
            $query= " UPDATE khs SET mk='$edit_mk', nilai='$edit_n' WHERE idx= '$idx' ";
            $result = mysqli_query($conn,$query);

            $query= "SELECT nilai FROM khs where nim = '$nim' ";
                        $result = mysqli_query($conn,$query);
                        while ($data=mysqli_fetch_array($result)){
                            switch ($data['nilai']){
                                case 'A':
                                $jumlah[]=4;
                                
                                break;
                                case 'B':
                                $jumlah[]=3;
                                break;
                                case 'C':
                                $jumlah[]=2;
                                break;
                                case 'D':
                                $jumlah[]=1;
                                break;
                                case 'E':
                                $jumlah[]=0;
                                break;
                            }

                            
                        }
                    
                        $total=0;

                        for ($i=0; $i < count($jumlah) ; $i++){
                            $total=$total+$jumlah[$i];
                        
                        }
                    

                        $IP=$total/count($jumlah);
                    
                        $query= " UPDATE mahasiswa SET ipk=$IP WHERE nim=$nim ";
                        $result = mysqli_query($conn,$query);

        }



    ?>
        <div class="container">
                <h1 id="headline" >KHS </h1>
            </div>
            <?php $query= "SELECT nama,nim FROM mahasiswa where nim = '$nim' ";
                                    $result = mysqli_query($conn,$query);
                                    $data = mysqli_fetch_array($result);
                            ?>
            <div class="container border border-secondary" id="main">

                <div class="container">
                
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">NAMA:</label>
                            <div class="col-sm-10">
                            <?php echo $data['nama'];?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="NIM" class="col-sm-2 col-form-label">NIM:</label>
                            <div class="col-sm-10">
                            <?php  echo $data['nim']; ?>
                            </div>
                        </div>

                    
                        <table class="table">
                            <thead class="" id="theadnew">
                                <tr>
                                <th scope="col" width="10%">No</th>
                                <th scope="col">Mata Kuliah</th>
                                <th scope="col" width="20%">Nilai</th>
                                <th scope="col" width="10%">Edit</th>
                                </tr>
                            </thead>
                            <tbody>


                            <?php
                            $query= "SELECT mk,nilai,idx FROM khs where nim = '$nim' ";
                            $result = mysqli_query($conn,$query);
                            $i=0;
                            $_SESSION["idx"]= array ();
                            while ($data=mysqli_fetch_array($result)){
                                $i=$i+1;
                                $_SESSION["idx"] [$i]= $data['idx'];
                                echo '<tr>
                                <th scope="row">'. $i .'</th>
                                <td>
                                    <div class="form-group row">'
                                    .$data['mk'].
                                    '</div>
                                </td>
                                <td><div class="form-group row">'
                                    .$data['nilai'].
                                    '</div>
                                </td>
                                <td><div class="form-group row">
                                    <a href="edit_data.php?idx='. $_SESSION["idx"] [$i].'">Edit</a>
                                    </div>
                                </td>
                                </tr>'
                                ;
                            }
                            
                            ?>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="index.php" role="button">Input Khs</a>
                        <a class="btn btn-primary" href="beranda.php" role="button">Beranda</a>
                        <?php
                        $query= "SELECT ipk FROM mahasiswa WHERE nim=$nim";
                        $result = mysqli_query($conn,$query);
                        $data=mysqli_fetch_array($result)
                        ?>
                        <center><h3> IPK = <?php echo $data['ipk'] ?> </h3> </center>
                </div>
            </div>




        <script type="text/javascript" src="public/vendor/jquery/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="public/vendor/popper/js/popper.min.js"></script>
        <script type="text/javascript" src="public/vendor/bootstrap/js/bootstrap.min.js"></script>    
    </body>     
</html>