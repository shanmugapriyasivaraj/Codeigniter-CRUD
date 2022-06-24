
<div >
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   Login
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
  <button  type="button" onclick="verify_login1()" class="btn btn-primary">Login</button>
  <a href="<?php echo base_url();?>forget_password">Forget Password</a>
</form>
      </div>
      
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
  New User?
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
        <h2>Sign In</h2>
        <form method="post">
        <div class="form-group">
      <label for="name">Name:</label>
      <input style="width:40%" type="text" class="form-control" name="reg_name" id="reg_name" placeholder="Enter Name">
    </div> 
    <div class="form-group">
      <label for="email">Email:</label>
      <input style="width:40%" type="email" class="form-control" name="reg_email" id="reg_email" placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="passsword">Password:</label>
      <input style="width:40%" type="text" class="form-control" name="reg_password" id="reg_password" placeholder="Enter Password">
      <br />
      <input type="button" onclick ="addEmployee1()" name="add" class="btn btn-success" value="Sign In"/>
    </div>
       </form>
    </div>
      </div>
     
    </div>
  </div>
</div>


 </form>
</div>
<script>
    function verify_login1(){
        // alert("clicked");
        var emailId = $("#emailId").val();

        var password =$("#password").val();
        alert(password);

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
                    window.location.href = "<?php echo base_url(); ?>single_employee";
					  
				   }else{
					  alert(message);
				   }
				   
			} 
	  
	  });
      }
       
    }
   
  function addEmployee1(){
    alert("clicked");
    var name =$('#reg_name').val();
    var email =$('#reg_email').val();
    var password =$('#reg_password').val();

    if(name == ""){
      alert("name is required");
    }
    else if(email == ""){
      alert("email field is required");
    }
    else if(password == ""){
      alert("passwordhhjjhh is required");
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
