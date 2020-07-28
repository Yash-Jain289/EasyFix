<?php
    include("../dbConnection.php");
    session_start();
    if(!isset($_SESSION['is_adminlogin'])) {
        if(isset($_REQUEST['AdminEmail'])) {
            $AdminEmail=mysqli_real_escape_string($conn,trim($_REQUEST['AdminEmail']));
            $AdminPassword=mysqli_real_escape_string($conn,trim($_REQUEST['AdminPassword']));
            $sql="SELECT admin_email,admin_password FROM adminlogin WHERE admin_email='".$AdminEmail."' AND admin_password='".$AdminPassword."' limit 1";
            $result=$conn->query($sql);
            if($result->num_rows==1) {
                $_SESSION['is_adminlogin']=TRUE;
                $_SESSION['AdminEmail']=$AdminEmail;
                echo "<script>location.href='Dashboard.php';</script>";
                exit;
            } else {
                $msg='<div class="alert alert-danger mt-3" style="font-weight:bold;">Enter Valid Email & Password</div>';
            }
        }
    } else {
        echo "<script>location.href='Dashboard.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/custom.css">

</head>
<body>
    <div class="mt-5 text-center" style="font-size:30px;font-weight:bold;">
        <i class="fas fa-stethoscope"></i>
        <span>Online Service Platform</span>
    </div>
    <p class="text-center" style="font-size:20px;"><i class="fas fa-user-secret text-danger mr-2"></i>Admin Login</p>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4">
                <form action="" method="POST" class="shadow-lg mt-3" style="padding:20px;"> 
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Email" name="AdminEmail">
                        <small class="form-text">We'll never share your email with anyone.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="password" class="font-weight-bold pl-2">Password</label><input type="password" class="form-control" placeholder="Password" name="AdminPassword">
                    </div>
                    <button type="submit" class="btn btn-dark mt-4 font-weight-bold btn-block shadow-sm">Login</button>
                    <?php
                        if(isset($msg)) {
                            echo $msg;
                        } 
                    ?>
                </form>
                <div class="text-center"><a href="../index.php" class="mt-5 btn btn-info shadow-sm font-weight-bold">Back To HomePage</a></div>
            </div>
        </div>
    </div>

    <script src="../JS/jquery.min.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.min.js"></script>
    <script src="../JS/all.min.js"></script>
</body>
</html>