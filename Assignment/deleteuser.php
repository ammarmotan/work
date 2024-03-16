<?php
include('connection.php');

$id=$_GET['user_id'];
$query="DELETE FROM `user` WHERE `user_id`= '$id'";
$delete=mysqli_query($con,$query);

if($delete){
    echo "<script>alert('Delete');window.location.href='showuser.php'</script>";
}
?>