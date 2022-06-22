<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
     <!--  <?php// print_r($employeeDetails);?> -->
<div class="container">
    <br>
    <br>
  <h1>Edit Details</h1>

    <form method="post">
       <?php foreach($employeeDetails as $employeeDetails){?>

       
           <input type="name" id="name" name="name" value = "<?php echo $employeeDetails["employee_name"];?>" />
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
        var params =  "name="+name+"&email="+email;
        $.ajax({
			type : "POST",
			url  :  '<?php echo base_url();?>'+"show_edit",	 	          	
			data :params,
            success: function(data){
                console.log(data);
				 var myObj = JSON.parse(data);
				 var responseStatus = myObj["response_status"];
				 var message = myObj["message"];
				   if(responseStatus == "success"){	 
                    // window.location.href = "<?php echo base_url(); ?>employee_update";
                    // alert(message);
					  
				   }else{
					  alert(message);
				   }
				   
			} 
        });
   } 
</script>