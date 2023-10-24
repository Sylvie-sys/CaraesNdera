<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CARAES</title>
  <link rel="icon" type="image/png" href="img/logo-alt.png">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css'>
<link rel="stylesheet" href="loginstyle.css">

</head>
<body>
<!-- partial:index.partial.html -->

<div class="login-card">
  <div class="login-card-content">
    <div class="header">
      <h2>CAR<span class="highlight">AES</span></h2>
      <h3>Ndera Neuropsychiatric Teaching Hospital</h3>
      <?php
	      if(isset($_GET['error']) AND $_GET['error'] == 'loginerror'){
		      echo"<div>
		      	<br><br>
		        Invalid username or password!
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
        <input type="text" placeholder="Username" required name="username">
      </div>
      <div class="form-field password">
        <div class="icon">
          <i class="fas fa-lock"></i>
        </div>
        <input type="password" placeholder="Password" required name="password">
      </div>

      <button type="submit" name="userlogin">
        Login
      </button>
      <div>
        Don't have an account? <a href="signup.php">Sign Up</a>
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
</html>