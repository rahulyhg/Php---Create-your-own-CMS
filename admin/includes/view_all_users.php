<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Role</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
<?php 

$query = "SELECT * FROM users ";
$select_users = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];

    echo "<tr>";
    echo "<td>{$user_id}</td>";
    echo "<td>{$username}</td>";
    echo "<td>{$user_firstname}</td>";


// $querya = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
// $select_categories_ida = mysqli_query($connection, $querya);

//  confirm($select_categories_ida);

// while($row = mysqli_fetch_assoc($select_categories_ida)) {
//     $id = $row["cat_id"];
//     $cat_title = $row["cat_title"];
    
//     echo "<td>{$cat_title}</td>";
//     } 

    echo "<td>{$user_lastname}</td>";
    echo "<td>{$user_email}</td>";
    echo "<td>{$user_role}</td>";
    echo "<td><a href='users.php?change_to_admin=$user_id' class='btn btn-success'>Admin</a></td>";
    echo "<td><a href='users.php?change_to_sub=$user_id' class='btn btn-warning'>Subscriber</a></td>";
    echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}' class='btn btn-default'>Edit</a></td>";
    echo "<td><a <a onClick=\"javascript: return confirm('Are you sure that you want to delete this?'); \" href='users.php?delete={$user_id}' class='btn btn-danger'>Delete</a></td>";
    echo "</tr>";

}

?>

    </tbody>
</table>

<?php

if (isset($_GET['delete'])){
    $delete_user_id = $_GET['delete'];
    
    $query = "DELETE FROM users WHERE user_id={$delete_user_id} ";
    $delete_user= mysqli_query($connection, $query);
     header("Location: users.php");
}

if (isset($_GET['change_to_admin'])){
    $admin_id = $_GET['change_to_admin'];
    
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $admin_id";
    $admin_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

if (isset($_GET['change_to_sub'])){
    $sub_id = $_GET['change_to_sub'];
    
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $sub_id";
    $sub_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

?>