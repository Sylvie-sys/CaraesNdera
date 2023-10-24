<?php session_start();
  if (!isset($_SESSION['adminUserToken'])) {
    header('location: ../userlogin.php?login=login');
  } else {
    include('../connector.php');
    $query = mysqli_query($connect, "SELECT * FROM patients WHERE id = '".$_GET['patId']."'");
    $data = mysqli_fetch_array($query);
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
          <h4>Patient info</h3>

          <?php
            echo"<form method='POST' action='../server.php'>
              <div class='form-group mb-3'>
                <label>Patient Code</label>
                <input type='hidden' name='pat_id' value='".$data['id']."'>
                <input type='text' name='pat_code' class='form-control' placeholder='Enter patient code' required='' value='".$data['patient_code']."' disabled>
              </div>
               <div class='form-group mb-3'>
                <label>Gender</label>
                <select name='gender' class='form-control' required disabled>
                  <option selected disabled>".$data['gender']."</option>
                </select>
              </div>
              <div class='form-group mb-3'>
                <label>Average Age</label>
                <input type='text' disabled name='av_age' class='form-control' placeholder='Enter average age' required='' value='".$data['av_age']."'>
              </div>
              <div class='form-group mb-3'>
                <label>Average Height</label>
                <input type='text' disabled name='av_height' class='form-control' placeholder='Enter average Height' required='' value='".$data['av_height']."'>
              </div>
              <div class='form-group mb-3'>
                <label>Pick-up Point</label>
                <input type='text' name='pick_point' class='form-control' placeholder='Enter pick-up point' required='' disabled value='".$data['pick_point']."'>
              </div>
            </form>";
          ?>

        </div>
        <div class="col-xl-7 col-sm-6 mb-3" style="overflow-x: auto;">
          <h4>Other patient info (Personal details)</h3>
          
          <?php
            echo"<form>

              <div class='row'>
                <div class='col-xl-6 col-sm-6'>
                  <div class='form-group mb-3'>
                    <label>Patient Full Name</label>
                    <input type='hidden' name='pat_id' value='".$data['id']."'>
                    <input type='text' name='pat_code' class='form-control' placeholder='Enter full name' required='' value='".$data['fullname']."'>
                  </div>
                </div>
                <div class='col-xl-6 col-sm-6'>
                   <div class='form-group mb-3'>
                    <label>ID Card Number / Reference Number</label>
                    <input type='text' name='pat_code' class='form-control' placeholder='Enter ID Card Number / Reference Number' required='' value='".$data['fullname']."'>
                  </div>
                </div>
              </div>

              <div class='row'>
                <div class='col-xl-6 col-sm-6'>
                  <div class='form-group mb-3'>
                    <label>Address (District)</label>
                    <input type='text' name='pat_code' class='form-control' placeholder='Enter address (District)' required='' value='".$data['fullname']."'>
                  </div>
                </div>
                <div class='col-xl-6 col-sm-6'>
                   <div class='form-group mb-3'>
                    <label>Address (Sector)</label>
                    <input type='text' name='pat_code' class='form-control' placeholder='Enter address (Sector)' required='' value='".$data['fullname']."'>
                  </div>
                </div>
              </div>

              <div class='row'>
                <div class='col-xl-6 col-sm-6'>
                  <div class='form-group mb-3'>
                    <label>Address (Cell)</label>
                    <input type='text' name='pat_code' class='form-control' placeholder='Enter address (Cell)' required='' value='".$data['fullname']."'>
                  </div>
                </div>
                <div class='col-xl-6 col-sm-6'>
                   <div class='form-group mb-3'>
                    <label>Address (Village)</label>
                    <input type='text' name='pat_code' class='form-control' placeholder='Enter address (Village)' required='' value='".$data['fullname']."'>
                  </div>
                </div>
              </div>

              <div class='row'>
                <div class='col-xl-6 col-sm-6'>
                  <div class='form-group mb-3'>
                    <label>Contact Person Name</label>
                    <input type='text' name='pat_code' class='form-control' placeholder='Enter Contact person name' required='' value='".$data['fullname']."'>
                  </div>
                </div>
                <div class='col-xl-6 col-sm-6'>
                   <div class='form-group mb-3'>
                    <label>Contact Person Phone Number</label>
                    <input type='text' name='pat_code' class='form-control' placeholder='Enter contact person phone number' required='' value='".$data['fullname']."'>
                  </div>
                </div>
              </div>
              <div class='row'>
                <div class='col-xl-12 col-sm-6'>
                  <div class='form-group mb-3'>
                    <label>Additional Comment</label>
                    <textarea name='pat_code' class='form-control' placeholder='Enter Contact additional comment' required=''></textarea>
                  </div>
                </div>
              </div>
            </form>";
          ?>

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
