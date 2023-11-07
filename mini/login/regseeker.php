<!DOCTYPE html>
<html lang="en">

<?php
$log = 0;
$invalid = 0;
$validate = 0;
$last_login = date('d-m-Y h:m A [T P]');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../constants/connect.php';

    $name = $_POST['fname'];
    $email = $_POST['email'];
    $pass = $_POST['rpass'];
    $town = $_POST['town'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];
    $gen = $_POST['gender'];
    $role = 'seeker';
    $id = "SE" . rand(1000, 9999);

    $sql = "INSERT INTO `users`
        (`member_no`, `name`, `email`, `town`, `state`, `phone`,
         `last_login`, `role`, `gender`, `passwrd`, `service`,`about`) 
         VALUES ('$id','$name','$email','$town','$state',
        '$phone','$last_login','$role','$gen','$pass',
        '','')";


    $chkemail = "select * from `users` where email ='$email'";
    $check = mysqli_query($con, $chkemail);
    if ($check) {
        $num = mysqli_num_rows($check);
        if ($num > 0) {
            $validate = 1;
            
        } else {
            $result = mysqli_query($con, $sql);

            if ($result) {
                $log = 1;
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully Registered</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';        
            } else {
                $invalid = 1;
                echo "not inserted";
            }

        }

    }

    

}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
       
       
      
       
    </style>
<script type="text/javascript">
    var npass = document.f1.npass;
    var repass = document.f1.rpass;


function validate_password() {
 
 var pass = document.getElementById('password').value;
 var confirm_pass = document.getElementById('repassword').value;
 if (pass != confirm_pass) {
     document.getElementById('wrong_pass_alert').style.color = 'red';
     document.getElementById('wrong_pass_alert').innerHTML
         = '☒ Use same password';
     document.getElementById('create').disabled = true;
     document.getElementById('create').style.opacity = (0.4);
 } else {
     document.getElementById('wrong_pass_alert').style.color = 'green';
     document.getElementById('wrong_pass_alert').innerHTML =
         '🗹 Password Matched';
     document.getElementById('create').disabled = false;
     document.getElementById('create').style.opacity = (1);
 }
}
</script>
</head>
<body>
    <?php     
if ($invalid) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid </strong>Invalid credentials.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

    if ($validate) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy Invalid !</strong> User already exist.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>

    <form  method="POST" class="bg-light" name="f1">
        <div class="container ">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="heading">
                        <h1>
                            SignUp(seeker)
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6 mb-2 ">
                    <input type="text" class="form-control" id="firstname" placeholder="Firstname" name="fname" required>
                </div>
                <div class="col-6 mb-2">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-2">
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="npass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                </div>
                <div class="col-6 mb-2">
                    <input type="password" class="form-control" id="repassword" placeholder="Confirm password" name="rpass" 
                     required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                     onkeyup="validate_password()">
                </div>
            </div>
            <span id="wrong_pass_alert"></span>
            <div class="row">
                <div class="col-6 mb-2">
                    <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" required
                        minlength="10" maxlength="12">
                </div>
                <div class="col-6 mb-2">
                    <label class="text m-2">Gender&nbsp;</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="female">
                        <label class="form-check-label" for="inlineRadio1">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="male">
                        <label class="form-check-label" for="inlineRadio2">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="others">
                        <label class="form-check-label" for="inlineRadio3">Others</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-2">
                    <input type="text" class="form-control" id="town" placeholder="Town" name="town" required>
                </div>
                <div class="col-6 mb-2">
                    <input type="text" class="form-control" id="state" placeholder="State" name="state" required>
                </div>
            </div>
            <div class="row ">
                <div class="col-12">
                    <input type="submit" class="btn btn-primary w-100" id="registerbtn" value="Register" name="submit" >
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <small>Already have an account? <a href="./login.php">Login</a></small>

                </div>
                <div id="news"></div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>