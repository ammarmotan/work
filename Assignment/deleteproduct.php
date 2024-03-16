<?php
include('connection.php');

$id=$_GET['product_id'];
$query="DELETE FROM `product` WHERE `product_id`= '$id'";
$delete=mysqli_query($con,$query);

if($delete){
    echo "<script>alert('Delete');window.location.href='showproduct.php'</script>";
}
?>