<?php session_start();
	include('connector.php');
	if (isset($_POST['userlogin'])) {
	  $username = $_POST['username'];
	  $password = $_POST['password'];

	  $query = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
	  $data = mysqli_fetch_array($query);

	  if ($username == $data['username'] AND $password == $data['password']) {
	    $_SESSION['adminUserToken'] = $data['username'];
	    header('location: panel/index.php');
	  } else {
		  $query = mysqli_query($connect, "SELECT * FROM citizens WHERE email = '$username' AND password = '$password'");
		  $data = mysqli_fetch_array($query);

		  if ($username == $data['email'] AND $password == $data['password']) {
		    $_SESSION['patientUserToken'] = $data['email'];
		    $_SESSION['senderId'] = $data['id'];
		    header('location: patient/index.php');
		  } else {
			$query = mysqli_query($connect, "SELECT * FROM users WHERE email = '$username' AND password = '$password'");
			$data = mysqli_fetch_array($query);

			if ($username == $data['email'] AND $password == $data['password']) {
				$_SESSION['userUserToken'] = $data['email'];
				$_SESSION['senderId'] = $data['id'];

				if($data['acctype'] == 'Receptionist'){
					$_SESSION['adminUserToken'] = $data['email'];
			    	header('location: rec/index.php');
				}elseif($data['acctype'] == 'Social Affairs'){
					$_SESSION['adminUserToken'] = $data['email'];
			    	header('location: sa/index.php');
				}elseif($data['acctype'] == 'Doctor'){
					$_SESSION['adminUserToken'] = $data['email'];
			    	header('location: doc/index.php');
				}

			} else {
				header('location: userlogin.php?error=loginerror');
			}
		  }
	  }
	}

	if (isset($_POST['addNewUser'])) {

	  $userId = time();
	  $fullname = $_POST['fullname'];
	  $phonenumber = $_POST['phonenumber'];
	  $acctype = $_POST['acctype'];
	  $email = $_POST['email'];
	  $password = $_POST['password'];
	  
	  mysqli_query($connect,"INSERT INTO users (id, fullname, phone, acctype, email, password) VALUES ('$userId', '$fullname', '$phonenumber', '$acctype', '$email', '$password')");

	  

	  echo"<script>window.location='panel/users.php?data=success';</script>";
	}

	if (isset($_POST['addNewPatient'])) {

	  $pat_code = $_POST['pat_code'];
	  $gender = $_POST['gender'];
	  $av_age = $_POST['av_age'];
	  $av_height = $_POST['av_height'];
	  $pick_point = $_POST['pick_point'];
	  
	  mysqli_query($connect,"INSERT INTO patients (patient_code, gender, av_age, av_height, pick_point) VALUES ('$pat_code', '$gender', '$av_age', '$av_height', '$pick_point')");

	  echo"<script>window.location='panel/patients-list.php?data=success';</script>";
	}

	if (isset($_POST['editUser'])) {
	  $userId = $_POST['userId'];
	  $fullname = $_POST['fullname'];
	  $phonenumber = $_POST['phonenumber'];
	  $acctype = $_POST['acctype'];
	  $email = $_POST['email'];
	  
	  mysqli_query($connect,"UPDATE users SET fullname = '$fullname', phone = '$phonenumber', acctype = '$acctype', email = '$email' WHERE id = '$userId'");
	  echo"<script>window.location='panel/editUser.php?userId=".$userId."';</script>";
	}

	if (isset($_POST['editPatient'])) {

	  $pat_id = $_POST['pat_id'];
	  $pat_code = $_POST['pat_code'];
	  $gender = $_POST['gender'];
	  $av_age = $_POST['av_age'];
	  $av_height = $_POST['av_height'];
	  $pick_point = $_POST['pick_point'];
	  
	  mysqli_query($connect,"UPDATE patients SET patient_code = '$pat_code', gender = '$gender', av_age = '$av_age', av_height = '$av_height', pick_point = '$pick_point' WHERE id = '$pat_id'");
	  echo"<script>window.location='panel/editPatient.php?patId=".$pat_id."';</script>";
	}

	if (isset($_GET['deleteUser'])) {
	  $userId = $_GET['deleteUser'];
	  mysqli_query($connect, "UPDATE users SET deleted = 1 WHERE id = '$userId'");
	  echo"<script>window.location='panel/users.php?data=deleted';</script>";
	}

	if (isset($_GET['deletePatient'])) {
	  $patId = $_GET['deletePatient'];
	  mysqli_query($connect, "UPDATE patients SET deleted = 1 WHERE id = '$patId'");
	  echo"<script>window.location='panel/patients-list.php?data=deleted';</script>";
	}

	if (isset($_POST['usersignup'])) {
	  $fullname = $_POST['fullname'];
	  $phonenumber = $_POST['phone'];
	  $acctype = $_POST['acctype'];
	  $email = $_POST['email'];
	  $password = $_POST['password'];
	  
	  mysqli_query($connect,"INSERT INTO citizens (fullname, phone, acctype, email, password) VALUES ('$fullname', '$phonenumber', '$acctype', '$email', '$password')");

	  echo"<script>window.location='signup.php?data=success';</script>";
	}

	if (isset($_GET['deletePatient'])) {
	  $userId = $_GET['deletePatient'];
	  mysqli_query($connect, "UPDATE citizens SET deleted = 1 WHERE id = '$userId'");
	  echo"<script>window.location='panel/patients.php?data=deleted';</script>";
	}

	if (isset($_GET['deleteContact'])) {
	  $contactId = $_GET['deleteContact'];
	  mysqli_query($connect, "UPDATE contacts SET deleted = 1 WHERE id = '$contactId'");
	  echo"<script>window.location='panel/contacts.php?data=deleted';</script>";
	}

	if (isset($_POST['addNewContact'])) {
	  $name = $_POST['name'];
	  $phone = $_POST['phone'];
	  $email = $_POST['email'];
	  $message = $_POST['message'];

	  $name = addslashes($name);
	  $phone = addslashes($phone);
	  $email = addslashes($email);
	  $message = addslashes($message);
	  $mdatetime = date('d/m/Y H:i');
	  
	  mysqli_query($connect,"INSERT INTO contacts (name, email, phone, message, mdatetime) VALUES ('$name', '$email', '$phone', '$message', '$mdatetime')");

	  echo"<script>window.location='index.php?data=success#contact';</script>";
	}

	if (isset($_POST['addNewApplication'])) {
	  $code = time();
	  $type = $_POST['type'];

	 	$query = mysqli_query($connect, "SELECT * FROM citizens WHERE email = '".$_SESSION['patientUserToken']."'");
		$data = mysqli_fetch_array($query);

	  $id = $data['id'];
	  $phone = $data['phone'];
	  $fullname = $data['fullname'];
	  $adatetime = date('d/m/Y H:i');
	  
	  mysqli_query($connect,"INSERT INTO applications (code, type, adatetime, patient) VALUES ('$code', '$type', '$adatetime', '$id')");


	  echo"<script>window.location='patient/index.php?data=sent';</script>";
	}

	if (isset($_POST['approveApplication'])) {
	  $code = $_POST['code'];
	  $patient = $_POST['patient'];
	  $counselor = $_POST['counselor'];

	 	$query = mysqli_query($connect, "SELECT * FROM citizens WHERE id = '$patient'");
		$data = mysqli_fetch_array($query);

	  $phone = $data['phone'];
	  $fullname = $data['fullname'];
	  
	  mysqli_query($connect,"UPDATE applications SET status = '1' WHERE code = '$code'");

	  echo"<script>window.location='panel/applications.php?data=approved';</script>";
	}

	if (isset($_GET['rejectApplication'])) {
	  $code = $_GET['rejectApplication'];
	  $patient = $_GET['patient'];

	 	$query = mysqli_query($connect, "SELECT * FROM citizens WHERE id = '$patient'");
		$data = mysqli_fetch_array($query);

	  $phone = $data['phone'];
	  $fullname = $data['fullname'];
	  
	  mysqli_query($connect,"UPDATE applications SET status = '2' WHERE code = '$code'");


	  echo"<script>window.location='panel/applications.php?data=rejected';</script>";
	}

	if (isset($_POST['sendMessageUser'])) {
	  $sender = $_SESSION['senderId'];
	  $receiver = $_POST['receiver'];
	  $message = $_POST['message'];
	  $mdt = time();
	  
	  mysqli_query($connect,"INSERT INTO chat (sender, receiver, message, mdt) VALUES ('$sender', '$receiver', '$message', '$mdt')");

	  echo"<script>window.location='user/chats.php?receiver=".$receiver."';</script>";
	}

	if (isset($_POST['sendMessagePat'])) {
	  $sender = $_SESSION['senderId'];
	  $receiver = $_POST['receiver'];
	  $message = $_POST['message'];
	  $mdt = time();
	  
	  mysqli_query($connect,"INSERT INTO chat (sender, receiver, message, mdt) VALUES ('$sender', '$receiver', '$message', '$mdt')");

	  echo"<script>window.location='patient/chats.php?receiver=".$receiver."';</script>";
	}

	if (isset($_POST['editAddPatientInfo'])) {
	  $pat_id = $_POST['pat_id'];
	  $fullname = $_POST['fullname'];
	  $idcard = $_POST['idcard'];
	  $district = $_POST['district'];
	  $sector = $_POST['sector'];
	  $cell = $_POST['cell'];
	  $village = $_POST['village'];
	  $cpname = $_POST['cpname'];
	  $cpphone = $_POST['cpphone'];
	  $addcomment = $_POST['addcomment'];

	  mysqli_query($connect, "UPDATE patients SET fullname = '$fullname', idcard = '$idcard', district = '$district', sector = '$sector', cell = '$cell', village = '$village', cpname = '$cpname', cpphone = '$cpphone', addcomment = '$addcomment'  WHERE id = '$pat_id'");
	  echo"<script>window.location='sa/other-info.php?patId=".$pat_id."';</script>";
	}

	if (isset($_POST['addFeedBack'])) {
	  $pat_id = $_POST['pat_id'];
	  $feed_text = $_POST['feed_text'];
	  $fdatetime = time();
	  
	  mysqli_query($connect,"INSERT INTO feedbacks (patientid, feedback, fdatetime) VALUES ('$pat_id', '$feed_text', '$fdatetime')");

	  echo"<script>window.location='sa/addFeedBack.php?patId=".$pat_id."';</script>";
	}
?>