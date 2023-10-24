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
        <li class="breadcrumb-item active">Applications</li>
      </ol>

  <div class="row">
        <div class="col-xl-12 col-sm-6 mb-3" style="overflow-x: auto;">
          <?php
		  echo"<div class='searchForm'>
		  
		  <div>
		  
            <form method='GET' action='applications.php'>
			
              <div class='form-group wrap'>
			  
			  <div>
               <div> <button class='btn btn-primary'>Search</button></div>
                <div class='form-group col-xl-8'>
                  <input type='text' name='keyCode' class='form-control' required>
                </div>
              </div>
			  </div>
			  </div>
			 
            </form>";
			
          if(isset($_GET['approveApplication'])){
          echo"<div class='searchForm'>
            <form method='POST' action='../server.php'>
              <div class='form-group wrap'>
                <button type='submit' name='approveApplication' class='btn btn-primary'>Approve</button>
				
                <input type='hidden' name='patient' value='".$_GET['patient']."'>
                <input type='hidden' name='code' value='".$_GET['approveApplication']."'>
                <div class='form-group col-xl-8'>
                  <select name='counselor' class='form-control' required=''>
                    <option value='' selected disabled>Choose Counselor</option>";
                    $query = mysqli_query($connect,"SELECT * FROM users WHERE deleted = 0 ORDER BY fullname ASC");
                    while ($row = mysqli_fetch_array($query)){
                      echo"<option>".$row['fullname']."</option>";
                    }
                  echo"</select>
				  
				  </div>
                </div>
              </div>
			  
            </form>";
          }
          ?>
          </div>
          <h4>Recent Received Applications</h3>
          <br>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Names</th>
                <th scope="col">Phone</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Date/Time</th>
                <th scope="col" style="width: 130px;">Option</th>
              </tr>
            </thead>
            <tbody class="thead-light">
            <?php
              if(isset($_GET['keyCode'])){
                $keyCode = $_GET['keyCode'];
                $query = mysqli_query($connect,"SELECT * FROM applications WHERE deleted = 0 AND type LIKE '%$keyCode%' ORDER BY code DESC");
              }else{
                $query = mysqli_query($connect,"SELECT * FROM applications WHERE deleted = 0 ORDER BY code DESC");
              }
              $rowcount = 0;
              while ($row = mysqli_fetch_array($query)){
                $rowcount ++;

                $queryp = mysqli_query($connect,"SELECT * FROM citizens WHERE id = '".$row['patient']."'");
                $rowp = mysqli_fetch_array($queryp);

                echo"<tr>
                  <th scope='row'>".$rowcount."</th>
                  <td>".$row['code']."</td>
                  <td>".$rowp['fullname']."</td>
                  <td>".$rowp['phone']."</td>
                  <td>".$row['type']."</td>
                  <td>";
                    if($row['status'] == 0){
                      echo"Pending ...";
                    }elseif($row['status'] == 2){
                      echo"Rejected";
                    }else{
                      echo"Approved";
                    }
                  echo"</td>
                  <td>".$row['adatetime']."</td>
                  <td style='width: 220px;'>";
                  if($row['status'] == '0'){
                    echo"<a class='btn btn-outline-success btn-sm' href='?approveApplication=".$row['code']."&patient=".$row['patient']."' role='button'>Approve</a>
                    <a class='btn btn-outline-danger btn-sm' href='../server.php?rejectApplication=".$row['code']."&patient=".$row['patient']."' role='button'>Reject</a>";
                  }else{
                    echo"N/A";
                  }
                  echo"</td>
                </tr>";
              }
            ?>
            </tbody>
          </table>
		  <button onclick="window.print();" class='btn btn-primary'>Print</button>
        </div>
      </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
