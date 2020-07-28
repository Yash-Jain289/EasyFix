<?php
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
?>

<?php 
    $sql="SELECT * FROM submit_request WHERE requester_id='".$id."'";
    $result=$conn->query($sql);
    if($result->num_rows==1) {
        $row=$result->fetch_assoc();
        echo "
            <div class='ml-5 mt-5'>
                <table class='table'>
                    <tr>
                        <th>Request ID</th>
                        <td>".$row['requester_id']."</td>
                    </tr>
                    <tr>
                        <th>Requester Name</th>
                        <td>".$row['requester_name']."</td>
                    </tr>
                    <tr>
                        <th>Request Information</th>
                        <td>".$row['requester_info']."</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>".$row['requester_add1']."</td>
                    </tr>
                    <tr>
                        <td><form class='d-print-none'>
                            <input class='btn btn-dark' type='submit' value='Print' onClick='window.print()'>
                            <input type='button' value='Back To Homepage' class='btn btn-info' onclick='myFun()'>
                        </form></td>
                    </tr>
                </table>
            </div>
        ";
    }
?>
<script>
    function myFun() {
        location.href='RequesterProfile.php';
    }
</script>

<?php
    include('includes/footer.php');
?>