<?php
    define('TITLE','Receipt');
    include('includes/header.php');
    include('../dbConnection.php');
    session_start();
    if($_SESSION['is_login']==TRUE) {
        $rEmail=$_SESSION['rEmail'];
    } else {
        echo "<script>location.href='RequesterLogin.php'</script>";
    }
    $genid=$_SESSION['myid'];
    $sql="SELECT * FROM submit_request WHERE requester_id='".$genid."'";
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
                        <td><form class='d-print-none'><input class='btn btn-dark' type='submit' value='Print' onClick='window.print()'></form></td>
                    </tr>
                </table>
            </div>
        ";
    } 
?>
<?php
    include('includes/footer.php');
?>
