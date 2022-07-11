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
    <form enctype="multipart/form-data" method="post">
    <input name="files[]" type="file" multiple="multiple" />
 
    <input type="button" value="Upload" id="upload"/>
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
    $('#upload').click(function(e) {
    e.preventDefault();
    var formData = new FormData($(this).parents('form')[0]);
    $.ajax({
        url: "<?php echo base_url() ?>uploading_file",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {

        },
        error: function(response) {

        }
    });
});
</script>