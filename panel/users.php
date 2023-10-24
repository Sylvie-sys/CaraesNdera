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
        <li class="breadcrumb-item active">Users</li>
      </ol>

  <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <h4>Add a new user</h3>
          <form method="POST" action="../server.php">
            <div class="form-group mb-3">
              <label>User full name</label>
              <input type="text" name="fullname" onkeypress="return onlyAlphabets(event,this);" class="form-control" placeholder="Enter user full name" required="">
            </div>
             <div class="form-group mb-3">
              <label>User phone number</label>
              <input type="text" name="phonenumber" maxlength="10" minlength="10" class="form-control" placeholder="Enter user phone number" required="" onkeypress="return allowNumbersOnly(event)">
            </div>
            <div class="form-group mb-3">
              <label>Account Type</label>
              <select required name="acctype" class="form-control">
                <option selected disabled value="">Select account type</option>
                <option>Doctor</option>
                <option>Social Affairs</option>
                <option>Receptionist</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label>User email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter user email" required="">
            </div>
            <div class="form-group mb-3">
              <label>User password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter user password" required="">
            </div>
            <button type="submit" name="addNewUser" class="btn btn-primary">Add new</button>
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
          <h4>Registered users</h3>
          <br>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Names</th>
                <th scope="col">Phone</th>
                <th scope="col">Account Type</th>
                <th scope="col">Email</th>
                <th scope="col" style="width: 130px;">Option</th>
              </tr>
            </thead>
            <tbody class="thead-light">
            <?php
              if(isset($_GET['keyCode'])){
                $keyCode = $_GET['keyCode'];
                $query = mysqli_query($connect,"SELECT * FROM users WHERE deleted = 0 AND fullname LIKE '%$keyCode%' OR phone LIKE '%$keyCode%' OR email LIKE '%$keyCode%' ORDER BY fullname ASC");
              }else{
                $query = mysqli_query($connect,"SELECT * FROM users WHERE deleted = 0 ORDER BY fullname ASC");
              }
              $rowcount = 0;
              while ($row = mysqli_fetch_array($query)){
                $rowcount ++;
                echo"<tr>
                  <th scope='row'>".$rowcount."</th>
                  <td>".$row['fullname']."</td>
                  <td>".$row['phone']."</td>
                  <td>".$row['acctype']."</td>
                  <td>".$row['email']."</td>
                  <td>
                    <a class='btn btn-outline-primary btn-sm' href='editUser.php?userId=".$row['id']."' role='button'>Edit</a>
                    <a class='btn btn-outline-danger btn-sm' href='../server.php?deleteUser=".$row['id']."' role='button'>Delete</a>
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
