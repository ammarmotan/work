<?php
include('header.php');
include('connection.php');

$id=$_GET['cat_id'];
$query="SELECT * FROM `categorie` WHERE `cat_id`='$id'";
$d=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($d);

if(isset($_POST['update'])){
    $cat=$_POST['cat'];
    $querry="UPDATE `categorie` SET `cat_name`='$cat' WHERE `cat_id`=$id";
    $result=mysqli_query($con,$querry);
    if($result){
        echo "<script>alert('Update');window.location.href='showcat.php'</script>";
    }
}
?>


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Categorie</h6>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Enter Categorie</label>
                                    <input type="text" name="cat" value="<?php echo $row['cat_name']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

<?php 
include ('footer.php');
?>