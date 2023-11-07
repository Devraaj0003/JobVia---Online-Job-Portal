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
        <link
            href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
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
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="#" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobVia</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="seeker.php" class="nav-item nav-link ">Home<small>&nbsp;<?php echo $_SESSION['myname']; ?></small></a>
                    <a href="job-list.php" class="nav-item nav-link">Job List</a>

                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.php" class="dropdown-item">Job List</a>
                            <a href="job-detail.php" class="dropdown-item">Job Detail</a>
                        </div>
                    </div> -->
                    <a href="./profile.php" class="nav-item nav-link ">Profile</a>
                    <a href="constants/logout.php" class="nav-item nav-link">Sign Out<i
                            class="bi bi-box-arrow-right ms-2"></i></a>
                </div>
                <a href="./job-post.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i
                        class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
    <div class="container-xxl bg-white p-0">
        <div class="container p-3 m-0">
           

            <form class="bg-dark" method="POST">
                <div class="container ">
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="heading">
                                <h1 class="text-white">
                                    Post Job
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 mb-2 ">
                            <input type="text" class="form-control" id="firstname" placeholder="Firstname" name="fname"
                                value="<?php echo $myname ?>" required>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone"
                                value="<?php echo $myphone ?>" required minlength="10" maxlength="12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <input type="text" class="form-control" id="email" placeholder="Email" name="femail"
                                value="<?php echo $myemail ?>" required>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="date" class="form-control" id="d_o_p" placeholder="Date" name="dateofpost"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <input type="text" class="form-control" id="feild" placeholder="Type of job" name="feild"
                                required>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="text" class="form-control" id="location" placeholder="Location" name="location"
                                value="<?php echo $mytown ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-outline">
                            <textarea name="description" id="description" cols="" rows="4" minlength="5"
                                class="form-control" placeholder="Job description" required></textarea>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-12 mt-3 mb-4">
                            <input type="submit" class="btn btn-primary w-100" id="registerbtn" value="POST"
                                name="submit">
                        </div>
                    </div>
                </div>
            </form>
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
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // include 'constants/connect.php';

    $name = $_POST['fname'];
    $email = $_POST['femail'];
    $town = $_POST['location'];
    $phone = $_POST['phone'];
    $feild = $_POST['feild'];
    $dateofpost = $_POST['dateofpost'];
    $desc = $_POST['description'];
    $jobid = "JO" . rand(1000, 9999);
    $date = date('Y-m-d');
    $status = 'pending';

    $sql = "INSERT INTO `job_post`(`job_id`, `name`, `email`, `dateofwork`, `phone`, `place`, `job_desc`, `dateofpost`, `status`, `field`, `receiver`) VALUES 
    ('$jobid','$name','$email','$dateofpost','$phone','$town','$desc','$date','$status','$feild','')";
    $check = mysqli_query($con, $sql);

    if ($check) {
        echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Successfully !</strong>Job Posted.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        echo " <div class=' alert alert-danger alert-dismissible fade show'  role=' alert' >
        <strong>Invalid </strong>Job Posting failed.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }



}

?>
<div class="container" id="posted_jobs">
   
    <div class="h1 text-center"> POSTED JOBS</div>
    <?php

    $sql = "SELECT * FROM `job_post` WHERE `email`='$myemail'";
    include './constants/connect.php';
    $no = 0;
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    $id = 1;
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
                                        <h7 class='mb-3'> $id $job_status</h7>
                                            <h5 class='mb-3'>$job_name $job_id</h5>
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
                                        if($job_status=='pending')
                                        {
                                            echo"<a class='btn btn-muted' >Pending</a>";
                                        }else
                                        {
                                            echo "<a class='btn btn-primary'>Applied</a>";
                                        }
                                        echo "<a class='btn btn-primary mx-4' href='delete.php?delete=$job_id' >Delete</a>
                                        </div>
                                        <small class='text-truncate'><i
                                                class='far fa-calendar-alt text-primary me-2'></i>Date Line: $job_postdate</small>
                                    </div>
                                </div>
                            </div>";
            $id++;
        }
    }else{
        echo "NO JOB POSTED YET !";
    }
    ?>
</div>

</html>