<?php
include 'header.php';
include 'connection.php';
$idd = $_GET['product_id'];
$querry = "select * from product join categorie on product.cat_id=categorie.cat_id where product.product_id='$idd'";
$rows = mysqli_query($con, $querry);
$data1 = mysqli_fetch_assoc($rows);


if (isset($_POST['update'])) {
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $cat = $_POST['cat'];
    $comment = $_POST['des'];

    $image = $_FILES['image']['name'];
    $imgtn = $_FILES['image']['tmp_name'];
    $imgty = $_FILES['image']['type'];
    $imgsi = $_FILES['image']['size'];
    $folder = "../website/productimg/";
    if ($imgty == "image/png" || $imgty == "image/jpg" || $imgty == "image/jpeg") {
        if ($imgsi <= 1000000) {
            $path = $folder . $image;
            if (move_uploaded_file($imgtn, $path)) {
                $query = "UPDATE product SET Product_name='$name', product_description='$comment', product_image='$path', product_price='$price', cat_id='$cat' WHERE product_id='$idd'";
                $result = mysqli_query($con, $query);

                if ($result) {
                    echo "<script> alert('Done'); window.location.href='showproduct.php' ;</script>";
                } else {
                    echo mysqli_error($conn);
                }

            } else {
                echo "<script> alert('Image move error'); window.location.href='insertproduct.php' ;</script>";
            }
        } else {
            echo "<script> alert('Image size error'); window.location.href='insertproduct.php' ;</script>";
        }
    } else {
        echo "<script> alert('Image type error'); window.location.href='insertproduct.php' ;</script>";
    }
}

?>



<form method="POST" enctype="multipart/form-data">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="pname"
                        value="<?php echo $data1['product_name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea">Product description</label>
                        <input class="form-control bg-dark" type="text" name="des" id="formFileMultiple" multiple value="<?php echo $data1['product_description'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Product Image</label>
                        <input class="form-control bg-dark" type="file" name="image" id="formFileMultiple" multiple value="<?php echo $data1['product_image'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="text" class="form-control" name="price"
                            value="<?php echo $data1['product_price'] ?>">
                    </div>
                    <?php
                    $q = "select * from categorie";
                    $result = mysqli_query($con, $q);
                    echo "<select name = 'cat' class='form-select form-select-lg mb-3' aria-label='.form-select-lg example'>";
                    echo "<option value='' disabled>Select an option</option>";

                    while ($data = mysqli_fetch_assoc($result)) {
                        $selected = ($data['cat_id'] == $data1['cat_id']) ? 'selected' : '';
                        echo "<option value='$data[cat_id]' $selected> $data[cat_name] </option>";
                    }
                    echo "</select>";
                    ?> 
                    <br>
                    <br>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="update">Insert</button>
    </div>
</form>