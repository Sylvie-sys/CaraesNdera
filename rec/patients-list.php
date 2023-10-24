<?php session_start();
  if (!isset($_SESSION['adminUserToken'])) {
    header('location: ../userlogin.php?login=login');
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
<style type="text/css">
  .searchForm{
    width: 300px;
    float: right;
  }
  .searchForm input{
    float: right;
    margin-right: 10px;
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
    <p class="userInfo"><?php echo $_SESSION['adminUserToken']; ?></p>
    Admin Panel
  </div>
</div>

<?php include('sidebar.php'); ?>

<!-- Content -->
<div class="main">

  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Patients</li>
      </ol>

  <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <h4>Add a new patients</h3>
          <form method="POST" action="../server.php">
            <div class="form-group mb-3">
              <label>Patient Code</label>
              <input type="text" name="pat_code" class="form-control" placeholder="Enter patient code" required="">
            </div>
             <div class="form-group mb-3">
              <label>Gender</label>
              <select name="gender" class="form-control" required>
                <option selected value="" disabled>Select patient gender</option>
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label>Average Age</label>
              <input type="text" name="av_age" class="form-control" placeholder="Enter average age" required="">
            </div>
            <div class="form-group mb-3">
              <label>Average Height</label>
              <input type="text" name="av_height" class="form-control" placeholder="Enter average Height" required="">
            </div>
            <div class="form-group mb-3">
              <label>Pick-up Point</label>
              <input type="text" name="pick_point" class="form-control" placeholder="Enter pick-up point" required="">
            </div>
            <button type="submit" name="addNewPatient" class="btn btn-primary">Add new</button>
          </form>
        </div>
        <div class="col-xl-9 col-sm-6 mb-3" style="overflow-x: auto;">
          <div class="searchForm">
              <div class="form-group wrap">
                <a href="reports/p-report.php" class="btn btn-sm btn-success">Generate Patients Report</a>
              </div>
          </div>
          <h4>Registered patients</h3>
          <br>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Gender</th>
                <th scope="col">Average age</th>
                <th scope="col">Average height</th>
                <th scope="col">Pick-up point</th>
                <th scope="col" style="width: 230px;">Option</th>
              </tr>
            </thead>
            <tbody class="thead-light">
            <?php
              if(isset($_GET['keyCode'])){
                $keyCode = $_GET['keyCode'];
                $query = mysqli_query($connect,"SELECT * FROM users WHERE deleted = 0 AND fullname LIKE '%$keyCode%' OR phone LIKE '%$keyCode%' OR email LIKE '%$keyCode%' ORDER BY fullname ASC");
              }else{
                $query = mysqli_query($connect,"SELECT * FROM patients WHERE deleted = 0 ORDER BY id DESC");
              }
              $rowcount = 0;
              while ($row = mysqli_fetch_array($query)){
                $rowcount ++;
                echo"<tr>
                  <th scope='row'>".$rowcount."</th>
                  <td>".$row['patient_code']."</td>
                  <td>".$row['gender']."</td>
                  <td>".$row['av_age']."</td>
                  <td>".$row['av_height']."</td>
                  <td>".$row['pick_point']."</td>
                  <td>
                    <a class='btn btn-outline-success btn-sm' href='other-info.php?patId=".$row['id']."' role='button'>Other Info</a>
                    <a class='btn btn-outline-primary btn-sm' href='editPatient.php?patId=".$row['id']."' role='button'>Edit</a>
                    <a class='btn btn-outline-danger btn-sm' href='../server.php?deletePatient=".$row['id']."' role='button'>Delete</a>
                  </td>
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
<script type="text/javascript">
  // Allowing only numbers in an input
  function allowNumbersOnly(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
  }
  function onlyAlphabets(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        }
        else if (e) {
            var charCode = e.which;
        }
        else { return true; }
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 32)
            return true;
        else
            return false;
    }
    catch (err) {
        alert(err.Description);
    }
}
</script>
</body>
</html>
