<?php
    $flag=0;
    define('TITLE','View Requests');
    define('PAGE','ViewRequests');
    include('includes/header.php');
    include('../dbConnection.php');
    session_start();
    if($_SESSION['is_login']==TRUE) {
        $rEmail=$_SESSION['rEmail'];
    } else {
        echo "<script>location.href='RequesterLogin.php'</script>";
    }
    $id=$_SESSION['viewRec'];
    if(isset($_REQUEST['formupdate'])) {
        $rinfo=$_REQUEST['RequestInfo'];
        $rdesc=$_REQUEST['Description'];
        $rname=$_REQUEST['Name'];
        $radd1=$_REQUEST['Address1'];
        $radd2=$_REQUEST['Address2'];
        $rcity=$_REQUEST['City'];
        $rstate=$_REQUEST['State'];
        $rzip=$_REQUEST['Zip'];
        $rphone=$_REQUEST['Phone'];
        $rdate=$_REQUEST['Date'];
        $sql="SELECT rid FROM assign_work";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()) {
            if($row['rid']==$id) {
                $flag=1;
                break;
            }
        }
        if($flag==0) {
            $sql="UPDATE submit_request SET requester_info='$rinfo',requester_desc='$rdesc',requester_name='$rname',requester_add1='$radd1',requester_add2='$radd2',requester_city='$rcity',requester_state='$rstate',requester_zip='$rzip',requester_phone='$rphone',requester_date='$rdate' WHERE requester_id='$id'";
            $result=$conn->query($sql);
            $msg="<div class='alert alert-success font-weight-bold mt-4'>Your Request Has Been Updated</div>";
        } else {
            $msg="<div class='alert alert-danger font-weight-bold mt-4'>This Request has already been assigned. Can't Be Updated</div>";
        }
    } 
?>

<?php
    $sql="SELECT * FROM submit_request WHERE requester_id='".$id."'";
    $result=$conn->query($sql);
    if($result->num_rows==1) {
        $row=$result->fetch_assoc();
?>
        <div class="col-sm-9 col-md-10 mt-5">
        <form action="" method="POST" class="mx-5">
            <div class="form-group">
                <label for="inputRequestInfo" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Request Info</label>
                <input type="text" class="form-control" id="inputRequestInfo" placeholder="Enter Request Info" name="RequestInfo" value="<?php echo $row['requester_info']?>">
            </div>
            <div class="form-group">
                <label for="inputDescription" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Description</label>
                <input type="text" class="form-control" id="inputDescription" placeholder="Enter Description" name="Description" value="<?php echo $row['requester_desc']?>">
            </div>
            <div class="form-group">
                <label for="inputName" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Name</label>
                <input type="text" class="form-control" id="inputName" placeholder="Enter Name" name="Name" value="<?php echo $row['requester_name']?>">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="inputAddress1" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Address Line 1</label>
                        <input type="text" class="form-control" id="inputAddress1" placeholder="House No. 123" name="Address1" value="<?php echo $row['requester_add1']?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputAddress2" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Address Line 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="Address2" value="<?php echo $row['requester_add2']?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="inputCity" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">City</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Enter City" name="City" value="<?php echo $row['requester_city']?>"> 
                    </div>
                    <div class="col-sm-3">
                        <label for="inputState" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">State</label>
                        <input type="text" class="form-control" id="inputState" placeholder="Enter State" name="State" value="<?php echo $row['requester_state']?>"> 
                    </div>
                    <div class="col-sm-3">
                        <label for="inputZip" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Zip</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="Enter Zip" name="Zip" onkeypress="isInputNumber(event)" value="<?php echo $row['requester_zip']?>"> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="inputEmail" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Email Id</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Enter Email" name="Email" readonly value="<?php echo $rEmail?>"> 
                    </div>
                    <div class="col-sm-3">
                        <label for="inputPhone" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Phone No.</label>
                        <input type="text" class="form-control" id="inputPhone" placeholder="Enter Phone" name="Phone" onkeypress="isInputNumber(event)" value="<?php echo $row['requester_phone']?>"> 
                    </div>
                    <div class="col-sm-3">
                        <label for="inputDate" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Date</label>
                        <input type="date" class="form-control" id="inputDate" placeholder="DD/MM/YYYY" name="Date" value="<?php echo $row['requester_date']?>"> 
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success font-weight-bold" name="formupdate">Update</button>
            <button type="button" class="btn btn-info font-weight-bold" onClick="myFun()">Back To Homepage</button>
            <?php 
                if(isset($msg)) {
                    echo $msg;
                }
            ?>
        </form>
    </div>
<?php
    }
?>

<script>
    function myFun() {
        location.href="RequesterProfile.php";
    }
</script>
<?php
    include('includes/footer.php');
?>