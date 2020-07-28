<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/custom.css">

    <title>Easy Fix</title>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
        <a href="index.php" class="navbar-brand">EASY FIX</a>
        <span class="navbar-text">Customer's Happiness Is Our Aim</span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>   
        </button>
        <div class="collapse navbar-collapse" id="myMenu">
            <ul class="navbar-nav pl-5 custom-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#Registration" class="nav-link">Registration</a></li>
                <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Header Jumbotron -->
    <header class="jumbotron back-image bg-white" style="background-image:url(Images/Banner1.jpeg); background-size:1000px 1000px; background-position:right;">
        <div class="mainHeading myclass">
            <h1 class="text-uppercase text-dark font-weight-bold">Welcome To Easy Fix</h1>
            <p class="font-italic">Customer's Happiness Is Our Aim</p>
            <a href="Requester/RequesterLogin.php" class="btn btn-outline-dark btn-lg mr-4">Login</a>
            <a href="#Registration" class="btn btn-dark btn-lg mr-4">Sign Up</a>
        </div>
    </header>

    <div class="container-fluid"> 
        <!--OSMS Services Container-->
        <div class="container pb-5 pt-5">
            <div class="jumbotron shadow-lg mt-0 bg-dark" style="border-radius:50px;">
                <h3 class="text-center text-uppercase" style="font-size:40px;color:white;padding-bottom:20px;">EasyFix Services</h3>
                <p style="font-family: 'Ubuntu', sans-serif; font-size:20px; font-weight:bold; color:#e5dfdf;">
                    EasyFix Services is India’s leading chain of multi-brand Electronics and Electrical service
                    workshops offering
                    wide array of services. We focus on enhancing your uses experience by offering world-class
                    Electronic
                    Appliances maintenance services. Our sole mission is “To provide Electronic Appliances care
                    services to
                    keep the devices fit and healthy and customers happy and smiling”.

                    With well-equipped Electronic Appliances service centres and fully trained mechanics, we
                    provide quality
                    services with excellent packages that are designed to offer you great savings.

                    Our state-of-art workshops are conveniently located in many cities across the country. Now you
                    can book
                    your service online by doing Registration.
                </p>
            </div>
        </div>

        <!--Services -->
        <div class="container text-center border-bottom" id="Services">
            <h2>Our Services</h2>
            <div class="row mt-4">
                <div class="col-sm-4 mb-4">
                    <a href="#"><i class="fas fa-fan fa-8x text-success"></i></a>
                    <h4 class="mt-4">Electronic Appliances</h4>
                </div>
                <div class="col-sm-4 mb-4">
                    <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
                    <h4 class="mt-4">Preventive Maintenance</h4>
                </div>
                <div class="col-sm-4 mb-4">
                    <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
                    <h4 class="mt-4">Fault Repair</h4>
                </div>
            </div>
        </div>

        <!--Registration Form -->
        <?php
            include('UserRegistration.php');
        ?>

    </div>

    <!-- Happy Customers -->
    <section class="colored-section container" id="testimonials">
        <div id="testimonial-carousel" class="carousel slide" data-ride="false">
            <div class="carousel-inner">
                <div class="carousel-item active container-fluid testimonial-div bg-dark" style="border-radius:50px;">
                    <h2 class="testimonial-text">Great interface. great customer service and appreciate the best prices.</h2>
                    <img class="testimonial-image" src="Images/avtar1.jpeg" alt="avtar1">
                    <em>Yash Jain</em>
                </div>
                <div class="carousel-item container-fluid bg-dark testimonial-div" style="border-radius:50px;">
                    <h2 class="testimonial-text">Minimal price charged for the repairment. Really appreciated.</h2>
                    <img class="testimonial-image" src="Images/avtar2.jpeg" alt="avtar2">
                    <em>Sangeeta Jain</em>
                </div>
                <div class="carousel-item container-fluid bg-dark testimonial-div" style="border-radius:50px;">
                    <h2 class="testimonial-text">Great customer service and great work. I would recommend everyone this website.</h2>
                    <img class="testimonial-image" src="Images/avtar3.jpeg" alt="avtar3">
                    <em>Umesh Jain</em>
                </div>
                <div class="carousel-item container-fluid bg-dark testimonial-div" style="border-radius:50px;">
                    <h2 class="testimonial-text">Great service, would recommend everyone to use it. Quality of work is remarkable.</h2>
                    <img class="testimonial-image" src="Images/avtar4.jpeg" alt="avatar4">
                    <em>Shreya Jain</em>
                </div>
            </div>
            <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
            <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next"><span class="carousel-control-next-icon"></span></a>
        </div>
    </section>

    <!--Contact -->
    <div class="container" id="Contact">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">
            <?php
                include("ContactForm.php");
            ?>
            <div class="col-md-4 text-center" style="font-size:25px;position:relative; top:70px;">
                <strong>Address:</strong><br>
                Vellore Insititute Of Technology,<br>
                Kelabakkam-Vandalur Road, Chennai<br>
                Tamil Nadu - 43457<br>
                Phone: +7016602035<br>
                <a href="#" target="_blank">www.easyfix.com</a><br>
                <br><br>
            </div>
        </div>
    </div>

    <!--Footer -->
    <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6 follow">
                    <span class="pr-2">Follow Us:</span>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
                </div>

                <div class="col-md-6 text-right">
                    <small>Designed by Yash Jain &copy; 2019</small>
                    <small class="ml-2"><a href="Admin/Login.php">Admin Login</a></small>
                </div>
            </div>
        </div>
    </footer>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/all.min.js"></script>
</body>
</html>