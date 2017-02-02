<?php
	function send_notification ($tokens,$message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		/**$fields = array(
			'to' => $tokens,
			'data' => array("message" => $message),
		);
		**/
		$fields = array(
				'registration_ids' => $tokens,
				'data' =>$message
			);
		$headers = array (
			'Content-Type: application/json',
			'Authorization:key = AAAAd3RrOok:APA91bHLlTNtD5xRxnDcFimydv5B-4qjo-unScPNE5J82AbvyJGfmmDof7Biw-t5f1J9Jjkcrh4Xvwd-uFQpovmQrZdJLkTLr3gz_7ZseQO4ghUAOnzmPDt5aswJJ2C_cheExvrC6cKH'
			
		);
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields
		));
		$result = curl_exec($ch);
		if($result === FALSE){
			die('Curl failed :'.curl_error($ch));
		}
		curl_close($ch);
		return $result ;
	}
	if (isset($_POST["Number"])) {
		   echo "Number Found";
		    $_uv_Number=$_POST["Number"];
			$_uv_Message=$_POST["Message"];
			 echo "$_uv_Number";
			 echo "_uv_Message";
	}else{
		echo "Not Found Number ";
	}
	
	$conn = mysqli_connect("localhost","root","","fcmpush");
	$sql = "Select Token From users where Number=$_uv_Number";
	$result = mysqli_query($conn,$sql);
	$tokens = array();
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$tokens[] = $row["Token"];
		}
	}
	mysqli_close($conn);
	$message = array("message" => $_uv_Message);
	
	$message_status = send_notification($tokens,$message);
	echo "$message_status";
?>