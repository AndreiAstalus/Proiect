<?php
    require "../hook/AuthHook.php";

    $auth = new AuthHook();
    $auth->checkAuth();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Get Users</title>

    <!-- javascript -->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/users.js"></script>
    <script src="../js/login.js"></script>

</head>
<br>
<body>

Get all users:

<button id="get" onclick="getUsers()">Get all users</button>
<br><br>

Create a new user:
<br><br>

<label>Username:</label>
<input type="text" name="username" id="form_username" value="">

<br><br>

<label>Password:</label>
<input type="password" name="password" id="form_password" value="">

<br><br>

<input id="create_user" type="button" value="Create user">

<br><br>

Update user:

<br><br>

<label>New username:</label>
<input type="text" name="username" id="form_new_username" value="">

<br><br>

<label>New password:</label>
<input type="password" name="password" id="form_new_password" value="">

<br><br>

<label>Old username:</label>
<input type="text" name="username" id="form_old_username" value="">

<br><br>

<input id="update_user" type="button" value="Update user">

<br><br>

Delete user:

<br><br>

<label>Username:</label>
<input type="text" name="username" id="delete_username" value="">

<br><br>

<label>Password:</label>
<input type="password" name="password" id="delete_password" value="">

<br><br>

<input id="delete_user" type="button" value="Delete user">

<br><br><br><br><br><br><br>


<input id="logout" type="button" value="Logout">

<br><br>


</body>
</html>

<script>
    function getUsers() {
        window.location = "../api/users/Get.php";
    }
</script>
