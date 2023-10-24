<?php session_start();
  if (!isset($_SESSION['patientUserToken'])) {
    header('location: ../userlogin.php?login=login');
  } else {
    include('../connector.php');
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Patient Panel</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="mystyle.css">
<style type="text/css">
  .searchForm{
    width: 300px;
    float: right;
  }
  .searchForm input{
    float: left;
    margin-left: 10px;
  }
  .searchForm button{
    float: right;
  }
</style>
<script src="https://kit.fontawesome.com/28f7157779.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="header">
  <a href="#" id="menu-action">
    <i class="fa fa-bars"></i>
    <span>Menu</span>
  </a>
  <div class="">
    <p class="userInfo"><?php echo $_SESSION['patientUserToken']; ?></p>
    Patient Panel
  </div>
</div>
<div class="sidebar">
  <ul>
    <li><a href="index.php"><i class="fas fa-list"></i><span>Applications</span></a></li>
    <li><a href="chats.php"><i class="far fa-comments"></i><span>Chats</span></a></li>
    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
    </ul>
</div>

<!-- Content -->
<div class="main">

  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Applications</li>
      </ol>

  <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
          <h4>Send a new application</h3>
          <form method="POST" action="../server.php">
            <div class="form-group mb-3">
              <label>Type of application</label>
              <select name="type" class="form-control"required="">
                <option value="" selected disabled>Select type of application</option>
                <option>Requesting information</option>
                <option>Providing information</option>
                <option>Followup to a patient</option>
                <option>Donation Request</option>
                <option>Other</option>
              </select>
            </div>
            <button type="submit" name="addNewApplication" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="col-xl-9 col-sm-6 mb-3" style="overflow-x: auto;">
          <!-- <div class="searchForm">
            <form>
              <div class="form-group wrap">
                <button type="submit" class="btn btn-warning">Search</button>
                <div class="form-group col-xl-9">
                  <input type="text" name="keyCode" class="form-control mb-3" placeholder="Search here ..." required>
                </div>
              </div>
            </form>
          </div> -->
          <h4>Recent of my Applications</h3>
          <br>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Date/Time</th>
              </tr>
            </thead>
            <tbody class="thead-light">
            <?php
              if(isset($_GET['keyCode'])){
                $keyCode = $_GET['keyCode'];
                $query = mysqli_query($connect,"SELECT * FROM citizens WHERE deleted = 0 AND fullname LIKE '%$keyCode%' OR phone LIKE '%$keyCode%' OR email LIKE '%$keyCode%' ORDER BY fullname ASC");
              }else{
                $queryp = mysqli_query($connect,"SELECT * FROM citizens WHERE email = '".$_SESSION['patientUserToken']."'");
                $rowp = mysqli_fetch_array($queryp);
                $query = mysqli_query($connect,"SELECT * FROM applications WHERE deleted = 0 AND patient='".$rowp['id']."' ORDER BY code DESC");
              }
              $rowcount = 0;
              while ($row = mysqli_fetch_array($query)){
                $rowcount ++;
                echo"<tr>
                  <th scope='row'>".$rowcount."</th>
                  <td>".$row['code']."</td>
                  <td>".$row['type']."</td>
                  <td>";
                    if($row['status'] == 1){
                      echo"<a class='btn btn-success btn-sm' role='button'>Approved</a>";
                    }elseif($row['status'] == 2){
                      echo"<a class='btn btn-danger btn-sm' role='button'>Rejected</a>";
                    }else{
                      echo"<a class='btn btn-warning btn-sm' role='button'>Pending</a>";
                    }
                  echo"</td>
                  <td>".$row['adatetime']."</td>
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
