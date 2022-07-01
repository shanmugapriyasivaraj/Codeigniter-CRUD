<!DOCTYPE html>
<html lang="en">
<head>
  <title> Employee-List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<div class="container">
  <h2>Employee Details</h2>            
  <table class="table">
    <thead>
      <tr>
        <th scope="col">S.NO</th>
        <th scope="col" style="display:none">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Edit Employee</th>
        <th scope="col">Delete Employee</th>

      </tr>
    </thead>
    <tbody>
   
    <?php
    if(is_array($result)){
    $i=1; foreach($result as $row) {?>
                <tr>
                <th scope="row"><?php echo $i++;?></th>
                <td style="display:none"><?php echo $row['employee_id']; ?></td>
                <td><?php echo $row['employee_name']; ?></td>
                <td><?php echo $row['employee_email']; ?></td>
              <td><a href="<?php echo base_url(); ?>edit/<?php echo $row['employee_id']; ?>" >Edit</a></td>
              <td><a href="<?php echo base_url(); ?>deleteEmployee/<?php echo $row['employee_id']; ?>" >Delete</a></td>
                </tr>
                <?php } }else{?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="3">No data to display</td>
                    <td></td>
                    <td></td>
                  </tr>
                <?php 
                }
                  ?>
    </tbody>
  </table>
</div>

</body>
</html>
