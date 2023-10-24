<?php 
    include('connector.php');
    // Takes raw data from the request
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json,TRUE);
    echo $data['status'];
    if($data['status']=="SUCCESS"){
        mysqli_query($connect,"UPDATE applications SET status = 1 WHERE code = '".$data['transactionId']."'");
    }
?>