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

<button id="get" onclick="getUsers()">Get all users</button>
<br><br>

<label>Username:</label>
<input type="text" name="username" id="form_username" value="">

<br><br>

<label>Password:</label>
<input type="password" name="password" id="form_password" value="">

<br><br>

<input id="create_user" type="button" value="Create user">

</body>
</html>

<script>

    function getUsers() {
        window.location = "api/users/Get.php";
    }

</script>





