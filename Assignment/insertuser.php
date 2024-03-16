<?php
include('header.php');
include('connection.php');

if(isset($_POST["insert"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $role=$_POST["role"];
    $query="INSERT INTO user(user_name,user_mail,user_password,role_id) VALUES ('$name','$email','$pass','$role')";
    $result=mysqli_query($con,$query);

    if($result){
        echo "<script>alert('done');window.location.href='showuser.php'</script>";
    }
}
?>

<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">User Form</h6>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Enter Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <label for="exampleInputEmail1" class="form-label">Enter Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <label for="exampleInputEmail1" class="form-label">Enter Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp"><br>

                                        <?php
                                $q="Select * from role";
                                $rows=mysqli_query($con,$q);
                                ?>
                                <select name="role">
                                    <?php
                                    while($data=mysqli_fetch_assoc($rows)){
                                    ?>
                                    <option value="<?php echo $data['role_id']?>" disable selected><?php echo $data['role_name']?></option>
                                    <?php }?>
                                </select>
                                </div>
                                <button type="submit" name="insert" class="btn btn-primary">Insert</button>
                            </form>
                        </div>
                    </div>

<?php
include('footer.php');
?>