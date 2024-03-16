<?php
include('header.php');
include('connection.php');

$query="Select * from product join categorie on product.cat_id=categorie.cat_id";
$rows=mysqli_query($con,$query);
?>

<table class="table">
    <tr>
        <th>Product_id</th>
        <th>Product_Name</th>
        <th>Product_description</th>
        <th>Product_image</th>
        <th>Product_price</th>
        <th>Categorie</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php 
    $q="select * from product";
    $result=mysqli_query($con,$q);
    if($result){
    while($data=mysqli_fetch_assoc($rows)){
        ?>
    
    <tr>
        <td><?php echo $data['product_id']?></td>
        <td><?php echo $data['product_name']?></td>
        <td><?php echo $data['product_description']?></td>
        <td><img src="<?php echo $data['product_image']?>" alt="" style="width: 50px;height:40px;"></td>
        <td><?php echo $data['product_price']?></td>
        <td><?php echo $data['cat_name']?></td>
        <td><a href="editproduct.php?product_id=<?php echo $data['product_id'] ?>">Edit</a></td>
                    <td><a href="deleteproduct.php?product_id=<?php echo $data['product_id'] ?>">Delete</a></td>
    </tr>
    
<?php }} ?>
</table>
<?php
include('footer.php');
?>