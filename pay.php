<?php
	
	include('connector.php');
	$transId = $_GET['payApp'];
	$amount = 5;
	$query = mysqli_query($connect,"SELECT * FROM patients WHERE id='".$_GET['patient']."'");
	$patientInfo = mysqli_fetch_array($query);
	$phonenumber = $patientInfo['phone'];
	
	try{
     payment_api($transId,$amount,$phonenumber);
	} catch(\throwable $th){}
		
	function payment_api($transactionId,$amount,$telephoneNumber) {
		$url = "https://opay-api.oltranz.com/opay/paymentrequest";
		$content = '{
			"telephoneNumber" : "'.$telephoneNumber.'",
			"amount" : "'.$amount.'",
			"organizationId" : "8a74810968e261260168f08a378c0002",
			"description" : "description",
			"callbackUrl" : "https://www.selvoger.com/momo/callback.php",
			"transactionId" : "'.$transactionId.'"
		}';

    	$curl = curl_init();
    	curl_setopt_array($curl, array(
    		CURLOPT_URL => $url,
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_ENCODING => "",
    		CURLOPT_TIMEOUT => 30000,
    		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    		CURLOPT_CUSTOMREQUEST => "POST",
    		CURLOPT_POSTFIELDS => $content,
    		CURLOPT_HTTPHEADER => array(
    			'Content-Type: application/json'
    		)
    	));
    
    	$response = curl_exec($curl);
    	$err = curl_error($curl);
    	curl_close($curl);
    
    	if ($err) {
    		return "cURL Error #:" . $err;
    	} else {
    		return $response;
    	}
    }
	
?>