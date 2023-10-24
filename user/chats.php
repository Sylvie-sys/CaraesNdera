<?php session_start();
  if (!isset($_SESSION['userUserToken'])) {
    header('location: ../userlogin.php?login=login');
  } else {
    include('../connector.php');
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>User Panel</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="style.css">
 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css'>
<link rel="stylesheet" href="mystyle.css">
<link rel="stylesheet" href="css/chats.css">
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
    <p class="userInfo"><?php echo $_SESSION['userUserToken']; ?></p>
    User Panel
  </div>
</div>

<?php include('sedebar.php'); ?>

<!-- Content -->
<div class="main">

  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Chats</li>
      </ol>



<?php
  $thisSender = $_SESSION['senderId'];

  echo"<div class='row'>
    <div class='col-md-4 border-right'>";

      $query_chat = mysqli_query($connect,"SELECT id, sender, receiver, LEFT(message, 30), mdt FROM chat WHERE sender = '$thisSender' GROUP BY receiver ORDER BY id DESC");
      while($row_chat = mysqli_fetch_array($query_chat)){

        $query_pat = mysqli_query($connect,"SELECT * FROM citizens WHERE id = '".$row_chat['receiver']."'");
        $row_pat = mysqli_fetch_array($query_pat);
    

        echo"<a style='text-decoration: none;' href='?receiver=".$row_pat['id']."'><div class='friend-drawer friend-drawer--onhover'>
          <img class='profile-image' src='../img/avatal.png' alt=''>
          <div class='text'>
            <h6>".$row_pat['fullname']."</h6>
            <p class='text-muted'>".$row_chat['LEFT(message, 30)']."</p>
          </div>
          <span class='time text-muted small'>".date('H:i', $row_chat['mdt'])."</span>
        </div></a>
        <hr>";
    }

    echo"</div>";

    if(isset($_GET['receiver'])){
 $thisReceiver = $_GET['receiver'];


      $query_rec = mysqli_query($connect,"SELECT * FROM citizens WHERE id = '".$_GET['receiver']."'");
      $row_rec = mysqli_fetch_array($query_rec);
    
    echo"<div class='col-md-8'>
      <div class='settings-tray'>
          <div class='friend-drawer no-gutters friend-drawer--grey'>
          <img class='profile-image' src='../img/avatal.png' alt=''>
          <div class='text'>
            <h6>".$row_rec['fullname']."</h6>
          </div>
        </div>
      </div>
      <div class='chat-panel'>";

      $query_message = mysqli_query($connect,"SELECT * FROM chat WHERE (sender = '$thisSender' AND receiver = '$thisReceiver') OR (sender = '$thisReceiver' AND receiver = '$thisSender')");
      while($row_message = mysqli_fetch_array($query_message)){


        

        if($row_message['sender'] == $thisSender){
          echo"<div class='row no-gutters'>
            <div class='col-md-3 offset-md-9'>
              <div class='chat-bubble chat-bubble--right'>
                ".$row_message['message']."
              </div>
            </div>
          </div>";
        }else{
          echo"<div class='row no-gutters'>
            <div class='col-md-3'>
              <div class='chat-bubble chat-bubble--left'>
               ".$row_message['message']."
              </div>
            </div>
          </div>";
        }
      }

        echo"<div class='row'>
          <div class='col-12'>
            <form method='POST' action='../server.php'>
              <div class='chat-box-tray'>
                <input type='hidden' name='receiver' value='".$_GET['receiver']."' required>
                <input type='text' name='message' placeholder='Type your message here...' required>
                <button name='sendMessageUser' style='border: none; background: transparent;'><i class='material-icons'>send</i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>";
  }
  ?>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
