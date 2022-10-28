<?php
    session_start();
    if (isset($_POST['submit'])) {
        $_SESSION['submit'] = $_POST['submit'];
        $_SESSION['Fullname'] = $_POST['Fullname'];
        $_SESSION['rUsername'] = $_POST['rUsername'];
        $_SESSION['rPassword'] = $_POST['rPassword'];
        $_SESSION['konfirpass'] = $_POST['konfirpass'];
        $_SESSION['BirthDate'] = $_POST['BirthDate'];
        $_SESSION['Gender'] = $_POST['Gender'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
</head>
<body>
    <div class="header1">
        <nav>
            <a href="index.html">
                <p class="logo">
                    <img src="images/logo.PNG" alt="dy_photo" width="250" title="dy_photo">
                </p>
            </a>

            <ul class="nav-link">
                <li class="nav-item">
                    <a href="index.html"><i class='fas fa-home'>HOME</i></a>
                </li>
                <li>
                    <b id="mode">MODE</b>
                </li>
                <li class="nav-item">
                    <a href="login.php">LOGIN</a>
                </li>
            </ul>
        </nav>
    </div>

    <center class="form">
        <form action="login.php" method="get"> 
            <label for="username">Username</label><br>
            <input type="text" name="Username" class="form-text"><br><br>
            
            <label for="password">Password</label><br>
            <input type="password" name="Password" class="form-text"><br>
            
            <br><br>
            <input type="submit" name= "Submit" value="Submit" class="btn-submit">

        </form>
    </center>
    
    <?php
        if(isset($_GET['Submit']) && isset($_SESSION['submit'])){
            if($_GET['Username'] == $_SESSION['rUsername']){
                if($_GET['Password'] == $_SESSION['rPassword']){
                    echo "<h1>Login Berhasil</h1>";
                }
            }
        }
    ?>
    
    <center>
        <p>Belum Punya Akun ? <a href="registrasi.php">Register</a></p>
    </center>

    <link rel="stylesheet" href="stylesheet/style.css">
    <link rel="stylesheet" href="stylesheet/php-style.css">
    
</body>
</html>