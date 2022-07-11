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
    <!-- <center>
    <form method="post" id="upload_image" enctype="multipart/form-data">
<h1>Upload File</h1>
<input type="file" name="img" multiple="multiple"/>
<br />
<img src="<?php //echo base_url(); ?>assets\uploads\job board business model.jpg" />
<button class="btn btn-success" type="submit">Upload</button>
    </form>
    </center> -->
    <form enctype='multipart/form-data' method="post" id="add_package_form" name="add_package_form">
                    <div class="row">
                         <div class="col-sm-4">
                 
                            <div class="form-group">
                                <input type="file" id="images" accept="image/*" class="custom-file-input" name="images[]"  multiple />
                                <label class="custom-file-label" for="images">Upload Images</label>
                         <div id="imagesval">

                         </div>
                            
                        </div>
                    </div>
                <img id="output" width="50%" height="50%">
                <button type="button" class="btn btn-success modal_btn" onclick="add_package()">Add</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </form>
</html>
<script >
    // $(document).ready(function(){
    //     $('#upload_image').submit(function(e){
    //         alert("clicked");
         
    //         e.preventDefault(); 
	// 		 $.ajax({
	// 			url:'uploading_file',
	// 			type:"post",
	// 			data:new FormData(this),
	// 			processData:false,
	// 			contentType:false,
	// 			cache:false,
	// 			async:false,
	// 			success: function(data){
	// 				$('#').html(data); 
	// 			}
	// 		});
    //     });
    // });
    function validateadd_package(){
	var isValid = false;

    var images = document.getElementById("images");
	//console.log(package_name);
	 if(images.files.length == 0){
	       $("#imagesval").html('<font color="#CC0000">Please upload Image</font>');
	 }else{
		 isValid = true;
	 }	
	return isValid;  	
}
 function add_package(){
	 //validate the form
	 var isValid = validateadd_package();
	 if(isValid == true){
		 //prepare params to add project
		// var add_package_form = $('#add_package_form')[0];
		var formData =new FormData(add_package_form);
		
	$.ajax({
		type:"post",
		url:'<?php echo base_url('uploading_file');?>',
		data:formData,
		processData:false,
		cache:false,
		contentType:false,
		async:false,
		
		success:function(responseJsonStr)
		{
				
				 var myObj = JSON.parse(responseJsonStr);
				 var responseStatus = myObj["response_status"];
				 var message = myObj["message"];
				   if(responseStatus == "success"){
					  alert(message);
					   location.reload();
				   }
				   else{
					   alert(message);
				   }
				  
			}
	  });
	 }
}





</script>