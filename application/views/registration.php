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
    <div class="container">
        <h2>Add Employee</h2>
        <form method="post">
        <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
    </div> 
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="passsword">Password:</label>
      <input type="text" class="form-control" name="password" id="password" placeholder="Enter Password">
      <br />
      <input type="button" onclick ="addEmployee()" name="add" class="btn btn-success" value="Add"/>
    </div>
       </form>
    </div>
</body>
</html>
<script>
  function addEmployee(){
    // alert("clicked");
    var name =$('#name').val();
    var email =$('#email').val();
    var password =$('#password').val();

    if(email == ""){
      alert("email field is required");
    }
    else if(password==""){
      alert("password is required");
    }else{
      var params ="name="+name+"&email="+email+"&password="+password;
      // alert(params);
      $.ajax({
        type : "POST",
		   	url  :  '<?php echo base_url();?>'+"addRegistration",	 	          	
	    	data :params,
        success: function(data){
                console.log(data);
				 var myObj = JSON.parse(data);
				 var responseStatus = myObj["response_status"];
				   if(responseStatus == "success"){	 
                    alert("Register successfully");
					  
				   }else{
					  alert("please try again");
				   }
				   
			}
        
      })

    }
  }
</script>