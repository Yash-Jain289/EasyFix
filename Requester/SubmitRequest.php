<?php
    define('TITLE',"Submit Request");
    define('PAGE','SubmitRequest');
    include("../dbConnection.php");
    session_start();
    if($_SESSION['is_login']==TRUE) {
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script>location.href='RequesterLogin.php'</script>";
    }

    if(isset($_REQUEST['SubmitRequest'])) {
        if(($_REQUEST['RequestInfo']=="") || ($_REQUEST['Description']=="") || ($_REQUEST['Name']=="") || ($_REQUEST['Address1']=="") || ($_REQUEST['Address2']=="") || ($_REQUEST['City']=="") || ($_REQUEST['State']=="") || ($_REQUEST['Zip']=="") || ($_REQUEST['Email']=="") || ($_REQUEST['Phone']=="") || ($_REQUEST['Date']=="")) {
            $msg='<div class="alert alert-danger mt-2 font-weight-bold">All Fields Are Required</div>'; 
        } else {
            $r_info=$_REQUEST['RequestInfo'];
            $r_desc=$_REQUEST['Description'];
            $r_name=$_REQUEST['Name'];
            $r_add1=$_REQUEST['Address1'];
            $r_add2=$_REQUEST['Address2'];
            $r_city=$_REQUEST['City'];
            $r_state=$_REQUEST['State'];
            $r_zip=$_REQUEST['Zip'];
            $r_email=$_REQUEST['Email'];
            $r_phone=$_REQUEST['Phone'];
            $r_date=$_REQUEST['Date'];

            $sql="INSERT INTO submit_request(requester_info,requester_desc,requester_name,requester_add1,requester_add2,requester_city,requester_state,requester_zip,requester_email,requester_phone,requester_date) VALUES('$r_info','$r_desc','$r_name','$r_add1','$r_add2','$r_city','$r_state','$r_zip','$r_email','$r_phone','$r_date')";
            if($conn->query($sql)==TRUE) {
                $genid=mysqli_insert_id($conn);
                $msg='<div class="alert alert-success mt-2 font-weight-bold">Your Request Has Been Submitted</div>';
                $_SESSION['myid']=$genid;
                $btn='<button class="btn btn-dark" type="button" style="font-weight:bold" onClick=" return myFun()">View Receipt</button>';
            } else {
                $msg='<div class="alert alert-danger mt-2 font-weight-bold">Something Went Wrong! Try Again.</div>';
            }
        }
    }
?>
<?php
    include("includes/header.php");
?>

<div class="col-sm-9 col-md-10 mt-5">
    <form action="" method="POST" class="mx-5">
        <div class="form-group">
            <label for="inputRequestInfo" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Request Info</label>
            <input type="text" class="form-control" id="inputRequestInfo" placeholder="Enter Request Info" name="RequestInfo">
        </div>
        <div class="form-group">
            <label for="inputDescription" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Description</label>
            <input type="text" class="form-control" id="inputDescription" placeholder="Enter Description" name="Description">
        </div>
        <div class="form-group">
            <label for="inputName" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Enter Name" name="Name">
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="inputAddress1" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Address Line 1</label>
                    <input type="text" class="form-control" id="inputAddress1" placeholder="House No. 123" name="Address1">
                </div>
                <div class="col-sm-6">
                    <label for="inputAddress2" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Address Line 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="Address2">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="inputCity" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">City</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Enter City" name="City"> 
                </div>
                <div class="col-sm-3">
                    <label for="inputState" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">State</label>
                    <input type="text" class="form-control" id="inputState" placeholder="Enter State" name="State"> 
                </div>
                <div class="col-sm-3">
                    <label for="inputZip" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Zip</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Enter Zip" name="Zip" onkeypress="isInputNumber(event)"> 
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
                    <input type="text" class="form-control" id="inputPhone" placeholder="Enter Phone" name="Phone" onkeypress="isInputNumber(event)"> 
                </div>
                <div class="col-sm-3">
                    <label for="inputDate" style="font-weight:bold; font-family:Ubuntu; font-size:18px;">Date</label>
                    <input type="date" class="form-control" id="inputDate" placeholder="DD/MM/YYYY" name="Date"> 
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info" style="font-weight:bold;" name="SubmitRequest">Submit</button>
        <button type="reset" class="btn btn-dark" style="font-weight:bold;" name="ResetRequest">Reset</button>
        <?php if(isset($btn)) {
            echo $btn;
        }
        ?>
        <?php
        if(isset($msg)) {
            echo $msg;
        } 
        ?>
    </form>
</div>

<!--For Number Validation For Zip & Mobile Number -->
<script>
	function isInputNumber(evt) {
		var ch=String.fromCharCode(evt.which);
		if(!(/[0-9]/.test(ch))) {
			evt.preventDefault();
		}
	}

    function myFun() {

        document.location.href="SubmitRequestSuccess.php";
    }
</script>


<?php
    include('includes/footer.php');
?>