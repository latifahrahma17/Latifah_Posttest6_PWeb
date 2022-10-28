<?php
require "config.php";

if(isset($_POST['submit'])){
  $Fullname = $_POST['Fullname'];
  $rUsername = $_POST['rUsername'];
  $rPassword = $_POST['rPassword'];
  $konfirpass = $_POST['konfirpass'];
  $BirthDate = $_POST['BirthDate'];
  $Gender = $_POST['Gender'];
  $query = mysqli_query($db,"INSERT INTO pengguna (Fullname,rUsername,rPassword,konfirpass,BirthDate,Gender) VALUES ('$Fullname','$rUsername','$rPassword','$konfirpass','$BirthDate','$Gender')");
  if(!empty($_FILES['file_masuk']['name'])){
    $query = mysqli_query($db,"SELECT * FROM pengguna WHERE rUsername='$rUsername'");
    $result = mysqli_fetch_assoc($query);
    $id_gambar = $result['id_gambar'];
    $nama_file = $_POST['nama_file'];
    $file_masuk = $_FILES['file_masuk']['name'];
    $x = explode('.',$file_masuk);
    $ekstensi = strtolower(end($x));
    $file_baru = "$nama_file.$ekstensi";
    $tmp = $_FILES['file_masuk']['tmp_name'];
    if(move_uploaded_file($tmp,"img/$file_baru")){
      $query = mysqli_query($db,"INSERT INTO files (id_pengguna,nama_file,file_masuk) VALUES ('$id_gambar','$nama_file','$file_baru');");
      if($query){
        header("Location:index.php");
      } else {
        echo "Tambah data error";
      }
    }
  }
}


?>