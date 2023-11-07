<!-- if myname is not set go back to index page -->
<?php
session_start();
$myname = $_SESSION['myname'];
if (!isset($myname)) {
    header('location:./index.php');
} else {
    include './constants/connect.php';
    $last_login = date('d-m-Y h:i:sa ');
    $sql = "update `users` set `last_login`='$last_login' where `name` = '$myname'";
    $result = mysqli_query($con, $sql);
    $_SESSION['lastlogin'] = $last_login;
}
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>JobVia - Perfect Service Provider</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky p-0">
            <a href="./worker.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobVia</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="./worker.php" class="nav-item nav-link active">Home<small>&nbsp;
                            <?php echo $myname ?>
                        </small></a>
                    <a href="#about" class="nav-item nav-link">About</a>
                    <a href="./job-list.php" class="nav-item nav-link">Job List</a>

                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.php" class="dropdown-item">Job List</a>
                            <a href="job-detail.php" class="dropdown-item">Job Detail</a>
                        </div>
                    </div> -->


                    <a href="./profile.php" class="nav-item nav-link ">Profile</a>

                    <!-- <a href="contact.php" class="nav-item nav-link">Contact</a> -->
                </div>

                <a href="./constants/logout.php" class="nav-item nav-link">Sign Out<i
                        class="bi bi-box-arrow-right ms-2"></i></a>



            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/pic.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Service
                                        That You Deserved</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Connecting Opportunities, Building
                                        Careers: Your Path to Success Start Here!</p>
                                    <a href="#search"
                                        class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search a
                                        Service</a>
                                    <a href="job-list.php"
                                        class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find Job</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/pic2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job
                                        That Fit You</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Your Gateway to Job Excellence: Find,
                                        Apply, Thrive!</p>
                                    <a href="#search"
                                        class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search
                                        A Job</a>
                                    <a href="job-list.php"
                                        class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A
                                        Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;"
            id="search">
            <form method="get">
                <div class="container d-flex justify-content-center flex-column">
                    <div class="row justify-content-center">

                        <div class="col-md-4">
                            <select class="form-select border-0" name="field">
                                <option selected>Category</option>
                                <option value="plumber">Plumber</option>
                                <option value="electrician">Electrician</option>
                                <option value="gardener">Garderner</option>
                                <option value="mechanic">Mechanic</option>
                                <option value="cleaner">Cleaner</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0" name="place">
                                <option selected>Location</option>
                                <option value="aluva">Aluva</option>
                                <option value="kochi">Kochi</option>
                                <option value="paravoor">Paravoor</option>
                                <option value="kaloor">Kaloor</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-dark border-0 w-100 " type="submit" value="Search">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Search End -->

        <!-- list of jobs -->
        <div class="container" id="joblist">
            <?php
          
                $field = $_GET['field'];
                $place = $_GET['place'];
                $sql = "SELECT * FROM `job_post` WHERE `place` = '$place' OR `field`='$field'";
                $result = mysqli_query($con, $sql);
                $number = mysqli_num_rows($result);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $job_name = $row['name'];
                        $job_email = $row['email'];
                        $job_workdate = $row['dateofwork'];
                        $job_place = $row['place'];
                        $job_desc = $row['job_desc'];
                        $job_postdate = $row['dateofpost'];
                        $job_feild = $row['field'];
                        $job_status = $row['status'];
                        $job_id = $row['job_id'];
                        if ($job_status == 'pending') {
                            echo "<div class='tab-content'>
            <div id='tab-1' class='tab-pane fade show p-0 active'>
                <div class='job-item p-4 mb-4'>
                    <div class='row g-4'>
                        <div class='col-sm-12 col-md-8 d-flex align-items-center'>
                            <img class='flex-shrink-0 img-fluid border rounded' src='img/job-poster.jpg' alt='' style='width: 80px; height: 80px;'>
                            <div class='text-start ps-4'>
                                <h5 class='mb-3'>$job_name</h5>
                                <p class='mb-3'>$job_desc</p>
                                <span class='text-truncate me-3'><i class='fa fa-map-marker-alt text-primary me-2'></i>$job_place</span>
                                <span class='text-truncate me-3'><i class='far fa-clock text-primary me-2'></i>$job_postdate</span>           
                            </div>
                        </div>
                        <div class='col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center'>
                            <div class='d-flex mb-3'>
                            </div>
                            <form method='post'>
        
                            <i class='bi bi-trash text-light me-2'></i><a class='btn btn-primary' href='apply.php?apply=$job_id&email=$myemail&status=$job_status&page=worker'>Apply Now</a>
                            </form>
        
                                <small class='text-truncate'><i class='far fa-calendar-alt text-primary me-2'></i>Date Line: $job_workdate</small>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>";
                        } 
                    }
                } else {
                    echo "NO JOBS";
                }

            

            ?>
        </div>
        <!-- list ends -->


        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                            <h6 class="mb-3">Mechanic</h6>
                            <!-- <p class="mb-0">123 Vacancy</p> -->
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-wrench text-primary mb-4"></i>
                            <h6 class="mb-3">Plumber</h6>
                            <!-- <p class="mb-0">123 Vacancy</p> -->
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h6 class="mb-3">Custodial Work</h6>
                            <!-- <p class="mb-0">123 Vacancy</p> -->
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                            <h6 class="mb-3">Machine Repair</h6>
                            <!-- <p class="mb-0">123 Vacancy</p> -->
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                            <h6 class="mb-3">Maintaince</h6>
                            <!-- <p class="mb-0">123 Vacancy</p> -->
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                            <h6 class="mb-3">Sanitation</h6>
                            <!-- <p class="mb-0">123 Vacancy</p> -->
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                            <h6 class="mb-3">Technician</h6>
                            <!-- <p class="mb-0">123 Vacancy</p> -->
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                            <h6 class="mb-3">Manufacturing</h6>
                            <!-- <p class="mb-0">123 Vacancy</p> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                        <p class="mb-4">At our job Portal, we're more than just a platform - we're your partners in
                            progress. Our mission is to empower induvituals like you to reach for the stars, offering a
                            diverse array of job opportunities that span industries, roles, and locations.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Empowering career aspirations</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Unparalleled exploration and diversity</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Holistic approach to skill enhancement</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5 d-flex justify-content-center">

                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="#about">About Us</a>
                        <a class="btn btn-link text-white-50" href="./job-list.php">Job List</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kochi, Kerala, IND</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91991919191</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@jobvia.com</p>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h6 class="text-white mb-4">Copyright © 2023 JOBVIA. All Rights Reserved</h6>
                    </div>
                </div>
            </div>

        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>