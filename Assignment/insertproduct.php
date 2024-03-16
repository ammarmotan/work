<?php 
include('header.php');
include('connection.php');

if(isset($_POST["insert"])){
    $name=$_POST["pname"];
    $des=$_POST["pdes"];
    $price=$_POST["price"];
    $cat=$_POST["cat"];
    $image=$_FILES['image']['name'];
    $imagetn=$_FILES['image']['tmp_name'];
    $imagety=$_FILES['image']['type'];
    $imagesi=$_FILES['image']['size'];
    $folder="../website/productimg/";
    if($imagety == "image/png" || $imagety == "image/jpg" || $imagety == "image/jpeg"){
        if($imagesi<=1000000){
            $path=$folder.$image;
            $q="insert into product(product_name,product_description,product_image,product_price,cat_id) values('$name','$des','$path','$price','$cat')";
            $result=mysqli_query($con,$q);
            move_uploaded_file($imagetn,$path);
            if($result){
                echo "<script>alert('inserted');window.location.href='showproduct.php';</script>";
            }
            else{
                echo mysqli_error($con);
            }
        }
        else{
            echo "<script>alert('image size error');window.location.href='insertproduct.php';</script>";
        }
    }
    else{
        echo "<script>alert('image type error');window.location.href='insertproduct.php';</script>";
    }
}
?>

<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Product Details</h6>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" name="pname" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp"><br>
                                    <label for="exampleInputEmail1" class="form-label">Product Description</label>
                                    <input type="text" name="pdes" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp"><br>
                                    <label for="exampleInputEmail1" class="form-label">Product Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp"><br>
                                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                    <input type="text" name="price" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp"><br>
                                        <label>Categorie:</label><br>
                                        <?php
                                $q="Select * from categorie";
                                $rows=mysqli_query($con,$q);
                                ?>
                                <select name="cat">
                                    <option value=" " disable selected>Select an Option</option>
                                    <?php
                                    while($data=mysqli_fetch_assoc($rows)){
                                        ?>
                                    <option value="<?php echo $data['cat_id']?>"><?php echo $data['cat_name']?></option>
                                    <?php }?>
                                </select><br><br>
                            </div>
                                <button type="submit" name="insert" class="btn btn-primary">Insert</button>
                            </form>
                        </div>
                    </div>

                    <?php
                    include('footer.php');
                    ?>
