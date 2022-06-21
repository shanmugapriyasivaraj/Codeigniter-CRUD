<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div>
<h2>New password</h2>
<form>
<input name=newPassword id="newPassword" type="password" placeholder="enter New Password" />
<button type="button" onClick="new_password()" value="Submit">Submit</button>
</form>
    </div>
</body>
</html>
<script>
    function new_password(){
        var password =$("#newPassword").val();

if(password ==""){
alert("password is required");
}else{
    var params = "new_Password="+password;
    alert(params);

$.ajax({
			type : "POST",
			url  :  '<?php echo base_url();?>'+"update_new_password",	 	          	
			data :params,

			// success: function(data){
            //     console.log(data);
			// 	 var myObj = JSON.parse(data);
			// 	 var responseStatus = myObj["response_status"];
			// 	 var message = myObj["message"];
			// 	   if(responseStatus == "success"){	 
            //         alert("logged in successfully");
					  
			// 	   }else{
			// 		  alert(message);
			// 	   }
				   
			// } 
	  
	  });
    }
    }
  
    
</script>