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
?>

<div class="col-sm-10 wrapper1">
    <?php
        $sql="SELECT * FROM submit_request WHERE requester_email='".$rEmail."'";
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
                                    <input type='submit' value='Edit' name='Edit' class='btn btn-danger'>
                                    <input type='submit' name='ViewReceipt' value='View Receipt' class='btn btn-dark'> 
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
    if(isset($_REQUEST['ViewReceipt'])) {
        $_SESSION['viewRec']=$_REQUEST['id'];
        echo "
            <script>location.href='PrintReceipt.php';</script>
        ";
    }

    if(isset($_REQUEST['Edit'])) {
        $_SESSION['viewRec']=$_REQUEST['id'];
        echo "
            <script>location.href='UpdateRequest.php';</script>
        ";
    }
?>

<?php
    include('includes/footer.php');
?>