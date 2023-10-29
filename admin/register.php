<?php 
include "connection.php";
error_reporting(0);
session_start();

if(isset($_SESSION["username"])){
    header("location:login.php");
}
if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $_cppassword = md5($_POST['cppassword']);
    $role = $_POST['role'];
    if($password == $_cppassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 0) {
            $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";    
            $result = mysqli_query($conn, $sql);
            if($result){
                echo"<script>alert('User Registration Completed')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cppassword'] = "";
            } else {
                echo"<script>alert('Something Wrong')</script>";
            }
        } else {
            echo"<script>alert('Email Already Exists')</script>";
        }
    } else {
        echo "<script>alert('Password not Matched')</script>";
    }
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Font Google -->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- CDN Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/css/logreg.css">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="/fontawesome-free-6.4.0-web/css/all.min.css">
    <title> Registrasi </title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p style="font-size: 2rem; font-weight:850;"> REGISTER </p>
            <div class="input-group">
                <input type="text" placeholder="User name" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST["password"]; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cppassword" value="<?php echo $_POST["cppassword"];?>" required>
            </div>
            <div class="input-group">
                <select name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="input-group">
                <button name="submit" class="btn "> Register </button>
            </div>
            <p class="login-register-text">Have An Account? <a href="login.php"> Log in </a></p>
        </form>
    </div>
</body>
</html>
