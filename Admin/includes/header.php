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
                        <li class="nav-item"><a href="Dashboard.php" class="nav-link font-weight-bold <?php if(PAGE=="DashBoard") { echo 'active';}?>"><i class="fas fa-home mr-2"></i>Dashboard</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="WorkOrder.php" class="nav-link font-weight-bold <?php if(PAGE=="WorkOrder") { echo 'active';}?>"><i class="fab fa-accessible-icon mr-2"></i>Work Order</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="Requests.php" class="nav-link font-weight-bold <?php if(PAGE=="Requests") { echo 'active';}?>"><i class="fas fa-align center mr-2"></i>Requests</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="Assets.php" class="nav-link font-weight-bold <?php if(PAGE=="Assets") { echo 'active';}?>"><i class="fas fa-database mr-2"></i>Assets</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="Technician.php" class="nav-link font-weight-bold <?php if(PAGE=="Technician") { echo 'active';}?>"><i class="fas fa-users-cog mr-2"></i>Technician</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="Requester.php" class="nav-link font-weight-bold <?php if(PAGE=="Requester") { echo 'active';}?>"><i class="fas fa-users mr-2"></i>Requester</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="SellReport.php" class="nav-link font-weight-bold <?php if(PAGE=="SellReport") { echo 'active';}?>"><i class="fas fa-table mr-2"></i>Sell Report</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="WorkReport.php" class="nav-link font-weight-bold <?php if(PAGE=="WorkReport") { echo 'active';}?>"><i class="fas fa-table mr-2"></i>Work Report</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="ChangePassword.php" class="nav-link font-weight-bold <?php if(PAGE=="ChangePassword") { echo 'active';}?>"><i class="fas fa-key mr-2"></i>Change Password</a></li>
                    </ul>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="../LogOut.php" class="nav-link font-weight-bold <?php if(PAGE=="Logout") { echo 'active';}?>"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>
        

