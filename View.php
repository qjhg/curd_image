<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<table class="table table-striped ">
  <thead>
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">Customer_name</th>
      <th scope="col">Customer_email</th>
      <th scope="col">Customer_image</th>
      <th scope="col">Customer_password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
   $select="SELECT * FROM `customer`  ORDER BY `customer_id` DESC LIMIT 1 ";
      $result=mysqli_query($connection,$select);
      while($fetch=mysqli_fetch_assoc($result)){
        ?>
        <tr>
              <td><?php echo $fetch['customer_id']?></td>   
              <td><?php echo $fetch['customer_name']?></td>   
              <td><?php echo $fetch['customer_email']?></td>    
              <td><img src="./images/<?php echo $fetch['customer_image']?>" alt="" width="80px" height="80px;"></td>   
              <td><?php echo $fetch['customer_password']?></td>   
              <td>
                <a class="btn btn-danger" href="delete.php?id=<?php echo $fetch['customer_id']?>" >Delete</a>
                <a class="btn btn-info"   href="update.php?update=<?php echo $fetch['customer_id']?>" >Update</a>

            </td>    

            </tr>

<?php
          };
      ?>
  </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>