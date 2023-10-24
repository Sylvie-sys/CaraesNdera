<?php session_start();
  if (!isset($_SESSION['adminUserToken'])) {
    header('location: ../index.php?login=login');
  } else {
    include('../connector.php');
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="mystyle.css">
<script src="https://kit.fontawesome.com/28f7157779.js" crossorigin="anonymous"></script>
<style type="text/css">
  .al-right{
    text-align: right;
  }
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="header">
  <a href="#" id="menu-action" class="active">
    <i class="fa fa-bars"></i>
    <span>Menu</span>
  </a>
  <div class="">
    <p class="userInfo"><?php echo $_SESSION['adminUserToken']; ?></p>
    Admin Panel
  </div>
</div>
<div class="sidebar active">
  <ul>
    <li><a href="index.php"><i class="fas fa-home"></i><span>Home page</span></a></li>
    <li><a href="users.php"><i class="fas fa-user-lock"></i><span>System Users</span></a></li>
    <li><a href="patients.php"><i class="fas fa-users"></i><span>Citizens</span></a></li>
    <li><a href="applications.php"><i class="fas fa-list"></i><span>Applications</span></a></li>
    <li><a href="contacts.php"><i class="fas fa-envelope"></i><span>Contacts</span></a></li>
    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
  </ul>
</div>

<!-- Content -->
<div class="main active">
<h2 onclick='window.print();' style='cursor: pointer; color: #09e; float: right;'><i class='fa fa-print'></i></h2>
  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Reports</li>
      </ol>

  <div class="row">
        <div class="col-xl-12 col-sm-6 mb-3" style="overflow-x: auto;">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Plate NO</th>
                <th scope="col">Owner's name</th>
                <th scope="col">Date / Time In</th>
                <th scope="col">Date / Time Out</th>
                <th scope="col">Interval</th>
                <th scope="col" class="al-right">Fee / Frw</th>
                <th scope="col">Approval</th>
              </tr>
            </thead>
            <tbody class="thead-light">
            <?php
              if(isset($_GET['keyCode'])){
                //$keyCode = $_GET['keyCode'];
                //$query = mysqli_query($connection,"SELECT * FROM regions WHERE deleted = 0 AND regionName LIKE '%$keyCode%' OR regionDistrict LIKE '%$keyCode%' OR regionSector LIKE '%$keyCode%'");
              }else{
                $query = mysqli_query($connection,"SELECT * FROM records WHERE timeOut != 'N/A' ORDER BY id DESC");
              }
              $rowcount = 0;
              while ($row = mysqli_fetch_array($query)){

                $cars = mysqli_query($connection, "SELECT * FROM cars WHERE carplateNO = '".$row['car']."'");
                $carsData = mysqli_fetch_array($cars);

                $customer = mysqli_query($connection, "SELECT * FROM customers WHERE customerId = '".$carsData['carowner']."'");
                $customerData = mysqli_fetch_array($customer);

                $rowcount ++;

                $timeInDisplay = date('d/m/Y H:i:s', $row['timeIn']);
                $timeIn = date('Y-m-d H:i:s', $row['timeIn']);

                $timeOutDisplay = "N/A";
                $intervalDisplay = "N/A";
                $approval = "N/A";

                if ($row['timeOut'] != "N/A") {
                  $timeOutDisplay = date('d/m/Y H:i:s', $row['timeOut']);
                  $timeOut = date('Y-m-d H:i:s', $row['timeOut']);

                  $datetime_start = new DateTime($timeIn);
                  $datetime_end = new DateTime($timeOut);
                  $interval = $datetime_start->diff($datetime_end);
                  $intervalDisplay = $interval->format('%H H, %i Min and %s Sec');

                  $results = mysqli_query($connection, "SELECT * FROM users WHERE userId = '".$row['approval']."'");
                  $data = mysqli_fetch_array($results);
                  $approval = $data['userFullname'];
                }

                echo"<tr>
                  <th scope='row'>".$rowcount."</th>
                  <td>".$row['car']."</td>
                  <td>".$customerData['customerName']."</td>
                  <td>".$timeInDisplay."</td>
                  <td>".$timeOutDisplay."</td>
                  <td>".$intervalDisplay."</td>
                  <td class='al-right'>".$row['amount']."</td>
                  <td>".$approval."</td>
                </tr>";
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
