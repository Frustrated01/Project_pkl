<?php 
include "connection.php";
session_start();
error_reporting(0);

if(isset($_SESSION['username'])){
    if ($_SESSION['role'] === 'user'){
        header("location: user_dashboard.php");
        exit;
    } elseif ($_SESSION['role'] === 'admin'){
        header("location: dashboard.php");
        exit;
    }
} 

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conn, $sql);

    if($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username']=$row['username'];
        $_SESSION['role']=$row['role'];

        if($row['role'] == 'user'){
            $_SESSION['id']         = $data['id'];
            $_SESSION['username']   = $data['username'];
            $_SESSION['password']   = $data['password'];
            header("location: user_dashboard.php?id=");
            exit;   
        } elseif($row['role'] == 'admin'){
            $_SESSION['id']         = $data['id'];
            $_SESSION['username']   = $data['username'];
            $_SESSION['password']   = $data['password'];
            header("location: dashboard.php");
            exit;
        }
    } else{
        echo "<script>alert('Email Atau Password salah')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
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
    <title>Log in</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p style="font-size:2rem; font-weight:850px;"> Log in </p>
            <div class="input-group">
                <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>"required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>"required>
            <!-- <div class="input-group">
                <select name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div> -->
            <div class="input-group">
                <button name="submit" class="btn">Log in</button>
            </div>
            <p class="login-register-text">Don't Have an Account ? <a href="register.php">Register</a></p>
            <p><a href="/index.php" style="text-decoration: none;" class="btn btn-primary">Back to Home</a></p>
        </form>
    </div>
</body>
</html>
