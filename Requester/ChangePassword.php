<?php
    define('TITLE',"Change Password");
    define('PAGE','ChangePassword');
    include('../dbConnection.php');
    session_start();
    if($_SESSION['is_login']==TRUE) {
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script>location.href='RequesterLogin.php'</script>";
    }

    $sql="SELECT r_email, r_password FROM requesterlogin WHERE r_email='".$rEmail."'";
    $result=$conn->query($sql);
    if($result->num_rows==1)
    {
        $row=$result->fetch_assoc();
        $rPassword=$row['r_password'];
        $rEmail=$row['r_email'];
    }

    if(isset($_REQUEST['passwordUpdate'])) {
        if($_REQUEST['rPassword']=="") {
            $msg = "<div class='alert alert-danger mt-3 font-weight-bold'>All Fields Are Required</div>";
        } else {
            $rPassword = $_REQUEST['rPassword'];
            $sql = "UPDATE requesterlogin SET r_password='$rPassword' WHERE r_email='$rEmail'";
            if($conn->query($sql)==TRUE) {
                $msg= "<div class='alert alert-success mt-3 font-weight-bold'>Name Updated Successfully</div>";
            } else {
                $msg= "<div class='alert alert-danger mt-3 font-weight-bold'>Unable To Update</div>";
            }
        }
    }
?>

<?php
    include("includes/header.php");
?>
<div class="col-sm-6 mt-5 ">
    <form action="" method="POST" class="mx-5">
        <div class="form-group">
            <label for="rEmail" style="font-family:Ubuntu; font-weight:bold; font-size:20px;">Email</label><input type="email" class="form-control" name="rEmail" readonly value="<?php echo $rEmail?>"> 
        </div>
        <div class="form-group">
            <label for="rPassword" style="font-family:Ubuntu; font-weight:bold; font-size:20px;">Password</label><input type="text" class="form-control" name="rPassword" value="<?php echo $rPassword?>"> 
        </div>
        <button type="submit" class="btn btn-dark" name="passwordUpdate">Update</button>
        <?php
            if(isset($msg)) {
                echo $msg;
            }
        ?>

    </form>
</div>
<?php
    include('includes/footer.php');
?>