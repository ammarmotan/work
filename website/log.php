<?php
include('header.php');
include('../Assignment/connection.php');

if(isset($_POST['log'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $q="select * from user where user_mail='$email' || user_password='$pass'";
    $result=mysqli_query($con,$q);
    $data=mysqli_fetch_assoc($result);
    $role=$data['role_id'];
    $count=mysqli_num_rows($result);
    if($count==0){
        echo "<script>alert('login failed'); window.location.href='log.php'</script>";
    }
    if($role==1){
        echo "<script>alert('login'); window.location.href='../Assignment/index.php'</script>";
    }
    else{
        echo "<script>alert('wrong info'); window.location.href='log.php'</script>";
    }
}
?>
<center>
    <h1>Login</h1>
</center>
<form method="POST">
    <input type="email" name="email" placeholder="Enter Email"><br>
    <input type="password" name="password" placeholder="Enter password"><br>
    <button type="submit" name="log">Login</button>
</form>
<?php
include('footer.php')
?>