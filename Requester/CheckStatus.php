<?php
    define('TITLE',"Check Status");
    define('PAGE','CheckStatus');
    include("includes/header.php");  
    include("../dbConnection.php");
    session_start();
    if($_SESSION['is_login']==TRUE) {
        $rEmail = $_SESSION['rEmail'];
    } else {
        echo "<script>location.href='RequesterLogin.php'</script>";
    }
?>
<div class="col-sm-9 mx-5 mt-5">
    <form action="" method="POST">
        <div class="form-group">
            <label for="checkid" class="font-weight-bold">Enter Request ID:</label>
            <input type="text" name="checkid" id="checkid" class="form-control" onkeypress="isInputNumber(event)">
        </div>
        <button type="submit" class="btn btn-dark">Search</button>
    </form>
    <?php
        if(isset($_REQUEST['checkid'])) {
                $sql="SELECT requester_id FROM submit_request";
                $result=$conn->query($sql);
                $c=0;
                while($row=$result->fetch_assoc()) {
                    if($row['requester_id']==$_REQUEST['checkid']) {
                        $c=1;
                    }
                }
                if($c==0) {
                    echo "<div class='alert alert-warning font-weight-bold mt-5'>We don't have Any Request With ".$_REQUEST['checkid']."</div>";
                } else {
                    $sql="SELECT * FROM assign_work WHERE rid=".$_REQUEST['checkid']."";
                    $result=$conn->query($sql);
                    $row=$result->fetch_assoc();
                    if($row['rid']==$_REQUEST['checkid']) {
            ?>
                        <h3 class="text-center mt-5 font-weight-bold mb-3" style="font-family:Ubuntu;">Assigned Work Details</h3>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Request ID</td>
                                    <td><?php if(isset($row['rid'])) {echo $row['rid'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Request Info</td>
                                    <td><?php if(isset($row['rinfo'])) {echo $row['rinfo'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Description</td>
                                    <td><?php if(isset($row['rdesc'])) {echo $row['rdesc'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Name</td>
                                    <td><?php if(isset($row['rname'])) {echo $row['rname'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">City</td>
                                    <td><?php if(isset($row['rcity'])) {echo $row['rcity'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">State</td>
                                    <td><?php if(isset($row['rstate'])) {echo $row['rstate'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Zip</td>
                                    <td><?php if(isset($row['rzip'])) {echo $row['rzip'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Email</td>
                                    <td><?php if(isset($row['remail'])) {echo $row['remail'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Phone</td>
                                    <td><?php if(isset($row['rphone'])) {echo $row['rphone'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Date</td>
                                    <td><?php if(isset($row['rdate'])) {echo $row['rdate'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Technician Assigned</td>
                                    <td><?php if(isset($row['rassigntech'])) {echo $row['rassigntech'];} ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Assigned Date</td>
                                    <td><?php if(isset($row['rassigndate'])) {echo $row['rassigndate'];} ?></td>
                                </tr>
                            </tbody>
                        </table>
                <?php 
                    } else {
                        echo "<div class='alert alert-warning font-weight-bold mt-5'>Your Request Is Still Pending</div>";
                    }
                }
            } 
?>
</div>

<script>
    function isInputNumber(evt) {
		var ch=String.fromCharCode(evt.which);
		if(!(/[0-9]/.test(ch))) {
			evt.preventDefault();
		}
	}
</script>

<?php
    include('includes/footer.php');
?>