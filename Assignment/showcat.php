<?php 
include ('header.php');
include ('connection.php');
?>
<div class="data">
    <table class="table">
        <thead>
            <tr>
                <th>Cat_id</th>
                <th>Cat_name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query="Select * from categorie";
            $result=mysqli_query($con,$query);
            while($data=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $data['cat_id'] ?></td>
                    <td><?php echo $data['cat_name'] ?></td>
                    <td><a href="editcat.php?cat_id=<?php echo $data['cat_id'] ?>">Edit</a></td>
                    <td><a href="deletecat.php?cat_id=<?php echo $data['cat_id'] ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php 
include('footer.php');
?>