<?php
include('connection.php');

$id=$_GET['cat_id'];
$query="DELETE FROM `categorie` WHERE `cat_id`= '$id'";
$delete=mysqli_query($con,$query);

if($delete){
    echo "<script>alert('Delete');window.location.href='showcat.php'</script>";
}
?>