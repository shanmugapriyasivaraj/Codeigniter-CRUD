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
    <h1>Forget Password ?</h1>
    <div>
        <form method="post">
           <input type="email" id="email" name="email" placeholder="Enter Email" />
           <br />
           <br />
           <button onclick="forgetPassword()" type = "button" value="submit">Submit</button>
        </form>
    </div>
    
</body>
</html>
<script>
function forgetPassword(){
    // alert("clicked");
    var email =$("#email").val();
    var params = "email="+email;

    $.ajax({
			type : "POST",
			url  :  '<?php echo base_url();?>'+"forgetPassword",	 	          	
			data :params,
			success: function(data){
                console.log(data);
				 var myObj = JSON.parse(data);
				 var responseStatus = myObj["response_status"];
				 var message = myObj["message"];
				   if(responseStatus == "success"){	 
                    // alert("Enter New password");
                    window.location.href = "<?php echo base_url(); ?>newPassword";
				   }else{
					  alert(message);
				   }
			} 
	  
	  });
}
</script>