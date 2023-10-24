<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CARAES</title>
  <link rel="icon" type="image/png" href="img/logo-alt.png">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i'>
<link rel="stylesheet" href="loginstyle.css">

<script src="https://kit.fontawesome.com/28f7157779.js" crossorigin="anonymous"></script>

</head>
<body>
<!-- partial:index.partial.html -->

<div class="login-card">
  <div class="login-card-content">
    <div class="header">
      <h2>CAR<span class="highlight">AES</span></h2>
      <h3>Ndera Neuropsychiatric Teaching Hospital</h3>
      <?php
	      if(isset($_GET['data']) AND $_GET['data'] == 'success'){
		      echo"<div>
		      	<br><br>
		        Citizen account is created successfully!
		      </div>";
		  }
	   ?>
    </div>
    <div class="form">
    <form method="POST" action="server.php">
      <div class="form-field username">
        <div class="icon">
          <i class="far fa-user"></i>
        </div>
        <input type="text" placeholder="Full name" onkeypress="return onlyAlphabets(event,this);" required name="fullname">
      </div>
      <div class="form-field username">
        <div class="icon">
          <i class="fa fa-phone-alt"></i>
        </div>
        <input type="text" placeholder="Phone" maxlength="10" minlength="10" onkeypress="return allowNumbersOnly(event)" required name="phone">
      </div>
      <div class="form-field username">
        <div class="icon">
          <i class="far fa-list"></i>
        </div>
        <select required name="acctype">
          <option selected disabled value="">Select account type</option>
          <option>Family</option>
          <option>Donor</option>
        </select>
      </div>
      <div class="form-field username">
        <div class="icon">
          <i class="far fa-envelope"></i>
        </div>
        <input type="text" placeholder="Email" required name="email">
      </div>
      <div class="form-field password">
        <div class="icon">
          <i class="fas fa-lock"></i>
        </div>
        <input type="password" placeholder="Password" required name="password">
      </div>

      <button type="submit" name="usersignup">
        SIGN UP
      </button>
      <div>
        Already have an account? <a href="userlogin.php">Login</a>
      </div>
  	</form>
    </div>
  </div>
  <div class="login-card-footer">
    <a href="index.php">Back to Home</a>
  </div>
</div>
<!-- partial -->
  <script  src="loginscript.js"></script>

</body>
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
</html>