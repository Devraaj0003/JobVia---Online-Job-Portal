<!DOCTYPE html>
<html lang="en">
<?php
$user = 0;

session_start();
if (!isset($_SESSION['myname'])) {
    $user = 1;
} else {
    include './constants/connect.php';
    $myname = $_SESSION['myname'];
    $myemail = $_SESSION['myemail'];

    $last_login = date('d-m-Y h:i:sa A');
    $sql = "update `users` set `last_login`='$last_login' where `name` = '$myname'";
    $result = mysqli_query($con, $sql);

    $_SESSION['lastlogin'] = $last_login;
    $role = $_SESSION['role'];
    if ($role == "worker") {
        $user = 2;
    } else {
        $user = 3;
    }


}
?>

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
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky p-0">
            <a href="main.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobVia</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">

                    <?php
                    if ($user == 3) {
                        echo "<a href='seeker.php' class='nav-item nav-link '>Home<small>&nbsp;$_SESSION[myname]</small></a>
    <a href='job-list.php' class='nav-item nav-link active'>Job List</a>
    <a href='./profile.php' class='nav-item nav-link'>Profile</a>

    <a href='./constants/logout.php' class='nav-item nav-link'>Sign Out<i class='bi bi-box-arrow-right ms-2'></i></a>
        <a href='job-post.php' class='btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block'>Post A Job<i class='fa fa-arrow-right ms-3'></i></a>";
                    } else if ($user == 2) {
                        echo "  <a href='worker.php' class='nav-item nav-link '>Home<small>&nbsp;$_SESSION[myname]</small></a>
  <a href='job-list.php' class='nav-item nav-link active'>Job List</a>
  <a href='./profile.php' class='nav-item nav-link '>Profile</a>
  <a href='./constants/logout.php' class='nav-item nav-link'>Sign Out<i
      class='bi bi-box-arrow-right ms-2'></i></a>";
                    } else {
                        echo "
    <a href='index.php' class='nav-item nav-link '>Home<small></small></a>
    <a href='job-list.php' class='nav-item nav-link active'>Job List</a><a href='./login/login.php' class='nav-item nav-link'>Sign in<i class='bi bi-box-arrow-right ms-2'></i></a>
    <div class='nav-item dropdown'>
                    <a href='#'
                        class='nav-link dropdown-toggle btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block'
                        data-bs-toggle='dropdown'>Sign up<i class='bi bi-box-arrow-left'></i></a>
                    <div class='dropdown-menu rounded-0 m-2 bg-primary'>
                        <a href='./login/regseeker.php' class='dropdown-item bg-primary text-white'>Job Seeker</a>
                        <a href='./login/regworker.php' class='dropdown-item bg-primary text-white'>Job Wanter</a>
                    </div>
                </div>";

                    }
                    ?>

                </div>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <?php
                    $sql = "SELECT * FROM `job_post` WHERE `status`='pending'";
                    include './constants/connect.php';
                    $no = 0;
                    $result = mysqli_query($con, $sql);
                    $num = mysqli_num_rows($result);
                    $id = 1;
                    echo $num . " post available";

                    if ($num > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $job_name = $row['name'];
                            $job_email = $row['email'];
                            $job_workdate = $row['dateofwork'];
                            $job_place = $row['place'];
                            $job_desc = $row['job_desc'];
                            $job_postdate = $row['dateofpost'];
                            $job_feild = $row['field'];
                            $job_id = $row['job_id'];
                            $job_status = $row['status'];

                            echo "<div class='job-item p-4 mb-4'>
                                <div class='row g-4'>
                                    <div class='col-sm-12 col-md-8 d-flex align-items-center'>
                                        <img class='flex-shrink-0 img-fluid border rounded' src='img/com-logo-1.jpg'
                                            alt='' style='width: 80px; height: 80px;'>
                                        <div class='text-start ps-4'>
                                            <h5 class='mb-3'>$job_name</h5>
                                            <h6 class='mb-3'>$job_feild</h6>

                                            <p class='p-1'>$job_desc</p>

                                            <span class='text-truncate me-3'><i
                                                    class='fa fa-map-marker-alt text-primary me-2'></i>$job_place</span>
                                            <span class='text-truncate me-3'><i
                                                    class='far fa-clock text-primary me-2'></i>$job_workdate</span>
                                            <span class='text-truncate me-3'><i
                                                    class='far fa-bell text-primary me-2'></i>$job_status</span>
                                            
                                        </div>
                                    </div>
                                    <div
                                        class='col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center'>
                                        <div class='d-flex mb-3'>
                                        ";
                            if ($user == '2') {
                                echo "<a class='btn btn-primary' href='apply.php?apply=$job_id&email=$myemail&status=$job_status' >Apply Now</a>";
                            }
                            echo "
                                        </div>
                                        <small class='text-truncate'><i
                                                class='far fa-calendar-alt text-primary me-2'></i>Date Line: $job_postdate</small>
                                    </div>
                                </div>
                            </div>";
                            $id++;
                        }
                    }else{
                        echo"No Jobs";
                    }
                    // $row = mysqli_fetch_assoc($result);
                    
                    // if($row > 0){
                    //    $arrdata = $row;
                    //     $job_name = $row['name'];
                    //     $job_email = $row['email'];
                    //     $job_workdate = $row['dateofwork'];
                    //     $job_place = $row['place'];
                    //     $job_desc = $row['job_desc'];
                    //     $job_postdate = $row['dateofpost'];
                    //     $job_feild = $row['field'];
                    //     $job_id = $row['job_id'];
                    //     $job_status = $row['status'];
                    
                    // echo "<div class='job-item p-4 mb-4'>
                    //                 <div class='row g-4'>
                    //                     <div class='col-sm-12 col-md-8 d-flex align-items-center'>
                    //                         <img class='flex-shrink-0 img-fluid border rounded' src='img/com-logo-1.jpg'
                    //                             alt='' style='width: 80px; height: 80px;'>
                    //                         <div class='text-start ps-4'>
                    //                             <h5 class='mb-3'>Software Engineer</h5>
                    //                             <span class='text-truncate me-3'><i
                    //                                     class='fa fa-map-marker-alt text-primary me-2'></i>Rewa,
                    //                                 INDIA</span>
                    //                             <span class='text-truncate me-3'><i
                    //                                     class='far fa-clock text-primary me-2'></i>Full Time</span>
                    //                             <span class='text-truncate me-0'><i
                    //                                     class='far fa-money-bill-alt text-primary me-2'></i>$123 -
                    //                                 $456</span>
                    //                         </div>
                    //                     </div>
                    //                     <div
                    //                         class='col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center'>
                    //                         <div class='d-flex mb-3'>
                    //                             <a class='btn btn-light btn-square me-3' href=''><i
                    //                                     class='far fa-heart text-primary'></i></a>
                    //                             <a class='btn btn-primary' href=''>Apply Now</a>
                    //                         </div>
                    //                         <small class='text-truncate'><i
                    //                                 class='far fa-calendar-alt text-primary me-2'></i>Date Line: 01 Jan,
                    //                             2045</small>
                    //                     </div>
                    //                 </div>
                    //             </div>";
                    



                    // }
                    // if (isset($_POST['apply'])) {
                    //     echo $job_id;
                    //     echo $no;
                    //     $jobname = $_POST['name'];
                    //     $jobdesc = $_POST['desc'];
                    

                    // $sqli = "UPDATE `job_post` SET `status`=='pending' WHERE `job_id`='$job_id';";
// $res  = mysqli_query($con,$sqli);
// if($res){
//     echo "Successfully applied for ".$job_name;
// }else{
//     echo "Not applied";
// }
                    // }
                    ?>
                </div>
            </div>
        </div>
        <!-- Jobs End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5 d-flex justify-content-center">

                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="./job-list.php">Job List</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    <h6 class="text-white mb-4">Copyright © 2023 JOBVIA. All Rights Reserved</h6>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kochi, Kerala, IND</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91991919191</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@jobvia.com</p>

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