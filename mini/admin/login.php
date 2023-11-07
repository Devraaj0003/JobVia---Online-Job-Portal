<!DOCTYPE html>
<html lang="en">

<?php
$login = 0;
$invalid = 0;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['passwrd'];
if($email=="Admin@123" and $pass=="Admin@123"){
    $login=1;
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['name'] = 'admin';
    header('location:../admin/admin.php');
}else{
    $invalid = 1;
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
    <strong>Success </strong>You successfully login in.
</div>';
}
?>

<?php
if ($invalid) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid </strong>Invalid credentials.
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
                                Login Admin
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