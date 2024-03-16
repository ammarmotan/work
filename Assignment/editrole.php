<?php
include('header.php');
include('connection.php');

$id=$_GET['role_id'];
$query="SELECT * FROM `role` WHERE `role_id`='$id'";
$d=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($d);

if(isset($_POST['update'])){
    $role=$_POST['role'];
    $querry="UPDATE `role` SET `role_name`='$role' WHERE `role_id`=$id";
    $result=mysqli_query($con,$querry);
    if($result){
        echo "<script>alert('Update');window.location.href='roledata.php'</script>";
    }
}
?>


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Role Form</h6>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Enter Role</label>
                                    <input type="text" name="role" value="<?php echo $row['role_name']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

<?php 
include ('footer.php');
?>