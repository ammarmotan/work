<?php
include('header.php');
include('connection.php');

if(isset($_POST['insert'])){
    $role=$_POST['role'];
    $query="INSERT INTO `role` (`role_name`) VALUES ('$role')";
    $result=mysqli_query($con,$query);
    if($result){
        echo "<script>alert('inserted');</script>";
    }
    else{
        echo "<script>alert('sorry');</script>";
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
                                    <input type="text" name="role" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <button type="submit" name="insert" class="btn btn-primary">Insert</button>
                            </form>
                        </div>
                    </div>
<?php
include('footer.php');
?>