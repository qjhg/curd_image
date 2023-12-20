<?php 
include("connection.php");
if(isset($_POST['submit'])){
if(empty($_POST['name'])){
    $name_error="Name is required";
}else{
   $name= $_POST['name'];
}
if(empty($_POST['email'])){
    $email_error="Email is required";
}else{
   $email= $_POST['email'];
}
if(empty($_POST['password'])){
    $password_error="Password is required";
}else{
   $password= $_POST['password'];
} 
if(empty($_FILES['image'])){
    $image_error="Image is required";
}else{
   if(isset($_FILES['image'])){    
        $image_name=$_FILES['image']['name'] ;
        $temp=$_FILES['image']['tmp_name'];
     if(  move_uploaded_file($temp,'./Images/'.$image_name)){

     }
    
   }
}
if(!empty($_POST['name'])   &&!empty($_POST['email'])    && !empty($_POST['password'])  && !empty($_FILES['image'])  ){

    $insert="INSERT INTO `customer` (`customer_name`,`customer_email`,`customer_image`,`customer_password`) VALUES ('$name','$email','$image_name','$password')";
    $query=mysqli_query($connection,$insert);
    if($query){
       header('location:View.php');
    }else{
        echo "data failed to insert";
    }
}else{
    echo
    " error in inserting data ";
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
                    <input type="text" name="name" class="form-control">
                    <strong class="text-danger"><?php echo @$name_error ?></strong><br>
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                    <strong class="text-danger"><?php echo @$email_error?></strong><br>
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control ">
                    <strong class="text-danger"><?php echo @$password_error?></strong><br>
                    <label for="">Image</label>
                    <input type="file" name="image"  class="form-control">
                    <strong class="text-danger"><?php echo @$image_error?></strong><br>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>