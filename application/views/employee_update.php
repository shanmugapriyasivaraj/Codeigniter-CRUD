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
     <!--  <?php// print_r($employeeDetails);?> -->
<div class="container">
    <br> 
    <br>
  <h1>Edit Details</h1>

    <form method="post">
       <?php foreach($employeeDetails as $employeeDetails){?>
        <input style ="display:none" type="text" id="employee_id" name="employee_id" value = "<?php echo $employeeDetails["employee_id"];?>" />

       
           <input type="text" id="name" name="name" value = "<?php echo $employeeDetails["employee_name"];?>" />
           <br/>
           <br/>
           <input type="email" id="email" name="email"value = "<?php echo $employeeDetails["employee_email"];?>" />
       <?php } ?>
<br />
<br />
           <button onclick="editDetails()" type = "button" value="submit">Submit</button>
        </form>  
    </div>
</body>
</html>
<script>
    function editDetails(){
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
                    window.location.href = "<?php echo base_url(); ?>home";
                    alert(message);
					  
				   }else{
					  alert(message);
				   }
                
			} 
        
        });
   } 
   }
</script>