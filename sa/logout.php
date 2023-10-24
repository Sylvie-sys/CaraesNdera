<?php session_start();
unset($_SESSION['adminUserToken']);
echo "<script>window.location='../userlogin.php?logout=logout';</script>";
?>