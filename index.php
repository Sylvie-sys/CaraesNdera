<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>CARAES</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="img/logo-alt.png">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr.js"></script>
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    	#homepageMenu li a{
    		font-size: 15px;
    	}

    	.carousel-inner .item div h1{
    		font-size: 100px;
    	}
    	@media(max-width: 600px){
    		.carousel-inner .item div h1{
	    		font-size: 30px;
	    	}
	    	.carousel-inner .item div p{
	    		font-size: 10px;
	    	}
    	}
    </style>

</head>
<body>
	
	<!-- ====================================================
	header section -->
	<header class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-2 header-logo">
					<br>
					<a href="index.php"><img src="img/logo.png" alt="" style="width: 100px; position: relative; top: 10px;" class="img-responsive logo"></a>
				</div>

				<div class="col-md-9">
					<nav class="navbar navbar-default">
					  <div class="container-fluid nav-bar">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      
					      <ul class="nav navbar-nav navbar-right" id="homepageMenu">
					        <li><a class="menu active" href="#home" >Home</a></li>
					        <li><a class="menu" href="#about">about us</a></li>
					        <li><a class="menu" href="#contact"> contact us</a></li>
					        <li><a class="menu" href="userlogin.php"> Login / Signup</a></li>
					      </ul>
					    </div><!-- /navbar-collapse -->
					  </div><!-- / .container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header> <!-- end of header area -->

	<section class="slider" id="home">
		<div class="container-fluid">
			<div class="row">
			    <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
					<div class="header-backup"></div>
			        <!-- Wrapper for slides -->
			        <div class="carousel-inner" role="listbox">
			            <div class="item active">
			            	<img src="img/slide-one.jpg" alt="">
			                <div class="carousel-caption">
		               			<h1>CARAES</h1>
		               			<p>Ndera Neuropsychiatric<br>Teaching Hospital</p>
			                </div>
			            </div>
			            <div class="item">
			            	<img src="img/slide-two.jpg" alt="">
			                <div class="carousel-caption">
		               			<h1>CARAES</h1>
		               			<p>Ndera Neuropsychiatric<br>Teaching Hospital</p>
			                </div>
			            </div>
			            <div class="item">
			            	<img src="img/slide-three.jpg" alt="">
			                <div class="carousel-caption">
		               			<h1>CARAES</h1>
		               			<p>Ndera Neuropsychiatric<br>Teaching Hospital</p>
			                </div>
			            </div>
			        </div>
			        <!-- Controls -->
			        <a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
			            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			            <span class="sr-only">Previous</span>
			        </a>
			        <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
			            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			            <span class="sr-only">Next</span>
			        </a>
			    </div>
			</div>
		</div>
	</section><!-- end of slider section -->

	<!-- about section -->
	<section class="about text-center" id="about">
		<div class="container">
			<div class="row">
				<h2>Who we are</h2>
				<p class="caption mb-5">Ndera Neuropsychiatric Teaching Hospital is a health facility that offers specialized healthcare in psychiatry and neurology in accordance with the professional ethics and policy of Rwanda National Health Sector. It is known as unique referral neuropsychiatric hospital in the country. The Hospital is located in Nezerwa Village, Kibenga Cell, Ndera Sector, Gasabo District in City of Kigali City. The main facility is located 17 kilometres from Kigali City Centre. Established in 1968, the Hospital also has two branches; CARAES Butare and Icyizere Psychotherapeutic Center, located in Huye District and Kicukiro District, respectively.</p>
				<div class="col-md-4 col-sm-6">
					<div class="single-about-detail clearfix">
						<div class="about-img">
							<img class="img-responsive" src="img/1.jpg" alt="">
						</div>
						<div class="about-details">
							<div class="pentagon-text">
								<h1>M</h1>
							</div>
							<h3 style="font-size: 25px;">Medical and Allied Health Sciences</h3>
							<p>The Medical Allied Health Sciences Department is the core department of the hospital because most of our clients are treated in this department.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="single-about-detail">
						<div class="about-img">
							<img class="img-responsive" src="img/2.jpg" alt="">
						</div>
						<div class="about-details">
							<div class="pentagon-text">
								<h1>E</h1>
							</div>

							<h3 style="font-size: 25px;">Education, Research, CPD and Quality Improvement</h3>
							<p>he Hospital collaborates with the University of Rwanda's medical school, among other institutions, to provide internship and clerkship opportunities.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="single-about-detail">
						<div class="about-img">
							<img class="img-responsive" src="img/3.jpg" alt="">
						</div>
						<div class="about-details">
							<div class="pentagon-text">
								<h1>M</h1>
							</div>
							<h3 style="font-size: 25px;">Mental Health and Nursing</h3>
							<p>Nursing department is meant to make a close follow up of patients every time, different nurses are dispatched to different wards and rooms for proper provision of medication.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- end of about section -->

	<!-- map section -->
	<div class="api-map" id="contact">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 map" id="map"></div>
			</div>
		</div>
	</div><!-- end of map section -->

	<!-- contact section starts here -->
	<section class="contact">
		<div class="container">
			<div class="row">
				<div class="contact-caption clearfix">
					<div class="contact-heading text-center">
						<h2>contact us</h2>
					</div>
					<div class="col-md-5 contact-info text-left">
						<h3>contact information</h3>
						<div class="info-detail">
							<ul><li><i class="fa fa-map-marker"></i><span>Address:</span> Gasabo, Kigali City | P.O Box: 423 Kigali Rwanda</li></ul>
							<ul><li><i class="fa fa-phone"></i><span>Phone:</span> (+250) 786 058 038 / (+250) 781 447 928</li></ul>
							<ul><li><i class="fa fa-envelope"></i><span>Email:</span>ndera.hospital@moh.gov.rw</li></ul>
						</div>
					</div>
					<div class="col-md-6 col-md-offset-1 contact-form">
						<h3>leave us a message</h3>
						<?php
							if(isset($_GET['data']) AND $_GET['data'] == 'success'){
								echo"<p style='font-size: 20px; color: #09f; background: #fff; padding: 5px; border-radius: 5px;'>Your contact is sent successfully and the team will reach up to you soon. Thank you!</p>";
							}
						?>
						<form class="form" method="POST" action="server.php">
							<input class="name" name="name" onkeypress="return onlyAlphabets(event,this);" type="text" placeholder="Name" required>
							<input class="email" name="email" type="email" placeholder="Email" required>
							<input class="phone" name="phone" type="text" onkeypress="return allowNumbersOnly(event)" placeholder="Phone No:" required maxlength="10" minlength="10">
							<textarea class="message" name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
							<input class="submit-btn" type="submit" value="SUBMIT" name="addNewContact">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!-- end of contact section -->

	<!-- footer starts here -->
	<footer class="footer clearfix">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 footer-para">
					<p>&copy; Sylvie 2023, All right reserved</p>
				</div>
				<div class="col-xs-6 text-right">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-instagram"></i></a>
				</div>
			</div>
		</div>
	</footer>

	<!-- script tags
	============================================================= -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
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