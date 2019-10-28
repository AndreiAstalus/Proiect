<?php
session_start();
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Get Users</title>

    <!-- javascript -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/users.js"></script>

</head>
<br>

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
<input type="text" name="username1" id="form_new_username" value="">

<br><br>

<label>New password:</label>
<input type="password" name="password2" id="form_new_password" value="">

<br><br>

<label>Old username:</label>
<input type="text" name="username3" id="form_old_username" value="">

<br><br>

<input id="update_user" type="button" value="Update user">

</body>
</html>

<script>

    function getUsers() {
        window.location = "api/users/Get.php";
    }
</script>










