<?php
include('header.php');
include('connection.php');

$id=$_GET['user_id'];
$query="SELECT * FROM `user` WHERE `user_id`='$id'";
$d=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($d);

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $mail=$_POST['email'];
    $pass=$_POST['password'];
    $querry="UPDATE `user` SET `user_name`='$name' , `user_mail`='$mail' , `user_password`='$pass' WHERE `user_id`=$id";
    $result=mysqli_query($con,$querry);
    if($result){
        echo "<script>alert('Update');window.location.href='showuser.php'</script>";
    }
}
?>


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Update Form</h6>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Enter Name</label>
                                    <input type="text" name="name" value="<?php echo $row['user_name']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Enter Email</label>
                                    <input type="email" name="email" value="<?php echo $row['user_mail']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Enter password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

<?php 
include ('footer.php');
?>