<?php
include './constants/connect.php';
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $confirm = $_GET['conf'];

    
    $sql = "DELETE FROM `job_post` WHERE job_id = '$delete_id'";
    $apply_query = mysqli_query($con, $sql);
    if ($apply_query) {
        header('location:./job-post.php');
    }
    if ($confirm == "delete") {
        $sql = "DELETE FROM `users` WHERE email = '$delete_id'";
        $apply_query = mysqli_query($con, $sql);
        if ($apply_query) {
            header('location:./admin/admin.php');
        }

    }


}


?>