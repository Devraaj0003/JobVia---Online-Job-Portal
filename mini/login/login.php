<!DOCTYPE html>
<html lang="en">

<?php
$login = 0;
$invalid = 0;
$last_login = date('d-m-Y h:m A [T P]');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../constants/connect.php';

    $email = $_POST['email'];
    $pass = $_POST['passwrd'];


    $sql = "select * from `users` where email = '$email' and passwrd = '$pass'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            $login = 1;
            foreach ($result as $row) {
                $role = $row['role'];
                if ($role == "worker") {
                    echo " welcome worker";
                    session_start();
                    $_SESSION['logged'] = true;
                    $_SESSION['myid'] = $row['member_no'];
                    $_SESSION['myname'] = $row['name'];
                    $_SESSION['myemail'] = $row['email'];
                    $_SESSION['myphone'] = $row['phone'];
                    $_SESSION['mytown'] = $row['town'];
                    $_SESSION['mystate'] = $row['state'];
                    $_SESSION['myservice'] = $row['service'];
                    $_SESSION['myabout'] = $row['about'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['lastlogin'] = $last_login;
                    $_SESSION['role'] = $role;
                    header('location:../worker.php');

                } else if($role == "seeker"){
                    echo " welcome seeker";
                    session_start();
                    $_SESSION['logged'] = true;
                    $_SESSION['myid'] = $row['member_no'];
                    $_SESSION['myname'] = $row['name'];
                    $_SESSION['myemail'] = $row['email'];
                    $_SESSION['myphone'] = $row['phone'];
                    $_SESSION['mytown'] = $row['town'];
                    $_SESSION['mystate'] = $row['state'];
                    $_SESSION['myservice'] = $row['service'];
                    $_SESSION['myabout'] = $row['about'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['lastlogin'] = $last_login;
                    $_SESSION['role'] = $role;
                    header('location:../seeker.php');
                }else{
                    $login =0;
                    echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Be Patient !</strong>Admin have to verify your account.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                }
            }
        } else {
            $invalid = 1;

        }
    } else {
        echo 'no result';
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
</head>
<?php
if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success </strong>You successfully login in.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<?php
if ($invalid) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid </strong>Invalid credentials.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
</div>';
}
?>


<body style="background-color:gray">

    <div class="container bg-light w-50">

        <div class="row mt-5 justify-content-center">
            <div class="col  mt-1 text-center">
                <!-- action=".././constants/auth.php" -->
                <form method="POST" action="login.php">
                    <div class="row mt-4">
                        <div class="heading">
                            <h1>
                                Login
                            </h1>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col col-9 mt-3">
                            <input type="text" class="form-control" name="email" id="uemail" placeholder="Email"
                                required>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col col-9 mt-3 text-center">
                            <input type="password" class="form-control" name="passwrd" id="password"
                                placeholder="Password" required >
                                <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"> -->
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col col-9 mt-3 mb-3 text-center">
                            <input type="submit" value="Log in" class="btn btn-primary w-100 "><br>
                            <small>Don't have an account? Register as <a href="./regworker.php">worker</a> or
                                <a href="./regseeker.php">seeker</a></small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>

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