<?php
    if(isset($_SESSION['is_adminlogin'])) {
        $AdminEmail=$_SESSION['AdminEmail'];
    } else {
        echo "<script>location.href='../login.php'</script>";
    }
?>
<div class="col-sm-5 mt-5 ml-5 jumbotron bg-grey">
    <form action="#Description" method="POST">
        <h5 class="text-center font-weight-bold">Assign Work Order Request</h5>
        <div class="form-group">
            <label for="RequestID">Request ID</label>
            <input type="text" class="form-control" id="RequestID" name="RequestID" value="<?php if(isset($row['requester_id'])){echo $row['requester_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="RequestInfo">Request Info</label>
            <input type="text" class="form-control" id="RequestInfo" name="RequestInfo" value="<?php if(isset($row['requester_info'])){echo $row['requester_info'];}?>">
        </div>
        <div class="form-group">
            <label for="Description" id="Description">Description</label>
            <input type="text" class="form-control" Description" name="Description" value="<?php if(isset($row['requester_desc'])){echo $row['requester_desc'];}?>">
        </div>
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="Name" name="Name" value="<?php if(isset($row['requester_name'])){echo $row['requester_name'];}?>">
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="Address1">Address Line 1</label>
                    <input type="text" class="form-control" id="Address1" name="Address1" value="<?php if(isset($row['requester_add1'])){echo $row['requester_add1'];}?>">
                </div>
                <div class="col-sm-6">
                    <label for="Address2">Address Line 2</label>
                    <input type="text" class="form-control" id="Address2" name="Address2" value="<?php if(isset($row['requester_add2'])){echo $row['requester_add2'];}?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="City">City</label>
                    <input type="text" class="form-control" id="City" name="City" value="<?php if(isset($row['requester_city'])){echo $row['requester_city'];}?>"> 
                </div>
                <div class="col-sm-3">
                    <label for="State">State</label>
                    <input type="text" class="form-control" id="State" name="State" value="<?php if(isset($row['requester_state'])){echo $row['requester_state'];}?>"> 
                </div>
                <div class="col-sm-3">
                    <label for="Zip">Zip</label>
                    <input type="text" class="form-control" id="Zip" name="Zip" onkeypress="isInputNumber(event)" value="<?php if(isset($row['requester_zip'])){echo $row['requester_zip'];}?>"> 
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="Email">Email Id</label>
                    <input type="email" class="form-control" id="Email" name="Email" value="<?php if(isset($row['requester_email'])){echo $row['requester_email'];}?>"> 
                </div>
                <div class="col-sm-3">
                    <label for="Phone">Phone No.</label>
                    <input type="text" class="form-control" id="Phone" name="Phone" value="<?php if(isset($row['requester_phone'])){echo $row['requester_phone'];}?>" onkeypress="isInputNumber(event)"> 
                </div>
                <div class="col-sm-3">
                    <label for="Date">Date</label>
                    <input type="date" class="form-control" id="Date" name="Date" value="<?php if(isset($row['requester_date'])){echo $row['requester_date'];}?>"> 
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-9">
                    <label for="AssignToTech">Assign To Technician</label>
                    <input type="text" class="form-control" id="AssignToTech" name="AssignToTech" value=""> 
                </div>
                <div class="col-sm-3">
                    <label for="AssignDate">Assigned Date</label>
                    <input type="date" class="form-control" id="AssignDate" name="AssignDate" value=""> 
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-success" style="font-weight:bold;" name="AssignRequest">Assign</button>
            <button type="reset" class="btn btn-dark" style="font-weight:bold;" name="ResetRequest">Reset</button>
        </div>
        <?php 
        if(isset($msg)){
            echo $msg;
        }
        ?>
    </form>
</div>