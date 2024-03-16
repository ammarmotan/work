<?php
include('connection.php');

$id=$_GET['role_id'];
$query="DELETE FROM `role` WHERE `role_id`= '$id'";
$delete=mysqli_query($con,$query);

if($delete){
    echo "<script>alert('Delete');window.location.href='roledata.php'</script>";
}
?>