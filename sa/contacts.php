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
        <li class="breadcrumb-item active">Contacts</li>
      </ol>

  <div class="row">
        <div class="col-xl-12 col-sm-6 mb-3" style="overflow-x: auto;">
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
          <h4>Recent Received Contacts</h3>
          <br>

          <?php
              if(isset($_GET['keyCode'])){
                $keyCode = $_GET['keyCode'];
                $query = mysqli_query($connect,"SELECT * FROM patients WHERE deleted = 0 AND fullname LIKE '%$keyCode%' OR phone LIKE '%$keyCode%' OR email LIKE '%$keyCode%' ORDER BY fullname ASC");
              }else{
                $query = mysqli_query($connect,"SELECT * FROM contacts WHERE deleted = 0 ORDER BY id DESC");
              }
              $rowcount = 0;
              while ($row = mysqli_fetch_array($query)){

              echo"<table class='table'>
                  <tbody class='thead-light'>
                <tr>
                  <th scope='row'>Name:</th>
                  <td>".$row['name']."</td>
                </tr>
                <tr>
                  <th scope='row'>Email:</th>
                  <td>".$row['email']."</td>
                </tr>
                <tr>
                  <th scope='row'>Phone:</th>
                  <td>".$row['phone']."</td>
                </tr>
                <tr>
                  <th scope='row'>Message:</th>
                  <td>".$row['message']."</td>
                </tr>
                <tr>
                  <th scope='row'>Date/Time:</th>
                  <td>".$row['mdatetime']."</td>
                </tr>
                <tr>
                  <th scope='row'></th>
                  <td>
                    <a class='btn btn-outline-danger btn-sm' href='../server.php?deleteContact=".$row['id']."' role='button'>Delete</a>
                  </td>
                </tr>
                </tbody>
                </table>";
              }
            ?>
            
        </div>
      </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
