<?php 
include ('header.php');
include ('connection.php');
?>
<div class="data">
    <table class="table">
        <thead>
            <tr>
                <th>role_id</th>
                <th>role_name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query="Select * from role";
            $result=mysqli_query($con,$query);
            while($data=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $data['role_id'] ?></td>
                    <td><?php echo $data['role_name'] ?></td>
                    <td><a href="editrole.php?role_id=<?php echo $data['role_id'] ?>">Edit</a></td>
                    <td><a href="deleterole.php?role_id=<?php echo $data['role_id'] ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php 
include('footer.php');
?>