<?php
include './constants/connect.php';
if (isset($_GET['apply'])) {
    $apply_id = $_GET['apply'];
    $receiver = $_GET['email'];
    $status = $_GET['status'];
    $page = $_GET['page'];
    $confirm = $_GET['conf'];

    echo '' . $confirm . '' . $receiver;
    if ($status == "pending") {
        // echo $apply_id;
        $sql = "UPDATE `job_post` SET `status`='applied' , `receiver`='$receiver'  WHERE job_id = '$apply_id'";
        $apply_query = mysqli_query($con, $sql);
        echo $status;

        // if ($page == "worker") {
        //     header('location:worker.php');
        // } else {
            if ($apply_query) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success </strong>You successfully login Applied<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                header('location:profile.php#myjobs');
            } else {
                echo "Not Applied";
                header('location:job-list.php');

            }
        // }
    } elseif ($confirm == "add") {
        $sql = "UPDATE `users` SET `role`='worker' WHERE email = '$apply_id'";
        $applied_query = mysqli_query($con, $sql);
        if ($applied_query) {
            
            header('location:./admin/admin.php');
        } else {
            echo "Not added";
            header('location:./admin/admin.php');

        }
    } else {
        $sql = "UPDATE `job_post` SET `status`='pending', `receiver`=''   WHERE job_id = '$apply_id'";
        $applied_query = mysqli_query($con, $sql);

        if ($applied_query) {
            header('location:./profile.php');
        } else {
            echo "Not Applied";
            header('location:./profile.php');

        }
    }



}



?>
