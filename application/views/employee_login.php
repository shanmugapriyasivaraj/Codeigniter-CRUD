<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="emailId" name="emailId" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="button" onclick="verify_login()" class="btn btn-primary">Login</button>
</form>
</body>
</html>
<script>
    function verify_login(){
        // alert("clicked");
        var emailId = $("#emailId").val();

        var password =$("#password").val();

       if(emailId == "" ){
        alert("Email field is required");
       }
       else if(password == ""){
         alert("password is required");
      }else{
        var params = "emailId="+emailId+"&password="+password;
        // alert(params);
        $.ajax({
			type : "POST",
			url  :  '<?php echo base_url();?>'+"verify_login",	 	          	
			data :params,
			success: function(data){
                console.log(data);
				 var myObj = JSON.parse(data);
				 var responseStatus = myObj["response_status"];
				 var message = myObj["message"];
				   if(responseStatus == "success"){	 
                    alert("logged in successfully");
					  
				   }else{
					  alert(message);
				   }
				   
			} 
	  
	  });
      }
       
    }

</script>