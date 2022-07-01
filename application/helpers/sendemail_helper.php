<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sendEmail')){
	//send SMS to customer
	function sendEmail($mailDataArray){
		$toId = $mailDataArray["toId"];
		$subject = $mailDataArray["subject"];
		$message = $mailDataArray["message"];
		$fromId = $mailDataArray["fromId"];
		//$cc = $mailDataArray["cc"];
		$cc = "";
		$cc2 = "";
		
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";
		$headers .= "From: $fromId\r\n";
		$headers .="Cc:$cc,$cc2\r\n";
		
		$response = mail($toId, $subject, $message, $headers);
		
		return $response;
	}
}