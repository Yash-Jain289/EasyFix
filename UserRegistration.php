<?php
    include("dbConnection.php");
    if(isset($_REQUEST['rSignup'])) {
        if(($_REQUEST['rName']=="") || ($_REQUEST['rEmail']=="") || ($_REQUEST['rPassword']==""))
        {
            $regmsg= '<div class="alert alert-warning mt-2" style="font-weight:bold;">All Fields Are Required</div>';
        } else {
            $sql="SELECT r_email FROM requesterlogin WHERE r_email='".$_REQUEST['rEmail']."'";
            $result=$conn->query($sql);
            if($result->num_rows==1) {
                $regmsg= '<div class="alert alert-danger mt-2" style="font-weight:bold;">Email ID Already Registered</div>';
            } else {
                $rName=$_REQUEST['rName'];
                $rEmail=$_REQUEST['rEmail'];
                $rPassword=$_REQUEST['rPassword'];
                
                $uppercase=preg_match('@[A-Z]@',$rPassword);
                $lowercase=preg_match('@[a-z]@',$rPassword);
                $number=preg_match('@[0-9]@',$rPassword);
                $specialChar=preg_match('@[^\w]@',$rPassword);

                if(filter_var($rEmail, FILTER_VALIDATE_EMAIL)==TRUE) {
                    if(!$uppercase || !$lowercase || !$number || !$specialChar || strlen($rPassword)<8) {
                        $regmsg= '<div class="alert alert-danger mt-2" style="font-weight:bold;">Password Not Acceptable</div>';
                    } else {
                        $sql="INSERT INTO requesterlogin(r_name,r_email,r_password) VALUES('$rName','$rEmail','$rPassword')";
                        if($conn->query($sql) ==TRUE) {
                            $regmsg= '<div class="alert alert-success mt-2" style="font-weight:bold">Account Successfully Created</div>'; 
                        } else {
                            $regmsg= '<div class="alert alert-danger mt-2" style="font-weight:bold">Unable To Create Account</div>';
                        }
                    }
                } else {
                    $regmsg= '<div class="alert alert-danger mt-2" style="font-weight:bold">Invalid Email</div>';
                }
            }
        }
    }
?>

<div class="container pt-5" id="Registration">
    <h2 class="text-center">Create An Account</h2>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <form action="#Registration" class="shadow-lg p-4 mb-5" method="POST">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label><input type="text" class="form-control" placeholder="Enter Name" name="rName">
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Enter Email-Id" name="rEmail">
                    <small class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="password" class="font-weight-bold pl-2">Password</label><input type="password" class="form-control" placeholder="Enter Password" name="rPassword">                  
                </div>
                <button type="submit" class="btn btn-dark mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
                <em style="font-size:10px;">Note- By clicking Sign-Up, you agree to our Terms Data Policy and Cookie Policy.</em>
                <?php
                    if(isset($regmsg)) {
                        echo $regmsg;
                    }
                ?>            
            </form>
        </div>
    </div>
</div>