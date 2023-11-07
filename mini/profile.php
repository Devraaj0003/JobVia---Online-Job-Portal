<?php

session_start();
if ($myrole = $_SESSION['role']) {
    $myname = $_SESSION['myname'];
}
if (!isset($myname)) {
    header('location:../index.php');
} else {
    $_SESSION['logged'] = true;
    $myemail = $_SESSION['myemail'];
    $myphone = $_SESSION['myphone'];
    $mytown = $_SESSION['mytown'];
    $mystate = $_SESSION['mystate'];
    $myservice = $_SESSION['myservice'];
    $myabout = $_SESSION['myabout'];
    $mygender = $_SESSION['gender'];
    $last_login = $_SESSION['lastlogin'];
    $role = $_SESSION['role'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobVia - Profile</title>
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

    <div class="container bg-white">
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="./worker.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobVia</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="./worker.php" class="nav-item nav-link ">Home<small>&nbsp;
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


                    <a href="./profile.php" class="nav-item nav-link active">Profile</a>

                    <!-- <a href="contact.php" class="nav-item nav-link">Contact</a> -->
                </div>

                <a href="./constants/logout.php" class="nav-item nav-link">Sign Out<i
                        class="bi bi-box-arrow-right ms-2"></i></a>



            </div>
        </nav>
        <div class="row row-lg mt-3 mx-3">
            <label class="h1 text-dark ">Profile</label>
        </div>
        <div class="row mx-4 row-light">
            <div class="col col-4 bg-dark text-white ">
                <div class="d-flex justify-content-center flex-column">
                    <div class="card w-auto mt-4 mb-3 mx-auto rounded-circle p-1">
                        <img src="./img/profile-img.png" class="img " alt="profile_imga" style="height:150px">
                    </div>
                    <h5 class="h5 mx-2 text-center text-white w-100">
                        <?php echo $myname ?>
                    </h5>
                    <h5 class="h6 mx-2 text-center text-white w-100">
                        <?php echo $myrole ?>
                    </h5>
                </div>
                <form>
                    <?php
                    if ($role == "seeker") {
                        echo " 
                <a class='btn btn-outline-primary my-4 w-100' href='./job-post.php'>POST JOB</a>
                <a class='btn btn-sm btn-light w-100 mb-3' href='./seeker.php'>Home</a>
                <a class='btn btn-sm btn-light w-100 mb-3' href='job-post.php#posted_jobs'>Posted Jobs</a>";
                    } else { ?>
                        <a class='btn btn-outline-primary my-4 w-100' href="#myjobs">MY JOBS</a>
                        <a class='btn btn-sm btn-light w-100 mb-3' href='./worker.php'>Home</a>

                        <?php
                    }
                    ?>
                    <a class='btn btn-sm btn-light w-100 mb-3' href='job-list.php'>Job List</a>
                    <a class="btn btn-sm btn-light w-100  mb-3" href="./constants/logout.php">Log Out</a>
                </form>
            </div>
            <div class="col bg-primary ">
                <form method="POST" class="bg-primary text-white">

                    <div class="row mt-4">
                        <div class="col-12 mt-4">
                            <label class="h6" style="color: #041d2a;;">Last login :
                                <?php echo $last_login ?>
                            </label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6 mb-3 ">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                value="<?php echo $myname ?>" readonly>
                        </div>
                        <div class="col-6 mb-2">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                value="<?php echo $myemail ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6 mb-2">
                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone"
                                value="<?php echo $myphone ?>" required minlength="10" maxlength="12">
                        </div>
                        <div class="col-6 mb-2">
                            <input type="text" class="form-control" id="gender" placeholder="Gender" name="gender"
                                value="<?php echo $mygender ?>" readonly>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6 mb-2">
                            <input type="text" class="form-control" id="town" placeholder="Town" name="town"
                                value="<?php echo $mytown ?>">
                        </div>
                        <div class="col-6 mb-2">
                            <input type="text" class="form-control" id="state" placeholder="State" name="state"
                                value="<?php echo $mystate ?>">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <?php if ($role == "worker") {
                            echo "<div class='col-6 mb-2'>
                        <input type='text' class='form-control' id='service' placeholder='Service' name='service' value='$myservice'>
                        </div>
                        <div class='col-6 mb-2'>
                        <textarea class='form-control' id='textarea1' rows='1' placeholder='About' name='about' value='$myabout'></textarea>
                        </div>";
                        }
                        ?>
                    </div>
                    <div class="row mt-4 ">
                        <div class="col-12">
                            <input type="submit" class="btn btn-dark w-100" id="registerbtn" value="Update" style="height:4rem;" name="submit">
                        </div>
                    </div>

                </form>



                <!-- updating profile -->
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $town = $_POST['town'];
                    $state = $_POST['state'];
                    $gen = $_POST['gender'];
                    $about = $_POST['about'];
                    $service = $_POST['service'];


                    include './constants/connect.php';
                    $sql = "UPDATE `users` SET `town`= '$town',
 `state`='$state',`last_login`='$last_login',
 `gender`='$gen',`service`='$service',`about`='$about' WHERE `email`='$myemail'";

                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        echo "updated successfully";
                        // header('location:profile.php');
                    } else {
                        echo " not updated ";
                    }
                }
                ?>
            </div>
        </div>


        <!-- job applied only for workers -->
        <?php
        if ($myrole == 'worker') {
            echo "    <div class='container' id='myjobs' >
    <div class='h1 text-center text-dark p-4 mt-4'>MY JOBS</div>
    ";


            $sqli = "SELECT * FROM `job_post` WHERE `receiver`='$myemail'";
            include './constants/connect.php';
            $no = 0;
            $resulti = mysqli_query($con, $sqli);
            $num = mysqli_num_rows($resulti);
            $id = 1;
            if ($num > 0) {
                while ($row = mysqli_fetch_array($resulti)) {
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
                                    <h7 class='mb-3'> $id </h7>
                                        <h5 class='mb-3'>$job_name </h5>
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
                                    <a class='btn btn-primary' href='apply.php?apply=$job_id' >Applied</a>
                                    </div>
                                    <small class='text-truncate'><i
                                            class='far fa-calendar-alt text-primary me-2'></i>Date Line: $job_postdate</small>
                                </div>
                            </div>
                        </div>";
                    $id++;
                }
            } else {
                echo "<h4 class='text-center'>No Jobs Applied</h4>";
            }

            echo "</div>";
        }
        ?>
    </div>
</body>

</html>