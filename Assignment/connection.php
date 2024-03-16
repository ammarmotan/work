<?php

$con=mysqli_connect('localhost' , 'root' , '' , 'admin');

if(!$con){
    die("Error : ".mysqli_error($con));
}
?>