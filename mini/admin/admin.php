<?php
session_start();
$myname = $_SESSION['name'];
if (!isset($myname)) {
  header('location:./login.php');
}
include '../constants/connect.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JobVia - Admin Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script lang=text/javascript>
    function employee() {
      var x = document.getElementById("employee");
      console.log("haiii");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }

    function employer() {
      var x = document.getElementById("employer");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }

    function book() {
      var x = document.getElementById("booking");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    function newreg() {
      var x = document.getElementById("newreg");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    function bid() {
      var x = document.getElementById("bids");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
  </script>
</head>
<style>
    .card:hover {
    background-color: #00B074; /* Change background color on hover */
    transform: scale(1.1); /* Apply a zoom effect on hover */
    color: white;
  }
  .card-title:hover,.card-subtitle:hover{
    color: white;
  }
</style>

<body style="background-color:#d5d5d5">
  <div class="container-xxl p-0" style="background-color:white">
    <div class="row m-2 ">
      <div class="h1 p-4 mt-3 ml-3 text-bold">Admin</div>
    </div>
    <div class="row mx-3 mb-3">
      <div class="col-3 text-center d-flex flex-column mb-5 h-50 " style="background-color:#00B074">
        <div class="h2 p-3 my-3 mt-5 text-light">JobVia</div>
        <div class="btn btn-m btn-outline-light active mb-3 mt-auto">Dashboard</div>
        <div class="btn btn-m btn-outline-light  mb-3 " onclick="book()">Bookings</div>
        <div class="btn btn-m btn-outline-light  mb-3" onclick="newreg()">New Registeration</div>
        <div class="btn btn-m btn-outline-light  mb-3" onclick="employer()">Employer</div><!-- seeeker -->
        <div class="btn btn-m btn-outline-light  mb-3 " onclick="employee()">Employee</div> <!-- worker -->
        <div class="btn btn-m btn-outline-light  mb-3" onclick="bid()">Job Bids</div>
        <a class="btn btn-m btn-outline-light  mb-3 " href="../constants/logout.php">Sign Out</a>
      </div>

      <div class="col">
        <!-- Dashboard section -->
        <?php
        $sql = "SELECT * FROM `users` WHERE `role`='worker'";
        $result = mysqli_query($con, $sql);
        $tot_worker = mysqli_num_rows($result);


        $sql1 = "SELECT * FROM `users` WHERE `role`='seeker'";
        $result1 = mysqli_query($con, $sql1);
        $tot_seeker = mysqli_num_rows($result1);

        $sql2 = "SELECT * FROM `job_post` ";
        $result2 = mysqli_query($con, $sql2);
        $tot_bid = mysqli_num_rows($result2);

        $sql3 = "SELECT * FROM `job_post` WHERE receiver LIKE '%@%'";
        $result3 = mysqli_query($con, $sql3);
        $tot_booking = mysqli_num_rows($result3);

        $sql4 = "SELECT * FROM `users` WHERE `role`='pending'";
        $result4 = mysqli_query($con, $sql4);
        $tot_new_reg = mysqli_num_rows($result4);

        // echo $row . '-' . $row1 . '-' . $row2;
        
        ?>
        <div class="section d-flex justify-content-evenly flex-wrap">

<!-- dashboard cards -->
          <div class="card border-success " style="width: 18rem; height:18rem;">
          <a class="card-body d-flex flex-column justify-content-center align-items-center  text-success text-decoration-none"
               href="#employee">
              <h5 class="card-title h2">Total Employee</h5>
              <h6 class="card-subtitle mb-2 h3">
                <?php echo $tot_worker; ?>
              </h6>
</a>
          </div>

          <div class="card border-success " style="width: 18rem; height:18rem;">
          <a class="card-body d-flex flex-column justify-content-center align-items-center  text-success text-decoration-none"
              href="#employer">
              <h5 class="card-title h2">Total Employer</h5>
              <h6 class="card-subtitle mb-2 h3">
                <?php echo $tot_seeker; ?>
              </h6>
</a>
          </div>

          <div class="card border-success " style="width: 18rem; height:18rem;">
          <a class="card-body d-flex flex-column justify-content-center align-items-center  text-success text-decoration-none" href ="#bids">
              <h5 class="card-title h2">Total Bid</h5>
              <h6 class="card-subtitle mb-2 h3">
                <?php echo $tot_bid; ?>
              </h6>
</a>
          </div>

          <div class="card border-success mt-5 " style="width: 18rem; height:18rem;">
          <a class="card-body d-flex flex-column justify-content-center align-items-center  text-success text-decoration-none"
              href="#booking">
              <h5 class="card-title h2">Total Booking</h5>
              <h6 class="card-subtitle mb-2 h3">
                <?php echo $tot_booking; ?>
              </h6>
</a>
          </div>

          <div class="card border-success mt-5" style="width: 18rem; height:18rem;">
            <a class="card-body d-flex flex-column justify-content-center align-items-center  text-success text-decoration-none"
              href="#newreg">
              <h5 class="card-title h2 text-center">Total New Registeration</h5>
              <h6 class="card-subtitle mb-2 h3">
                <?php echo $tot_new_reg; ?>
              </h6>
</a>
          </div>
        </div>

        <!-- new Registeration -->
        <div class="section bg-light " id="newreg" style="display:none">
          <div class="h3 text-dark my-3 ml-3"> NEW REGISTRATION</div>

          <table class="table">
            <thead class="table-dark">
              <th>Member-ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Town</th>
              <th>State</th>
              <th>Service</th>
              <th>Gender</th>
              <th>Check</th>
            </thead>
            <tbody>
              <?php
                if($tot_new_reg == "0"){
                  echo "NO NEW REGISTRATION'S";
                }else{
              $sql = "SELECT `member_no`, `name`, `email`, `town`, `state`, `phone`, `gender`, `service` FROM `users` WHERE `role`='pending'";
              $result = mysqli_query($con, $sql);
              echo $tot_new_reg;
              if ($result) {
              
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <form method='get'>
                      <td>$row[member_no]</td>
                      <td>$row[name]</td>
                      <td>$row[email]</td>
                      <td>$row[phone]</td>
                      <td>$row[town]</td>
                      <td>$row[state]</td>
                      <td>$row[service]</td>
                      <td>$row[gender]</td>
                      <td>
                      <button><a href='../apply.php?apply=$row[email]&conf=add'>ADD</a></button>
                      <button><a href='../delete.php?delete=$row[email]&conf=delete'>DELETE</a></button></td>
                    </form>
                      </tr>";
                  }
                }
                
              }
              ?>

            </tbody>
          </table>

        </div>

        <!-- employee section -->
        <div class="section bg-light " id="employee" style="display:none">
          <div class="h3 text-dark my-3 ml-3">Employee</div>

          <table class="table">
            <thead class="table-dark">
              <th>Member-ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Town</th>
              <th>State</th>
              <th>Service</th>
              <th>Gender</th>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT `member_no`, `name`, `email`, `town`, `state`, `phone`, `gender`, `service` FROM `users` WHERE `role`='worker'";
              $result = mysqli_query($con, $sql);
              if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                    <td>$row[member_no]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[town]</td>
                    <td>$row[state]</td>
                    <td>$row[service]</td>
                    <td>$row[gender]</td>
                    </tr>";
                }
              } else {
                echo "NO EMPLOYEE'S";
              }
              ?>

            </tbody>
          </table>

        </div>

        <!-- employer -->
        <div class="section bg-light " id="employer" style="display:none">
          <div class="h3 text-dark my-3 ml-3">Employer</div>

          <table class="table">
            <thead class="table-dark">
              <th>Member-ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Town</th>
              <th>State</th>
              <th>Service</th>
              <th>Gender</th>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT `member_no`, `name`, `email`, `town`, `state`, `phone`, `gender`, `service` FROM `users` WHERE `role`='seeker'";
              $result = mysqli_query($con, $sql);
              if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                    <td>$row[member_no]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[town]</td>
                    <td>$row[state]</td>
                    <td>$row[service]</td>
                    <td>$row[gender]</td>
                    </tr>";
                }
              } else {
                echo "NO EMPLOYER'S";
              }
              ?>

            </tbody>
          </table>

        </div>

        <!-- Booking section -->
        <div class="section bg-light" id="booking" style="display: none;">
          <div class="h3 text-dark my-3 ml-3">Bookings</div>

          <table class="table">
            <thead class="table-dark">
              <th>Job-ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>DateOFJob</th>
              <th>Phone</th>
              <th>Place</th>
              <th>DateOfPost</th>
              <th>Receiver</th>
              <th>Field</th>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT `job_id`, `name`, `email`, `dateofwork`, `phone`, `place`, `dateofpost`, `receiver`, `field` FROM `job_post` WHERE `status`='applied'";
              $result = mysqli_query($con, $sql);
              if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                    <td>$row[job_id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[dateofwork]</td>
                    <td>$row[phone]</td>
                    <td>$row[place]</td>
                    <td>$row[dateofpost]</td>
                    <td>$row[receiver]</td>
                    <td>$row[field]</td>
                    </tr>";
                }
              } else {
                echo "NO JOBS POSTED";
              }
              ?>

            </tbody>
          </table>

        </div>

        <!-- job bid -->
        <div class="section bg-light" id="bids" style="display: none;">
          <div class="h3 text-dark my-3 ml-3">JOB BIDS</div>

          <table class="table">
            <thead class="table-dark">
              <th>Job-ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>DateOFJob</th>
              <th>Phone</th>
              <th>Place</th>
              <th>DateOfPost</th>
              <th>Receiver</th>
              <th>Field</th>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT `job_id`, `name`, `email`, `dateofwork`, `phone`, `place`, `dateofpost`, `receiver`, `field` FROM `job_post` ";
              $result = mysqli_query($con, $sql);
              if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                    <td>$row[job_id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[dateofwork]</td>
                    <td>$row[phone]</td>
                    <td>$row[place]</td>
                    <td>$row[dateofpost]</td>
                    <td>$row[receiver]</td>
                    <td>$row[field]</td>
                    </tr>";
                }
              } else {
                echo "NO JOBS POSTED";
              }
              ?>

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
  integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>