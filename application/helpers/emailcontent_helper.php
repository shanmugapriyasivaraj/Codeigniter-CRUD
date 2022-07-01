<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('getEmailContentForRegistrationSuccess')){
	//get SMS Content based on module name
	function getEmailContentForRegistrationSuccess($emailContentDataArray){

		$dataArray = $emailContentDataArray["dataArray"];

		$userName = $dataArray["userName"];
		$userEmail = $dataArray["userEmail"];
		$userPassword = $dataArray["userPassword"];

		$emailContent = "<html>
						   <body>
							 
							  <h3>Dear ".$userName.",</h3>
							  <p>Congratulation..! Your account has been registered successfully with email :".$userEmail." and password :".$userPassword."</p> 
							 
							  <p>Regards,</p>
							  <p>@priya</p>
						   </body>
						</html>";

		return $emailContent;
	}
}
