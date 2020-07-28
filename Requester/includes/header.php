<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo TITLE?></title>

    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/custom.css">
</head>
<body>  
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
        <a href="../index.php" class="navbar-brand">EASY FIX</a>
    </nav>

    <div class="container-fluid" style="margin-top:70px;">
        <div class="row">
            <!--Side Bar -->
            <nav class="col-sm-2 bg-light py-5">
                <div>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="RequesterProfile.php" class="nav-link font-weight-bold <?php if(PAGE=="RequesterProfile") { echo 'active';}?>"><i class="fas fa-user mr-2"></i>Profile</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="SubmitRequest.php" class="nav-link font-weight-bold <?php if(PAGE=="SubmitRequest") { echo 'active';}?>"><i class="fab fa-accessible-icon mr-2"></i>Submit Request</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="CheckStatus.php" class="nav-link font-weight-bold <?php if(PAGE=="CheckStatus") { echo 'active';}?>"><i class="fas fa-align center mr-2"></i>Service Status</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="ViewRequests.php" class="nav-link font-weight-bold <?php if(PAGE=="ViewRequests") { echo 'active';}?>"><i class="fas fa-database center mr-2"></i>View Requests</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="ChangePassword.php" class="nav-link font-weight-bold <?php if(PAGE=="ChangePassword") { echo 'active';}?>"><i class="fas fa-key mr-2"></i>Change Password</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="../LogOut.php" class="nav-link font-weight-bold <?php if(PAGE=="Logout") { echo 'active';}?>"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>
        

