<?php
include('header.php');
include('connection.php');

$query="Select user.user_id,user.user_name,user.user_mail,user.user_password,role.role_name from user join role on user.role_id=role.role_id";

$rows=mysqli_query($con,$query);
?>

<table class="table">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php 
    while($data=mysqli_fetch_assoc($rows)){?>
    
    <tr>
        <td><?php echo $data['user_id']?></td>
        <td><?php echo $data['user_name']?></td>
        <td><?php echo $data['user_mail']?></td>
        <td><?php echo $data['user_password']?></td>
        <td><?php echo $data['role_name']?></td>
        <td><a href="edituser.php?user_id=<?php echo $data['user_id'] ?>">Edit</a></td>
                    <td><a href="deleteuser.php?user_id=<?php echo $data['user_id'] ?>">Delete</a></td>
    </tr>

<?php } ?>
</table>
<?php
include('footer.php');
?>