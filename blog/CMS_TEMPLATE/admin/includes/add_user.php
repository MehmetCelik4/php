<?php include "../includes/header.php";

if (isset($_POST['create_user'])){

    $user_firstname   = $_POST['user_firstname'];
    $user_lastname    = $_POST['user_lastname'];
    $user_role        = $_POST['user_role'];
    $username         = $_POST['username'];
    $user_email       = $_POST['user_email'];
    $user_password    = $_POST['user_password'];
    $query = "INSERT INTO users(username, password, firstname, lastname, email, role) ";
    $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}')";
    $create_user_query = mysqli_query($connection, $query);
    confirm($create_user_query);
    echo "<p class='bg-success'>User Created: " . "<a href='users.php'>View Users</a></p>";
}

?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="categories">User Role</label>
        <select name="user_role" class="form-control">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="post_content">User Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
    </div>
</form>