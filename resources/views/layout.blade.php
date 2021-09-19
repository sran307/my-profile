<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--csrf token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>
    <!--official bootstrap css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
    <!--icofont css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--boxicons css-->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <!--main css-->
    <link rel="stylesheet" href="css/main.css">
    <!--css for home-->
    <link rel="stylesheet" href="css/home.css">
    <!--css for registration-->
    <link rel="stylesheet" href="css/forms.css">

</head>
<body>
    <!--header section-->
    <header id="header">
        <div class="container">
            <img src="images/avatar5.png" class="rounded-circle" id="profile-image" alt="profile-image">
            <nav class="navbar">
                <ul class="navbar-nav">
                    @if(!session("login_id"))
                    <li class="nav-item"><a href="/home" class="nav-link active">Home</a></li>
                    @else
                    <li class="nav-item"><a href="/dashboard" class="nav-link active">Dashboard</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link">About Us</a></li>
                    <li class="nav-item"><a class="nav-link">Contact Us</a></li>
                    @if(!session("login_id"))
                    <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
                    <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                    @else
                    <li class="nav-item"><a href="/profile" class="nav-link">profile</a></li>
                    <li class="nav-item"><a href="/change_password" class="nav-link">Password</a></li>
                    <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
                    @endif
                </ul>
                <h4 class="nav-heading">My Profile</h4>
                <button type="button" class="mobile-nav-button d-lg-none"><i class="fa fa-bars"></i></button>
            </nav>
        </div>
    </header>
    <!--End of header-->
    <!--hero section-->
    <section id="main">
        <section id="hero">
            <div class="container">
                <h1>My Profile</h1>
                <h5>Your complete financial diary</h5>
            </div>
        </section>
        <!--end hero-->
        <!---content adding-->
        @yield("content")
        <!--footer-->
        <footer id="footer">
            <div class="container">
                <div class="row footer-head">
                    <div class="col-lg-4 col-md-4">
                        <h6>social media accounts</h6>
                        <ul>
                            <li><a href=""><i class="bx bxl-facebook"></i>Facebook</a></li>
                            <li><a href=""><i class="bx bxl-twitter"></i>Twitter</a></li>
                            <li><a href=""><i class="bx bxl-whatsapp"></i>Whatsapp</a></li>
                            <li><a href=""><i class="bx bxl-instagram"></i>Instagram</a></li>
                            <li><a href=""><i class="bx bxl-google-plus"></i>Google+</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <h6>useful links</h6>
                        <ul>
                            <li><a href="/home"><i class="fa fa-home"></i>Home</a></li>
                            <li><a href=""><i class="fa fa-address-card"></i>About Us</a></li>
                            <li><a href=""><i class="fa fa-address-book"></i>Contact Us</a></li>
                            <li><a href=""><i class="fa fa-user-secret"></i>Terms and Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <h6>our news-letter</h6>
                        <input type="email" placeholder="Enter your email.."><input type="submit" id="label" value="subscribe">
                    
                    </div>
                </div>
            </div>
            <div class="copy">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright">
                            &copy; Copyright <strong><span>MY PROFILE</span></strong>. All Rights Reserved
                        </div>
                        <h6>developed by <span>problems simplified</span></h6>
                        <p>for beautiful websites, you can contact us through our mail service.</p>
                    </div>
                </div>
            </div>
        </footer>
    </section>

    <!--JQuery-->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js">

    <!--off bootstrap jquery and js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!--validation jquery-->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <!--Main js-->
    <script src="js/main.js" type="text/javascript"></script>
    @yield("scripts")
</body>
</html>