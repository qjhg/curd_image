<?php
include("connection.php");
$id=$_GET['update'];
 $select="SELECT * FROM `customer` WHERE `customer_id`=$id";
 $query=mysqli_query($connection,$select);
 $fetch=mysqli_fetch_assoc($query);
?>
<?php
if(isset($_POST['submit'])){
    $customer_id=$_GET['update'];
 $name=$_POST['name'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 if(isset($_FILES['image'])){
    $image_name=$_FILES['image']['name'] ;
    $temp=$_FILES['image']['tmp_name'];
 if(move_uploaded_file($temp,'./Images/'. $image_name)){
    $update= "UPDATE `customer` SET `customer_name`='$name', `customer_email`='$email', `customer_password`='$password', `customer_image`='$image_name'  where `customer_id`='$customer_id'";
    $query=mysqli_query($connection,$update);
    if($query){
        header('location:View.php');
    }else{
        echo "Customer not updated successfully";
    }
 }else{
    $update= "UPDATE `customer` SET `customer_name`='$name', `customer_email`='$email', `customer_password`='$password' where `customer_id`='$customer_id'";
    $query=mysqli_query($connection,$update);
    if($query){
        header('location:View.php');
    }else{
        echo "Customer not updated successfully";
    }
 }
}



}

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
<div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-5">
                <form action="" method="POST" enctype="multipart/form-data">                    
                <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo 
                    $fetch['customer_name']?>">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value=
                    "<?php echo $fetch['customer_email']?>">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control " value="<?php echo $fetch['customer_password'] ?>">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control" value="<?php echo $fetch['customer_image'] ?>">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>