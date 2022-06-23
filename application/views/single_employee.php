<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <center>
        <h1>Your Details</h1>
       
    <?php  foreach($view_employee_details as $view_employee_details){?>
      <input style ="display:none" type="text" id="employee_id" name="employee_id" value = "<?php echo $view_employee_details["employee_id"];?>" />

       
      <label>Name</label>   <input type="text" id="name" name="name" value = "<?php echo $view_employee_details["employee_name"];?>" />
           <br/>
           <br/>
           <label>Email</label> <input type="email" id="email" name="email"value = "<?php echo $view_employee_details["employee_email"];?>" />
       <?php } ?>
       <br/>
           <br/>
           <a href="<?php echo base_url(); ?>edit/" class="btn btn-primary">Edit Details</a>
        </center>
</body>
</html>
<!-- <script>
    function editDetails2(){
        // alert("clicked");
        var name = $("#name").val();
        var email =$("#email").val();
        var employee_id =$("#employee_id").val();
        
        if(name ==""){
              alert("name is required");
        }else if(email==""){
        alert("email is required");
        }else{
            var params =  "name="+name+"&email="+email+"&employee_id="+employee_id;
    // alert(params);
        $.ajax({
			type : "POST",
			url  :  '<?php echo base_url();?>'+"update_details",	 	          	
			data :params,
            success: function(data){
                // console.log(data);
				 var myObj = JSON.parse(data);
				 var responseStatus = myObj["response_status"];
				 var message = myObj["message"];
				   if(responseStatus == "success"){	 
                    window.location.href = "<?php echo base_url(); ?>edit";
                    alert(message);
					  
				   }else{
					  alert(message);
				   }
                
			} 
        
        });
   } 
   }
</script> -->