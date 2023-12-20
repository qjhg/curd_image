<?php
include("connection.php");
$delete=$_GET['id'];
$select="SELECT * FROM `customer` where `customer_id`='$delete'; ";
$query=mysqli_query($connection,$select);
$fetch=mysqli_fetch_array($query);
unlink('./Images/'.$fetch['customer_image']);
$delete="DELETE FROM `customer` where `customer_id`=$delete";
$query=mysqli_query($connection,$delete);
if($query){
    header('location:index.php');
}else{
 echo "not delete data ";
}

?>