<?php
    define('TITLE',"Requester Profile");
    define('PAGE','RequesterProfile');
    include('../dbConnection.php');
    session_start();
    if($_SESSION['is_login']==TRUE) {
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script>location.href='RequesterLogin.php'</script>";
    }

    $sql="SELECT r_email, r_name FROM requesterlogin WHERE r_email='".$rEmail."'";
    $result=$conn->query($sql);
    if($result->num_rows==1)
    {
        $row=$result->fetch_assoc();
        $rName=$row['r_name'];
        $rEmail=$row['r_email'];
    }

    if(isset($_REQUEST['nameUpdate'])) {
        if($_REQUEST['rName']=="") {
            $msg = "<div class='alert alert-danger mt-3 font-weight-bold'>All Fields Are Required</div>";
        } else {
            $rName = $_REQUEST['rName'];
            $sql = "UPDATE requesterlogin SET r_name='$rName' WHERE r_email='$rEmail'";
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

<!--Profile Area -->
<div class="col-sm-6 mt-5 ">
    <form action="" method="POST" class="mx-5">
        <div class="form-group">
            <label for="rEmail" style="font-family:Ubuntu; font-weight:bold; font-size:20px;">Email</label><input type="email" class="form-control" name="rEmail" readonly value="<?php echo $rEmail?>"> 
        </div>
        <div class="form-group">
            <label for="rName" style="font-family:Ubuntu; font-weight:bold; font-size:20px;">Name</label><input type="text" class="form-control" name="rName" value="<?php echo $rName?>"> 
        </div>
        <button type="submit" class="btn btn-dark" name="nameUpdate">Update</button>
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

