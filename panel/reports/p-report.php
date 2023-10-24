<?php session_start();
  if (!isset($_SESSION['adminUserToken'])) {
    header('location: ../userlogin.php?login=login');
  } else {
    include('../../connector.php');
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<style> 
  *{
    font-family: arial;
  } 
  table {  
    font-family: arial, sans-serif;  
    border-collapse: collapse;  
    width: 50%;
    margin: 0px auto;
  }
  #htmlContent{
    text-align: center;
  }  
  td, th, button {  
    border: 1px solid #dddddd;  
    text-align: left;  
    padding: 8px;  
  }  
  button {  
    border: 1px solid black;   
  } 
  tr:nth-child(even) {  
    background-color: #dddddd;  
  } 
  .wrap-b{
  height: auto;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  flex-flow: wrap;
} 
</style>  
<div id="htmlContent">
  <center>
  <p>
    <button onclick="window.print();">Generate PDF</button>
  </p>

<div style="width: 70%;">
<div class="wrap-b">
  <div><img style="width: 100px; position: relative; top: 20px;" src="../../img/ca.png"></div>
  <div>
    <h2 style="color: #0094ff">CARAES</h2>  
    <h3>Ndera Neuropsychiatric Teaching Hospita</h3>  
    <p>Liast of all registered patients</p> 
  </div>
  <div><img style="width: 100px; position: relative; top: 20px;" src="../../img/caraes.png"></div>
</div> 
  <table style="width: 80%;">  
    <tbody>  
      <tr>
        <th scope="col">#</th>
        <th scope="col">Code</th>
        <th scope="col">Gender</th>
        <th scope="col">Average age</th>
        <th scope="col">Average height</th>
        <th scope="col">Pick-up point</th>
        <th scope="col">Full Name</th>
        <th scope="col">ID Card</th>
        <th scope="col">District</th>
        <th scope="col">Sector</th>
        <th scope="col">Cell</th>
        <th scope="col">Village</th>
        <th scope="col">Contact</th>
        <th scope="col">Phone</th>
      </tr> 
      <?php
              if(isset($_GET['keyCode'])){
                $keyCode = $_GET['keyCode'];
                $query = mysqli_query($connect,"SELECT * FROM users WHERE deleted = 0 AND fullname LIKE '%$keyCode%' OR phone LIKE '%$keyCode%' OR email LIKE '%$keyCode%' ORDER BY fullname ASC");
              }else{
                $query = mysqli_query($connect,"SELECT * FROM patients WHERE deleted = 0 ORDER BY id DESC");
              }
              $rowcount = 0;
              while ($row = mysqli_fetch_array($query)){
                $rowcount ++;
                echo"<tr>
                  <th scope='row'>".$rowcount."</th>
                  <td>".$row['patient_code']."</td>
                  <td>".$row['gender']."</td>
                  <td>".$row['av_age']."</td>
                  <td>".$row['av_height']."</td>
                  <td>".$row['pick_point']."</td>
                  <td>".$row['fullname']."</td>
                  <td>".$row['idcard']."</td>
                  <td>".$row['district']."</td>
                  <td>".$row['sector']."</td>
                  <td>".$row['cell']."</td>
                  <td>".$row['village']."</td>
                  <td>".$row['cpname']."</td>
                  <td>".$row['cpphone']."</td>
                </tr>";
              }
            ?>  
    </tbody>  
  </table>
</center>  
</div>
<div id="editor"></div>
</body>
</html>
