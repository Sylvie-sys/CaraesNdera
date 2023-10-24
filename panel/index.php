<?php session_start();
  if (!isset($_SESSION['adminUserToken'])) {
    header('location: ../userlogin.php?login=login');
  }else{
    include('../connector.php');
    $query = mysqli_query($connect, "SELECT * FROM users WHERE deleted = 0");
    $users_count = mysqli_num_rows($query);

    $query = mysqli_query($connect, "SELECT * FROM patients WHERE deleted = 0");
    $pat_count = mysqli_num_rows($query);

    $query = mysqli_query($connect, "SELECT * FROM citizens WHERE deleted = 0");
    $citizens_count = mysqli_num_rows($query);

    $query = mysqli_query($connect, "SELECT * FROM applications WHERE deleted = 0");
    $applications_count = mysqli_num_rows($query);

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
  .dash_link{
    text-decoration: none;
    color: #333;
    transition: .5s;
  }
  .dash_link:hover{
    text-decoration: none;
    color: #fff;
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
  <section class="statis mt-4 text-center">
      <div class="row">

      
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
        <a class="dash_link" href="users.php">
          <div class="box bg-primary p-3">
            <i class="uil-eye"></i>
            <h3><?php echo $users_count; ?></h3>
            <p class="lead">System Users</p>
          </div>
        </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
        <a class="dash_link" href="patients-list.php">
          <div class="box bg-success p-3">
            <i class="uil-user"></i>
            <h3><?php echo $pat_count; ?></h3>
            <p class="lead">Patients</p>
          </div>
        </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
        <a class="dash_link" href="patients.php">
          <div class="box bg-danger p-3">
            <i class="uil-user"></i>
            <h3><?php echo $citizens_count; ?></h3>
            <p class="lead">Citizens</p>
          </div>
        </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
        <a class="dash_link" href="applications.php">
          <div class="box bg-warning p-3">
            <i class="uil-shopping-cart"></i>
            <h3><?php echo $applications_count; ?></h3>
            <p class="lead">Applications</p>
          </div>
        </a>
        </div>
      </div>
    </section>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
