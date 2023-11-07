<!DOCTYPE html>
<html lang="en">
<?php


session_start();
$myname = $_SESSION['myname'];
if (!isset($myname)) {
    header('location:./index.php');
} else {
    include './constants/connect.php';

    $_SESSION['logged'] = true;
    $myemail = $_SESSION['myemail'];
    $myphone = $_SESSION['myphone'];
    $mytown = $_SESSION['mytown'];
    $mystate = $_SESSION['mystate'];
    $myservice = $_SESSION['myservice'];
    $myabout = $_SESSION['myabout'];
    $mygender = $_SESSION['gender'];
    $last_login = $_SESSION['lastlogin'];
    $myrole = $_SESSION['role'];

}
?>
<head>
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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
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
    <!-- Posted Jobs -->
    <div class="container-xxl py-5 bg-dark page-header mb-5">
            
        </div>
         <!-- Jobs Start -->
         <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <?php
                $sql = "SELECT * FROM `job_post` WHERE `email`= '$myemail'";
                include './constants/connect.php';
                $result = mysqli_query($con, $sql);
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

                    <i class='bi bi-trash text-light me-2'></i><input type='submit' class='btn btn-primary'value='Delete' name='delete'>
                    </form>

                        <small class='text-truncate'><i class='far fa-calendar-alt text-primary me-2'></i>Date Line: $job_workdate</small>
                        <small class='text-truncate'><i class='bi bi-bookmark-fill text-primary me-2'></i>Status: $job_status</small>
                        </div>
                    </div>
                </div>
                </div>
        </div>";

                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $sqli = "DELETE FROM `job_post` WHERE `job_id`='$job_id'";
                    $res = mysqli_query($con, $sqli);
                    if ($res) {
                        echo "deleted";
                    } else {
                        echo "not deleted";
                    }

                }else{
                    echo "No Job Posted";
                }
                ?>
            </div>
            </div>
        </div>
        <!-- Jobs End -->
       
       

</div>        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>
</body>
</html>