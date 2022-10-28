<?php
require "config.php";
if(isset($_GET['id'])){
    $query = mysqli_query($db,"SELECT * FROM pengguna WHERE id=$_GET[id]");
    $result = mysqli_fetch_assoc($query);
    $Fullname = $result['Fullname'];
    $rUsername = $result['rUsername'];
    $rPassword = $result['rPassword'];
    $konfirpass = $result['konfirpass'];
    $BirthDate = $result['BirthDate'];
    $Gender = $result['Gender'];
}

if(isset($_POST['submit'])){
    $query = mysqli_query($db,"UPDATE pengguna SET Fullname='$_POST[Fullname]',rUsername='$_POST[rUsername]',rPassword='$_POST[rPassword]',konfirpass='$_POST[konfirpass]',BirthDate='$_POST[BirthDate]',Gender='$_POST[Gender]' WHERE id=$_GET[id]");
    if($query){
        header("Location:index.php");
    } else {
        echo "Update gagal";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dyphoto</title>
    <link rel="stylesheet" href="stylesheet/php-style.css">
</head>
<body>
        <h1 class="judul">Pengguna dyphoto</h1>
    
    <div class="form-class">
        <h3>Edit Data Pengguna</h3>
        <form action="" method="post">
        
            <label for="">Fullname</label><br>
            <input type="text" name="Fullname" class="form-text" value='<?=$Fullname?>'><br><br> 
        
            <label for="">Username</label><br>
            <input type="text" name="rUsername" class="form-text" value='<?=$rUsername?>'><br><br>
                
            <label for="">Password</label><br>
            <input type="password" name="rPassword" class="form-text" value='<?=$rPassword?>'><br><br>
                
            <label for="">Konfirmasi Password</label><br>
            <input type="password" name="konfirpass" class="form-text" value='<?=$konfirpass?>'><br><br>
        
            <label for="">Birth Date</label><br>
            <input type="date" name="BirthDate" class="form-text" value='<?=$BirthDate?>'><br><br>
        
            <input type="radio" name="Gender" value='<?=$Gender?>'>
            <label for="gender">Laki-Laki</label><br><br>
        
            <input type="radio" name="Gender" value='<?=$Gender?>'>
            <label for="gender">Perempuan</label><br><br>
                
            <br><br>
            <label for="nama_file">Nama File</label>
            <input type="text" name="nama_file" class="form-text">
                
            <br><br>
            <label for="">File</label>
            <input type="file" name="File_masuk" class="form-text"><br>
                
            <br><br>
            <input type="submit" name="submit" value="Submit" class="btn-submit">
        
        </form>
    </div>

</body>
</html>