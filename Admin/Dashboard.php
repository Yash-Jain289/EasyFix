<?php
    define('TITLE','DashBoard');
    define('PAGE','DashBoard');
    include("includes/header.php");
    include("../dbConnection.php");
    session_start();
    if(isset($_SESSION['is_adminlogin'])) {
        $AdminEmail=$_SESSION['AdminEmail'];
    } else {
        echo "<script>location.href='login.php'</script>";
    }
?>
<div class="col-sm-9 col-md-10">
    <div class="row text-center mx-5">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3 font-weight-bold shadow-lg" style="width:18rem;">
                <div class="card-header">Requests Received</div>
                <div class="card-body">
                    <h4 class="card-title">3</h4>
                    <a class="btn btn-white" href="#">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
        <div class="card text-white bg-success mb-3 font-weight-bold shadow-lg" style="width:18rem;">
                <div class="card-header">Assigned Work</div>
                <div class="card-body">
                    <h4 class="card-title">0</h4>
                    <a class="btn btn-white" href="#">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
        <div class="card text-white bg-info mb-3 font-weight-bold shadow-lg" style="width:18rem;">
                <div class="card-header">No. Of Technician</div>
                <div class="card-body">
                    <h4 class="card-title">0</h4>
                    <a class="btn btn-white" href="#">View</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-5 mt-5 text-center" style="width:85%;position:relative;left:13px;">
        <p class="bg-dark text-center text-white p-2">List Of Requesters</p>
        <?php
            $sql="SELECT * FROM requesterlogin";
            $result=$conn->query($sql);
            if($result->num_rows>0) {
                echo "
                    <table class='table'>
                        <thead>
                            <tr>
                                <th style='width:32%;'>Request ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                    </table>
                    <div class='wrapper'>
                        <table class='table'>
                            <tbody>";
                                while($row=$result->fetch_assoc()) {
                                echo "
                                    <tr>
                                        <td style='width:30%;'>".$row['r_login_id']."</td>
                                        <td style='width:41%;'>".$row['r_name']."</td>
                                        <td>".$row['r_email']."</td>
                                    </tr>
                                    ";
                                }
                                echo "
                            </tbody>
                        </table>
                    </div>
                ";
            } else {
                echo '0 Results';
            }
        ?>
    </div>
</div>

<?php
    include("includes/footer.php");
?>

