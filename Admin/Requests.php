<?php
    define('TITLE','Requests');
    define('PAGE','Requests');
    session_start();
    if(isset($_SESSION['is_adminlogin'])) {
        $AdminEmail=$_SESSION['AdminEmail'];
    } else {
        echo "<script>location.href='login.php'</script>";
    }
    include("../dbConnection.php");
    include("includes/header.php");
?>
<div class="col-sm-4 wrapper1">
    <?php
        $sql="SELECT requester_id,requester_info,requester_desc,requester_date FROM submit_request";
        $result=$conn->query($sql);
        if($result->num_rows > 0) {
            while($row=$result->fetch_assoc()) {
                echo "
                    <div class='card mt-5 mx-5'>
                        <div class='card-header'>
                            Request ID: ".$row['requester_id']."
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>Request Info: ".$row['requester_info']."</h5>
                            <p class='card-text'>".$row['requester_desc']."</p>
                            <p class='card-text'>Request Date: ".$row['requester_date']."</p>
                            <div class='float-right'>
                                <form action='' method='POST'>
                                    <input type='hidden' name='id' value='".$row['requester_id']."'>
                                    <input type='submit' value='View' name='View' class='btn btn-danger'>
                                    <input type='submit' value='Close' name='Close' class='btn btn-dark'> 
                                </form>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    ?>
</div>
<?php
    if(isset($_REQUEST['View'])) {
        $sql="SELECT * FROM submit_request WHERE requester_id=".$_REQUEST['id']."";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }
    if(isset($_REQUEST['Close'])) {
        $sql="DELETE FROM submit_request WHERE requester_id=".$_REQUEST['id']."";
        if($conn->query($sql)) {
            echo "<meta http-equiv='refresh' content='0;URL=?closed'/>";
        } else {
            $msg='<div class="alert alert-danger mt-3" style="font-weight:bold;">Unable To Delete Request</div>';
        }
    }
    if(isset($_REQUEST['AssignRequest'])) {
        if(($_REQUEST['RequestID']=="") || ($_REQUEST['RequestInfo']=="") || ($_REQUEST['Description']=="") || ($_REQUEST['Name']=="") || ($_REQUEST['Address1']=="") || ($_REQUEST['Address2']=="") || ($_REQUEST['City']=="") || ($_REQUEST['State']=="") || ($_REQUEST['Zip']=="") || ($_REQUEST['Email']=="") || ($_REQUEST['Phone']=="") || ($_REQUEST['Date']=="") || ($_REQUEST['AssignToTech']=="") || ($_REQUEST['AssignDate']=="")) {
            $msg='<div class="alert alert-warning mt-3" style="font-weight:bold;">Fill All The Fields</div>';
        } else {
            $rid=$_REQUEST['RequestID'];
            $rinfo=$_REQUEST['RequestInfo'];
            $rdesc=$_REQUEST['Description'];
            $rname=$_REQUEST['Name'];
            $radd1=$_REQUEST['Address1'];
            $radd2=$_REQUEST['Address2'];
            $rcity=$_REQUEST['City'];
            $rstate=$_REQUEST['State'];
            $rzip=$_REQUEST['Zip'];
            $remail=$_REQUEST['Email'];
            $rphone=$_REQUEST['Phone'];
            $rdate=$_REQUEST['Date'];
            $rassigntech=$_REQUEST['AssignToTech'];
            $rassigndate=$_REQUEST['AssignDate'];
            $sql="INSERT INTO assign_work(rid,rinfo,rdesc,rname,radd1,radd2,rcity,rstate,rzip,remail,rphone,rdate,rassigntech,rassigndate) VALUES('$rid','$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rphone','$rdate','$rassigntech','$rassigndate')";
            if($conn->query($sql)==TRUE) {
                $msg='<div class="alert alert-success mt-3" style="font-weight:bold;">Work Assigned Successfully</div>';
            } else {
                $msg='<div class="alert alert-danger mt-3" style="font-weight:bold;">Unable To Assign Work</div>';
            }
        }
    }
?>
<?php
    include("includes/assignForm.php");
    include("includes/footer.php");
?>

